function bookBike(authCode, userId, sessionId, bikeId) {
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
                console.log(response);
            }
        });
    })
}


jQuery(document).ready(function($) {

});