

	// Enquire

    enquire.register("screen and (min-width: 0px) and (max-width: 1024px)", {

        match: function () {

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
        }

    })

