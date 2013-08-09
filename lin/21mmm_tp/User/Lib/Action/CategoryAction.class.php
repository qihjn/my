<?php
class CategoryAction extends CommonAction {
	function test(){
$url = "/Public/uploads/Supply/thumb_4bb37a93516b2.jpg";
ri(getImgPath($url));
		//import("@.ORG.Cache");
//		include('E:/21mmm/web/p/Admin/Lib/ORG/b.php');
//		$c = new Cache();
//		
//		$cate = D('Category');
//		$r = $cate->getList();
//		$r = json_encode($r);
//		var_dump($r);
		//echo $a->createOption("value");
		/*import("Think.Util.Cache.CacheFile");
		$c = new CacheFile();
		$c->b ="hi";
		
		$c = D('Category');
		$c->updateJsonCache();
		$d = F("Category");
		//var_dump($d);
		$this->assign('data',$d);*/
		//$this->display();
		
		//$b = serialize(array("a"=>"china","b"=>"usa","c"=>"japan"));
		//ri(unserialize($b));
		//if()
		
	}
	
	//function index(){
		//$c = D('Category');
		//echo $c->getSelect('cate');
		//echo C('MODELTITLE');
	//}
	
	function add(){
		$c = D('Category');
		$sltParentid = $c->getSelect();
		$this->assign('parentid',$sltParentid);
		$this->display();
	}
	
	function insert(){
		
		$this->msg($this->m->insert());
		$this->m->updateCache();
		$this->m->updateJsonCache();
		//插入数组，更新缓存
		//$c = D('Category');
		//$c->updateCache(); 
		
		//方法2 ,通过缓存类，更新相应的模型缓存。
		//$c = new MyCache();
		//$c->update('categogry');
		//var_dump($_POST);exit;
		
		//$this->display();
	
	
	}
	
	function edit(){
		$id = $_GET['id'];
		$r = $this->m->find($id);
		$parentid = $this->m->getSelect();
		$this->assign('parentid',$parentid);
		$this->assign('id',$r['parentid']);
		$this->assign('vo',$r);
		$this->display();
	}
	
	//保存
	function update(){
		if(false !== $this->m->update()){
			$this->redirect(__URL__);
		}	
	}
	
	function batchSave(){
		$c = D('Category');
		$c->batchInsert();
	}
	
	function batch(){
		$c = D('Category');
		$sltParentid = $c->getSelect();
		$this->assign('parentid',$sltParentid);
		$this->display();
	}
	
	
}	
?>