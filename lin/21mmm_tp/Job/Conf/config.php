<?php
if (!defined('THINK_PATH')) exit('没有定义 THINK_PATH');
//define('HTML_PATH','./a/');
$config	=	require MMM_ROOT.'/config.php';
$array = array(
	'province'=>array(
		'shanghai' => '上海',
		'beijing' => '北京',
		'jiangsu' => '江苏',
		'zhejiang' => '浙江',
		'guangdong' => '广东',
		'fujian' => '福建',
		'hubei' => '湖北',
		'hunan' => '湖南',
		'shangdong' => '广东',
		'sichuan' => '四川',
		'chongqing' => '重庆',
		'tianjin' => '天津',
		'liaoning' => '辽宁',
		'shangxi' => '陕西',
		'hebei' => '湖北',
		'henan' => '河南',
		'hainan' => '湖南',
		'heilongjiang' => '黑龙江',
		'jilin' => '吉林',
		'anhui' => '安徽',
		'jiangxi' => '江西',
		'guangxi' => '广西',
		'guizhou' => '贵州',
		'yunnan' => '云南',
		'gansu' => '甘肃',
		'shanxi' => '山西',
		'neimenggu' => '内蒙古',
		'ningxia' => '宁夏',
		'qinghai' => '青海',
		'xinjiang' => '新疆',
		'xizan' => '西藏',
		'taiwan' => '台湾',
		'xianggang' => '香港',
		'aomen' =>'澳门' 
	),
	
	//静态化
	//'HTML_CACHE_ON' => true,
	'HTML_CACHE_TIME'=>86400*10,
    'HTML_READ_TYPE'=>0,
	'HTML_FILE_SUFFIX' => '.html',
	
	'URL_ROUTER_ON' => true, //开启路由
	'URL_HTML_SUFFIX' => '.html',
	
			   //'USER_AUTH_ON'=>true,
			   //'REQUIRE_AUTH_MODULE'=>'JobApply',		// 默认需要认证模块
			   //'REQUIRE_AUTH_ACTION'=>'',		// 默认需要认证操作
			   );
return array_merge($config,$array);
?>