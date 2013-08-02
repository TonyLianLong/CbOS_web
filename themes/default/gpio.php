<?php
require_once "verify.php";
require_once "gpio_lib.php";
if(isset($_GET['setgpio']) && $_GET['setgpio'] != ""){
	$gpio_data = explode(",",$_GET['setgpio']);
	for($i=0;$i<count($gpio_data);$i++){
		$gpio_fl = explode("|",$gpio_data[$i]);
		setport($gpio_fl[0],$gpio_fl[1]);
	}
}
/*set it now*/
$title = "GPIO";
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
<div id="bt_pic" style="background:url(<?php echo $theme_path."/" ?>image/cb_bottom.png);position:absolute;top:110px;left:-240px;width:800px;height:400px;">
</div>
<div id="text_of_cb_gpio" style="position:absolute;top:140px;left:560px;">
<p class="text4_just" style="position:static;">对于用户：</p>
<p class="text1_just" style="position:static;">您可以在这个程序里面控制左图上有标号的口的状态（标号的口都在SATA接口的旁边），现在暂时不提供输入功能，单击左图上的GPIO灯来调整它的电平状态（红=低电平，绿=高电平，GND除外，为地）。</p>
<br />
<p class="text4_just" style="position:static;">对于开发者：</p>
<p class="text1_just" style="position:static;">所有的PD口都可以在这个程序里被控制，另外您可以到<a class="text1_a" href="http://linux-sunxi.org/Cubieboard/ExpansionPorts">linux-sunxi.org</a>里面查看Cubieboard的96-Pin口的详细信息（英文）。</p>
</div>
<div id="PD25" class="port_light" style="top:266px;left:27px;">
</div>
<div id="PD26" class="port_light" style="top:266px;left:55px;">
</div>
<div id="PD24" class="port_light" style="top:297px;left:55px;">
</div>
<div id="PD23" class="port_light" style="top:266px;left:83px;">
</div>
<div id="PD27" class="port_light" style="top:297px;left:83px;">
</div>
<div id="PD21" class="port_light" style="top:266px;left:111px;">
</div>
<div id="PD22" class="port_light" style="top:297px;left:111px;">
</div>
<div id="PD19" class="port_light" style="top:266px;left:139px;">
</div>
<div id="PD20" class="port_light" style="top:297px;left:139px;">
</div>
<div id="PD17" class="port_light" style="top:266px;left:167px;">
</div>
<div id="PD18" class="port_light" style="top:297px;left:167px;">
</div>
<div id="PD16" class="port_light" style="top:297px;left:195px;">
</div>
<div id="PD14" class="port_light" style="top:266px;left:223px;">
</div>
<div id="PD15" class="port_light" style="top:297px;left:223px;">
</div>
<div id="PD12" class="port_light" style="top:266px;left:251px;">
</div>
<div id="PD13" class="port_light" style="top:297px;left:251px;">
</div>
<div id="PD10" class="port_light" style="top:266px;left:279px;">
</div>
<div id="PD11" class="port_light" style="top:297px;left:279px;">
</div>
<div id="PD8" class="port_light" style="top:266px;left:307px;">
</div>
<div id="PD9" class="port_light" style="top:297px;left:307px;">
</div>
<div id="PD7" class="port_light" style="top:266px;left:335px;">
</div>
<div id="PD5" class="port_light" style="top:266px;left:363px;">
</div>
<div id="PD6" class="port_light" style="top:297px;left:363px;">
</div>
<div id="PD3" class="port_light" style="top:266px;left:391px;">
</div>
<div id="PD4" class="port_light" style="top:297px;left:391px;">
</div>
<div id="PD1" class="port_light" style="top:266px;left:419px;">
</div>
<div id="PD2" class="port_light" style="top:297px;left:419px;">
</div>
<div id="PD0" class="port_light" style="top:297px;left:447px;">
</div>
<input id="apply_button" style="position:absolute;top:510px;left:50px;width:80px;" name="button" type="button" value="应用" />
<input id="cancel_button" style="position:absolute;top:510px;left:230px;width:80px;" name="button" type="button" value="取消" />
</div>
<script type="text/javascript">
$(document).ready(function(){
	var things = new Array();
	rez = function(m,t){
		if(t == 0){
			$(m).css("background","url(<?php echo $theme_path."/" ?>image/green_ball.png)");
		}else if(t == 1){
			$(m).css("background","url(<?php echo $theme_path."/" ?>image/red_ball.png)");
		}
		return !t;
	}
	ready = function(m,t){
		if(t == 0){
			$(m).css("background","url(<?php echo $theme_path."/" ?>image/red_ball.png)");
		}else if(t == 1){
			$(m).css("background","url(<?php echo $theme_path."/" ?>image/green_ball.png)");
		}
	}
	<?php
	for($i=0;$i<=27;$i++){
	?>
	pd<?php echo $i ?> = <?php echo getport($i); ?>;
	pd<?php echo $i ?>_things = "<?php echo $i ?>";
	ready("#PD"+pd<?php echo $i ?>_things,pd<?php echo $i ?>);
	$("#PD"+pd<?php echo $i ?>_things).click(function(){
		pd<?php echo $i ?> = rez(this,pd<?php echo $i ?>);
		things[pd<?php echo $i ?>_things] = pd<?php echo $i ?>;
	});
	<?php
	}
	?>
	$("#apply_button").click(function(){
		setgpio = "";
		for(var item in things){
			if(setgpio != ""){
				setgpio += ",";
			}
			if(things[item] == true){
            	setgpio += (item+"|1");
			}else if(things[item] == false){
				setgpio += (item+"|0");
			}

        }
		self.location='?loc=gpio&setgpio='+setgpio;
	});
	$("#cancel_button").click(function(){
		self.location='?loc=gpio';
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