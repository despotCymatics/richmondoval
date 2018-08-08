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
        $message = 'User has been registered successfully!';
        $color = '#85c440';
	}
	else {
		$message = 'Error! User already exists in database!';
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
            ?>

			<iframe src="https://stagesflight.com/Account/Register" width="100%" height="1300px" frameborder="0"></iframe>

			<div class="title">
				<br>
				<!--<img width="320px" class="stages-logo"
					 src="/wp-content/uploads/2018/07/oval-fit-logo-black.png">-->
				<br>
				<h3 style="text-align: center">Oval Fit User Registration</h3>
			</div>

			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<form id='ovalfit-registration' action='' method='post' accept-charset='UTF-8'>
						<fieldset>
							<input type='hidden' name='submitted-reg' id='submitted' value='1'/>

							<input type='email' name='email' id='email' required maxlength="50" autocomplete="off" placeholder="User Email"/>

							<input type='password' name='password' id='password' pattern=".{8,}" required maxlength="50" autocomplete="off" placeholder="User Password"/>

							<p style="text-align: center">
								<input type='submit' name='Register' value='Register'/>
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
                        <a href="/oval-fit-login">User Login</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
<?php

get_footer();