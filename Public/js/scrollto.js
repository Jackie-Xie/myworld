define(['jquery'],function($) {
	function ScrollTo(opts) {
		this.opts = $.extend({}, ScrollTo.DEFAULTS, opts);
		this.$elements = $('html, body');
	}
	ScrollTo.prototype.move = function() {
		var opts = this.opts,
		    dest =opts.dest;

		if($(window).scrollTop() != dest) {//判断是否到达目的地
			if(!this.$elements.is(':animated')) {//判断是否在执行动画
				this.$elements.animate({
					scrollTop: dest  //gunhuimudidi
				},opts.speed);
			}
		}
	};
	ScrollTo.prototype.go = function() {
		var dest =this.opts.dest;

		if($(window).scrollTop() != dest) {//判断是否到达目的地
			this.$elements.scrollTop(dest);  //zhijiedaodamudidi
		}
	};

	//默认参数
	ScrollTo.DEFAULTS = {
		dest: 0,
		speed: 800
	};

	return {
		ScrollTo: ScrollTo
	};
});