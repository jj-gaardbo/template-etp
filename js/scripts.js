(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

        init_slider();
		
	});


    function init_slider(){
        if(GlobalVars.pageTemplate != "template-frontpage.php"){
            return;
        }




        var transitions = [
            {$Duration:800,$Opacity:2}
        ];


        var options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: transitions,
                $TransitionsOrder: 1
            },
            $SlideDuration: 1500,
            $LazyLoading: true,
            $Loop: 1,
            $Idle: 6000,
            $FillMode: 2
        };
        var fp_slider = new $JssorSlider$("fp-slider", options);
        //responsive code begin
        //remove responsive code if you don't want the slider scales
        //while window resizing
        function ScaleSlider() {
            var parentWidth = $('.fp-slider-inner').parent().width();
            if (parentWidth) {
                fp_slider.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();

        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end

    }

})(jQuery, this);
