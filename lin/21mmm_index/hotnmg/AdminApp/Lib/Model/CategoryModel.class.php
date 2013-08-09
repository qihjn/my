<?php 
/**
 * 分类 Model
 *
 * @package       shuguangCMS_Corp
 * @copyright     Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license       http://www.sgcms.cn/license.txt
 * @version       $Id: NavigationAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 * @author        shuguang QQ:5565907 <web@sgcms.cn>
 */

import("AdvModel");
class CategoryModel extends AdvModel
{
    protected $_validate = array(
        array('title', 'require','标题必填',0,'',Model:: MODEL_BOTH),
    );
    protected $_auto = array(
        array('title', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
        array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}