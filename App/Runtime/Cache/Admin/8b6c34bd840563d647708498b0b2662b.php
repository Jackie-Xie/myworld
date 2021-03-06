<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论管理</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css">
	
</head>

<body>
	<div class="table-section">
		<p><span class="icon-comments">&nbsp</span>评论列表</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
			<thead>
				<tr>
			 		<th class="w1f">ID</th>
			 		<th class="w4f">评论内容</th>
			 		<th class="w4f">回复内容</th>
			 		<th class="w3f">评论时间</th>
			 		<th class="w3f">评论者</th>
			 		<th class="w4f">所属文章</th>
			 		<th class="w6f center">操作</th>
			 	</tr>
		 	</thead>
	 		<tbody>
				<?php if(is_array($select)): foreach($select as $key=>$comments): ?><tr>
						<td><?php echo ($comments["comid"]); ?></td>
						<td><?php echo ($comments["content"]); ?></td>
						<td><?php echo ($comments["reply"]); ?></td>
						<td><?php echo (date('Y-m-d H-i',$comments["time"])); ?></td>
						<td><?php echo ($comments["nickname"]); ?></td>
						<td><?php echo ($comments["article"]["title"]); ?></td>
						<td class="center">
							<a href="<?php echo U( GROUP_NAME .'/Comment/del',array('comid'=> $comments['comid']));?>" class="del">[删除评论]</a>
							<a href="<?php echo U( GROUP_NAME .'/Comment/reply',array('comid'=> $comments['comid']));?>" class="reply">[回复评论]</a>
							<a href="<?php echo U( GROUP_NAME .'/Comment/del_user',array('uid'=> $comments['user']['uid']));?>" class="del">[删除评论者]</a>
							<a href="<?php echo U( GROUP_NAME .'/Comment/lock_user',array('uid'=> $comments['user']['uid']));?>" class="lock">[锁定评论者]</a>
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