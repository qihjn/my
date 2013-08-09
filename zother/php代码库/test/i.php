<?php
date_default_timezone_set('Etc/GMT-8');
$st = gettimeofday(1);

if($_GET['p']){
	define('MYSQL','mysql_pconnect');
}else{
	define('MYSQL','mysql_connect');
}
for($i = 0; $i < 1; $i++){
	echo $i;
	get();
	
}
/*switch($_GET['act']){
	case 'g' : 
		get();
	break;
	
	case 's' :
		set();
	break;
	default : '' ; 
	
}*/

//echo gettimeofday(1)-$st; //执行时间 0.0041599273681641 

function get(){
	$id = rand(1,20);
	$sql = "select * from uchome_act_kkml_alias  where id = $id";
	$r = sql_fetch($sql);
	$r =  $r[0];
	echo $sql;
	echo "<hr />";
	//echo json_encode($r);
	//echo '{"num":'.$r['num'].'}';
}
function set(){
	$ip = get_client_ip();
	$id = isId($_GET['id']);
	//var_dump(isValidateIp($ip,$id));
	if(isValidateIp($ip,$id)){
		
		if($id){
			$sql = "update uchome_act_hzgg_vote set num = num+1 where id = $id";
			if(sql_query($sql)){
				addIp($ip,$id);
				$r['error'] = 0;
				$r['msg'] = '投票成功';
				//return true;
			}else{
				$r['error'] = 1;
				$r['msg'] = '投票失败';
				//return false;
			}
		}
	}else{
		$r['error'] = 1;
		$r['msg'] = '同一IP一天只能投一票';
		
	}
	
	echo json_encode($r);
}


function sql_connect(){
	//mysql_connect("10.240.133.59", "root", "2144testmysql") or die("Could not connect: " . mysql_error());
	mysql_connect("127.0.0.1", "root", "") or die("Could not connect: " . mysql_error());
    mysql_select_db("my_2144_cn");
	/*if($_GET['p']){
		mysql_pconnect("10.10.16.10", "214cmsudb", "fjfl29h4fd") or die("Could not connect: " . mysql_error());
	}else{
		mysql_connect("10.10.16.10", "214cmsudb", "fjfl29h4fd") or die("Could not connect: " . mysql_error());
	}*/
    mysql_select_db("2144_cms");
	
	mysql_query("set names utf8");
	
	
}

//查询
function sql_query($sql){
	sql_connect();
	$result = mysql_query($sql) or die('sql error'.$sql);
	mysql_close();
	return $result;
}

//读取数据
function sql_fetch($sql){
	sql_connect();
	$result = mysql_query($sql);
	$data = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = $row;
    }
    mysql_free_result($result);
	mysql_close();
	return $data;
}

// 获取客户端IP地址
function get_client_ip(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR");
   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
   else
       $ip = "unknown";
   return($ip);
}




?> 