<?php
// 项目分组测试
class IndexAction extends BaseAction
{
    // 测试默认指向的模板
    public function index()
    {
        echo $this->myfun();
        $this->display();
    }

    // 测试项目分组独自配置文件
    public function other()
    {
       dump ( C('DEFAULT_TEST') );
    }

    // 测试常规路由定义
    public function routes1()
    {
        $str = '路由测试：<br>当前分组：'.GROUP_NAME;
        $str.= '<br />当前模块：'.MODULE_NAME;
        $str.= '<br />当前操作：'.ACTION_NAME;
        $str.= '<br />路由名称为:system';
        $str.= '<br />传入的$_GET["id"]为'.$_GET['id'];
        $str.= "<br />路由使用常规定义:'system'=>array('Admin.Index','route1','id')";
        echo $str;
    }

    // 测试泛路由定义
    public function routes2()
    {
        $str = '路由测试：<br>当前分组：'.GROUP_NAME;
        $str.= '<br />当前模块：'.MODULE_NAME;
        $str.= '<br />当前操作：'.ACTION_NAME;
        $str.= '<br />路由名称为:abc';
        $str.= '<br /><br />使用了泛路由定义，以正则检测传入参数:<br />';
        if ($_GET['id']) {
            $str.= '<br />当传入abc/123 这样的URL时：';
            $str.= '<br />传入的$_GET["id"]为'.$_GET['id'];
        }
        elseif($_GET['year']) {
            $str.= '<br />当传入abc/2009/06 这样的URL时：<br />';
            $str.= '<br />传入的$_GET["year"]为'.$_GET['year'];
            $str.= '<br />传入的$_GET["month"]为'.$_GET['month'].'<br /><br />';
        }
        echo $str;
        print <<<EOT
        'abc@'=>array(<br />
        &nbsp;&nbsp;&nbsp;&nbsp;array('/^\/(\d+)(\/p\/\d)?$/','Admin.Index','routes2','id'),    <br />
        &nbsp;&nbsp;&nbsp;&nbsp;array('/^\/(\d+)\/(\d+)/','Admin.Index','routes2','year,month'),<br />
        ),<br />
EOT;

    }
}
?>