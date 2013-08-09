<?php
//系统配置文件
if (!defined('THINK_PATH')) exit();
return array(

    'URL_MODEL'=>2, //默认1;URL模式：0 普通模式 1 PATHINFO 2 REWRITE 3 兼容模式
    'ROUTER_ON' =>true, // 是否开启URL路由
    'DEBUG_MODE'=>true,
    'APP_GROUP_LIST'  =>'Admin,Blog,User',
	//'DEFAULT_GROUP'=>'Fenzu', 

    //'DEFAULT_TEST'=>'默认的测试配置内容',// 测试配置
	'APP_SUB_DOMAIN_DEPLOY'=>1, //激活子域名
	/*子域名配置
	*格式如: '子域名'=>array('分组名/[模块名]','var1=a&var2=b');
	*/
	'APP_SUB_DOMAIN_RULES'=>array(
		'a'=>array('Admin/'),	//a.my.cn 访问成功					  
		'user'=>array('User/'),
		'blog'=>array('Blog/'),
		
	),

);
?>