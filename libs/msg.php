<?php
/**************************************************************************************

	file:			msg.php
	purpose:		用来处理提示信息

**************************************************************************************/

class Message extends Object {

	function tip($msg) {
		$_SESSION[APP_ID]['msg']['tips'] = $msg;
	}

	function warn($msg) {
		$_SESSION[APP_ID]['msg']['warn'] = $msg;
	}
	
	function error($msg) {
		$_SESSION[APP_ID]['msg']['error'] = $msg;
	}
	
	function flash() {
		if (isset($_SESSION[APP_ID]["msg"]['error']) && !empty($_SESSION[APP_ID]["msg"]['error'])) {
			echo '<div id="message" class="error">' . $_SESSION[APP_ID]["msg"]['error'] . '</div>';
			$this->clear();
			return;
		}
		if (isset($_SESSION[APP_ID]["msg"]['warn']) && !empty($_SESSION[APP_ID]["msg"]['warn'])) {
			echo '<div id="message" class="warn">' . $_SESSION[APP_ID]["msg"]['warn'] . '</div>';
			$this->clear();
			return;
		}
		if (isset($_SESSION[APP_ID]["msg"]['tips']) && !empty($_SESSION[APP_ID]["msg"]['tips'])) {
			echo '<div id="message" class="tips">' . $_SESSION[APP_ID]["msg"]['tips'] . '</div>';
			$this->clear();
			return;
		}
	}
	
	function clear() {
		unset($_SESSION[APP_ID]['msg']);
	}
}

$msg = new Message();
?>