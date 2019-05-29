<div class="ovalfit-inner">
    <div class="welcome hideOnDesk">
      <h4>Welcome back, <?= $user->FirstName ?></h4>
      <p>Check out your OVALfit dashboard</p>
    </div>
    <div class="latest-activity">
        <span>Latest Activity</span>
        <div class="latest-activity-stats">
            <div>
              <?php if ($latestActivity->Location->Id === 1400) { ?>
              <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike-grey.svg">
              Indoor Cycling
              <?php } else if ($latestActivity->Location->Id === 1794) { ?>
              <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/treadmill.svg">
              Treadmill
              <?php } ?>
            </div>
            <div>
                <img class="svg" src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg">
                <?=floor($latestActivity->DurationInSeconds/60); ?> mins
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
    <div class="welcome hideOnTablet">
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
                if ( count( $userBookingsRide ) > 0 ) { ?>
                    <h4>YOUR NEXT ACTIVITY</h4>
                    <?php foreach ( $userBookingsRide as $userBooking ) { ?>

                        <div class="bookings" data-id="<?= $userBooking->Id; ?>">
                            <div class="">
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
                                        <button class="btn orange regular" onclick="cancelBooking('<?= $authCode; ?>','<?= $userBooking->Id ?>',' <?=$userBooking->Bike->Number ?>', '<?= $userBooking->Session->Name; ?>', '<?=$sessionDate?>', '<?=$sessionTime?>')">Cancel Reservation</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else if ( count( $userBookingsAth ) > 0 ) { ?>
                  <h4>YOUR NEXT ACTIVITY</h4>
	                <?php foreach ( $userBookingsAth as $userBooking ) { ?>

                    <div class="bookings" data-id="<?= $userBooking->Id; ?>">
                      <div class="">
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
                            <button class="btn orange regular" onclick="cancelSpotBooking('<?= $authCodeAthletic; ?>','<?= $userBooking->Id ?>',' <?=$userBooking->Bike->Number ?>', '<?= $userBooking->Session->Name; ?>', '<?=$sessionDate?>', '<?=$sessionTime?>')">Cancel Reservation</button>
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

           <!-- Collective Stats -->
            <div class="stats-tab" id="dash-collective" style="display: block;">
                <div class="row grayed">
                    <div class="stat-wrap col-sm-4">
                        <div>
                            <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/workouts.svg"> Number of Workouts</p>
                            <div class="big-number">
                                <?=$numWorkouts ?>
                            </div>
                        </div>
                    </div>
                    <div class="stat-wrap col-sm-4">
                        <div>
                            <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg"> Calories Burned</p>
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

            <!-- Ride Stats -->
            <div class="stats-tab" id="dash-ride">
                <?php
                $ftpPosition = $user->FTP * 100 / 500;
                $avgPosition = $avgWattRide * 100 / 500;
                ?>

                <div class="chats">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="grayed">
                                <img class="stat-icon" src="<?= get_stylesheet_directory_uri() ?>/images/stages/power.svg">
                                <div class="power-stats">
                                    <div class="stat-label">
                                        <span>FTP</span>
                                    </div>
                                    <div class="bar">
                                        <div class="num" style="left: <?=$ftpPosition?>%">
                                            <?= $user->FTP ?> <span>watt</span>
                                        </div>
                                        <div class="filled" style="width:<?=$ftpPosition?>%"></div>
                                    </div>
                                    <div>
                                        MAX
                                        500
                                    </div>
                                </div>

                                <div class="power-stats">
                                    <div class="stat-label">
                                        <span>Average Power</span>
                                    </div>
                                    <div class="bar">
                                        <div class="num" style="left: <?=$avgPosition?>%">
                                            <?= $avgWattRide ?> <span>watt</span>
                                        </div>
                                        <div class="filled" style="width:<?=$avgPosition?>%"></div>
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
                                            <?=$avgSpeedRide;?><br>
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
                                            <?=$maxSpeedRide;?><br>
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
                                        <?=round($distanceInKmRide, 0)?><span>km</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg"> Total Time</p>
                                    <div class="big-number">
                                        <?=$hoursRide?> <span>hrs</span> <?=$minutesRide?> <span>mins</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg"> Average heart rate</p>
                                    <div class="big-number">
                                        <?=$avgHRRide?><span>bpm</span>
                                    </div>
                                </div>
                                <div class="stat-wrap">
                                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg"> Calories Burned</p>
                                    <div class="big-number">
                                        <?=$kiloCaloriesRide?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ath Stats -->
            <div class="stats-tab" id="dash-athletic">
              <div class="row grayed">
                <div class="stat-wrap col-md-6 col-lg-3">
                  <div>
                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/workouts.svg"> Number of workouts</p>
                    <div class="big-number">
                      <?=$numWorkoutsAth?>
                    </div>
                  </div>
                </div>
                <div class="stat-wrap col-md-6 col-lg-3">
                  <div>
                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/burn.svg"> Calories Burned</p>
                    <div class="big-number">
                      <?=$kiloCaloriesAth?>
                    </div>
                  </div>
                </div>
                <div class="stat-wrap col-md-6 col-lg-3">
                  <div>
                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/time.svg"> Time</p>
                    <div class="big-number">
                      <?=$hoursAth?><span>hrs</span> <?=$minutesAth?><span>mins</span>
                    </div>
                  </div>
                </div>
                <div class="stat-wrap col-md-6 col-lg-3">
                  <div>
                    <p><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg"> Average Hart Rate</p>
                    <div class="big-number">
                      <?=$avgHRAth?>
                    </div>
                  </div>
                </div>
              </div>
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