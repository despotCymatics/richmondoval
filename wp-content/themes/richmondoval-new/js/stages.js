function bookBike(authCode, userId, sessionId, bikeId, bikeNum, sessionName, sessionDate, sessionTime) {

    swal({
        html: "<h2>Are you sure you want to book this bike?</h2>"+
        "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'><br><p class='bike-num'>#"+bikeNum+"</p>",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonText: 'Yes, book it',
        cancelButtonText: 'No, cancel'
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
                                html: "<h2>Your bike is reserved</h2>"+
                                "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'>"+
                                "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                                "<h4 class='session-name'>"+sessionName+"</h4>"+
                                "<span class='session-date'>"+sessionDate+"</span><br>"+
                                "<span class='session-time'>"+sessionTime+"</span>"+
                                response,
                                allowOutsideClick: false
                            }).then((result) => {
                                loaderIn()
                                window.location="http://richmondoval.ca/oval-fit/";
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
                        html: "<h2>Your Booking has been canceled!</h2>"+
                        "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'><br>"+
                        "<p class='bike-num'>#"+bikeNum+"</p><br>"+
                            "<h4 class='session-name'>"+sessionName+"</h4>"+
                            "<span class='session-date'>"+sessionDate+"</span><br>"+
                            "<span class='session-time'>"+sessionTime+"</span>"

                    }).then((result) => {
                        loaderIn()
                        window.location="http://richmondoval.ca/oval-fit/";
                    });
                }

                console.log(response);
            }
        });
    })
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
if(document.getElementById("sessionsTab")) document.getElementById("sessionsTab").click();


jQuery(document).ready(function($) {
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
            autoUpdateInput: false,
            locale: {
                format: 'MMMM D Y',
                //minYear: 2018,
                //maxYear:parseInt(moment().add('years', 1).format('YYYY'),1),
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




});