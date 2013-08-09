<?php

import('TagLib');
class TagLibSd extends TagLib
{
public function _getData($attr,$content)
{
static $_iterateParseCache = array();
$cacheIterateId = md5($attr.$content);
if(isset($_iterateParseCache[$cacheIterateId]))
return $_iterateParseCache[$cacheIterateId];
$tag      = $this->parseXmlAttr($attr,'getData');
$name   = $tag['name'];
$model   = $tag['model'];
$condition   = empty($tag['where']) ?'\'\'': '\''.addslashes($tag['where']).'\'';
$order   = empty($tag['order']) ?'\'\'': '\''.$tag['order'].'\'';
$sql   = empty($tag['sql']) ?'': addslashes($tag['sql']) ;
$limit   = empty($tag['limit']) ?10 :'\''.$tag['limit'].'\'';
$id        = $tag['id'];
$empty  = isset($tag['empty'])?$tag['empty'] : '';
$key     =   !empty($tag['key'])?$tag['key'] : 'i';
$mod    =   isset($tag['mod'])?$tag['mod'] : '2';
$name   = $this->autoBuildVar($name);
if(!empty($model)){
$parseStr  .=  '<?php';
$parseStr  .=  ' $condition = '.$condition.';';
$parseStr  .=  ' $order = '.$order.';';
$parseStr  .=  ' $limit = '.$limit.';';
$parseStr  .=  ' if(!isset($'.$model.')) : $'.$model.'Dao = M(\''.$model.'\'); endif;';
if(empty($sql)){
$parseStr  .= ' if(!isset('.$name.')) :'.$name.' = $'.$model.'Dao->Where($condition)->Order($order)->Limit($limit)->findAll();endif;';
}else{
$parseStr  .=  ' if(!isset('.$name.')) :'.$name.' = $'.$model.'Dao->query(\''.$sql .'\');endif;';
}
$parseStr  .=  ' if(is_array('.$name.')): $'.$key.' = 0;';
if(isset($tag['length']) &&''!=$tag['length'] ) {
$parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].','.$tag['length'].');';
}elseif(isset($tag['offset'])  &&''!=$tag['offset']){
$parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].');';
}else{
$parseStr .= ' $__LIST__ = '.$name.';';
}
$parseStr .= 'if( count($__LIST__)==0 ) : echo "'.$empty.'" ;';
$parseStr .= 'else: ';
$parseStr .= 'foreach($__LIST__ as $key=>$'.$id.'): ';
$parseStr .= '++$'.$key.';';
$parseStr .= '$mod = ($'.$key.' % '.$mod.' )?>';
$parseStr .= $this->tpl->parse($content);
$parseStr .= '<?php endforeach; endif; else: echo "'.$empty.'" ;endif; ?>';
$_iterateParseCache[$cacheIterateId] = $parseStr;
if(!empty($parseStr)) {
return $parseStr;
}
}
return ;
}
public function _getItem($attr,$content)
{
static $_iterateParseCache = array();
$cacheIterateId = md5($attr.$content);
if(isset($_iterateParseCache[$cacheIterateId]))
return $_iterateParseCache[$cacheIterateId];
$tag      = $this->parseXmlAttr($attr,'getItem');
$name   = $tag['name'];
$model   = $tag['model'];
$condition   = empty($tag['where']) ?'\'\'': '\''.addslashes($tag['where']).'\'';
$sql   = addslashes($tag['sql']);
$empty  = isset($tag['empty'])?$tag['empty']:'';
$name   = $this->autoBuildVar($name);
if(!empty($model)){
$parseStr  .=  '<?php';
$parseStr  .=  ' $condition = '.$condition.';';
$parseStr  .=  ' if(!isset($'.$model.')) : $'.$model.' = M(\''.$model.'\'); endif;';
if(empty($sql)){
$parseStr  .= ' if(!isset('.$name.')) :'.$name.' = $'.$model.'->Where($condition)->find();endif;';
}else{
$parseStr  .=  ' if(!isset('.$name.')) :'.$name.' = $'.$model.'->query(\''.$sql .'\');'.$name.' = '.$name.'[0]; endif; ';
}
$parseStr .= '  ?>';
$parseStr .= $this->tpl->parse($content);
$_iterateParseCache[$cacheIterateId] = $parseStr;
if(!empty($parseStr)) {
return $parseStr;
}
}
return ;
}
}
?>