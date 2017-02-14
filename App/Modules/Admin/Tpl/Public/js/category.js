
$(function(){

	//修改栏目
	$( '#J_modify' ).click( function(){
		var isoff,
			cid = $('#J_getId' ),
			cname = $( 'input[name=cname]' ),
			bname= $( 'input[name=bname]' ),
			keywords = $( '#J_keywords' ),
			description = $( '#J_description' );

			if($('#inlineRadio1').prop('checked')){
				isoff = 1;
			}else{
				isoff = 0;
			}
						
        var postData = {
        		'cid':cid.attr('data-id'),
	        	'cname':cname.val(),
	        	'bname':bname.val(),
	        	'keywords':keywords.val(),
	        	'description':description.val(),
	        	'isoff':isoff
	        };

		$.post(handleUrl,postData,function (data){
			if(data.status == 1){
				$('#err_msg').html(data.error_msg);
				location.href = nextUrl;
			}else{
				$('#err_msg').html(data.error_msg);
			}
		},'json');
		
	});


	//添加栏目
	$( '#J_addCate' ).click( function(){

		var isoff,
			cname = $( 'input[name=cname]' ),
			bname= $( 'input[name=bname]' ),
			keywords = $( '#J_keywords' ),
			description = $( '#J_description' );

			if($('#inlineRadio1').prop('checked')){
				isoff = 1;
			}else{
				isoff = 0;
			}

        var postData = {
	        	'cname':cname.val(),
	        	'bname':bname.val(),
	        	'keywords':keywords.val(),
	        	'description':description.val(),
	        	'isoff':isoff
	        };

		$.post(handleUrl,postData,function (data){
			if(data.status == 1){
				$('#err_msg').html(data.error_msg);
				location.href = nextUrl;
			}else{
				$('#err_msg').html(data.error_msg);
			}
			
		},'json');
		
	});
})