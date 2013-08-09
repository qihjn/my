<?php 
/**
 * 
 * Menu(导航)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: NavigationModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class MenuModel extends AdvModel
{
    protected $_validate = array(
	    array('title', 'require', '名称必须填写', 3),
	    array('link_url', 'require', '链接地址必须填写', 3),
    );
    protected $_auto = array(
	    array('title', 'dHtml', Model:: MODEL_BOTH, 'function'),
	    array('link_url', 'cvHttp', Model:: MODEL_BOTH, 'function'),
	    array('display_order', 'intval', Model:: MODEL_BOTH, 'function'),
	    array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
	    array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}