<?php

class IndexAction extends Action{

	public function index(){
		$Photo	= D("Photo");
		$category = D('Category');
		
		$r = $category->select();
		$this->assign('childnav',$r);
		//切换图片
		$r = $Photo->getList('','','ctime desc',5);
		$this->assign('qiehuan',$r);
		
		// 最新排行
		$r = $Photo->getList();
		$this->assign('listnewest',$r);
		
		//图片列表第一行
		$r = $category->getOne(2);
		$this->assign('cline1',$r);
		$line1 = $Photo->getList(2,'','ctime desc',6);
		$this->assign('line1',$line1);
		
		//图片列表第二行
			//左侧2张
		$r = $category->getOne(3);
		$this->assign('cline2z',$r);
		$line2z = $Photo->getList(3,'','ctime desc',2);
		$this->assign('line2z',$line2z);	
			//右上
		$r = $category->getOne(4);
		$this->assign('cline2ys',$r);
		$line2ys = $Photo->getList(4,'','ctime desc',4);
		$this->assign('line2ys',$line2ys);	
			//右中
		$r = $category->getOne(5);
		$this->assign('cline2yz',$r);
		$line2yz = $Photo->getList(5,'','ctime desc',4);
		$this->assign('line2yz',$line2yz);	
			//右下
		$r = $category->getOne(6);
		$this->assign('cline2yx',$r);
		$line2yx = $Photo->getList(6,'','ctime desc',4);
		$this->assign('line2yx',$line2yx);
		
		//图片列表第三行
			//左侧2张
		$r = $category->getOne(7);
		$this->assign('cline3z',$r);
		$line3z = $Photo->getList(7,'','ctime desc',3);
		$this->assign('line3z',$line3z);	
			//右上
		$r = $category->getOne(8);
		$this->assign('cline3ys',$r);
		$line3ys = $Photo->getList(8,'','ctime desc',4);
		$this->assign('line3ys',$line3ys);	
			//右中
		$r = $category->getOne(9);
		$this->assign('cline3yz',$r);
		$line3yz = $Photo->getList(9,'','ctime desc',4);
		$this->assign('line3yz',$line3yz);	
			//右下
		$r = $category->getOne(10);
		$this->assign('cline3yx',$r);
		$line3yx = $Photo->getList(10,'','ctime desc',4);
		$this->assign('line3yx',$line3yx);
		
		$this->display();
	}
	
	
	/**
	 * 图片列表
	*/
	public function lists(){
		$cid = $_GET['cid'];
		$condition['title'] = array('neq','');
		$condition['thumb'] = array('neq','');
		$condition['cid'] = $cid;
		
		import("@.ORG.XPage"); 
		$Photo	= D("Photo");
		$count = $Photo->where($condition)->count();
		/*
		$p = $_GET['p'];
		if($p < 1){
			$p = 1;
		}
		if($p > $count){
			$p = $count;
		}*/
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

	/**
	 * 图片详细显示
	*/
	public function show(){
		
		$arr = array();
		$id = $_GET['id'];
		$p = $_GET['p'];
		if($p < 1){
			$p = 1;
		}
		$arr['currentpage'] = $p;
		$nextpage = $p + 1;
		
		//主题信息
		$Photo = D('Photo');
		$Photo->setInc("viewcount","id=$id",1); //viewcount字段+1
		//$list = $Photo->where("id = $id")->select();
		$list = $Photo->find($id);
		$arr['one'] = 'one';
		$arr = $arr + $list;
		$category = M('Category');
		$cid = $list['cid'];
		$r = $category->find($cid);
		$arr['category'] = $r['title'];
		$this->assign($arr);
		
		//分页
		import("@.ORG.XPage"); //import("@.ORG.UploadFile");
		$File	= M("File");
		$count = $File->where("tid = $id")->count();
		if($nextpage > $count){
			//提示最后一张或进入下一主题
			$nextpage = 1;
		}
		$Page = new XPage($count,1);
		$style = 16;
		$Page->style = $style;//设置风格
		$Page->setConfig('header','张图片');
		$Page->setConfig('pre','上一张');
		$Page->setConfig('next','下一张');
		$Page->setConfig('first','第一张');
		$Page->setConfig('last','最后一张');
		$Page->setConfig("theme","%nowPage%/%totalPage% 张 共%totalRow% %header%  %first% %end%  %linkPage% %prePage% %nextPage%   %upPage%  %downPage% ");
		$show = $Page->show(); 
		$list = $File->where("tid = $id")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('note',$list[0]['note']); //图片说明
		$this->assign('imgurl',$list[0]['imgurl']); //大图url
		$this->assign('id',$id); //主题id
		$this->assign('nextpage',$nextpage); //下一页码
		$this->assign('page',$show); //分页页码
		
		//下面滚动缩略图
		$list = $File ->where("tid = $id")->limit(10)->select(); 
		$this->assign('list',$list);
		
		$this->assignRight($Photo, $cid); //右侧
		$this->display();
	}
	
	protected function assignRight($Photo, $cid){
		//$Photo = D('Photo');
		//右侧排行
		$list = $Photo->getList($cid,'','viewcount desc');
		$this->assign('list_top',$list);
		
		//右侧列表
		$list = $Photo->getList($cid,1,'ctime desc');
		$this->assign('listup',$list);
		
		//右侧推荐图片
		$list = $Photo->getList($cid,1,'ctime desc',2);
		$this->assign('listupimg',$list);
		
		//右侧热点
		$list = $Photo->getList($cid,2,'ctime desc',4);
		$this->assign('hot',$list);
	}
	
	/**
	 * 文件上传
	*/
	public function up(){
		$Photo=M('Photo');
		$list=$Photo->order('create_time desc')->limit(2)->findAll();
		$this->assign('list',$list);
		$this->display();
	}
	
	/**
	 * 文件上传
	*/
	public function upload() {
		if(!empty($_FILES)) {
			//如果有文件上传 上传附件
			$this->_upload();
			//$this->forward();
		}
	}

	/**
	 * 文件上传处理
	*/
    protected function _upload($tid = '')
    {
        import("@.ORG.UploadFile");
        $upload = new UploadFile();
       // //设置上传文件大小
        $upload->maxSize  = 3292200 ;
        //设置上传文件类型
        $upload->allowExts  = explode(',','jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath =  './Public/Uploads/';
	    //设置需要生成缩略图，仅对图像文件有效
       //$upload->thumb =  true;
       //设置需要生成缩略图的文件后缀
	    $upload->thumbPrefix   =  'm_,s_';  //生产2张缩略图
       //设置缩略图最大宽度
		$upload->thumbMaxWidth =  '1000,200';
       //设置缩略图最大高度
		$upload->thumbMaxHeight = '800,180';
	   //设置上传文件规则
	   $upload->saveRule = uniqid;
	   //删除原图
	   $upload->thumbRemoveOrigin = true;
        if(!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        }else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            $_POST['image']  = $uploadList;
        }
		//var_dump($_POST['image']);exit;
        $model = M ('File');
        //保存当前数据对象
		if(is_array($_POST['image'])){
			//var_dump($_POST['image'][0]);exit;
			foreach($_POST['image'] as $k => $v){
				$tk = 'text'.($k+1);
				$data['note'] = $_POST[$tk];
				$data['imgurl']=$v['savename'] ;
				$data['ctime']=time() ;
				$data['tid'] = $tid;
				$list=$model->add ($data);
				if($list!==false){
					//$this->success ('上传图片成功！');
				}else{
					//$this->error ('上传图片失败!');
				}
			}
		}
	}
	


	

}
?>