function bookBike(authCode, userId, sessionId, bikeId, bikeNum, sessionName, sessionDate, sessionTime) {

    swal({
        html: "<h2>Your RIDE is waiting</h2>"+
        "<p>Please confirm your bike selection.</p>"+
        "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'><br><p class='bike-num'>#"+bikeNum+"</p>",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonText: 'Reserve',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            swal({
                imageUrl: '/wp-content/themes/richmondoval-new/images/basic/oval-fit-loading-dots.gif',
                imageWidth: 120,
                html: '<p>Please wait</p>',
                allowOutsideClick: false,
                showConfirmButton: false
                //timer:2000

            });
            jQuery(function($) {
                $.ajax({
                    url: '/wp-content/themes/richmondoval-new/stages-api.php',
                    type: 'post',
                    data: {
                        userId: userId,
                        sessionId: sessionId,
                        bikeId: bikeId,
                        authCode: authCode
                    },
                    success: function (response) {
                        if(response =='<p>Thank You for Booking with OvalFit!</p>') {
                            swal({
                                html: "<h2>Your RIDE is ready</h2>"+
                                "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'>"+
                                "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                                "<h4 class='session-name'>"+sessionName+"</h4>"+
                                "<span class='session-date'>"+sessionDate+"</span><br>"+
                                "<span class='session-time'>"+sessionTime+"</span>"+
                                "<p>Membership will be validated in the lobby to confirm your attendance. If you can’t make it please cancel your reservation online.</p>",
                                allowOutsideClick: false
                            }).then((result) => {
                                loaderIn();
                                window.location="/oval-fit/";
                            })
                        }else {
                            swal({
                                type: 'warning',
                                html: '<h2>Oups..</h2>'+response
                            })
                        }

                        console.log(response);
                    }
                });
            })
        }
        else {

        }
    });
}

function bookSpot(authCode, userId, sessionId, bikeId, bikeNum, sessionName, sessionDate, sessionTime) {

    swal({
        html: "<h2>ONE STEP AWAY</h2>"+
            "<p>Please confirm your workout.</p>"+
            "<img src='/wp-content/themes/richmondoval-new/images/stages/treadmill.svg'><br><p class='bike-num'>#"+bikeNum+"</p>",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonText: 'Reserve',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            swal({
                imageUrl: '/wp-content/themes/richmondoval-new/images/basic/oval-fit-loading-dots.gif',
                imageWidth: 120,
                html: '<p>Please wait</p>',
                allowOutsideClick: false,
                showConfirmButton: false
                //timer:2000

            });
            jQuery(function($) {
                $.ajax({
                    url: '/wp-content/themes/richmondoval-new/stages-api.php',
                    type: 'post',
                    data: {
                        userId: userId,
                        sessionId: sessionId,
                        bikeId: bikeId,
                        authCode: authCode
                    },
                    success: function (response) {
                        if(response =='<p>Thank You for Booking with OvalFit!</p>') {
                            swal({
                                html: "<h2>See you in the studio!</h2><p>Bring your towel and water bottle</p>"+
                                    "<img src='/wp-content/themes/richmondoval-new/images/stages/treadmill.svg'>"+
                                    "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                                    "<h4 class='session-name'>"+sessionName+"</h4>"+
                                    "<span class='session-date'>"+sessionDate+"</span><br>"+
                                    "<span class='session-time'>"+sessionTime+"</span>"+
                                    "<p>Membership will be validated in the lobby to confirm your attendance. If you can’t make it please cancel your reservation online.</p>",
                                allowOutsideClick: false
                            }).then((result) => {
                                loaderIn();
                                window.location="/oval-fit/";
                            })
                        }else {
                            swal({
                                type: 'warning',
                                html: '<h2>Oups..</h2>'+response
                            })
                        }

                        console.log(response);
                    }
                });
            })
        }
        else {

        }
    });

}


function cancelBooking(authCode, bookingId, bikeNum, sessionName, sessionDate, sessionTime) {

    swal({
        imageUrl: '/wp-content/themes/richmondoval-new/images/basic/oval-fit-loading-dots.gif',
        imageWidth: 120,
        html: '<p>Please wait</p>',
        allowOutsideClick: false,
        showConfirmButton: false
        //timer:2000

    });
    jQuery(function($) {
        $.ajax({
            url: '/wp-content/themes/richmondoval-new/stages-api.php',
            type: 'post',
            data: {
                bookingId: bookingId,
                authCode: authCode
            },
            success: function (response) {
                if(response == '<h2>Your Booking has been canceled!</h2>') {
                    $("div[data-id='"+bookingId+"']").hide(200);
                    swal({
                        html: "<h2>Your reservation has been cancelled!</h2>"+
                            "<p>See you on the next RIDE.</p>"+
                        "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'><br>"+
                        "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                        "<h4 class='session-name'>"+sessionName+"</h4>"+
                        "<span class='session-date'>"+sessionDate+"</span><br>"+
                        "<span class='session-time'>"+sessionTime+"</span>"

                    }).then((result) => {
                        loaderIn();
                        window.location="/oval-fit/";
                    });
                }

                console.log(response);
            }
        });
    })
}


function cancelSpotBooking(authCode, bookingId, bikeNum, sessionName, sessionDate, sessionTime) {

    swal({
        imageUrl: '/wp-content/themes/richmondoval-new/images/basic/oval-fit-loading-dots.gif',
        imageWidth: 120,
        html: '<p>Please wait</p>',
        allowOutsideClick: false,
        showConfirmButton: false
        //timer:2000

    });
    jQuery(function($) {
        $.ajax({
            url: '/wp-content/themes/richmondoval-new/stages-api.php',
            type: 'post',
            data: {
                bookingId: bookingId,
                authCode: authCode
            },
            success: function (response) {
                if(response == '<h2>Your Booking has been canceled!</h2>') {
                    $("div[data-id='"+bookingId+"']").hide(200);
                    swal({
                        html: "<h2>Your reservation has been cancelled!</h2>"+
                            "<p>We hope to see you soon.</p>"+
                            "<img src='/wp-content/themes/richmondoval-new/images/stages/treadmill.svg'><br>"+
                            "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                            "<h4 class='session-name'>"+sessionName+"</h4>"+
                            "<span class='session-date'>"+sessionDate+"</span><br>"+
                            "<span class='session-time'>"+sessionTime+"</span>"

                    }).then((result) => {
                        loaderIn();
                        window.location="/oval-fit/";
                    });
                }

                console.log(response);
            }
        });
    })
}

jQuery(document).ready(function($) {

    //register button disable
    $('#ovalfit-registration').submit(function() {
        $(this).find('button').disable();
    });

    //Session/Bookings Tabs
    $(document).on('click', '.tablink', function(e){
        $(this).siblings().removeClass('active-tab');
        $(this).addClass('active-tab');
        var tabContentId = $(this).data('tab');
        $(this).parent().parent().find('.tabcontent').hide();
        $('#'+tabContentId).fadeIn(200);
    });
    $('.tablink.active-tab').click();


    $('.stats').click(function(){
        $(this).toggleClass('expanded');
    });

    //Daterange
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            showDropdowns: true,
            buttonClasses: 'btn regular orange',
            maxSpan: {
                "days": 7
            },
            locale: {
                format: 'MMMM D Y',
                //minYear: 2018,
                //maxYear:parseInt(moment().add('years', 1).format('YYYY'),1),
            },


        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

        }).on('apply.daterangepicker', function(ev, picker) {
            loaderIn();
            var start = picker.startDate;
            var end = picker.endDate;
            if(start.format('YYYY-MM-DD') === end.format('YYYY-MM-DD')) {
                console.log("equal");
                end = end.add(1, 'days');
            }
            console.log(start.format('YYYY-MM-DD'));
            console.log(end.format('YYYY-MM-DD'));

            $('input.dateFrom').val(start.format('YYYY-MM-DD'));
            $('input.dateTo').val(end.format('YYYY-MM-DD'));
            document.getElementById('changeDates').submit();
        })
    });

    //Birthdate
    $(function() {
        $('input[name="birthdate"]').daterangepicker({
            opens: 'center',
            buttonClasses: 'btn regular orange',
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: 2008,
            autoUpdateInput: false,
            locale: {
                format: 'MMMM D Y',
            },

        });
        $('input[name="birthdate"]').on('apply.daterangepicker', function(ev, picker) {
            console.log(picker);
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
    });


    // Smart Tab
    if($(window).width() > 768 ) {
        $('#ovalfit-tabs').smartTab({
            selected: 0,
            saveState:false,
            autoProgress: false,
            startOnFocus: true,
            progressInterval: 2000,
            transitionEffect: 'fade',
            transitionSpeed: 1000,
        });
    } else {
        $('#ovalfit-tabs').smartTab({
            selected: 0,
            saveState:false,
            autoProgress: true,
            progressInterval: 2000,
            transitionEffect: 'fade',
            transitionSpeed: 1000,
        });
    }


    // FAQ's
    $(document).on('click','.ovalfit-faq-trigger', function(e){

        $(this).parentsUntil('.row').next().find('.ovalfit-faqs').fadeIn(200);
        $(this).parentsUntil('.row').next().find('.bike-schedule').hide();
        //if($('body').width() < 1025) $('body').css('overflow', 'hidden');
    });

    $(document).on('click','.ovalfit-faqs .ovalfit-qa a',function(e){
        var qaContent = $(this).parent().html();
        $('.ovalfit-qa-single').html('').hide();
        $('.ovalfit-qa-single').html(qaContent).slideDown(200);
    });

    $(document).on('click','.ovalfit-faqs .close', function(e){
        console.log($(this).parentsUntil('.row').prev());
        $(this).parentsUntil('.row').find('.ovalfit-faqs').hide();
        $(this).parentsUntil('.row').find('.bike-schedule').fadeIn(200);
        //if($('body').width() < 1025) $('body').css('overflow', 'auto');
    });


    // MY Account
    $(document).on('click','a.my-account', function(e){
        e.stopPropagation();
        $(this).toggleClass('active');
        $('.account-menu').slideToggle(200).addClass('open');
    });
    $(document).on('click','body', function(e){
        $('.account-menu.open').slideUp(200);
        $('a.my-account').removeClass('active');
    });

    $('.account-menu .redirect').hover(function(e){
        $('.account-menu.open span.redirect-info').slideToggle(100);
    });



    //Add to home screen
    if ('serviceWorker' in navigator) {
        console.log("Will the service worker register?");
        navigator.serviceWorker.register('/service-worker.js')
            .then(function(reg){
                console.log("Yes, it did.");
            }).catch(function(err) {
            console.log("No it didn't. This happened:", err)
        });
    } else {
        console.log(navigator);
    }


    let deferredPrompt;

    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;

        // btnAdd.style.display = 'block';
        //console.log(e);

    });

    // Detects if device is on iOS
    const isIos = () => {
        const userAgent = window.navigator.userAgent.toLowerCase();
        return /iphone|ipad|ipod/.test( userAgent );
    };
    // Detects if device is in standalone mode
    const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);

    // Checks if should display install popup notification:
    if (isIos() && !isInStandaloneMode()) {

        $(function() {
            $('.profile-opt').css('margin-bottom', '110px');
            $('#add-to-homescreen-ios-popup').animate({'bottom': '25px'}, 1000);
            $('.popup-close-icon').on('click', function(){
                $('#add-to-homescreen-ios-popup').animate({'bottom': '-500px'}, 500, function() {
                    $(this).remove();
                });
            });
        });
    }


    //Side menu clicks
    $(document).on('click', '.ovalfit-side-menu .side-menu-items a:not(.schedules-submenu-trigger):not(.logout-menu-item):not(.profile-menu-item)', function(e){
        $('.ovalfit-side-menu .side-menu-items a').removeClass('active');
        $(this).addClass('active');
        var sectionId = $(this).attr('data-go');
        $('.ovalfit-main > div').hide();
        $('.ovalfit-main > div#'+sectionId).fadeIn(300);

        $('.ovalfit-side-menu').removeClass('active');
        $('body').removeClass('ovalfit-side-menu-open');

    });

    $(document).on('click', '.banner.ride-banner, .switcher .ride-switch', function(e){
        $('.ovalfit-side-menu .side-menu-items a.ride-menu-item').click();
    });

    $(document).on('click', '.banner.athletic-banner, .switcher .ath-switch', function(e){
        $('.ovalfit-side-menu .side-menu-items a.athletic-menu-item').click();
    });

    $(document).on('mouseenter', '.ovalfit-side-menu .side-menu-items a.profile-menu-item', function(e){
        $('.ovalfit-wrapper .ovalfit-side-menu .side-menu-info').fadeIn(300);
    });
    $(document).on('mouseleave', '.ovalfit-side-menu .side-menu-items a.profile-menu-item', function(e){
        $('.ovalfit-wrapper .ovalfit-side-menu .side-menu-info').fadeOut(100);
    });

    $(document).on('click', '.ovalfit-side-menu .schedules-submenu-trigger', function(e){

        $(this).next('.schedules-submenu').slideToggle(200);
    });


    //Burger
    $(document).on('click', '.ovalfit-mobile-header .menu-burger', function(e){
        $('.ovalfit-side-menu').addClass('active');
        $('body').addClass('ovalfit-side-menu-open');
    });
    $(document).on('click', 'body.ovalfit-side-menu-open .ovalfit-side-menu-overlay', function(e){
        $('.ovalfit-side-menu').removeClass('active');
        $('body').removeClass('ovalfit-side-menu-open');
    });

    //Dashboard Tabs
    $(document).on('click', '.dashboard-tabs > div', function(e){
        $('.dashboard-tabs > div').removeClass('active');
        $(this).addClass('active');
        var sectionId = $(this).attr('data-go');
        $('.stats-tab').hide();
        $('.stats-tab#'+sectionId).fadeIn(100);
    });







    /* btnAdd.addEventListener('click', (e) => {
         // hide our user interface that shows our A2HS button
         btnAdd.style.display = 'none';
         // Show the prompt
         deferredPrompt.prompt();
         // Wait for the user to respond to the prompt
         deferredPrompt.userChoice
             .then((choiceResult) => {
                 if (choiceResult.outcome === 'accepted') {
                     console.log('User accepted the A2HS prompt');
                 } else {
                     console.log('User dismissed the A2HS prompt');
                 }
                 deferredPrompt = null;
             });
     });*/



});