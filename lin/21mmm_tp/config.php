<?php
//所有公共配置文件
if (!defined('THINK_PATH')) exit();
define('IROOT', str_replace('\\','/',dirname(dirname(dirname(__FILE__)))));
define('ROOT_FILE',IROOT."file/");
define('DOMAIN','21mmm.cn');
define('PUB_URL','http://pub.'.DOMAIN);
define('COMPANY','unit');
define('PERSON','person');
define('SCHOOL','school');
define('PUBLIC_DATA',MMM_ROOT.'/Data'); // 公共缓存数据目录
//define('HTML_PATH','./a/'); //
//echo IROOT;exit;
$secondDomain = str_replace('.'.DOMAIN,'',$_SERVER['HTTP_HOST']);
switch($secondDomain){
	case  'p' :
		$arr['DEFAULT_GROUP']  = 'Home';
		break;
	case  'admin' :
		$arr['DEFAULT_GROUP']  = 'Admin';
		break;
	case  'file' :
		$arr['DEFAULT_GROUP']  = 'file';
		break;
	default : break;
}
//var_dump($arr);exit;
return array(
    'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	//'DB_HOST'=>'db.21mmm.com',
	'DB_NAME'=>'21mmm',
	'DB_USER'=>'21mmm',
	'DB_PWD'=>'lin21mmm',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'mmm_',
	'APP_DEBUG'=>true,
	'URL_CASE_INSENSITIVE'=>true,
	'TMPL_CACHE_ON'=>false, //关闭模板缓存
	
	
	'ROOTURL' => 'http://www.'.DOMAIN,
	'WWW_URL' => 'http://www.'.DOMAIN,
	'JOB_URL' => 'http://j.'.DOMAIN,
	'USER_URL' => 'http://u.'.DOMAIN,
	'PUBLIC_URL' => 'http://public.'.DOMAIN,
	'SCHOOL_URL' => 'http://school.'.DOMAIN,
	'SITE_TITLE'=>'中华美容网',
	//'MODELTITLE'=>'图吧',
	
	/*系统参数*/
	'SAVE_PATH' => './Public/Uploads/', //图片保存路径 
	
	'SLD' => false, //开启二级域名
	'IMG_URL' => 'http://img.'.DOMAIN.'/',
	
	
	'CACHE_HTML' =>'', //静态html
	'CACHE_ARRAY' =>PUBLIC_DATA.'/Cache/arr/', //数组缓存
	'CACHE_INPUT' =>PUBLIC_DATA.'/Cache/inputhtml/', //表单缓存，如select,checkbox
	'CACHE_CONFIG' =>'', //相关配置缓存
	'CACHE_JSON' =>PUBLIC_DATA.'/Cache/json/',
	
	'USER_AUTH_MODEL'		=>'Member',	// 默认验证数据表模型
	'USER_AUTH_KEY'			=>'authId',	// 用户认证SESSION标记
	'USER_AUTH_GATEWAY'	=>'/Public/login',	// 默认认证网关
	'AUTH_STORE_WAY'  =>'cookie',
/*	'USER_AUTH_ON'=>true,
	'USER_AUTH_TYPE'			=>1,		// 默认认证类型 1 登录认证 2 实时认证
	'USER_AUTH_KEY'			=>'authId',	// 用户认证SESSION标记
    'ADMIN_AUTH_KEY'			=>'administrator',
	'USER_AUTH_MODEL'		=>'User',	// 默认验证数据表模型
	'AUTH_PWD_ENCODER'		=>'md5',	// 用户认证密码加密方式
	'USER_AUTH_GATEWAY'	=>'/Public/login',	// 默认认证网关
	'NOT_AUTH_MODULE'		=>'',		// 默认无需认证模块
	'REQUIRE_AUTH_MODULE'=>'Supply',		// 默认需要认证模块
	//'NOT_AUTH_ACTION'		=>'',		// 默认无需认证操作
	'REQUIRE_AUTH_ACTION'=>'add,edit,delete,ulist',		// 默认需要认证操作
    'GUEST_AUTH_ON'          => false,    // 是否开启游客授权访问
    'GUEST_AUTH_ID'           =>    0,     // 游客的用户ID
	'SHOW_RUN_TIME'=>true,			// 运行时间显示
	'SHOW_ADV_TIME'=>true,			// 显示详细的运行时间
	'SHOW_DB_TIMES'=>true,			// 显示数据库查询和写入次数
	'SHOW_CACHE_TIMES'=>true,		// 显示缓存操作次数
	'SHOW_USE_MEM'=>true,			// 显示内存开销
    'DB_LIKE_FIELDS'=>'title|remark',
*/	'RBAC_ROLE_TABLE'=>'mmm_role',
	'RBAC_USER_TABLE'	=>	'mmm_role_user',
	'RBAC_ACCESS_TABLE' =>	'mmm_access',
	'RBAC_NODE_TABLE'	=> 'mmm_node',
	
	//cookie配置
	'COOKIE_PREFIX'  => 'CnMQk',
	'COOKIE_PATH'    => '/',
	'COOKIE_EXPIRE'  => '86400',
	'COOKIE_DOMAIN'  => '.'.DOMAIN,
	
	'USER_AUTH_ACTION' => 'add,insert,edit,update,remove,delete,ulist',  //前台需要验证的操作
	'DEFAULT_IMG' => 'http://img.'.DOMAIN.'/err/nofound.gif', //默认图片
	
	'PAGE_LISTROWS' => 10, //每页记录数
	'PAGE_STYLE' => 24,    //分页样式16
	
	//静态化
	//'HTML_CACHE_ON' => true,
	'HTML_CACHE_TIME'=>7200,
    'HTML_READ_TYPE'=>0,
	'HTML_FILE_SUFFIX' => '.html',
	
	//上传设置
	'w' => 150, //缩略图默认宽
	'h' => 200, //高
	'maxW' => 300, //最大宽
	'maxH' => 400,
	
	
	//邮件设置
	/*'M_DOMAIN' =>'21mmm.com', //域名
	'M_HOST' =>'mail.21mmm.com', //邮件服务器
	'M_USER' =>'21mmm889',     //用户名
	'M_PASSWORD' =>'8745356', //密码
	'M_PROT' => '',    //端口*/
	
	'M_DOMAIN' =>'163.com', //域名
	'M_HOST' =>'smtp.163.com', //邮件服务器
	'M_USER' =>'qihjn',     //用户名
	'M_PASSWORD' =>'11271279', //密码
	'M_PROT' => '',    //端口
	

	//FTP设置
	'F_HOST' => '',
	'F_PORT' => '',
	'F_USER' => '',
	'F_PASSWORD' =>'',
	
	'UC_AUTH_TABLE' =>'21mmm_ucenter.uc_members',

	'highLightKeyword' => true, //高亮关键字
);


//file_put_contents('pub_var.js','var jsDomain = "'.DOMAIN.'";'); //生成js公共变量
//return array_merge($conf);
?>

