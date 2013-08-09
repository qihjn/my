<?php

/* 系统项目组可以共用的基类库，继承则可，自动加载 */
class BaseAction extends Action
{

    // 控制器初始化处理 可以让所有项目组共同使用
    function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");

        // 当前项目组名称赋值到模板变量
        $this->assign('myval',GROUP_NAME);

    }

    // 项目组都可以用到的工具函数
    protected function myfun()
    {
        return '当前项目组是：'.GROUP_NAME.'<br />模块名是：'.MODULE_NAME.'<br />操作是：'.ACTION_NAME;
    }

    public function mydisplay()
    {
        $this->display(GROUP_NAME.':'.MODULE_NAME.'_'.ACTION_NAME);
    }
}
?>