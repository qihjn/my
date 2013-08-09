<?php

/****************************************
*** mysql-rw-php version 0.1 @ 2009-4-16
*** code by hqlulu#gmail.com
*** http://www.aslibra.com
*** http://code.google.com/p/mysql-rw-php/
*** code modify from class_mysql.php (uchome)
****************************************/

class mysql_rw_php {

	//查询个数
	var $querynum = 0;
	//当前操作的数据库连接
	var $link = null;
	//字符集
	var $charset;
	//当前数据库
	var $cur_db = '';

	//是否存在有效的只读数据库连接
	var $ro_exist = false;
	//只读数据库连接
	var $link_ro = null;
	//读写数据库连接
	var $link_rw = null;

	function mysql_rw_php(){
	}

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE) {
		if($pconnect) {
			if(!$this->link = @mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$halt && $this->halt('Can not connect to MySQL server');
			}
		} else {
			if(!$this->link = @mysql_connect($dbhost, $dbuser, $dbpw)) {
				$halt && $this->halt('Can not connect to MySQL server');
			}
		}
		
		//只读连接失败
		if(!$this->link && !$halt) return false;
		
		//未初始化rw时，第一个连接作为rw
		if($this->link_rw == null)
			$this->link_rw = $this->link;

		if($this->version() > '4.1') {
			if($this->charset) {
				@mysql_query("SET character_set_connection=$this->charset, character_set_results=$this->charset, character_set_client=binary", $this->link);
			}
			if($this->version() > '5.0.1') {
				@mysql_query("SET sql_mode=''", $this->link);
			}
		}
		if($dbname) {
			$this->select_db($dbname);
		}
	}

	//连接一个只读的mysql数据库
	function connect_ro($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0){
		if($this->link_rw == null)
			$this->link_rw = $this->link;
		$this->link = null;
		//不产生halt错误
		$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect, false);
		if($this->link){
			//连接成功
			//echo "link ro sussess!<br>";
			$this->ro_exist = true;
			$this->link_ro = $this->link;
			if($this->cur_db){
				//如果已经选择过数据库则需要操作一次
				@mysql_select_db($this->cur_db, $this->link_ro);
			}
		}else{
			//连接失败
			//echo "link ro failed!<br>";
			$this->link = &$this->link_rw;
		}
	}

	//设置一系列只读数据库并且连接其中一个
	function set_ro_list($ro_list){
		if(is_array($ro_list)){
			//随机选择其中一个
			$link_ro = $ro_list[array_rand($ro_list)];
			$this->connect_ro($link_ro['dbhost'], $link_ro['dbuser'], $link_ro['dbpw']);
		}
	}

	function select_db($dbname) {
		//同时操作两个数据库连接
		$this->cur_db = $dbname;
		if($this->ro_exist){
			@mysql_select_db($dbname, $this->link_ro);
		}
		return @mysql_select_db($dbname, $this->link_rw);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function fetch_one_array($sql, $type = '') {
		$qr = $this->query($sql, $type);
		return $this->fetch_array($qr);
	}

	function query($sql, $type = '') {
		$this->link = &$this->link_rw;
		//判断是否select语句
		if($this->ro_exist && preg_match ("/^(\s*)select/i", $sql)){
			$this->link = &$this->link_ro;
		}
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link)) && $type != 'SILENT') {
			$this->halt('MySQL Query Error', $sql);
		}
		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	function result($query, $row) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	function version() {
		return mysql_get_server_info($this->link);
	}

	function close() {
		return mysql_close($this->link);
	}

	function halt($message = '', $sql = '') {
		$dberror = $this->error();
		$dberrno = $this->errno();
		echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
				<b>MySQL Error</b><br>
				<b>Message</b>: $message<br>
				<b>SQL</b>: $sql<br>
				<b>Error</b>: $dberror<br>
				<b>Errno.</b>: $dberrno<br>
				</div>";
		exit();
	}
}

?>