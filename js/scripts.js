(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

        init_searchform();

        init_slider();
		
	});

    function init_searchform(){
        var trigger = $('.search-trigger');
        var input = $('.search-input-reveal');

        trigger.on('click', function(){
            if(!trigger.hasClass('revealed-form')){
                open_searchform(trigger, input);
                setTimeout(function(){
                    close_searchform(trigger, input);
                }, 10000);
            } else {
                close_searchform(trigger, input);
            }
            return false;
        });
    }

    function open_searchform(trigger, input){
        trigger.removeClass('hidden-form');
        input.animate({
            'width'         :   '230px',
            'padding-right' :   '20px',
            'padding-left'  :   '20px'
        });
        input.focus();
        trigger.attr('type','submit');
        trigger.addClass('revealed-form');
    }

    function close_searchform(trigger, input){
        trigger.removeClass('revealed-form');
        input.animate({
            'width'         :   '0',
            'padding-right' :   '0',
            'padding-left'  :   '0'
        });
        input.focus();
        trigger.attr('type','button');
        trigger.addClass('hidden-form');
    }


    function init_slider(){

        var slider = $('#fp-slider');

        slider.bxSlider({
            mode: 'fade',
            speed: 1500,
            slideMargin: 0,
            infiniteLoop: true,
            slideWidth: '100%',
            adaptiveHeight: true,
            responsive: true,
            touchEnabled: true,
            swipeThreshold: 50,
            oneToOneTouch: true,
            pager: false,
            controls: false,
            autoStart: true,
            auto: true,
            pause: 8000
        });

    }

})(jQuery, this);
