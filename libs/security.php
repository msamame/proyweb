<?php
/**************************************************************************************
	file:			security.php
	purpose:		控制后台登录授权，所有后台受限功能都应该包含此文件，保证后台的授权访问

**************************************************************************************/
	if (!isset($_SESSION[APP_ID]['AdminLoggedIn']) || $_SESSION[APP_ID]['AdminLoggedIn'] !== true || $_SESSION[APP_ID]['LevelId'] != 1) {
		Js::redirect(ADMIN_PATH . '/signin/', true);
		exit();
	}
?>