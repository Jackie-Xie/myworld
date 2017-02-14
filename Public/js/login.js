
/**
 * Ajax提交表单
 */
$(function(){

	$( '#signin-form' ).click( function(){
		var username = $( 'input[name=username]' );
		var password = $( 'input[name=password]' );
		var verify = $( 'input[name=verify]' );
		var error = $('#error');

		if (username.val() == '' ){
			usernameerr.html('用户名不能为空');
			username.focus();
			return;
		}
		else{
			usernameerr.empty();
		}

		if (password.val() == '' ){
			emailerr.html('密码不能为空');
			password.focus();
			return;
		}
		else{
			emailerr.empty();
		}

		$.post(postUrl,{username :username.val(),password :password.val(),verify:verify.val()},function (data){
			if(data.status){
				
			}else{
				alert('发布失败');
			}
		},'json');
		
		
	});
})
	