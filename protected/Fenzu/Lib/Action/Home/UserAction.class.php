<?php
// 继承公共的基类库
class UserAction extends BaseAction{

    // 首页
    public function index()
    {
            echo $this->myfun();
    }

    // 其它操作
    public function other()
    {
        echo $this->myfun();
    }

}
?>