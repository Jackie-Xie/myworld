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
	<form id="J_form">
		<div class="table-section">
			<p class="center"><span class="icon-key">&nbsp</span>修改密码</p>
			<table class="mc-table mc-table-prev mc-table-user">
		 		<tbody>
					<tr>
						<td class="td_head_user">用户名:</td>
						<td><input class="form-control" type="text" name="admin" placeholder="邮箱、手机号码或用户名"/></td>
					</tr>
					<tr>
						<td class="td_head_user">输入密码：</td>
						<td><input class="form-control" type="password" name="password" placeholder="请输入密码"/></td>
					</tr>
					<tr>
						<td class="td_head_user">确认密码：</td>
						<td><input class="form-control" type="password" name="repassword" placeholder="请再次输入密码"/></td>
					</tr>
					<tr>
						<td colspan="2" class="err_msg_center" id="error_msg"></td>
					</tr>
					<tr>
						<td colspan="2">
							<a href="javascript: location.reload();" class="btn btn-primary btn-lg active inline" role="button">重置</a>
							<a href="javascript:;" id="J_modify" class="btn btn-primary btn-lg active inline" role="button">修改</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<script>
		var handleUrl = '<?php echo U(GROUP_NAME . "/Admin/pwd_handle");?>/'; 
	</script>
</body>
</html>