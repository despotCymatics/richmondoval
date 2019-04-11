<div class="ovalfit-inner">
    <div class="ovalfit-header">
        <div class="">
            <div class="content">

                <div class="row">
                    <div class="col-xs-6">
                        <div class="title">
                            <h3>Ride. Push. Repeat</h3>
                        </div>
                    </div>
                    <div class="col-xs-6">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!--<p>Hi <?/*= $user->FirstName */?>, check out your performance metrics.</p>-->
                        <div class="stats">
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike.svg">
                                <span>
                                    <span class="num"><?= $numWorkouts; ?></span>
                                    <span class="name">Number of workouts</span>
                                </span>
                            </div>

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
                                    <span class="num"><?= $avgWatt ?> <span>watt</span></span>
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
                                    <span class="num"><?= $distanceInKm ?> <span>km</span></span>
                                    <span class="name">Total distance</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/rate.svg">
                                <span>
                                    <span class="num"><?= $avgHR ?></span>
                                    <span class="name">Average heart rate</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                <span>
                                    <span class="num"><?= $avgSpeed ?> <span>km/h</span></span>
                                    <span class="name">Average speed</span>
                                </span>
                            </div>
                            <div class="stat">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/stages/speed.svg">
                                <span>
                                    <span class="num"><?= $maxSpeed ?> <span>km/h</span></span>
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
                            <h4 class="tablink active-tab" data-tab="sessionsRide">Schedules</h4>
                            <h4 class="tablink" data-tab="bookingsRide">Reservations</h4>
                        </div>

                        <!-- Bookings -->
                        <div id="bookingsRide" class="tabcontent">
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
                                <p style="padding:0 30px;">You have no reservations.</p>
                            <?php } ?>
                        </div>

                        <!-- Sessions -->
                        <div id="sessionsRide" class="tabcontent">
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
                                <p style="padding:0 30px;">No Sessions on these dates.</p>
                            <?php } ?>

                            <p style="text-align: center; margin: 20px 20px 0; opacity: 0.5;">OvalFit Ride</p>
                        </div>
                    </div>
                </div>
            </div><!-- content -->
        </div><!-- within inner -->
    </div>
</div>