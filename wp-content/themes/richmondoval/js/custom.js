( function( $ ) {

    $(window).load(function() {

        $('#loading-wrap').fadeOut(600);
    });


$( document ).ready(function() {

   /* $('#pimaryMenu li.has-sub>a').on('click', function(){
		//$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});*/

    // FAQ Toggler
    $('.questionNtoggler').click(function(){
        if($(this).hasClass('on')) {
            $(this).removeClass('on').next().slideUp(250);
        }
        else {
            $('.questionNtoggler').removeClass('on').next().slideUp(250);
            $(this).addClass('on').next().slideDown(250);
        }
    });

    $('.triggerTop').click(function() {
        $('.otherMenu').toggle(200).toggleClass('open');
    });

    $('#pimaryMenu ul.primHolder .fa').each(function(){
        $(this).click(function() {
            $(this).next('.children').slideToggle(400);
            $(this).toggleClass('fa-angle-down', 1000);
        });
    });

    $('#pimaryMenu .primHolder li').each(function(){

        //console.log($(this).has('ul'));
        if($(this).hasClass('page_item_has_children') != true){
            $(this).children('i:first').remove();

        }
    });

    $('.showMoreToggler').click(function(){
        if($(this).hasClass('on')) {
            $(this).removeClass('on').next().slideUp(250);
        }
        else {
            $('.questionNtoggler').removeClass('on').next().slideUp(250);
            $(this).addClass('on').next().slideDown(250);
        }
    });

    $('.mainMenu ul ul ul').parent().prepend('<span class="subToggler"></span>');
    $('.mainMenu').addClass('original').clone().insertAfter('.mainMenu').addClass('cloned').removeClass('original').hide();
    $('.mainMenu ul#menu-programs-menu').prepend('<li class="close"><a href="#"><i class="fa fa-times"></i></a></li>');
    $('.mainMenu ul#menu-programs-menu .close').click(function () {
        $('body').toggleClass('menuOpen');
        $('.menuToggler').toggleClass('on');
    });


    if($('.alerts').length){
        ticker();
        setInterval(ticker,5000);
    }

    $('.content > *:first-child img').wrap('<div class="head-img"></div>');

	//$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');
//
//	(function getColor() {
//		var r, g, b;
//		var textColor = $('#cssmenu').css('color');
//		textColor = textColor.slice(4);
//		r = textColor.slice(0, textColor.indexOf(','));
//		textColor = textColor.slice(textColor.indexOf(' ') + 1);
//		g = textColor.slice(0, textColor.indexOf(','));
//		textColor = textColor.slice(textColor.indexOf(' ') + 1);
//		b = textColor.slice(0, textColor.indexOf(')'));
//		var l = rgbToHsl(r, g, b);
//		if (l > 0.7) {
//			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
//			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
//		}
//		else
//		{
//			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
//			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
//		}
//	})();
//
//	function rgbToHsl(r, g, b) {
//	    r /= 255, g /= 255, b /= 255;
//	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
//	    var h, s, l = (max + min) / 2;
//
//	    if(max == min){
//	        h = s = 0;
//	    }
//	    else {
//	        var d = max - min;
//	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
//	        switch(max){
//	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
//	            case g: h = (b - r) / d + 2; break;
//	            case b: h = (r - g) / d + 4; break;
//	        }
//	        h /= 6;
//	    }
//	    return l;
//	}
});
} )( jQuery );

setInterval(stickIt, 10);

function stickIt(){

    if($(window).scrollTop() > 250) {
        $('.mainMenu.original').addClass('fixed');
        $('.mainMenu.cloned').show();

    }else {
        $('.mainMenu.original').removeClass('fixed');
        $('.mainMenu.cloned').hide();
    }
}

var ticker = function(){
    $('.alerts p').hide();
    $('.alerts p:first').fadeIn(400, function(){
        $(this).detach().appendTo('.alerts');
    });
};

