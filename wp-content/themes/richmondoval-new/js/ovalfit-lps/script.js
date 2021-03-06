$(window).on("load",function() {

	//show and hide transparent sticky nav
	$(window).scroll(function() {
		if ($(window).scrollTop() > 50) {
			$('.ov-fit-nav').addClass('ov-fit-background-dark');
		}else{
			$('.ov-fit-nav').removeClass('ov-fit-background-dark');
		}


	/* Check the location of each desired element */
        $('.ov-team-image').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
            	var image1 = $('.ov-team-image-1');
            	var image2 = $('.ov-team-image-2');
            	var image3 = $('.ov-team-image-3');
            	var image4 = $('.ov-team-image-4');
                
                image1.animate({'opacity':'1'},500);
                image2.delay(200).animate({'opacity':'1'},500);
                image3.delay(400).animate({'opacity':'1'},500);
                image4.delay(600).animate({'opacity':'1'},500); 
            }
            
        }); 

        //program oferring section
		$('.ov-team-image-program').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height() + 400;
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
            	var imageProgram1 = $('.ov-team-image-program1');
            	var imageProgram2 = $('.ov-team-image-program2');
                var imageProgram3 = $('.ov-team-image-program3');

                imageProgram1.delay(300).animate({'opacity':'.5'},500);
                imageProgram2.delay(700).animate({'opacity':'.5'},500);
                imageProgram3.delay(1000).animate({'opacity':'.5'},500);   
            }
            
        }); 

        /*$('.ov-ride-section').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height() + 400;
            //console.log(bottom_of_object + ' ' + bottom_of_window);
            
            /!* If the object is completely visible in the window, fade it it *!/
            if( bottom_of_window > bottom_of_object ){
            	var ovRideSection1 = $('.ov-ride-display-section');
            	var ovRideSection2 = $('.ov-ride-sprintshift-section');
            	var ovRideSection3 = $('.ov-ride-powermeter-section');
            	var ovRideSection4 = $('.ov-ride-carbonglide-section');

                ovRideSection1.animate({'opacity':'5'},1500);
                ovRideSection2.delay(500).animate({'opacity':'5'},1500);
                ovRideSection3.delay(1000).animate({'opacity':'5'},1500);
                ovRideSection4.delay(1500).animate({'opacity':'5'},1500);
            }
            
        }); */

	}); //end scroll listenn

	$('.ov-coach-slider').click(function(e) {
		var coachName, coachDescription;
		e.preventDefault();

		coachName = $(this).attr('data-name');
		coachDescription = $(this).attr('data-description');

		$('.ov-coach-name').text(coachName);
		$('.ov-coach-description').text(coachDescription);

	});

	//disable touch events for trainer carousel
	$('.ov-coach-slider').bind('touchmove', false);




	// legacy sections
	$('.ov-discover-number-btn1').click(function(e) {
		e.preventDefault();

		$('.ov-legacy-section1').show();
		$('.ov-legacy-section2').hide()
		$('.ov-legacy-section3').hide()
	})

	// legacy sections
	$('.ov-discover-number-btn2').click(function(e) {
		e.preventDefault();

		$('.ov-legacy-section2').show();
		$('.ov-legacy-section1').hide()
		$('.ov-legacy-section3').hide()
	})

	// legacy sections
	$('.ov-discover-number-btn3').click(function(e) {
		e.preventDefault();

		$('.ov-legacy-section3').show();
		$('.ov-legacy-section1').hide()
		$('.ov-legacy-section2').hide()
	})




	//program offering btns
	$('.ov-program-btn').hover(function(e) {
		e.preventDefault();
		var ovName, ovLearnLink, ovLearnTxt, ovDescriptText, ovLogo, ovSoon;

		ovName = $(this).attr('data-name');
		ovLearnLink = $(this).attr('data-learn-link');
		ovLearnTxt = $(this).attr('data-learn-txt');
		ovDescriptText = $(this).attr('data-description');
		ovLogo = $(this).attr('data-logo');
		ovSoon = $(this).attr('data-coming-soon');

		$('.ov-program-btn').removeClass('active');
		$(this).addClass('active');

		if(ovLearnLink === "") {
			$('.ov-program-offerings .ov-fit-btn-lg').hide(0);
            $('.ov-program-offerings span').show(0);
        }
		else {
			$('.ov-program-offerings .ov-fit-btn-lg').show(0);
            $('.ov-program-offerings span').hide(0);
		}

		$('.ov-program-offerings .ov-fit-btn-lg').attr('href', ovLearnLink);
		$('.ov-program-offerings .ov-fit-btn-lg').text(ovLearnTxt);
		$('.ov-program-offerings .ov-ride-logo').attr('src', ovLogo);
		$('.ov-program-offerings p').text(ovDescriptText);
		$('.ov-program-offerings span').text(ovSoon);
	})

		var displayMobile = $('.ov-ride-display-mobile');
		var sprintshiftMobile = $('.ov-ride-sprintshift-mobile');
		var carbonglideMobile = $('.ov-ride-carbonglide-mobile');
		var powerMeterMobile = $('.ov-ride-powermeter-mobile');

		var displayContentMobile = $('.ov-ride-display-content-mobile');
		var sprintshiftContentMobile = $('.ov-ride-sprintshift-content-mobile');
		var carbonglideContentMobile = $('.ov-ride-carbonglide-content-mobile');
		var powerMeterContentMobile = $('.ov-ride-powermeter-content-mobile');

	//handle click previous button ride machine mobile
	$('.ov-ride-mobile-prev-btn').click(function(e) {
		e.preventDefault();

		if(displayMobile.hasClass('active')){
			displayMobile.removeClass('active').addClass('pulse-button-transparent');
			displayContentMobile.hide();

			carbonglideContentMobile.fadeIn();
			carbonglideMobile.addClass('active').removeClass('pulse-button-transparent');

			return false;
		}

		if(carbonglideMobile.hasClass('active')){
			carbonglideMobile.removeClass('active').addClass('pulse-button-transparent');
			carbonglideContentMobile.hide();

			powerMeterContentMobile.fadeIn();
			powerMeterMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

		if(powerMeterMobile.hasClass('active')){
			powerMeterMobile.removeClass('active').addClass('pulse-button-transparent');
			powerMeterContentMobile.hide();

			sprintshiftContentMobile.fadeIn();
			sprintshiftMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

		if(sprintshiftMobile.hasClass('active')){
			sprintshiftMobile.removeClass('active').addClass('pulse-button-transparent');
			sprintshiftContentMobile.hide();

			displayContentMobile.fadeIn();
			displayMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

	});


	//handle click next button ride machine mobile
	$('.ov-ride-mobile-next-btn').click(function(e) {
		e.preventDefault();

		if(displayMobile.hasClass('active')){
			displayMobile.removeClass('active').addClass('pulse-button-transparent');
			displayContentMobile.hide();

			sprintshiftContentMobile.fadeIn();
			sprintshiftMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

		if(sprintshiftMobile.hasClass('active')){
			sprintshiftMobile.removeClass('active').addClass('pulse-button-transparent');
			sprintshiftContentMobile.hide();

			powerMeterContentMobile.fadeIn();
			powerMeterMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

		if(powerMeterMobile.hasClass('active')){
			powerMeterMobile.removeClass('active').addClass('pulse-button-transparent');
			powerMeterContentMobile.hide();

			carbonglideContentMobile.fadeIn();
			carbonglideMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

		if(carbonglideMobile.hasClass('active')){
			carbonglideMobile.removeClass('active').addClass('pulse-button-transparent');
			carbonglideContentMobile.hide();

			displayContentMobile.fadeIn();
			displayMobile.addClass('active').removeClass('pulse-button-transparent');;

			return false;
		}

	});

	//display ride machine mobile nav
	$('.ov-ride-machine-mobile .pulse-button').click(function(e) {
		$('.ov-ride-machine-mobile .pulse-button').removeClass('active').addClass('pulse-button-transparent');
		$('.ov-ride-mobile-nav').show();
	});

	//program offering btns
	$('.ov-ride-display-mobile').click(function(e) {
		e.preventDefault();
		$(this).addClass('active').removeClass('pulse-button-transparent');;

		$('.ov-ride-sprintshift-content-mobile').hide();
		$('.ov-ride-powermeter-content-mobile').hide();
		$('.ov-ride-carbonglide-content-mobile').hide();

		$('.ov-ride-display-content-mobile').fadeIn();
	});

	$('.ov-ride-sprintshift-mobile').click(function(e) {
		e.preventDefault();
		$(this).addClass('active').removeClass('pulse-button-transparent');;

		$('.ov-ride-display-content-mobile').hide();
		$('.ov-ride-carbonglide-content-mobile').hide();
		$('.ov-ride-powermeter-content-mobile').hide();

		$('.ov-ride-sprintshift-content-mobile').fadeIn();
	});

	$('.ov-ride-powermeter-mobile').click(function(e) {
		e.preventDefault();
		$(this).addClass('active').removeClass('pulse-button-transparent');

		$('.ov-ride-display-content-mobile').hide();
		$('.ov-ride-carbonglide-content-mobile').hide();
		$('.ov-ride-sprintshift-content-mobile').hide();

		$('.ov-ride-powermeter-content-mobile').fadeIn();
	});

	$('.ov-ride-carbonglide-mobile').click(function(e) {
		e.preventDefault();
		$(this).addClass('active').removeClass('pulse-button-transparent');

		$('.ov-ride-display-content-mobile').hide();
		$('.ov-ride-powermeter-content-mobile').hide();
		$('.ov-ride-sprintshift-content-mobile').hide();

		$('.ov-ride-carbonglide-content-mobile').fadeIn();
	});



    // Set menu
    $('.menuToggler').click(function (e){
    	e.preventDefault();
        $('body').toggleClass('menuOpen');
        $(this).toggleClass('on');
    });
    $('.mainMenu .close').click(function (e) {
        e.preventDefault();
        $('body').toggleClass('menuOpen');
        $('.menuToggler').toggleClass('on');
    });

    $('.mainMenu ul ul').hide().parent().prepend('<span class="subToggler"></span>');

    $('.subToggler').click(function (){
        $(this).toggleClass('on').next().next().slideToggle(300);
    });


});

jQuery(document).ready(function($) {

    // FAQ's
    $('.ovalfit-faq-trigger').click(function(e){
        $('.ovalfit-faqs').fadeIn(200);
        if($('body').width() < 1025) $('body').css('overflow', 'hidden');
    });

    $('.ovalfit-faqs .ovalfit-qa a').click(function(e){
        var qaContent = $(this).parent().html();
        $('.ovalfit-qa-single').html('').hide();
        $('.ovalfit-qa-single').html(qaContent).slideDown(200);
    });

    $('.ovalfit-faqs .close').click(function(e){
        $(this).parent().fadeOut(200);
        $('body').css('overflow', 'auto');
    });

    $('.ovalfit-faqs .ovalfit-qa:first-child > a').click();


    //Machine slides
    var machineSlider1Current = 1;
    var slides1 = $('.ov-machine-slider.first .ov-machine-slides > div').length;
	$('.ov-machine-slider.first .ov-machine-slider-nav span').click(function(e){
		if($(this).is('.right.active') && slides1 > machineSlider1Current) {
			var nexSlide = machineSlider1Current+1;
			$('.ov-machine-slider.first .ov-machine-slide[data-num='+ machineSlider1Current +']').hide().removeClass('active');
			$('.ov-machine-slider.first .ov-machine-slide[data-num='+ nexSlide +']').fadeIn(0).addClass('active');
			machineSlider1Current++;
			$('.ov-machine-slider.first .ov-machine-slider-nav span').addClass('active');
			if(machineSlider1Current == slides1) $(this).removeClass('active');
		} else if($(this).is('.left.active') &&  machineSlider1Current <= 2) {
			var prevSlide = machineSlider1Current-1;
			$('.ov-machine-slider.first .ov-machine-slide[data-num='+ machineSlider1Current +']').hide().removeClass('active');
			$('.ov-machine-slider.first .ov-machine-slide[data-num='+ prevSlide +']').fadeIn(0).addClass('active');
			machineSlider1Current--;
			$('.ov-machine-slider.first .ov-machine-slider-nav span').addClass('active');
			if(machineSlider1Current == 1) $(this).removeClass('active');
		}

	});

    var machineSlider2Current = 1;
    var slides2 = $('.ov-machine-slider.second .ov-machine-slides > div').length;
    $('.ov-machine-slider.second .ov-machine-slider-nav span').click(function(e){
        if($(this).is('.right.active') && slides2 > machineSlider2Current) {
            var nexSlide = machineSlider2Current+1;
            $('.ov-machine-slider.second .ov-machine-slide[data-num='+ machineSlider2Current +']').hide().removeClass('active');
            $('.ov-machine-slider.second .ov-machine-slide[data-num='+ nexSlide +']').fadeIn(0).addClass('active');
            machineSlider2Current++;
            $('.ov-machine-slider.second .ov-machine-slider-nav span').addClass('active');
            if(machineSlider2Current == slides2) $(this).removeClass('active');
        } else if($(this).is('.left.active') &&  machineSlider2Current <= 2) {
            var prevSlide = machineSlider2Current-1;
            $('.ov-machine-slider.second .ov-machine-slide[data-num='+ machineSlider2Current +']').hide().removeClass('active');
            $('.ov-machine-slider.second .ov-machine-slide[data-num='+ prevSlide +']').fadeIn(0).addClass('active');
            machineSlider2Current--;
            $('.ov-machine-slider.second .ov-machine-slider-nav span').addClass('active');
            if(machineSlider2Current == 1) $(this).removeClass('active');
        }

    });

});

//Scroll Magic
$(function () { // wait for document ready
  // init
  var controller = new ScrollMagic.Controller();

  // define movement of panels
  var wipeAnimation = new TimelineMax()
    /*.fromTo(".ov-fit-training-ground-section.scroll-section1", 1, {opacity: 1}, {opacity: 1, ease: Linear.easeNone})
    .fromTo(".ov-fit-training-ground-section.scroll-section2", 1, {opacity: 0}, {opacity: 1, ease: Linear.easeNone})
    .fromTo(".ov-fit-training-ground-section.scroll-section3", 1, {opacity: 0}, {opacity: 1, ease: Linear.easeNone})
    .fromTo(".ov-fit-training-ground-section.scroll-section1", 1, {y: "0%"}, {y: "0%", ease: Linear.easeNone})
    .fromTo(".ov-fit-training-ground-section.scroll-section2", 1, {y: "100%"}, {y: "0%", ease: Linear.easeNone})
    .fromTo(".ov-fit-training-ground-section.scroll-section3", 1, {y: "100%"}, {y: "0%", ease: Linear.easeNone});*/
    ;
  // create scene to pin and link animation
  /*
  new ScrollMagic.Scene({
    triggerElement: ".ov-fit-training-ground-wrapper",
    triggerHook: "onLeave",
    duration: "300%"
  })
    .setPin(".ov-fit-training-ground-wrapper")
    .setTween(wipeAnimation)
    .addTo(controller);

   */
});




















