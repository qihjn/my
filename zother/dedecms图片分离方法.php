<?php  
//开启远程
// dede\inc\inc_archives_functions.php 140行后增加,是设置的图片服务器的域名则不再保存到本地

if(file_exists(DEDEDATA."/cache/inc_remote_config.php"))
{
	require DEDEDATA."/cache/inc_remote_config.php";
	
	if(preg_match("#".$remoteupUrl."#i", $value))
	{
		//exit('sb');
		continue;
	}
}
		?>