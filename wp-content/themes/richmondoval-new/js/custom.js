( function( $ ) {


    $(window).load(function() {

        $('#loading-wrap').fadeOut(400);
        setTimeout(function(){$('body').css('overflow','auto')}, 400);

        setTimeout(function () {
            $('.eapps-widget-toolbar').next().hide();
        }, 2500);

    });

   /* container = document.getElementById ("insta-feed");
    if (container.addEventListener) {
        container.addEventListener ('DOMSubtreeModified', instaFeedLoaded, false);
    }*/
    

$( document ).ready(function() {

    $('.topMega .background .column-image').append('<span class="close"></span>');

    $('.topMega .background .column-image .close').click(function () {
       $('body').click();
    });

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


        var lastScrollTop =  $(window).scrollTop();

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();

            if(lastScrollTop > scrollTop) {
                $('header').removeClass('collapse');
            }
            else if (scrollTop > 100) {
                if (!$('header').hasClass('collapse')) {
                    $('header').addClass('collapse');
                }
            }
            else {
                $('header').removeClass('collapse');
            }

            lastScrollTop = scrollTop;

            //for mobile
            if (scrollTop > 100) {
                $('header').addClass('drop-shadow');
            }else {
                $('header').removeClass('drop-shadow');
            }

        });

    });

    loaderOut();

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

    $('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });


    // Set menu
    $('.menuToggler').click(function (){
        $('body').toggleClass('menuOpen');
        $(this).toggleClass('on');
    });
    $('.mainMenu .close').click(function () {
        $('body').toggleClass('menuOpen');
        $('.menuToggler').toggleClass('on');
    });

    //$('.subToggler').remove();
    $('.mainMenu ul ul').hide().parent().prepend('<span class="subToggler"></span>');

    $('.subToggler').click(function (){
        $(this).toggleClass('on').next().next().slideToggle(300);
    });


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
    }

    //Slick
    $('.event-carousel').slick({
        dots: false,
        infinite: false,
        centerMode: false,
        slidesToShow: 5,
        slidesToScroll: 3,

        responsive: [

            {
                breakpoint: 1680,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                }
            },

            {
                breakpoint: 1281,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                }
            },

            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    centerMode: true,
                    infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                }
            }
        ]

    });


    $('.slide-boxes').slick({
        dots: true,
        //infinite: true,
        autoplay:true,
        autoplaySpeed:3000,
        //centerMode: true,
        slidesToShow: 3,
        slidesPerRow: 3,
        slidesToScroll: 1,
        arrows:false,
        rows:1,
        //prevArrow:'<button class="PrevArrow"> <span class="Thumbnail"></span></button>',
        //nextArrow:'<button class="NextArrow"> <span class="Thumbnail"></span></button>',

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                    slidesPerRow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows:1,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });

    //Tabs
    $('#responsiveTabs').responsiveTabs({
        //startCollapsed: 'accordion'
        startCollapsed: false
    });


    //Mega menu submenu actions
    $(document).on('click','.mobileMega #mega-menu-wrap-max_mega_menu_1 #mega-menu-max_mega_menu_1 ul ul li.mega-menu-item-has-children > a.mega-menu-link', function(e) {
        var clicks = $(this).data('clicks');
        if (!clicks) {
            //click 1
            e.preventDefault();
            e.stopPropagation();
            $('.mobileMega ul ul li.mega-menu-item-has-children ul').slideUp(0);
            $(this).next('ul').slideToggle(200);
        } else {
            //click 2
        }
        $(this).data("clicks", !clicks);

    });

    //goto clicked
    $(document).on('click','.mobileMega .mega-menu-link, .mobileMega .mega-menu-link span, .r-tabs-accordion-title .r-tabs-anchor', function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top - 56
        }, 200);
    });




});

})( jQuery );

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

function instaFeedLoaded() {
    $('#insta-feed > div > a').hide();
}
