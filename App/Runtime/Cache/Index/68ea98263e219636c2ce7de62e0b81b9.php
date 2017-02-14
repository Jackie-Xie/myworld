<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="博客，个性化，个人平台，分享" />
	<meta name="description" content="这是我的个人主页，主要是分享自己的爱好，知识，展示个人的信息，是与大家交流与学习的平台。" />
	<title>清风博客-我的主页</title>
	<link  rel="stylesheet"  href="__PUBLIC__/css/normalize.css">
	<link  rel="stylesheet"  href="__PUBLIC__/css/index.css">
	<!-- <link rel="stylesheet" href="__PUBLIC__/css/login.css"> -->
	<link  rel="stylesheet"  href="__PUBLIC__/css/font-awesome.min.css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/require.js" data-main="__PUBLIC__/js/toolbar-main"></script>
	<script src="__PUBLIC__/js/index.js" ></script>
	<script src="__PUBLIC__/js/jquery.easing.min.js"></script>
	<script src="__PUBLIC__/js/jquery.scrollify.min.js"></script>
	<script>
		$(function(){
			if($.trim($('#J_login').text()) == '登录') {
				$('#J_login').attr('href',"<?php echo U(GROUP_NAME . '/Login/index');?>");
			}else{
				$('#J_login').removeClass("href");
			}
		})
	</script>
</head>
<body>
	<div id="main-container">
		<header class="panel"> 
		<!-- 页头开始 -->
		 	<nav id="navid">
		 	<!-- 导航条开始 -->
		 		<div id="sub-nav">
				<div id="logo"><a id="J_login"><i class="icon-user"></i>&nbsp<?php if($username=session('username')){echo $username;} else{echo '登录';} ?></a></div>
				<div id="menu"><a href="javascript:void(0) ; ">MENU&nbsp<i class="icon-reorder"></i></a></div>
				<div id="skin"><a href="javascript:void(0) ; ">SKIN&nbsp<i class="icon-refresh"></i></a></div>	
				<a href="<?php echo U(GROUP_NAME . '/Login/logout');?>" id="logout"><i class="icon-remove-sign"></i>&nbsp退出</a>	
				</div>
			</nav>
			<!-- 导航条结束 -->
			<section id="banner">
				<div class="inner">
					<h1><?php echo ($info["indexname"]); ?></h1>
					<p><?php echo ($info["motto"]); ?></p>
					<a href="<?php echo U(GROUP_NAME . '/About/index');?>" class="main-btn">了解我</a>
					<div class="more">
					<a href="javascript:void(0) ;"><h3>more</h3><img src="__PUBLIC__/images/more.png"></a>
					</div>	
				</div>			
			</section>
		</header> 
		<!-- 页头结束 -->	

		<div id="list" >
		<!-- 滑动MENU开始 -->
			<div class="remove"><i class="icon-remove"></i></div>
			<ul>
				<li><a href="<?php echo U(GROUP_NAME . '/Index/index');?>"><i class="icon-home"></i><span>首页</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(GROUP_NAME . '/Blog/index');?>"><i class="icon-file"></i><span>博客</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(APP_PATH. '/Admin/Login');?>"><i class="icon-cog"></i><span>管理</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(GROUP_NAME . '/Hobby/index');?>"><i class="icon-heart"></i><span>爱好</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(GROUP_NAME . '/Music/index');?>"><i class="icon-music"></i><span>音乐</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(GROUP_NAME . '/About/index');?>"><i class="icon-user"></i><span>关于</span></a></li>
				<div class="hr"></div>
				<li><a href="<?php echo U(GROUP_NAME . '/Feedback/index');?> "><i class="icon-comment"></i><span>联系</span></a></li>
			</ul>	
		</div>
		<!-- 滑动MENU结束 -->
	
		<div id="content-container"> 
		<!-- 内容开始 -->
			<section id="green-section" class="panel">
				<div class="content">
					<div>
						<h3>紫陌红尘，蓦然回首</h3>
						<h4>缘起，缘灭</h4>
						<div class="hr"></div>
						<p>紫陌红尘，蓦然回首。多少的春花秋月;多少的逝水沉香;多少的海誓山盟，如沿途的风景花开花谢。人世间的情缘触痛了多少无言的感慨，情深缘浅的风吹散了多 少相聚离散。花开是有情，花落是无意。来者是萍水相逢，去者是江湖相忘。缘起时，我在人群中看到你。缘灭时，你消失在人群中。</p>		
					</div>
					<div class="icon-groups">
						<span class="icon"><a href="<?php echo U(GROUP_NAME . '/Feedback/index');?>"><i class="icon-edit icon-2x"></i></a></span>
						<span class="icon"><a href="<?php echo U(GROUP_NAME . '/Feedback/index');?>"><i class="icon-heart icon-2x"></i></a></span>
						<span class="icon"><a href="<?php echo U(GROUP_NAME . '/Feedback/index');?>"><i class="icon-thumbs-up icon-2x"></i></a></span>			
					</div>
				</div>
			</section>
			<section id="gray-section">
				<div class="article-preview clearfix panel">
					<div class="img-section img-odd-section">
						<img src="<?php echo ($item0["photoUrl"]); ?>" alt="">
					</div>
					<div class="text-section text-odd-section">
						<h2><?php echo ($item0["title"]); ?></h2>
						<div class="sub-heading"><?php echo ($item0["time"]); ?></div>
				    	<?php echo ($item0["content"]); ?> 
					</div>
				</div>
				<div class="article-preview clearfix panel">
					<div class="text-section">
						<h2><?php echo ($item1["title"]); ?></h2>
						<div class="sub-heading"><?php echo ($item1["time"]); ?></div>
				    	<?php echo ($item1["content"]); ?> 	    	
					</div>
					<div class="img-section img-even-section">
						<img src="<?php echo ($item1["photoUrl"]); ?>" alt="">
					</div>
				</div>
				<div class="article-preview clearfix panel">
					<div class="img-section img-odd-section">
						<img src="<?php echo ($item2["photoUrl"]); ?>" alt="">
					</div>
					<div class="text-section text-odd-section">
						<h2><?php echo ($item2["title"]); ?></h2>
						<div class="sub-heading"><?php echo ($item2["time"]); ?></div>
				    	<?php echo ($item2["content"]); ?> 	
					</div>
				</div>
			</section>
			<section id="purple-section" class="panel">
				<div class="content">
					<div class="heading-content">
						<h4>记得你叫我</h4>
						<h5>忘了吧</h5>
						<div class="hr"></div>
						<p>曾以为我会忘了你，象忘记一颗夏夜的星。以为我会恨你发誓不再提起你，然而一切只是自欺欺人。曾经因为你而爱上这个网络，海誓山盟相邀共赴红尘。到最后你终不肯走进我的生活，每次都是惊鸿一瞥然后人间蒸发。如此这般循环往复了三年，我终在佛祖前发下重誓：此生永不复见。</p>		
					</div>
					<div class="card-group clearfix">
					  <div class="cards">
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
						<div class="card">
							<h5>用心聆听</h5>
							<p>静心，静语。轻轻闭上眼睛，用耳去捕捉交织在身旁的声波，用心去细细勾勒身边的世界，这就是倾听的感觉。倾听——静心的乐曲。</p>
						</div>
					  </div>
					</div>
				</div>	
			</section>
			<section id="foot-section"  class="panel">
		     	<div class="foot-content">
					<div class="content">
					 <div class="content-center">
						<div class="foot-text">
							<h4>忘了吧？</h4>
							<p>夜深时，灯下静听心语，梦中一晌贪欢，依然明亮的眸子，映着那份淡然的静谧，聆一首云水，赋半生禅心，轻轻与自己私语，学会独自与心相守那份世间的美丽。</p>
						</div>
						<div class="btn-group">
							<a class="main-btn" href="<?php echo U(GROUP_NAME . '/Feedback/index');?>">咬我</a>
							<a class="main-btn" href="<?php echo U(GROUP_NAME . '/Feedback/index');?>">我宣你</a>
						</div>
					  </div>
			    	</div>	
				</div>
			</section> 
		</div>
		<!-- 内容结束 -->

		<footer>
		<!-- 页尾开始 -->
		    <div id="foot-item">			
		        <ul class="share-group">
		            <li><a href="javascript:void(0);"><i class="icomoon qq"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icomoon weixin"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icon-twitter"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icon-linkedin"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icon-facebook"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icon-google-plus"></i></a></li>
		            <li><a href="javascript:void(0);"><i class="icon-github"></i></a></li>
		        </ul>
				<div class="copy">
					Copyright &copy 2015-2016 Jackie Xie. All rights reserved.
				</div>
			</div>
		</footer> 
		<!-- 页尾结束 -->

		<div class="toolbar">
		<!-- toolbar开始 -->
			<a href="javascript:;" class="toolbar-item toolbar-item-weixin">
				<span class="toolbar-btn"></span>
			</a>
			<a href="<?php echo U(GROUP_NAME . '/Feedback/index');?>" class="toolbar-item toolbar-item-feedback">
				<span class="toolbar-btn"></span>
			</a>
			<a href="javascript:;" class="toolbar-item toolbar-item-qq">
				<span class="toolbar-btn"></span>
			</a>
			<a id="backTop" href="javascript:;" class="toolbar-item toolbar-item-top">
				<span class="toolbar-btn"></span>
			</a>
		</div>    
		<!-- toolbar结束 -->

	</div>
	



 <!--login/regist -->
<!-- 		<div id="signup" class="rl-modal ">
		  <div class="rl-modal-header">
		    <button type="button" class="rl-close" data-dismiss="modal" aria-hidden="true"></button>
		    <h1>
				<span data-fromto="signup:signin">登录</span>
				<span class="active-title">注册</span>
		    </h1>
		  </div>
		  <div class="rl-modal-body">
		    <form id="signup-form">
				<p class="rlf-tip-globle rlf-g-tip" id="signup-globle-error"></p>
				<div class="rlf-group proclaim-loc">
					<input  type="text" name="email" data-validate="email" class="ipt ipt-email" autocomplete="off" placeholder="请输入电子邮箱地址"/>
					<input style="display:none;" >
					<p class="rlf-tip-wrap"></p>
				</div>
				<div class="rlf-group proclaim-loc js-proclaim-on">
					<a href="javascript:void(0)" hidefocus="true" class="proclaim-btn js-proclaim icon-show-pw is-pwd"></a>
					<input type="password" name="password" data-validate="password" class="ipt ipt-pwd js-pass-pwd" placeholder="6-16位密码，区分大小写，不能用空格"/>
			        ie8 hack-->
			        <!--<input type="text" name="password" data-validate="password" class="ipt ipt-pwd js-txt-pwd" placeholder="6-16位密码，区分大小写，不能用空格"/>
			        <p class="rlf-tip-wrap"></p>
				</div>
				<div class="rlf-group">
					<input  type="text" name="nick" data-validate="nick" class="ipt ipt-nick" placeholder="昵称为2-18位，中英文、数字及下划线"/>
					<p class="rlf-tip-wrap"></p>
				</div>
				<div class="rlf-group clearfix">
				    <input type="text" name="verify" class="ipt ipt-verify l" placeholder="请输入验证码">
				    <a href="javascript:void(0)" hidefocus="true" class="verify-img-wrap js-verify-refresh"></a>
				    <a href="javascript:void(0)" hidefocus="true" class="icon-refresh js-verify-refresh"></a>
					<p class="rlf-tip-wrap"></p>
				</div>
				<div class="rlf-group clearfix">
					<input  type="button" id="signup-btn" value="注册" hidefocus="true" class="btn-red btn-full r"/>
				</div>
		    </form>
		  </div>
		  <div class="rl-model-footer">
		  	<div class="pop-login-sns clearfix">
		  		<span class="l">其他方式登录</span>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=weibo" class="pop-sns-weibo r"><i class="icon-weibo"></i></a>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=qq" class="pop-sns-qq r"><i class="icon-qq"></i></a>
		  		<a href="javascript:void(0)" hidefocus="true" data-login-sns="/passport/user/tplogin?tp=weixin" class="pop-sns-weixin r"><i class="icon-weixin"></i></a>
		  	</div>
		  </div>
		</div>
<div class="modal-backdrop  in"></div> -->
	<script>
	    var url = '__PUBLIC__/images/banner.jpg';
	    url = url.replace(".jpg","");
		$(function(){
			//随机换皮肤
			$('#skin').click(function(){
				$('#main-container').css({
					'background-image' : 'url('+ url + Math.floor(Math.random()*7+1) + '.jpg)'
				});
			});
		});
	</script>
</body>
</html>