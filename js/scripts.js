(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

        init_slider();
		
	});


    function init_slider(){

        var slider = $('#fp-slider');

        slider.bxSlider({
            mode: 'fade',
            speed: 500,
            slideMargin: 0,
            infiniteLoop: true,
            slideWidth: '100%',
            adaptiveHeight: true,
            responsive: true,
            touchEnabled: true,
            swipeThreshold: 50,
            oneToOneTouch: true,
            pager: false,
            controls: false
        });

    }

})(jQuery, this);
