// the semi-colon before function invocation is a safety net against concatenated 
// scripts and/or other plugins which may not be closed properly.
;(function($, window, undefined){

	// undefined is used here as the undefined global variable in ECMAScript 3 is
	// mutable (ie. it can be changed by someone else). undefined isn't really being
	// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
	// can no longer be modified.

	// window and document are passed through as local variables rather than globals
	// as this (slightly) quickens the resolution process and can be more efficiently
	// minified (especially when both are regularly referenced in your plugin).

	// Create the defaults once
	var sticky = 'sticky',
		document = window.document,
		defaults = {
			delay: 1000,
			elementMaxY: '.maxY'
		};

	// The actual plugin constructor
	function Sticky(element, options) {
		this.element = $(element);

		// jQuery has an extend method which merges the contents of two or 
		// more objects, storing the result in the first object. The first object
		// is generally empty as we don't want to alter the default options for
		// future instances of the plugin
		this.options = $.extend({}, defaults, options);

		this._defaults = defaults;
		this._name = sticky;

		this.setEventDelegates();
		this.init();
	}

	Sticky.prototype.setEventDelegates = function(){
		$.each(this.delegates,function(key,values){
			$.each(values,function(selector,fn){
				$(this.element).on(key,selector,fn.bind(this));
			}.bind(this));
		}.bind(this));
	};

	Sticky.prototype.delegates = {
		click: {
			'xxx': function(e){
				
			}
		}
	};

	Sticky.prototype.init = function(){
		var offset = this.element.offset();

		this.posY = parseInt(offset.top);
		this.width = parseInt(this.element.width());
		this.height = parseInt(this.element.height());
		this.maxY = parseInt($(this.options.elementMaxY).height()) - this.height - (this.posY * 2);

		this.element.css({
			position: 'absolute',
			top: 0,
			right: 0,
			width: this.width + 'px'
		});

		// Bind scroll event
		$(window).bind('scroll', this.onScroll.bind(this));
	};

	Sticky.prototype.onScroll = function(){
		var scrollY = parseInt($(window).scrollTop());
		var top = 0;

		if(scrollY >= this.posY){
			if(scrollY <= this.maxY){
				top = scrollY - this.posY;
			} else {
				top = this.maxY;
			}
		} else if(scrollY < this.posY){
			top = 0;
		}
		this.element.stop().animate({
			top: top + 'px'
		}, this.options.delay);
	};

	// A really lightweight plugin wrapper around the constructor, 
	// preventing against multiple instantiations
	$.fn[sticky] = function(options){
		return this.each(function () {
			if (!$.data(this, 'sticky_' + sticky)) {
				$.data(this, 'sticky_' + sticky, new Sticky(this, options));
			}
		});
	}

}(jQuery, window));