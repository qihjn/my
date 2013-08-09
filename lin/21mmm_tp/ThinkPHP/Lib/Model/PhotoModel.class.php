<?php
class PhotoModel extends Model {
	// 自动验证设置
	/*protected $_validate	 =	 array(
		array('title','require','标题必须！'),
		//array('email','email','邮箱格式错误！',2),
		array('content','require','内容必须'),
		array('title','','标题已经存在',0,'unique',self::MODEL_INSERT),
		);
	// 自动填充设置
	protected $_auto	 =	 array(
		//array('status','1',self::MODEL_INSERT),
		array('ctime','time',self::MODEL_INSERT,'function'),
		);*/
	
/*	protected $_link = array(
				'file' => array(
							'mapping_type' => HAS_ONE,
							'class_name' => 'file',
							'foreign_key' => 'id'
							),
				);*/




	/**
     * 得到照片的文字列表
     * @param mixed $cid  类别ID
	 * @param mixed $num  取多少条
     * @return 记录集
     */
	public function getList($cid = '', $attrib = '', $order ="id desc", $num = 10){
		switch($attrib){
			case 1 : $condition['up'] = 1;
				break;
			case 2 : $condition['top'] = 1;
				break;
			case 3 : $condition['hot'] = 1;
				break;
			default : break;
		}
		if($cid){
			$condition['cid'] = $cid;
		}
		$condition['thumb'] = array('neq','');
		
		$list = $this->where($condition)->order("$order")->limit($num)->select();
		return $list;
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
			}
		}else{
			return "删除记录失败";
		}
	}
}
?>