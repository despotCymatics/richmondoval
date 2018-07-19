<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
/**
 * Template Name: Oval Fit Page
 */

require "stages-api.php";

if(login() || isset($_SESSION['logged'])) {

    get_header();

    ?>

    <div class="within inner">
        <div class="content">
            <div class="title">
                <br>
                <img class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
                <br>
                <h5>Booking</h5>
            </div>

			<?php
			//Users
			//Users
			//$users = getCurl($authCode, 'http://stagesflight.com/locapi/v1/users');
			//$users = json_decode($users);
			//var_dump($users);


			//AUTHORIZE API
			//$authCode = authorize();
			if ( ! isset( $authCode->Message ) ) {

				$userEmail = $_SESSION['logged'];
				$userQuery = getCurl($authCode, 'http://stagesflight.com/locapi/v1/users?query='.$userEmail );

				if(count($userQuery) == 1) {
					$userId = $userQuery[0]->Id;
				}else {
					header('Location: http://richmondoval.ca/oval-fit-login/');
					exit;
				}

				//Bikes
				//$bikes = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/bikes' );

				//Sessions
				$today = date('Y-m-d');
				$toDate = strtotime ('+1 month');
				$toDate = date('Y-m-d', $toDate);
				$sessions = getCurl($authCode, 'http://stagesflight.com/locapi/v1/sessions?dateTimeFrom='.$today.'.&dateTimeTo='.$toDate );

				//USER
				$user = getCurl($authCode, 'http://stagesflight.com/locapi/v1/users/'.$userId);

				?>

                <h2>Welcome, <?=$user->FirstName." ".$user->LastName?></h2>
                <p><?=$user->Email;?> | <?=$user->Gender;?> | <?=$user->Weight;?>kg</p>
                <div class="row">
                    <div class="col-md-9">
                        <div class="tab-buttons">
                            <h4 class="tablink" onclick="openTab('bookings', this)" id="defaultOpen">
                                <img width="15px" src="<?= get_stylesheet_directory_uri() ?>/images/basic/check.svg"> Bookings</h4>
                            <h4 class="tablink" onclick="openTab('sessions', this)">
                                <img width="15px" src="<?= get_stylesheet_directory_uri() ?>/images/basic/bookmark.svg"> Sessions</h4>
                        </div>

						<?php
						//User Bookings
						$userBookings = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );

						if ( count( $userBookings ) > 0 ) { ?>
                            <div id="bookings" class="tabcontent">
                                <br>
                                <h3>Your Bookings</h3>
								<?php foreach ( $userBookings as $userBooking ) { ?>
                                    <h4 class="showMoreToggler">
										<?=$userBooking->Session->Name;?> on <?=$userBooking->Session->StartDateTime;?>
                                        <br>
                                        <span>Bike: <?=$userBooking->Bike->Number;?> | Row: <?=$userBooking->Bike->Row;?> | Column: <?=$userBooking->Bike->Column;?> </span>
                                    </h4>
                                    <div class="moreText">
                                        <button class="btn">Cancel Booking</button>
                                    </div>

									<?php
								}
								?>
                            </div>
							<?php
						}

						//User Sessions
						if ( count( $sessions ) > 0 ) { ?>
                            <div id="sessions" class="tabcontent">
                                <br>
                                <h3>Available Sessions</h3>
								<?php foreach ( $sessions as $session ) {
									$instructor = getCurl($authCode,'http://stagesflight.com/locapi/v1/instructors/'.$session->InstructorId);
									?>

                                    <h4 class="showMoreToggler">
                                        <span class="type" style="background: <?=$session->Type; ?>"></span>
										<?= $session->Name ?>
                                        <br>
                                        <span>Starts: <?=$session->StartDateTime; ?> | </span>
                                        <span>Duration: <?=$session->Duration; ?>min | </span>
                                        <span>Instructor: <?=$instructor->FirstName.' '.$instructor->LastName; ?></span>


                                    </h4>
                                    <div class="moreText">
                                        <div class="row">
											<?php

											$sessionBikes = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bikes' );

											/*$bikesBooked = array();
											foreach ( $sessionBookings as $sessionBooking ) {
												array_push($bikesBooked, $sessionBooking->Bike->Id);

											}*/
											if ( count( $sessionBikes ) > 0 ) {
												foreach ( $sessionBikes as $bike ) {
													/*$disabledBike = '';
													if(in_array($bike->Id, $bikesBooked)) $disabledBike = 'disabled';*/
													?>

                                                    <div class="col-sm-2">
                                                        <div class="bike <? //$disabledBike;?>">
                                                            <p>Bike#: <?= $bike->Number; ?></p>
															<?php
															$isPower = 'yes';
															if ( ! $bike->IsPower ) {
																$isPower = 'no';
															} ?>
                                                            <span class="is-power <?= $isPower ?>"></span>
                                                            <div class="bike-img">
                                                                <img width="60"
                                                                     src="<?= get_stylesheet_directory_uri() ?>/images/basic/bike.jpg">
                                                            </div>
                                                            <button
                                                                    onclick="bookBike('<?=$authCode;?>', <?=$userId;?>, <?=$session->Id;?>, <?=$bike->Id;?>)"
                                                                    class="btn">Book</button>
                                                        </div>

                                                    </div>

													<?php
												}
											}

											?>
                                        </div>
                                    </div>
									<?php
								}
								?>
                            </div>

							<?php
						} ?>
                    </div>
                    <div class="col-md-3">
                        <h4 class="stats-title"><img width="15px" src="<?= get_stylesheet_directory_uri() ?>/images/basic/stats.svg"> Your Stats</h4>
                        <div class="stats">
							<?php
							$durationInSeconds = 0;
							$distanceInKm = 0;
							$kiloCalories = 0;
							$avgWatt = 0;
							$avgSpeed = 0;
							$avgHR = 0;
							$maxSpeed = 0;
							$numWorkouts = 0;

							$workouts = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts' );
							foreach ( $workouts as $workout ) {
								$numWorkouts++;
								$durationInSeconds += $workout->DurationInSeconds;
								$distanceInKm += $workout->DistanceInKm;
								$kiloCalories += $workout->KiloCalories;
								$avgWatt += $workout->AvgWatt;
								$avgSpeed += $workout->AvgSpeed;
								$avgHR += $workout->AvgHeartRate;
								$maxSpeed = $workout->MaxSpeed;

							}
							?>
                            <p><span>Number of workouts: </span><span><?=$numWorkouts;?></span></p>
                            <p><span>Duration: </span><span><?=$durationInSeconds;?> sec</span></p>
                            <p><span>Distance: </span><span><?=$distanceInKm ;?> km</span></p>
                            <p><span>Kilo calories: </span><span><?=$kiloCalories;?></span></p>
                            <p><span>Avg Watt: </span><span><?=$avgWatt / $numWorkouts;?></span></p>
                            <p><span>Avg Speed: </span><span><?=$avgSpeed / $numWorkouts;?></span></p>
                            <p><span>Avg Heart Rate: </span><span><?=$avgHR / $numWorkouts;?></span></p>
                            <p><span>Max Speed: </span><span><?=$maxSpeed;?></span></p>

							<?php


							//var_dump($workouts);
							?>
                        </div>
                    </div>
                </div>
				<?php
			} else {

				echo "Error! API Offline or Invalid Credentials";
			}

			?>

        </div><!-- content -->
    </div><!-- within inner -->

<?php
} //login check
else {
    header('Location: http://richmondoval.ca/oval-fit-login/');
    exit;
}

get_footer();