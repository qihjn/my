<?php
class EnumAction extends CommonAction {
	public function test(){
		//echo $this->m->getOneHTML('house','ri_house');exit;
		//$this->m->createCache();
		//$this->m->createAllSelectHTML();
	}
	
	function insert() {
		//B('FilterString');
		$name=$this->getActionName();
		$model = D ($name);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		$list=$model->batchAdd();
		if ($list!==false) { 
			$this->_after_update();
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('新增成功!');
		} else {
			$this->error ('新增失败!');
		}
	}
	
	public function update(){
		$name=$this->getActionName();
		$model = D ( $name );
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		// 更新数据
		$list=$model->save ();
		if (false !== $list) {
			$this->_after_update();
			$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			$this->success ('编辑成功!');
		} else {
			//错误提示
			$this->error ('编辑失败!');
		}
	}
	
	public function _after_insert(){}
	
	public function _after_update(){
		$this->m->createCache();
		$this->m->createAllSelectHTML();
		
	}
}
?>