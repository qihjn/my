<?php 
/**
 * 
 * AdminRole(角色组)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: AdminRoleModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class AdminRoleModel extends AdvModel
{
	protected $_validate = array(
		array('role_name', 'require', '角色组名称必填', 0, '', Model:: MODEL_BOTH),
	);
	protected $_auto = array(
		array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
		array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
	);
}