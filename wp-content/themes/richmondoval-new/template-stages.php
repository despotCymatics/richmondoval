<?php
/**
 * Template Name: Oval Fit Page
 */

require "stages-api.php";

session_start();

if ( login() || isset( $_SESSION['logged'] ) ) {

	get_header();

	if ( !isset( $authCode->Message) && !isset( $authCode->Message ) ) {


		//USER
		//USER
		//USER
		$userEmail = $_SESSION['logged'];
		$userQuery = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users?query=' . $userEmail );

		var_dump($userQuery);
		exit;
		if ( !isset( $userQuery->Message) && count( $userQuery ) == 1 && isset($userQuery[0]->Email)) {
			$user = $userQuery[0];
			$userId = $user->Id;
		} else {
			session_destroy();
			echo '<script>window.location="/oval-fit-login/?user=none"</script>';
			exit;
		}


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

		$sessionsAth = getCurl( $authCodeAthletic, 'https://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $dateFrom . '&dateTimeTo=' . $dateTo );
		if(count($sessions) > 1) {
			usort($sessions,function($a, $b){
				return (strtotime($a->StartDateTime) < strtotime($b->StartDateTime)? -1 : 1);
			});
		}

		//User Bookings
		//User Bookings
		//User Bookings
		$userBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );
		$userBookingsAth = getCurl( $authCodeAthletic, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );


        //Workouts
        //Workouts
        //Workouts
        $workouts = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts?take=500' );
        $workoutsAth = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts?take=500' );

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
            $latestActivity = $workouts[0];

        }

        if(count($maxSpeedArray) < 1) array_push($maxSpeedArray, 0);
        if($numWorkouts == 0) $numWorkouts = 1;
        $avgWatt = round($avgWatt / $numWorkouts);
        $avgSpeed = round($avgSpeed / $numWorkouts);
        $distanceInKm = round($distanceInKm,0);
        $avgHR = round($avgHR / $numWorkouts, 0);
        $maxSpeed = max($maxSpeedArray);

		    $hours = floor($durationInSeconds / 3600);
		    $minutes = floor(($durationInSeconds / 60) % 60);

		?>

    <div class="ovalfit-wrapper">

        <div class="ovalfit-side-menu-overlay"></div>
        <div class="ovalfit-side-menu">
            <div class="ovalfit-logo">
                <img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo-black.png">
            </div>
            <div class="username">
                <?php if($user->NickName !== '') { ?>
                    <h3><?= $user->NickName ?></h3>
                <?php } ?>
                <span><?= $user->FirstName ?> <?= $user->LastName ?></span><br><br>
                <?php if(count($workouts) > 0 ) { ?>
                <span>Latest Activity: <?=$workouts[0]->Time; ?></span><br><br>
                <?php }?>

            </div>

            <div class="side-menu-items">

                    <a href="javascript:void(0);" data-go="dashboard" class="dashboard-menu-item active">Dashboard <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/dashboard-white.svg"></a>
                    <a href="javascript:void(0);">Class Schedules</a>
                    <a href="javascript:void(0);" data-go="ride" class="ride-menu-item" ><img class="logo" alt="Ride" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride-logo-black.svg"></a>
                    <a href="javascript:void(0);" data-go="athletic" class="athletic-menu-item"><img class="logo" alt="Athletic" src="<?= get_stylesheet_directory_uri() ?>/images/stages/athletic-logo-black.svg"></a>
                    <a href="https://stagesflight.com/Account/ProfileSettings" target="_blank" class="profile-menu-item">Profile Settings <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/settings.svg"></a>
                    <a href="/oval-fit-logout/">Logout</a>

            </div>
            <div class="side-menu-info">
                You’ll be directed to STAGES website
            </div>
        </div>


        <!-- Mobile Header -->
        <div class="ovalfit-mobile-header">
            <div class="">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
            </div>

            <div class="menu-burger">
                <div></div>
                <div></div>
                <div></div>
            </div>

        </div>


        <!-- Main -->
        <div class="ovalfit-main">

            <div id="dashboard" class="ovalfit-dashboard">
                <?php require_once "ovalfit-parts/dashboard.php"; ?>
            </div>

            <div id="ride" class="ovalfit-ride" style="display: none;">
                <?php require_once "ovalfit-parts/ride.php"; ?>
            </div>

            <div id="athletic" class="ovalfit-athletic" style="display: none;">
                <?php require_once "ovalfit-parts/athletic.php"; ?>
            </div>

        </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function(){

            //Ride Session Click
            $("#ride #sessions .showMoreToggler:not(.disableBook)").click(function(){

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

            //Athletic Session Click
            $("#athletic #sessions .showMoreToggler:not(.disableBook)").click(function(){

                var self = $(this);
                if(!self.hasClass('on') && !self.hasClass('loaded')) {

                    $(".showMoreToggler").addClass('disabled');

                    $.ajax({
                        type: 'POST',
                        url: '/wp-content/themes/richmondoval-new/stages-single-session-ath.php',
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