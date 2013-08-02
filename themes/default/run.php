<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require_once "verify.php";
if(isset($_GET['cmd']) && $_GET['cmd'] != ""){
	if(system("root ".$_GET['cmd']) == 0){
		$ok = true;
	}else{
		$ok = false;
	}
}else{
	$ok = false;
}
if(!isset($_GET['nointerface']) || $_GET['nointerface'] != true){
?>
<script type="text/javascript">
<?php
if(isset($_GET['alert']) && $_GET['alert'] != "" && $ok == true){
?>
alert("<?php echo $_GET['alert']; ?>");
<?php
}else{
echo "//".$ok."|".$_GET['alert']."\r\n";
}
?>
<?php
if(!isset($_GET['go']) || $_GET['go'] != false){
?>
top.location="<?php if(isset($_GET['loc']) && $_GET['loc'] != ""){echo $_GET['loc'];}else{echo ".";} ?>";
<?php
}
?>
</script>
<?php
}
?>