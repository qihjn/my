<?php 
/**
 * 
 * Job(人才)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: JobModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

import("AdvModel");
class JobModel extends AdvModel
{
    protected $_validate = array(
        array('title', 'require', '招聘职位必填', 0, '', Model:: MODEL_BOTH),
        array('content', 'require', '详细要求必填', 0, '', Model:: MODEL_BOTH),
    );

    protected $_auto = array(
        array('title', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('link_url', 'cvHttp', Model:: MODEL_BOTH, 'function'),
        array('tags', 'formatTags', Model:: MODEL_BOTH, 'function'),
        array('create_time', 'strtotime', Model:: MODEL_BOTH, 'function'),
        array('end_time', 'strtotime', Model:: MODEL_BOTH, 'function'),
		array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}