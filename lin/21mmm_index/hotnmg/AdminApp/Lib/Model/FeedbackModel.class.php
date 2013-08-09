<?php 
/**
 * 
 * Feedback(留言)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: FeedbackModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */
 
import("AdvModel");
class FeedbackModel extends AdvModel 
{
    protected $_validate = array(
        array('title', 'require', '留言主题必填', 0, '', Model:: MODEL_BOTH),
        array('content', 'require', '留言内容必填', 0, '', Model:: MODEL_BOTH),
    );
}