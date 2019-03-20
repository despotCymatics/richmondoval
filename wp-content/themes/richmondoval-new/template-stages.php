<?php
/**
 * Template Name: Oval Fit Page
 */

require "stages-api.php";

session_start();

if ( login() || isset( $_SESSION['logged'] ) ) {

	get_header();

	if ( ! isset( $authCode->Message ) ) {


		//USER
		//USER
		//USER
		$userEmail = $_SESSION['logged'];
		$userQuery = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users?query=' . $userEmail );

		if ( count( $userQuery ) == 1 && isset($userQuery[0]->Email)) {
			$user = $userQuery[0];
			$userId = $user->Id;
		} else {
			session_destroy();
			echo '<script>window.location="/oval-fit-login/?user=none"</script>';
			exit;
		}

		//Workouts
		//Workouts
		//Workouts
		$workouts = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts?take=500' );

		//Sessions
		//Sessions
		//Sessions
		date_default_timezone_set('America/Vancouver');

		$dateFrom    = date( 'Y-m-d\TH:i' );
		$dateTo   = strtotime( '+1 week' );
		$dateTo   = date( 'Y-m-d', $dateTo );

		if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
		}

		$sessions = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $dateFrom . '&dateTimeTo=' . $dateTo );
		if(count($sessions) > 1) {
			usort($sessions,function($a, $b){
				return (strtotime($a->StartDateTime) < strtotime($b->StartDateTime)? -1 : 1);
			});
		}else {

			$logFile = dirname(dirname(__FILE__))."../../stagesAPILog-main.txt";
			$current = file_get_contents($logFile);
			$contents = "USER: ".$userEmail."-------------------------------------------------------------------------\r\n";
			$contents .= 'Sessions: '.json_encode($sessions);
			file_put_contents($logFile, $contents.PHP_EOL , FILE_APPEND | LOCK_EX);
		}

		//User Bookings
		//User Bookings
		//User Bookings
		$userBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );

		?>

    <div class="ovalfit-wrapper">

        <div class="ovalfit-side-menu">
            <div class="ovalfit-logo">
                <img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo-black.png">
            </div>
            <div class="username">
                <?php if($user->NickName !== '') { ?>
                    <h3><?= $user->NickName ?></h3>
                <?php } ?>
                <p><?= $user->FirstName ?> <?= $user->LastName ?></p>
                <?php if(count($workouts) > 0 ) { ?>
                <span>Latest Activity: <?=$workouts[0]->Time; ?></span>
                <?php }?>

            </div>

            <div class="side-menu-items">
                <ul>
                    <li><a href="#dashboard" data-go="dashboard">Dashboard <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/dashboard.svg"></a></li>
                    <li><a href="#">Class Schedules</a></li>
                    <li><a href="#ride" data-go="ride">Ride</a></li>
                    <li><a href="#athletic" data-go="athletic">Athletic</a></li>
                    <li><a href="https://stagesflight.com/Account/ProfileSettings" target="_blank">Profile Settings <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/settings.svg"></a></li>
                    <li><a href="/oval-fit-logout/">Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main -->
        <!-- Main -->
        <!-- Main -->
        <div class="ovalfit-main">

            <div id="dashboard" class="ovalfit-dashboard">
                <div class="">
                    <h4>Wlcome back, <?= $user->FirstName ?></h4>
                    <p>Check out your OVALfit dashboard</p>
                </div>
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="http://via.placeholder.com/1200x755/ccc/fff/">
                        </div>
                        <div class="col-sm-6">
                            <img src="http://via.placeholder.com/1200x755/ccc/fff/">
                        </div>
                    </div>
                </div>
            </div>

            <div id="ride" class="oval-fit-ride" style="display: none;">
                <div class="ovalfit-header" style="padding: 30px 60px 0">
                    <div class="">
                        <div class="content">

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="title">
                                        <h3>Ride. Push. Repeat</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6">

                                    <!--<a class="my-account" href="javascript:void(0);">My Account</a>
                                <div class="account-menu" style="display: none;">
                                    <a class="redirect" target="_blank" href=" https://stagesflight.com/mytraning/stats">
                                        Performance Dashboard
                                        <img src="<?/*= get_stylesheet_directory_uri() */?>/images/stages/dashboard.svg">
                                    </a>
                                    <a class="redirect" target="_blank" href="https://stagesflight.com/Account/ProfileSettings">
                                        Profile settings
                                        <img src="<?/*= get_stylesheet_directory_uri() */?>/images/stages/settings.svg">
                                    </a>
                                    <a class="logout" href="/oval-fit-logout/">Log Out</a>
                                    <span class="redirect-info">You will be redirected to STAGES website</span>
                                    <button class="ov-fit-btn-blue">GOT IT</button>
                                </div>-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!--<p>Hi <?/*= $user->FirstName */?>, check out your performance metrics.</p>-->
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


							            if(count($workouts) > 0 && isset($workouts[0]->DurationInSeconds)) {
								            foreach ( $workouts as $workout ) {

									            $numWorkouts ++;
									            $durationInSeconds += $workout->DurationInSeconds;
									            $distanceInKm      += $workout->DistanceInKm;
									            $kiloCalories      += $workout->KiloCalories;
									            $avgWatt           += $workout->AvgWatt;
									            $avgSpeed          += $workout->AvgSpeed;
									            $avgHR             += $workout->AvgHeartRate;
									            array_push($maxSpeedArray, $workout->MaxSpeed);
								            }
							            }

							            if(count($maxSpeedArray) < 1) array_push($maxSpeedArray, 0);

							            ?>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike.svg">
                                            <span>
                                    <span class="num"><?= $numWorkouts; ?></span>
                                    <span class="name">Number of workouts</span>
                                </span>
                                        </div>

							            <?php if($numWorkouts == 0) $numWorkouts = 1; ?>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg">
                                            <span>
                                    <span class="num"><?= round($durationInSeconds/60); ?> <span>min</span></span>
                                    <span class="name">Total time</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/power.svg">
                                            <span>
                                    <span class="num"><?= round($avgWatt / $numWorkouts) ; ?> <span>watt</span></span>
                                    <span class="name">Average Power</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg">
                                            <span>
                                    <span class="num"><?= $kiloCalories; ?></span>
                                    <span class="name">Calories burned</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/distance.svg">
                                            <span>
                                    <span class="num"><?= round($distanceInKm,0); ?> <span>km</span></span>
                                    <span class="name">Total distance</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg">
                                            <span>
                                    <span class="num"><?= round($avgHR / $numWorkouts, 0); ?></span>
                                    <span class="name">Average heart rate</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                            <span>
                                    <span class="num"><?= round($avgSpeed / $numWorkouts, 1); ?> <span>km/h</span></span>
                                    <span class="name">Average speed</span>
                                </span>
                                        </div>
                                        <div class="stat">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                            <span>
                                    <span class="num"><?= max($maxSpeedArray); ?> <span>km/h</span></span>
                                    <span class="name">Max.speed</span>
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ovalfit-body">
                    <div class="">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-buttons">
                                        <h4 class="tablink" onclick="openTab('sessions', this)" id="sessionsTab">Schedules</h4>
                                        <h4 class="tablink" onclick="openTab('bookings', this)" id="bookingsTab">Reservations</h4>
                                    </div>

                                    <!-- Bookings -->
                                    <div id="bookings" class="tabcontent">
							            <?php
							            if ( count( $userBookings ) > 0 ) { ?>
								            <?php foreach ( $userBookings as $userBooking ) { ?>
                                                <div class="bookings" data-id="<?= $userBooking->Id; ?>">
                                                    <div class="showMoreToggler">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-xs-6">
                                                                <h4><?= $userBooking->Session->Name; ?></h4>
													            <?php
													            $sessionDate = date("D, M jS", strtotime($userBooking->Session->StartDateTime));
													            $sessionTime = date("g:ia", strtotime($userBooking->Session->StartDateTime))." - ".date("g:ia", strtotime('+'.$userBooking->Session->Duration.' minutes',strtotime($userBooking->Session->StartDateTime)));
													            ?>
                                                                <span class="date"><?= $sessionDate; ?></span><br>
                                                                <span><?= $sessionTime; ?></span>
                                                            </div>
                                                            <div class="col-sm-4 col-xs-6 alignRight">
                                                                <button class="btn blue regular">Cancel Reservation</button>
                                                                <h4 class="close-toggle">X Close</h4>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="moreText">
                                                        <div class="row flexed">
                                                            <div class="col-sm-8 col-xs-6">
                                                                <div class="flexed">
                                                                    <div>
                                                                        <img style="width: 45px; margin-right: 15px;" src='<?= get_stylesheet_directory_uri() ?>/images/stages/bike-grey.svg'>
                                                                    </div>
                                                                    <div>
                                                                        <span>Bike: <?=$userBooking->Bike->Number ?></span><br>
                                                                        <span>Row: <?=$userBooking->Bike->Row ?></span><br>
                                                                        <!--<span>Column: <?/*=$userBooking->Bike->Column */?></span>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-xs-6 alignRight">
                                                                <button class="btn blue regular cancel"
                                                                        onclick="cancelBooking('<?= $authCode; ?>','<?= $userBooking->Id ?>',' <?=$userBooking->Bike->Number ?>', '<?= $userBooking->Session->Name; ?>', '<?=$sessionDate?>', '<?=$sessionTime?>')">
                                                                    Cancel Reservation
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
                                            <p>You have no reservations.</p>
							            <?php } ?>
                                    </div>

                                    <!-- Sessions -->
                                    <div id="sessions" class="tabcontent">
                                        <form id="changeDates" method="post" action="/oval-fit/">
                                            <input type="hidden" name="dateFrom" class="dateFrom" value="<?= $dateFrom; ?>">
                                            <input type="hidden" name="dateTo" class="dateTo" value="<?= $dateTo; ?>">
                                            <input
                                                    type="text"
                                                    class="daterange"
                                                    name="daterange"
                                                    value="<?= date("M d Y", strtotime($dateFrom)); ?> - <?= date("M d Y", strtotime($dateTo)); ?>"
                                                    autocomplete="off"
                                                    readonly="true"
                                            />
                                        </form>
							            <?php
							            if ( count( $sessions ) > 0 ) {
								            foreach ( $sessions as $session ) {
									            $disableClass= '';
									            $now = date_create();
									            $sessionDateTime = date_create($session->StartDateTime);
									            $diff = date_diff( $now, $sessionDateTime);
									            $diffHours = $diff->h+$diff->days*24;

									            if( $diffHours >= 26) $disableClass = 'disableBook';

									            $sessionDate = date("D, M jS", strtotime($session->StartDateTime));
									            $sessionTime = date("g:ia", strtotime($session->StartDateTime))." - ".date("g:ia", strtotime('+'.$session->Duration.' minutes',strtotime($session->StartDateTime)));

									            ?>

                                                <div class="showMoreToggler <?=$disableClass;?>"
                                                     data-user-id="<?=$userId; ?>"
                                                     data-session-id="<?=$session->Id; ?>"
                                                     data-session-name="<?=$session->Name; ?>"
                                                     data-session-date="<?=$sessionDate; ?>"
                                                     data-session-time="<?=$sessionTime; ?>"
                                                     data-session-instructor-id="<?=$session->InstructorId; ?>"
                                                     data-auth-code="<?=$authCode?>"
                                                >
                                                    <div class="row">
                                                        <div class="col-sm-8 col-xs-6">
                                                            <!--<span class="type" style="background: <?/*= $session->Type; */?>"></span>-->
                                                            <h4><?= $session->Name ?></h4>
                                                            <span class="date"><?= $sessionDate; ?></span><br>
                                                            <span><?=$sessionTime; ?></span>

                                                        </div>
                                                        <div class="col-sm-4 col-xs-6 alignRight">
                                                            <button class="btn blue regular">Reserve your bike</button>
                                                            <h4 class="close-toggle">X Close</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moreText <?=$disableClass;?>">
                                                    <img width="200" class="loader-img" src="/wp-content/themes/richmondoval-new/images/basic/oval-fit-loading-dots.gif">
                                                    <p style="text-align: center">Please wait</p>
                                                    <div class="ride-on-info">RIDE ON. Check back 26hrs in advance of class time to reserve a bike</div>
                                                </div>

									            <?php
								            }

							            } else { ?>
                                            <br>
                                            <p>No Sessions on these dates.</p>
							            <?php } ?>

                                        <p style="text-align: center; margin: 20px 20px 0; opacity: 0.5;">OvalFit Ride</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- content -->
                    </div><!-- within inner -->
                </div>
            </div>

            <div id="athletic" class="ovalfit-athletic" style="display: none;">
                <div class="ovalfit-header" style="padding: 30px 60px 0">
                    <h3>Athletic</h3>
                </div>
            </div>

        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function(){
            $("#sessions .showMoreToggler:not(.disableBook)").click(function(){

                var self = $(this);
                if(!self.hasClass('on') && !self.hasClass('loaded')) {

                    $(".showMoreToggler").addClass('disabled');

                    $.ajax({
                        type: 'POST',
                        url: '/wp-content/themes/richmondoval-new/stages-single-session.php',
                        data: {
                            userId: self.attr('data-user-id'),
                            sessionId: self.attr('data-session-id'),
                            sessionName: self.attr('data-session-name'),
                            sessionDate: self.attr('data-session-date'),
                            sessionTime: self.attr('data-session-time'),
                            instructorId: self.attr('data-session-instructor-id'),
                            authCode:self.attr('data-auth-code')
                        },
                        success: function(data) {
                            $(".showMoreToggler").removeClass('disabled');
                            self.next('.moreText').html(data);
                            self.next('.moreText').addClass('loaded');
                            self.addClass('loaded');
                        },
                        error: function(){
                            $(".showMoreToggler").removeClass('disabled');
                            self.next('.moreText').html('<div class="ajax-error">Ajax Error. Could not fetch class data. Please reload the page.</div>');
                            self.next('.moreText').addClass('loaded');
                            self.addClass('loaded');

                        }
                    });
                }

            });
        });
    </script>

    <?php
	} else {
		echo "Error! API Offline or Invalid Credentials";
	}

}

//login check
else {
	header( 'Location: /oval-fit-login/?login=false' );
	exit;
}
?>

<?php
get_footer();