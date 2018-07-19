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
                <!--<img width="320px" class="stages-logo"
                     src="/wp-content/uploads/2018/07/oval-fit-logo-black.png">-->
                <br>
                <h3 style="text-align: center">Oval Fit Login</h3>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form id='login' action='/oval-fit/' method='post' accept-charset='UTF-8'>
                        <fieldset>
                            <legend>Login</legend>
                            <input type='hidden' name='submitted' id='submitted' value='1'/>

                            <label for='email'>Email*:</label>
                            <input type='email' name='email' id='email' required maxlength="50"/>

                            <label for='password'>Password*:</label>
                            <input type='password' name='password' id='password' maxlength="50"/>

                            <p style="text-align: center">
                                <input type='submit' name='Submit' value='Submit'/>
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
        </div>
    </div>
	<?php
}
get_footer();