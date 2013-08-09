<?php
// 定义ThinkPHP框架路径   
define('THINK_PATH', '../../protected/ThinkPHP');   
//定义项目名称和路径   
define('APP_NAME', 'Fenzu');   
define('APP_PATH', '../../protected/Fenzu');

define('WEB_PUBLIC_PATH', "http://public.my.cn");

define('NO_CACHE_RUNTIME',true); //不缓存核心文件
// 加载框架入口文件    
require(THINK_PATH."/ThinkPHP.php");   
  
//实例化一个网站应用实例   
$App = new App();    
//应用程序初始化   
$App->run();   

?>  