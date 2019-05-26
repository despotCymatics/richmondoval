
<?php

require "stages-api.php";

session_start();

$returnHTML ='';

if (!isset( $_SESSION['logged'] ))  {
	$returnHTML = '<p>Session Expired. Please Log in.</p><script>window.location="/oval-fit-logout"</script>';

} else {
	$userId = isset($_POST['userId']) ? $_POST['userId'] : NULL;
	$sessionId = isset($_POST['sessionId']) ? $_POST['sessionId'] : NULL;
	$sessionName = isset($_POST['sessionName']) ? $_POST['sessionName'] : NULL;
	$sessionDate = isset($_POST['sessionDate']) ? $_POST['sessionDate'] : NULL;
	$sessionTime = isset($_POST['sessionTime']) ? $_POST['sessionTime'] : NULL;
	$sessionInstructorId = isset($_POST['instructorId']) ? $_POST['instructorId'] : NULL;
	$bikes ='';


	$authCode = isset($_POST['authCode']) ? $_POST['authCode'] : NULL;

	if($authCode && $sessionId && $sessionInstructorId ) {
		$timeStart = time();
		$sessionBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions/' . $sessionId . '/bookings' );
		$timeDiffBookings = time() -$timeStart;

		$timeStart = time();
		$instructor = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/instructors/' . $sessionInstructorId );
		$timeDiffInstructor = time() -$timeStart;

		$bikes = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/bikes' );
		//$bikes = file_get_contents(dirname(__FILE__)."/stagesBikes.json");
		//$bikes = json_decode($bikes);

		//var_dump($bikes);

		if(isset($instructor->Id) && count($bikes) >= 1) {
			$returnHTML .= '
	<div class="row">
		<div class="col-lg-6">
			<p>Coach: <br>
				<strong>'.$instructor->FirstName.' '. $instructor->LastName.'</strong>
			</p>
			<a class="ovalfit-faq-trigger" href="javascript:void(0);">Know your ride</a>
		</div>
		<div class="col-lg-6">

			<!--FAQ\'s-->
            <div class="ovalfit-faqs" style="display: none;">
                <span class="close">X</span>
                <h3>KNOW YOUR RIDES</h3>
                <div class="ovalfit-qas">
                    <div class="ovalfit-qa">
                        <a href="javascript:void(0);">RIDE ELEVATION</a>
                        <p>This class will focus on strengthening muscular systems that power hill climbs. Legs, glutes and	core will be challenged with lower cadence, higher resistance drills. This class will improve your ability to crush shorter climbs and improve your endurance above threshold. You will be challenged with drills including:<br><br>
							Climbing Repeats<br>
							Seated and Standing Power<br>
							Hill attacks with pace pushes<br>
							Long climbs with elevation increases<br><br>
						
							Prepare yourself mentally and physically for a heart pumping, leg burning, sweat dripping kind
							of ride!
                        </p>
                    </div>
                    <div class="ovalfit-qa">
                        <a href="javascript:void(0);">RIDE ENDURE</a>
                        <p>This class will focus on accumulating plenty of time at high aerobic workloads. A great class to improve your aerobic endurance, speed and pedaling efficiency. Prepare yourself for higher speeds and faster recoveries! <br><br>
                        	Speed intervals<br>
	                        Long tempo flats <br>
	                        Threshold to V02 Max surges<br>
	                        Distance challenges<br><br>
                        
						This class will have you training like an athlete, conditioning your body to produce more oxygen for sustained efforts and improve your recovery time!
                        </p>
                    </div>
                    <div class="ovalfit-qa">
                        <a href="javascript:void(0);">RIDE REVOLUTION</a>
                        <p>The ultimate sampler class features a variety of challenging drills including: time trials, aerobic endurance, hill climbs and explosive max power intervals. You will train in all 7 intensity zones:<br><br>
                        
							Neuromuscular Power<br>
							Anaerobic Capacity<br>
							V02 Max<br>
							Threshold<br>
							Tempo<br>
							Endurance <br>
							Active Recovery<br>
							Prepare to sweat, smile and conquer the most comprehensive cardiovascular workout!<br>
                        </p>
                    </div>
                    
                    <div class="ovalfit-qa">
                        <a href="javascript:void(0);">RIDE FOUNDATIONS </a>
                        <p>A 50-minute class that introduces power-based cycling and the 7 intensity zones. This class is great for beginners that are new to Stages bikes or indoor cycling. RIDE Foundations will cover: <br>
                        
							Bike set-up and fit <br>
							Technique and form<br>
							Console data<br>
							Sprint shift lever<br>
							Power meter<br>
							7 intensity zones<br>
							Gauge data and target percentages<br><br>

An educational, challenging workout that will leave you wanting more! 
                        </p>
                    </div>
                </div>
                <div class="ovalfit-qa-single"></div>
                <script>
                $(".ovalfit-faqs .ovalfit-qa:first-child > a").click();
                </script>
            </div>

			<div class="bike-schedule ath">
				<img src="/wp-content/themes/richmondoval-new/images/stages/tv.png">
				<div class="row">';

			$bikesBooked = array();
			foreach ( $sessionBookings as $sessionBooking ) {
				array_push( $bikesBooked, $sessionBooking->Bike->Id );
			}


			if(count($bikes) > 1) {
				$bikeCounter = 1;
				foreach ( $bikes as $bike ) {
					$disabledBike = '';
					if ( in_array( $bike->Id, $bikesBooked ) ) {
						$disabledBike = 'disabled';
					}

					if($bikeCounter === 1 || $bikeCounter === 12) $returnHTML .='<div class="ath-col col-xs-1-8">';

					if ($bikeCounter <= 5 || $bikeCounter >= 12)
					$returnHTML .='
                            <div class="bike '.$disabledBike.'">
                                <div class="bike-num" 
                                onclick="bookSpot(
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
                        ';

					if ($bikeCounter === 5 || $bikeCounter === 16) $returnHTML .='</div>';

					if($bikeCounter>5 && $bikeCounter < 12)
						$returnHTML .='

						<div class="col-xs-1-8">
                            <div class="bike '.$disabledBike.'">
                                <div class="bike-num" 
                                onclick="bookSpot(
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
					$bikeCounter++;
				}
			} else {
				$returnHTML .= 'Could not fetch. Please reload the page.';
			}
			$returnHTML .= '
				</div>
			
				<br>
			
			</div>
		</div>
	</div>
	';

		} else {

			$returnHTML = "<p>Could not fetch session data. Please reload the page.</p>";
			$logFile = dirname(dirname(__FILE__))."../../stagesAPILog-sessions.txt";
			$current = file_get_contents($logFile);
			$contents = "\r\n".date('Y-m-d H:m:s')." USER: ".$userId."-------------------------------------------------------------------------\r\n";
			$contents .= "SessionBookings: ".json_encode($sessionBookings)." Time(sec): ".$timeDiffBookings. "\r\n------ Bikes: ".json_encode($bikes)."\r\n ----- Instructor: ".json_encode($instructor)." Time(sec): ".$timeDiffInstructor;
			file_put_contents($logFile, $contents.PHP_EOL , FILE_APPEND | LOCK_EX);

		}

	} else {
		$returnHTML = '<p>Wrong Data passed. Please reload the page</p>';
	}
}


echo $returnHTML;