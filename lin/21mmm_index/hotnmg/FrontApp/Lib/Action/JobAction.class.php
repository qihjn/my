<?php
/**
 * 
 * 招聘
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: NewsAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class JobAction extends GlobalAction
{
    public $dao, $resumeDao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('Job');
        $this->assign('moduleTitle', '人才招聘');
        $this->resumeDao = D('Resume', 'AdminApp');
    }
    
    /**
     * 列表
     *
     */
    public function index()
    {
        parent::getList('status=0');
    }
    
    /**
     * 内容
     *
     */
    public function detail(){
        $titleId = intval($_GET['item']);
        parent::getDetail("id={$titleId}", 'view_count');
    }

    /**
     * 提交应聘
     *
     */
    public function doResume()
    {
        $verifyCode = intval(trim($_POST['verifyCode']));
        empty($verifyCode) && parent::_message('error', '验证码必须填写');
        if(md5($verifyCode) != Session::get('verify'))
        {
            parent::_message('error', '验证码错误');
        }
        if($daoCreate = $this->resumeDao->create())
        {
            $uploadFile = upload($this->getActionName(),1,0,0);
            if ($uploadFile)
            {
                $this->resumeDao->attach_file = formatAttachPath($uploadFile[0]['savepath']) . $uploadFile[0]['savename'];
            }
            $daoAdd = $this->resumeDao->add();
            if(false !== $daoAdd)
            {
                parent::_message('success', '应聘资料提交成功，等待管理员处理');
            }else
            {
                parent::_message('error', '应聘资料提交失败，请检查必填项');
            }
        }else
        {
            parent::_message('error', $this->resumeDao->getError());
        }
    }
}