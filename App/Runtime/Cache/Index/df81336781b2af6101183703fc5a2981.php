<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge">
	<title>清风博客-建议墙</title>
	<link rel="stylesheet" href="__PUBLIC__/css/feedback.css" />
	<script type="text/javascript" src='__PUBLIC__/js/jquery.js'></script>
	<script type="text/javascript" src='__PUBLIC__/js/Feedback.js'></script>
	<script type="text/javascript">
		var handleUrl = '<?php echo U("Index/Feedback/handle",'','');?>'
	</script>
</head>
<body>
	<div class="feedback-containner">
		<div id='top'>
			<span id='send'></span>
		</div>
		<div id='main'>
		  <?php if(is_array($advice)): foreach($advice as $key=>$v): ?><dl class='paper a<?php echo mt_rand(1,5);?>'>
				<dt>
					<span class='username'><?php echo ($v["username"]); ?></span>
					<span class='num'>No.<?php echo ($v["advid"]); ?></span>
				</dt>
				<dd class='content'><?php echo (replace_phiz($v["content"])); ?></dd>
				<dd class='bottom'>
					<span class='time'><?php echo (date('Y-m-d H:i',$v["time"])); ?></span>
					<a href="" class='close'></a>
				</dd>
			</dl><?php endforeach; endif; ?>
			
		</div>

		<div id='send-form'>
			<p class='title'><span>发表你的建议</span><a href="javascript:void(0);" id='close'></a></p>
			<form  name='advice'>
				<p>
					<label for="username">昵称：</label>
					<input type="text" name='username' id='username' value="<?php echo (session('username')); ?>" disabled="true"　readOnly="true" />
					<span class="error" id="username-err"> </span>
				</p>
				<p>
					<label for="email">邮箱：</label>
					<input type="text" name='email' id='email'/>
					<span class="error" id="email-err"></span>
				</p>
				<p>
					<label for="content">建议：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
					<textarea name="content" id='content'></textarea>
					<div id='phiz'>
						<img src="__PUBLIC__/images/phiz/zhuakuang.gif" alt="抓狂" />
						<img src="__PUBLIC__/images/phiz/baobao.gif" alt="抱抱" />
						<img src="__PUBLIC__/images/phiz/haixiu.gif" alt="害羞" />
						<img src="__PUBLIC__/images/phiz/ku.gif" alt="酷" />
						<img src="__PUBLIC__/images/phiz/xixi.gif" alt="嘻嘻" />
						<img src="__PUBLIC__/images/phiz/taikaixin.gif" alt="太开心" />
						<img src="__PUBLIC__/images/phiz/touxiao.gif" alt="偷笑" />
						<img src="__PUBLIC__/images/phiz/qian.gif" alt="钱" />
						<img src="__PUBLIC__/images/phiz/huaxin.gif" alt="花心" />
						<img src="__PUBLIC__/images/phiz/jiyan.gif" alt="挤眼" />
						<span class="error" id="content-err"> </span>
					</div>
				</p>
				<span id='send-btn'></span>
			</form>
		</div>
	</div>
	<!--[if IE 6]>
	    <script type="text/javascript" src="__PUBLIC__/js/iepng.js"></script>
	    <script type="text/javascript">
	        DD_belatedPNG.fix('#send,#close,.close','background');
	    </script>
	<![endif]-->
</body>
</html>