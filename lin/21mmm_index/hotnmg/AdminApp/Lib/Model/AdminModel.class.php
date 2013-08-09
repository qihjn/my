<?php 
/**
 * 
 * Admin(管理员)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: AdminModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class AdminModel extends AdvModel
{
    protected $_validate = array(
        array('username', 'require', '用户名必填', 0, '', Model:: MODEL_BOTH),
        array('password', 'require', '密码必填', 0, '', Model:: MODEL_INSERT),
        array('username', '', '用户已经存在', 1, 'unique', Model:: MODEL_INSERT),
    );
    protected $_auto = array(
        array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
		array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}