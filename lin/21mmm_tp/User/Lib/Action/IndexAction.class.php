<?php
class IndexAction extends CommonAction {
	// 框架首页
	public function index() {
		C ( 'SHOW_RUN_TIME', false ); // 运行时间显示
		C ( 'SHOW_PAGE_TRACE', false );
		$r = getUserInfo();
		//dump($_SESSION);
		//dump($r);
		//$this->display();
		switch ($r['u_type']) {
			case "person":
				//$this->display('pindex');
				//redirect(__APP__.'/Index/cindex',1,'');
			break;
			
			case "unit":
			echo "c";
				$this->display('cindex');
			break;
			
			case "school":
				$this->display('sindex');
			break;
			
			default:
				$this->display();
			break;
		}
		
	}

}
?>