<?php
    // 空模块测试
    Class EmptyAction extends Action{

        Public function index()
        {
            // 根据当前模块名称来判断要执行哪个城市的操作
            $cityName = MODULE_NAME;
            $this->city($cityName);
        }

        Protected function city($name){
            // 和$name 这个城市相关的处理
            header("Content-Type:text/html; charset=utf-8");
            echo '当前城市:'.$name;
        }
    }
?>