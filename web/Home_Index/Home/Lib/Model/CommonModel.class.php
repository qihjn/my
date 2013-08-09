<?php
class CommonModel extends Model {

	// 获取当前用户的ID
    public function getMemberId() {
        return isset($_SESSION[C('USER_AUTH_KEY')])?$_SESSION[C('USER_AUTH_KEY')]:0;
    }

   /**
     * 根据条件禁用表数据
     */
    public function forbid($options,$field='status'){

        if(FALSE === $this->where($options)->setField($field,0)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

	 /**
     +----------------------------------------------------------
     * 根据条件批准表数据
     */

    public function checkPass($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,1)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }


    /**
     +----------------------------------------------------------
     * 根据条件恢复表数据
    +----------------------------------------------------------
     */
    public function resume($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,1)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

    /**
     +----------------------------------------------------------
     * 根据条件恢复表数据
     */
    public function recycle($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,0)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

    public function recommend($options,$field='is_recommend'){
        if(FALSE === $this->where($options)->setField($field,1)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

    public function unrecommend($options,$field='is_recommend'){
        if(FALSE === $this->where($options)->setField($field,0)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }
    
	public function getList($condition = array(),$num = 1){
		//得到1条,得到n条,得到有分页的列表
		if($num === 1){
			//
			return $this->where($condition)->order('ctime desc')->find();
		}
		return $this->where($condition)->order('ctime desc')->limit($num)->select();
	}
	
	/**
	 * 得到信息的所有者
	 * @param $id 主键
	 */
	public function getOwner($id,$field="uid"){
		return  $this->where($this->getPk()."= $id")->getField($field);
		//return $this->field($field)->find($id); 
	}
	
	/**
	 * 得到拥有的信息
	 * @param $parentID
	 * @param $field
	 */
	public function getOwnInfo($parentID,$field="uid"){
		return $this->getList($field=$parentID)->select();
	}
	
	public function link($option){
		extract($option);
		
		if($table){
			preg_match("/[\w\d._]+\s*[as]*\s*(\w)/",$table,$arr);
			$tableAlias = $arr[1];
		}else{
			$tableAlias = $table = $this->getTableName();
		}
		//echo "$table -- $tableAlias <br />";
		$option['join'] = "";
		$field || $field = "*";
		$order || $order="$tableAlias.ctime";
		$sort || $sort = "desc";
		$num || $num = 5;
		
		
		$r = $this->table($table)->field($field)->join($join)->where($map)->order( $order .' '. $sort)->limit($num)->select();
		return $r;
	}
}
?>