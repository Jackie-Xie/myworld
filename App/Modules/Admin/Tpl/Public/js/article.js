$(function(){
	//用户资料提交
	$( '#J_addArt' ).click( function(){
		var title = $( '#J_title' ),
			thumb = $( '#newbikephoto' ),
			cid = $( '#J_cate' ),
			click = $( '#J_click' ),
			summary = $( '#J_summary' ),
			content = $( '#J_content' ),
			error_msg = $( '#err_msg' );


			if($('#inlineRadio1').prop('checked')){
				istop = 1;
			}else{
				istop = 0;
			}

        console.log(istop + ',' + cid.val());
        var postData = {
	        	title:title.val(),
	        	thumb:thumb.attr('src'),
	        	cid:cid.val(),
	        	click:click.val(),
	        	summary:summary.val(),
	        	content:content.val(),
	        	istop:istop
	        };

		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});

	//用户资料提交
	$( '#J_editArt' ).click( function(){
		var title = $( '#J_title' ),
			thumb = $( '#newbikephoto' ),
			cid = $( '#J_cate' ),
			aid = $( '#getId'),
			click = $( '#J_click' ),
			summary = $( '#J_summary' ),
			content = $( '#J_content' ),
			error_msg = $( '#err_msg' );


			if($('#inlineRadio1').prop('checked')){
				istop = 1;
			}else{
				istop = 0;
			}

        console.log(istop + ',' + cid.val());
        var postData = {
	        	title:title.val(),
	        	thumb:thumb.attr('src'),
	        	cid:cid.val(),
	        	aid:aid.val(),
	        	click:click.val(),
	        	summary:summary.val(),
	        	content:content.val(),
	        	istop:istop
	        };

		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});
});