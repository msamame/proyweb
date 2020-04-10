<?php
require_once(LIB_DIR . '/object.php');
/**************************************************************************************
	file:			pager.php
	class:			Pager
	purpose:		处理分页功能，主要是表现形式



**************************************************************************************/



class Pager extends Object {

	// 错误代码
	var $errors = array(
	);

	// 错误状态
	var $errno = 0;
	var $error = 'ok';

	var $first = 1;
	var $next = 1;
	var $prev = 1;
	var $last = 1;
	var $totalRecords = 0;
	var $totalPages = 1;
	var $pageSize = 10;
	var $pageNo = 1;

	
	
	
	function __construct($_totalRecords, $_pageSize, $_pageNo) {
		$this->totalRecords = $_totalRecords;
		$this->pageSize = $_pageSize;
		$this->pageNo = $_pageNo;
		$this->totalPages = intval(ceil($_totalRecords / $_pageSize));
		$this->last = $this->totalPages;
		$this->prev = $_pageNo > 1 ? $_pageNo - 1 : 1;
		$this->next = $_pageNo < $this->totalPages ? $_pageNo + 1 : $this->totalPages;
	}
	
	
	
	
	
/***********************************************************************************

	purpose:		显示分页内容
	author:			patrick
	date:			20100518

	params:			postfix:分页链接的其他参数，最前面不带&
					$type:分页形式

	return:			str - 分页的html代码



*/
	function showPager($type = 1, $postfix = null) {
		switch ($type) {
			case 1:
				return $this->showPager1($postfix);
				break;
			case 2:
				return $this->showPager2($postfix);
				break;
			case 3:
				return $this->showPager3($postfix);
				break;
			case 4:
				return $this->showPager4($postfix);
				break;
		}
	}


	
/***********************************************************************************

	purpose:		显示分页内容，类型1
	author:			patrick
	date:			20100518

	params:			postfix:分页链接的其他参数，最前面不带&

	return:			str - 分页的html代码



*/
	function showPager1($postfix) {
		$ret = '<div class="pager">';
		$ret .= $this->pageNo == 1 ? "<span>First</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . "?p=1&" . $postfix . '">First</a></span>';
		$ret .= $this->pageNo == 1 ? "<span>Prev</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . "?p=" . ($this->pageNo - 1) . "&" . $postfix . '">Prev</a></span>';
		$ret .= $this->pageNo >= $this->totalPages ? "<span>Next</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . "?p=" . ($this->pageNo + 1) . "&" . $postfix . '">Next</a></span>';
		$ret .= $this->pageNo >= $this->totalPages ? "<span>Last</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . "?p=" . $this->last . "&" . $postfix . '">Last</a></span>';
		$ret .= "</div>";
		return $ret;
	}

	
	
	
/***********************************************************************************

	purpose:		显示分页内容，类型2
	author:			patrick
	date:			20100518

	params:			postfix:分页链接的其他参数，最前面不带&

	return:			str - 分页的html代码



*/
	function showPager2($postfix) {
		$ret = '<div class="paging">';
		$ret .= '<span class="counter">共' . $this->totalPages . '页 第' . $this->pageNo . '页 共' . $this->totalRecords . '条 当前显示' . (($this->pageNo - 1) * $this->pageSize + 1) . '-' . ($this->pageNo * $this->pageSize) . '</span>';
		$ret .= '<span class="pager">';
		$ret .= $this->pageNo == 1 ? "<span>首页</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=1&' . $postfix . '">首页</a></span>';
		$ret .= $this->pageNo == 1 ? "<span>上页</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo - 1) . '&' . $postfix . '">上页</a></span>';
		$ret .= $this->pageNo >= $this->totalPages ? "<span>下页</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo + 1) . '&' . $postfix . '">下页</a></span>';
		$ret .= $this->pageNo >= $this->totalPages ? "<span>尾页</span>" : '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=' . $this->last . '&' . $postfix . '">尾页</a></span>';
		$ret .= '</span>';
		$ret .= "</div>";
		return $ret;
	}

	
	
	
	
	
/***********************************************************************************

	purpose:		显示分页内容，类型3
	author:			patrick
	date:			20100601

	params:			postfix:分页链接的其他参数，最前面不带&

	return:			str - 分页的html代码



*/
	function showPager3($postfix) {
		
		$start = 1;
		$end = 10;
		if ($this->pageNo < 5) $start = 1;
		else $start = $this->pageNo - 5;
		if ($this->totalPages > $this->pageNo + 5) $end = $this->pageNo + 5;
		else $end = $this->totalPages;
		
		$middle = "";
		for ($i = $start; $i <= $end; $i++) {
			if ($this->pageNo == $i) $middle .= '<span class="current">' . $this->pageNo . '</span>|';
			else $middle .= '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=' . $i . '&' . $postfix . '">' . $i . '</a></span>|';
		}
		if (strlen($middle) > 0) $middle = substr($middle, 0, strlen($middle) - 1);
		
		$ret = '<div class="paging">';
		if ($this->pageNo > 1) $ret .= '<a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo - 1) . '&' . $postfix . '">上页</a>|';
		$ret .= $middle;
		if ($this->totalPages > $this->pageNo) $ret .= '|<a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo + 1) . '&' . $postfix . '">下页</a>';
		$ret .= "</div>";
		return $ret;
	}



	
	
	
/***********************************************************************************

	purpose:		显示分页内容，类型4
	author:			patrick
	date:			20100701

	params:			postfix:分页链接的其他参数，最前面不带&

	return:			str - 分页的html代码



*/
	function showPager4($postfix) {
		
		$start = 1;
		$end = 10;
		if ($this->pageNo < 5) $start = 1;
		else $start = $this->pageNo - 5;
		if ($this->totalPages > $this->pageNo + 5) $end = $this->pageNo + 5;
		else $end = $this->totalPages;
		
		$middle = "";
		for ($i = $start; $i <= $end; $i++) {
			if ($this->pageNo == $i) $middle .= '<span class="current">' . $this->pageNo . '</span>';
			else $middle .= '<span><a href="' . $_SERVER["PHP_SELF"] . '?p=' . $i . '&' . $postfix . '">' . $i . '</a></span>';
		}
		
		$ret = '<div class="pager"><div>';
		if ($this->pageNo > 1) $ret .= '<a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo - 1) . '&' . $postfix . '"><img src="img/p13.jpg" /></a>';
		$ret .= $middle;
		if ($this->totalPages > $this->pageNo) $ret .= '<a href="' . $_SERVER["PHP_SELF"] . '?p=' . ($this->pageNo + 1) . '&' . $postfix . '"><img src="img/p14.jpg" /></a>';
		$ret .= "</div></div>";
		return $ret;
	}
}
?>