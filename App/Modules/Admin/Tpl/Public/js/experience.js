$(function(){
	//用户资料提交
	$( '#J_post' ).click( function(){
		var title = $( '#J_title' ),
			time = $( '#J_time' ),
			photoUrl = $( '#newbikephoto' ),
			content = $( '#J_content' ),
			error_msg = $( '#J_error_msg' ),
			email_error_msg = $( '#email_error_msg' ),
			mobile_error_msg = $( '#mobile_error_msg' );

         console.log(title.val() + ',' + time.val() + ',' + photoUrl.attr('src') + ',' + content.val());
        var postData = {
	        	title:title.val(),
	        	time:time.val(),
	        	photoUrl:photoUrl.attr('src'),
	        	content:content.val(),
	        	infoid:1
	        };

		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});
});