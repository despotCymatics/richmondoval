<div class="ovalfit-inner">
    <div class="latest-activity">
        <span>Latest Activity</span>
        <div class="latest-activity-stats">
            <div>
                <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg">
                <?=round($latestActivity->DurationInSeconds/60, 0); ?> mins
            </div>
            <div>
                <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/power.svg">
		        <?=$latestActivity->AvgWatt; ?> watt
            </div>
            <div>
                <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/distance.svg">
	            <?=round($latestActivity->DistanceInKm, 1); ?> km
            </div>
            <div>
                <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
	            <?=round($latestActivity->AvgSpeed, 0); ?> km/h
            </div>
        </div>
    </div>
    <div class="welcome">
        <h4>Welcome back, <?= $user->FirstName ?></h4>
        <p>Check out your OVALfit dashboard</p>
    </div>
    <div>
        <div class="row">
            <div class="col-sm-6">
                <a href="javascript:void(0);" data-go="ride" class="banner ride-banner" style="background-image: url(<?= get_stylesheet_directory_uri() ?>/images/stages/Ride_hero_1_sm.jpg)" >
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride-logo-white.png"><br>
                    <span class="see-schedule">See Schedule</span>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="javascript:void(0);" data-go="athletic" class="banner athletic-banner" style="background-image: url(<?= get_stylesheet_directory_uri() ?>/images/stages/athletic_hero_1_sm.jpg)" >
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/athletic-logo-white.svg"><br>
                    <span class="see-schedule">See Schedule</span>
                </a>
            </div>
        </div>
    </div>


    <div class="next-activity">
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ( count( $userBookings ) > 0 ) { ?>
                    <h4>Next Activity</h4>
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
                }?>
            </div>
        </div>
    </div>

    <div class="stats">
        <div class="row">
            <div class="col-sm-4">
                <h4>Your Stats</h4>
            </div>

            <div class="col-sm-8">
                <div class="dashboard-tabs">
                    <div class="active" data-go="dash-collective">Collective</div>
                    <div data-go="dash-ride">Ride</div>
                    <div data-go="dash-athletic">Athletic</div>
                </div>
            </div>
        </div>

        <div class="stats-tabs">

            <div class="stats-tab" id="dash-collective" style="display: block;">
                <div class="row grayed">
                    <div class="stat-wrap col-sm-4">
                        <div>
                            <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/workouts.svg"> Number of workouts</p>
                            <div class="big-number">
                                <?=$numWorkouts?>
                            </div>
                        </div>
                    </div>
                    <div class="stat-wrap col-sm-4">
                        <div>
                            <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg"> Total calories</p>
                            <div class="big-number">
                                <?=$kiloCalories?>
                            </div>
                        </div>
                    </div>
                    <div class="stat-wrap col-sm-4">
                        <div>
                            <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg"> Time</p>
                            <div class="big-number">
	                            <?=$hours?><span>hrs</span> <?=$minutes?><span>mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats-tab" id="dash-ride">
                <?php

                $ftpPosition = $avgWatt * 100 / 500;
                $avgPosition = $avgWatt * 100 / 500;
                ?>

                <div class="chats">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="grayed">
                                <img class="stat-icon" src="<?= get_stylesheet_directory_uri() ?>/images/stages/power.svg">
                                <div class="power-stats">
                                    <div>
                                        <span>FTP</span>
                                    </div>
                                    <div class="bar">
                                        <div class="num" style="left: <?=$ftpPosition?>%">
                                            <?= $avgWatt ?> <span>watt</span>
                                        </div>
                                        <div class="filled" style="width:<?=$ftpPosition?>%"></div>
                                    </div>
                                    <div>
                                        MAX
                                        500
                                    </div>
                                </div>

                                <div class="power-stats">
                                    <div>
                                        <span>Average Power</span>
                                    </div>
                                    <div class="bar">
                                        <div class="num" style="left: <?=$ftpPosition?>%">
                                            <?= $avgWatt ?> <span>watt</span>
                                        </div>
                                        <div class="filled" style="width:<?=$ftpPosition?>%"></div>
                                    </div>
                                    <div>
                                        MAX
                                        500
                                    </div>
                                </div>
                            </div>

                            <div class="grayed">
                                <img class="stat-icon" src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                <div class="power-stats circles">
                                    <div>
                                        <div class="pie">
                                            <svg width="196" height="196" viewBox="0 0 36 36" class="circular-chart">
                                                <path class="circle"
                                                      stroke="#FF9E18"
                                                      stroke-dasharray="40, 100"
                                                      stroke-width="1.5"
                                                      fill="none"
                                                      d="M18 2.0845
                                                     a 15.9155 15.9155 0 0 1 0 31.831
                                                     a 15.9155 15.9155 0 0 1 0 -31.831"
                                                ></path>
                                            </svg>

                                           <!-- <svg width="180" height="180" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <title>Layer 1</title>
                                                    <circle
                                                        style="stroke-dashoffset: 70; stroke-dasharray: 300;"
                                                        class="circle" r="86" cy="90" cx="90" stroke-width="8" stroke="#FF9E18" fill="none"></circle>
                                                </g>
                                            </svg>-->
                                            <?=$avgSpeed;?><br>
                                            <span>km/h</span>
                                        </div>
                                        <p>Average Speed</p>
                                    </div>

                                    <div>
                                        <div class="pie">
                                            <svg width="196" height="196" viewBox="0 0 36 36" class="circular-chart">
                                                <path class="circle"
                                                      stroke="#FF9E18"
                                                      stroke-dasharray="40, 100"
                                                      stroke-width="1.5"
                                                      fill="none"
                                                      d="M18 2.0845
                                                     a 15.9155 15.9155 0 0 1 0 31.831
                                                     a 15.9155 15.9155 0 0 1 0 -31.831"
                                                ></path>
                                            </svg>
                                            <?=$maxSpeed;?><br>
                                            <span>km/h</span>
                                        </div>
                                        <p>Maximum Speed</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="grayed">
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/distance.svg"> Total Distance </p>
                                    <div class="big-number">
                                        <?=$distanceInKm?><span>km</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg"> Total time</p>
                                    <div class="big-number">
                                        <?=$hours?> <span>hrs</span> <?=$minutes?> <span>mins</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg"> Average heart rate</p>
                                    <div class="big-number">
                                        <?=$avgHR?><span>bpm</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg"> Total calories</p>
                                    <div class="big-number">
                                        <?=$kiloCalories?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="stats-tab" id="dash-athletic">


            </div>
        </div>

        <div class="dash-cta">
            <div>
                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/stages-logo-white.svg">
                <span>Get your full performance metrics on STAGES</span>
            </div>
            <div>
                <a href="#" class="btn orange regular">GET IT NOW</a>
            </div>
        </div>

    </div>
</div>