<?php
// 后台用户模块
class PluginAction extends CommonAction {
	public function improtSupplyBigType(){
		
	}
	
	public function improtSupplySmallType(){
		$xml = simplexml_load_file(CONFIG_PATH.'class.xml');
		
		foreach($xml->lists  as $l){
			$c = D('category');
			//$condition['title'] = "'".$l->biglist."'";
			$r = $c->where("title = '".$l->biglist."'")->find();
			//echo $c->getLastSql();
			//var_dump($r);exit;
			//var_dump($l->biglist);exit;
			foreach($l->list as $v){
				$v = (array)$v;
				$data['title'] = $v[0];
				$data['parentid'] = $r['id'];
				//var_dump($data);
				$c->add($data);
			}
			echo $l->biglist."<hr />";
		}
	}
}
?>