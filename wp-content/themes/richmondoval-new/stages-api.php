<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

$authCode = authorize();

//BOOK A BIKE FOR SESSION
if(isset($_POST['userId']) && isset($_POST['sessionId']) && isset($_POST['bikeId'])) {
	$userId = $_POST['userId'];
	$sessionId = $_POST['sessionId'];
	$bikeId = $_POST['bikeId'];
	//$authCode = $_POST['authCode'];

	$postFields = json_encode(Array( 'UserId' => intval($userId), 'SessionId' => intval($sessionId), 'BikeId' => intval($bikeId)));

	$booking = postCurl($authCode, 'http://stagesflight.com/locapi/v1/bookings', $postFields);

	//var_dump($booking);
	//var_dump($booking->ModelState->{'booking.SessionId'});

	if(isset($booking->Message)) {
		if(isset($booking->ModelState->{'booking.UserId'}[0])) echo "<p>".$booking->ModelState->{'booking.UserId'}[0];
		if(isset($booking->ModelState->{'booking.SessionId'}[0])) echo "<p>".$booking->ModelState->{'booking.SessionId'}[0];
	}else if(isset($booking->Id)) {
		echo "<p>Thank You for booking!</p>";
	}else  {
		echo "<h4>Error!</h4>";
	}

}

//CANCEL BOOKING
if(isset($_POST['bookingId'])) {
	$bookingId = $_POST['bookingId'];

	//$authCode = $_POST['authCode'];

	//$postFields = json_encode(Array( 'UserId' => intval($userId), 'SessionId' => intval($sessionId), 'BikeId' => intval($bikeId)));

	$booking = deleteCurl($authCode, 'http://stagesflight.com/locapi/v1/bookings/'.$bookingId);

	//var_dump('http://stagesflight.com/locapi/v1/bookings/'.$bookingId);
	//var_dump($booking->ModelState->{'booking.UserId'});
	//var_dump($booking);

	if($booking) {
		echo "<p>Your Booking has been canceled!</p>";
	}else  {
		echo "<h4>Error! Something went wrong!</h4>";
	}

}


//AUTHORIZATION
function authorize() {

	$credentials = '{
	"ClientId":"RichmondOval",
	"ClientSecret":"QjE0OEUyN0YtRjEzMS00RUNCLUIzMDEtMzA3QjdGODA2NUM1"
	}';
	$url = 'http://stagesflight.com/locapi/v1/auth/1400' ;


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
	$formvars['password'] = Sanitize($_POST['password']);

	if(CheckIfUserExists($formvars['email'])) {
		return false;
	}

	if(!InsertIntoDB($formvars)){
		return false;
	}


	SendUserConfirmationEmail($formvars);

	//SendAdminIntimationEmail($formvars);

	return true;
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

	$subject = "Your registration with Oval Fit";

	$txt = "Thanks for your registration with Oval Fit.\r\n<br>".
	       "Please find the link below to login into your account:\r\n<br>".
	       "<a href='http://richmondoval.ca/oval-fit-login/'>Oval Fit Login</a>\r\n<br>".
	       "Username: ".$formvars['email']."\r\n<br>".
	       "Password: ".$formvars['password']."\r\n<br>".
	       "\r\n<br>".
	       "\r\n<br>".
	       "Regards,\r\n<br>".
	       "richmondoval.ca\r\n";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Oval Fit <no-reply@richmondoval.ca>' . "\r\n";
	$headers .= 'Cc: despot.cymatics@gmail.com' . "\r\n";

	if(wp_mail($to,$subject,$txt,$headers)){
		return true;
	}else {
		return false;
	}

}