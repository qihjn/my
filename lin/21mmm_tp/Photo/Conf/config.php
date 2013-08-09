<?php
//if (!defined('THINK_PATH')) exit();
//define('IROOT',str_replace('web/photo/Home/Conf','',str_replace("\\","/",dirname(__FILE__))));
//define('ROOT_FILE',IROOT."file/");


$config	=	require MMM_ROOT.'/config.php';
$array = array(
    /*'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_NAME'=>'21mmm',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'mmm_',
	'APP_DEBUG'=>true,
	'URL_CASE_INSENSITIVE'=>true,
	'TMPL_CACHE_ON'=>false, //关闭模板缓存
	
	//'ROOTURL' => 'http://www.21mmm.cn',
	'SITETITLE'=>'网站名',
	'MODELTITLE'=>'图吧',*/
	

	
	//静态化
	//'HTML_CACHE_ON' => true,
	/*'HTML_CACHE_TIME'=>86400*10,
    'HTML_READ_TYPE'=>0,
	'HTML_FILE_SUFFIX' => '.html',
	
	'URL_ROUTER_ON' => true, //开启路由
	'URL_HTML_SUFFIX' => '.html',*/
	
			   //'USER_AUTH_ON'=>true,
			   //'REQUIRE_AUTH_MODULE'=>'JobApply',		// 默认需要认证模块
			   //'REQUIRE_AUTH_ACTION'=>'',		// 默认需要认证操作
			   );
$conf = array_merge($config,$array);
//var_dump($conf);
return $conf;

?>