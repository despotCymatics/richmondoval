
<?php
require "stages-api.php";

$userId = isset($_POST['userId']) ? $_POST['userId'] : NULL;
$sessionId = isset($_POST['sessionId']) ? $_POST['sessionId'] : NULL;
$sessionName = isset($_POST['sessionName']) ? $_POST['sessionName'] : NULL;
$sessionDate = isset($_POST['sessionDate']) ? $_POST['sessionDate'] : NULL;
$sessionTime = isset($_POST['sessionTime']) ? $_POST['sessionTime'] : NULL;
$sessionInstructorId = isset($_POST['instructorId']) ? $_POST['instructorId'] : NULL;

if($authCode && $sessionId && $sessionInstructorId ){
	$sessionBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions/' . $sessionId . '/bookings' );
	$instructor = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/instructors/' . $sessionInstructorId );
	$bikes = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/bikes' );
}

if(isset($instructor->Id) && count($bikes) >= 1) {
	$returnHTML = '
	<div class="row">
		<div class="col-md-6">
	
			<p>Instructor: <br>
				<strong>'.$instructor->FirstName.' '. $instructor->LastName.'</strong>
			</p>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet velit non dolor finibus euismod aliquam eget metus. Nullam facilisis nisi eget lacus consequat, venenatis lacinia tellus ullamcorper. Mauris vitae enim urna. Curabitur gravida, sem in cursus luctus, nulla sapien blandit nunc, sed efficitur diam mi id dui.
			</p>
	
		</div>
		<div class="col-md-6">
			<img src="/wp-content/themes/richmondoval-new/images/stages/fans.png">
			<div class="first-row">
				<div class="bike coach">
					<div class="bike-num" style="background-color: "></div>
					<span>Coach</span>
				</div>
				<div class="projector">
					<span>Screen</span>
				</div>
	
			</div>
			<div class="row seven-cols">';

		$bikesBooked = array();
		foreach ( $sessionBookings as $sessionBooking ) {
			array_push( $bikesBooked, $sessionBooking->Bike->Id );

		}

		foreach ( $bikes as $bike ) {
			$disabledBike = '';
			if ( in_array( $bike->Id, $bikesBooked ) ) {
				$disabledBike = 'disabled';
			}
			$returnHTML .='
			<div class="col-sm-1">
				<div class="bike '.$disabledBike.'">
					<div class="bike-num" 
					onclick="bookBike(
					\''.$authCode.'\',
					'.$userId.',
					'.$sessionId.',
					'.$bike->Id.', 
					'.$bike->Number.',
					\''.$sessionName.'\',
					\''.$sessionDate.'\',
					\''.$sessionTime.'\')">
						'.$bike->Number.'
					</div>
				</div>
			</div>
		';


		}

		$returnHTML .= '
			</div>
			<br>
			<img src="/wp-content/themes/richmondoval-new/images/stages/fans.png">
		</div>
	</div>
	';
}

else {
	$returnHTML = '<p>Could not fetch session data.</p>'.json_encode($sessionBookings)." ".json_encode($instructor);
}


echo $returnHTML;




