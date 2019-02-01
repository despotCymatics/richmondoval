( function( $ ) {


    $(window).load(function() {

        $('#loading-wrap').fadeOut(400);
        setTimeout(function(){$('body').css('overflow','auto')}, 400);

        setTimeout(function () {
            $('.eapps-widget-toolbar').next().hide();
        }, 2500);

    });

    container = document.getElementById ("insta-feed");
    if (container.addEventListener) {
        container.addEventListener ('DOMSubtreeModified', instaFeedLoaded, false);
    }
    

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

    if($('.alerts').length){
        //ticker();
        //setInterval(ticker,5000);
    }

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
        infinite: true,
        //centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        //prevArrow:'<button class="PrevArrow"> <span class="Thumbnail"></span></button>',
        //nextArrow:'<button class="NextArrow"> <span class="Thumbnail"></span></button>',

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },


            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });


    $('.slide-boxes').slick({
        dots: true,
        infinite: true,
        //centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
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
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
});

})( jQuery );


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

function instaFeedLoaded() {
    $('#insta-feed > div > a').hide();
}

function openTab(tabName,elmnt) {
    //console.log(elmnt);
    jQuery('.tablink').removeClass("active-tab");
    jQuery(elmnt).addClass("active-tab");
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(tabName).style.display = "block";

}
// Get the element with id="defaultOpen" and click on it
//if(document.getElementById("sessionsTab")) document.getElementById("sessionsTab").click();