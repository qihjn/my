<?php
class CommentModel extends CommonModel {
	// 自动验证设置
	/*protected $_validate	 =	 array(
		array('title','require','标题必须！',1),
		array('email','email','邮箱格式错误！',2),
		array('content','require','内容必须'),
		array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
		);*/
	// 自动填充设置
	protected $_auto	 =	 array(
		//array('status','1',self::MODEL_INSERT),
		array('ctime','time',self::MODEL_INSERT,'function'),
		);
	
	
	public function insert(){
		//修改post数据
		if($_POST['secondtype']){
			$_POST['secondtype'] = implode(",",$_POST['secondtype']);
		}
		if(!$_POST['description']){
			$_POST['description'] = msubstr(strip_tags($_POST['content']),0,255);
		}
		if($vo = $this->create()) {
			$id = $this->add();
		}
		if($id){
			$f = M("File");
			$tid = $_POST['tempid'];
			$f->where("tid = $tid")->setField('tid',$id);
		}
		//var_dump($_POST);exit();
		//上传图片
		/*if($_FILES['productimg']['name']){
			$f = D('File');
			$thumb = $f->insert($this->name,$id); //图片添加
			if($thumb){
				$data['thumb'] = $thumb;
				$this->where("id = $id")->save($data);
			}
		}*/
	}
	
	//public function create();
	
	/**
	 * 更新
	 */
	public function update(){
		//上传图片
		/*if($_FILES['productimg']['name']){
			$f = D('File');
			$thumb = $f->insert($this->name,$id); //图片添加
			if($thumb){
				$data['thumb'] = $thumb;
				$this->where("id = $id")->save($data);
			}
		}*/
		
		/*$f = D('File');
		$f->coverImg();*/
		
		if($_POST['secondtype']){
			$_POST['secondtype'] = implode(",",$_POST['secondtype']);
		}
		if(!$_POST['description']){
			$_POST['description'] = msubstr(strip_tags($_POST['content']),0,250);
		}
		$this->create();
		return $this->save();
	}
	
	/**
	 * 读
	 */
	public function read($id = ''){
		$condition = array();
		$order = "ctime desc ";
		$numb = 10;
		if($id){
			return $this->where("id = $id")->find(); //返回1条
		}else{
			//返回多条
			
			return $this->where($condition)->order()->limt($num)->select();
		}
	}
	
	/**
	 * 删除图片记录及该主题下的所有图片文件
	 */
	public function del($id){
		if($this->where("id = $id")->delete($id)){
			import("Home.Model.FileModel");
			$f = D("File");
			$r = $f->where("tid = $id")->select();
			$id = '';
			if(is_array($r)){
				foreach($r as $k => $v){
					$id .= $v['id'].',';
				}
				$id = substr($id,0,-1);
				return $f->del($id);
			}else{
				return true; //没有图片文件，直接返回true
			}
			return "删除图片记录失败";
		}
	}
	
	
	
	public function updatePhoto(){
		if(true){
			//原来没有图片
			//直接上传
		}else{
			//原来有图片
			//得到原来图片绝对路径，覆盖掉
		}
	}
	
	public function getList($infotype, $firsttype = '', $secondtype =''){
		$condition = array();
		$infotype ? $condition['infotype'] = $infotype : '';
		$firsttype ? $condition['firsttype'] = $firsttype : '';
		$secondtype ? $condition['secondtype'] = $secondtype : '';
		return $this->where($condition)->order('ctime desc')->select();
	}

}
?>