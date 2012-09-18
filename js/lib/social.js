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
	var social = 'social',
		document = window.document,
		defaults = {
			gplus: true,
			facebook: true,
			twitter: true
		};

	// The actual plugin constructor
	function Social(element, options) {
		this.element = $(element);

		// jQuery has an extend method which merges the contents of two or 
		// more objects, storing the result in the first object. The first object
		// is generally empty as we don't want to alter the default options for
		// future instances of the plugin
		this.options = $.extend({}, defaults, options);

		this._defaults = defaults;
		this._name = social;

		this.init();
	}

	Social.prototype.init = function(){
		if(this.options.facebook){
			$('body').prepend('<div id="fb-root"></div>');
			$.getScript('http://connect.facebook.net/en_US/all.js#xfbml=1&appId=164977776919117',function(){
				FB.XFBML.parse();
			});
		}
		if(this.options.gplus){
			$.getScript('https://apis.google.com/js/plusone.js');
		}
		if(this.options.twitter){
			$.getScript('http://platform.twitter.com/widgets.js');
		}
	};

	// A really lightweight plugin wrapper around the constructor, 
	// preventing against multiple instantiations
	$.fn[social] = function(options){
		return this.each(function () {
			if (!$.data(this, 'social_' + social)) {
				$.data(this, 'social_' + social, new Social(this, options));
			}
		});
	}

}(jQuery, window));