<?php
if(isset($_COOKIE["username"]) && $_COOKIE["username"] != "" && isset($_SESSION["password"]) && $_SESSION["password"] != ""){
	$username = $_COOKIE["username"];
	$password = $_SESSION["password"];
	$upf = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE username='".$username."' and password='".$password."';"));
	//echo count($upf)."||".$username."||".$password;
	if(isset($upf[0])){
		$uid = $upf['id'];
		$isadmin = $upf['isadmin'];
		//Verfying OK
		$login = true;
	}else{
		$login = false;
		//Verfying failed
	}
	$try = true;
}
if(isset($_POST["username"]) && isset($_POST["password"]) && $_POST["username"] != "" && $_POST["password"] != ""){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$upf = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE username='".$username."' and password='".$password."';"));
	//echo count($upf)."||".$username."||".$password;
	if(isset($upf[0])){
		$uid = $upf['id'];
		$isadmin = $upf['isadmin'];
		//Verfying OK
		$login = true;
		setcookie("username",$username,time()+3600*24);
		//设定cookie username，一天后过期
		$_SESSION["password"]=$password;
		//存入session password
	}else{
		$login = false;
		//Verfying failed
	}
	$try = true;
}
if(!isset($login)){
	$login = false;
	$try = false;
}
/*if(!isset($try)){
	$try = true;
}*/
?>