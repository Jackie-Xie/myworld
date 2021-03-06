<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
	<script src="__PUBLIC__/js/pccs.js"></script>
    <script src="__PUBLIC__/js/ajaxupload.3.6.js"></script>
    <script type="text/javascript">
	    $(function(){
	    	//图片上传处理
		    var button = $('#upload_button'), interval;
		    var confirmdiv = $('#uploadphotoconfirm');
		    var fileType = "pic",fileNum = "one"; 
		    new AjaxUpload(button,{
		        action: "<?php echo U(GROUP_NAME . '/Index/uppic');?>",
		        name: 'userfile',
		        onSubmit : function(file, ext){
		            if(fileType == "pic")
		            {
		                if (ext && /^(jpg|png|jpeg|gif|JPG)$/.test(ext)){
		                    this.setData({
		                        'info': '文件类型为图片'
		                    });
		                } else {
		                     confirmdiv.text('文件格式错误，请上传格式为.png .jpg .jpeg 的图片');
		                    return false;               
		                }
		            }
		                        
		            confirmdiv.text('文件上传中');
		            
		            if(fileNum == 'one')
		                this.disable();
		            
		            interval = window.setInterval(function(){
		                var text = confirmdiv.text();
		                if (text.length < 14){
		                    confirmdiv.text(text + '.');                    
		                } else {
		                    confirmdiv.text('文件上传中');             
		                }
		            }, 200);
		        },
		        onComplete: function(file, response){
		            if(response != "success"){
		                if(response =='2'){
		                    confirmdiv.text("文件格式错误，请上传格式为.png .jpg .jpeg 的图片");
		                }else{
		                    if(response.length>20){
		                        confirmdiv.text("文件上传失败请重新上传"+response);            
		                    }else{
		                        confirmdiv.text("上传完成");
		                         $("#newbikephotoName").val("__ROOT__/Uploads/experiences/"+response);
		                         $("#newbikephoto").attr("src","__ROOT__/Uploads/experiences/"+response);            
		                    }
		                }
		                
		            }
		                                  
		            window.clearInterval(interval);
		                        
		            this.enable();
		            
		            if(response == "success")
		            alert('上传成功');              
		        }
		    });
	    });
    </script>
    <script>
		window.UEDITOR_HOME_URL = '__ROOT__/App/Extends/Ueditor/';
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 900;  //初始化编辑器宽度,默认1000
			window.UEDITOR_CONFIG.initialFrameHeight = 600; //初始化编辑器高度,默认320
			window.UEDITOR_CONFIG.imageUrl = "<?php echo U(GROUP_NAME . '/Index/upload');?>"; /* 执行上传请求接口路径 */
			window.UEDITOR_CONFIG.imagePath = "__ROOT__/Uploads/experiences/" ; /*上传图片的修正地址*/
			UE.getEditor('J_content');  //实例化编辑器
		}
	</script>
	<script type="text/javascript" src="__ROOT__/App/Extends/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="__ROOT__/App/Extends/Ueditor/ueditor.all.min.js"></script>
</head>
<body>
	<form>
		<div class="table-section">
			<div><span class="icon-user">&nbsp</span>主要经历</div>
			<table class="mc-table mc-table-striped mc-table-hover">
		 		<tbody>
					<tr>
						<td class="td_head">标题：</td>
						<td>
							<input type="text" class="form-control" id="J_title" name="title" placeholder="标题">
						</td>
						<td class="limit">
							<span class="error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head">时间：</td>
						<td>
							<input id="J_time" class="form-control form_datetime" type="text" name="time" value="1970-01-01" readonly >
						</td>
						<td class="limit">
							<span class="error_msg"></span>
						</td>
					</tr>
					<tr>
						<td class="td_head">照片：</td>
						<td>
						    <label class="control-label" for="bike_type"> </label>
						    <input type="file" style="display:none" name="userfile">
						    <input type="hidden" id="newbikephotoName" name="bike_photo" value="" />
						    <input type="hidden" id="oldbikephotoName" value="" />
						    <div class="controls" style="text-align:center;">
						        <img  id="newbikephoto" src="__PUBLIC__/images/nopicture.jpg" style="max-height:400px;max-width:500px;" />
						        <div style="display:block; margin:20px; vertical-align:middle">
						        	<span id="uploadphotoconfirm" class="error_msg" style="margin-bottom:20px;"></span>
							        <input type="button" class="btn btn-primary" id="upload_button" value="上传图片" />
							        <span class="error_msg" style="display:block; margin-top:20px; vertical-align:middle;font-size:14px;">*注意：请上传格式为 png、jpg 或 jpeg 的图片，并且推荐上传500*400像素的图片效果最佳</span>
						        </div>
						    </div>
						</td>
					</tr>
					<tr>
						<td class="td_head">内容：</td>
						<td><textarea name="content" id="J_content" rows="20"></textarea></td>
						<td class="limit">
							<span class="error_msg"></span>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<span class="error_msg"  id="J_error_msg"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<a href="javaScript:;" id="J_post" class="btn btn-primary btn-lg active post-btn" role="button">提交</a>
		</div>
	</form>
	 <script>
        //日期选择
	    $(".form_datetime").datetimepicker({
	    	language: 'zh-CN',/*加载日历语言包，可自定义*/
	        format: "yyyy-mm-dd",
	        startDate: "1970-01-01",
	        todayBtn: true,
         	autoclose: true
	    });

	    var handleUrl = '<?php echo U(GROUP_NAME . "/Index/handle");?>/'; 
    </script>
	<script src="__PUBLIC__/js/experience.js"></script>
</body>
</html>