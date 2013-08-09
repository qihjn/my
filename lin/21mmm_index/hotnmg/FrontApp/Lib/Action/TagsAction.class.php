<?php
/**
 * 
 * Tags
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: NewsAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class TagsAction extends GlobalAction
{
    public $dao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('TagsCache');
        $this->assign('moduleTitle', 'Tags');
        $this->assign($data);
    }

    /**
     * 列表
     *
     */
    public function index()
    {
        $this->dao = M('Tags');
        parent::getList($condition, 'id DESC', 50);
    }

    /**
     * 列表
     *
     */
    public function getList()
    {
        $tagName = dadds(urldecode($_GET['name']));
        $module = dadds($_GET['module']);
        $tableModule = strtolower($module);
        $condition['tag_name'] = $tagName;
        $condition['module'] = $module;
        $this->assign($condition);
        parent::getJoinList($condition, 'a.id DESC', 15, C('DB_PREFIX').'tags_cache a', C('DB_PREFIX').$tableModule.' b on a.title_id=b.id','a.*, b.title,b.create_time as ctime');
    }

    /**
     * 内容
     *
     */
    public function detail(){
        $titleId = intval($_GET['item']);
        $commentCount = M('Comment')->where("title_id={$titleId} and module='News'")->count();
        $this->assign('commentCount', $commentCount);
        parent::getJoinDetail("a.id={$titleId}", C('DB_PREFIX').'news a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
}