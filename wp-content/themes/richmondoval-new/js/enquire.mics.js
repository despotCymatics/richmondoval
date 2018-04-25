

// Enquire
( function( $ ) {
    enquire.register("screen and (min-width: 0px) and (max-width: 768px)", {

       /* match: function () {

            // Set menu
            $('.mainMenu').prependTo('body');

            $('.menuToggler').click(function (){
                $('body').toggleClass('menuOpen');
                $(this).toggleClass('on');

            });

            $('.subToggler').remove();
            $('.mainMenu ul ul').hide().parent().prepend('<span class="subToggler"></span>');
            $('.subToggler').click(function (){
                $(this).toggleClass('on').next().next().slideToggle(250);
            });


        },
        unmatch: function () {

            // Unset menu
            $('.mainMenu').insertAfter('.menuToggler').show();
            $('body').removeClass('menuOpen');
            $('.menuToggler').unbind('click').removeClass('on');

            $('.subToggler').unbind('click').removeClass('on').remove();
            $('.mainMenu ul ul').show();

            $('.mainMenu ul ul ul').parent().prepend('<span class="subToggler"></span>');
        }*/

    }).register("screen and (min-width: 0px) and (max-width: 992px)", {

        match: function () {

            var elem1 = $('.sideBar.col-md-2').html();
            $('.sideBar.col-md-2').empty().hide();
            $(elem1).appendTo($('.sideBanner .sideBar'));

            $('.sideBar #pimaryMenu').hide();

        },

        unmatch: function () {
            var primMenu = $('#pimaryMenu').html();
            var qLinks = $('.quick-links').html();

            $('.sideBar.promo #pimaryMenu').remove();
            $('.sideBar.promo .quick-links').remove();

            $('<div id="pimaryMenu">'+primMenu+"</div>").appendTo($('.sideBar.col-md-2'));
            $('<div class="quick-links">'+qLinks+'</div>').appendTo($('.sideBar.col-md-2'));
            $('.sideBar.col-md-2').show();




        }

    });

})( jQuery );

