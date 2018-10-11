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
                <a title="Oval Fit" href="/oval-fit/">
                    <img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
                </a>
                <br>
                <br>
                <div class="ride-logo">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/RIDE_logo.svg">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">

                    <?php
	                    if(isset($_GET['lost-password']) && $_GET['lost-password'] == true){ ?>


                            <form id='lost-pass' action='' method='get' accept-charset='UTF-8'>
                                <fieldset>

                                    <p style="color:#D13200; text-align: center; margin-top: 15px;">
					                    <?php
					                    if(isset($_GET['user']) && $_GET['user'] == 'none'){
						                    echo "User does not exist in Stages database!" ;
					                    }
					                    ?>
                                    </p>

                                    <h3 style="text-align: center; color: #fff">RESET PASSWORD</h3>
                                    <p style="text-align: center;">Email address registered for Oval Fit</p>
                                    <input type='hidden' name='lost-password'  value='true'/>

                                    <input type='email' name='email' id='email' required maxlength="50" autocomplete="on" placeholder="Your Email"/>

                                    <p style="text-align: center; font-size: 12px;">You will receive an email with the password reset link.</p>

                                    <p style="text-align: center">
                                        <button type='submit' class="btn">Submit</button>
                                    </p>

                                </fieldset>
                            </form>


                    <?php }else { ?>
                            <form id='login' action='/oval-fit/' method='post' accept-charset='UTF-8'>

                                <?php if(isset($_GET['password-reset']) && $_GET['password-reset'] == true)  { ?>

                                    <p style="text-align: center; margin-bottom: 0;">Your password has been reset. <br>
                                        Email with the reset link has been sent to your email address.<br>
                                        Please check your email and spam/junk folder.
                                    </p>

                                <?php } ?>
                                <fieldset>
                                    <p style="color:#D13200; text-align: center; margin-top: 15px;">
					                    <?php
					                    if(isset($_GET['user']) && $_GET['user'] == 'none'){
						                    echo "User does not exist in Stages database!" ;
					                    }else if(isset($_GET['login']) && $_GET['login'] == 'false') {
						                    echo "Please login with correct Email and Password!" ;
					                    }
					                    ?>
                                    </p>

                                    <input type='hidden' name='submitted' id='submitted' value='1'/>

                                    <input type='email' name='email' id='email' required maxlength="50" autocomplete="on" placeholder="Your Email"/>

                                    <input type='password' name='password' id='password' required maxlength="50" placeholder="Your Password"/>

                                    <p style="text-align: center; margin-bottom: 0;">
                                        <button type='submit' class="btn">Sign In</button>
                                    </p>

                                </fieldset>
                            </form>
                            <div style="text-align: center">
                                <p>Forgot your password? <a href="/oval-fit-login/?lost-password=true">Click Here</a> </p>
                                <br>
                                <br>
                                <br>
                                <p>
                                    First time here?<br>
                                    <a href="/oval-fit-user-registration/">Create a profile</a>
                                </p>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
	<?php
}
get_footer();