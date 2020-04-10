<?php

/**************************************************************************************



	file:			model.php

	class:			Model

	purpose:		处理自动的数据操作

	notice:			表单内的数据元素必须采用 table[field] 的名称形式

					会检查表中tinyint的字段是否有提交，如没有提交则自动置0，也即checkbox没有选中的情况



**************************************************************************************/



class Model extends Object {
	// 相关联的表名
	var $table;
	// 不带前缀的表名，主要为了配合表单元素的名称
	var $t;
	// 最后一次执行的sql
	var $sql = '';
	// 分页

	var $pager = array(
		'first' => 0,
		'prev' => 0,
		'next' => 0,
		'last' => 0,
	);
	

	protected $db = null;
	// INSERT，UPDATE 或 DELETE 查询所影响的记录行数。
	var $affected_rows = 0;
	// 数据库插入或更新所使用的原始数据，只针对insert_data和update_data
	var $data = null;
	// insert的新id值
	var $id = null;

	function __construct ($_table) {
		global $_db, $_useDb, $_dbEngine;
		$this->table = $_db[$_useDb]['prefix'] . $_table;
		$this->t = $_table;

		// 确保所包含的实现文件存在
		$_file = 'db' . DS . $_dbEngine . '.php';

	

		if (file_exists(LIB_DIR . DS . $_file)) {

			require_once($_file);

		} else {

			echo "File missing $_file - 文件不存在 $_file";

			exit();

		}

	

		$this->db = new Db($_db[$_useDb]['host'], $_db[$_useDb]['database'], $_db[$_useDb]['login'], $_db[$_useDb]['password'], $_db[$_useDb]['encoding'], (DEBUG > 0));

	}





	/*******************************************************************************

		purpose:		接收 $_POST和/或$_FILES，保存入数据库



		插入原则：

			程序会检测是否存在与字段名称同名的元素;

			1.	如果该元素存在并且内容非空则用其值更新字段内容，如果元素存在但内容为空则可以为NULL的元素更新为NULL，

				不可为NULL的元素:varchar、text、blog字段更新为空，其他字段更新为0;



			2.	如果元素不存在则，可以为NULL的元素更新为NULL，不可为NULL的元素:varchar、text、blog字段更新为空，其他字段更新为0。

	*/



	function insert_data() {

		$this->reset_status();

		

		$fs = new Fs();





		// 如果没有输入则直接退出

		if (count($this->data) == 0 && count($_FILES) == 0) {

			throw new InvalidArgumentException("Empty data - 缺少输入数据");

		}



		// upload file

		if (isset($_FILES[$this->t])) {

			$tampfile = array();



			foreach ($_FILES[$this->t]['name'] as $field => $value) {

				$tempfile['name'] = $_FILES[$this->t]['name'][$field];

				$tempfile['type'] = $_FILES[$this->t]['type'][$field];

				$tempfile['tmp_name'] = $_FILES[$this->t]['tmp_name'][$field];

				$tempfile['error'] = $_FILES[$this->t]['error'][$field];

				$tempfile['size'] = $_FILES[$this->t]['size'][$field];



				$tempname = '';

				switch ($tempfile['error']) {

					case 0:

						$tempname = $fs->uploadToFs($tempfile);

						if ($tempname !== false) $this->data[$this->t][$field] = $tempname;

						else $this->data[$this->t][$field] = 'UPLOAD_FAILED';

						break;

					case 1:

						throw new LengthException("File size exceeds limitation - 文件尺寸超出系统限制");

						break;

					case 2:

						throw new LengthException("File size exceeds form setting - 文件尺寸超出表单中的设定");

						break;

					case 3:

						throw new RuntimeException("Partial uploaded - 只有部分被上传");

						break;

					case 6:

						throw new RuntimeException("No temp dir - 找不到临时文件夹");

						break;

					case 7:

						throw new RuntimeException("Cant write - 文件写入失败");

						break;

				}

			}

		}



		// 准备sql

		$sql_field = "";

		$sql_value = "";



		try {

			$schema = $this->db->query("DESCRIBE `{$this->table}`");

		} catch (Exception $e) {

			throw new RuntimeException("func:insert_data(Get table schema failed, 取得表定义时发生错误) - " . $e->getMessage());

		}



		// 遍历每个字段，找出需要更新的并建立sql

		foreach($schema as $row) {

			if ($row['Field'] == 'id') continue;



			$sql_field .= "`{$row['Field']}`, ";



			if ($row['Field'] == 'created') {

				$sql_value .= "'" . date('Y-m-d H:i:s') . "', ";

				continue;

			}



			if ($row['Field'] == 'modified') {

				$sql_value .= "'" . date('Y-m-d H:i:s') . "', ";

				continue;

			}

			

			if (isset($this->data[$this->t][$row['Field']])) {

				if (!empty($this->data[$this->t][$row['Field']])) {

					$sql_value .= $this->db->get_proper_value($row['Type'], $this->data[$this->t][$row['Field']]) . ', ';

				} else {

					if ($row['Null'] == 'YES') {

						$sql_value .= 'Null, ';

					} else {

						$sql_value .= $this->db->get_empty_value($row['Type']) . ', ';

					}

				}

			} else {

				if ($row['Null'] == 'YES') {

					$sql_value .= 'Null, ';

				} else {

					$sql_value .= $this->db->get_empty_value($row['Type']) . ', ';

				}

			}

		}



		if (strlen($sql_field) > 0) {

			$sql_field = substr($sql_field, 0, strlen($sql_field) - 2);

			$sql_value = substr($sql_value, 0, strlen($sql_value) - 2);

		}

		else return;





		$sql = "INSERT INTO `{$this->table}` ($sql_field) VALUES ($sql_value)";

		$this->sql = $sql;



		

		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:insert_data(DB insert operation failed, 数据库插入操作错误) - " . $e->getMessage());

		}



		$this->id = $this->db->last_insert_id();

		$this->affected_rows = $this->db->affected_rows();

	}







	/*******************************************************************************

		purpose:	接收 $_POST和/或$_FILES，更新数据库，提交的表单内必须有一个名为 table[id] 的字段



		更新程序最终只使用$_POST中的内容进行更新，所以如果在提交之后需要改变某些更新内容的话，可以修改$_POST的内容。



		对于表单内某些没有内容或状态就不会被提交的元素-简称A元素（文件，未选取的复选框等）的更新策略：



			首先表单内应该放置一个替代元素，简称B元素，其名称为 A元素名称 + 下划线(A元素名称_)，其中放置当A元素无法提交时的替代值。

			更新原则：

				更新程序会检测是否存在与字段名称同名的A元素;

				1.	如果该A元素存在并且内容非空则用其值更新字段内容，如果A元素存在但内容为空则可以为NULL的元素更新为NULL，

					不可为NULL的元素:varchar、text、blog字段更新为空，其他字段更新为0;



				2.	如果该A元素不存在则，在$_POST中查找对应的B元素，如果该B元素存在并且内容非空则用其值更新字段内容，

					如果B元素存在但内容为空则可以为NULL的元素更新为NULL，不可为NULL的元素:varchar、text、blog字段更新为空，其他字段更新为0;



				3.	如果A、B元素都不存在则，可以为NULL的元素更新为NULL，不可为NULL的元素:varchar、text、blog字段更新为空，其他字段更新为0。



			例如有一个名称为chk的复选框元素-A元素，这时应该放置一个名为chk_的替代元素-B元素，其值为0，

			这时如果提交时chk被选中则使用其值更新字段，否则使用其B元素chk_的值0来更新chk，如果B元素不存在则按照上面的第3条原则更新



			对于文件元素的更新原则与之类似，唯一不同点在于，如果有文件被提交则首先会上传文件并用返回的文件路径覆盖$_POST内的同名元素的值以达到更新的目的。

			如果没有文件被提交则不更新$_POST的值从而迫使程序去寻找对应的B元素，从而按照上面的更新原则进行更新。

	*/



	function update_data() {

		$this->reset_status();

		

		$fs = new Fs();

		

		

		// 如果没有输入则直接退出

		if (count($this->data) == 0 && count($_FILES) == 0) {

			throw new InvalidArgumentException("Empty data - 缺少输入数据");

		}



		// upload file

		if (isset($_FILES[$this->t])) {

			$tampfile = array();

			foreach ($_FILES[$this->t]['name'] as $field => $value) {

				$tempfile['name'] = $_FILES[$this->t]['name'][$field];

				$tempfile['type'] = $_FILES[$this->t]['type'][$field];

				$tempfile['tmp_name'] = $_FILES[$this->t]['tmp_name'][$field];

				$tempfile['error'] = $_FILES[$this->t]['error'][$field];

				$tempfile['size'] = $_FILES[$this->t]['size'][$field];



				$tempname = '';

				switch ($tempfile['error']) {

					case 0:

						$tempname = $fs->uploadToFs($tempfile);

						if ($tempname !== false) $this->data[$this->t][$field] = $tempname;

						else $this->data[$this->t][$field] = 'UPLOAD_FAILED';

						break;

					case 1:

						throw new LengthException("File size exceeds limitation - 文件尺寸超出系统限制");

						break;

					case 2:

						throw new LengthException("File size exceeds form setting - 文件尺寸超出表单中的设定");

						break;

					case 3:

						throw new RuntimeException("Partial uploaded - 只有部分被上传");

						break;

					case 6:

						throw new RuntimeException("No temp dir - 找不到临时文件夹");

						break;

					case 7:

						throw new RuntimeException("Cant write - 文件写入失败");

						break;

				}

			}

		}



		// 准备sql

		$sql_pair = "";



		try {

			$schema = $this->db->query("DESCRIBE `{$this->table}`");

		} catch (Exception $e) {

			throw new RuntimeException("func:update_data(Get table schema failed, 取得表定义时出错) - " . $e->getMessage());

		}



		// 遍历每个字段，找出需要更新的并建立sql

		foreach($schema as $row) {

			if ($row['Field'] == 'id') continue;



			if ($row['Field'] == 'created') continue;



			if ($row['Field'] == 'modified') {

				$sql_pair .= "`modified` = '" . date('Y-m-d H:i:s') . "', ";

				continue;

			}



			/**

				确定更新值

			*/



			if (isset($this->data[$this->t][$row['Field']])) { // 如果A元素有提交

				if (!empty($this->data[$this->t][$row['Field']])) { // 如果内容非空则直接使用该内容更新

					$sql_pair .= "`{$row['Field']}` = " . $this->db->get_proper_value($row['Type'], $this->data[$this->t][$row['Field']]) . ', ';

				} else { // 如果内容为空则确定空值

					if ($row['Null'] == 'YES') {

						$sql_pair .= "`{$row['Field']}` = NULL" . ', ';

					} else {

						$sql_pair .= "`{$row['Field']}` = " . $this->db->get_empty_value($row['Type']) . ', ';

					}

				}

			} else if(isset($this->data[$this->t][$row['Field'] . '_'])) { // 如果B元素有提交

				if (!empty($this->data[$this->t][$row['Field'] . '_'])) { // 如果内容非空则直接使用该内容更新

					$sql_pair .= "`{$row['Field']}` = " . $this->db->get_proper_value($row['Type'], $this->data[$this->t][$row['Field'] . '_']) . ', ';

				} else { // 如果内容为空则确定空值

					if ($row['Null'] == 'YES') {

						$sql_pair .= "`{$row['Field']}` = NULL" . ', ';

					} else {

						$sql_pair .= "`{$row['Field']}` = " . $this->db->get_empty_value($row['Type']) . ', ';

					}

				}

			} else { // 如果A、B元素都未提交

				if ($row['Null'] == 'YES') {

					$sql_pair .= "`{$row['Field']}` = NULL" . ', ';

				} else {

					$sql_pair .= "`{$row['Field']}` = " . $this->db->get_empty_value($row['Type']) . ', ';

				}

			}

		}



		if (strlen($sql_pair) == 0) return;

		else $sql_pair = substr($sql_pair, 0, strlen($sql_pair) - 2);



		$sql = "UPDATE `{$this->table}` SET $sql_pair WHERE `id` = {$this->data[$this->t]['id']}";

		$this->sql = $sql;



		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:update_data(Db update operation failed, 数据库更新发生错误) - " . $e->getMessage());

		}

		

		$this->affected_rows = $this->db->affected_rows();

	}







	/************************************************************************

	得到第一个记录的指定字段的值



	return:		有记录返回字段值，无记录则返回null

	*/

	function field($field, $where = null) {

		$this->reset_status();

		

		$filter = "";

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";



		$sql = "SELECT `$field` FROM `{$this->table}` $filter LIMIT 0, 1";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:field - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result[0][$field];

	}

	



	/************************************************************************

	删除id = $id 的记录

	*/

	function delete($id) {

		$this->reset_status();

		

		$sql = "DELETE FROM `{$this->table}` WHERE `id` = $id";

		$this->sql = $sql;

		

		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:delete - " . $e->getMessage());

		}

		$this->affected_rows = $this->db->affected_rows();

	}



	

	

	

	

	/************************************************************************

	批量删除

	*/

	function deleteEx($where) {

		$this->reset_status();

		

		$filter = "";

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";



		$sql = "DELETE FROM `{$this->table}` $filter";

		$this->sql = $sql;

		

		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:deleteEx - " . $e->getMessage());

		}

		$this->affected_rows = $this->db->affected_rows();

	}

	

	

	

	





	/************************************************************************

	读取指定id的记录，只返回一条



	return:		有记录返回第一条，无记录则返回null

	*/

	function read($id) {

		$this->reset_status();

		

		$sql = "SELECT * FROM `{$this->table}` WHERE `id` = $id LIMIT 0, 1";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:read - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result[0];

	}





	/************************************************************************

	读取指定的记录，只返回一条



	return:		有记录返回第一条，无记录则返回null

	*/

	function readEx($where, $order = null) {

		$this->reset_status();

		

		$filter = "";

		$orderBy = "";

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";

		if (empty($order)) $orderBy = ""; else $orderBy = "ORDER BY $order";



		$sql = "SELECT * FROM `{$this->table}` $filter $orderBy LIMIT 0, 1";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:readEx - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result[0];

	}





	/************************************************************************

	返回指定记录的数目



	return:		int

	*/

	function count($where = null) {

		$this->reset_status();

		

		$filter = "";

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";



		$sql = "SELECT COUNT(*) AS `count` FROM `{$this->table}` $filter";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:count - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result[0]['count'];

	}















	/************************************************************************

	返回分页对象

	*/

	function getPager($current_page, $page_size, $where = null) {

		return new Pager($this->count($where), $page_size, $current_page);

	}

	

	

	

	



	/************************************************************************

	返回分页结果集



	return:		有记录返回记录，无记录则返回null

	*/

	function get_paged_rows($current_page, $page_size, $where = null, $order = null) {

		$this->reset_status();

		

		$filter = "";

		$orderBy = "";

		

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";

		if (empty($order)) $orderBy = ""; else $orderBy = "ORDER BY $order";



		$start = ($current_page - 1) * $page_size;

		$sql = "SELECT * FROM `{$this->table}` $filter $orderBy limit $start, $page_size";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:get_paged_rows - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result;

	}













	/************************************************************************

	返回列表结果



	return:		有记录返回记录，无记录则返回null

	*/

	function get_list($id = 'id', $name = 'name', $where = null, $order = null) {

		$this->reset_status();

		

		$filter = "";

		$orderBy = "";

		if (empty($where)) $filter = ""; else $filter = "WHERE $where";

		if (empty($order)) $orderBy = ""; else $orderBy = "ORDER BY $order";

		

		$sql = "SELECT `$id`, `$name` FROM `{$this->table}` $filter $orderBy";

		$this->sql = $sql;



		try {

			$result = $this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:get_list - " . $e->getMessage());

		}

		

		if ($result === 0) return null;

		else return $result;

	}











	/************************************************************************

	保存数据，根据提交的内容中是否有 table[id] 字段分辨采用insert 还是 update

	*/

	function save($data = null) {

		if ($data == null) {	// 使用$_POST

			$this->data = $_POST;

		} else {				// 使用传递的数据

			$this->data = $data;

		}

		

		if (isset($this->data[$this->t]['id'])) $this->update_data();

		else $this->insert_data();

	}











	/************************************************************************

	更新指定id，指定字段的值

	*/

	function update_field($id, $field, $value) {

		$this->reset_status();

		

		$sql = "UPDATE `{$this->table}` SET `$field` = '$value' WHERE `id` = $id";

		$this->sql = $sql;

		

		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:update_field - " . $e->getMessage());

		}

		$this->affected_rows = $this->db->affected_rows();

	}



	

	

	

	/************************************************************************

	更新指定字段的值



	return:		失败：false， 成功：true

	*/

	function update_field_ex($field, $value, $where) {

		$this->reset_status();

		

		$filter = "";

		if (empty($where)) $filter = ""; else $filter = " WHERE $where";

		

		$sql = "UPDATE `{$this->table}` SET `$field` = '$value' $filter";

		$this->sql = $sql;

		

		try {

			$this->db->query($sql);

		} catch (Exception $e) {

			throw new RuntimeException("func:update_field_ex - " . $e->getMessage());

		}

		$this->affected_rows = $this->db->affected_rows();

	}

	

	

	

	

	/************************************************************************

	重置对象状态，每个数据库操作之前都应执行

	*/

	function reset_status() {

		// reset

		$this->affected_rows = 0;

		$this->id = 0;

		$this->sql = "";

	}

}