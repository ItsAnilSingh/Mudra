/**
 * Sticky Header Bar
 */

(function($){

	$(document).ready(function(){

		"use strict";

		var previousScroll = 0;
		var headerBarOffset = $('#header-bar').offset().top;

		if ($(window).width() > 959 ) {
			$(window).scroll(function(){
				var currentScroll = $(this).scrollTop();
				if (currentScroll > headerBarOffset) {
					$('#header-bar').addClass('sticky-header');
					if (currentScroll > previousScroll) {
						$('#header-bar').fadeOut(500);
					} else {
						$('#header-bar').fadeIn(500);
					}
				} else {
					$('#header-bar').removeClass('sticky-header');
				}
				previousScroll = currentScroll;
			});
		}

	});

})(jQuery);
