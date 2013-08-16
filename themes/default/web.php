<?php require_once "verify.php"; ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to <?php echo $os ?> control panel</title>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo $theme_path."/" ?>JQuery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_path."/" ?>JQuery/jquery.cookie.js"></script>
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
<div class="content noselect">
<!--<div class="icon1" style="background-image:url('');">

</div>
<div class="icon2">

</div>
<div class="icon3">

</div>-->
<!--<ul class="cont" style="width:120px;" >-->
<?php
$mqu = mysql_query("SELECT * FROM `menu`;");
while($getarr = mysql_fetch_array($mqu,MYSQL_ASSOC)){
	$rid = trim($getarr['id'],"#");
?>
<div class="cont" id="<?php echo $rid ?>" style="top:<?php if(isset($_COOKIE['locy_'.$rid])) echo $_COOKIE['locy_'.$rid]; else echo $getarr['y']; ?>px;left:<?php if(isset($_COOKIE['locy_'.$rid])) echo $_COOKIE['locx_'.$rid]; else echo $getarr['x']; ?>px;width:<?php echo $getarr['width'] ?>px;<?php if($getarr['height'] != 0){echo "height:".$getarr['height']."px;";} ?>">
<p id="<?php echo trim($getarr['id'],"#") ?>_title" style="color:<?php echo $getarr['title_color'] ?>"><!--小应用--><?php echo $getarr['title']; ?></p>
<!--<div>-->
<?php
$fl = explode("#",$getarr['things']);
$i = 0;
//print_r($fl);
while(isset($fl[$i])){
	$fl2 = explode("|",$fl[$i]);
	//$fl2[2] is LINK!!!
	//print_r($fl2);
?>
<p id="<?php echo $fl2[0] ?>"><?php echo $fl2[1] ?></p>
<?php
	$i++;
}
?>
<!--</div>-->
</div>
<?php
}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var mousex = -1;
	var mousey = -1;
	var lmousex = -1;
	var lmousey = -1;
	var rx;
	var ry;
	var drag = "";
	var drag_things;
	mousefin = function(e){
	//alert("up");
		//alert(drag);
		/*sendloc = $.ajax({url:"<!--?php echo $theme_path."/ajax/update_loc.php?x=" ?-->"+rx+"&y="+ry+"&things="+$(drag).attr("id"),async:false});*/
		/*NOT AJAX TO MYSQL*/
		$.cookie("locx_"+$(drag).attr("id"),rx,{expires: 365}); 
		$.cookie("locy_"+$(drag).attr("id"),ry,{expires: 365}); 
		//alert(sendloc.responseText);
		//$(drag).unbind("mouseleave");
		//$(drag).unbind("mouseup");
		//$(drag).unbind("mousemove");
		drag = "";
	}
	mmove = function(e){
			//alert("move");
			mousex = e.originalEvent.x || e.originalEvent.layerX || -1;
			mousey = e.originalEvent.y || e.originalEvent.layerY || -1;
			if(lmousex != -1 || lmousey != -1){
				k = (mousey - lmousey);
				j = (mousex - lmousex);
			//alert(mousey+" e "+lmousey);
			//alert(j+" m "+k);
			//alert(rx+" c "+ry);
			ry += k;
			rx += j;
			//alert(rx+" i "+ry);
			$(drag).css("top",ry+"px");
			$(drag).css("left",rx+"px");
		}
		lmousex = mousex;
		lmousey = mousey;
		//alert(mousex+"/"+mousey);
	}
	candrag = function(e){
		drag = "#"+$(this).parent().attr("id");//"#menu1";
		drag_things = e;
		//alert("down");
		ry = parseInt($(drag).css("top"));//.split("px");
		//ry = ry[0];
		rx = parseInt($(drag).css("left"));//.split("px");
		//rx = rx[0];
		lmousex = -1 && (e.originalEvent.x || e.originalEvent.layerX);
		lmousey = -1 && (e.originalEvent.y || e.originalEvent.layerY);
		//$(drag).mousemove(mmove);
		//$(drag).bind("mouseleave",mmove);//mousefin);
		//$("#body").bind("mouseup",mousefin);
		//not "one()" because I will unbind them and they're two
		$("#body").one("mouseup",mousefin);
	}
	$("#body").mousemove(function(e){
		if(drag != ""){
			//alert("y");
			mmove(e);
		}
	});
	<?php
	$mqu = mysql_query("SELECT * FROM `menu`;");
	while($getarr = mysql_fetch_array($mqu,MYSQL_ASSOC)){
		if($getarr['candrag'] == true){
	?>
	$("<?php echo $getarr['id']; ?>_title").mousedown(candrag);
	<?php
		}
		$fl = explode("#",$getarr['things']);
		$i = 0;
		while(isset($fl[$i])){
			$fl2 = explode("|",$fl[$i]);
	?>
	$("#<?php echo $fl2[0]; ?>").click(function(){
		self.location='?loc=<?php echo $fl2[2]; ?>';
	});
	<?php
			$i++;
		}
	}
	?>
	//$("#menu1").mousedown(candrag);
	
});
</script>
</body>
</html>