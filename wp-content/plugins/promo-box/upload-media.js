/**
 * Created by despot on 29.04.15.
 */

jQuery(document).ready(function($) {
    jQuery(document).on("click", ".upload_image_button", function() {
       // console.log("aaa");
        jQuery.data(document.body, 'prevElement', $(this).prev());

        window.send_to_editor = function(html) {
            console.log(html);

            //var imgurl = jQuery('img').attr('src');
            var imgurl = jQuery("<div>"+html+"</div>").find('img').attr('src');

            var inputText = jQuery.data(document.body, 'prevElement');

            console.log(imgurl);

            if(inputText != undefined && inputText != '')
            {
                inputText.val(imgurl);
                //inputText.val("aaa");
            }

            tb_remove();
        };

        tb_show('', 'media-upload.php?type=image&TB_iframe=false');
        return false;
    });
});