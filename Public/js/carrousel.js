/***********************************************CSS如下****************************************************************************/
/***********************************************重置样式**************************************************************************/
/*body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{margin: 0;padding: 0;}table{border-collapse: collapse;border-spacing: 0;}fieldset,img{border: 0;}address,caption,cite,code,dfn,em,strong,th,var{font-style: normal; font-weight: normal;}ol,ul{list-style:none;}caption,th{text-align: left;}h1,h2,h3,h4,h5,h6{font-size: 100%;font-weight: normal;}q:before,q:after{content:'';}abbr,acronym{border: 0;}body{color: #666;background-color: #fff; font: 12px/1.5 '微软雅黑' ,tahoma,arial,'Hiragino Sana GB',宋体,sans-serif;}.clearfix:after{visibility: hidden;display: block;font-size: 0;content:"";clear: both;height: 0;}*/
/****************************************carrousel效果必要样式********************************************************************/
/*.poster-main{position:relative;width: 800px;height: 270px;margin: 0 auto;}.poster-main .poster-list{width: 800px;height: 270px;}.poster-main a,.poster-main img{display: block;}.poster-main .poster-list .poster-item{position: absolute;left: 0px;top: 0px;overflow: hidden;}.poster-main .poster-btn{position: absolute;top: 0px;width: 100px;height: 270px;z-index: 10;cursor: pointer;//手型opacity:0.8;}.poster-main .poster-prev-btn{left: 0px;background: url(../img/left_btn_icon.png) no-repeat center center;}.poster-main .poster-next-btn{right: 0px;background: url(../img/right_btn_icon.png) no-repeat center center;}*/
 /*********************************************html代码如下***********************************************************************/
 /*<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Jackie's hobby</title><link rel="stylesheet"  href="css/carrousel.css"><script  src="js/jquery.js"></script><script  src="js/carrousel.js"></script></head><body><div style="padding:50px; "><div class="J_Poster poster-main" data-setting='{"width":950,"height":270,"posterWidth":640,"posterHeight":270,"scale":0.85, "autoPlay":true,"delay":2000,"speed":500,"verticalAlign":"middle"}'><div class="poster-btn poster-prev-btn"></div><ul class="poster-list"><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li><li class="poster-item"><a href="#"><img src="img/hobby4.jpg" alt="" width="100%"/></a></li></ul><div class="poster-btn poster-next-btn"></div></div></div></body><script>$(function(){//carrousel// var c = new Carrousel($(.J_Poster));Carrousel.init($(".J_Poster"));});</script></html>
 *********************************************************************************************************************************/
 
 /*封装成一个插件，面向对象的思想，涉及的知识如下：*******************************************************************************/
 /**CSS:-定位、层级、透明度。。。
 **JS：-类的封装prototype、this、参数配置、位置关系分析、旋转逻辑。。。
       -jQuery api next、prev、animate、find、children、事件等
 ********************************************************************************************************************************/

;(function($){
	
	var Carrousel = function(poster){
		var self = this;
 		// 保存单个旋转木马对象
 		this.poster = poster;
 		// 保存每个幻灯片对象
 		this.posterItemMain = poster.find("ul.poster-list");
 		// 保存上下帧按钮对象
 		this.nextBtn = poster.find("div.poster-next-btn");
 		this.prevBtn = poster.find("div.poster-prev-btn");
 		//获取幻灯片帧的对象，并保存
		this.posterItems = poster.find("li.poster-item");
	    //对于奇数帧的幻灯片进行兼容(复制一个变成奇数)，所以此插件一般要求奇数张的幻灯片
		if(this.posterItems.size()%2==0){
			this.posterItemMain.append(this.posterItems.eq(0).clone());
			this.posterItems = this.posterItemMain.children();
		};
		//获取幻灯片第一帧的对象，并保存
 		this.posterFirstItem = this.posterItems.first();
 		//获取幻灯片最后一帧的对象，并保存
		this.posterLastItem = this.posterItems.last();
		//旋转标识
		this.rotateFlag = true; 

 		//默认配置参数
 		this.setting = {
 			"width":1000,        //幻灯片的宽度
		    "height":270,        //幻灯片的高度
		    "posterWidth":640,   //幻灯片第一帧的宽度
		    "posterHeight":270,  //幻灯片第一帧的高度
		    "scale":0.9,         //记录显示比例关系
		    "speed":500,         //切换速度
		    "autoPlay":false,    //是否自动切换
		    "delay":5000,        //自动切换延迟
		    "verticalAlign":"middle"   //垂直对齐方式:top bottom middle 
 		    };
		$.extend(this.setting,this.getSetting());//将人工配置和默认配置组合
 		
		//设置配置参数值
		this.setSettingValue();
		//设置幻灯片位置关系
		this.setPosterPos();

		//绑定点击切换事件
		this.nextBtn.click(function(){
			if(self.rotateFlag){
				self.rotateFlag=false;
				self.carrouselRotate("left");
		    };
		});

		this.prevBtn.click(function(){
			if(self.rotateFlag){
				self.rotateFlag=false;
				self.carrouselRotate("right");
			};
		});

		//是否开启自动播放
		if(this.setting.autoPlay){
			this.autoPlay();
			this.poster.hover(function(){
				window.clearInterval(self.timer);
			},function(){
				self.autoPlay();
			});
		};
 		
	};

	Carrousel.prototype = {
		//自动播放幻灯片
		autoPlay:function(){
			var self = this;
			//设置定时器
			this.timer = window.setInterval(function(){
				self.nextBtn.click();
			},this.setting.delay);
		},

		//旋转效果的实现，dir为旋转方向
		carrouselRotate:function(dir){
			var _this_ = this;
			var zIndexArr = [];

			if(dir === "left"){//左旋转

				this.posterItems.each(function(){
					var self = $(this),
						prev = self.prev().get(0)?self.prev():_this_.posterLastItem,
						width = prev.width(),
						height = prev.height(),
						zIndex = prev.css("zIndex"),
						opacity = prev.css("opacity"),
						left = prev.css("left"),
						top = prev.css("top");

						zIndexArr.push(zIndex);  //保存zIndex值存于数组

						self.animate({
							width:width,
							height:height,
							left:left,
							top:top,
							// zIndex:zIndex,
							opacity:opacity							
						},_this_.setting.speed,function(){
							_this_.rotateFlag = true;
						});
				});
                //zIndex需要单独保存在设置，防止循环的时候设置再取的时候值永远是最后一个的zIndex
				this.posterItems.each(function(i){
					$(this).css("zIndex",zIndexArr[i]);
				});
			}
			else if(dir === "right"){//右旋转
				this.posterItems.each(function(){
					var self = $(this),
						next = self.next().get(0)?self.next():_this_.posterFirstItem,
						width = next.width(),
						height = next.height(),
						zIndex = next.css("zIndex"),
						opacity = next.css("opacity"),
						left = next.css("left"),
						top = next.css("top");

						zIndexArr.push(zIndex);  //保存zIndex值存于数组

						self.animate({
							width:width,
							height:height,
							left:left,
							top:top,
							// zIndex:zIndex,
							opacity:opacity						
						},_this_.setting.speed,function(){
							_this_.rotateFlag = true;
						});
				});
                
				this.posterItems.each(function(i){
					$(this).css("zIndex",zIndexArr[i]);
				});
			};
		},

		//设置剩余的帧数位置关系
		setPosterPos:function(){
			var self = this;     //保存下this对象
			var sliceItems = this.posterItems.slice(1),  //刨去第一帧幻灯片
				sliceSize = sliceItems.size()/2,         //刨去第一帧幻灯片后，分散在左右的帧数
			    rightSlice = sliceItems.slice(0,sliceSize),   //分散在右边的帧数
			    leftSlice = sliceItems.slice(sliceSize),      //分散在左边的帧数
			    level = Math.floor(this.posterItems.size()/2);   //层级关系，便于设置zIndex

			//设置右边帧的位置关系和宽度高度top等
			var rw = this.setting.posterWidth,
				rh = this.setting.posterHeight,
				gap = ((this.setting.width-this.setting.posterWidth)/2)/level;

			var firstLeft = (this.setting.width-this.setting.posterWidth)/2,
			    fixOffsetLeft = firstLeft + rw;
			//设置右边帧的位置关系
			rightSlice.each(function(i){
				level--;
				rw = rw*self.setting.scale;
				rh = rh*self.setting.scale;
				var j = i;
				$(this).css({
						width:rw,
						height:rh,
						left:fixOffsetLeft+(++j)*gap-rw,
						top:self.setVerticalAlign(rh),
						zIndex:level,
						opacity:0.9/(++i)
				});
			});
			//设置左边帧的位置关系
			var lw = rightSlice.last().width(),
				lh = rightSlice.last().height(),
				oloop = Math.floor(this.posterItems.size()/2);   //层级关系
			leftSlice.each(function(i){

			    $(this).css({
			    		width:lw,
						height:lh,
						left:i*gap,
						top:self.setVerticalAlign(lh),
					    zIndex:i,					    
						opacity:0.9/oloop						
				});
			    lw = lw/self.setting.scale;
			    lh = lh/self.setting.scale;
				oloop--;
			});
		},

		//设置垂直排列对齐
		setVerticalAlign:function(height){
			var verticalType = this.setting.verticalAlign,
				top = 0;
			if(verticalType === "middle"){
				top = (this.setting.height-height)/2;
			}
			else if(verticalType === "top"){
				top = 0;
			}
			else if(verticalType === "bottom"){
				top = this.setting.height-height;
			}
			else{
				top = (this.setting.height-height)/2;
			}

			return top;
		},

		//设置配置参数值去控制基本的宽度高度。。。
		setSettingValue:function(){
			var self = this;
			//设置幻灯片和按钮总区域宽度高度
			this.poster.css({
				width:this.setting.width,
				height:this.setting.height
			});
			//设置幻灯片区域的宽度高度
			this.posterItemMain.css({
				width:this.setting.width,
				height:this.setting.height
			});
			//计算上下切换按钮的宽度
			var w  = (this.setting.width - this.setting.posterWidth) / 2;
			this.nextBtn.css({
				width:w,
				height:this.setting.height,
				zIndex:Math.ceil(this.posterItems.size()/2)
				
			});
			this.prevBtn.css({
				width:w,
				height:this.setting.height,
				zIndex:Math.ceil(this.posterItems.size()/2)
				
			});
            //设置第一帧幻灯片的参数
			this.posterFirstItem.css({
				width:this.setting.posterWidth,
				height:this.setting.posterHeight,
				left:w,
				top:self.setVerticalAlign(this.setting.posterHeight),
				zIndex:Math.floor(this.posterItems.size()/2),
				opacity:1		
			});

		},

		//获取人工配置参数
		getSetting:function(){
			var setting = this.poster.attr("data-setting");
			if(setting && setting != ""){
				return $.parseJSON(setting);
			}
			else{
				return {};
			}
		}
		
	};

	//有多个旋转木马对象，需要初始化
	Carrousel.init = function(posters){
		var _this_ = this;
		posters.each(function(){
			new _this_($(this));
		});
	};

	window["Carrousel"] = Carrousel;

})(jQuery);