<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://domain All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: name
// +----------------------------------------------------------------------
//echo "ri";exit;
class MyCache extends Think {
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function getCacheTime(){
		return ;	
	}
	
	/**
     * 创建缓存
     * @param mixed $content  内容，可是是数组，配置，静态html的内容
	 * @param mixed $name      文件路径，可以是a.php或news/2008/09/7389.html
     * @return string
     */
	public function createCache($content,$name){
		return ;	
	}
	
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function getCacheTime2(){
		return ;	
	}
	
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function getCacheTime3(){
		return ;	
	}
	
	/**
     * 判断缓存是否有效
     * @param mixed $path  缓存路径
     * @return string
     */
	static function isValid($path,$cachePeriod = 84600){
		//echo $path;
		if(file_exists($path) && (filemtime($path) + $cachePeriod > time())){
			return true;
		}
	}
}
?>