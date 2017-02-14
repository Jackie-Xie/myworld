requirejs.config({
	paths: {
		jquery: 'jquery'
	}
});

requirejs(['jquery','backtop'],function ($,backtop) {
	 $('#backTop').backtop({
	 	mode: 'move',
	 	// pos: $(window).height(),
	 	pos: '120',
		speed: 1000
	 });
});
