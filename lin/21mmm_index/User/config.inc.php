<?php

//ucexample_2.php 用到的应用程序数据库连接参数
$dbhost = 'localhost';			// 数据库服务器
$dbuser = '21mmm';			// 数据库用户名
$dbpw = 'lin21mmm';				// 数据库密码
$dbname = '21mmm_tp';			// 数据库名
$pconnect = 0;				// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'example_';   		// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'gbk';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定

//同步登录 Cookie 设置
$cookiedomain = ''; 			// cookie 作用域
$cookiepath = '/';			// cookie 作用路径

// ============================================================================
// ucenter配置

define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', '21mmm');
define('UC_DBPW', 'lin21mmm');
define('UC_DBNAME', '21mmm_ucenter');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', '`21mmm_ucenter`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '2089z72im0dHgJ+dXf+9khzdvkkZ61eKDwjkZZY');
define('UC_API', 'http://www.21mmm.com/uc_server');
define('UC_CHARSET', 'gbk');
define('UC_IP', '');
define('UC_APPID', '6');
define('UC_PPP', '20');
