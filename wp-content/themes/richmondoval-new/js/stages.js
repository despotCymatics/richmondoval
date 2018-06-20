function bookBike(authCode, userId, sessionId, bikeId) {
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
                userId: userId,
                sessionId: sessionId,
                bikeId: bikeId,
                authCode: authCode
            },
            success: function (response) {
                swal({
                    type: 'info',
                    html: response
                });
                if(response) {

                }
                console.log(response);
            }
        });
    })
}


jQuery(document).ready(function($) {

});