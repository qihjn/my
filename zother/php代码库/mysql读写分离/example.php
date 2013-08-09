<?php

/****************************************
*** mysql-rw-php version 0.1 @ 2009-4-16
*** code by hqlulu#gmail.com
*** http://www.aslibra.com
*** http://code.google.com/p/mysql-rw-php/
*** code modify from class_mysql.php (uchome)
****************************************/

require_once('mysql_rw_php.class.php');

//rw info
$db_rw = array(
	'dbhost'=>'www.aslibra.com',
	'dbuser'=>'aslibra',
	'dbpw'=>'www.aslibra.com',
	'dbname'=>'test'
);

$db_ro = array(
	array(
		'dbhost'=>'www.aslibra.com:4306',
		'dbuser'=>'aslibra',
		'dbpw'=>'www.aslibra.com'
	)
);

$DB = new mysql_rw_php;

//connect Master
$DB->connect($db_rw[dbhost], $db_rw[dbuser], $db_rw[dbpw], $db_rw[dbname]);

//Method 1: connect one server
$DB->connect_ro($db_ro[0][dbhost], $db_ro[0][dbuser], $db_ro[0][dbpw]);

//Method 2: connect one server from a list by rand
$DB->set_ro_list($db_ro);

//send to rw
$sql = "insert into a set a='test'";
$DB->query($sql);

//send to ro
$sql = "select * from a";
$qr = $DB->query($sql);
while($row = $DB->fetch_array($qr)){
	echo $row[a];
}
?>