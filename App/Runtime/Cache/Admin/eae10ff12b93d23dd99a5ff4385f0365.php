<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>清风博客-后台管理登录</title>
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css">
		<link rel="stylesheet" href="__PUBLIC__/css/normalize.css">
		<link rel="stylesheet" href="__PUBLIC__/css/login.css">
	</head>
	<body>
	    <div class="container-fluid login">
			<div class="row">
				<div class="col-md-12 col-xs-12">	
					<section>
					<!-- 页面内容 s -->
						<div class="login-wrap">
							<div class="login-top">
								<div class="logo"></div>
							</div>
							 <div class="login-box">
								<form id="formid">
									<div class="input-group">
									<label for="username">用户名：</label>
									<input type="text" name="username" id="J_username" autocomplete="off"/>
									</div>
									<div class="input-group">
									<label for="password">密&nbsp&nbsp&nbsp码：</label>
									<input type="password" name="password" id="J_password" autocomplete="off"/>
									<a class="forgot-pwd" href="#">忘记密码?</a>
									</div>
									<div class="input-group">
									<label for="verify">验证码：</label>
									<input type="text" name="verify" id="J_verify" autocomplete="off"/>
									 <a href="javascript:void(change_code(this));" class="verify-img"><img src="<?php echo U(GROUP_NAME . '/Login/verify');?> " id="verify"></a>
									</div>
									<p class="error" id="error_msg"></p>
									<a class="button" href="javascript:;" id="J_login">登录</a>		
								</form>
							</div>	
						</div>	
					</section>
					<!-- 页面内容 e -->
		        </div>
			</div>
		</div>	
		<script  src="__PUBLIC__/js/jquery.js"></script>
		<script  src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>	
		<script  src="__PUBLIC__/js/login.js"></script> 
		<script>
		 var URL = '<?php echo U(GROUP_NAME . "/Login/verify");?>/',  //验证码
			 handleUrl = '<?php echo U(GROUP_NAME . "/Login/login");?>/',  //ajax提交的Url
		 	 nextUrl = '<?php echo U(GROUP_NAME . "/Index/index");?>/'; //登录成功跳转
		 
		 //点击验证码图片 更换验证码图片
  		 function change_code(obj){
		 	$('#verify').attr("src",URL + Math.random());
		 	return false;
		 }
		</script>
	</body>
</html>