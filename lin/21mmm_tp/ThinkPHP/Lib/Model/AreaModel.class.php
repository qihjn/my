<?php
/**
  * 省，市，县类
  * 默认名为省表
  */
class AreaModel extends CommonModel {
	protected $trueTableName = 'dbo_province'; 
	/*得到省的列表及code
	 和下面有些重复代码，先凑和用吧。
	*/
	function getProvince(){
		$province = F('province','',C('CACHE_ARRAY')); //echo C('CACHE_ARRAY');
		if($province){
			return $province;
		}
		
		$sql="select code,title from dbo_province";
		$r=$this->query($sql);
		
		$province=array();
		foreach($r as $k=>$v){
			$province[$v['code']]=$v['title'];
		}
		F('province',$province,C('CACHE_ARRAY'));
		return $province;
		
		
	}
	
	/**
	  * 得到地级市
	  */
	function getCity($province = ''){
		return '';
	}

}
?>