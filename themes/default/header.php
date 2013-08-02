<?php require_once "verify.php"; ?>
<div class="header noselect">
<table border="0" style="width:100%;" >
<tr>
<td style="width:5px"></td>
<td style="width:25px;"><img alt="<?php echo $os ?>控制面板" style="width:22px;height:23px;" id="header_logo" src="<?php echo $theme_path."/" ?>image/CbOS_grey_logo.png" /></td>
<td style="width:200px;"><!--User-Module-Show--></td>
<td><!--Nothing--></td>
<td style="width:140px;text-align:right;" class="text4 canmiddle" id="user">用户<img style="width:24px;height:25px;" alt="用户控制面板" src="<?php echo $theme_path."/" ?>image/user-icon.png" /></td>
<td style="width:25px;"><img style="width:24px;height:24px;" id="exit" alt="退出" src="<?php echo $theme_path."/" ?>image/exit-icon.png" /></td>
</tr>
</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#header_logo").click(function(){
		self.location='http://panel.tonylianlong.com';
	});
	$("#user").click(function(){
		self.location='?loc=user';
	});
	$("#exit").click(function(){
		self.location='?loc=login&action=exit';
	});
});
</script>