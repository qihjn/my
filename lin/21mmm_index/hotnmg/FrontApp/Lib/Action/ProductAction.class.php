<?php
/**
 * 
 * 产品
 *
 * @package      	shuguangCMS_CORP
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: ProductAction.class.php v2.0 2010-01-01 06:59:03 shuguang $
 */

class ProductAction extends GlobalAction
{
    public $dao, $orderDao;
    function _initialize()
    {
        parent::_initialize();
        $this->dao = M('Product');
        $this->orderDao = D('Order', 'AdminApp');
        $data['productCategory'] = getCategory($this->globalCategory, 6,0);
        $this->assign('moduleTitle', '产品中心');
        $this->assign($data);
    }
    
    /**
     * 新闻列表
     *
     */
    public function index()
    {
        $category = intval($_GET['category']);
        $category && $condition['category_id'] = array('eq', $category);
        $condition['a.status'] = array('eq', 0);
        $this->assign('category', $category);
        parent::getJoinList($condition, 'a.id DESC', 15, C('DB_PREFIX').'product a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }
    
    /**
     * 浏览内容页
     *
     */
    public function detail(){
        $titleId = intval($_GET['item']);
        $commentCount = M('Comment')->where("title_id={$titleId} and module='Product'")->count();
        $this->assign('commentCount', $commentCount);
        parent::getJoinDetail(array("a.id={$titleId}", "id={$titleId}"), 'view_count', C('DB_PREFIX').'product a', C('DB_PREFIX').'category b on a.category_id=b.id','a.*, b.title as categoryName');
    }

    /**
     * 提交订单
     *
     */
    public function doOrder()
    {
        $verifyCode = intval(trim($_POST['verifyCode']));
        empty($verifyCode) && parent::_message('error', '验证码必须填写');
        if(md5($verifyCode) != Session::get('verify'))
        {
            parent::_message('error', '验证码错误');
        }
        if($daoCreate = $this->orderDao->create())
        {
            $daoAdd = $this->orderDao->add();
            if(false !== $daoAdd)
            {
                parent::_message('success', '订单提交成功，等待管理员处理');
            }else
            {
                parent::_message('error', '订单提交失败，请检查必填项');
            }
        }else
        {
            parent::_message('error', $this->orderDao->getError());
        }
    }
}