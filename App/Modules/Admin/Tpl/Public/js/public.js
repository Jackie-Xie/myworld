$(function(){
	//删除用户、帖子
	$('.del').click(function(){
		return confirm('确定要删除吗？');
	})

	$('.lock').click(function(){
		return confirm('确定要锁定吗？');
	})
	
	$('.open').click(function(){
		return confirm('确定要解锁吗？');
	})

	$('.close1').click(function(){
		return confirm('确定要关闭吗？');
	})

	$('.open1').click(function(){
		return confirm('确定要打开吗？');
	})

	$('.edit').click(function(){
		return confirm('确定要修改吗？');
	})

	$('.top').click(function(){
		return confirm('确定要置顶吗？');
	})
	$('.nottop').click(function(){
		return confirm('确定要取消置顶吗？');
	})
	$('.recover').click(function(){
		return confirm('确定要恢复吗？');
	})


	//选择日期，自动选择生肖和星座，联动
	$('#J_birthday').on('change blur',function(){
		var birthDay=$('#J_birthday').val(),
		    date = birthDay.substring(8,10),
			month = birthDay.substring(5,7),
			birthyear = birthDay.substring(0,4);
			//判断星座
			getConstellation(month,date);
			//判断生肖
			getpet(birthyear);
	} );
		


	//判断十二星座
	function getConstellation(month,date) { 
		with (document.getElementById("J_constellation")){ 
		if (month == 1 && date >=20 || month == 2 && date <=18) {value = "水瓶座";} 

		if (month == 2 && date >=19 || month == 3 && date <=20) {value = "双鱼座";} 

		if (month == 3 && date >=21 || month == 4 && date <=19) {value = "白羊座";} 

		if (month == 4 && date >=20 || month == 5 && date <=20) {value = "金牛座";} 

		if (month == 5 && date >=21 || month == 6 && date <=21) {value = "双子座";} 

		if (month == 6 && date >=22 || month == 7 && date <=22) {value = "巨蟹座";} 

		if (month == 7 && date >=23 || month == 8 && date <=22) {value = "狮子座";} 

		if (month == 8 && date >=23 || month == 9 && date <=22) {value = "处女座";} 

		if (month == 9 && date >=23 || month == 10 && date <=22) {value = "天秤座";} 

		if (month == 10 && date >=23 || month == 11 && date <=21) {value = "天蝎座";} 

		if (month == 11 && date >=22 || month == 12 && date <=21) {value = "射手座";} 

		if (month == 12 && date >=22 || month == 1 && date <=19) {value = "摩羯座";} 

		} 
	} 

	//判断十二生肖
	function getpet(birthyear) {
        var toyear = 1997,
        	x = (toyear - birthyear) % 12;
        with(document.getElementById("J_animalsign")){
        	if ((x == 1) || (x == -11)) {
	            value = "鼠";     
	        }
	        else if (x == 0){
	     		value = "牛";          
	 		}
	 		else if ((x == 11) || (x == -1)) {
	            value = "虎";         
	      	}
	      	else if ((x == 10) || (x == -2)) {
	            value = "兔";       
	        }else if ((x == 9) || (x == -3)) {
	            value = "龙";       
	        }else if ((x == 8) || (x == -4)) {
	            value = "蛇";     
	        }else if ((x == 7) || (x == -5)) {
	           value = "马";    
	        }else if ((x == 6) || (x == -6)) {
	            value = "羊";     
	        }else if ((x == 5) || (x == -7)) {
	            value = "猴";    
	        }else if ((x == 4) || (x == -8)) {
	            value = "鸡";    
	        }else if ((x == 3) || (x == -9)) {
	            value = "狗";        
	        }else if ((x == 2) || (x == -10)) {
	            value = "猪";        
	        }
	    }
    }


})