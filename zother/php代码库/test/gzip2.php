<?php 
		//浏览器缓存
		$client_cache_time=600;//单位 - 秒
        header('Cache-Control: public, max-age='.$client_cache_time);
        header('Expires: '.gmdate('D, d M Y H:i:s',time()+$client_cache_time).' GMT');//设置页面缓存时间
        header('Last-Modified: '.gmdate('D, d M Y H:i:s',time()).' GMT');//返回最后修改时间
        header('Pragma: public');
        //header('Etag:phpblogxx');//返回标识，用于标识上次的确访问过(浏览器中存在缓存)
?>
<?php ob_start('ob_gzip'); ?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />  
<title>无标题文档</title>  
</head>  

<body>  
<?php  
for($i=0;$i<10000;$i++){  
echo 'Hello World!'; 
}  
?>  
</body>  
</html>  

<?php  
ob_end_flush();  
//压缩函数  
function ob_gzip($content){  
if(!headers_sent()&&extension_loaded("zlib")&&strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){  
$content = gzencode($content,9);  
header("Content-Encoding: gzip");  
header("Vary: Accept-Encoding");  
header("Content-Length: ".strlen($content));  
}  
return $content;  
}  
?>  
