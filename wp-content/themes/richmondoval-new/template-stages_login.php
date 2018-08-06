<?php
/**
 * Template Name: Oval Fit Login
 */

require "stages-api.php";

session_start();

if(isset($_SESSION['logged'])) {

	header('Location: http://richmondoval.ca/oval-fit/');
	exit;

}else {

	get_header();

	?>
    <div class="within inner">
        <div class="content">
            <div class="title">
                <br>
                <img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
                <br>
                <br>
                <div class="ride-logo">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/RIDE_logo.svg">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form id='login' action='/oval-fit/' method='post' accept-charset='UTF-8'>
                        <fieldset>
                            <input type='hidden' name='submitted' id='submitted' value='1'/>

                            <input type='email' name='email' id='email' required maxlength="50" autocomplete="on" placeholder="Your Email"/>

                            <input type='password' name='password' id='password' required maxlength="50" placeholder="Your Password"/>

                            <p style="text-align: center">
                                <input type='submit' class="btn" name='Login' value='Sign In'/>
                            </p>

                        </fieldset>
                    </form>
                    <p style="color: darkred; text-align: center; margin-top: 15px;">
                        <strong>
	                        <?php
	                        if(isset($_GET['user']) && $_GET['user'] == 'none'){
		                        echo "User Does not exist!" ;
	                        }else if(isset($_GET['login']) && $_GET['login'] == 'false') {
		                        echo "Login failed! Username/Email does not match the password!" ;
                            }
	                        ?>
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
	<?php
}
get_footer();