<?php
//Verfy
if(!isset($can_pass_verify) || $can_pass_verify != true){
echo "请不要非法登录，谢谢。";
?>
<script type="text/javascript">top.location="/";</script>
<?php
exit (1);
}
?>