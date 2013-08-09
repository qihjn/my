<?php
class IndexAction extends CommonAction{
	function index(){
		//dump($_SESSION['_ACCESS_LIST']);exit;
		$resume = D('Resume');
		$job = D('Job');
		$company = D('company');
		$ad = D('Ad');
		$prov = D('Province');
		
		extract($_REQUEST);
		
		//省份处理与根据ip获取省市名称
		//$ip = get_client_ip();		
		//dump($_REQUEST);
		//$code = $_REQUEST['code']; //妈B,为什么不行？
		$province = getProvince($code);
		
		
		
		//echo $province;
		//$province = $province[$code];
		/*$a = array("shanghai"=>'caonima');
		$key = $_GET['code'];dump($key);//$key = "shanghai";
		dump(C($key));*/
		
		
		
		$provinceCode = $prov->where(array("title" => array('like',"%$province%")))->getField('code');
		//$provinceCode = $prov->query("select code from __TABLE__ where title like '%$provice%'")->first();
		
		//dump($provinceCode);
		$r['province'] = $province;
		$local = areaCondition($province);
		//简历
		$w = array('local'=>$local); //default=1,默认简历
		$r['cxqz'] = $resume->getList(array_merge($w,array('status'=>1)),10);
		$r['tjrc'] = $resume->getList(array_merge($w,array('status'=>1,'up'=>1)),10);
		$r['zprc'] = $resume->getPhotoList($w,6);
		//echo $resume->getLastSql();
		$r['sxrc'] = $resume->getList(array_merge($w,array('em_type'=>array("in",array('实习','三者均可')))),10);
		$sum['resume'] = $resume->count( $resume->getPk() );
		//dump($r['sxrc']);
		//echo $resume->getLastSql();
		//$this->assign('mb','我操');
		//职位
		$w=array('workplace'=>$local);
		$r['cxzp'] = $job->listLink(array_merge($w,array()),10); //诚信招聘
		$r['tjgs'] = $job->listLink(array_merge($w,array("c.up"=>1)),10); //推荐公司
		$r['sxzw'] = $job->listLink(array_merge($w,array('emtype'=>array("in",array('实习','三者均可')))),10); //诚信招聘
		$sum['company'] = $company->count( $company->getPk() );
		$sum['job'] = $job->count( $job->getPk() );
		//dump($r['sxzw']);
		//dump($r);
		//左侧广告列表
		$r['adlist'] = $ad->getList(array("pcode" => array("in",array('-1',"$provinceCode"))),20);
		
		//省的图标
		$r['provinceCode'] = $provinceCode;
		$this->assign($r);
		
		//统计数字
		$this->assign('sum',$sum);
		$this->display();
	}
}
?>