<?php
	/* 所有页面都应以包含此文件为开始，根据需要独自包含可选模块 */
	
	@header("Content-type: text/html; charset=utf-8");
	
	//@session_start();

/*	require_once('defs.php');
	require_once('object.php');
	
	require_once('msg.php');
	require_once('model.php');
	require_once('fs.php');

	require_once('html.php');
	require_once('js.php');
	require_once('common/common.php');
	require_once('pager.php');


/*
	可选的其他模块

	require_once('text.php');
	
*/


function v($var) {
	var_dump($var);
}
?>