<?php
require_once "verify.php";
/*set it now*/
$title = "IPLED";
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
if(isset($_GET['select'])){
	 if($_GET['select'] == "a"){
	 		if(system("echo 1 > /etc/fullip")==0){
				echo "<script type=\"text/javascript\">alert(\"应用成功\");</script>";
			}else{
				echo "<script type=\"text/javascript\">alert(\"应用失败\");</script>";
			}
	 }
	 if($_GET['select'] == "b"){
	 		if(system("echo 0 > /etc/fullip")==0){
				echo "<script type=\"text/javascript\">alert(\"应用成功\");</script>";
			}else{
				echo "<script type=\"text/javascript\">alert(\"应用失败\");</script>";
			}
	 }

}
?>
<br />
<div style="background:url(<?php echo $theme_path."/" ?>image/back_btn.png);background-size:45px 30px;-webkit-background-size:45px 30px;-moz-background-size:45px 30px;" class="back_btn" >
</div>
<div class="content noselect">
<div style="position:absolute;width:672px;height:392px;top:80px;left:-180px;background:url(<?php echo $theme_path."/" ?>image/cb_top.png);">
</div>
<div style="position:absolute;top:80px;left:492px;">
<p class="text1_just">IPLED程序是TLL研发的板载ip显示工具，它用于在开机时显示ip（全段或仅最后一段）。这样您就可以在没有路由管理权限或不知道如何在路由器上查看此板的ip时获得此板的ip，以用ssh或本管理器管理此板。如果您知道此路由器DHCP的前三段ip（一般是192.168.1,192.168.0,10.0.0），那么您只需要显示最后一段的ip。<br /><br />规则如下：<br /></p>
<p class="text4_just">显示最后一段：</p>
<ul>
<li class="text1_just">蓝色灯快速闪3下以表示开始显示</li>
<li class="text1_just">绿色灯闪烁，闪烁的次数为ip的第一位</li>
<li class="text1_just">蓝色灯闪烁，闪烁的次数为ip的第二位</li>
<li class="text1_just">绿色灯闪烁，闪烁的次数为ip的第三位</li>
<li class="text1_just">以上任何一个灯不闪烁则说明该灯所代表的值为0或该位没有数字</li>
</ul>
<p class="text4_just">显示全段：</p>
<ul>
<li class="text1_just">按以上方案显示4次以表示4段ip的值。</li>
</ul>
</div>
<?php $isfull = file_get_contents("/etc/fullip"); ?>
<div style="position:absolute;top:490px;left:80px;">
  <input name="radio" type="radio" id="radioa" value="radio"<?php if($isfull == 1){ echo " checked=\"CHECKED\""; } ?> >
  <label for="radioa" class="text4_just" >显示全段</label>
  <input type="radio" name="radio" id="radiob" value="radio"<?php if($isfull == 0){ echo " checked=\"CHECKED\""; } ?> >
  <label for="radiob" class="text4_just" >显示最后一段</label>
  <p style="text-align:center;">
  	<input type="button" name="apply" id="apply" value="应用">
  </p>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	select="<?php if($isfull == 1){ echo "a"; }else if($isfull == 0){ echo "b"; } ?>";
	$("#radioa").click(function(){
		select="a";
	});
	$("#radiob").click(function(){
		select="b";
	});
	$("#apply").click(function(){
		self.location='?loc=ipled&select='+select;
	});
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