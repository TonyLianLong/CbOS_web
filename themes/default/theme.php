<?php
require_once "themes/".$theme."/config.inc.php";
require_once "verify.php";
require_once "getloc.php";
//echo $bg_filename;
require "login_check.php";
if($login == false && $loc != "login"){
?>
<script type="text/javascript">
self.location='?loc=login&link=<?php echo $loc ?>';
</script>
<?php
}else{
if(file_exists($theme_path."/".$loc.".php")){
	require $theme_path."/".$loc.".php";
}else{
	require $theme_path."/notfound.php";
}
}
?>
