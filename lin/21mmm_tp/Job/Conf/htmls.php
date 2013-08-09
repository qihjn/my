<?php 
return array( 
			//'*'=>array('{:module}/{:action}/{$_SERVER.REQUEST_URI|md5}'),
			'show'=>array('{:module}/{:action}/{id|cdir}',86400), 
); 

function cdir($id){
	$dir = intval($id/1000); //每目录放1k个文件
	$name = $dir.'/'.$id;
	return $name;
}
?> 