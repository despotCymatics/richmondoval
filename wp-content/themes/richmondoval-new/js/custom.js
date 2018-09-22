( function( $ ) {


    $(window).load(function() {

        $('#loading-wrap').fadeOut(400);
        setTimeout(function(){$('body').css('overflow','auto')}, 400);
    });


$( document ).ready(function() {

    $( window ).load(function() {
        Modernizr.load([
            //first test need for polyfill
            {
                test: window.matchMedia,
                nope: "/wp-content/themes/richmondoval-new/js/media.match.min.js"
            },

            //and then load enquire
            "/wp-content/themes/richmondoval-new/js/enquire.min.js",
            "/wp-content/themes/richmondoval-new/js/enquire.mics.js"
        ]);
        setTimeout(function() {
            $('.loader').fadeOut(600);
        }, 300);


    });

    loaderOut();

    //$('body').css('overflow','hidden');

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
            $('.showMoreToggler').removeClass('on').next().slideUp(250);
            $(this).addClass('on').next().slideDown(250);
        }
    });

    $('.topBar .ser').click(function(e){
        e.preventDefault();
      $('.barSearch').slideToggle(100);
    });

    $('.programBox .expandToggler').click(function(e){
        e.preventDefault();
        $(this).next('.expand').slideToggle(80);
        $(this).children('i.fa').toggleClass('fa-minus', 100);

    });



    // Set menu
    //$('.mainMenu').prependTo('body');

    $('.menuToggler').click(function (){
        $('body').toggleClass('menuOpen');
        $(this).toggleClass('on');
        //setTimeout(function(){$('body').toggleClass('overflowHidden')}, 10);


    });
    $('.mainMenu .close').click(function () {
        $('body').toggleClass('menuOpen');
        $('.menuToggler').toggleClass('on');
        //setTimeout(function(){$('body').toggleClass('overflowHidden')}, 10);
    });

    //$('.subToggler').remove();
    $('.mainMenu ul ul').hide().parent().prepend('<span class="subToggler"></span>');

    $('.subToggler').click(function (){
        $(this).toggleClass('on').next().next().slideToggle(300);
    });

    if($('.alerts').length){
    ticker();
    setInterval(ticker,5000);
    }
    //$('.mainMenu ul ul ul').parent().prepend('<span class="subToggler"></span>');
    /*$('.mainMenu').addClass('original').clone().insertAfter('.mainMenu').addClass('cloned').removeClass('original').hide();
    $('.mainMenu.original').find('.logoHolder img').attr('src', '/wp-content/themes/richmondoval/images/basic/logo-org.png');*/

    //$('.mainMenu ul#menu-programs-menu').prepend('<li class="close"><a href="#"><i class="fa fa-times"></i></a></li>');

    //$('.content > *:first-child img').wrap('<div class="head-img"></div>');

	  //$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');

    $('table').wrap("<div class='table-wrap'></div>");

    if (document.documentElement.clientWidth > 1025) {
        $('.mainMenu .scrollable').slimScroll({
         //width: '300px',
         height: 'auto',
         size: '5px',
         position: 'right',
         color: '#ddd',
         alwaysVisible: true,
         distance: '54px',
         //start: $('#child_image_element'),
         //railVisible: true,
         //railColor: '#222',
         //railOpacity: 0.3,
         wheelStep: 8,
         touchScrollStep: 70
         //allowPageScroll: false,
         //disableFadeOut: false
         });
    };
    //console.log(document.documentElement.clientWidth);


});
} )( jQuery );


var ticker = function(){
    $('.alerts p').hide();
    $('.alerts p:first').fadeIn(400, function(){
        $(this).detach().appendTo('.alerts');
    });
};

function loaderOut() {
    setTimeout(function(){
        jQuery('#loading-wrap').fadeOut(400);
        setTimeout(function(){jQuery('body').css('overflow','auto')}, 400);
    }, 5000);
}

function loaderIn() {
    jQuery('#loading-wrap').fadeIn(100);
    setTimeout(function(){jQuery('body').css('overflow','hidden')}, 100);
    setTimeout(function(){window.scrollTo(0,0)}, 150);

}

