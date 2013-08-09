<?php
class FileModel extends Model {
	
	public function insert($modelName ='default',$tid= 0){
		$info = $this->insertPhoto($modelName);
		//var_dump($info);exit;
		if(is_array($info)){
			foreach($info as $k => $v){
				if($vo = $this->create()) {
					$this->thumb = $v['thumb'];
					$this->imgurl = $v['savename'];
					$this->type = $modelName;
					$this->ctime = time();
					$this->tid = $tid;
					$id = $this->add();
					$thumb = $v['thumb'];
				}
			}
			
			if($id){
				return $thumb;
			}else{
				return false;
			}
		}
		/*if($vo = $this->create()){
			$this->thumb = $info['thumb'];
			$this->imgurl = $info['savename'];
			$this->type = $modelName;
			//$this->utype = $utype;
			//$this->tid = $tid;
			$this->ctime = time();
			return $this->add();
		}else{
			return false;
		}*/
	}
	
	//转换图片
	public function coverImg(){
		//得到原来图片id,文件名，然后覆盖原来图片，根据id更新数据库
		//ri($_POST);
		
		if($_FILES['thumb']['name']){
			$fileinfo = getImgPath($_POST['oldimg']);
			//$modelName = $modelName.'/';
			//ri($fileinfo);
			//$modelName = $this->name.'/'; //默认使用类名，首字母是大写的。可转成小写
			import("ORG.Net.UploadFile");   
			$upload = new UploadFile(); // 实例化上传类   
			$upload->maxSize  = 3145728 ; // 设置附件上传大小
			//$upload->autoSub = true;   //子目录
			//$upload->subType = 'date';  //子目录以日期命名
			$upload->uploadReplace = true; //覆盖存在的文件
			$upload->saveRule = $fileinfo[0];
			//$upload->saveRule = uniqid;
			$upload->thumb = true;
			$upload->thumbMaxWidth = 500;
			$upload->thumbMaxHeight = 500;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型   
			$upload->savePath =  $fileinfo['path'].'/'; // 设置附件上传目录   
			if(!$upload->upload()) { // 上传错误 提示错误信息   
				$this->error($upload->getErrorMsg());   
			}else{ // 上传成功 获取上传文件信息 
				$info = $upload->getUploadFileInfo();
				if(C('SLD')){
					foreach($info as $k => $v){
						$info[$k]['savename'] = C('FILE_URL').$modelName.$v['savename'];
						$info[$k]['thumb'] = C('FILE_URL').$modelName.$upload->thumbPrefix.$v['savename'];
					}
				}else{
					foreach($info as $k => $v){
						$info[$k]['savename'] = $modelName.$v['savename'];
						$info[$k]['thumb'] = $modelName.$upload->thumbPrefix.$v['savename'];
					}
				}
				return $info;
			 }   
		}
	}
	
	
	public function insertPhoto($modelName ='default',$filename=''){
		$modelName = $modelName.'/';
		
		//$modelName = $this->name.'/'; //默认使用类名，首字母是大写的。可转成小写
		import("ORG.Net.UploadFile");   
		$upload = new UploadFile(); // 实例化上传类   
		$upload->maxSize  = 3145728 ; // 设置附件上传大小   
		$upload->saveRule = uniqid;
		$upload->thumb = true;
		$upload->thumbMaxWidth = 500;
		$upload->thumbMaxHeight = 500;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型   
		$upload->savePath =  C('SAVE_PATH').$modelName; // 设置附件上传目录   
		if(!$upload->upload()) { // 上传错误 提示错误信息   
			$this->error($upload->getErrorMsg());   
		}else{ // 上传成功 获取上传文件信息 
			$info = $upload->getUploadFileInfo();
			if(C('SLD')){
				foreach($info as $k => $v){
					$info[$k]['savename'] = C('FILE_URL').$modelName.$v['savename'];
					$info[$k]['thumb'] = C('FILE_URL').$modelName.$upload->thumbPrefix.$v['savename'];
				}
			}else{
				foreach($info as $k => $v){
					$info[$k]['savename'] = $modelName.$v['savename'];
					$info[$k]['thumb'] = $modelName.$upload->thumbPrefix.$v['savename'];
				}
			}
			return $info;
		 }   
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
	 * 移动图片到指定的主题
	 */
	public function move($id,$tid){
		//echo $id;exit;
		$data['tid'] = $tid;
		if($this->where("id in ($id)")->save($data)){
			return true;
		}
		//echo $this->getLastSql();
	}
	
	/**
     * url路径转绝对路径
     *
     * @param    string    $fileUrl
     * @param    string    $aimUrl
     */
    function urlToAbsolute($url,$rootUrl= "") {
       // $url = "http://file.ionline.cn/photo5/10010327498/thumb.1611274b40c1af8074f.jpg";
		$url = substr($url,strpos($url,'/',8)+1);
		return $url;
    }
	

	
	
}
?>