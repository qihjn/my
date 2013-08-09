<?php 

$arr1=array("中国","2144","八B");
$arr2 = array('美国','dsfds','l lover you');
$arr = array_merge($arr1,$arr2);

shuffle($arr);
print_r($arr);

?>