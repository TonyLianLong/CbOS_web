<?php
require_once "verify.php";
/*set it now*/
$title = "虚拟TTL";
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title ?> - <?php echo $os ?> control panel</title>
<script type="text/javascript" src="<?php echo $theme_path."/" ?>JQuery/jquery.min.js"></script>
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
if(isset($_GET['input']) && $_GET['input'] != ""){
	if(system("echo '".$_GET['input']."' > /dev/ttyS3") == 0){
		?>
        <script type="text/javascript">alert("发送成功！");</script>
        <?php
	}else{
		?>
    	<script type="text/javascript">alert("发送失败！");</script>
    	<?php
	}
}
?>
<br />
<div style="background:url(<?php echo $theme_path."/" ?>image/back_btn.png);background-size:45px 30px;-webkit-background-size:45px 30px;-moz-background-size:45px 30px;" class="back_btn" >
</div>
<div class="content noselect">
<div class="text1_just noselect" style="position:absolute;top:80px;">
模拟串口，是指在原有串口的基础上用96-Pin针脚再模拟一个或多个串口以传输数据。
目前我们模拟了一个串口，在网页上仅供发送数据（接收等可自己监听，串口的位置在/dev/ttyS3上）,输出接口为TX->PG6和RX->PG7，可到<a class="text1_a" href="http://linux-sunxi.org/Cubieboard/ExpansionPorts">linux-sunxi.org</a>里面查看Cubieboard的96-Pin口的详细信息（英文）。<br/>
以下输入的数据将由虚拟串口发送（波特率：9600）。
<br/>
</div>
<div style="position:absolute;top:190px;width:100%;">
<form method="get">
<label for="input" class="text4_just noselect">请输入需要发送的值：</label>
 <input type="hidden" name="loc" id="loc" value="vttl" />
<input name="input" type="text" id="input" style="width:100%" />
<p style="text-align:center">
<input id="submit" value="发送" type="submit" style="width:80px;">
</p>
</form>
</div>
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