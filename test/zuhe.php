<?php
function arrangement($arr, $len=0, $str="") {
	global $res;
	$arr_len = count($arr);
	if($len == 0){
		$res[] = $str;
	}else{
		for($i=0; $i<$arr_len; $i++){
			$tmp = array_shift($arr);
			arrangement($arr, $len-1, $str."\t".$tmp);
			array_push($arr, $tmp);
		}
	}
}

function combination($arr, $len=0, $str="") {
	global $res;
	$arr_len = count($arr);
	if($len == 0){
		$res[] = $str;
	}else{
		for($i=0; $i<$arr_len-$len+1; $i++){
			$tmp = array_shift($arr);
			combination($arr, $len-1, $str."\t".$tmp);
		}
	}
}


$arr = array(11,23,31, 4,45,11, 27,18,9, 1,22,11, 11,21,53, 78,89,3, 55,67,15, 99,3,45);//词根
$num = 3;//所需使用词根的数量
$res = array();//结果集
//arrangement($arr, $num);//进行排列运算
//var_dump($res);//输出排列结果

$res = array();
combination($arr, $num);//进行组合运算
//var_dump($res);//输出组合结果
$avg = array_sum($arr) / (count($arr)/3);
$arr_3sum = array();
foreach($res as $k => $v){
	
	$arr_3sum[] = array_sum(explode("\t", $v));
	
}

$arr_sub = array();
foreach($arr_3sum as $k => $v){
	$arr_sub[] = abs($v-$avg);
}

asort($arr_sub);
$result_key = array();
foreach($arr_sub as $k => $v){
	echo "3sum - avg-------",$v;
	echo '<br />';
	echo "num_list---------",$res[$k];
	echo "<br /><br /><br /><br />";
}
?>