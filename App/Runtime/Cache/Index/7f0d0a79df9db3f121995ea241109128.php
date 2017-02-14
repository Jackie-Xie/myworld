<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge">
	<title>清风博客-忘记密码</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login-register.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/forgot.js"></script>
	<script>
	//改变验证码
	 var URL = '<?php echo U(GROUP_NAME . "/Login/verify");?>/';
	 function change_code(obj){
	 	$('#verify').attr("src",URL + Math.random());
	 	return false;
	 }
	</script>
</head>
<body style="background:#E5DDD0">
	<div id="container" style="background:#E5DDD0;margin-top: 30px;">
	    <div class="blog-logo"></div>
		<div id="forgotid" class="rl-modal in" aria-hidden="false">
		<div class="rl-modal-header">
		<button type="button" class="rl-close" data-dismiss="modal" aria-hidden="true"></button>
		<h1 style="height:40px;line-height:40px;margin-left:10px;font-size:16px;">忘记密码</h1>
		</div>
		<div class="rl-modal-body">
			<div class="clearfix">
			<div class="l-left-wrap l">
				<form action="<?php echo U(GROUP_NAME . '/Login/forgot');?>" method="post" id="signup-form" onsubmit="return checkUser();">
					<p class="rlf-tip-globle " id="signin-globle-error"></p>
					<div class="rlf-group">
						<input type="text" name="email" id="emailid" autocomplete="off" class="ipt ipt-email js-own-name" placeholder="请输入注册时的邮箱">
						<p class="rlf-tip-wrap" id="emailerr"></p>
					</div>
					<div class="rlf-group js-verify-row clearfix">
					    <input type="text" name="verify" class="ipt ipt-verify l" placeholder="请输入验证码">
					    <a href="javascript:void(change_code(this));" class="verify-img-wrap js-verify-refresh"><img class="verify-img" src="<?php echo U(GROUP_NAME . '/Login/verify');?> " id="verify"></a>
			    		<a href="javascript:void(change_code(this));" class="icon-refresh js-verify-refresh"></a>
						<p class="rlf-tip-wrap"></p>
					</div>
					<div class="rlf-group rlf-appendix clearfix">
						<a href="<?php echo U(GROUP_NAME . '/Login/register');?>" class="rlf-forget r" hidefocus="true">没账号，去注册 </a>
					</div>
					<div class="rlf-group clearfix">
						<input type="submit" id="signin-btn" value="重置密码" hidefocus="true" class="btn-red btn-full">
					</div>
			    </form>
			</div>
			</div>
		</div>
		</div> 
	</div>
</body>
</html>