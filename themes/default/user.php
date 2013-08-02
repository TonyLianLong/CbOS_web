<?php require_once "verify.php"; ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>User - <?php echo $os ?> control panel</title>
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
<?php
require $theme_path."/header.php";
if(isset($_POST['opassword'],$_POST['npassword'],$_POST['rnpassword'])){
if(md5($_POST['opassword']) == $password){
//是密码
if($_POST['npassword'] == $_POST['rnpassword']){
//相同
$new_pwd = md5($_POST['npassword']);
$password = $new_pwd;
if(!mysql_query("UPDATE user SET password='".$new_pwd."' WHERE username='".$username."';")){
	echo "Error:".mysql_error();
}
?>
<script type="text/javascript">self.location='?loc=login&action=exit';</script>
<?php
}else{
?>
<script type="text/javascript">alert("密码不相同");</script>
<?php
}
}else{
?>
<script type="text/javascript">alert("密码错误");</script>
<?php
}
}
?>
<br />
<div class="mask" style="height:100%;width:100%;top:0px;left:0px;"></div>
<div class="login" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
<br />
<p class="title_text">用户控制面板</p>
<br />
<img style="height:143px;width:141px;" src="<?php echo $theme_path."/" ?>/image/cbos_logo.png" />
<form method="post">
<p class="text2 noselect" style="top:200px;right:90px;">用户名:<?php echo $username ?></p>
<p class="text2 noselect" style="top:220px;">旧密码:<input name="opassword" type="password" size="20" maxlength="20">
<p class="text2 noselect" style="top:250px;">新密码:<input name="npassword" type="password" size="20" maxlength="20">
<p class="text2 noselect" style="top:280px;">重新输入:<input name="rnpassword" type="password" size="20" maxlength="20">
<p class="text1" style="top:310px;">
<input type="submit" style="width:100px;" name="submit" id="submit" value="修改">
</p>
</p>
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".mask").click(function(){
		self.location='/';
	});
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