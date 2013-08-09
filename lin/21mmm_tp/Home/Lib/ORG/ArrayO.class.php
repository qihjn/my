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

class ArrayO extends Think {
	var $arr; //要操作的数组
	var $count = 0;
	var $optionHtml='';
	public function __construct($arr){
		//Think::__construct();
		
		$this->arr = $arr;
	}
	
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function createSelect($name,$valueType = 'key'){
		//var_dump($this->arr);
		$html = '<select id="'.$name.'" name="'.$name.'">';
		foreach($this->arr as $k => $v){
			if($valueType == 'value'){
				$k = $v;
			}
			$html .= "<option vlaue = \"$k\">$v</option>\r\n";
		}
		return $html."</select>";
	}
	
	/**
     * 返回下拉列表通过数据查询出的结果
     * @param mixed $id  类别ID
     * @return string
     */
	public function createSelectByDB($name = 'categoryid', $id =0){
		$html = '<select id="'.$name.'" name="'.$name.'">';
		$html .= '<option value ="0">根类</option>';
		$html .= $this->createOption($id);
		return $html."</select>";
	}
	
	
	/**
	 * 生成无限级列表
	 * @param mixed $id  若生成所有，则id传0
	 */
	public function createOption($id = 0,$selectID = ''){
		$space = $this->createSpace($this->count);
		$this->count++;
		$r = $this->findChild($id);
		if(is_array($r)){
			foreach($r as $k => $v){
				if($selectID != $v['id']){
					$this->optionHtml .= "<option value = \"{$v['id']}\">".$space."{$v['title']}</option>\r\n";
				}else{
					$this->optionHtml .= "<option value = \"{$v['id']}\" selected=\"selected\" >".$space."{$v['title']}</option>\r\n";
				}
				//var_dump($html);exit;
				if($this->hasChild($v['id'])){
					$this->createOption($v['id']);
				}
				
			}
			$this->count--;
			return $this->optionHtml;
		}
	}
	
	/**
	 * 找到所有子类
	 */
	public function findChild($id=''){
		//ri($this->arr);
		//echo "id:".$id;
		foreach($this->arr as $k => $v){
			if($v['parentid'] == $id){
				$r[] = $v;
				
			}
		}
		//
		return $r;
	}
	
	/**
	 * 判断是否有子类
	 */
	public function hasChild($id){
		foreach($this->arr as $k => $v){
			if($id == $v['parentid']){
				return true;
			}
		}
	}
	
	public function createSpace($num){
		for($i = 0; $i < $num; $i++){
			$str .= "----";
		}
		return $str;
	}
	
	/**
     * 创建缓存
     * @param mixed $content  内容，可是是数组，配置，静态html的内容
	 * @param mixed $name      文件路径，可以是a.php或news/2008/09/7389.html
     * @return string
     */
	public function createLeverOption($content,$name){
		
	}
	
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function createCheckbox($name){
		$html = '';
		foreach($this->arr as $k => $v){
			$html .= "<input type=\"checkbox\" id=\"$name\" name=\"name\" value=\"$v\"  />";
		}
		return $html;		
	}
	
	/**
     * 返回类别名称通过id
     * @param mixed $id  类别ID
     * @return string
     */
	public function createRadio(){
		$html = '';
		foreach($this->arr as $k => $v){
			$html .= "<input type=\"checkbox\" id=\"$name\" name=\"name\" value=\"$v\"  />";
		}
		return $html;		
	}
	
	/**
     * 根据指定类型生成input
     * @param mixed $id  类别ID
     * @return string
     */
	public function createInput($arr, $type){
		switch($type){
				case "option" : 
					return $this->createOption($arr);
					break;
				case "MultOption" :
					return $this->createMultoption($arr);
					break;
				case "checkbox" :
					return $this->createCheckbox($arr);
					break;
				case "radio" :
					return $this->createRadio($arr);
					break;
				default :
				
		}	
	}
	

	
	
	
}
?>