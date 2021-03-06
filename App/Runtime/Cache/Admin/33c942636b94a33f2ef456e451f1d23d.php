<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言管理</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css">
	
</head>

<body>
	<div class="table-section">
		<p><span class="icon-comments">&nbsp</span>留言列表</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
			<thead>
				<tr>
			 		<th class="w1f">ID</th>
			 		<th class="w6f">留言内容</th>
			 		<th class="w6f">留言时间</th>
			 		<th class="w3f">留言者</th>
			 		<th class="w5f">留言者邮箱</th>
			 		<th class="w5f">留言者IP</th>
			 		<th class="w5f">留言者ID</th>
			 		<th class="w2f center">操作</th>
			 	</tr>
		 	</thead>
	 		<tbody>
				<?php if(is_array($select)): foreach($select as $key=>$advice): ?><tr>
						<td><?php echo ($advice["advid"]); ?></td>
						<td><?php echo ($advice["content"]); ?></td>
						<td><?php echo (date('Y-m-d H:i',$advice["time"])); ?></td>
						<td><?php echo ($advice["username"]); ?></td>
						<td><?php echo ($advice["email"]); ?></td>
						<td><?php echo ($advice["userip"]); ?></td>
						<td><?php echo ($advice["uid"]); ?></td>
						<td class="center">
							<a href="<?php echo U( GROUP_NAME .'/Advice/del_advice',array('advid'=> $advice[advid]));?>" class="del">[删除留言]</a>
							<a href="<?php echo U( GROUP_NAME .'/Advice/del_user',array('uid'=> $advice[uid]));?>" class="del">[删除留言者]</a>
							<a href="<?php echo U( GROUP_NAME .'/Advice/lock_user',array('uid'=> $advice[uid]));?>" class="lock">[锁定留言者]</a>
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