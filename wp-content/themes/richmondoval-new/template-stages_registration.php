<?php
/**
 * Template Name: Oval Fit Registration
 */

require "stages-api.php";


get_header();

$message = '';
$color = '#ccc';
$userReg = false;

if(isset($_POST['submitted-reg']) && $_POST['submitted-reg'] != NULL)
{

	$userReg = RegisterUser();


	if($userReg === true)
	{
        $message = NULL;
        //$color = '#85c440';
	}
	elseif($userReg === "User exists in ovalfit") {
		$message = 'Error! User already exists in Oval Fit database!';
		$color = 'darkred';

	}elseif($userReg === "User exists in stages"){
		$message = 'Error! User already exists in Stages database!';
		$color = 'darkred';
    }else {
		$message = 'Error! Something went wrong, please check your info and try again.<br>';
		if(isset($userReg->ModelState)) {
            $message .= '<ul class="reg-errors">';
			if(isset($userReg->ModelState->{'user.Password'}[0])) $message .= "<li>".$userReg->ModelState->{'user.Password'}[0]."</li>";
			if(isset($userReg->ModelState->{'User.Email'}[0])) $message .= "<li>".$userReg->ModelState->{'User.Email'}[0]."</li>";
			if(isset($userReg->ModelState->{'user.Phone'}[0])) $message .= "<li>".$userReg->ModelState->{'user.Phone'}[0]."</li>";
			$message .= '</ul>';
		    //var_dump($userReg);
			//json_encode($userReg);
		    //$message .= json_encode($userReg->ModelState);
        }
		/*echo "<pre style='color: #FF0000'>";
		print_r($userReg);
		echo "</pre>";*/
		$color = 'darkred';
		?>
        <script>console.log(<?=json_encode($userReg);?>);</script>
        <?php
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
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div style="background: <?=$color;?>; color: #fff; padding: 15px;"><?=$message;?></div>
                    </div>
                </div>
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

                <div class="row">
                    <div class="col-md-offset-3 col-md-6">

                        <?php
                        if($userReg === true) {
                        ?>

                        <h3 style="text-align: center; color: #fff">YOUR PROFILE HAS BEEN CREATED</h3>
                        <p style="text-align: center;">Sign up to classes and begin tracking your performance</p>

                        <p style="text-align: center; margin-bottom: 0;">
                            <a href="/oval-fit-login"  class="btn" name='letsride'>LET'S RIDE</a>
                        </p>

                        <?php } else { ?>

                        <div class="title">
                            <br>
                            <br>
                            <h3 style="text-align: center; color: #fff">REGISTER</h3>

                        </div>

                        <form id='ovalfit-registration' action='' method='post' accept-charset='UTF-8'>

                            <fieldset>

                                <p>Hi, setting up your profile is simple. We’ll need your info for you to see your metrics and track your performance.</p>
                                <input type='hidden' name='submitted-reg' id='submitted' value='1'/>


                                <input type='text' name='firstname' id='firstname' required maxlength="50" placeholder="First Name"/>

                                <input type='text' name='lastname' id='lastname' required maxlength="50"  placeholder="Last Name"/>

                                <input type='email' name='email' id='email' required maxlength="50" autocomplete="off" placeholder="Email"/>

                                <input type='text' name='phone' id='phone' required maxlength="50" autocomplete="off" placeholder="Phone"/>

                                <input type="text" class="birthdate" name="birthdate" value="" required readonly="true" placeholder="Date of birth"/>

                                <input type="number" class="weight" id="weight" name="weight" min="30" required placeholder="Weight(Kg)"/>

                                <select name="gender" required>
                                    <option value="" selected disabled>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                <input type='password' name='password' id='password' pattern=".{8,}" required maxlength="50" autocomplete="off" placeholder="Password"/>
                                <p style="text-align: center; font-size: 12px;">minimum 8 characters long, must contain letters and digits</p>

                                <p style="text-align: center; margin-bottom: 0;">
                                    <button type='submit' class="btn" name='Register'>Register</button>
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

                        <div style="text-align: center; margin-top: 0;">
                            <p>Already have an account? <a href="/oval-fit-login">Sign In</p></a>
                        </div>

                        <?php } ?>
                    </div>
                </div>


            <?php }
            ?>



		</div>
	</div>
<?php

get_footer();