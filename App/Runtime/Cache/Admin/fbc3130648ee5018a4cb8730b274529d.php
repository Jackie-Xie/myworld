<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
    <link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css">
	
</head>

<body>
	<div class="table-section">
		<p><span class="icon-group">&nbsp</span>前端用户列表</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
			<thead>
				<tr>
			 		<th class="w2f">ID</th>
			 		<th class="w3f">用户名</th>
			 		<th class="w4f">电子邮箱</th>
			 		<th class="w4f">手机号码</th>
			 		<th class="w4f">注册时间</th>
			 		<th class="w4f">注册IP</th>
			 		<th class="w6f">最近登录时间</th>
			 		<th class="w6f">最近登录IP</th>
					<th class="w4f">是否锁定</th>
			 		<th class="w4f center">操作</th>
			 	</tr>
		 	</thead>
	 		<tbody>
				<?php if(is_array($select)): foreach($select as $key=>$user): ?><tr>
						<td><?php echo ($user["uid"]); ?></td>
						<td><?php echo ($user["username"]); ?></td>
						<td><?php echo ($user["email"]); ?></td>
						<td><?php echo ($user["mobile"]); ?></td>
						<td><?php echo ($user["regtime"]); ?></td>
						<td><?php echo ($user["regip"]); ?></td>
						<td><?php echo ($user["lastdate"]); ?></td>
						<td><?php echo ($user["lastip"]); ?></td>
						<td><?php echo ($user["islock"]); ?></td>
						<td class="center">
							<a href="<?php echo U( GROUP_NAME .'/Copy/delete',array('uid'=> $user[uid]));?>" class="del">[删除]</a>
							<a href="<?php echo U( GROUP_NAME .'/Copy/lock',array('uid'=> $user[uid]));?>" class="lock">[锁定]</a>
							<a href="<?php echo U( GROUP_NAME .'/Copy/open',array('uid'=> $user[uid]));?>" class="open">[解锁]</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div class="manu">
		<?php echo ($page); ?>
	</div>
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>		
</body>
</html>