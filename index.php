<?php
error_reporting(E_ALL | E_WARNING);
//显示错误，这样就会导致500错误
//error_reporting(E_CORE_WARNING | E_COMPILE_WARNING | E_USER_WARNING | E_USER_NOTICE | E_WARNING);
//只显示警告
session_start();
//启动session服务
require_once "config.inc.php";
require_once "db.php";
//if(!$iscreated){
//不一定，有可能有数据库但是没有东西
require_once "create.php";
//如果是我们创建了他，则添加东西
//}
require_once "db_lib.php";
$theme = get("theme","root");
$isopen = get("isopen","root");
$os = get("osname","root");
if($isopen == true){
require "themes/".$theme."/theme.php";
}else{
require "themes/".$theme."/notopen.php";
}
?>
