<?php
date_default_timezone_set('Etc/GMT-8');
$st = gettimeofday(1);
switch($_GET['act']){
	case 'g' : 
		get();
	break;
	
	case 's' :
		set();
	break;
	default : '' ; 
	
}

//echo gettimeofday(1)-$st; //执行时间 0.0041599273681641 

function get(){
	$sql = "select count(id) as id from uchome_act_seh where qq <> 0 and ip <>'' ";
	$r = sql_fetch($sql);
	$r =  $r[0];
	echo json_encode($r);
	//echo '{"num":'.$r['num'].'}';
}
function set(){
	$ip = get_client_ip();
	$qq = intval($_GET['qq']);
	if(!$qq) $qq = 10000;
	//var_dump(isValidateIp($ip,$id));
	if(isValidateIp($ip,$qq)){
		$sql = "SELECT id,code FROM `uchome_act_seh` WHERE qq=0 and ip='' limit 1";
		$r = sql_fetch($sql);
		$id = $r[0]['id'];
		if($id){
			$time = date('Y-m-d H:i:s');
			$sql = "update uchome_act_seh set qq = $qq, ip = '$ip',time ='$time' where id = $id";
			if(sql_query($sql)){
				$r['code'] = $r[0]['code']; //激活码
				$r['error'] = 0;
				$r['msg'] = '获取激活码成功';
				//return true;
			}else{
				$r['error'] = 1;
				$r['msg'] = '获取激活码成功';
				//return false;
			}
		}
	}else{
		$r['error'] = 1;
		$r['msg'] = '你已经领取过了，不能再次领取';
		
	}
	
	echo json_encode($r);
}



//可以投票
function isValidateIp($ip,$qq){
	//return true;
	$time = date('Y-m-d'); //当天0点
	$qq = intval($qq);
	$sql = "select id from uchome_act_seh where ip = '$ip' or qq = '$qq'";
	if(!sql_fetch($sql)){
		return true;
	}
	return false;
}

//有效qq
function isValidateQQ($qq){
	$sql = "select id from uchome_act_seh where qq = '$qq'";
	if(!sql_fetch($sql)){
		return true;
	}
	return false;
}





function sql_connect(){
	/*mysql_connect("10.240.133.59", "root", "2144testmysql") or die("Could not connect: " . mysql_error());
    mysql_select_db("my_2144_cn");*/
	mysql_connect("10.10.16.10", "uc_2144_dbuser", "f82bo96h6") or die("Could not connect: " . mysql_error());
    mysql_select_db("my_2144_cn");
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