<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.3.3.5.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/main_table.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/user-manage.css" />	
</head>
<body>
	<form>
		<div class="table-section">
			<p><span class="icon-edit" data-id="<?php echo ($data["cid"]); ?>" id="J_getId"></span>&nbsp编辑栏目</p>
			<table class="mc-table mc-table-striped mc-table-hover mc-table-prev">
		 		<tbody>
					<tr>
						<td class="table-head">栏目名称</td>
						<td class="table-content"><input type="text" name="cname" class="form-control" placeholder="栏目名称" value='<?php echo ($data["cname"]); ?>'/></td>
					</tr>
					<tr>
						<td class="table-head">栏目别名</td>
						<td class="table-content"><input type="text" name="bname" class="form-control" placeholder="栏目别名" value='<?php echo ($data["bname"]); ?>'/></td>
					</tr>
					<tr>
						<td class="table-head" >开启状态</td>
						<td class="table-content" id="radioid" data-value="<?php echo ($data["isoff"]); ?>">
							<label class="radio-inline">
							  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" > 开启
							</label>
							<label class="radio-inline">
							  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0"> 关闭
							</label>
						</td>

					</tr>
					<tr>
						<td class="table-head" >关键字</td>
						<td class="table-content">
						<input type="text" name="keywords" id="J_keywords" class="form-control" placeholder="各关键字间用','隔开" value="<?php echo ($data["keywords"]); ?>"/>
						</td>
					</tr>
					<tr>
						<td class="table-head" >描述</td>
						<td class="table-content">
							<textarea name="description" id="J_description" class="form-control" placeholder="对栏目进行简要的描述"><?php echo ($data["description"]); ?></textarea>
						</td>
					</tr>
					<tr>
						<td class="err_msg_center" id="err_msg" colspan="2" style="text-align:center;"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;">
							<a href="javascript: location.reload();" class="btn btn-primary btn-lg active inline2" role="button">重置</a>
							<a href="javascript:;" id="J_modify" class="btn btn-primary btn-lg active inline2" role="button">修改</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.3.3.5.min.js"></script>
	<script src="__PUBLIC__/js/public.js"></script>	
	<script src="__PUBLIC__/js/category.js"></script>	
	<script>
	 var handleUrl = '<?php echo U( GROUP_NAME .'/Category/modify');?>';
	 var data = $( '#radioid').attr('data-value');
	 $(function(){
		//控制radio的值的读取显示
		if(data == 1){
			$( '#inlineRadio1' ).prop("checked",true);
			$( '#inlineRadio2').removeAttr("checked");
		}else if(data == 0){
			$( '#inlineRadio2' ).prop("checked",true);
			$( '#inlineRadio1').removeAttr("checked");
		}
	})
	</script>
</body>
</html>