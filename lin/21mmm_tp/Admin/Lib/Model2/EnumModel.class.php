<?php
class EnumModel extends CommonModel {
	
	//var $cache;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function batchAdd(){
		$e = D('Enum');
		$ename = explode("\r\n",$_POST['ename']);
		$evalue = explode("\r\n",$_POST['evalue']);
		for($i=0; $i < count($ename); $i++){
			$data['ename'] = $ename[i];
			$data['evalue'] =  $evalue[i];
			$data['egroup'] = $_POST['egroup'];
			$this->add($data);
		}
		$this->createCache();
		
	}
	
	/**
     * 创建整个缓存                            1 
     * @param string $group 组名
     * @return select的html
     */
	public function createCache(){
		$r = $this->select();
		$r = $this->IDToKey($r);
		F($this->name, $r,C('CACHE_ARRAY'));
		return $r;
	}
	
	/**
     * 创建某个arr缓存                          2
     * @param string $group 组名
     * @return select的html
     */
	public function createOneArray($group){
		$cache = F($this->name, '', C('CACHE_ARRAY'));
		$r = array();
		foreach($cache as $k => $v){
			if($v['egroup'] == $group){
				$r[] = $v;
			}
		}
		return $r;
	}
	
	/**
     * 创建某个缓存通过db                        2
     * @param string $group 组名
     * @return select的html
     */
	public function createOneArrayByDB($group){
		$r = $this->where("egroup = '$group'")->select();
		$r = $this->IDToKey($r);
		if($r){
			F($group, $r,C('CACHE_ARRAY'));
		}
		return $r;
	}

	/**                                         3
     * 创建所有下拉列表html缓存
     * @param string $group 组名
     * @return select的html
     */
	public function createAllSelectHTML(){
		$cache = $this->getCache();
		$groups = $this->group('egroup')->select();
		foreach($groups as $k => $v){
			$this->createOneHTML($v['egroup'],$v['egroup'], 'system');
		}
	}

	/**                                         3
     * 创建某个html缓存
     * @param string $group 组名
     * @return select的html
     */
	public function createOneHTML($group, $name = '', $type = 'one'){
		$cache = $this->createOneArrayByDB($group);
		if(!$name){
			$name = $group;
		}
		if($type == 'system'){
			$name = "_$name";
		}
		$r = "<select id='$name' name='$name'>";
		foreach($cache as $k => $v){
			$r .= "<option value='{$v['evalue']}'>{$v['ename']}</option>\r\n";
		}
		$r .= "</select>";
		F($group, $r,C('CACHE_INPUT'));
		return $r;
	}

	/**
     * 得到整个缓存
     * @param string $group 组名
     * @return select的html
     */
	public function getCache($r = ''){
		$r = F($this->name, '', C('CACHE_ARRAY'));
		if(!$r){
			$r = $this->createCache();
		}
		return $r;
	}
	

	
	/**
     * 得到某个下拉列表的arr
     * @param string $group 组名
     * @return select的html
     */
	public function getOneArray($group){
		$cache = $this->getCache();
		$r = F($group, '', C('CACHE_ARRAY'));
		if(!$r){
			$r = $this->createOneArray($group);
		}
		return $r;
	}
	
	/**
     * 得到某个下拉列表的html
     * @param string $group 组名
     * @return select的html
     */
	public function getOneHTML($group, $name = ''){
		$r = F($group, '', C('CACHE_INPUT'));
		if($r){
			$r = str_replace("_$group", $name, $r);
		} else {
			$r = $this->createOneHTML($group, $name);
		}
		return $r;
	}
	
	/**
     * 得到某个下拉列表的html,通过数组生成
     * @param string $group 组名
     * @return select的html
     */
	public function getSelect($group, $name = '',$value='',$vway='key'){
		$cache = $this->createOneArrayByDB($group);
		$option = '';
		
		$r = "<select id='$name' name='$name'>";
		foreach($cache as $k => $v){
			$selected = '';
			if($v['evalue'] == $value){
				$selected = " selected='selected'";
			}
			
			if($vway == 'key'){
				$option = "<option value='{$k}' $selected>{$v['ename']}</option>\r\n";
			}elseif($vway == 'value'){
				$option = "<option value='{$v['evalue']}' $selected>{$v['ename']}</option>\r\n";
			}else{
				$option = "<option $selected>{$v['ename']}</option>\r\n";
			}
			$r .= $option;
		}
		$r .= "</select>";
		
		return $r;
	}
	
	/**
     * 得到某个radiobutton
     * @param string $group 组名
     * @return select的html 
     */
	public function getRadio($group, $name = '',$value = ''){
		$cache = $this->getOneArray($group);
		$r = "";
		$default = false; //默认选中标志位
		foreach($cache as $k => $v){
			$selected = '';
			if(empty($value) && !$default){
				$selected = " checked='checked' ";
				$default = true;
			} elseif($v['evalue'] == $value){
				$selected = " checked='checked' ";
			} 
			$r .= "<input  type='radio' name='$name' id='$name' value='{$v['evalue']}' $selected /> {$v['ename']}\r\n";
		}
		return $r;
	}
	
	/**
     * 得到checkbox
     * @param string $group 组名
     * @return select的html //代码与getRadio一样，就是 type,和name,id代码不一样
     */
	public function getCheckbox($group, $name = '',$value = ''){
		$cache = $this->getOneArray($group);
		$r = "";
		$default = false;
		foreach($cache as $k => $v){
			$selected = '';
			if(empty($value) && !$default){
				$selected = " checked='checked' ";
				$default = true;
			} elseif($v['evalue'] == $value){
				$selected = " checked='checked' ";
			} 
			$r .= "<input  type='checkbox' name='$name\[\]' id='$name_$k' value='{$v['evalue']}' $selected /> {$v['ename']}\r\n";
		}
		return $r;
	}
	
	/**
	 * 将id作为数组key
	 */
	public function IDToKey($arr){
		foreach($arr as $k => $v){
			$r[$v['id']] = $v;
		}
		return $r;
	}
	
	/**
     * 根据id得到分类的名称
     * @param mixed $id  
     * @return string
     */
	public function getTitle($id){
		$r = F('Enum','',C('CACHE_ARRAY'));
		if($r){
			return $r[$id]['ename'];
		}else{
			$this->createCache();
			return $this->where("id=$id")->getField('ename');
		}
	}
}
?>