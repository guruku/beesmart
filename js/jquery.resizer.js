(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$.fn.resizable = function(options){
	var settings = $.extend({
		"storageSupported": typeof Storage !== "undefined",
		"controls":".resizer",
		"cookie":"resizer-cookie",
		"lg":"resize-lg",
		"md":"resize-md",
		"sm":"resize-sm",
		"animate":true
	}, options);
	var $content = this;
	$(settings.controls).on("click", ".sm, .md, .lg", function(evt){
		var $this = $(this);
		$this.parent().find("li").removeClass("active");
		$this.addClass("active");
		$content.each(function(){
			var $target = $(this);
			var size = $target.data("size");
			var newSize;
			$content.removeClass(settings.sm + " " + settings.md + " " + settings.lg)
			if($this.hasClass("lg")){
				newSize = settings.lg;
				$content.addClass(settings.lg);
			}else if($this.hasClass("md")){
				newSize = settings.md;
				$content.addClass(settings.md);
			}else if($this.hasClass("sm")){
				newSize = settings.sm;
				$content.addClass(settings.sm);
			}
			if(settings.storageSupported){
				sessionStorage.setItem(settings.cookie, newSize);
			}else{
				$.cookie(settings.cookie, newSize);
			}
		});
	});
	return $content.each(function(){
		var $this = $(this);
		var savedSize = (settings.storageSupported)? sessionStorage.getItem(settings.cookie) : $.cookie(settings.cookie);
		if(savedSize){
			$this.addClass(savedSize);
		}else{
			$this.addClass(settings.md);
		}
		if(settings.animate){
			setTimeout(function(){$this.addClass("animate");}, 1);
		}
	});
};


},{}]},{},[1]);
