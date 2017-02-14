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
  <div class="about-content">
	<!-- 发布内容区域 -->
	<div id="arc">
		<div class="arc_left_box">
			<div id="rank">
				<span>博客等级</span>
				<a href="" class="level" target="_blank">1</a>
				<span>积分</span>
				<a href="" class="level" target="_blank">10</a>
			</div>
			<div class="tittle"><span>基本资料</span><a href="#" class="edit" target="_blank">编辑</a></div>
			<table class="table">
			<tr>
				<td class="td_first">昵称：</td>
				<td><?php echo ($info["username"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">性别：</td>
				<td><?php echo ($info['sex'] ? '女':'男'); ?></td>
			</tr>
			<tr>
				<td class="td_first">生日：</td>
				<td><?php echo ($info["birthday"]); ?>&nbsp&nbsp<?php echo ($info["constellation"]); ?>&nbsp&nbsp<?php echo ($info["animalsign"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">故乡：</td>
				<td><?php echo ($info["hometown"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">现居地址：</td>
				<td><?php echo ($info["address"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">自我介绍：</td>
				<td><span><?php echo ($info["introduce"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">近期梦想：</td>
				<td><span><?php echo ($info["dream"]); ?></span></td>
			</tr>
			</table>



			<div class="tittle"><span>个人信息</span><a href="#" class="edit" target="_blank">编辑</a></div>
			<table class="table">
			<tr>
				<td class="td_first">学位：</td>
				<td><?php echo ($info["degree"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">职业：</td>
				<td><?php echo ($info["career"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">婚姻状况：</td>
				<td><?php echo ($info['ismarried']?'已婚':'未婚'); ?></td>
			</tr>
			<tr>
				<td class="td_first">专业特长：</td>
				<td><span><?php echo ($info["majortag"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">兴趣爱好：</td>
				<td><span><?php echo ($info["like"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">喜欢的运动：</td>
				<td><span><?php echo ($info["sports"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">喜欢的音乐：</td>
				<td><span><?php echo ($info["musics"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">喜欢的电影：</td>
				<td><span><?php echo ($info["films"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">喜欢的书籍：</td>
				<td><span><?php echo ($info["books"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">喜欢的明星：</td>
				<td><span><?php echo ($info["superstars"]); ?></span></td>
			</tr>
			</table>


			<div class="tittle"><span>个人学历</span><a href="#" class="edit" target="_blank">编辑</a></div>
			<table class="table">
			<tr>
				<td class="td_first">本科：</td>
				<td><span><?php echo ($info["college_life"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">高中：</td>
				<td><span><?php echo ($info["senior_life"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">初中：</td>
				<td><span><?php echo ($info["middle_life"]); ?></span></td>
			</tr>
			</table>


			<div class="tittle"><span>联系方式</span><a href="#" class="edit" target="_blank">编辑</a></div>
			<table class="table">
			<tr>
				<td class="td_first">QQ：</td>
				<td><?php echo ($info["qq"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">E-Mail：</td>
				<td><?php echo ($info["email"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">手机号码：</td>
				<td><?php echo ($info["mobile"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">固定电话：</td>
				<td><?php echo ($info["telephone"]); ?></td>
			</tr>
			<tr>
				<td class="td_first">联系地址：</td>
				<td><span><?php echo ($info["contactaddress"]); ?></span></td>
			</tr>
			<tr>
				<td class="td_first">邮政编码：</td>
				<td><span><?php echo ($info["zipcode"]); ?></span></td>
			</tr>
			</table>
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