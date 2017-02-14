<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博文回收站</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css">

</head>

<body>
	<div class="table-section">
		<p><span class="icon-eye-open">&nbsp</span>博文回收站</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
			<thead>
				<tr>
			 		<th class="w1f">AID</th>
			 		<th class="w2f">标题</th>
			 		<th class="w4f">博客分类</th>
			 		<th class="w4f">摘要</th>
			 		<th class="w4f">查看次数</th>
			 		<th class="w4f">是否置顶</th>
			 		<th class="w4f">创作时间</th>
			 		<th class="w6f center">操作</th>
		 	</thead>
	 		<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$articles): ?><tr>
						<td><?php echo ($articles["aid"]); ?></td>
						<td><?php echo ($articles["title"]); ?></td>
						<td><?php echo ($articles["category"]["cname"]); ?></td>
						<td><?php echo ($articles["summary"]); ?></td>
						<td><?php echo ($articles["click"]); ?></td>
						<td><?php echo ($articles["istop"]); ?></td>
						<td><?php echo ($articles["time"]); ?></td>
						<td class="center">
							<a href="<?php echo U( GROUP_NAME .'/Article/recover',array('aid'=> $articles[aid]));?>" class="recover">[恢复]</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div class="manu page">
		<?php echo ($page); ?>
	</div>
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>	
</body>
</html>