<?php
/** 
* db.config.php
*
* @package    shuguangCMS_Corp
* @author     shuguang QQ:5565907 <web@sgcms.cn>
* @copyright  Copyright (c) 2008-2010  (http://www.sgcms.cn)
* @license    http://www.sgcms.cn/license.txt
*/

if (!defined('SHUGUANGCMS')) exit();

return array(
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'thinkcms',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_PORT' => '3306',
	'DB_PREFIX' => 'sgcorp_',
	'ADMIN_ACCESS' => 'f65dd02d03212d0cb147cf7d73e60a19',
	'APP_DEBUG' => false,
	'URL_ROUTER_ON' => false,
	'URL_DISPATCH_ON' => true,
	'URL_MODEL' => 0,
	'URL_PATHINFO_MODEL' => 2,
	'URL_PATHINFO_DEPR' => '_',
	'URL_HTML_SUFFIX' => '.html',
	'DEFAULT_THEME' => 'default',
	'TOKEN_ON' => false,
	'TOKEN_NAME' => '__hash__',
	'TOKEN_TYPE' => 'md5',
	'TMPL_CACHE_ON' => false,
	'TMPL_CACHE_TIME' => -1,
	'DB_FIELDS_CACHE' => false
);