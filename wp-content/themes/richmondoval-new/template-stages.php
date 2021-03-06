<?php
/**
 * Template Name: Oval Fit Page
 */

require "stages-api.php";

session_start();

if ( login() || isset( $_SESSION['logged'] ) ) {

	get_header();

  //USER
  //USER
  //USER
  $userEmail = $_SESSION['logged'];
  $userQuery = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users?query=' . $userEmail );
	//$userQuery = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users?query=thebullrunner@gmail.com');

  if ( !isset( $userQuery->Message) && count( $userQuery ) == 1 && isset($userQuery[0]->Email)) {
    $user = $userQuery[0];
    $userId = $user->Id;

  } else if( isset($userQuery->Message) ) {
	  session_destroy();
	  echo '<script>window.location="/oval-fit-login/?msg='.$userQuery->Message.'"</script>';
	  exit;

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
  } else {
/*    $logFile = dirname(dirname(__FILE__))."../../stagesAPILog-main.txt";
    $current = file_get_contents($logFile);
    $contents = "USER: ".$userEmail."-------------------------------------------------------------------------\r\n";
    $contents .= 'Sessions: '.json_encode($sessions);
    file_put_contents($logFile, $contents.PHP_EOL , FILE_APPEND | LOCK_EX);*/
  }

  $sessionsAth = getCurl( $authCodeAthletic, 'https://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $dateFrom . '&dateTimeTo=' . $dateTo );
  if(count($sessionsAth) > 1) {
    usort($sessionsAth,function($a, $b){
      return (strtotime($a->StartDateTime) < strtotime($b->StartDateTime)? -1 : 1);
    });
  }

  //User Bookings
  //User Bookings
  //User Bookings
  $userBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );
  $userBookingsRide = array();
  $userBookingsAth = array();

  //sorting ath and ride bookings
	if ( count( $userBookings ) > 0 ) {
		foreach ( $userBookings as $userBooking ) {
			foreach ( $sessions as $session ) {
        if ($userBooking->Session->Id == $session->Id) {
          array_push($userBookingsRide, $userBooking);
        }
      }
			foreach ( $sessionsAth as $session ) {
				if ($userBooking->Session->Id == $session->Id) {
					array_push($userBookingsAth, $userBooking);
				}
			}
		}
	}

  //Workouts
  //Workouts
  //Workouts
  $workouts = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/users/' . $user->Id . '/workouts?take=500' );
  $workoutsRide = array();
  $workoutsAth = array();

  //Collective workout values
	$latestActivity = json_decode('{
                              "Id": 0,
                              "Time": "2019-04-18T09:43:06.966Z",
                              "DurationInSeconds": 0,
                              "DistanceInKm": 0,
                              "KiloCalories": 0,
                              "HeartRate": 0,
                              "AvgWatt": 0,
                              "AvgSpeed": 0,
                              "MaxSpeed": 0,
                              "ActivityID": 0,
                              "AvgHeartRate": 0,
                              "Feeling": 0,
                              "Comment": "string",
                              "GraphId": 0,
                              "CompetitionTime": 0,
                              "CompetitionAvgWatt": 0,
                              "WorkoutType": 0,
                              "ActivityName": "string",
                              "IsPlanned": true,
                              "PlannedDuration": 0,
                              "Intensity": 0,
                              "SessionLoggedOn": "Mobile",
                              "Position": "string",
                              "Energy": 0,
                              "Location": {
                                "Id": 1400
                              }
  }');

	$numWorkouts = 0;
	$kiloCalories = 0;
	$durationInSeconds = 0;

	if(count($workouts) > 0 && isset($workouts[0]->DurationInSeconds)) {

		foreach ( $workouts as $workout ) {

			if(isset($workout->Location->Id) && $workout->Location->Id === 1400) {
				array_push($workoutsRide, $workout);
			}else if(isset($workout->Location->Id) && $workout->Location->Id === 1794) {
				array_push($workoutsAth, $workout);
			} else {
				array_push($workoutsRide, $workout);
			}
		$numWorkouts ++;
		$durationInSeconds += $workout->DurationInSeconds;
		$kiloCalories += $workout->KiloCalories;

		}
		$latestActivity = $workouts[0];

	}

	$hours = floor($durationInSeconds / 3600);
	$minutes = floor(($durationInSeconds / 60) % 60);

	//Ride workout values
  $durationInSecondsRide = 0;
  $distanceInKmRide      = 0;
  $kiloCaloriesRide      = 0;
  $avgWattRide           = 0;
  $avgSpeedRide          = 0;
  $avgHRRide             = 0;
  $maxSpeedRide          = 0;
  $numWorkoutsRide       = 0;
  $maxSpeedArrayRide     = array();
	$maxSpeedAth           = 0;



	if(count($workoutsRide) > 0 && isset($workoutsRide[0]->DurationInSeconds)) {

	  foreach ( $workoutsRide as $workoutRide ) {
		  $numWorkoutsRide ++;
		  $durationInSecondsRide += $workoutRide->DurationInSeconds;
		  $distanceInKmRide      += $workoutRide->DistanceInKm;
		  $kiloCaloriesRide      += $workoutRide->KiloCalories;
		  $avgWattRide           += $workoutRide->AvgWatt;
		  $avgSpeedRide          += $workoutRide->AvgSpeed;
		  $avgHRRide             += $workoutRide->AvgHeartRate;
		  array_push($maxSpeedArrayRide, $workoutRide->MaxSpeed);
	  }

		if(count($maxSpeedArrayRide) < 1) array_push($maxSpeedArrayRide, 0);
		if($numWorkoutsRide == 0) $numWorkoutsRide = 1;
		$avgWattRide = round($avgWattRide / $numWorkoutsRide);
		$avgSpeedRide = round($avgSpeedRide / $numWorkoutsRide);
		$distanceInKm = round($distanceInKmRide,0);
		$avgHRRide = round($avgHRRide / $numWorkoutsRide, 0);
		$maxSpeedRide = max($maxSpeedArrayRide);

  }

  $hoursRide = floor($durationInSecondsRide / 3600);
  $minutesRide = floor(($durationInSecondsRide / 60) % 60);


  //Ath workout values
  $durationInSecondsAth = 0;
  $distanceInKmAth      = 0;
  $kiloCaloriesAth      = 0;
  $avgWattAth           = 0;
  $avgSpeedAth          = 0;
  $avgHRAth             = 0;
  $maxSpeedAth          = 0;
  $numWorkoutsAth       = 0;
  $maxSpeedArrayAth     = array();
	$maxSpeedAth          = 0;


	if(count($workoutsAth) > 0 && isset($workoutsAth[0]->DurationInSeconds)) {
      foreach ( $workoutsAth as $workoutAth ) {
          $numWorkoutsAth ++;
          $durationInSecondsAth += $workoutAth->DurationInSeconds;
          $distanceInKmAth      += $workoutAth->DistanceInKm;
          $kiloCaloriesAth      += $workoutAth->KiloCalories;
          $avgWattAth           += $workoutAth->AvgWatt;
          $avgSpeedAth          += $workoutAth->AvgSpeed;
          $avgHRAth             += $workoutAth->AvgHeartRate;
          array_push($maxSpeedArrayAth, $workoutAth->MaxSpeed);
      }

      if(count($maxSpeedArrayAth) < 1) array_push($maxSpeedArrayAth, 0);
      if($numWorkoutsAth == 0) $numWorkoutsAth = 1;
      $avgWattAth = round($avgWattAth / $numWorkoutsAth);
      $avgSpeedAth = round($avgSpeedAth / $numWorkoutsAth);
      $distanceInKmAth = round($distanceInKmAth,0);
      $avgHRAth = round($avgHRAth / $numWorkoutsAth, 0);
      $maxSpeedAth = max($maxSpeedArrayAth);
  }


  $hoursAth = floor($durationInSecondsAth / 3600);
  $minutesAth = floor(($durationInSecondsAth / 60) % 60);

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
            <a href="javascript:void(0);"
               data-go="dashboard"
               class="dashboard-menu-item active">
              Dashboard <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/dashboard-white.svg">
            </a>
            <div class="dashboard-menu-item-has-children">
              <a class="schedules-submenu-trigger" href="javascript:void(0);">
                Class Schedules
                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/schedule.svg">
              </a>
              <div class="schedules-submenu">
                <a href="javascript:void(0);"
                   data-go="ride"
                   class="ride-menu-item" >
                  <img class="logo" alt="Ride" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride-logo-black.svg">
                </a>
                <a href="javascript:void(0);"
                   data-go="athletic"
                   class="athletic-menu-item">
                  <img class="logo" alt="Athletic" src="<?= get_stylesheet_directory_uri() ?>/images/stages/athletic-logo-black.svg">
                </a>
              </div>
            </div>
            <a href="https://stagesflight.com/Account/ProfileSettings" class="profile-menu-item">
              Profile Settings <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/settings.svg">
              <div class="side-menu-info">
                You’ll be directed to STAGES website
              </div>
            </a>
            <a href="/oval-fit-logout/" class="logout-menu-item">
              Logout
              <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/logout.svg">
            </a>
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
          $("#ride #sessionsRide .showMoreToggler:not(.disableBook)").click(function(){

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
          $("#athletic #sessionsAth .showMoreToggler:not(.disableBook)").click(function(){

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

}

//login check
else {
	header( 'Location: /oval-fit-login/?login=false' );
	exit;
}
?>

<?php
get_footer();