<?php
/**
 * 
 * 新闻
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: NewsAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class NewsAction extends GlobalAction
{
    public $dao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('News');
        $this->assign('moduleTitle', '新闻中心');
        $data['newsCategory'] = getCategory($this->globalCategory, 1,0);
        $this->assign($data);
    }
    
    /**
     * 列表
     *
     */
    public function index()
    {
        $category = intval($_GET['category']);
        $category && $condition['category_id'] = array('eq', $category);
        $condition['a.status'] = array('eq', 0);
        $this->assign('category', $category);
        parent::getJoinList($condition, 'a.id DESC', 15, C('DB_PREFIX').'news a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
    
    /**
     * 内容
     *
     */
    public function detail(){
        $titleId = intval($_GET['item']);
        $commentCount = M('Comment')->where("title_id={$titleId} and module='News'")->count();
        $this->assign('commentCount', $commentCount);
        parent::getJoinDetail(array("a.id={$titleId}", "id={$titleId}"), 'view_count', C('DB_PREFIX').'news a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
}