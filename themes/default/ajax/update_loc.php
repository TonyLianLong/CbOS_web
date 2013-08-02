<?php
//$_GET['x,y,things']
require_once "../../../db.php";
$result = mysql_query("UPDATE `menu` SET `x`=".$_GET["x"].",`y`=".$_GET["y"]." WHERE `id`='#".$_GET["things"]."';");
if(!$result){
echo "failed~".mysql_error();
}else{
echo "finish\r\n";
echo "UPDATE `menu` SET `x`=".$_GET["x"].",`y`=".$_GET["y"]." WHERE `id`='".$_GET["things"]."';";
}
?>