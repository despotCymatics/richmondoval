<?php
/**
 * Template Name: Oval Fit Registration
 */

require "stages-api.php";


get_header();

$message = '';
$color = '#ccc';

if(isset($_POST['submitted-reg']) && $_POST['submitted-reg'] != NULL)
{
	if(RegisterUser())
	{
        $message = 'User has been registered successfully! <a href="/oval-fit-login/">Sign In</a>';
        $color = '#85c440';
	}
	else {
		$message = 'Error! User already exists in Oval Fit database!';
		$color = 'darkred';
    }
}

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

            <?php
            if($message) { ?>
                <p style="background: <?=$color;?>; color: #fff; padding: 15px;"><?=$message;?></p>
            <?php
            }


            if(isset($_GET['new-password-user'])) {

                $username = $_GET['new-password-user'];

                ?>

                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="title">
                            <br>
                            <!--<img width="320px" class="stages-logo"
								 src="/wp-content/uploads/2018/07/oval-fit-logo-black.png">-->
                            <br>
                            <h3 style="text-align: center; color: #fff">NEW PASSWORD</h3>
                            <p style="text-align: center"><?=$username;?></p>

                        </div>

                        <form id='ovalfit-registration' action='' method='post' accept-charset='UTF-8'>
                            <fieldset>
                                <input type='hidden' name='submitted-new-password' id='submitted' value='1'/>

                                <input type='hidden' name='email' id='email' autocomplete="off" value="<?=$username;?>" placeholder="User Email"/>

                                <input type='password' name='new-password' id='password' pattern=".{8,}" required maxlength="50" autocomplete="off" placeholder="New Password"/>
                                <p style="text-align: center; font-size: 12px;">minimum 8 characters long</p>

                                <p style="text-align: center; margin-bottom: 0;">
                                    <button type='submit' class="btn">Submit</button>
                                </p>

                            </fieldset>
                        </form>
                        <p style="color: darkred; text-align: center; margin-top: 15px;">
                            <strong>
					            <?php
					            if(isset($_GET['user']) && $_GET['user'] == 'none'){
						            echo "User Does not exist!" ;
					            }
					            ?>
                            </strong>
                        </p>

                    </div>
                </div>



            <?php
            }else { ?>

                <iframe src="https://stagesflight.com/Account/Register" width="100%" height="1300px" frameborder="0"></iframe>


                <div class="row">
                    <div class="col-md-offset-3 col-md-6">

                        <div class="title">
                            <br>
                            <!--<img width="320px" class="stages-logo"
								 src="/wp-content/uploads/2018/07/oval-fit-logo-black.png">-->
                            <br>
                            <h3 style="text-align: center; color: #fff">OVAL FIT REGISTER</h3>
                        </div>

                        <form id='ovalfit-registration' action='' method='post' accept-charset='UTF-8'>
                            <fieldset>
                                <input type='hidden' name='submitted-reg' id='submitted' value='1'/>

                                <input type='email' name='email' id='email' required maxlength="50" autocomplete="off" placeholder="User Email"/>

                                <input type='password' name='password' id='password' pattern=".{8,}" required maxlength="50" autocomplete="off" placeholder="User Password"/>
                                <p style="text-align: center; font-size: 12px;">minimum 8 characters long</p>

                                <p style="text-align: center">
                                    <input type='submit' class="btn" name='Register' value='Register'/>
                                </p>

                            </fieldset>
                        </form>
                        <p style="color: darkred; text-align: center; margin-top: 15px;">
                            <strong>
					            <?php
					            if(isset($_GET['user']) && $_GET['user'] == 'none'){
						            echo "User Does not exist!" ;
					            }
					            ?>
                            </strong>
                        </p>

                        <div style="text-align: center;">
                            <p>Already have an account? <a href="/oval-fit-login">Sign In</p></a>
                        </div>
                    </div>
                </div>


            <?php }
            ?>



		</div>
	</div>
<?php

get_footer();