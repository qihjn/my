<?php 
//if (!defined('THINK_PATH')) exit();
define('ONLINE',true); //上线开关

//公共配置
$conf = array(
    'URL_MODEL'=>3, 
	'DB_TYPE'=>'mysql',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'t_',
    
	'URL_CASE_INSENSITIVE' => true,
	
	'COMMENT_IMG_URL' => 'http://app.21mmm.cn/',
	'GAME_URL' => 'http://www.21mmm.cn/html/',
	'SPACE_URL' => 'http://my.21mmm.cn/',
);

//本地配置
$conf_location = array(

	//数据库
	'DB_HOST'=>'10.240.133.59',
	'DB_NAME'=>'app_21mmm_cn',
	'DB_USER'=>'root',
	'DB_PWD'=>'21mmmtestmysql',
	
	'DB1' => 'mysql://root:pwd@10.240.133.59:3306/21mmmxyx',
	
	//缓存类型
	'DATA_CACHE_TYPE' => 'Memcache',
	
	//memcache
	'MC_CONF' => array(
		'host'=>'10.240.133.59',
		'port'=>'11211',
		'expire'=>'60'
	),
	
	'NO_CACHE_RUNTIME' => true,
	'APP_DEBUG' => true, //
	'TMPL_CACHE_ON' => false,
	/*'SHOW_RUN_TIME'=>true,			// 运行时间显示
	'SHOW_ADV_TIME'=>true,			// 显示详细的运行时间
	'SHOW_DB_TIMES'=>true,			// 显示数据库查询和写入次数
	'SHOW_CACHE_TIMES'=>true,		// 显示缓存操作次数
	'SHOW_USE_MEM'=>true,			// 显示内存开销*/
);

//线上配置
$conf_online = array(
	
	//数据库
	'DB_HOST'=>'10.10.16.78',
	'DB_NAME'=>'app_21mmm_cn',
	'DB_USER'=>'app21user',
	'DB_PWD'=>'f4g2dlf2',
	
	'DB1' => 'mysql://21mmmnewdbdb:gsgsfed@161.152.11.173:3306/21mmmxyx',
	
	//memcache
	'MC_CONF' => array(
		'host'=>'10.10.16.11',
		'port'=>'11552',
		'expire'=>'60'
	),
);

//开启debug配置
$conf_debug = array(
	'NO_CACHE_RUNTIME' => true,
	'APP_DEBUG' => true, //
	'TMPL_CACHE_ON' => false,
);



if(defined('NO_CACHE_RUNTIME')){
	return array_merge($conf,$conf_location);
}else{
	if($_SERVER["SERVER_ADDR"] == '61.129.46.84' || $_SERVER["SERVER_ADDR"] == '127.0.0.1'){
		return array_merge($conf,$conf_online,$conf_debug); //线上测试机开启debug
	}
	return array_merge($conf,$conf_online);
}
?>