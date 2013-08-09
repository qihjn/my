<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

/**
 +------------------------------------------------------------------------------
 * Think公共函数库
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 * @version  $Id$
 +------------------------------------------------------------------------------
 */

// URL组装 支持不同模式和路由
function U($url,$params=array(),$redirect=false,$suffix=true) {
    if(0===strpos($url,'/'))
        $url   =  substr($url,1);
    if(!strpos($url,'://')) // 没有指定项目名 使用当前项目名
        $url   =  APP_NAME.'://'.$url;
    if(stripos($url,'@?')) { // 给路由传递参数
        $url   =  str_replace('@?','@think?',$url);
    }elseif(stripos($url,'@')) { // 没有参数的路由
        $url   =  $url.MODULE_NAME;
    }
    // 分析URL地址
    $array   =  parse_url($url);
    $app      =  isset($array['scheme'])?   $array['scheme']  :APP_NAME;
    $route    =  isset($array['user'])?$array['user']:'';
    if(defined('GROUP_NAME') && strcasecmp(GROUP_NAME,C('DEFAULT_GROUP')))
        $group=  GROUP_NAME;
    if(isset($array['path'])) {
        $action  =  substr($array['path'],1);
        if(!isset($array['host'])) {
            // 没有指定模块名
            $module = MODULE_NAME;
        }else{// 指定模块
            if(strpos($array['host'],'-')) {
                list($group,$module) = explode('-',$array['host']);
            }else{
                $module = $array['host'];
            }
        }
    }else{ // 只指定操作
        $module = MODULE_NAME;
        $action   =  $array['host'];
    }
    if(isset($array['query'])) {
        parse_str($array['query'],$query);
        $params = array_merge($query,$params);
    }

    if(C('URL_DISPATCH_ON') && C('URL_MODEL')>0) {
        $depr = C('URL_PATHINFO_MODEL')==2?C('URL_PATHINFO_DEPR'):'/';
        $str    =   $depr;
        foreach ($params as $var=>$val)
            $str .= $var.$depr.$val.$depr;
        $str = substr($str,0,-1);
        $group   = isset($group)?$group.$depr:'';
        if(!empty($route)) {
            $url    =   str_replace(APP_NAME,$app,__APP__).'/'.$group.$route.$str;
        }else{
            $url    =   str_replace(APP_NAME,$app,__APP__).'/'.$group.$module.$depr.$action.$str;
        }
        if($suffix && C('URL_HTML_SUFFIX'))
            $url .= C('URL_HTML_SUFFIX');
    }else{
        $params =   http_build_query($params);
        if(isset($group)) {
            $url    =   str_replace(APP_NAME,$app,__APP__).'?'.C('VAR_GROUP').'='.$group.'&'.C('VAR_MODULE').'='.$module.'&'.C('VAR_ACTION').'='.$action.'&'.$params;
        }else{
            $url    =   str_replace(APP_NAME,$app,__APP__).'?'.C('VAR_MODULE').'='.$module.'&'.C('VAR_ACTION').'='.$action.'&'.$params;
        }
    }
    if($redirect)
        redirect($url);
    else
        return $url;
}

/**
 +----------------------------------------------------------
 * 字符串命名风格转换
 * type
 * =0 将Java风格转换为C的风格
 * =1 将C风格转换为Java的风格
 +----------------------------------------------------------
 * @access protected
 +----------------------------------------------------------
 * @param string $name 字符串
 * @param integer $type 转换类型
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function parse_name($name,$type=0) {
    if($type) {
        return ucfirst(preg_replace("/_([a-zA-Z])/e", "strtoupper('\\1')", $name));
    }else{
        $name = preg_replace("/[A-Z]/", "_\\0", $name);
        return strtolower(trim($name, "_"));
    }
}

// 错误输出
function halt($error) {
    if(IS_CLI)   exit ($error);
    $e = array();
    if(C('APP_DEBUG')){
        //调试模式下输出错误信息
        if(!is_array($error)) {
            $trace = debug_backtrace();
            $e['message'] = $error;
            $e['file'] = $trace[0]['file'];
            $e['class'] = $trace[0]['class'];
            $e['function'] = $trace[0]['function'];
            $e['line'] = $trace[0]['line'];
            $traceInfo='';
            $time = date("y-m-d H:i:m");
            foreach($trace as $t)
            {
                $traceInfo .= '['.$time.'] '.$t['file'].' ('.$t['line'].') ';
                $traceInfo .= $t['class'].$t['type'].$t['function'].'(';
                $traceInfo .= implode(', ', $t['args']);
                $traceInfo .=")<br/>";
            }
            $e['trace']  = $traceInfo;
        }else {
            $e = $error;
        }
        // 包含异常页面模板
        include C('TMPL_EXCEPTION_FILE');
    }
    else
    {
        //否则定向到错误页面
        $error_page =   C('ERROR_PAGE');
        if(!empty($error_page)){
            redirect($error_page);
        }else {
            if(C('SHOW_ERROR_MSG'))
                $e['message'] =  is_array($error)?$error['message']:$error;
            else
                $e['message'] = C('ERROR_MESSAGE');
            // 包含异常页面模板
            include C('TMPL_EXCEPTION_FILE');
        }
    }
    exit;
}

// URL重定向
function redirect($url,$time=0,$msg='')
{
    
	//多行URL地址支持
    $url = str_replace(array("\n", "\r"), '', $url);
    if(empty($msg))
        $msg    =   "系统将在{$time}秒之后自动跳转到{$url}！";
    
    if (!headers_sent()) {
        // redirect
        header('Content-Type:text/html;charset=utf-8'); 
    	
        if(0===$time) {
            header("Location: ".$url);
        }else {
            header("refresh:{$time};url={$url}");
            echo("<div style='width:100%; margin:0 auto; text-align:center; background-color:#ccc;' class='msg'>$msg</div>");
        }
        exit();
    }else {
        $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if($time!=0)
            $str   .=   $msg;
        
            
        exit($str);
    }
}

// 自定义异常处理
function throw_exception($msg,$type='ThinkException',$code=0)
{
    if(IS_CLI)   exit($msg);
    if(class_exists($type,false))
        throw new $type($msg,$code,true);
    else
        halt($msg);        // 异常类型不存在则输出错误信息字串
}

// 区间调试开始
function debug_start($label='')
{
    $GLOBALS[$label]['_beginTime'] = microtime(TRUE);
    if ( MEMORY_LIMIT_ON )  $GLOBALS[$label]['_beginMem'] = memory_get_usage();
}

// 区间调试结束，显示指定标记到当前位置的调试
function debug_end($label='')
{
    $GLOBALS[$label]['_endTime'] = microtime(TRUE);
    echo '<div style="text-align:center;width:100%">Process '.$label.': Times '.number_format($GLOBALS[$label]['_endTime']-$GLOBALS[$label]['_beginTime'],6).'s ';
    if ( MEMORY_LIMIT_ON )  {
        $GLOBALS[$label]['_endMem'] = memory_get_usage();
        echo ' Memories '.number_format(($GLOBALS[$label]['_endMem']-$GLOBALS[$label]['_beginMem'])/1024).' k';
    }
    echo '</div>';
}

// 浏览器友好的变量输出
function dump($var, $echo=true,$label=null, $strict=true)
{
    $label = ($label===null) ? '' : rtrim($label) . ' ';
    if(!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = "<pre>".$label.htmlspecialchars($output,ENT_QUOTES)."</pre>";
        } else {
            $output = $label . " : " . print_r($var, true);
        }
    }else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if(!extension_loaded('xdebug')) {
            $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
            $output = '<pre>'. $label. htmlspecialchars($output, ENT_QUOTES). '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}

// 取得对象实例 支持调用类的静态方法
function get_instance_of($name,$method='',$args=array())
{
    static $_instance = array();
    $identify   =   empty($args)?$name.$method:$name.$method.to_guid_string($args);
    if (!isset($_instance[$identify])) {
        if(class_exists($name)){
            $o = new $name();
            if(method_exists($o,$method)){
                if(!empty($args)) {
                    $_instance[$identify] = call_user_func_array(array(&$o, $method), $args);
                }else {
                    $_instance[$identify] = $o->$method();
                }
            }
            else
                $_instance[$identify] = $o;
        }
        else
            halt(L('_CLASS_NOT_EXIST_').':'.$name);
    }
    return $_instance[$identify];
}

/**
 +----------------------------------------------------------
 * 系统自动加载ThinkPHP基类库和当前项目的model和Action对象
 * 并且支持配置自动加载路径
 +----------------------------------------------------------
 * @param string $name 对象类名
 +----------------------------------------------------------
 * @return void
 +----------------------------------------------------------
 */
function __autoload($name)
{

	// 检查是否存在别名定义
    if(alias_import($name)) return ;
    // 自动加载当前项目的Actioon类和Model类
    if(substr($name,-5)=="Model") {
        require_cache(THINK_PATH.'/'.LIB_DIR.'/Model/'.$name.'.class.php');
    }elseif(substr($name,-6)=="Action"){
        require_cache(LIB_PATH.'Action/'.$name.'.class.php');
    }else {
        // 根据自动加载路径设置进行尝试搜索
        if(C('APP_AUTOLOAD_PATH')) {
            $paths  =   explode(',',C('APP_AUTOLOAD_PATH'));
            foreach ($paths as $path){
                if(import($path.$name)) {
                    // 如果加载类成功则返回
                    return ;
                }
            }
        }
    }
    return ;
}

// 优化的require_once
function require_cache($filename)
{
    static $_importFiles = array();
    $filename   =  realpath($filename);
    if (!isset($_importFiles[$filename])) {
        if(file_exists_case($filename)){
            require $filename;
            $_importFiles[$filename] = true;
        }
        else
        {
            $_importFiles[$filename] = false;
        }
    }
    return $_importFiles[$filename];
}

// 区分大小写的文件存在判断
function file_exists_case($filename) {
    if(is_file($filename)) {
        if(IS_WIN && C('APP_FILE_CASE')) {
            if(basename(realpath($filename)) != basename($filename))
                return false;
        }
        return true;
    }
    return false;
}

/**
 +----------------------------------------------------------
 * 导入所需的类库 同java的Import
 * 本函数有缓存功能
 +----------------------------------------------------------
 * @param string $class 类库命名空间字符串
 * @param string $baseUrl 起始路径
 * @param string $ext 导入的文件扩展名
 +----------------------------------------------------------
 * @return boolen
 +----------------------------------------------------------
 */
function import($class,$baseUrl = '',$ext='.class.php')
{
    static $_file = array();
    static $_class = array();
    $class    =   str_replace(array('.','#'), array('/','.'), $class);
    if('' === $baseUrl && false === strpos($class,'/')) {
        // 检查别名导入
        return alias_import($class);
    }    //echo('<br>'.$class.$baseUrl);
    if(isset($_file[$class.$baseUrl]))
        return true;
    else
        $_file[$class.$baseUrl] = true;
    $class_strut = explode("/",$class);
    if(empty($baseUrl)) {
		if('System' == $class_strut[0]){
			//从thinkphp系统lib里加载Model
			$baseUrl = THINK_PATH;
			//echo $class."<br />";
			$class =  str_replace('System/',LIB_DIR.'/',$class);
			//echo "c2: $class <br />";
		}
        elseif('@'==$class_strut[0] || APP_NAME == $class_strut[0] ) {
            //加载当前项目应用类库
            $baseUrl   =  dirname(LIB_PATH);
            $class =  str_replace(array(APP_NAME.'/','@/'),LIB_DIR.'/',$class);
        }elseif(in_array(strtolower($class_strut[0]),array('think','org','com'))) {
            //加载ThinkPHP基类库或者公共类库
            // think 官方基类库 org 第三方公共类库 com 企业公共类库
            $baseUrl =  THINK_PATH.'/Lib/';
        }else {
            // 加载其他项目应用类库
            $class    =   substr_replace($class, '', 0,strlen($class_strut[0])+1);
            $baseUrl =  APP_PATH.'/../'.$class_strut[0].'/'.LIB_DIR.'/';
        }
    }
    if(substr($baseUrl, -1) != "/")    $baseUrl .= "/";
    $classfile = $baseUrl . $class . $ext;
    if($ext == '.class.php' && is_file($classfile)) {
        // 冲突检测
        $class = basename($classfile,$ext);
        if(isset($_class[$class]))
            throw_exception(L('_CLASS_CONFLICT_').':'.$_class[$class].' '.$classfile);
        $_class[$class] = $classfile;
    }
    //导入目录下的指定类库文件
    return require_cache($classfile);
}

/**
 +----------------------------------------------------------
 * 基于命名空间方式导入函数库
 * load('@.Util.Array')
 +----------------------------------------------------------
 * @param string $name 函数库命名空间字符串
 * @param string $baseUrl 起始路径
 * @param string $ext 导入的文件扩展名
 +----------------------------------------------------------
 * @return void
 +----------------------------------------------------------
 */
function load($name,$baseUrl='',$ext='.php') {
    $name    =   str_replace(array('.','#'), array('/','.'), $name);
    if(empty($baseUrl)) {
        if(0 === strpos($name,'@/')) {
            //加载当前项目函数库
            $baseUrl   =  APP_PATH.'/Common/';
            $name =  substr($name,2);
        }else{
            //加载ThinkPHP 系统函数库
            $baseUrl =  THINK_PATH.'/Common/';
        }
    }
    if(substr($baseUrl, -1) != "/")    $baseUrl .= "/";
    include $baseUrl . $name . $ext;
}

// 快速导入第三方框架类库
// 所有第三方框架的类库文件统一放到 系统的Vendor目录下面
// 并且默认都是以.php后缀导入
function vendor($class,$baseUrl = '',$ext='.php')
{
    if(empty($baseUrl))  $baseUrl    =   VENDOR_PATH;
    return import($class,$baseUrl,$ext);
}

// 快速定义和导入别名
function alias_import($alias,$classfile='') {
    static $_alias   =  array();
    if('' !== $classfile) {
        // 定义别名导入
        $_alias[$alias]  = $classfile;
        return ;
    }
    if(is_string($alias)) {
        if(isset($_alias[$alias]))
            return require_cache($_alias[$alias]);
    }elseif(is_array($alias)){
        foreach ($alias as $key=>$val)
            $_alias[$key]  =  $val;
        return ;
    }
    return false;
}

/**
 +----------------------------------------------------------
 * D函数用于实例化Model
 +----------------------------------------------------------
 * @param string name Model名称
 * @param string app Model所在项目
 +----------------------------------------------------------
 * @return Model
 +----------------------------------------------------------
 */
function D($name='',$app='')
{
	static $_model = array();
    if(empty($name)) return new Model;
    if(empty($app))   $app =  C('DEFAULT_APP');
    if(isset($_model[$app.$name]))
        return $_model[$app.$name];
    $OriClassName = $name;
    if(strpos($name,C('APP_GROUP_DEPR'))) {
        $array   =  explode(C('APP_GROUP_DEPR'),$name);
        $name = array_pop($array);
        $className =  $name.'Model';
        import($app.'.Model.'.implode('.',$array).'.'.$className);
    }else{
        $className =  $name.'Model';
        import($app.'.Model.'.$className);
    }
    if(class_exists($className)) {
        $model = new $className();
    }else {
        $model  = new Model($name);
    }
    $_model[$app.$OriClassName] =  $model;
    return $model;
}

/**
 +----------------------------------------------------------
 * M函数用于实例化一个没有模型文件的Model
 +----------------------------------------------------------
 * @param string name Model名称
 +----------------------------------------------------------
 * @return Model
 +----------------------------------------------------------
 */
function M($name='',$class='Model') {
    static $_model = array();
    if(!isset($_model[$name.'_'.$class]))
        $_model[$name.'_'.$class]   = new $class($name);
    return $_model[$name.'_'.$class];
}

/**
 +----------------------------------------------------------
 * A函数用于实例化Action
 +----------------------------------------------------------
 * @param string name Action名称
 * @param string app Model所在项目
 +----------------------------------------------------------
 * @return Action
 +----------------------------------------------------------
 */
function A($name,$app='@')
{
    static $_action = array();
    if(isset($_action[$app.$name]))
        return $_action[$app.$name];
    $OriClassName = $name;
    if(strpos($name,C('APP_GROUP_DEPR'))) {
        $array   =  explode(C('APP_GROUP_DEPR'),$name);
        $name = array_pop($array);
        $className =  $name.'Action';
        import($app.'.Action.'.implode('.',$array).'.'.$className);
    }else{
        $className =  $name.'Action';
        import($app.'.Action.'.$className);
    }
    if(class_exists($className)) {
        $action = new $className();
        $_action[$app.$OriClassName] = $action;
        return $action;
    }else {
        return false;
    }
}

// 远程调用模块的操作方法
function R($module,$action,$app='@') {
    $class = A($module,$app);
    if($class)
        return call_user_func(array(&$class,$action));
    else
        return false;
}

// 获取和设置语言定义(不区分大小写)
function L($name=null,$value=null) {
    static $_lang = array();
    // 空参数返回所有定义
    if(empty($name)) return $_lang;
    // 判断语言获取(或设置)
    // 若不存在,直接返回全大写$name
    if (is_string($name) )
    {
        $name = strtoupper($name);
        if (is_null($value))
            return isset($_lang[$name]) ? $_lang[$name] : $name;
        $_lang[$name] = $value;// 语言定义
        return;
    }
    // 批量定义
    if (is_array($name))
        $_lang = array_merge($_lang,array_change_key_case($name,CASE_UPPER));
    return;
}

// 获取配置值
function C($name=null,$value=null)
{
    static $_config = array();
    // 无参数时获取所有
    if(empty($name)) return $_config;
    // 优先执行设置获取或赋值
    if (is_string($name))
    {
        if (!strpos($name,'.')) {
            $name = strtolower($name);
            if (is_null($value))
                return isset($_config[$name])? $_config[$name] : null;
            $_config[$name] = $value;
            return;
        }
        // 二维数组设置和获取支持
        $name = explode('.',$name);
        $name[0]   = strtolower($name[0]);
        if (is_null($value))
            return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
        $_config[$name[0]][$name[1]] = $value;
        return;
    }
    // 批量设置
    if(is_array($name))
        return $_config = array_merge($_config,array_change_key_case($name));
    return null;// 避免非法参数
}

// 处理标签
function tag($name,$params=array()) {
    $tags   =  C('_tags_.'.$name);
    if($tags) {
        foreach ($tags   as $key=>$call){
            if(is_callable($call))
                $result = call_user_func_array($call,$params);
        }
        return $result;
    }
    return false;
}

// 执行行为
function B($name) {
    $class = $name.'Behavior';
    require_cache(LIB_PATH.'Behavior/'.$class.'.class.php');
    $behavior   =  new $class();
    $behavior->run();
}

// 渲染输出Widget
function W($name,$data=array(),$return=false) {
    $class = $name.'Widget';
    require_cache(LIB_PATH.'Widget/'.$class.'.class.php');
    if(!class_exists($class))
        throw_exception(L('_CLASS_NOT_EXIST_').':'.$class);
    $widget  =  Think::instance($class);
    $content = $widget->render($data);
    if($return)
        return $content;
    else
        echo $content;
}

// 全局缓存设置和读取
function S($name,$value='',$expire='',$type='') {
    static $_cache = array();
    alias_import('Cache');
    //取得缓存对象实例
    $cache  = Cache::getInstance($type);
    if('' !== $value) {
        if(is_null($value)) {
            // 删除缓存
            $result =   $cache->rm($name);
            if($result)   unset($_cache[$type.'_'.$name]);
            return $result;
        }else{
            // 缓存数据
            $cache->set($name,$value,$expire);
            $_cache[$type.'_'.$name]     =   $value;
        }
        return ;
    }
    if(isset($_cache[$type.'_'.$name]))
        return $_cache[$type.'_'.$name];
    // 获取缓存数据
    $value      =  $cache->get($name);
    $_cache[$type.'_'.$name]     =   $value;
    return $value;
}

// 快速文件数据读取和保存 针对简单类型数据 字符串、数组
function F($name,$value='',$path=DATA_PATH) {
    static $_cache = array();
    $filename   =   $path.$name.'.php';
    if('' !== $value) {
        if(is_null($value)) {
            // 删除缓存
            return unlink($filename);
        }else{
            // 缓存数据
            $dir   =  dirname($filename);
            // 目录不存在则创建
            if(!is_dir($dir))  mkdir($dir);
            return file_put_contents($filename,"<?php\nreturn ".var_export($value,true).";\n?>");
        }
    }
    if(isset($_cache[$name])) return $_cache[$name];
    // 获取缓存数据
    if(is_file($filename)) {
        $value   =  include $filename;
        $_cache[$name]   =   $value;
    }else{
        $value  =   false;
    }
    return $value;
}

// 根据PHP各种类型变量生成唯一标识号
function to_guid_string($mix)
{
    if(is_object($mix) && function_exists('spl_object_hash')) {
        return spl_object_hash($mix);
    }elseif(is_resource($mix)){
        $mix = get_resource_type($mix).strval($mix);
    }else{
        $mix = serialize($mix);
    }
    return md5($mix);
}

//[RUNTIME]
// 编译文件
function compile($filename,$runtime=false) {
    $content = file_get_contents($filename);
    if(true === $runtime)
        // 替换预编译指令
        $content = preg_replace('/\/\/\[RUNTIME\](.*?)\/\/\[\/RUNTIME\]/s','',$content);
    $content = substr(trim($content),5);
    if('?>' == substr($content,-2))
        $content = substr($content,0,-2);
    return $content;
}

// 去除代码中的空白和注释
function strip_whitespace($content) {
    $stripStr = '';
    //分析php源码
    $tokens =   token_get_all ($content);
    $last_space = false;
    for ($i = 0, $j = count ($tokens); $i < $j; $i++)
    {
        if (is_string ($tokens[$i]))
        {
            $last_space = false;
            $stripStr .= $tokens[$i];
        }
        else
        {
            switch ($tokens[$i][0])
            {
                //过滤各种PHP注释
                case T_COMMENT:
                case T_DOC_COMMENT:
                    break;
                //过滤空格
                case T_WHITESPACE:
                    if (!$last_space)
                    {
                        $stripStr .= ' ';
                        $last_space = true;
                    }
                    break;
                default:
                    $last_space = false;
                    $stripStr .= $tokens[$i][1];
            }
        }
    }
    return $stripStr;
}
// 根据数组生成常量定义
function array_define($array) {
    $content = '';
    foreach($array as $key=>$val) {
        $key =  strtoupper($key);
        if(in_array($key,array('THINK_PATH','APP_NAME','APP_PATH','RUNTIME_PATH','RUNTIME_ALLINONE','THINK_MODE')))
            $content .= 'if(!defined(\''.$key.'\')) ';
        if(is_int($val) || is_float($val)) {
            $content .= "define('".$key."',".$val.");";
        }elseif(is_bool($val)) {
            $val = ($val)?'true':'false';
            $content .= "define('".$key."',".$val.");";
        }elseif(is_string($val)) {
            $content .= "define('".$key."','".addslashes($val)."');";
        }
    }
    return $content;
}
//[/RUNTIME]

// 循环创建目录
function mk_dir($dir, $mode = 0755)
{
  if (is_dir($dir) || @mkdir($dir,$mode)) return true;
  if (!mk_dir(dirname($dir),$mode)) return false;
  return @mkdir($dir,$mode);
}

// 自动转换字符集 支持数组转换
function auto_charset($fContents,$from,$to){
    $from   =  strtoupper($from)=='UTF8'? 'utf-8':$from;
    $to       =  strtoupper($to)=='UTF8'? 'utf-8':$to;
    if( strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents)) ){
        //如果编码相同或者非字符串标量则不转换
        return $fContents;
    }
    if(is_string($fContents) ) {
        if(function_exists('mb_convert_encoding')){
            return mb_convert_encoding ($fContents, $to, $from);
        }elseif(function_exists('iconv')){
            return iconv($from,$to,$fContents);
        }else{
            return $fContents;
        }
    }
    elseif(is_array($fContents)){
        foreach ( $fContents as $key => $val ) {
            $_key =     auto_charset($key,$from,$to);
            $fContents[$_key] = auto_charset($val,$from,$to);
            if($key != $_key )
                unset($fContents[$key]);
        }
        return $fContents;
    }
    else{
        return $fContents;
    }
}

// xml编码
function xml_encode($data,$encoding='utf-8',$root="think") {
    $xml = '<?xml version="1.0" encoding="'.$encoding.'"?>';
    $xml.= '<'.$root.'>';
    $xml.= data_to_xml($data);
    $xml.= '</'.$root.'>';
    return $xml;
}

function data_to_xml($data) {
    if(is_object($data)) {
        $data = get_object_vars($data);
    }
    $xml = '';
    foreach($data as $key=>$val) {
        is_numeric($key) && $key="item id=\"$key\"";
        $xml.="<$key>";
        $xml.=(is_array($val)||is_object($val))?data_to_xml($val):$val;
        list($key,)=explode(' ',$key);
        $xml.="</$key>";
    }
    return $xml;
}

/**
 +----------------------------------------------------------
 * Cookie 设置、获取、清除 (支持数组或对象直接设置) 2009-07-9
 +----------------------------------------------------------
 * 1 获取cookie: cookie('name')
 * 2 清空当前设置前缀的所有cookie: cookie(null)
 * 3 删除指定前缀所有cookie: cookie(null,'think_') | 注：前缀将不区分大小写
 * 4 设置cookie: cookie('name','value') | 指定保存时间: cookie('name','value',3600)
 * 5 删除cookie: cookie('name',null)
 +----------------------------------------------------------
 * $option 可用设置prefix,expire,path,domain
 * 支持数组形式:cookie('name','value',array('expire'=>1,'prefix'=>'think_'))
 * 支持query形式字符串:cookie('name','value','prefix=tp_&expire=10000')
 */
function cookie($name,$value='',$option=null)
{
    // 默认设置
    $config = array(
        'prefix' => C('COOKIE_PREFIX'), // cookie 名称前缀
        'expire' => C('COOKIE_EXPIRE'), // cookie 保存时间
        'path'   => C('COOKIE_PATH'),   // cookie 保存路径
        'domain' => C('COOKIE_DOMAIN'), // cookie 有效域名
    );
    // 参数设置(会覆盖黙认设置)
    if (!empty($option)) {
        if (is_numeric($option))
            $option = array('expire'=>$option);
        elseif( is_string($option) )
            parse_str($option,$option);
        array_merge($config,array_change_key_case($option));
    }
    // 清除指定前缀的所有cookie
    if (is_null($name)) {
       if (empty($_COOKIE)) return;
       // 要删除的cookie前缀，不指定则删除config设置的指定前缀
       $prefix = empty($value)? $config['prefix'] : $value;
       if (!empty($prefix))// 如果前缀为空字符串将不作处理直接返回
       {
           foreach($_COOKIE as $key=>$val) {
               if (0 === stripos($key,$prefix)){
                    setcookie($_COOKIE[$key],'',time()-3600,$config['path'],$config['domain']);
                    unset($_COOKIE[$key]);
               }
           }
       }
       return;
    }
    $name = $config['prefix'].$name;
    if (''===$value){
        return isset($_COOKIE[$name]) ? unserialize($_COOKIE[$name]) : null;// 获取指定Cookie
    }else {
        if (is_null($value)) {
            setcookie($name,'',time()-3600,$config['path'],$config['domain']);
            unset($_COOKIE[$name]);// 删除指定cookie
        }else {
            // 设置cookie
            $expire = !empty($config['expire'])? time()+ intval($config['expire']):0;
            setcookie($name,serialize($value),$expire,$config['path'],$config['domain']);
            $_COOKIE[$name] = serialize($value);
        }
    }
}


	
	
	
/***************************************************自己加的*********************************************************/
function ri($str){
	exit(var_dump($str));
}

//去掉图片的域名
function getImgPath($url,$prefixThumb='thumb_'){
	//$domain = ;
	$path = str_replace($prefixThumb,'',str_replace(C('FILE_URL'),"",$url)); //清除域名，及thumb_
	$arr = explode('/',$path);
	$filename = $arr[count($arr)-1];
	$fileinfo = explode('.',$filename);
	$fileinfo['path'] = C('SAVE_PATH').str_replace($filename,'',$path);
	//$filename = $filename[1];
	return $fileinfo;
}

function toHtml($str){
	$str = nl2br($str);
	$str = str_replace(' ',"&nbsp;",$str);
	return $str;
}

function unHtml(){
	$str = str_replace('&nbsp;',' ',$str);
	$str = str_replace('<br />','\n',$str);
	
}

/**
 +----------------------------------------------------------
 * 字符串截取，支持中文和其他编码
 +----------------------------------------------------------
 * @static
 * @access public
 +----------------------------------------------------------
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr"))
        return mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}



function sendmail($subject,$body,$to,$toname,$from = "",$fromname = '中华美容网',$altbody = '中华美容网的邮件',$wordwrap = 80,$mailconf = ''){
	Vendor('Mailer.phpmailer');
	$mail             = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->SMTPDebug  = 2;                   // enables SMTP debug // 1 = errors and messages// 2 = messages only
	
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Host       = C('M_HOST'); // sets the SMTP server
	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->Username   = C('M_USER'); // SMTP account username
	$mail->Password   = C('M_PASSWORD');        // SMTP account password
	
	$from = !strpos(C('M_USER'),'@') ? C('M_USER').'@'.C('M_DOMAIN') : 'qihjn@163.com';
	$mail->SetFrom($from, $fromname);
	
	//$mail->AddReplyTo($to,$toname);
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';

	$mail->Subject    = $subject;
	$body             = eregi_replace("[\]",'',$body);
	//$mail->AltBody    = "AltBody"; // optional, comment out and test
	
	$mail->MsgHTML($body);
	
	$mail->AddAddress($to, $toname);
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	
	if(!$mail->Send()) {
	  //echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  //echo "Message sent!";
	}
}


//================== 用户相关 start ================//
/**
 * 保存用户登录凭证
 */
function setUserAuth($u){
	//$u = array();
	if (C('AUTH_STORE_WAY') == 'cookie') {
		//$id = COOKIE::get(C('USER_AUTH_KEY'));
		COOKIE::set("username",$u['username']);
		COOKIE::set("uid", $u['uid']);
		COOKIE::set('utype', $u['utype']);
	}else{
		$_SESSION[C('USER_AUTH_KEY')] = $id;
		$_SESSION["username"] = $u['username'];
		$u['uid'] = $_SESSION["uid"];
		$u['utype'] = $_SESSION['utype'];
	}
}

/**
 * 获取用户登录凭证信息
 */
function getUserAuth(){
	$u = array();
	if (C('AUTH_STORE_WAY') == 'cookie') {
		$id = COOKIE::get(C('USER_AUTH_KEY'));
		$u['username'] = COOKIE::get("username");
		$u['uid'] = COOKIE::get(C('USER_AUTH_KEY'));
		$u['utype'] = COOKIE::get('utype');
	}else{
		$id = $_SESSION[C('USER_AUTH_KEY')];
		$u['username'] = $_SESSION["username"];
		$u['uid'] = $_SESSION[C('USER_AUTH_KEY')];
		$u['utype'] = $_SESSION['utype'];
	}
	return $u;
}

/**
 * 得到登录的用户id
 */
function getUserId(){
	if (C('AUTH_STORE_WAY') == 'cookie') {
		$id = COOKIE::get(C('USER_AUTH_KEY'));
		
	}else{
		$id = $_SESSION[C('USER_AUTH_KEY')];
	}
	//echo $_SESSION[C('USER_AUTH_KEY')];
	return $id;
}

/**
 * 得到登录的用户信息
 */
function getUserInfo(){
	//个人简历
	//企业信息
	//学校信息
	$sql = "";
	$user = D('Member');
	if ($id = getUserId()) {
		return $user->find(getUserId());
	}
}
//================== 用户相关 end ================//


function get_client_ip() {
	if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
		$ip = getenv ( "HTTP_CLIENT_IP" );
	else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
		$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
	else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
		$ip = getenv ( "REMOTE_ADDR" );
	else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
		$ip = $_SERVER ['REMOTE_ADDR'];
	else
		$ip = "unknown";
	return ($ip);
}

function IP($ip = '', $file = 'UTFWry.dat') {
	$_ip = array ();
	if (isset ( $_ip [$ip] )) {
		return $_ip [$ip];
	} else {
		import ( "ORG.Net.IpLocation" );
		$iplocation = new IpLocation ( $file );
		$location = $iplocation->getlocation ( $ip );
		$_ip [$ip] = $location ['country'] . $location ['area'];
	}
	return $_ip [$ip];
}

//============== ip 获取城市函数===============//
function ip2num($ip){
	$ipadd = explode('.',$ip);
	return intval($ipadd[0])*256*256*256 + intval($ipadd[1])*256*256 + intval($ipadd[2]*256) + intval($ipadd[3]);
}

/*$ipnum 运算之后的数字*/
function getcitybydb($ip){
	$ipnum = ip2num($ip);
	$m = M('Ip');
	$r = $m->query("select city,province from mmm_ip where $ipnum>=ip1 and $ipnum<=ip2 limit 1");
	
	$r = $r[0];
	//echo "select city,province from ip where $ipnum>=ip1 and $ipnum<=ip2 limit 1"; //select city,province from p8_fenlei_ip where ip1<= 3729367335 and ip2>=3729367335 limit 1
	if(!is_array($r)){
		//未找到，返回默认城市
		$r['province'] = '上海'; 
		$r['city'] = '上海';
	}
	return $r;
}

/**
 * 根据ip得到城市
 * @param string $ip 
 */
function getcity($ip = ''){
	//global $onlineip;
	$ip || $ip = get_client_ip();
	if($_COOKIE["IP_province"] && $_COOKIE["IP_city"]){
		$r['province'] = $_COOKIE['IP_province'];
		$r['city']  = $_COOKIE['IP_city'];
		return $r;
	}else{
		$r = getcitybydb($ip);
		setcookie("IP_province",$r['province'],time()+7*86400);
		setcookie("IP_city",$r['city'],time()+7*86400);
		return $r;
	}
}
//============== ip 获取城市函数  end ===============//


/**
 *高亮关键字
 */
function hightLightKeyword($str,$keyword){
	$replaceStr = "<span style=' background-color:#FF0; '>$keyword</span>";
	//echo $str;
	//exit(str_ireplace("s","2","SB"));
	return str_ireplace($keyword,$replaceStr,$str);
}

/**
 *分割字符，返回有效数组
 */
function validExplode($separator,$str){
		
	if($str) {
		$re = array();
		$arr = explode($separator, $str);
		foreach($arr as $v) {
			if($v) $re[] = $v;
		}
		return $re;
	}
}
/**
 * 分割字符，返回有效数组
 * 与str_split 类似
 */
function strToChar($str){
	//$str = 'string';
	return preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
	//print_r($chars); //结果：Array ( [0] => s [1] => t [2] => r [3] => i [4] => n [5] => g ) 
}

//==================格式化数据 模板中使用  start ====================//
function img($v){
	if($v){
		$arr = parse_url($v);
		if(strtolower($arr['scheme']) != 'http'){
			return C('IMG_URL').$v;
		}
		return $v;
	}else{
		return C('DEFAULT_IMG');
	}
}

function getEnumTitle($id,$egroup='job_category',$way='evalue'){
	//echo $egroup;exit;
	$ids = explode(',',$id);
	$titles = '';
	$e = D('Enum');
	foreach($ids as $v){
		
		if($v!=''){
			$titles .= $e->getTitle($v,$egroup,$way).',';
		}
	}
	
	return substr($titles,0,-1);
}
/**
 * 获取男女文字
 * @param $v
 */
function sex($v) {
	if($v == 0) return "女";
	if($v == 1) return "男";
	return "";
	//return $v ? "男" : "女";
}

/**
 * dateFormat 格式化日期
 * @param unknown_type $time
 * @param unknown_type $format
 */
function df($time,$format = 'Y-m-d'){
	return date($format,$time);
}

/**
 * 得到统计查询结果数量的sql语句
 * @param unknown_type $sql
 */
function getCountSql($sql) {
	return preg_replace("/(select) (.*) (from .*)/i","\$1 count(id) \$3",$sql);;
}

/**
 * 截取职位类别的字符串
 * @param $cateid 类别
 * @param $n 截取长度
 */
function cateSub($cateid,$n){
	return msubstr(getEnumTitle($cateid),0,$n);
}

/**
 * 获取省的名称
 * @param string $code 省的拼音
 * @return 
 */
function getProvince($code){
	if ($code) { //code优先
		$key = 'province.'.$code; //code为省拼音
		$province = C($key); //省的汉字名称
		setcookie("IP_province",$province,time()+7*86400);
		//$_COOKIE["IP_province"] = $province;
	}elseif($_COOKIE["IP_province"]){ //cookie其次
		$province = $_COOKIE["IP_province"];
	}else{ //根据ip获取最后
		$ip = '60.190.28.48';
		$ipcity = getcity($ip);
		$province = $ipcity['province'];
	}
	return $province;
}

/**
 * 生成公司显示url
 * @param unknown_type $id
 */
function curl($id){
	return "/company/show_$id.html";
	
}

//当然下面的更绝,不过好像违背了php与html分离原则，但用起来确实很方便。没有class,id其它属性。
function jurl2($id,$title,$taget="_self"){
	
	return "<a href=\"/job/show_$id.html\" target=\"$taget\" title=\"$title\">{$title}</a>";
}

/**
 * 生成职位显示url
 * @param unknown_type $id
 */
function jurl($id){
	return "/job/show_$id.html";
}

/**
 * 生成简历显示url
 * @param unknown_type $id
 */
function rurl($id){
	return "/resume/$id/show.html";
}

/**
 * 获取省名称通过key
 * @param $code
 */
function getProvinceByKey($code){
	$area = D('Area');
	$province = $area->getProvince (); //省列表
	$province = $province[$code];
	if (!$province) {
		return '中国';
	}
}

/*得到行业分类的列表*/
function getIndustryBigClass($key){
	if ($bigClass == -1) {
		return '所有';
	}
	$e = D('Enum');
	return $e->getTitle($v[$key]);
	
}

//==================格式化数据  end ====================//

/**
 * 区域条件生成
 * @param unknown_type $province
 */
function areaCondition($province){
	return array(array("like","%$province%"),array("like",'全国'),array("eq",''),'or');//区域条件，多次使用，后台公司，简历列表，前台招聘首页，搜索页
}



function zhjson($v){
	if(is_array($v)){
		foreach($v as $key =>$value){
			$v[$key]=zhjson($value);
		}
		return $v;
	}else{
		return iconv("gb2312","utf-8",$v);
	}
}

function getProvincePingying($province){
	$tmp = explode(',', $province); //'江苏/南京,浙江/杭州'
	$area = array();
	if(is_array($tmp)) { // array('江苏/南京','浙江/杭州')
		foreach($tmp as $v) {
			if($v = trim($v)) {
				$t = explode('/', $v);
				$area[] = $t[0];
			}
		}
	}
	if (count($area) == 1) {
		//return $area[0];
	}
	$province = C('province');
	//$arr = array();
	foreach($province as $k => $v){
		foreach($area as $p){
			//echo "$p---$v";exit;
			if(false !== strpos($p,$v)){
				$arr[$k] = $p;
				break;
			}
		}
	}
	
	return $arr;
}

/**
  * 登录后的登录框内容
  */
function loginedbar(){
	//ECHO COOKIE::get(C('USER_AUTH_KEY'));
	$r = getUserInfo();
	if(is_array($r)){
		$v = new View();
		$v->assign('u',$r);
		//echo __FILE__;
		//echo IROOT.'/User/Tpl/default/Public/logined';
		echo $v->fetch('../21mmm_tp/User/Tpl/default/Public/logined.html');
	}
}


//============ 旧程序 cookie函数============
function dsetcookie($var, $value = '', $life = 0, $prefix = 1, $httponly = false) {
	//global $cookiepre, $cookiedomain, $cookiepath, $_SERVER;
	$cookiepre = 'FSQ_';
	$cookiedomain = DOMAIN;
	$cookiepath = '/';
	$timestamp=time();
	$var = ($prefix ? $cookiepre : '').$var;
	if($value == '' || $life < 0) {
		$value = '';
		$life = -1;
	}
	$life = $life > 0 ? $timestamp + $life : ($life < 0 ? $timestamp - 31536000 : 0);
	$path = $httponly && PHP_VERSION < '5.2.0' ? "$cookiepath; HttpOnly" : $cookiepath;
	$secure = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	//echo $var; echo "--$value";
	if(PHP_VERSION < '5.2.0') {
		setcookie($var, $value, $life, $path, $cookiedomain, $secure);
	} else {
		setcookie($var, $value, $life, $path, $cookiedomain, $secure, $httponly);
	}
}

function clearcookies() {
	foreach(array('sid', 'auth', 'visitedfid', 'onlinedetail', 'loginuser', 'activationauth') as $k) {
		dsetcookie($k);
	}
}

function g_cookie($var){
	$cookiepre = 'FSQ_';
	$var=$cookiepre.$var;
	return $_COOKIE[$var];
}
?>