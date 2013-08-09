<?php 
/**
 * 
 * AdminLog(系统日志)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: AdminLogModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class AdminLogModel extends AdvModel
{
   protected $_auto = array(
		array('create_time', 'time', Model:: MODEL_BOTH, 'function'),
	);
}