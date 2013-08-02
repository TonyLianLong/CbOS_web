<?php
function get($thing,$loc){
$result = mysql_query("SELECT ".$thing." FROM `".$loc."`;");
if(!$result){
return -1;
}
$get = mysql_fetch_array($result);
return $get[0];
}
//不建议使用：
function set($thing,$set,$w_name,$w_thing){
$result = mysql_query("UPDATE ".$thing."  SET ".$set." WHERE `".$loc."`.`".$w_name."`=".$w_things." LIMIT 1;");
return $result;
}
?>