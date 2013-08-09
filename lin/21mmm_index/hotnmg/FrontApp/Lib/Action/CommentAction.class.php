<?php
/**
 * 
 * 评论
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: NewsAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class CommentAction extends GlobalAction
{
    public $dao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('Comment');
        $this->assign('moduleTitle', '评论');
        $this->assign($data);
    }
    
    /**
     * 列表
     *
     */
    public function getList()
    {
        $titleId = intval($_GET['item']);
        $module = dadds(trim($_GET['module']));
        parent::getList("title_id={$titleId} and module='{$module}' and status=0");
    }

    /**
     * 提交评论
     *
     */
    public function doInsert()
    {
        $data['username'] = dadds(trim($_POST['username']));
        $data['email'] = dadds(trim($_POST['email']));
        $data['content'] = trim($_POST['content']);
        $data['module'] = trim($_POST['module']);
        $data['title_id'] = intval($_POST['title_id']);
        $data['ip'] = get_client_ip();
        $data['create_time'] = time();
        $verifyCode = intval(trim($_POST['verifyCode']));
        if(empty($data['username']) || empty($data['content'])){
            echo 'emptyInfo';
            exit();
        }elseif(md5($verifyCode) != Session::get('verify'))
        {
            echo 'errorVerifyCode';
            exit();
        }
        if($daoCreate = $this->dao->create($data))
        {
            $this->dao->status = $this->sysConfig['comment_verify'] == 1 ? 1 : 0 ;
            $daoAdd = $this->dao->add();
            if(false !== $daoAdd)
            {
                echo 'success';
                exit();
            }else
            {
                echo '评论录入错误';
                exit();
            }
        }else
        {
            echo $this->dao->getError();
            exit();
        }
    }
}