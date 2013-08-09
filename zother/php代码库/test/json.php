
<?php
$urlinfo = parse_url($_SERVER['HTTP_REFERER']);

$key = $urlinfo['host'];
echo $key;
$arr = explode('.','www.i.cn');
$len = count($arr);
echo $arr[$len-2].'.'.$arr[$len-1];
?>