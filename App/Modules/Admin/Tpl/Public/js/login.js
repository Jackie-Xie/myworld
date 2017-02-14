$(function(){
	//登录界面高度满屏
	$('.login').css({"height":$(window).height()});
	//验证码自动显示
	$('.verify-img').fadeIn(900);
	//网页加载自动获得焦点
	$('#J_username').focus();	

 	//登录验证
	$('#J_username').bind("change blur",function(){
 		if(!$(this).val()){
 			var text='用户名不为空';
 			$('#error_msg').html(text);
 			// $(this).focus();
 		}
 		else{
 			$('#error_msg').empty();
 		}
 	});

 	$('#J_password').bind("change blur",function(){
 		if(!$(this).val()){
 			var text='密码不为空';
 			$('#error_msg').html(text);
 			// $(this).focus();
 		}
 		else{
 			$('#error_msg').empty();
 		}
 	});
 	
 	$('#J_verify').bind("change blur",function(){
 		if(!$(this).val()){
 			var text='验证码不为空';
 			$('#error_msg').html(text);
 			// $(this).focus();
 		}
 		else{
 			$('#error_msg').empty();
 		}
 	});

 	//事件绑定
	$( '#J_login' ).click( function(){
		ajaxLogin();
	});
	$( '#formid' ).on('keypress','input',function(evt){
		if (evt.keyCode == 13) {
			ajaxLogin();
	    }
	});


	//登录发送ajax请求
	var ajaxLogin=function(){
		var username = $( 'input[name=username]' );
		var password = $( 'input[name=password]' );
		var verify= $( 'input[name=verify]' );
		var error_msg = $( '#error_msg' );

		if (username.val() == '' ){
			error_msg.html('用户名不为空');
			username.focus();
			return;
		}
		else{
			error_msg.empty();
		}

		if (password.val() == '' ){
			error_msg.html('密码不为空');
			password.focus();
			return;
		}
		else{
			error_msg.empty();
		}

		if ((verify.val() == '')){
			error_msg.html('验证码不为空');
			verify.focus();
			return;
		}
		else{
			error_msg.empty();
		}

        // console.log(handleUrl);

        var postData = {
	        	username:username.val(),
	        	password:password.val(),
	        	verify:verify.val()
	        };
		// console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(postData);
			if(data.status){
				location.href = nextUrl;//location.href实现客户端页面的跳转  
			}else{
				error_msg.html(data.error_msg);
			}
		},'json');
	}

		

});


