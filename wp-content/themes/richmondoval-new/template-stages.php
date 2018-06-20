<?php
/**
 * Template Name: Stages Page
 */

require "stages-api.php";
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


//AUTHORIZE
//$authCode = authorize();
if ( ! isset( $authCode->Message ) ) {

    $userId = 52601;

    //Bikes
    $bikes = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/bikes' );

    //Sessions
    $today = date('Y-m-d');
	$toDate = strtotime ('+1 year') ;
    $toDate = date('Y-m-d', $toDate);
    $sessions = getCurl($authCode, 'http://stagesflight.com/locapi/v1/sessions?dateTimeFrom='.$today.'.&dateTimeTo='.$toDate );

    //USER
    $user = getCurl($authCode, 'http://stagesflight.com/locapi/v1/users/'.$userId);

    ?>

    <h2>Welcome. <?=$user->FirstName." ".$user->LastName?></h2>
    <p><?=$user->Email;?> | <?=$user->Gender;?> | <?=$user->Weight;?>kg</p>
    <div class="row">
        <div class="col-md-9">
    <?php
    //User Bookings
    $userBookings = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/users/' . $user->Id . '/bookings' );

    if ( count( $userBookings ) > 0 ) { ?>
        <br>
        <h2>Your Bookings</h2>
        <?php foreach ( $userBookings as $userBooking ) { ?>
            <h4 class="showMoreToggler">
                <?=$userBooking->Session->Name;?>
                <br>
                <span>Bike: <?=$userBooking->Bike->Number;?> | Row: <?=$userBooking->Bike->Row;?> | Column: <?=$userBooking->Bike->Column;?> </span>
            </h4>
            <div class="moreText">
                <button class="btn">Cancel Booking</button>
            </div>

            <?php
        }
    }

    //User Sessions
    if ( count( $sessions ) > 0 ) { ?>
        <br>
        <h2>Available Sessions</h2>
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

                    $sessionBookings = getCurl( $authCode, 'http://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bookings' );

                    $bikesBooked = array();
                    foreach ( $sessionBookings as $sessionBooking ) {
                        array_push($bikesBooked, $sessionBooking->Bike->Id);

                    }
                    if ( count( $bikes ) > 0 ) {
                        foreach ( $bikes as $bike ) {
                            $disabledBike = '';
                            if(in_array($bike->Id, $bikesBooked)) $disabledBike = 'disabled';
                            ?>

                            <div class="col-sm-2">
                                <div class="bike <?=$disabledBike;?>">
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
    } ?>
        </div>
        <div class="col-md-3">
            <br>
            <h2>Your Stats</h2>
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

get_footer();