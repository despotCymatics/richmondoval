<?php
/**
 * Template Name: Oval Fit Page
 */

require "stages-api.php";

session_start();

if ( login() || isset( $_SESSION['logged'] ) ) {

	get_header();

	?>
    <div class="ovalfit-header">
        <div class="within inner">
            <div class="content">

            <?php
            //AUTHORIZE API
            //$authCode = authorize();
            if ( ! isset( $authCode->Message ) ) {

                $userEmail = $_SESSION['logged'];
                $userQuery = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users?query=' . $userEmail );

                if ( count( $userQuery ) == 1 ) {
                    $userId = $userQuery[0]->Id;
                } else {
                    session_destroy();
                    echo '<script>window.location="http://richmondoval.ca/oval-fit-login/?user=none"</script>';
                    //header('Location: http://richmondoval.ca/oval-fit-login/?user=none');
                    exit;
                }

                //Bikes
                $bikes = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/bikes' );

                //Sessions
                $today    = date( 'Y-m-d' );
                $toDate   = strtotime( '+1 month' );
                $toDate   = date( 'Y-m-d', $toDate );
                $sessions = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $today . '.&dateTimeTo=' . $toDate );

                //USER
                $user = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $userId );

                ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="title">
                            <img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
                        </div>
                        <p>Hi <?= $user->FirstName ?>, here's how you've been doing.</p>
                        <!--<p><?/*= $user->Email; */?> | <?/*= $user->Gender; */?> | <?/*= $user->Weight; */?>kg</p>-->
                    </div>
                    <div class="col-sm-3 alignRight">
                        <a class="logout" href="/oval-fit-logout/">Log Out</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="stats">
                            <?php
                            $durationInSeconds = 0;
                            $distanceInKm      = 0;
                            $kiloCalories      = 0;
                            $avgWatt           = 0;
                            $avgSpeed          = 0;
                            $avgHR             = 0;
                            $maxSpeed          = 0;
                            $numWorkouts       = 0;
                            $maxSpeedArray      = array();

                            $workouts = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts' );
                            foreach ( $workouts as $workout ) {

                                //var_dump($workout);
                                $numWorkouts ++;
                                $durationInSeconds += $workout->DurationInSeconds;
                                $distanceInKm      += $workout->DistanceInKm;
                                $kiloCalories      += $workout->KiloCalories;
                                $avgWatt           += $workout->AvgWatt;
                                $avgSpeed          += $workout->AvgSpeed;
                                $avgHR             += $workout->AvgHeartRate;
                                array_push($maxSpeedArray, $workout->MaxSpeed);

                            }
                            ?>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike.svg">
                                <span>
                                    <span class="num"><?= $numWorkouts; ?></span>
                                    <span>Number of workouts</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg">
                                <span>
                                    <span class="num"><?= round($durationInSeconds/60); ?> <span>min</span></span>
                                    <span>Total time</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/power.svg">
                                <span>
                                    <span class="num"><?= round($avgWatt / $numWorkouts) ; ?> <span>watt</span></span>
                                    <span>Power</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg">
                                <span>
                                    <span class="num"><?= $kiloCalories; ?></span>
                                    <span>Calories burned</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/distance.svg">
                                <span>
                                    <span class="num"><?= round($distanceInKm,2); ?> <span>km</span></span>
                                    <span>Total distance</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg">
                                <span>
                                    <span class="num"><?= $avgHR / $numWorkouts; ?></span>
                                    <span>Average heartrate</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                <span>
                                    <span class="num"><?= $avgSpeed / $numWorkouts; ?> <span>km/h</span></span>
                                    <span>Average speed</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                <span>
                                    <span class="num"><?= max($maxSpeedArray); ?> <span>km/h</span></span>
                                    <span>Max.speed</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="ovalfit-body">
            <div class="within inner">
                <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-buttons">
                            <h4 class="tablink" onclick="openTab('bookings', this)" id="defaultOpen">Bookings</h4>
                            <h4 class="tablink" onclick="openTab('sessions', this)">Sessions</h4>
                        </div>
                        <?php
                        //User Bookings
                        $userBookings = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' ); ?>
                        <div id="bookings" class="tabcontent">
                            <?php
                            if ( count( $userBookings ) > 0 ) { ?>
                                <?php foreach ( $userBookings as $userBooking ) { ?>
                                    <div class="bookings" data-id="<?= $userBooking->Id; ?>">
                                        <div class="showMoreToggler">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><?= $userBooking->Session->Name; ?></h4>
                                                    <span class="date"><?= date("D, M jS", strtotime($userBooking->Session->StartDateTime)); ?></span><br>

                                                    <span><?= date("g:ia", strtotime($userBooking->Session->StartDateTime)); ?>
                                                        - <?= date("g:ia", strtotime('+'.$userBooking->Session->Duration.' minutes',strtotime($userBooking->Session->StartDateTime))); ?></span>
                                                </div>
                                                <div class="col-sm-4 alignRight">
                                                    <button class="btn blue regular">Cancel Booking</button>
                                                    <h4 class="close-toggle">X Close</h4>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="moreText">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <br>
                                                    <p>Bike: <?=$userBooking->Bike->Number ?> | Row: <?=$userBooking->Bike->Row ?> | Column: <?=$userBooking->Bike->Column ?></p>
                                                </div>
                                                <div class="col-sm-4 alignRight">
                                                    <button class="btn blue regular cancel"
                                                       onclick="cancelBooking('<?= $authCode; ?>','<?= $userBooking->Id ?>')">
                                                        Cancel Booking
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <br>
                                <p>You have no bookings.</p>
                            <?php } ?>
                        </div>

                        <?php
                        //User Sessions
                        if ( count( $sessions ) > 0 ) { ?>
                            <div id="sessions" class="tabcontent">
                                <?php foreach ( $sessions as $session ) {
                                    //var_dump($session);
                                    $instructor = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/instructors/' . $session->InstructorId );
                                    ?>
                                    <div class="showMoreToggler">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <!--<span class="type" style="background: <?/*= $session->Type; */?>"></span>-->
                                                <h4><?= $session->Name ?></h4>
                                                <span class="date"><?= date("D, M jS", strtotime($session->StartDateTime)); ?></span><br>

                                                <span><?= date("g:ia", strtotime($session->StartDateTime)); ?>
                                                    - <?= date("g:ia", strtotime('+'.$session->Duration.' minutes',strtotime($session->StartDateTime))); ?></span>

                                            </div>
                                            <div class="col-sm-4 alignRight">
                                                <button class="btn blue regular">Book your bike</button>
                                                <h4 class="close-toggle">X Close</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="moreText">
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <span>Instructor: <br>
                                                     <?= $instructor->FirstName . ' ' . $instructor->LastName; ?>
                                                 </span>
                                                <br><br>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet velit non dolor finibus euismod aliquam eget metus. Nullam facilisis nisi eget lacus consequat, venenatis lacinia tellus ullamcorper. Mauris vitae enim urna. Curabitur gravida, sem in cursus luctus, nulla sapien blandit nunc, sed efficitur diam mi id dui.
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/fans.png">
                                                <div class="first-row">
                                                    <div class="bike coach">
                                                        <div class="bike-num" style="background-color: "></div>
                                                        <span>Coach</span>
                                                    </div>
                                                    <div class="projector">
                                                        <span>Screen</span>
                                                    </div>

                                                </div>
                                                <div class="row seven-cols">
		                                            <?php
		                                            //$sessionBikes = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bikes' );
		                                            $sessionBookings = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bookings' );
		                                            $bikesBooked     = array();
		                                            foreach ( $sessionBookings as $sessionBooking ) {
			                                            array_push( $bikesBooked, $sessionBooking->Bike->Id );

		                                            }
		                                            //if ( count( $sessionBikes ) > 0 ) {
		                                            //foreach ( $sessionBikes as $bike ) {
		                                            foreach ( $bikes as $bike ) {
			                                            $disabledBike = '';
			                                            if ( in_array( $bike->Id, $bikesBooked ) ) {
				                                            $disabledBike = 'disabled';
			                                            }
			                                            ?>

                                                        <div class="col-sm-1">
                                                            <div class="bike <?= $disabledBike; ?>">
					                                            <?php
					                                            $isPower = 'yes';
					                                            if ( ! $bike->IsPower ) {
						                                            $isPower = 'no';
					                                            } ?>
                                                                <!-- <span class="is-power <?/*= $isPower */ ?>"></span>-->
                                                                <div class="bike-num" onclick="bookBike('<?= $authCode; ?>', <?= $userId; ?>, <?= $session->Id; ?>, <?= $bike->Id; ?>)">
                                                                    <?= $bike->Number; ?>
                                                                    <!--<img width="60"
                                                                             src="<?/*= get_stylesheet_directory_uri() */ ?>/images/basic/bike.jpg">-->
                                                                </div>

                                                            </div>

                                                        </div>
			                                            <?php
		                                            }
		                                            //}
		                                            ?>
                                                </div>
                                                <br>
                                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/fans.png">
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } ?>
                    </div>

                </div>
                <?php
            } else {

                echo "Error! API Offline or Invalid Credentials";
            }

            ?>
            </div><!-- content -->
        </div><!-- within inner -->

    </div>



	<?php
} //login check
else {
	header( 'Location: http://richmondoval.ca/oval-fit-login/?login=false' );
	exit;
}

get_footer();