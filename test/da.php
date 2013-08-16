<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php 
$arr = $_POST['content'];
//echo strlen($arr);exit('x');


echo chr(hexdec('e0')),chr(hexdec('b8')),chr(hexdec('8c'));
for($i< 0; $i<15000; $i++){
	echo chr(hexdec('e0')),chr(hexdec('b8')),chr(hexdec('b9'));
}
exit('<hr />');




for($i = 0; $i < strlen($arr); $i++){
	echo dechex(ord($arr[$i])),'<br />';
}
exit('<hr />');
echo $arr[0];exit('x');
foreach($arr as $k => $v){
	echo $v;
}
exit('<hr />');
?>
<form action="da.php" method="post">
<textarea name="content" cols="50" rows="10" id="content"></textarea>.
<input name="" type="submit" id="" value="提交" />
</form>
</body>
</html>