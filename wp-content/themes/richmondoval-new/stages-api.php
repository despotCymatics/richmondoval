<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);


//BOOK A BIKE FOR SESSION
if(isset($_POST['userId']) && isset($_POST['sessionId']) && isset($_POST['bikeId'])) {

	$authCode = authorize();

	$userId = $_POST['userId'];
	$sessionId = $_POST['sessionId'];
	$bikeId = $_POST['bikeId'];
	//$authCode = $_POST['authCode'];

	$postFields = json_encode(Array( 'UserId' => intval($userId), 'SessionId' => intval($sessionId), 'BikeId' => intval($bikeId)));

	$booking = postCurl($authCode, 'https://stagesflight.com/locapi/v1/bookings', $postFields);

	//var_dump($booking);
	//var_dump($booking->ModelState->{'booking.SessionId'});

	if(isset($booking->Message)) {
		if(isset($booking->ModelState->{'booking.UserId'}[0])) echo "<p>".$booking->ModelState->{'booking.UserId'}[0]."</p>";
		if(isset($booking->ModelState->{'booking.SessionId'}[0])) echo "<p>".$booking->ModelState->{'booking.SessionId'}[0]."</p>";
	}else if(isset($booking->Id)) {
		echo "<p>Thank You for Booking with OvalFit!</p>";
        wp_mail('despot.cymatics@gmail.com', 'Ride Session Booked','booked bike#: '.$bikeId);
	}else  {
		echo "<h2>Error!</h2>";
	}
}

//CANCEL BOOKING
if(isset($_POST['bookingId'])) {

	$authCode = authorize();

	$bookingId = $_POST['bookingId'];

	//$authCode = $_POST['authCode'];

	//$postFields = json_encode(Array( 'UserId' => intval($userId), 'SessionId' => intval($sessionId), 'BikeId' => intval($bikeId)));

	$booking = deleteCurl($authCode, 'https://stagesflight.com/locapi/v1/bookings/'.$bookingId);

	//var_dump('https://stagesflight.com/locapi/v1/bookings/'.$bookingId);
	//var_dump($booking->ModelState->{'booking.UserId'});
	//var_dump($booking);

	if($booking) {
		echo "<h2>Your Booking has been canceled!</h2>";
	}else  {
		echo "<h2>Error! Something went wrong!</h2>";
	}

}

//FORGOT PASSWORD
if(isset($_GET['lost-password']) && isset($_GET['email'])) {
	$username = $_GET['email'];
	forgotPassword($username);
}

//SET NEW PASSWORD
if(isset($_POST['new-password']) && isset($_POST['email'])) {
	$username = $_POST['email'];
	$password = $_POST['new-password'];
	setPassword($username, $password);
}

//AUTHORIZATION
function authorize() {

	$credentials = '{
	"ClientId":"RichmondOval",
	"ClientSecret":"QjE0OEUyN0YtRjEzMS00RUNCLUIzMDEtMzA3QjdGODA2NUM1"
	}';
	$url = 'https://stagesflight.com/locapi/v1/auth/1400' ;


	$header = array(
		'Accept: application/json',
		'Content-Type: application/json',
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            $url );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,    $credentials );
	curl_setopt($ch, CURLOPT_HTTPHEADER,    $header);

	$authCode = curl_exec($ch);
	$authCode = json_decode($authCode);

	return $authCode;

}


//GET CURL
function getCurl($authCode, $url) {

	$header = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Authorization: Bearer '.$authCode
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER,    $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	return json_decode(curl_exec($ch));
}

//POST CURL
function postCurl($authCode, $url, $request) {

	$header = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Authorization: Bearer '.$authCode
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER,    $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,    $request );

	return json_decode(curl_exec($ch));
}


//DELETE CURL
function deleteCurl($authCode, $url) {

	$header = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Authorization: Bearer '.$authCode
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER,    $header);
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	//curl_setopt($ch, CURLOPT_POSTFIELDS,    $request );

	return json_decode(curl_exec($ch));
}


//DB
$connection = '';

function DBLogin()
{

	$connection = new mysqli('localhost','richmond','kgVpeKz1cG!@Zm15$L%z', 'richmondoval');
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	return $connection;
}


function InsertIntoDB($formvars) {

	$insert_query = 'insert into ovalfit_user(
                email,
                password
                )
                values
                (
                "' . SanitizeForSQL($formvars['email']) . '",
                "' . md5($formvars['password']) . '"
                )';

	$connection = DBLogin();

	if(!$connection->query($insert_query))
	{
		echo "Error: " . $insert_query . "<br>" . $connection->error;
		return false;
	}
	return true;
}

function RegisterUser() {

	if(!isset($_POST['submitted-reg']))
	{
		return false;
	}

	$formvars = array();

	/*if(!$this->ValidateRegistrationSubmission())
	{
		return false;
	}*/


	$formvars['email'] = Sanitize($_POST['email']);
	$formvars['firstname'] = Sanitize($_POST['firstname']);
	$formvars['lastname'] = Sanitize($_POST['lastname']);
	$formvars['birthdate'] = Sanitize($_POST['birthdate']);
	$formvars['phone'] = Sanitize($_POST['phone']);
	$formvars['weight'] = Sanitize($_POST['weight']);
	$formvars['gender'] = Sanitize($_POST['gender']);
	$formvars['password'] = Sanitize($_POST['password']);


	$postFields = json_encode(Array(
		'FirstName' => $formvars['firstname'],
		'LastName' => $formvars['lastname'],
		'Phone' => $formvars['phone'],
		'Email' => $formvars['email'],
		'DateOfBirth' => $formvars['birthdate']."T00:00:00Z",
		'WeightKg' => round($formvars['weight']*0.454, 0),
		'Gender' => $formvars['gender'],
		'Password' => $formvars['password']
	));

	$authCode = authorize();

	$booking = postCurl($authCode, 'https://stagesflight.com/locapi/v1/users', $postFields);

	$ret = "API Error!";

	if($booking){

		if(isset($booking->Id)) {
			$ret = true;

			if(!CheckIfUserExists($formvars['email'])) {
				if(!InsertIntoDB($formvars)) {
					$ret = false;
				}else {
					SendUserConfirmationEmail($formvars);
					//SendAdminIntimationEmail($formvars);
				}
			}
			else {
				$ret =  "User exists in ovalfit";
			}
		} else $ret = $booking;
	}

	return $ret;
}

function login() {

	if(empty($_POST['email']))
	{
		//$this->HandleError("UserName is empty!");
		return false;
	}

	if(empty($_POST['password']))
	{
		//$this->HandleError("Password is empty!");
		return false;
	}

	$username = trim($_POST['email']);
	$password = trim($_POST['password']);

	if(!CheckLoginInDB($username,$password))
	{
		return false;
	}

	//session_start();

	$_SESSION['logged'] = $username;

	return true;
}

function forgotPassword($username) {

	if(CheckIfUserExists($username)) {

		$connection = DBLogin();

		$username = SanitizeForSQL($username);

		$qry = "update ovalfit_user set password=null where email='$username'";

		$result = $connection->query($qry);

		if(!$result)
		{
			echo "Password reset error";
			exit;

		}else {

			$to = $username;

			$subject = "Forgot Password";

			$txt = "Hi there, \r\n<br>\r\n<br>".
					"You recently submitted a password reset request to the OVALfit team. \r\n<br>".
			       "To reset your password, just click on the link! \r\n<br>\r\n<br>".
			       "<a href='https://richmondoval.ca/oval-fit-user-registration/?new-password-user=$username'>Reset your password for $username</a>\r\n<br>".
			       "\r\n<br>".
			       "\r\n<br>".
			       "Thank You,\r\n<br>".
			       "OVALfit Team \r\n<br>".
					"<img width='120px;' style='margin-top: 10px;' src='https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/oval-fit-logo-black.png'> \r\n";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: OVALfit <no-reply@richmondoval.ca>' . "\r\n";
			//$headers .= 'Bcc: despot.cymatics@gmail.com' . "\r\n";

			if(wp_mail($to,$subject,$txt,$headers)){

				header('Location: /oval-fit-login/?password-reset=true');

			}else {
				echo "Error sending email! Please try again.";
			}
		}
		return true;

	}else {
		return "no-user";
	}
}

function setPassword($username, $password) {
	if(CheckIfUserExists($username)) {

		$connection = DBLogin();

		$username = SanitizeForSQL($username);

		$password = md5($password);

		$qry = "update ovalfit_user set password='$password' where email='$username'";

		$result = $connection->query($qry);

		if(!$result)
		{
			echo "Password set error";
			exit;

		}else {

			$to = $username;

			$subject = "Password Reset";

			$txt = "The password for your OVALfit account - ".$username."  - has been successfully changed. ".
			       "\r\n<br>".
			       "\r\n<br>".
			       "Thank You,\r\n<br>".
			       "OVALfit Team \r\n<br>".
					"<img width='120px;'  style='margin-top: 10px;' src='https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/oval-fit-logo-black.png'> \r\n";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: OVALfit <no-reply@richmondoval.ca>' . "\r\n";
			//$headers .= 'Bcc: despot.cymatics@gmail.com' . "\r\n";

			wp_mail($to,$subject,$txt,$headers);

			header('Location: /oval-fit-login/');

		}
	}
}



function CheckLoginInDB($username,$password)
{

	$connection = DBLogin();

	$username = SanitizeForSQL($username);

	$pwdmd5 = md5($password);
	$qry = "Select email from ovalfit_user where email='$username' and password='$pwdmd5'";

	$result = $connection->query($qry);

	if(!$result || mysqli_num_rows($result) <= 0)
	{
		echo "Error logging in. The username or password does not match";
		return false;
	}


	return true;
}

function CheckIfUserExists($username) {

	$connection = DBLogin();

	$username = SanitizeForSQL($username);

	$qry = "Select email from ovalfit_user where email='$username'";

	$result = $connection->query($qry);

	if(!$result || mysqli_num_rows($result) <= 0) {
		return false;
	}

	return true;

}


//Sanitizer
function SanitizeForSQL($str) {
	$ret_str = addslashes( $str );
	return $ret_str;
}

/*
   Sanitize() function removes any potential threat from the
   data submitted. Prevents email injections or any other hacker attempts.
   if $remove_nl is true, newline chracters are removed from the input.
*/
function Sanitize($str,$remove_nl=true) {

	//$str = StripSlashes($str);

	if($remove_nl)
	{
		$injections = array('/(\n+)/i',
			'/(\r+)/i',
			'/(\t+)/i',
			'/(%0A+)/i',
			'/(%0D+)/i',
			'/(%08+)/i',
			'/(%09+)/i'
		);
		$str = preg_replace($injections,'',$str);
	}

	return $str;
}

/*function StripSlashes($str)
{
	if(get_magic_quotes_gpc())
	{
		$str = stripslashes($str);
	}
	return $str;
}*/


//Mail
function SendUserConfirmationEmail($formvars) {

	$to = $formvars['email'];

	$subject = "Your registration with OVALFit";

	$txt = "Thank you for your registration with OVALfit.\r\n<br>".
	       "You are now a part of a community that works harder together to achieve your fitness goals.\r\n<br>\r\n<br>".
	       "Please find the link below to login into your account:\r\n<br>\r\n<br>".
	       "<a href='https://richmondoval.ca/oval-fit-login/'>Oval Fit Login</a>\r\n<br>\r\n<br>".
	       "Username: ".$formvars['email']."\r\n<br>".
	       "Password: ".$formvars['password']."\r\n<br>".
	       "\r\n<br>".
	       "\r\n<br>".
	       "Lets ride,\r\n<br>".
	       "OVALfit Team \r\n<br>".
	       "<img width='120px;'  style='margin-top: 10px;' src='https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/oval-fit-logo-black.png'> \r\n";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Oval Fit <no-reply@richmondoval.ca>' . "\r\n";
	//$headers .= 'Bcc: despot.cymatics@gmail.com' . "\r\n";

	if(wp_mail($to,$subject,$txt,$headers)){
		return true;
	}else {
		return false;
	}

}