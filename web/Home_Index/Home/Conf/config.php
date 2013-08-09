<?php
//if (!defined('THINK_PATH')) exit();
//define('ONLINE',true); //上线开关
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

$conf_location = array(
	'DB_HOST'=>'10.240.133.59',
	'DB_NAME'=>'app_21mmm_cn',
	'DB_USER'=>'root',
	'DB_PWD'=>'21mmmtestmysql',
	
	'DB1' => 'mysql://root:21mmmtestmysql@10.240.133.59:3306/21mmmxyx',
	
	'NO_CACHE_RUNTIME' => true,
	'APP_DEBUG' => true, //
	'TMPL_CACHE_ON' => false,
	/*'SHOW_RUN_TIME'=>true,			// 运行时间显示
	'SHOW_ADV_TIME'=>true,			// 显示详细的运行时间
	'SHOW_DB_TIMES'=>true,			// 显示数据库查询和写入次数
	'SHOW_CACHE_TIMES'=>true,		// 显示缓存操作次数
	'SHOW_USE_MEM'=>true,			// 显示内存开销*/
);
$conf_online = array(
	'DB_HOST'=>'10.10.16.12',
	'DB_NAME'=>'app_21mmm_cn',
	'DB_USER'=>'app21user',
	'DB_PWD'=>'f4g2dlf2',
	
	'DB1' => 'mysql://21mmmnewdbdb:BHUIJN789woshi@61.152.101.173:3306/21mmmxyx',
);

if(defined('NO_CACHE_RUNTIME')){
	return array_merge($conf,$conf_location);
}else{
	
	return array_merge($conf,$conf_online);
}
?>