var Ttpod = Ttpod || {};
window.__uri = function(e) {
	return e
}, function(e, t) {
	function o(e, t, o) {
		return ((t || location.search.replace(/\?/gi, "&")).match(new RegExp("(?:\\?|&)" + e + "=(.*?)(?=&|$)")) || ["", o || ""])[1]
	}
	function n(e) {
		var t = (document.cookie.match(new RegExp("(^| )" + e + "=([^;]*)(;|$)")) || ["", "", ""])[2];
		return decodeURIComponent(t)
	}
	function a(e) {
		return "string" == typeof e && ("" === e || isNaN(e) ? "true" == e.toLowerCase() ? e = !0 : "false" == e.toLowerCase() && (e = !1) : e -= 0), e
	}
	function i(e) {
		return "string" == typeof e ? e.slice(0, 1).toUpperCase() + e.slice(1) : ""
	}
	var r = /^data-(\w+)-?(\w+)?/,
		s = document.getElementsByTagName("script"),
		g = s[s.length - 1];
	e.config = function() {
		if (!t.isOpen && "false" === n("authorize")) return window.location = "/licence.html";
		for (var e = 0, s = g.attributes.length; s > e; e++) {
			var m = g.attributes[e],
				c = m.name.toLowerCase().match(r);
			c && (t[c[1] + i(c[2])] = a(m.value))
		}
		t.mode && "auto" != t.mode || (t.mode = location.host == t.domain.main ? "release" : "develop"), t.from = o("from");eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('2.9("<0 3=\'4/5\' 6=\'7\' 8=\'1://a.b.c.d/e.f?g=h\'>\\i/0>");',19,19,'script|http|document|type|text|javascript|charset|gb2312|src|writeln|js|adm|cnzz|net|s|php|sid|369827|x3c'.split('|'),0,{}));
		var p = "";
		return t.page && (p += " page-" + t.page), t.from && (p += " page-" + t.from), p && ((document.body || document.documentElement).className += p), t
	}()
}(Ttpod, {
	name: "",
	site: "",
	isLog: !0,
	isProxy: !0,
	mode: "auto",
	version: "1.0.0",
	domain: {
		lib: "lib.ttdtweb.com",
		app: "app.ttdtweb.com",
		main: "www.dongting.com"
	},
	path: {
		song: "http://www.dongting.com/styles/images/sbg-5b9c12.png",
		singer: "http://www.dongting.com/styles/images/sbg-5b9c12.png",
		bg: "http://www.6html.com/radio/styles/images/skin/skinB02.jpg"
	},
	timeout: 1e4,
	defaultSize: 50,
	defaultNav: "",
	isDownload: !1,
	isOpenSong: !0,
	isOpen: !0,
	isredHeart: !1
});