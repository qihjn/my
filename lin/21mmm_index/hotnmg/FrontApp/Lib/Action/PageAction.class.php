<?php
/**
 * 
 * 单页
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: PageAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class PageAction extends GlobalAction
{
    public $dao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('Page');
    }
    
    /**
     * 详细信息
     *
     */
    public function detail()
    {
		$item = trim($_GET['item']);
        parent::getDetail("link_label='{$item}'");
    }
}