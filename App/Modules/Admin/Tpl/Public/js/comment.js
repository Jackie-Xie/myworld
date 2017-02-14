$(function(){
	//用户资料提交
	$( '#J_post' ).click( function(){
		var comid = $( '#J_comid' ),
			reply = $( '#J_reply' ),
			error_msg = $( '#err_msg' );

        console.log(comid.text() + ',' + reply.val());
        var postData = {
	        	comid:comid.text(),
	        	reply:reply.val()
	        };

		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});
});