<?php
/*80*80图片上传的类*/
class Uploadpic
{
	var $formfilename = '';  //form名称
	var $maxwidth     = 80;  //最大宽
	var $maxheight    = 80;  //最大高
	var $iszoom       = 0;   //是否等比缩放 0-否
	var $waterpath    = '';  //水印路径
	var $quality      = 90;  //压缩比例
	var $uploadfilename= ''; //新的上传路径
	var $saveold      = 0;   //是否保留原图
	var $newpicname   = '';
	var $error        = 0;
	var $maxsize      = 1024000;  //图片要小于500K
	var $bigwidth     = 800; //整图上传中的拉伸宽
	var $bigheight    = 480; //整图上传中的拉伸高
	var $savenewfilename = '';  //大图路径
	var $savepicname  = '';     //上传的PIC名字
	//设置变量(form控件名，上传目录，水印目录)
	function p_upload_set_path($formfilename = '' , $uploadfilename = '' , $waterpath = '' , $saveold = 1)
	{
		if($formfilename)
		{
			$this->formfilename = $formfilename;
		}
		if($uploadfilename)
		{
			$this->uploadfilename = $uploadfilename;
		}
		if($waterpath)
		{
			$this->waterpath = $waterpath;
		}
		$this->saveold = $saveold;
	}
	//设置上传的PIC名字
	function p_upload_set_picname($savepicname = '')
	{
		$this->savepicname = $savepicname;
	}
	//设置常量(暂略)
	function p_upload_set_variable($maxwidth = 80 , $maxheight = 80 , $quality = 90 , $maxsize = 1024000)
	{
		$this->maxwidth  = $maxwidth;
		$this->maxheight = $maxheight;
		$this->quality   = $quality;
		$this->maxsize   = $maxsize;   //最大尺寸
	}
	//开始上传
	function p_upload_now()
	{
		if($this->uploadfilename <> '')
		{
			//echo '<script>alert("' . $_FILES[$this->formfilename]['size'] . '|' . $this->maxsize . '");</script>';
			if($_FILES[$this->formfilename]['size'] > $this->maxsize)
			{
				$this->error = 1005;       //尺寸超出
				return false;
			}
			else
			{
				$oldfilename = $_FILES[$this->formfilename]['tmp_name'];
				$r_array = $this->p_upload_im($oldfilename);  //取出资源数组
				if($this->error == 0)
				{
					if($this->savepicname == '')
					{
						$picname = date("YmdHis") . rand(10000,99999);
					}
					else
					{
						$picname = $this->savepicname;
					}
					$newfilename = $this->uploadfilename . $picname . $r_array['b'];
					//保留原图
					if($this->saveold == 1 || $this->saveold == 2)
					{
						//保留原图，暂略
						$savenewfilename = $this->uploadfilename . $picname . "big" . $r_array['b'];
					}
					if($this->saveold <> 2)
					{
						$new_w_h_array = $this->p_upload_w_h($r_array['w'] , $r_array['h']);
						//开始压缩
						if(function_exists("imagecopyresampled")) 
						{  
					    if($r_array['t'] <> 1)
					    {
					      $imnewcreate = imagecreatetruecolor($new_w_h_array['w'], $new_w_h_array['h']);  
					      imagealphablending($imnewcreate, true); 
					      $isok = imagecopyresampled($imnewcreate, $r_array['r'], 0, 0, 0, 0, $new_w_h_array['w'], $new_w_h_array['h'] , $r_array['w'], $r_array['h']);  
							}
							else
							{
								$imnewcreate = imagecreate($new_w_h_array['w'], $new_w_h_array['h']);  
					      imagealphablending($imnewcreate, true); 
								$isok = imagecopyresized($imnewcreate, $r_array['r'], 0, 0, 0, 0, $new_w_h_array['w'], $new_w_h_array['h'] , $r_array['w'], $r_array['h']); 
							}
				    } 
				    else 
				    {  
				      $imnewcreate = imagecreate($new_w_h_array['w'], $new_w_h_array['w']);  
					    imagealphablending($imnewcreate, true); 
				      $isok = imagecopyresized($imnewcreate, $r_array['r'], 0, 0, 0, 0, $new_w_h_array['w'], $new_w_h_array['h'] , $r_array['w'], $r_array['h']);  
				    }
				    
				    //判断是否是gif，适时更换logo图
				    if($r_array['t'] == 1)
						{
							$this->waterpath = str_replace('.png' , '.gif' , $this->waterpath);
						}
						
				    //增加覆层
				    if(!empty($this->waterpath) && file_exists($this->waterpath))
				    {
					    $new_r_array = $this->p_upload_im($this->waterpath , 1);
							if($new_r_array['r'])
							{
					    	$r_copy = imagecopy($imnewcreate, $new_r_array['r'] , 0 , 0 , 0 , 0 , $this->maxwidth , $this->maxheight);//拷贝水印到目标文件 
					    }
					  }
					  
					  //输出图像
						switch($r_array['t'])
						{
							case 1:imagegif($imnewcreate , $newfilename, $this->quality);break; 
							case 2:imagejpeg($imnewcreate, $newfilename, $this->quality);break; 
							//case 3:imagepng($imnewcreate, $newfilename, $this->quality);break;
							//case 6:imagebmp($imnewcreate, $newfilename, $this->quality);break;
							default:return false;
						}
						//注销资源
						if(isset($imnewcreate))
						{	
							imagedestroy($imnewcreate); 
						}
						if(isset($r_array['r']))
						{	
							imagedestroy($r_array['r']); 
						}
						if(isset($new_r_array['r']))
						{	
							imagedestroy($new_r_array['r']); 
						}
						$this->newpicname = $newfilename;
					}
					//移动图像
					if($this->saveold == 1 || $this->saveold == 2)
					{
						move_uploaded_file($oldfilename , $savenewfilename);
						$this->savenewfilename = $savenewfilename;
					}
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		else
		{
			$this->error = 1004;    //form表单中控件值为空
			return false;
		}
	}
	//整图上传使用(传入的占位数组，返应出该位置是否有值)
	function p_upload_complete($ishavearray = array())
	{
		if($this->uploadfilename <> '')
		{
			if($_FILES[$this->formfilename]['size'] > $this->maxsize)
			{
				$this->error = 1005;       //尺寸超出
				return false;
			}
			else
			{
				$oldfilename = $_FILES[$this->formfilename]['tmp_name'];
				$r_array = $this->p_upload_im($oldfilename);  //取出资源数组
				if($this->error == 0)
				{
					$newfilename = $this->uploadfilename . date("YmdHis") . 'big' . rand(10000,99999) . $r_array['b'];
					//开始拉伸图片(800*600)
					$bigwidth  = $this->bigwidth;
					$bigheight = $this->bigheight;
					//开始拉伸
					if(function_exists("imagecopyresampled")) 
					{  
				    if($r_array['t'] <> 1)
				    {
				      $imnewcreate = imagecreatetruecolor($bigwidth, $bigheight);  
				      imagealphablending($imnewcreate, true); 
				      $isok = imagecopyresampled($imnewcreate, $r_array['r'], 0, 0, 0, 0, $bigwidth, $bigheight , $r_array['w'], $r_array['h']);  
						}
						else
						{
							$imnewcreate = imagecreate($bigwidth, $bigheight);  
				      imagealphablending($imnewcreate, true); 
							$isok = imagecopyresized($imnewcreate, $r_array['r'], 0, 0, 0, 0, $bigwidth, $bigheight , $r_array['w'], $r_array['h']); 
						}
			    } 
			    else 
			    {  
			      $imnewcreate = imagecreate($bigwidth, $bigheight);  
				    imagealphablending($imnewcreate, true); 
			      $isok = imagecopyresized($imnewcreate, $r_array['r'], 0, 0, 0, 0, $bigwidth, $bigheight , $r_array['w'], $r_array['h']);  
			    }
			    //判断是否是gif，适时更换logo图
			    if($r_array['t'] == 1)
					{
						$this->waterpath = str_replace('.png' , '.gif' , $this->waterpath);
					}
					//输出图像
					switch($r_array['t'])
					{
						case 1:imagegif($imnewcreate , $newfilename, $this->quality);break; 
						case 2:imagejpeg($imnewcreate, $newfilename, $this->quality);break; 
						//case 3:imagepng($imnewcreate, $newfilename, $this->quality);break;
						//case 6:imagebmp($imnewcreate, $newfilename, $this->quality);break;
						default:return false;
					}
					//注销资源
					if(isset($imnewcreate))
					{	
						imagedestroy($imnewcreate); 
					}
					if(isset($r_array['r']))
					{	
						imagedestroy($r_array['r']); 
					}
					if(isset($new_r_array['r']))
					{	
						imagedestroy($new_r_array['r']); 
					}
					//开始循环取出值并进行切割
					//echo $newfilename;
					$uparray = $this->p_upload_cut($newfilename , $ishavearray);
					//删除临时的大图
					if(is_file($newfilename))
					{
						@unlink($newfilename);
					}
					return $uparray;
				}
				else
				{
					return false;
				}
			}
		}
		else
		{
			$this->error = 1004;    //form表单中控件值为空
			return false;
		}
	}
	//进行循环切割
	function p_upload_cut($newfilename , $ishavearray)
	{
		$r_array = $this->p_upload_im($newfilename);  //取出资源数组
		if($this->error == 0)
		{
			$u_array    = array();
			$allcolnum  = ceil($this->bigwidth/$this->maxwidth);
			$alllinenum = ceil($this->bigheight/$this->maxheight);
			for($i = 1 ; $i <= $allcolnum ; $i++)
			{
				for($j = 1 ; $j <= $alllinenum ; $j++)
				{
					if(!isset($ishavearray[$j][$i]))
					{
						$ishavearray[$j][$i] = 0;
					}
					if($ishavearray[$j][$i] <> 1)
					{
						if($this->savepicname == '')
						{
							$picname = date("YmdHis") . rand(10000,99999);
						}
						else
						{
							$picname = $this->savepicname;
						}
						$base_s       = $picname . '_' . $j . '_' . $i . $r_array['b'];
						$newfilename_s   = $this->uploadfilename . $base_s;
						$u_array[$j][$i]['s'] = $newfilename_s;
						$u_array[$j][$i]['n'] = $base_s;
						
						$f_w = ($i - 1) * $this->maxwidth;
						$f_y = ($j - 1) * $this->maxheight;
						//可以上传
						if(function_exists("imagecopyresampled")) 
						{  
					    if($r_array['t'] <> 1)
					    {
					      $imnewcreate = imagecreatetruecolor($this->maxwidth, $this->maxheight);  
					      imagealphablending($imnewcreate, true); 
					      $isok = imagecopy($imnewcreate, $r_array['r'], 0, 0, $f_w, $f_y, $this->maxwidth, $this->maxheight);  
							}
							else
							{
								$imnewcreate = imagecreate($this->maxwidth, $this->maxheight);  
					      imagealphablending($imnewcreate, true); 
								$isok = imagecopy($imnewcreate, $r_array['r'], 0, 0, $f_w, $f_y, $this->maxwidth, $this->maxheight); 
							}
				    } 
				    else 
				    {  
				      $imnewcreate = imagecreate($this->maxwidth, $this->maxheight);  
					    imagealphablending($imnewcreate, true); 
				      $isok = imagecopy($imnewcreate, $r_array['r'], 0, 0, $f_w, $f_y, $this->maxwidth, $this->maxheight);  
				    }
				    
				    //判断是否是gif，适时更换logo图
				    if($r_array['t'] == 1)
						{
							$this->waterpath = str_replace('.png' , '.gif' , $this->waterpath);
						}
						
				    //增加覆层
				    if(!empty($this->waterpath) && file_exists($this->waterpath))
				    {
					    $new_r_array = $this->p_upload_im($this->waterpath , 1);
							if($new_r_array['r'])
							{
					    	$r_copy = imagecopy($imnewcreate, $new_r_array['r'] , 0 , 0 , 0 , 0 , $this->maxwidth , $this->maxheight);//拷贝水印到目标文件 
					    }
					  }
					  //输出图像
						switch($r_array['t'])
						{
							case 1:imagegif($imnewcreate , $newfilename_s, $this->quality);break; 
							case 2:imagejpeg($imnewcreate, $newfilename_s, $this->quality);break; 
							//case 3:imagepng($imnewcreate, $newfilename, $this->quality);break;
							//case 6:imagebmp($imnewcreate, $newfilename, $this->quality);break;
							default:return false;
						}
						//注销资源
						if(isset($imnewcreate))
						{	
							imagedestroy($imnewcreate); 
						}
						if(isset($new_r_array['r']))
						{	
							imagedestroy($new_r_array['r']); 
						}
					}
				}
			}
			if(isset($r_array['r']))
			{	
				imagedestroy($r_array['r']); 
			}
			return $u_array;
		}
		else
		{
			return false;
		}
	}
	//取得新上传的图片路径
	function p_upload_get_path()
	{
		$newpatharray['s'] = $this->newpicname;
		$newpatharray['n'] = str_replace('/' , '' , str_replace(dirname($this->newpicname) , '' , $this->newpicname));
		$newpatharray['big']   = basename($this->savenewfilename);
		$newpatharray['small'] = basename($this->newpicname);
		return $newpatharray;
	}
	//取得新的宽与高
	function p_upload_w_h($oldwidth = 0 , $oldheight = 0)
	{
		$oldwidth  = max($oldwidth , 0);
		$oldheight = max($oldheight , 0);
		if($oldwidth == 0 || $oldheight == 0)
		{
			$newwidth  = 0;
			$newheight = 0;
		}
		else
		{
			$w_h_b = round($oldwidth / $oldheight , 2);
			if($this->iszoom == 1)
			{
				$ischange = 0;
				if($oldwidth > $this->maxwidth)
				{
					$newwidth  = $this->maxwidth;
					$newheight = intval($this->newwidth / $w_h_b);
					$ischange  = 1;
				}
				if($newheight > $this->maxheight)
				{
					$newheight = $this->maxheight;
					$newwidth  = $newheight * $w_h_b;
					$ischange  = 1;
				}
				if($ischange  == 0)
				{
					$newwidth  = $this->maxwidth;
					$newheight = $this->maxheight;
				}
			}
			elseif($this->iszoom == 0)
			{
				$newwidth = $this->maxwidth;
				$newheight = $this->maxheight;
			}
			else
			{
				$newwidth  = 0;
				$newheight = 0;
			}
		}
		$new['w'] = $newwidth;
		$new['h'] = $newheight;
		return $new;
	}
	//取得资源(opentype=1为系统内资源打开，可以不管类型)
	function p_upload_im($path = '' , $opentype = 0)
	{
		$new_r = array();
		if(!empty($path) && file_exists($path))
		{
			$info   = @getimagesize($path);
			$width  = $info[0];
			$height = $info[1];
			$type   = $info[2];
			//echo '<script>alert("' . $type . '");</script>';
			if($opentype == 0)
			{
				switch($type)
				{
					case 1:$im = imagecreatefromgif($path);$btype='.gif';break; 
					case 2:$im = imagecreatefromjpeg($path);$btype='.jpg';break; 
					//注:png/bmp需求版本支持,暂不开放
					case 3:$this->error = 1001;$im= false;$btype='';break;   //不支持
					case 6:$this->error = 1001;$im= false;$btype='';break;   //不支持
					//case 3:$im = imagecreatefrompng($path);$btype='.png';break;
					//case 6:$im = imagecreatefromwbmp($path);$btype='.bmp';break;
					default:$this->error = 1001;$im= false;$btype='';
				}
			}
			else
			{
				switch($type)
				{
					case 1:$im = imagecreatefromgif($path);$btype='.gif';break; 
					case 2:$im = imagecreatefromjpeg($path);$btype='.jpg';break; 
					case 3:$im = imagecreatefrompng($path);$btype='.png';break;
					case 6:$im = imagecreatefromwbmp($path);$btype='.bmp';break;
					default:$this->error = 1001;$im= false;$btype='';
				}
			}
			$new_r['w']  = $width;
			$new_r['h']  = $height;
			$new_r['t']  = $type;
			$new_r['r']  = $im;
			$new_r['b']  = $btype;
			$s = implode('|' , $new_r);
			//echo '<script>alert("' . $s . '");</script>';
		}
		else
		{
			$new_r['w']  = 0;
			$new_r['h']  = 0;
			$new_r['t']  = 0;
			$new_r['r']  = false;
			$new_r['b']  = '';
			$this->error = 1002;  //无文件
		}
		return $new_r;
	}
	//返回错误值
	function p_upload_return_error()
	{
		//1001-类型不支持
		//1002-无文件
		//1003-空白
		//1004-form表单中控件名称传值为空
		//1005-文件过大
		return $this->error;
	}
}

/*
//范例：
include_once('./p_upload_class.php');
$formfilename  = FORMFILENAME;
$upladfilename = UPLOADFILEPATH;
$waterpath     = $water_path;
$up = new P_UPLOAD_CLASS;
$up -> p_upload_set_path($formfilename , $upladfilename , $waterpath);
//$up -> p_upload_set_variable($maxwidth = 80 , $maxheight = 80 , $quality = 90); //设置变量
$isok = $up -> p_upload_now();
if($isok)
{
	$uparray = $up -> p_upload_get_path();
	print_r($uparray);
}
*/
?>