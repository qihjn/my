<?php
// 继承公共的基类库
class IndexAction extends BaseAction {

    public function index()
    {
        $dump = array(
            '当前模块abc操作'=>'abc',
            'Admin项目组A模块B操作'=>'Admin/A模块/B操作',
            '多项目中的Blog项目A模块B操作'=>'Blog://A/B',
            '多项目中的Blog项目User分组A模块B操作'=>'Blog://User/A/B/',
            '当前模块默认模块默认操作'=>'',
            '已作常规路由处理的Admin分组Index模块routes1操作并传入id值为1'=>'system/1',
        );
        $dump2 = array(
            '访问默认项目组默认模块默认操作' =>'',
            '访问默认项目组Index模块tpl1操作'=>'Index/tpl1',
            '访问Admin项目组默认模块默认操作'=>'Admin/',
            '访问Admin项目组默认模块其它操作'=>'Admin/Index/other/',
            '访问Admin项目组User模块默认操作'=>'Admin/User/',
            '访问Admin项目组User模块其它操作'=>'Admin/User/other',
            '访问路由处理过的Admin分组Index模块routes1操作并传入id值为1'=>'system/1',
            '访问泛路由由处理过的Admin分组Index模块routes2操作并传入一个参数1'=>'abc/1',
            '访问泛路由由处理过的Admin分组Index模块routes2操作并传入两个参数2009/06'=>'abc/2009/06',
        );

        // 访问结果示例
        foreach($dump as $k=>$v)
        {
            dump( '从当前页面跳转到'.$k.': '.U($v) );
        }
        // 访问链接示例
        foreach($dump2 as $key =>$val)
        {
            echo '<a href="'.$val.'" title="'.$key.'">'.$key.'</a><br /><br />';
        }
    }

    // 使用指定模板 Admin项目组下的Index模块add.html
    public function tpl1()
    {
        echo '请看错误信息所示的模板文件';
        $this->display('Admin:Index/add');
    }

    // 使用指定模板 Admin下的add.html
    public function tpl2()
    {
        echo '请看错误信息所示的模板文件';
        $this->display('Admin:add');
    }

    public function tpl3()
    {
        $this->mydisplay();
    }

}
?>