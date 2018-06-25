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
document.getElementById("defaultOpen").click();


jQuery(document).ready(function($) {

});