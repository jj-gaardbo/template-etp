(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

        init_searchform();

        init_active_nav();

        init_slider();

        init_scrollto_button();

        init_video_lightbox();

        init_cookie();
		
	});

    function init_cookie(){
        var cookieBox = $("#cookie");
        var allow = $("#allow_link");
        allow.on("click", function(e){
            setCookie("allow_cookies", "true", 700);
            cookieBox.animate({
                opacity : 0,
                height : 0
            });
            return false;
        });

        var myCookie = getCookie("allow_cookies");
        if (myCookie == null) {
            cookieBox.show();
        }
        else {
            cookieBox.hide();
        }
    }

    function init_active_nav(){
        var menuItems = $('.menu li');
        var body = $('body').data('page-post-type');
        if($('body').hasClass("error404") || $('body').hasClass("search")){
            return;
        }
        $.each(menuItems, function(){
            if($(this).hasClass(body)){
                $(this).addClass('current-menu-item');
            }
        });
    }

    function init_scrollto_button(){

        $(".arrow-down").click(function() {
            $('html, body').animate({
                scrollTop: $(".testimonial-section").offset().top - 90
            }, 1000);
        });

    }

    function init_video_lightbox(){
        $(".modal-trigger").click(function(e){
            e.preventDefault();
            dataModal = $(this).attr("data-modal");
            $("#" + dataModal).css({"display":"block"});
            // $("body").css({"overflow-y": "hidden"}); //Prevent double scrollbar.
        });

        $(".close-modal, .modal-sandbox").click(function(){
            $(".modal").css({"display":"none"});
            // $("body").css({"overflow-y": "auto"}); //Prevent double scrollbar.
        });
    }

    function init_searchform(){
        var trigger = $('.search-trigger');
        var input = $('.search-input-reveal');

        trigger.on('click', function(e){
            if(!trigger.hasClass('revealed-form')){
                e.preventDefault();
                open_searchform(trigger, input);
                setTimeout(function(){
                    close_searchform(trigger, input);
                }, 10000);
                return true;
            } else {
                return true;
            }
        });
    }

    function open_searchform(trigger, input){
        trigger.removeClass('hidden-form');
        input.animate({
            'width'         :   '230px',
            'padding-right' :   '20px',
            'padding-left'  :   '20px'
        });
        input.find('input').focus();
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

    function setCookie(c_name,value,exdays){
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString() + ";path=/;");
        document.cookie=c_name + "=" + c_value;
    }

    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        } else {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
                end = dc.length;
            }
        }
        return unescape(dc.substring(begin + prefix.length, end));
    }

})(jQuery, this);
