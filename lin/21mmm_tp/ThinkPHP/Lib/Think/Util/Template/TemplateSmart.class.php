<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://domain All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: name
// +----------------------------------------------------------------------
// $Id$

/**
 +------------------------------------------------------------------------------
 * Smart模板引擎解析类
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author name
 * @version  $Id$
 +------------------------------------------------------------------------------
 */
class TemplateSmart
{
    /**
     +----------------------------------------------------------
     * 渲染模板输出
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $templateFile 模板文件名
     * @param array $var 模板变量
     * @param string $charset 模板输出字符集
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    public function fetch($templateFile,$var,$charset) {
        $templateFile=substr($templateFile,strlen(TMPL_PATH));
        vendor('SmartTemplate.class#smarttemplate');
        $tpl = new SmartTemplate($templateFile);
        if(C('TMPL_ENGINE_CONFIG')) {
            $config  =  C('TMPL_ENGINE_CONFIG');
            foreach ($config as $key=>$val){
                $tpl->{$key}   =  $val;
            }
        }else{
            $tpl->caching = C('TMPL_CACHE_ON');
            $tpl->template_dir = TMPL_PATH;
            $tpl->temp_dir = CACHE_PATH ;
            $tpl->cache_dir = TEMP_PATH ;
        }
        $tpl->assign($var);
        $tpl->output();
    }
}
?>