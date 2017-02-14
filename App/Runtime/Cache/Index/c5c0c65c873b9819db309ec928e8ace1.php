<?php if (!defined('THINK_PATH')) exit();?>  <!DOCTYPE html>
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
  <!-- 内容区域开始 -->
  	<div id="content">
	<!-- 发布内容区域 -->
	<div id="arc">
		<!-- 左侧区域 -->
		<div class="arc_left_box">
			<p class="arc_show">我的博客</p>
				<!-- 轮播区域 -->
			<div id="foucs_photo_container">
			 <div id="foucs_photo">
				<div id="list" style="left:-720px;">
			        <img src="__PUBLIC__/images/5.jpg" alt="1"/>
			        <img src="__PUBLIC__/images/1.jpg" alt="1"/>
			        <img src="__PUBLIC__/images/2.jpg" alt="2"/>
			        <img src="__PUBLIC__/images/3.jpg" alt="3"/>
			        <img src="__PUBLIC__/images/4.jpg" alt="4"/>
			        <img src="__PUBLIC__/images/5.jpg" alt="5"/>
			        <img src="__PUBLIC__/images/1.jpg" alt="5"/>
			    </div>
			    <div id="buttons">
			        <span index="1" class="on"></span>
			        <span index="2"></span>
			        <span index="3"></span>
			        <span index="4"></span>
			        <span index="5"></span>
			    </div>
			    <a href="javascript:;" id="prev" class="arrow">&lt;</a>
			    <a href="javascript:;" id="next" class="arrow">&gt;</a>		
			 </div>
		    </div>
			<!-- 轮播区域结束 -->
			<p class="arc_show">博文</p>
			<?php if(is_array($select)): foreach($select as $key=>$blogs): ?><div class="arc_left">
					<div class="arc_left_date">
						<p></p>
						<dl>
							<dd><?php echo (date("Y",$blogs["time"])); ?></dd>
							<dt><?php echo (date("m-d",$blogs["time"])); ?></dt>
						</dl>
					</div>
					<div class="arc_left_content">
						<a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $blogs['aid']));?>" class="arc_tittle"><?php echo ($blogs["title"]); ?></a>
						<a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $blogs['aid']));?>"><img src="<?php echo ($blogs["thumb"]); ?>" alt="缩略图" /></a>
						<div class="arc_des"><?php echo ($blogs["summary"]); ?></div>
						<a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $blogs['aid']));?>" class="arc_more">阅读全文>></a>
					</div>
				</div><?php endforeach; endif; ?>
			<div class="manu page">
				<?php echo ($page); ?>
			</div>
		</div>
		<!-- 左侧区域结束 -->
		<!-- 右侧区域开始 -->
		<div class="arc_right_box">
	<!-- 关于我 -->
	<div class="right_little_box">
		<p class="right_tittle">我的标签</p>
		<img src="__PUBLIC__/images/myPhoto.jpg" alt="Loading..." id="myPhoto"/>
		<ul class="right_des">
			<li>Html5</li>
			<li>Web前端</li>
			<li>Java开发</li>
			<li>PHP开发</li>
			<li>Android开发</li>
		</ul>
	</div>
	<!-- 关于我 -->

	<!-- 栏目列表 -->
	<div class="right_little_box">
		<p class="right_tittle">栏目列表</p>
		
		<ul class="right_category">
			<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U(GROUP_NAME . '/Category/index',array('cid'=> $vo['cid']));?>"><?php echo ($vo["cname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<!-- 栏目列表结束 -->
	<!-- 最新文章 -->
	<div class="right_arc_little_box">
		<p class="right_tittle">最新文章</p>
		<div class="hot_arc">
			<div class="arc_js_move">
				<div class="right_roll">
					<ul class="right_des">
						<?php if(is_array($arts)): $i = 0; $__LIST__ = $arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $v['aid']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="right_roll">
					<ul class="right_des">
						<?php if(is_array($arts)): $i = 0; $__LIST__ = $arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $v['aid']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 最新文章结束 -->
	<!-- 最新回复 -->
	<div class="right_little_box">
		<p class="right_tittle">最新回复</p>
		<ul class="right_answer">
			<?php if(is_array($coms)): $i = 0; $__LIST__ = $coms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U(GROUP_NAME . '/Article/index',array('aid'=> $vol['article']['aid']));?>"><?php echo ($vol["content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<!-- 最新回复结束 -->
	<!-- 结果统计 -->
	<div class="right_little_box">
		<p class="right_tittle">站点统计</p>
		<ul class="count_bg">
			<li>文章总数：<span>7篇</span></li>
			<li>回复总数：<span>10条</span></li>
			<li>浏览总数：<span>520次</span></li>
		</ul>
	</div>
	<!-- 结果统计结束 -->
</div>

		<!-- 右侧区域结束 -->
	</div>
	<!-- 发布内容区域结束 -->
 </div>
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