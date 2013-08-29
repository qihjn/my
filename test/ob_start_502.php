<?php
ob_start();
for($i = 0; $i < 1000000; $i++){
	$str .= 'a';
}
echo $str;


?>