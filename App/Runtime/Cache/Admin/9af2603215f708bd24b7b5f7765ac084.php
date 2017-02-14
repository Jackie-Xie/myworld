<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看栏目</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css">

</head>

<body>
	<div class="table-section">
		<p><span class="icon-eye-open">&nbsp</span>查看栏目</p>
		<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
			<thead>
				<tr>
			 		<th class="w2f">CID</th>
			 		<th class="w4f">栏目名称</th>
			 		<th class="w4f">栏目别名</th>
			 		<th class="w4f">关键字</th>
			 		<th class="w6f">描述</th>
			 		<th class="w4f">状态</th>
			 		<th class="w3f center">操作</th>
			 	</tr>
		 	</thead>
	 		<tbody>
				<?php if(is_array($select)): foreach($select as $key=>$category): ?><tr>
						<td><?php echo ($category["cid"]); ?></td>
						<td><?php echo ($category["cname"]); ?></td>
						<td><?php echo ($category["bname"]); ?></td>
						<td><?php echo ($category["keywords"]); ?></td>
						<td><?php echo ($category["description"]); ?></td>
						<td><?php echo ($category["isoff"]); ?></td>
						<td class="center">
							<a href="<?php echo U( GROUP_NAME .'/Category/close',array('cid'=> $category[cid]));?>" class="close1">[关闭]</a>
							<a href="<?php echo U( GROUP_NAME .'/Category/open',array('cid'=> $category[cid]));?>" class="open1">[打开]</a>
							<a href="<?php echo U( GROUP_NAME .'/Category/edit',array('cid'=> $category[cid]));?>" class="edit">[编辑]</a>
							<a href="<?php echo U( GROUP_NAME .'/Category/del',array('cid'=> $category[cid]));?>" class="del">[删除]</a>
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