<?php

//============== ip 获取城市函数===============//
function ip2num($ip){
	$ipadd = explode('.',$ip);
	return intval($ipadd[0])*256*256*256 + intval($ipadd[1])*256*256 + intval($ipadd[2]*256) + intval($ipadd[3]);
}

/*$ipnum 运算之后的数字*/
function getcitybydb($ip){
	$ipnum = ip2num($ip);
	$m = M('Ip');
	$r = $m->query("select city,province from mmm_ip where $ipnum>=ip1 and $ipnum<=ip2 limit 1");
	
	$r = $r[0];
	//echo "select city,province from ip where $ipnum>=ip1 and $ipnum<=ip2 limit 1"; //select city,province from p8_fenlei_ip where ip1<= 3729367335 and ip2>=3729367335 limit 1
	if(!is_array($r)){
		//未找到，返回默认城市
		$r['province'] = '上海'; 
		$r['city'] = '上海';
	}
	return $r;
}

/**
 * 根据ip得到城市
 * @param string $ip 
 */
function getcity($ip = ''){
	//global $onlineip;
	$ip || $ip = get_client_ip();
	if($_COOKIE["IP_province"] && $_COOKIE["IP_city"]){
		$r['province'] = $_COOKIE['IP_province'];
		$r['city']  = $_COOKIE['IP_city'];
		return $r;
	}else{
		$r = getcitybydb($ip);
		setcookie("IP_province",$r['province'],time()+7*86400);
		setcookie("IP_city",$r['city'],time()+7*86400);
		return $r;
	}
}
//============== ip 获取城市函数  end ===============//

?>