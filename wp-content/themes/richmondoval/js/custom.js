( function( $ ) {


    $(window).load(function() {

        $('#loading-wrap').fadeOut(600);
        $('body').css('overflow','auto');
    });


$( document ).ready(function() {

    $('body').css('overflow','hidden');

    /* if(document.getElementsByTagName('object').length > 0){
       window.onbeforeunload = function() {

          window.location.href = 'http://google.com';
           console.log('aaa');
       };
       //history.replaceState({},document.referrer, document.referrer);
       //console.log(document.referrer);


   }*/

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

    $('table').wrap("<div class='table-wrap'></div>");

    $('.homepage-alerts .row .newsHolder').each(function(index, value){
        $(this).addClass('ad '+ 'num_'+index);
    });



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

