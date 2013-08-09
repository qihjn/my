<?php
class CategoryModel extends Model {
	var $arrDir;
	var $sltDir;
	var $jsonDir;
	public function __construct(){
		parent::__construct();
		$this->arrDir = C('CACHE_ARRAY');
		$this->sltDir = C('CACHE_INPUT'); //inputhtml缓存目录
		$this->jsonDir = C('CACHE_JSON');
	}


	/**
     * 插入
     * @param mixed $id  类别ID
     * @return string
     */
	public function insert($id){
		if($vo = $this->create()) {
			$r = $this->add();
			//ri($_POST);
			$this->updateCache();
			return $r;
		}
		
	}
	
	/**
     * 编辑
     * @param mixed $id  类别ID
     * @return string
     */
	public function update(){
		
		if($this->create()) {
			$r = $this->save();
			$this->updateCache();
			return $r;
		}
	}
	
	/**
	 * 批量插入
	 */
	public function batchInsert(){
		import("@.ORG.utf8pinyin");
		$pinyin = new utf8pinyin();
		//echo $pinyin->str2py("大");exit;
		$r = explode("\r\n",$_POST['title']);
		foreach($r as $k => $v){
			$data['title'] = $v;
			$data['code'] =  $pinyin->str2py($v);
			$data['parentid'] = $_POST['parentid'];
			$this->add($data);
		}
		$this->updateCache();
	}
	
	
	/**
     * 返回所有分类的数组
     */
	public function getAll(){
		$r = F('Category','',$this->arrDir);
		if($r){
			return $r;
		}else{
			return $this->updateArrayCache();
		}
	}
	
	/**
     * 返回1条类别信息
     * @param mixed $id  类别ID
     * @return record
     */
	public function getOne($id,$code = ''){
		if($code){
			//通过code
			return  $this->find($id);
		}
		return $this->find($id);
		//默认通过id
	}
	
	/*
     * 返回类别所有子类
     * @param mixed $id  父ID
     * @return string
     */
	public function getChild($pid,$deep = 0){
		if(!$deep){
			return $this->where("parentid = $pid")->select();
		}else{
			
		}
	}
	
	public function getAllChild($pid){
		$r = $this->where("parentid = $pid")->select();
		foreach($r as $k => $v){
			getAllChild($v['id']);
		}
	}
	
	/**
     * 根据id得到分类的名称
     * @param mixed $id  
     * @return string
     */
	public function getTitle($id){
		$r = F('Category','',$this->arrDir);
		if($r){
			return $r[$id]['title'];
		}else{
			$this->updateCache();
			return $this->where("id=$id")->getField('title');
		}
		
	}
	
	/**
     * 直接通过数据库得到所有分类
     * @param mixed $id  父ID
     * @return string
     */
	public function getList(){
		return $this->order("parentid asc")->select();
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
	
	public function getJson(){
		$r = F('Category','',$this->jsonDir);
		
		if($r){
			return $r;
		} else {
			$this->updateJsonCache();
			$r = F('Category','',$this->jsonDir);
			return $r;
		}
	}
	
	/**
     * 返回option html
     * @param mixed $id  类别ID
     * @return string
     */
	public function getSelect($name = 'Category',$type='',$sltname = "pareintid"){

		$sltPath = $this->sltDir.$name.'.php';
		$arrPath = $this->arrDir.$name.'.php';
		import("@.ORG.MyCache");
		import("@.ORG.ArrayO");
		$c = new MyCache();
		if(MyCache::isValid($sltPath,3600)){ //有缓存的select
			//ri("ri1");
			return include($sltPath);
		}elseif(MyCache::isValid($arrPath,3600)){ //有缓存的数组，将其生成select
			$arr = include($arrPath);
			$a = new ArrayO($arr);
			$r = $a->createSelectByDB($sltname);
			F($name,$r,$this->sltDir);  //缓存select的html
			return $r;
			
		}else{ //从数据库中读取并生成相应缓存
			//ri("ri3");
			return $this->updateSelectCache($name);
		}
	}

	/**
     * 更新所有缓存 
     * @param mixed $id  类别ID
     * @return string
     */
	public function updateCache($name = 'Category'){
		$r = $this->getList(); //从数据库中取出数据
		F($name,$r,$this->arrDir); //缓存数组
		
		//缓存成json
		$r = json_encode($r);
		F($this->name,$r,$this->jsonDir);
		
		//缓存select的html
		import("@.ORG.ArrayO");
		$a = new ArrayO($r);
		$r = $a->createSelectByDB("parentid");
		F($name,$r,$this->sltDir);  
		
		
	}
	
	/**
     * 更新数组缓存
     * @param mixed $id  类别ID
     * @return string
     */
	public function updateArrayCache($name,$type=''){
		$r = $this->getList(); //从数据库中取出数据
		//ri($this->arrDir);
		F($name,$r,$this->arrDir); //缓存数组
		return $r;
		
	}
	
	/**
     * 更新option的缓存
     * @param mixed $id  类别ID
     * @return string
     */
	public function updateSelectCache($name,$type=''){
		import("@.ORG.ArrayO");
		$r = $this->updateArrayCache($name);
		$a = new ArrayO($r);
		$r = $a->createSelectByDB("parentid");
		//ri($r);
		F($name,$r,$this->sltDir);  //缓存select的html
		return $r;
		
	}
	
	/**
     * 更新json数据缓存
     * @param mixed $id  类别ID
     * @return string
     */
	public function updateJsonCache($name){
		$r = $this->getList();
		$r = json_encode($r);
		F($this->name,$r, $this->jsonDir);
		//return $r;
	}
	
}

/**
缓存类
主要功能：生成缓存文件，得到缓存的生成时间，判断缓存是否存在

数组类
主要功能：根据数组生成下拉列表，或生成关键下拉列表，制成复选框，生成单选按扭。
 */
?>