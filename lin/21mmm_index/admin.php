<?php
// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2008 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 定义ThinkPHP框架路径
define('MMM_ROOT','../21mmm_tp');
define('THINK_PATH', MMM_ROOT.'/ThinkPHP');
//定义项目名称和路径
define('APP_NAME', 'Admin');
define('APP_PATH', MMM_ROOT.'/Admin');

define('NO_CACHE_RUNTIME',True); //调试

// 加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");
//实例化一个网站应用实例
App::run();echo C('URL_CASE_INSENSITIVE');
?>