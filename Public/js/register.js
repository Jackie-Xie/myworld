
/**
 * 注册的表单验证
 */
var jk = {};  //声明一个对象，当作命名空间来使用，“单全局变量”减少环境污染

//定义一个获取指定id的元素的公共函数，减少代码量，提高代码复用率
jk.getId = function (id) {
	return document.getElementById(id);
};

//定义一个获取指定class的元素的公共函数，能兼容各浏览器
jk.getClass = function (className,element) {
	//如果支持document.getElementsByClassName
	if(document.getElementsByClassName) {
		return (element || document).getElementsByClassName(className);
	}

	//获取所有元素
	var children = (element || document).getElementsByTagName('*');
	//用来存放具有指定ClassName的元素
	var elements = new Array();
    
    //遍历所有元素
	for( var i = 0; i < children.length; i++) {
		var child = children[i];
		//将多个ClassName分开成数组
		var classNames = child.className.split(' ');

		//遍历分开后的数组，查找是否有指定ClassName
		for( var j = 0; j < classNames.length; j++) {
			if(classNames[j] == className) {
				//指定ClassName的元素存入数组elements
				elements.push(child);
				break;
			}
		}
		
	}
	return elements;
};

//定义一个公共函数来解决事件监听的兼容问题
jk.addListener = function (target,type,handler){
	//type为多个事件，为“type1，type2，……”，将其拆开
	var typeNames = type.split(',');

	for( var i = 0; i < typeNames.length; i++){
		var types = typeNames[i];
		if(target.addEventListener){
			target.addEventListener(types,handler,false);
		}else if(target.attachEvent){
			target.attachEvent("on"+types,handler);
		}else{
			target["on"+types] = handler;
		}		
	}
};

//注册时表单验证
jk.signupCheck = function () {

	var email = jk.getId('email');
	var emailErr = jk.getId('email-error');

    //onchange事件在内容改变（两次内容有可能相等）且失去焦点时触发；onpropertychange事件是实时触发，每增加或删除一个字符就会触发，通过js改变也会触发该事件，但是该事件是IE专有
	
	jk.addListener(email,"change,propertychange,blur",function(){
		if(email.value == ''){
			emailErr.innerHTML="邮箱不能为空！";
			email.focus();
		}
		else if(!new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$","i").test(email.value)){
			emailErr.innerHTML="请输入正确的邮箱格式！";
			email.focus();
		}
		else{
			emailErr.innerHTML="&radic;";
		}
	});

	var pwd = jk.getId('password');
	var pwdErr = jk.getId('pwd-error');
	var pwdLvSpan = jk.getId("pwdLvSpan");
	var pwdLv = jk.getId("pwdLv");

	jk.addListener(pwd,"change,propertychange,blur",function(){
		var lv = 0;
		if(!pwd.value){
			pwdLvSpan.style.display = "none";
			pwdErr.innerHTML="密码不能为空！";
			pwd.focus();
		}
		else if(pwd.value.length > 16){
			pwdLvSpan.style.display = "none";
			pwdErr.innerHTML="密码为6-16位！";
			pwd.focus();
		}
		else {
			if(/^\d{6,16}$/.test(pwd.value)){
				lv = 25;
			}
			else if(/^\w{6,11}$/.test(pwd.value)){
				lv = 50;
			}
			else if(/^[\d\w]{12,16}$/.test(pwd.value)){
				lv = 75;
			}
			else if(/^[\d\w~!@#$%\^&*\(\)\-{}\[\]=<>,\.\?\/]{6,16}$/.test(pwd.value)){
				lv = 100;
			}
			else if(pwd.value.length  < 6){
				lv = 0;
			}
			pwdErr.innerHTML="密码强度：";
			pwdLvSpan.style.display = "inline-block";
			pwdLv.style.width = lv + "px";
		}

	});

	var repwd = jk.getId('repassword');
	var repwdErr = jk.getId('repwd-error');

	jk.addListener(repwd,"change,propertychange,blur",function(){
		if(!repwd.value){
			repwdErr.innerHTML="请确认密码！";
			repwd.focus();
		}
		else if(repwd.value != pwd.value){
			repwdErr.innerHTML="两次密码不一致！";
			repwd.focus();
		}
		else{
			pwdLvSpan.style.display = "none";
			pwdErr.innerHTML="&radic;";
			repwdErr.innerHTML="&radic;";			
		}
	});

	var mobile = jk.getId('mobile');
	var mobileErr = jk.getId('mobile-error');

	jk.addListener(mobile,"change,propertychange,blur",function(){
		if(!mobile.value){
			mobileErr.innerHTML="请输入11位手机号码！";
			mobile.focus();
		}
		else if(!/^1[34578]\d{9}$/.test(mobile.value)){
			mobileErr.innerHTML="请输入正确的手机号码！";
			mobile.focus();			
		}
		else{
			mobileErr.innerHTML="&radic;"	
		}
	});

	var nick = jk.getId('nick');
	var nickErr = jk.getId('nick-error');

	jk.addListener(nick,"change,propertychange,blur",function(){
		if(!nick.value){
			nickErr.innerHTML="请输入昵称！";
			nick.focus();
		}
		else if(nick.value.length < 2 || nick.value.length > 18 ){
			nickErr.innerHTML="昵称为2-18位！";
			nick.focus();
		}
		else if(!/^(?!_)(?!.*?_$)[\u4E00-\u9FA5A-Za-z0-9_]+$/.test(nick.value)){
			nickErr.innerHTML="昵称由中英文、数字及下划线(不在首尾)组成！";
			nick.focus();			
		}
		else{
			nickErr.innerHTML="&radic;"	
		}
	});



}

jk.signupCheck();
