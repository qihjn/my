<?php
	class gd{
		function __construct(){
			$this->fl='';
			$this->err='';
		}
		
	
		function read($fl){
			if(!file_exists($fl)){
				$this->err='文件不存在';
				return;
			}
			$this->fl=$fl;
		}
		
		function thumb($wh=array('w'=>null,'h'=>null)){
			if($this->err)return;
			$imageInfo =$this->getwh();
			  switch ($imageInfo["type"]){
			   case 1: //gif
			    $img = imagecreatefromgif($this->fl);
			    break;
			   case 2: //jpg
			    $img = imagecreatefromjpeg($this->fl);
			    break;
			   case 3: //png
			    $img = imagecreatefrompng($this->fl);
			    break;
			   default:
			    return 0;
			    break;
			  }
			  if (!$img)return 0;
			  if(!$wh[h])$wh[h]=300;
			  $width  = ($wh['w'] > $imageInfo["width"]) ? $imageInfo["width"] : $wh['w'];
			  $height = ($wh['w'] > $imageInfo["height"]) ? $imageInfo["height"] : $wh['h'];
			  $srcW = $imageInfo["width"];
			  $srcH = $imageInfo["height"];
			  //echo $width.$height."ddd";
			  if($srcW/$srcH){
			  	$width=($srcW/$srcH)*$height;
			  }else{
			  	$height=($srcW/$srcH)*$width;
			  }
			  
			  if (function_exists("imagecreatetruecolor")){
			   $new = imagecreatetruecolor($width, $height);
			   ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
			  }else{
			   $new = imagecreate($width, $height);
			   ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
			  }
			  $this->box=$new;
			  ImageDestroy($img);
		}
		
		function cup($pack){
			if($this->err)return;
			$imageInfo=$this->getwh();
		  switch ($imageInfo["type"]){
		   case 1: //gif
		    $img = imagecreatefromgif($this->fl);
		    break;
		   case 2: //jpg
		    $img = imagecreatefromjpeg($this->fl);
		    break;
		   case 3: //png
		    $img = imagecreatefrompng($this->fl);
		    break;
		   default:
		    return 0;
		    break;
		  }
		  if (!$img) 
		   return 0; 
		  $new = imagecreate($pack[w], $pack[h]);
		  if (function_exists("imagecreatetruecolor")){
		   $new = imagecreatetruecolor($pack[w], $pack[h]);
		   ImageCopy($new, $img, 0, 0, $pack[x], $pack[y],  $imageInfo['width'], $imageInfo['height']);
		  }else{
		   $new = imagecreate($pack[w], $pack[h]);
		   ImageCopy($new, $img, 0, 0, $pack[x], $pack[y], $imageInfo['width'], $imageInfo['height']);
		  }
		  $this->box=$new;
		}
		
		function getwh(){
			if($this->err)return;
			$data = getimagesize($this->fl);
		  $img["width"] = $data[0];
		  $img["height"]= $data[1];
		  $img['type']=$data[2];
		  return $img;  
		}
		
		function water($wtp){
			
		}
		
		function setformat($tp){
			if($this->err)return;
		}
		
		function write($to){
			if($this->err)return;
			if (file_exists($to)) unlink($to);
		  $maketype = strtolower(substr(strrchr($to,"."),1));
		  switch($maketype){
		    case "jpg": ImageJPEG($this->box, $to);break;
		    case "gif" : ImageGIF($this->box, $to);break;
		    case "png" : ImagePNG($this->box, $to);break;
		    case "wbmp" : ImageWBMP($this->box, $to);break;
		    default: ImageJPEG($this->box, $to);
		  }
		  ImageDestroy($this->box);

			
		}
	}
?>