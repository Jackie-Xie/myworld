$(function(){
	//关于我们页面效果
	$('#table').fadeIn(2000);
	$(".right_little_box").slideDown(2000);
	//头部菜单切换状态
	$("#navid ul li").click(function(){
        $(this).addClass("active").siblings("li").removeClass("active");
    });
	
	//菜单栏nav悬浮跟踪特效
	function float(flag){
		if(flag == 1){
			//flag为‘1’时,菜单栏悬浮跟踪
			$('nav').css({
				'top': $(window).scrollTop(),
				'z-index':'1000'
			});	
		}
		else if(flag == 0){
			//flag为‘0’时,菜单栏nav复原
			$('nav').css({
				'top':'80px',
				'z-index':'0'
			});
		}
			
	}


    //判断刷新时是否滚动条已经滚动到下面
	if ($(window).scrollTop() > '80') 
		{
			float(1);  
		}
		else
		{
			float(0);
		}
	
	//滚动鼠标时特效
	$(window).on('scroll', function() {
		
		if ($(window).scrollTop() <= '80') 
		{		
			float(0);
		}
		else if($(window).scrollTop() <= $('body').height())
		{
			//菜单栏nav悬浮跟踪特效
			float(1);

		};
		
	})


	//右侧最新文章(无缝滚动)
	var arcTimer = setInterval(run,3000);
	var i=0;
	function run(){
		if(i == 2){
			$('.arc_js_move').css({top:'0px'});
			i = 0;
		}
		i++;
		$('.arc_js_move').animate({top:-75 * i + 'px'}, '1500');
			
	}
	// 右侧最新文章(鼠标移入移出HOVER事件)
	$('.arc_js_move').hover(function(){
		clearInterval(arcTimer);
	},function(){
		arcTimer = setInterval(run,3000);
	})
});