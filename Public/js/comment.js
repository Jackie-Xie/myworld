$(function(){
	//无刷新异步发送表单的ajax处理
	$( '#sub' ).click( function(){
		var username = $( '#J_username' ),
			verify = $( '#J_verify' ),
			content = $( '#contents' ),
			error_msg = $( '#error_msg' );

		//输入验证
		if (verify.val() == '' ){
			error_msg.html('<td class="star">*验证码错误</td>');
			verify.focus();
			return;
		}
		else{
			error_msg.empty();
		}

		if ((content.val() == '')){
			error_msg.html('<td class="star">*内容不为空</td>');
			content.focus();
			return;
		}
		else{
			error_msg.empty();
		}

		// console.log(username.attr('data-uid'));
		$.post(handleUrl,{username:username.text(),uid:username.attr('data-uid'),aid:username.attr('data-aid'),verify:verify.val(),content:content.val()},function (data){
			if(data.status){
				var str ='<li><b>' + data.comid + '楼</b>&nbsp&nbsp&nbsp&nbsp<span>' 
						+ data.nickname + '</span>&nbsp&nbsp&nbsp&nbsp<em>' 
						+ data.time + '</em><br /><p>' 
						+ data.content + '</p></li><br />';
				$('#com_list').prepend(str);
				error_msg.html('<td class="star">*发布成功</td>');
			}else{
				error_msg.html('<td class="star">*' + data.error_msg + '</td>');
			}
		},'json')
	}
	)
})
