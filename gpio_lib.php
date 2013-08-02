<?php
function getport($num){
return file_get_contents("/sys/class/gpio/gpio".($num+1)."_pd".$num."/value",0,NULL,0,1);
}
function setport($num,$tf){
return system("echo ".$tf." > /sys/class/gpio/gpio".($num+1)."_pd".$num."/value");
}
?>