
$(function(){
	//初始化各个区域的高度
	$(".panel").css({"height":$(window).height()});
	var timer,timer1;

	$(window).resize(function() {
		clearTimeout(timer);
		timer = setTimeout(function() {
			$(".panel").css({"height":$(window).height()});
		},40);
	});
	//拨动滚动条，滚动一定距离特效
	$.scrollify({
		section:".panel"
	});

	//下拉箭头点击，滚动条滚动一定距离特效
	$("#banner .inner .more").click(function(e) {
		e.preventDefault();
		clearTimeout(timer1);
    	timer1 = setTimeout(function(){
    		var  offset= $(document).scrollTop();
	    	var h = $(window).height();
	    	offset += h;
	    	$(document).scrollTop(offset);
    	},100)
	});

	//文档流中加载list菜单在页面右边并隐藏
	$('#list').hide();
	
    //判断刷新时是否滚动条已经滚动到下面
	if ($(window).scrollTop() != '0') 
		{
			//菜单栏nav恢复颜色，悬浮跟踪特效
			$('#navid').css({
				'top': $(window).scrollTop(),
				'background': 'rgb(42,128,185)'
			});

			//下拉箭头悬浮跟踪
			$('#banner .inner .more').css({
				'top': $(window).scrollTop() + 100 
			})

   //          //工具条返回顶部出现
			// $(".toolbar .toolbar-item-top").show();
		}

	
	//滚动鼠标时特效
	$(window).on('scroll', function() {

		//下拉箭头悬浮跟踪
		$('#banner .inner .more').css({
			'top': $(window).scrollTop() + 100 
		});

		
		if ($(window).scrollTop() == '0') 
		{
			//菜单栏nav透明
			$('#navid').css({
				'top': $(window).scrollTop(),
				'background': 'transparent'
			});


			// //工具条返回顶部消失
			// $(".toolbar .toolbar-item-top").hide();
		}
		else if($(window).scrollTop() <= $('body').height())
		{
			//菜单栏nav恢复颜色，悬浮跟踪特效
			$('#navid').css({
				'top': $(window).scrollTop(),
				'background': 'rgb(42,128,185)'
			});		

			// //工具条返回顶部出现
			// $(".toolbar .toolbar-item-top").show();

		};
         
        //判断是否到达底部
        if($(window).scrollTop() == $('body').height())
        {
        	$('#list').css({
        		'top': $(window).scrollTop()-$(window).height()
        	});

        	$('#banner .inner .more').css({
				'top': $(window).scrollTop() -$(window).height() + 100 
			})
        }
        else
        {
        	$('#list').css({
				'top': $(window).scrollTop()
			});

			$('#banner .inner .more').css({
				'top': $(window).scrollTop() + 100 
			})
        }
		
	});

	var docHeight = $(document).height();

	//MENU悬浮跟踪并从右边滑出效果	
	$('#menu').click(function(){
		//menu出现高度为屏幕宽度
		$('#list').show().css({
			'height': $(window).height()
		});
		//设置覆盖层自动淡入
	    $('body').append('<div id="overlay"></div>');
 	 	$('#overlay').height(docHeight).css({
 	 	  	'opacity': .75, //透明度
      		'position': 'absolute',
      		'top': 0,
      		'left': 0,
     		'background-color': '#444',
     		'width': '100%',
     		'z-index': 1000 //保证这个悬浮层位于其它内容之上
 	 	}).fadeIn('fast'); 
 	 	
 	 	//文档向左滑动
		$('#main-container').animate({
		    'left':'-=300px'
	 	 },800);
	 });


    //MENU悬浮跟踪并从右边滑出效果	
	//   $('#list').show().css({
	// 		'left':$(window).width(),
	// 		'top': $(window).scrollTop(),
	// 		'height': $(window).height()
	// 	}).animate({
	// 	    'left':'-=250px'
	//  	 },800,function(){
	//  	 	$('body').append('<div id="overlay"></div>');
	//  	 	$('#overlay').height(docHeight)
	//  	 	.css({
	//  	 	  'opacity': .75, //透明度
	// 	      	  'position': 'absolute',
	// 	      	  'top': 0,
	// 	      	  'left': 0,
	// 	     	  'background-color': '#444',
	// 	     	  'width': '100%',
	// 	     	  'z-index': 1000 //保证这个悬浮层位于其它内容之上
	//  	 	})
	//  	 	.fadeIn();  //设置覆盖层自动淡入
	//  	 });
	// });

	//关闭MENU，滑入右边使不可见
	$('#list .remove i').click(function(){

		$('#main-container').animate({
		    'left':'+=300px'
	 	 },800,function(){
	 	 	$('#list').hide();
	 	 	$('#overlay').fadeOut('slow'); //设置覆盖层自动淡出
	 	 });
	});

	//随机换皮肤
	// $('#skin').click(function(){
	// 	$('#main-container').css({
	// 		'background-image' : 'url(./images/banner' + Math.floor(Math.random()*7+1) + '.jpg)'
	// 	});
	// });


});

