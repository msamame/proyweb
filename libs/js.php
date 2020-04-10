<?php
require_once('object.php');
/**************************************************************************************
	file:			js.php
	class:			Js
	purpose:		处理客户端代码



**************************************************************************************/

class Js extends Object {

	
	function alert($str = '', $flush = false) {
		echo "<script type=\"text/javascript\">alert(\"$str\");</script>";
		if ($flush) ob_flush();
	}



	function redirect($target = '', $flush = false) {
		echo "<script type=\"text/javascript\">location.href = \"$target\";</script>";
		if ($flush) ob_flush();
	}


	function back($flush = false) {
		echo "<script type=\"text/javascript\">history.back();</script>";
		if ($flush) ob_flush();
	}
	
	function confirm($str = '',$flush = false) {	
		echo "<script type=\"text/javascript\">confirm(\"$str\");</script>";
		if ($flush) ob_flush();
	}	
}

$js = new Js();
?>