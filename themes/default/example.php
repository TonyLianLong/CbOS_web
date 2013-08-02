<?php
require_once "verify.php";
/*set it now*/
$title = "Example";
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title ?> - <?php echo $os ?> control panel</title>
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

<body id="body" class="noselect">
<?php
require $theme_path."/header.php";
?>
<br />
<div style="background:url(<?php echo $theme_path."/" ?>image/back_btn.png);background-size:45px 30px;-webkit-background-size:45px 30px;-moz-background-size:45px 30px;" class="back_btn" >
</div>
<div class="content noselect">

</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".back_btn").mouseenter(function(){
		$(this).css("filter","alpha(opacity=8)");
		$(this).css("opacity",0.8);
		$(this).css("-moz-opacity",0.8);
	});
	$(".back_btn").mouseleave(function(){
		//$(this).attr("src","<?php echo $theme_path."/" ?>image/back_btn.png");
		$(this).css("background","url(<?php echo $theme_path."/" ?>image/back_btn.png)");
		$(this).css("filter","alpha(opacity=6)");
		$(this).css("opacity",0.6);
		$(this).css("-moz-opacity",0.6);
	});
	$(".back_btn").mousedown(function(){
		$(this).css("background","url(<?php echo $theme_path."/" ?>image/back_btn_pressed.png)");
	});
	$(".back_btn").click(function(){
		$(this).css("background","url(<?php echo $theme_path."/" ?>image/back_btn.png)");
		self.location='.';
	});
});
</script>
</body>
</html>