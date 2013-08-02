<?php
require_once "config.inc.php";
$con = mysql_connect($db_server,$db_username,$db_password);
if (!$con){
	echo "Could not connect: " . mysql_error();
	exit(1);
}
mysql_select_db('information_schema',$con) or die("Select database[1] failed!");
$sql = "SELECT SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME='CbOS';";
$result_db = mysql_query($sql,$con);
$rs = mysql_fetch_array($result_db,MYSQL_NUM);
if(isset($rs[0])){
$iscreated = true;
}else{
mysql_query("CREATE DATABASE IF NOT EXISTS `".$db_name."` ;",$con);
$iscreated = false;
}
mysql_select_db($db_name,$con) or die("Select database[2] failed!");
?>