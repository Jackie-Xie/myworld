$(function(){
	//用户资料提交
	$( '#J_post' ).click( function(){
		var username = $( '#J_username' ),
			sex = $( '#J_sex' ),
			birthday= $( '#J_birthday' ),
			constellation = $( '#J_constellation' ),
			animalsign = $( '#J_animalsign' ),
			province = $( '#province' ),
			city = $( '#city' ),
			county = $( '#county' ),
			province1 = $( '#province1' ),
			city1 = $( '#city1' ),
			county1 = $( '#county1' ),
			indexname = $( '#J_indexname' ),
			motto = $( '#J_motto' ),
			introduce = $( '#J_introduce' ),
			dream = $( '#J_dream' ),
			degree = $( '#J_degree' ),
			career = $( '#J_career' ),
			ismarried = $( '#J_ismarried' ),
			majortag = $( '#J_majortag' ),
			photoUrl = $( '#newbikephoto' ),
			like = $( '#J_like' ),
			sports = $( '#J_sports' ),
			musics = $( '#J_musics' ),
			films = $( '#J_films' ),
			books = $( '#J_books' ),
			superstars = $( '#J_superstars' ),
			college_life = $( '#J_college_life' ),
			senior_life = $( '#J_senior_life' ),
			middle_life = $( '#J_middle_life' ),
			qq = $( '#J_qq' ),
			email = $( '#J_email' ),
			mobile = $( '#J_mobile' ),
			telephone = $( '#J_telephone' ),
			contactaddress = $( '#J_contactaddress' ),
			zipcode = $( '#J_zipcode' ),
			email  = $( 'input[name=email]' ),
			mobile  = $( 'input[name=mobile]' ),
			error_msg = $( '#J_error_msg' ),
			email_error_msg = $( '#email_error_msg' ),
			mobile_error_msg = $( '#mobile_error_msg' );

		//邮箱验证
		if (email.val() == '' ){
			email_error_msg.html('邮箱号码不为空');
			email.focus();
			return;
		}
		else if(!new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$","i").test(email.val())){
			email_error_msg.html('邮箱格式不正确');
			email.focus();
			return;
		}
		else{
			email_error_msg.empty();
		}

		//手机号验证
		if (mobile.val() == '' ){
			mobile_error_msg.html('请输入11位手机号码');
			mobile.focus();
			return;
		}
		else if(!/^1[34578]\d{9}$/.test(mobile.val())){
			mobile_error_msg.html('请输入正确的手机号码');
			mobile.focus();
			return;
		}
		else{
			mobile_error_msg.empty();
		}

        /*console.log(province.val() + ',' + city.val() + ',' + county.val());
 		console.log(province1.val() + ',' + city1.val() + ',' + county1.val());
        console.log(photoUrl.attr('src'));*/
        var postData = {
	        	username:username.val(),
	        	sex:sex.val(),
	        	birthday:birthday.val(),
	        	constellation:constellation.val(),
	        	animalsign:animalsign.val(),
	        	hometown:province.val() + ',' + city.val() + ',' + county.val(),
	        	address:province1.val() + ',' + city1.val() + ',' + county1.val(),
	        	indexname:indexname.val(),
	        	motto:motto.val(),
	        	introduce:introduce.val(),
	        	dream:dream.val(),
	        	degree:degree.val(),
	        	career:career.val(),
	        	ismarried:ismarried.val(),
	        	majortag:majortag.val(),
	        	photoUrl:photoUrl.attr('src'),
	        	like:like.val(),
	        	sports:sports.val(),
	        	musics:musics.val(),
	        	films:films.val(),
	        	books:books.val(),
	        	superstars:superstars.val(),
	        	college_life:college_life.val(),
	        	senior_life:senior_life.val(),
	        	middle_life:middle_life.val(),
	        	qq:qq.val(),
	        	email:email.val(),
	        	mobile:mobile.val(),
	        	telephone:telephone.val(),
	        	contactaddress:contactaddress.val(),
	        	zipcode:zipcode.val()
	        };

		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});




	
	//修改密码
	$( '#J_modify' ).click( function(){
		var username = $( 'input[name=admin]' ),
			password = $( 'input[name=password]' ),
			repassword= $( 'input[name=repassword]' ),
			error_msg = $( '#error_msg' );

		if (username.val() == '' ){
			error_msg.html('用户名不为空');
			return;
		}
		else{
			error_msg.empty();
		}

		if (password.val() == '' ){
			error_msg.html('密码不为空');
			return;
		}
		else{
			error_msg.empty();
		}

		if (repassword.val() != password.val()){
			error_msg.html('两次密码不一致');
			return;
		}
		else{
			error_msg.empty();
		}

        console.log(handleUrl);

        var postData = {
	        	username:username.val(),
	        	password:password.val()
	        };
		console.log(postData);
		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);

		},'json');
		
	});

	//管理员注册
	$( '#J_register' ).click( function(){
		var username = $( 'input[name=username]' ),
			email  = $( 'input[name=email]' ),
			mobile  = $( 'input[name=mobile]' ),
			password= $( 'input[name=password]' ),
			repassword= $( 'input[name=repassword]' ),
			user_error_msg = $( '#user_error_msg' ),
			email_error_msg = $( '#email_error_msg' ),
			mobile_error_msg = $( '#mobile_error_msg' ),
			pwd_error_msg = $( '#pwd_error_msg' ),
			repwd_error_msg = $( '#repwd_error_msg' ),
			error_msg = $('#error_msg');

		//用户名验证
		if (username.val() == '' ){
			user_error_msg.html('用户名不为空');
			username.focus();
			return;
		}
		else if(username.val().length < 2 || username.val().length > 8){
			user_error_msg.html('用户名为2-8位');
			username.focus();
			return;
		}
		else if(!/^(?!_)(?!.*?_$)[\u4E00-\u9FA5A-Za-z0-9_]+$/.test(username.val())){
			user_error_msg.html('用户名由中英文、数字及下划线(不在首尾)组成');
			username.focus();
			return;
		}
		else{
			user_error_msg.empty();
		}

		//邮箱验证
		if (email.val() == '' ){
			email_error_msg.html('邮箱号码不为空');
			email.focus();
			return;
		}
		else if(!new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$","i").test(email.val())){
			email_error_msg.html('邮箱格式不正确');
			email.focus();
			return;
		}
		else{
			email_error_msg.empty();
		}

		//手机号验证
		if (mobile.val() == '' ){
			mobile_error_msg.html('请输入11位手机号码');
			mobile.focus();
			return;
		}
		else if(!/^1[34578]\d{9}$/.test(mobile.val())){
			mobile_error_msg.html('请输入正确的手机号码');
			mobile.focus();
			return;
		}
		else{
			mobile_error_msg.empty();
		}


		//密码验证
		if (password.val() == '' ){
			pwd_error_msg.html('密码不为空');
			password.focus();
			return;
		}
		else{
			pwd_error_msg.empty();
		}

		if (repassword.val() != password.val()){
			repwd_error_msg.html('两次密码不一致');
			repassword.focus();
			return;
		}
		else{
			repwd_error_msg.empty();
		}

        // console.log(handleUrl);

        var postData = {
	        	username:username.val(),
	        	email:email.val(),
	        	mobile:mobile.val(),
	        	password:password.val()
	        };
		// console.log(postData);

		$.post(handleUrl,postData,function (data){
			// console.log(data);
			error_msg.html(data.error_msg);
		},'json');
	});


})



