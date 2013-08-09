<?php 
/**
 * 
 * Comment(评论)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: CommentModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class CommentModel extends AdvModel 
{
    protected $_validate = array(
	    //array('subject','require','标题必填',0,'','all'),
	    //array('content','require','内容必填',0,'','all'),
    );

    protected $_auto = array(
	    array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
        array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}