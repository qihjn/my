<?php
class PhotoAction extends CommonAction {
	public function lists(){
		$cid = $_GET['cid'];
		$condition['title'] = array('neq','');
		$condition['thumb'] = array('neq','');
		$condition['cid'] = $cid;
		
		import("Web.ORG.XPage"); 
		$Photo	= D("Photo");
		$count = $Photo->where($condition)->count();
		$Page = new XPage($count,16);
		$style = 16;
		$Page->style = $style;//设置风格
		$Page->setConfig("theme"," %first%  %upPage%  %prePage%  %linkPage% %downPage% %end% %nextPage%  第%nowPage%页  ");
		$show = $Page->show(); 
		$list = $Photo->where($condition)->order('ctime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		//类别
		$category = M('Category');
		$r = $category->find($cid); //类别
		
		$arr['list'] = $list;
		$arr['page'] = $show;
		$arr['cid'] = $cid;
		$arr['category'] = $r['title'];
		$this->assign($arr);
		$this->assignRight($Photo, $cid); //右侧
		$this->display();
	}
	
// 写入数据
	public function insert() {
		$Photo	=	D("Photo");
		if($vo = $Photo->create()) {
			$list=$Photo->add();
			if($list!==false){
				if(!empty($_FILES)) {
					//如果有文件上传 上传附件
					$this->_upload($list);
					//$this->forward();
				}
				$this->success('数据保存成功！');
			}else{
				$this->error('数据写入错误！');
			}
		}else{
			$this->error($Photo->getError());
		}
	}

	// 更新数据
	public function update() {
		$Photo	=	D("Photo");
		//$Photo->
		if($vo = $Photo->create()) {
			$list=$Photo->save();
			if($list!==false){
				$this->success('数据更新成功！');
			}else{
				$this->error("没有更新任何数据!");
			}
		}else{
			$this->error($Photo->getError());
		}
	}
	
	// 
	public function delete() {
		$id = $_GET['id'];
		if(!empty($id)) {
			import("Home.Model.PhotoModel");
			$Photo	=	D("Photo");
			if(true === $Photo->del($id)){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
		}else{
			$this->error('删除项不存在！');
		}
	}

	// 编辑数据
	public function edit() {
		
		//主题信息
		$id = $_GET['id'];
		$condition['id'] = $id;
		$Photo	= D("Photo");
		$p = $Photo->where($condition)->find();
		$this->assign('p',$p);
		
		//详细图片文件信息
		import("ORG.Util.Page"); 
		$File	= M("File");
		unset($condition);
		$condition['tid'] = $id;
		$count = $File->where($condition)->count();
		$Page = new Page($count,16);
		$Page->setConfig("theme"," %first%  %upPage%  %prePage%  %linkPage% %downPage% %end% %nextPage%  第%nowPage%页  ");
		$show = $Page->show(); 
		$list = $File->where($condition)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		//类别
		$category = M('Category');
		$r = $category->find($cid); //类别
		$arr['list'] = $list;
		$arr['page'] = $show;
		$arr['cid'] = $cid;
		$arr['category'] = $r['title'];
		$this->assign($arr);
		//$this->assignRight($Photo, $cid); //右侧
		$this->display();
	}
	
	//管理
	public function manager(){
		//if($_POST[''])
	}
	
	

}
?>