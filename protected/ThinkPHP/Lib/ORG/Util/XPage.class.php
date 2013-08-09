<?php
	class XPage extends Think{
		// 起始行数
		public $firstRow	;
		// 列表每页显示行数
		public $listRows	;
		// 样式
		public $style=0;
		// CSS类名
		public $classNames=array("default","baidu","digg","yahoo","meneame","flickr","sabrosus","pagination","scott","quotes","black","black2","grayr","yellow","jogger","starcraft2","tres","megas512","technorati","youtube","msdn","badoo","green","viciao","yahoo2");
		// 页数跳转时要带的参数
		public $parameter  ;
		// 分页总页面数
		protected $totalPages  ;
		// 总行数
		protected $totalRows  ;
		// 当前页数
		protected $nowPage    ;
		// 分页的栏的总页数
		protected $ColPages   ;
		// 分页栏每页显示的页数
		protected $rollPage   ;
		// 分页显示定制
		protected $config  =	array('header'=>'条','prev'=>'上一页','next'=>'下一页','first'=>'首页','last'=>'尾页','theme'=>'总<span>%totalPage%</span>页 第<span>%nowPage%</span>页 %first%  %upPage%  %linkPage% %downPage%  %end% 共<span>%totalRow%</span>%header%');

		/**
		 +----------------------------------------------------------
		 * 架构函数
		 +----------------------------------------------------------
		 * @access public
		 +----------------------------------------------------------
		 * @param array $totalRows  总的记录数
		 * @param array $listRows  每页显示记录数
		 * @param array $parameter  分页跳转的参数
		 +----------------------------------------------------------
		 */
		public function __construct($totalRows,$listRows,$parameter='') {
			$this->totalRows = $totalRows;
			$this->parameter = $parameter;
			$this->rollPage = C('PAGE_ROLLPAGE');
			$this->listRows = !empty($listRows)?$listRows:C('PAGE_LISTROWS');
			$this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
			$this->ColPages  = ceil($this->totalPages/$this->rollPage);
			$this->nowPage  = !empty($_GET[C('VAR_PAGE')])?$_GET[C('VAR_PAGE')]:1;
			if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
				$this->nowPage = $this->totalPages;
			}
			$this->firstRow = $this->listRows*($this->nowPage-1);
		}

		public function setConfig($name,$value) {
			if(isset($this->config[$name])) {
				$this->config[$name]    =   $value;
			}
		}

		/**
		 +----------------------------------------------------------
		 * 分页显示输出
		 +----------------------------------------------------------
		 * @access public
		 +----------------------------------------------------------
		 */
		public function show(){
			if(0 == $this->totalRows) return '';
			// style
			if(!is_int($this->style))$this->style=0;
			if($this->style>count($this->classNames)-1)$this->style=0;
			if($this->style>1){
				$this->config['prev']='&lt;';
				$this->config['next']='&gt;';
				$this->config['first']='&lt;&lt;';
				$this->config['last']='&gt;&gt;';
				$this->config['theme']='%first%  %upPage% %linkPage% %downPage%  %end%';
			}
			$style=$this->classNames[$this->style];
			$bd=array('','');
			if($this->style==1)$bd=array('[',']');
			//params
			$p = C('VAR_PAGE');
			$nowColPage      = ceil($this->nowPage/$this->rollPage);
			$url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
			$parse = parse_url($url);
			if(isset($parse['query'])) {
				parse_str($parse['query'],$params);
				unset($params[$p]);
				$url   =  $parse['path'].'?'.http_build_query($params);
			}
			//<>
			$upRow   = $this->nowPage-1;
			$downRow = $this->nowPage+1;
			if ($upRow>0){
				$upPage="<a href='".$url."&".$p."=$upRow'>".$this->config['prev']."</a>";
			}elseif($this->style>1){
				$upPage="<span class='disabled'>".$this->config['prev']."</span>";
			}else{
				$upPage="";
			}

			if ($downRow <= $this->totalPages){
				$downPage="<a href='".$url."&".$p."=$downRow'>".$this->config['next']."</a>";
			}elseif($this->style>1){
				$downPage="<span class='disabled'>".$this->config['next']."</span>";
			}else{
				$downPage="";
			}
			// << < > >>
			if($nowColPage == 1){
				$theFirst = "";
				$prePage = "";
				if($this->style>1){
					$theFirst="<span class='disabled'>".$this->config['first']."</span>";
				}
			}else{
				$preRow =  $this->nowPage-$this->rollPage;
				$prePage = "<a href='".$url."&".$p."=$preRow' >上".$this->rollPage."页</a>";
				$theFirst = "<a href='".$url."&".$p."=1' >".$this->config['first']."</a>";
			}
			if($nowColPage == $this->ColPages){
				$nextPage = "";
				$theEnd="";
				if($this->style>1){
					$theEnd="<span class='disabled'>".$this->config['last']."</span>";
				}
			}else{
				$nextRow = $this->nowPage+$this->rollPage;
				$theEndRow = $this->totalPages;
				$nextPage = "<a href='".$url."&".$p."=$nextRow' >下".$this->rollPage."页</a>";
				$theEnd = "<a href='".$url."&".$p."=$theEndRow' >".$this->config['last']."</a>";
			}
			// Number
			$linkPage = "";
			for($i=1;$i<=$this->rollPage;$i++){
				$page=($nowColPage-1)*$this->rollPage+$i;
				if($page!=$this->nowPage){
					if($page<=$this->totalPages){
						$linkPage .= "&nbsp;<a href='".$url."&".$p."=$page'>".$bd[0]."&nbsp;".$page."&nbsp;".$bd[1]."</a>";
					}else{
						break;
					}
				}else{
					if($this->totalPages != 1){
						$linkPage .= "&nbsp;<span class='current'>".$page."</span>";
					}
				}
			}
			//buildHtml
			$pageHtml = '<div class="'.$style.'">'.$this->config['theme'].'</div>';
			switch($style){
				case 'baidu':
				$pageHtml   =	'<div class="baidu">%upPage% %linkPage% %downPage%</div>';
				$pageStr	 =	 str_replace(
					array('%upPage%','%downPage%','%linkPage%'),
					array($upPage,$downPage,$linkPage),$pageHtml);
				break;
				default:
				$pageStr	 =	 str_replace(
					array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
					array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$pageHtml);
				break;
			}
			return $pageStr;
		}
	}
?>