define(['jquery','scrollto'],function($,scrollto) {
	function BackTop(elements,opts) {
		this.opts = $.extend({}, BackTop.DEFAULTS, opts);
		this.$elements = $(elements);
		this.scroll = new scrollto.ScrollTo({
			dest: 0,
			speed: this.opts.speed
		});
        
        this._checkPosition(); 

        if (this.opts.mode == 'move') {
        	this.$elements.on('click', $.proxy(this._move,this)); //$.proxy()用于this指向的确定
        }
        else{
        	this.$elements.on('click', $.proxy(this._go,this));
        }
		
		$(window).on('scroll', $.proxy(this._checkPosition,this));
	}

	BackTop.DEFAULTS = {
		mode: 'move',
		pos: $(window).height(),
		speed: 800
	};
	BackTop.prototype._move = function() {
		this.scroll.move();
	};
	BackTop.prototype._go = function() {
		this.scroll.go();
	};
	BackTop.prototype._checkPosition = function() {
		var $el = this.$elements;
		if($(window).scrollTop() > this.opts.pos) {
			$el.fadeIn();
		}
		else{
			$el.fadeOut();
		}
	};

	$.fn.extend({//模块注册成jquery插件
		backtop: function (opts) {
			return this.each(function (){
				new BackTop(this,opts);
			});
			
		}
	});

	return {
		BackTop: BackTop
	};
});