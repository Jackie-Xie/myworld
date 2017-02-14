$(function(){
	var checkRegExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	$('#emailid').bind('blur change propertychange',function(){
		var value = $('#emailid').val();	
		if(!value){
			$('#emailerr').html('邮箱不为空！');
		}
		else if(!checkRegExp.test(value)){
			$('#emailerr').html('邮箱格式不对！');
		}else{
			$('#emailerr').html('');
		}
	});
});