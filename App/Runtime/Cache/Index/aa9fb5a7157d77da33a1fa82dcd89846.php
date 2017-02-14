<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge">
	<title>清风博客-我的博客</title>
	<meta name="keywords" content="博客，个性化，分享知识，互相学习" />
	<meta name="description" content="这是我的个人博客，为了将自己的见解与大家交流切磋，互相学习。这也是总结、积累并分享知识的一个平台。" />
	<link  rel="stylesheet"  href="__PUBLIC__/css/normalize.css" />
	<link  rel="stylesheet"  href="__PUBLIC__/css/font-awesome.min.css" />
	<!--[if IE 7]>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link rel="stylesheet" href="__PUBLIC__/css/myBlog.css" />
	<link  rel="stylesheet"  href="__PUBLIC__/css/article.css" />
	<link  rel="stylesheet"  href="__PUBLIC__/css/article_list.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/about.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/myHobby.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/page.css" />
	<link rel="shortcut icon"  href="__PUBLIC__/images/logo-short.png" />
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script>
		$(function(){
			if($.trim($('#login').text()) == '登录') {
				$('#login').attr('href',"<?php echo U(GROUP_NAME . '/Login/index');?>");
			}else{
				$('#login').removeClass("href");
			}
		})
	</script>
</head>
<body>
<div id="container">
	<!-- 头部开始 -->
	<header>
		<div id="header_content">
	<!-- 头部左侧 -->
		<div id="header_left">
			<div id="logo"></div>
		</div>
		<!-- 头部右侧 -->
		<div id="header_right">
			 <div class="blog_login"><a  id="logout" href="<?php echo U(GROUP_NAME . '/Login/logout');?>"><i class="icon-remove-sign"></i>&nbsp注销</a><a id="login" style="text-decoration:none;color:#666"><i class="icon-user"></i>&nbsp<?php if($username=session('username')){echo $username;} else{echo '登录';} ?></a></div>
		</div>
		</div>	
	</header>
	<!-- 头部结束 -->
	<nav>
	<!-- 导航条开始 -->
	   <div id="navid">
		<ul>
			<li><a href="<?php echo U(GROUP_NAME . '/Index/index');?>">首页</a></li>
			<li class="active"><a href="<?php echo U(GROUP_NAME . '/Blog/index');?>">博客</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/Category/index');?>">栏目</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/Article/articleList');?>">博文</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/Hobby/index');?>">爱好</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/Music/index');?>">音乐</a></li>
			<li><a href="<?php echo U(APP_PATH. '/Admin/Login');?>">管理</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/About/index');?>">关于我</a></li>
			<li><a href="<?php echo U(GROUP_NAME . '/Feedback/index');?>">联系我</a></li>
		</ul>
		<div class="top_search">
			<form action="http://www.baidu.com/" method="get" name="search_top" id="formtop" target="_blank">
                <div class="search-input-area"> 
                <span class="hidden">搜索</span>
                <input type="text" name="search" id="searchInput_top" value="请输入关键词" onBlur="if(this.value==''){this.value='请输入关键词';this.style.color='#D1D1D1'}" style="color: #d1d1d1" onFocus="if(this.value=='请输入关键词'){this.value='';this.style.color='#000'}" class="textBox ">
                <input type="submit" name="Submit" value="" tabindex="0" title="搜索" class="search-logo" id="sb_form_go">
                </div>
            </form>
		</div>
	   </div>
	</nav>
	<!-- 导航条结束 -->	
<div id="main_content"> 
  	<div id="hobby_poster">
		<div class="J_Poster poster-main" data-setting='{
		                       "width":1000,
		                       "height":320,
		                       "posterWidth":640,
		                       "posterHeight":320,
		                       "scale":0.85,
		                       "autoPlay":true,
		                       "delay":2000,
		                       "speed":500,
		                       "verticalAlign":"middle"		                       
		}'>
			<div class="poster-btn poster-prev-btn"></div>
			<ul class="poster-list">
				<?php if(is_array($hobby)): foreach($hobby as $key=>$vo): ?><li class="poster-item"><a href="#"><img src="<?php echo ($vo["posturl"]); ?>" alt="<?php echo ($vo["name"]); ?>" width="100%"/><span class="poster-des"><?php echo ($vo["name"]); ?><p><?php echo ($vo["content"]); ?></p></span></a></li><?php endforeach; endif; ?>			
			</ul>
			<div class="poster-btn poster-next-btn"></div>
		</div>
	</div>
     <div id="hobby_content">
     	<ul class="photo_list">
     	    <?php if(is_array($hobby)): foreach($hobby as $key=>$vol): if(is_array($vol['picture'])): foreach($vol['picture'] as $key=>$v): ?><li class="photo_item">
		     			<a href="#" id="J_link">
			     			<img src="<?php echo ($v["pUrl"]); ?>" alt-="<?php echo ($v["pname"]); ?>" width="100%" id="J_picture"/>
			     			<h4><?php echo ($v["pname"]); ?></h4>
		     			</a>
		     		</li><?php endforeach; endif; endforeach; endif; ?>
     	</ul>
     </div>         
</div>
<script>
	$(function(){
		var link = '',
			temp = $('#J_picture').attr('src').replace(/[^0-9]/ig, "");
		var num=parseInt(temp);
		if(num==1){
			link="http://www.iqiyi.com/lib/m_208282514.html?src=search";
			
		}else if(num==2){
			link="http://www.iqiyi.com/lib/m_209067614.html?src=search";
		}else if(num==3){
			link="http://www.iqiyi.com/a_19rrhaen1h.html#vfrm=2-3-0-1";
		}else if(num==4){
			link="http://www.iqiyi.com/a_19rrhaft45.html#vfrm=2-3-0-1";
		}else if(num==5){
			link="http://www.iqiyi.com/lib/m_200054014.html?src=search";
		}else if(num==6){
			link="http://www.iqiyi.com/lib/m_200051714.html?src=search";
		}else if(num==7){
			link="http://www.iqiyi.com/a_19rrhb5gz1.html#vfrm=2-3-0-1";
		}else if(num==8){
			link="http://www.iqiyi.com/a_19rrhak911.html#vfrm=2-3-0-1";
		}else if(num==9){
			link="http://www.iqiyi.com/lib/m_209952314.html?src=search";
		}else if(num==10){
			link="http://www.iqiyi.com/a_19rrhah50x.html#vfrm=2-3-0-1";
		}else if(num==11){
			link="http://www.iqiyi.com/a_19rrha9c9d.html#vfrm=2-3-0-1";
		}else if(num==12){
			link="http://www.iqiyi.com/lib/m_209822614.html?src=search";
		}

		$('#J_link').attr('href',link);
	})
</script>

  <!--内容区域结束 -->
<footer> 
	<!-- 页尾开始 -->
		<div id="foot-item">			
	    <ul class="share-group">
	        <li><a href="http://www.qq.com"><i class="icomoon qq"></i></a></li>
	        <li><a href="https://wx.qq.com/"><i class="icomoon weixin"></i></a></li>
	        <li><a href="https://twitter.com/"><i class="icon-twitter"></i></a></li>
	        <li><a href="http://www.in66.com/"><i class="icon-linkedin"></i></a></li>
	        <li><a href="https://www.facebook.com/"><i class="icon-facebook"></i></a></li>
	        <li><a href="https://www.google.com/"><i class="icon-google-plus"></i></a></li>
	        <li><a href="https://github.com/"><i class="icon-github"></i></a></li>
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
 <!-- container结束 -->
 
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/myBlog.js"></script>
	<script src="__PUBLIC__/js/require.js" data-main="__PUBLIC__/js/toolbar-main"></script>	
	<script src="__PUBLIC__/js/focus-photo.js"></script>
    <script  src="__PUBLIC__/js/carrousel.js"></script>
	<script  src="__PUBLIC__/js/comment.js"></script>    
	<script>
	    //轮播图初始化
	    $(function(){
	        //carrousel
	        // var c = new Carrousel($(.J_Poster));
	        Carrousel.init($(".J_Poster"));

	    });
	</script>
</body>
</html>