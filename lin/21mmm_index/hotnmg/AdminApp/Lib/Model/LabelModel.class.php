<?php 
/**
 * 
 * Label(保存标签)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: LabelModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class LabelModel extends AdvModel
{
    protected $_validate = array(
        array('title', 'require', '标签标题必须填写', Model::MODEL_BOTH),
        array('content', 'require', '调用代码必须填写', Model::MODEL_BOTH),

    );
    protected $_auto = array(
        array('title', 'dHtml', self::MODEL_BOTH,'function'),
        array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
        array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
    );
}