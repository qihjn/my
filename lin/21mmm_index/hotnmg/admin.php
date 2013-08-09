<?php 
/**
 * 
 * 后台管理入口
 *
 * @package      	shuguangCMS
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: admin.php v2.0 2010-01-01 06:59:03 shuguang $

 */

header("Content-type: text/html; charset=UTF-8");
if (!file_exists('./db.config.php')) die('db.config.php 不存在，请正常安装系统');
define('SHUGUANGCMS', './FrontApp');
define('CMS_DATA', './CmsData');
define('UPLOAD_PATH', './Uploads');
define('NO_CACHE_RUNTIME', true);//debug
define('THINK_PATH', './ThinkPHP');
define('APP_NAME', 'AdminApp');
define('APP_PATH', './AdminApp');
require(THINK_PATH."/ThinkPHP.php");
App::run();