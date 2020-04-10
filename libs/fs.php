<?php

/**************************************************************************************
	file:			fs.php
	class:			Fs
	purpose:		处理文件系统相关功能，包括文件上传



**************************************************************************************/



class Fs extends Object {

/***********************************************************************************

	purpose:		上传文件到文件系统
	author:			patrick
	date:			2009-6-16 10:23

	params:			file:array - 上传后的$_FILE['filename']
					upload_path:str - 上传的路径，以'/'结尾

	return:			str - 上传后的文件相对路径
					false - 失败



*/
	function uploadToFs($file, $upload_path = null) {
		global $upload_formats;

		// 如果系统不允许上传则退出
		if (ini_get('file_uploads') != '1') {
			throw new BadMethodCallException("File upload not allowed - 系统不允许上传文件");
		}

		// 如果没有上传文件或文件尺寸==0则退出
		if (intval($file['size']) == 0) {
			throw new LengthException("File size is 0 - 文件尺寸为零");
		}

		// 如果上传文件尺寸超过系统限制则退出
		if ($file['error'] == UPLOAD_ERR_INI_SIZE) {
			throw new LengthException("File size exceeds limitation - 文件尺寸超出系统限制");
		}

		$path_parts = pathinfo($file['name']);
		// 如果文件类型不允许上传则返回
		if (!in_array(strtolower($path_parts['extension']), $upload_formats)) {
			throw new InvalidArgumentException("File type not allowed - 文件类型不允许上传");
		}
		
		
		// 如果没有给出指定路径，则使用内定路径
		if (empty($upload_path)) $upload_path = dirname(dirname(__FILE__)) . '/';
		$img_path = 'uploaded';


		$new_name = date("YmdHis") . rand(1, 1000) . '.' . $path_parts['extension'];
		$new_path = $img_path . '/' . $new_name;

		// 如果指定的上传目录不存在则建立
		if (!file_exists($upload_path . $img_path)) {
			if (!mkdir($upload_path . $img_path, 0777)) {
				throw new RuntimeException("Upload path creation fail - 建立上传目录出错");
			}
		}

		if (move_uploaded_file($file['tmp_name'], $upload_path . $new_path)) {
			chmod($upload_path . $new_path, 0644);
			return $new_path;
		} else {
			throw new RuntimeException("Move upload temp file failed - 移动上传的临时文件出错");
		}
	}
}
?>