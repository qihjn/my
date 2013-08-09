<?php
/**
 * 
 * 首页
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: IndexAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class IndexAction extends GlobalAction 
{
    /**
     * 系统首页
     *
     */
	public function index(){
		$this->display();
	}	
}