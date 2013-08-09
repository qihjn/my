<?php

import('TagLib');
/** 
 * @author Administrator
 * 
 * 
 */
class TagLibMmm extends TagLib {
/**
     +----------------------------------------------------------
     * 加载公共模板并缓存 和当前模板在同一路径，否则使用相对路径
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $tmplPublicName  公共模板文件名
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    public function parseSmallinc($tmplPublicName,$tmplVar=''){
    	$tag    = $this->parseXmlAttr($attr,'include');
        $file   =   $tag['file'];
        $tpmlVar = $tag['var'];
        if(substr($tmplPublicName,0,1)=='$')
            //支持加载变量文件名
            $tmplPublicName = $this->get(substr($tmplPublicName,1));

        if(is_file($tmplPublicName)) {
            // 直接包含文件
            $parseStr = file_get_contents($tmplPublicName);
        }else {
            $tmplPublicName = trim($tmplPublicName);
            if(strpos($tmplPublicName,'@')){
                // 引入其它模块的操作模板
                $tmplTemplateFile   =   dirname(dirname(dirname($this->templateFile))).'/'.str_replace(array('@',':'),'/',$tmplPublicName);
            }elseif(strpos($tmplPublicName,':')){
                // 引入其它模块的操作模板
                $tmplTemplateFile   =   dirname(dirname($this->templateFile)).'/'.str_replace(':','/',$tmplPublicName);
            }else{
                // 默认导入当前模块下面的模板
                $tmplTemplateFile = dirname($this->templateFile).'/'.$tmplPublicName;
            }
            $tmplTemplateFile .=  $this->config['template_suffix'];
            $parseStr = file_get_contents($tmplTemplateFile);
        }
        //ri($parseStr);
        //echo $tmplVar;//exit;
        if($tmplVar){
        	echo $parseStr;
        	$parseStr = str_replace('{$sb}',$tmplVar,$parseStr);
        	echo $parseStr;
        }
        
        //再次对包含文件进行模板分析
        return $this->parse($parseStr);
    }
}

?>