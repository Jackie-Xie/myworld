<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统信息</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
    <link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>	
</head>
<body>
	<div class="table-section">
		<p><span class="icon-user"></span>&nbsp管理员信息</p>
 		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
	 		<tbody>
				<tr>
					<td class="table-head">用户名</td>
					<td class="table-content"><?php echo (session('username')); ?></td>
				</tr>
				<tr>
					<td class="table-head">登录IP</td>
					<td class="table-content"><?php echo get_client_ip(); ?></td>
				</tr>
				<tr>
					<td class="table-head">登录时间</td>
					<td class="table-content"><?php echo date('Y-m-d H:i:s',time()); ?></td>
				</tr>
 			</tbody>
 		</table>
 		<p><span class=" icon-globe"></span>&nbsp服务器信息</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
	 		<tbody>
				<tr>
					<td class="table-head">服务器环境</td>
					<td class="table-content"><?php echo ($_SERVER["SERVER_SOFTWARE"]); ?></td>
				</tr>
				<tr>
					<td class="table-head">PHP版本</td>
					<td class="table-content"><?php echo phpversion(); ?></td>
				</tr>
				<tr>
					<td class="table-head">服务器IP</td>
					<td class="table-content"><?php echo ($_SERVER["SERVER_ADDR"]); ?></td>
				</tr>
				<tr>
					<td class="table-head">操作系统</td>
					<td class="table-content"><?php echo PHP_OS; ?></td>
				</tr>
				<tr>
					<td class="table-head">ThinkPHP</td>
					<td class="table-content"><?php echo THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]'; ?></td>
				</tr>
		
			</tbody>
 		</table>
 		<p><span class="icon-table"></span>&nbsp数据库信息</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
	 		<tbody>
				<tr>
					<td class="table-head">数据库类型</td>
					<td class="table-content">MySQL</td>
				</tr>
				<tr>
					<td class="table-head">数据库版本</td>
					<td class="table-content">5.7.9</td>
				</tr>
				<tr>
					<td class="table-head">服务器IP</td>
					<td class="table-content"><?php echo ($_SERVER["SERVER_ADDR"]); ?></td>
				</tr>
				<tr>
					<td class="table-head">数据库端口</td>
					<td class="table-content">3306</td>
				</tr>
			</tbody>
 		</table>
	</div>
</body>
</html>