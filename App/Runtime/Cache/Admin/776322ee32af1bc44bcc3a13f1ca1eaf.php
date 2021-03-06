<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>	
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/user-manage.css" />
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/bootstrap-datetimepicker.min.js"></script>
	<script src="__PUBLIC__/js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>
</head>
<body>
	<form>
		<div class="table-section">
			<p><span class="span_people">&nbsp</span>回复评论</p>
			<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
		 		<tbody>
					<tr>
						<td class="td_head">评论ID：</td>
						<td id="J_comid"><?php echo ($comment["comid"]); ?></td>
					</tr>
					<tr>
						<td class="td_head">评论者：</td>
						<td>
							<?php echo ($comment["nickname"]); ?>
						</td>
					</tr>
					<tr>
						<td class="td_head">所属文章：</td>
						<td>
							<?php echo ($comment["article"]["title"]); ?>
						</td>
					</tr>
					<tr>
						<td class="td_head">评论时间：</td>
						<td>
							<?php echo (date("Y-m-d H:i",$comment["time"])); ?>
						</td>
					</tr>
					<tr>
						<td class="td_head">内容：</td>
						<td>
							<?php echo ($comment["content"]); ?>
						</td>
					</tr>
					<tr>
						<td class="td_head">回复：</td>
						<td>
							<textarea class="form-control" name="reply" id="J_reply" rows="3"></textarea>
						</td>
					</tr>		
				</tbody>
			</table>
			<div id="err_msg" style="text-align:center;font-size:14px;color:#F66;margin:10px;"></div>
			<a href="javaScript:;" id="J_post" class="btn btn-primary btn-lg active post-btn" role="button">提交</a>
		</div>
	</form>
	 <script>
	    var handleUrl = '<?php echo U(GROUP_NAME . "/Comment/reply_handle");?>/'; 
    </script>
	<script src="__PUBLIC__/js/comment.js"></script>
</body>
</html>