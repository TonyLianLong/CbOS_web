<?php
require_once "config.inc.php";
require_once "db.php";
if(!mysql_query("CREATE TABLE IF NOT EXISTS user (id INT,username VARCHAR(50),password VARCHAR(32),isadmin BOOLEAN,mail VARCHAR(32));")){
echo "Create table \"user\" failed!".mysql_error();
exit(1);
}else{
$result = mysql_query("SELECT * FROM `user`");
if(!$result){
	echo "select failed!".mysql_error();
	exit(1);
}
$ht = false;
while($row = mysql_fetch_array($result)){
    $ht = true;
}
if(!$ht){
	//if no data
	if(!mysql_query("INSERT INTO user VALUES(0,'admin','".md5("admin")."',true,'admin@admin.com');")){
	echo "insert failed!".mysql_error();
	exit(1);
	}
}
$table = "root";
if(!mysql_query("CREATE TABLE IF NOT EXISTS ".$table." (osname VARCHAR(35),isopen BOOLEAN,theme VARCHAR(50));")){
echo "Create table \"".$table."\" failed!".mysql_error();
exit(1);
}else{
$result = mysql_query("SELECT * FROM `".$table."`");
if(!$result){
	echo "select failed!".mysql_error();
	exit(1);
}
$ht = false;
while($row = mysql_fetch_array($result)){
    $ht = true;
}
if(!$ht){
	if(!mysql_query("INSERT INTO ".$table." VALUES('CbOS',true,'default');")){
	echo "insert failed!".mysql_error();
	exit(1);
	}
}
}
$table = "menu";
if(!mysql_query("CREATE TABLE IF NOT EXISTS ".$table." (id VARCHAR(50),x INT,y INT,width INT,height INT,things TEXT,title VARCHAR(50),title_color VARCHAR(10),candrag BOOLEAN);")){
echo "Create table \"".$table."\" failed!".mysql_error();
exit(1);
}else{
$result = mysql_query("SELECT * FROM `".$table."`");
if(!$result){
	echo "select failed!".mysql_error();
	exit(1);
}
$ht = false;
while($row = mysql_fetch_array($result)){
    $ht = true;
	break;
}
if(!$ht){
	//if no data
	if(!mysql_query("INSERT INTO ".$table." VALUES('#menu1',120,150,220,0,'gpio|GPIO控制程序|gpio#ipled|板载LED-IP显示工具|ipled#port|串口模拟工具|vttl','小应用','#999',true);")){
		//height 0 is auto
	echo "insert failed!".mysql_error();
	exit(1);
	}
	if(!mysql_query("INSERT INTO ".$table." VALUES('#menu2',574,181,220,0,'pf|关机|run&cmd=poweroff&alert=关机成功&go=false#rb|重启|run&cmd=reboot&alert=重启成功&go=false','控制','#999',true);")){
		//height 0 is auto
	echo "insert failed!".mysql_error();
	exit(1);
	}
}
}
}
?>