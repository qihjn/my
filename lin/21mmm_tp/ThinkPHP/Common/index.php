<?php //进行ftp上传
$new_name = 'D:/Test/1.jpg';
$filepath = '/w.jpg';
	if(true) {
		include_once('./function_ftp.php');
		if(ftpupload($new_name, $filepath)) {
			$pic_remote = 1;
			$album_picflag = 2;
		} else {
			//@unlink($new_name);
//			@unlink($new_name.'.thumb.jpg');
//			runlog('ftp', 'Ftp Upload '.$new_name.' failed.');
		//	return cplang('ftp_upload_file_size');
		}
	} else {
		$pic_remote = 0;
		$album_picflag = 1;
	}
	?>