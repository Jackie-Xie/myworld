<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge">
	<title>清风博客-用户注册</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login-register.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	<script>
	 //验证码切换
	 var URL = '<?php echo U(GROUP_NAME . "/Login/verify");?>/';
	 function change_code(obj){
	 	$('#verify').attr("src",URL + Math.random());
	 	return false;
	 }
	 //登录按钮点击
	$(function(){
		$('#singin-click').click( function() {
			location.href = '<?php echo U(GROUP_NAME . "/Login/index");?>';
		});
	});
	</script>
</head>
<body style="background:#E5DDD0">
	<div id="container" style="background:#E5DDD0;margin-top: 30px;">
	    <div class="blog-logo"></div>
		<div id="signup" class="rl-modal " style="margin-top: -235px;">
		  <div class="rl-modal-header">
		    <button type="button" class="rl-close" data-dismiss="modal" aria-hidden="true"></button>
		    <h1>
				<span data-fromto="signup:signin" id="singin-click">登录</span>
				<span class="active-title">注册</span>
		    </h1>
		  </div>
		  <div class="rl-modal-body">
		    <form action="<?php echo U(GROUP_NAME . '/Login/register');?>" method="post" id="signup-form">
				<p class="rlf-tip-globle rlf-g-tip" id="signup-globle-error"></p>
				<div class="rlf-group proclaim-loc">
					<input  type="text" name="email" id="email" class="ipt ipt-email" autocomplete="off" placeholder="请输入电子邮箱地址"/>
					<input style="display:none;" >
					<p class="rlf-tip-wrap" id="email-error"></p>
				</div>
				<div class="rlf-group proclaim-loc js-proclaim-on">
					<a href="javascript:void(0)" hidefocus="true" class="proclaim-btn js-proclaim icon-show-pw is-pwd"></a>
					<input type="password" name="password" id="password" class="ipt ipt-pwd js-pass-pwd" placeholder="6-16位密码，区分大小写，不能用空格"/>
			        <!--ie8 hack-->
			        <input type="text" name="password" id="password" class="ipt ipt-pwd js-txt-pwd" placeholder="6-16位密码，区分大小写，不能用空格"/>
			        <span class="rlf-tip-wrap" id="pwd-error"></span><span id="pwdLvSpan"><i id="pwdLv"></i></span>
				</div>
				<div class="rlf-group proclaim-loc js-proclaim-on">
					<a href="javascript:void(0)" hidefocus="true" class="proclaim-btn js-proclaim icon-show-pw is-pwd"></a>
					<input type="password" name="repassword" id="repassword" class="ipt ipt-pwd js-pass-pwd" placeholder="请再次输入，确认密码输入无误"/>
			        <!--ie8 hack-->
			        <input type="text" name="repassword" id="repassword" class="ipt ipt-pwd js-txt-pwd" placeholder="请再次输入，确认密码输入无误"/>
			        <p class="rlf-tip-wrap" id="repwd-error"></p>
				</div>
				<div class="rlf-group">
					<input  type="text" name="username" id="nick" class="ipt ipt-nick" placeholder="昵称为2-18位，中英文、数字及下划线等"/>
					<p class="rlf-tip-wrap" id="nick-error"></p>
				</div>
				<div class="rlf-group">
					<input  type="text" name="mobile" id="mobile" class="ipt ipt-nick" placeholder="请输入11位手机号码"/>
					<p class="rlf-tip-wrap" id="mobile-error"></p>
				</div>
				<div class="rlf-group clearfix">
				    <input type="text" name="verify" class="ipt ipt-verify l" placeholder="请输入验证码">
				    <a href="javascript:void(change_code(this));" hidefocus="true" class="verify-img-wrap js-verify-refresh"><img class="verify-img" src="<?php echo U(GROUP_NAME . "/Login/verify");?>" id="verify"></a>
				    <a href="javascript:void(change_code(this));" hidefocus="true" class="icon-refresh js-verify-refresh"></a>
					<p class="rlf-tip-wrap" id="code-error"></p>
				</div>
				<div class="rlf-group clearfix">
					<input  type="submit" id="signup-btn" value="注册" hidefocus="true" class="btn-red btn-full r"/>
				</div>
		    </form>
		  </div>
		  <div class="rl-model-footer" style="display:none">
		  	<div class="pop-login-sns clearfix">
		  		<span class="l">其他方式登录</span>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=weibo" class="pop-sns-weibo r"><i class="icon-weibo"></i></a>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=qq" class="pop-sns-qq r"><i class="icon-qq"></i></a>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=weixin" class="pop-sns-weixin r"><i class="icon-weixin"></i></a>
		  	</div>
		  </div>
		</div>
	</div>
	<script type="text/javascript" src="__PUBLIC__/js/register.js"></script>
</body>
</html>