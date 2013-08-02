<?php
require_once "verify.php";
require "login_check.php";
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login -  <?php echo $os ?> control panel</title>
<?php
if($login){
	if(isset($_GET['action']) && $_GET['action'] == "exit"){
	setcookie("username", "", time()-3600);
	unset($_SESSION["password"]);
	}
	//echo "login";
	//echo $username."  ".$password;
?>
<script type="text/javascript">
self.location='<?php if(isset($_GET['link']) && $_GET['link'] != ""){echo "?loc=".$_GET['link']; }else{ echo "."; }?>';
</script>
</head>
</html>
<?php
}else{
//echo "unlogin";
//echo $username."  ".$password;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- 引入JQ库 -->
<style type="text/css">
body{
	background:url(<?php echo $theme_path."/" ?>backgrounds/<?php echo $bg_filename; ?>);
}
</style>
<link rel="stylesheet" href="<?php echo $theme_path."/" ?>style.css" type="text/css" />
<!-- 加载CSS -->
</head>

<body>
<div class="mask" style="height:100%;width:100%;top:0px;left:0px;"></div>
<div class="login" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
<br />
<p class="title_text">登录</p>
<br />
<img style="height:143px;width:141px;" src="<?php echo $theme_path."/" ?>/image/cbos_logo.png" />
<form method="post">
<p class="text2" style="top:210px;">用户名:<input name="username" type="text" size="20" maxlength="20"></p>
<p class="text2" style="top:240px;">密码:<input name="password" type="password" size="20" maxlength="20">
<p class="text1" style="top:280px;">
<input type="submit" style="width:100px;height:30px" name="submit" id="submit" value="登录">
</p>
</p>
</form>
<?php
if($try){
?>
<!--<p class="text3">用户名或密码错误！</p>-->
<script type="text/javascript">alert("密码错误");</script>
<?php
}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".login").mouseenter(function(){
		$(".login").css("filter","alpha(opacity=90)");
		$(".login").css("opacity","0.9");
		$(".login").css("-moz-opacity","0.9");
	});
	$(".login").mouseleave(function(){
		$(".login").css("filter","alpha(opacity=75)");
		$(".login").css("opacity","0.75");
		$(".login").css("-moz-opacity","0.75");
	});
});
</script>
</body>
</html>
<?php
}
?>