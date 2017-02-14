<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/user-manage.css" />
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>	
    <script src="__PUBLIC__/js/admin.js"></script>	
</head>
<body>
	<form>
		<div class="table-section">
			<p class="center"><span class="icon-info-sign">&nbsp</span>管理员注册</p>
			<table class="mc-table mc-table-prev mc-table-user-reg">
		 		<tbody>
					<tr>
						<td class="td_head_user">用户名:</td>
						<td><input class="form-control" type="text" name="username"/></td>
						<td>
							<span class="error_msg" id="user_error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head_user">邮箱号码:</td>
						<td><input class="form-control" type="text" name="email"/></td>
						<td>
							<span  class="error_msg" id="email_error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head_user">手机号码:</td>
						<td><input class="form-control" type="text" name="mobile"/></td>
						<td>
							<span  class="error_msg" id="mobile_error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head_user">设置密码：</td>
						<td><input class="form-control" type="password" name="password"/></td>
						<td>
							<span  class="error_msg" id="pwd_error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head_user">确认密码：</td>
						<td><input class="form-control" type="password" name="repassword"/></td>
						<td>
							<span  class="error_msg" id="repwd_error_msg"></span>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="err_msg_center" id="error_msg"></td>
					</tr> 
					<tr>
						<td colspan="3" class="td_head_user">
							<a href="javascript:location.reload();" class="btn btn-primary btn-lg active inline1" role="button">重置</a>
							<a href="#" id="J_register" class="btn btn-primary btn-lg active inline1" role="button">注册</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<script>
		var handleUrl = '<?php echo U(GROUP_NAME . "/Admin/reg_handle");?>/'; 
	</script>
</body>
</html>