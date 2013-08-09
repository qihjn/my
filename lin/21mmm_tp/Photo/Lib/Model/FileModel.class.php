<?php
class FileModel extends Model {
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
	 * 更新信息
	 */
	public function update($post){
		
		foreach($post["title"] as $k => $v){
			$data['id'] = $k;
			$data['note'] = $v;
			$this->save($data);
		}
		return true;
	}
	
	/**
	 * 删除图片
	 */
	public function del($id){
		//获取所有缩略图url
		$condition = "id in ($id)";
		$r = $this->where($condition)->select();
		//删除文件, 不足：如果删除的图片是封面缩略图并没有将存在的图片设为默认封面
		import("ORG.Io.Files");
		$f = new Files();
		foreach($r as $k => $v){
			$filename = ROOT_FILE.$this->urlToAbsolute($url);
			$filename2 = str_replace('thumb.','',$filename);
			$f->unlinkFile($filename);
			$f->unlinkFile($filename2);
		}
		
		//删除记录,并返回bool值
		if($this->where($condition)->delete()){
			return true;
		} 
		
	}
	
	/**
     * url路径转绝对路径
     *
     * @param    string    $fileUrl
     * @param    string    $aimUrl
     * @param    boolean    $overWrite 该参数控制是否覆盖原文件
     * @return    boolean
     */
    function urlToAbsolute($url,$rootUrl= "") {
       // $url = "http://file.ionline.cn/photo5/10010327498/thumb.1611274b40c1af8074f.jpg";
		$url = substr($url,strpos($url,'/',8)+1);
		return $url;
    }
}
?>