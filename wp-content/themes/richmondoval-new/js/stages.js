function bookBike(authCode, userId, sessionId, bikeId) {

    swal({
        html: "<h2>Are you sure you want to book this bike?</h2>"+
        "<img src='/wp-content/themes/richmondoval-new/images/stages/bike-grey.svg'>",
        allowOutsideClick: false,
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, book it',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.value) {
            swal({
                imageUrl: '/wp-content/themes/richmondoval-new/images/basic/logo-animate.gif',
                imageWidth: 120,
                html: '<h2>Please wait</h2>',
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
                                response,
                                allowOutsideClick: false
                            }).then((result) => {
                                $('#loading-wrap').fadeIn(200);
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


function cancelBooking(authCode, bookingId) {
    swal({
        imageUrl: '/wp-content/themes/richmondoval-new/images/basic/logo-animate.gif',
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
                        type: 'info',
                        html: response
                    }).then((result) => {
                        $('#loading-wrap').fadeIn(200);
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
document.getElementById("sessionsTab").click();


jQuery(document).ready(function($) {
    $('.stats').click(function(){
        $(this).toggleClass('expanded');
    });

    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            locale: {
                cancelLabel: 'Cancel',
                format: 'MMMM D Y',
                minYear: 2018,
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        }).on('apply.daterangepicker', function(ev, picker) {
            $('#loading-wrap').fadeIn(200);
            $('input.dateFrom').val(picker.startDate.format('YYYY-MM-DD'));
            $('input.dateTo').val(picker.endDate.format('YYYY-MM-DD'));
            document.getElementById('changeDates').submit();
        })
    });


});