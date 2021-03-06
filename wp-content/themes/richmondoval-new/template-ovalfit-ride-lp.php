<?php
/**
 * Template Name: Oval Fit Ride LP
 */

require "stages-api.php";
$monday = strtotime('monday this week');
$sunday = strtotime('monday next week');

$dateFrom = date( 'Y-m-d', $monday );
$dateTo   = date( 'Y-m-d', $sunday );

$sessions = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $dateFrom . '.&dateTimeTo=' . $dateTo );
if ( count($sessions) > 1 ) {
	usort($sessions,function($a, $b){
		return (strtotime($a->StartDateTime) < strtotime($b->StartDateTime)? -1 : 1);
	} );
}

$rand = rand( 0, 999999999999 );

?>

<!Doctype html>
<html>

<head>
	<title>Oval Fit - Ride</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/favicon.gif">

	<link rel="stylesheet" href="https://use.typekit.net/arc0dlo.css">
	<link rel="stylesheet" href="https://use.typekit.net/svd3qkc.css">
	<link rel="stylesheet" id="richmondoval-bootstrap-css" href="<?=get_template_directory_uri()?>/css/bootstrap.css?ver=4.9.8" type="text/css" media="screen, projection">

	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/shared.css" rel="stylesheet">
	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/ride.css?<?=$rand?>" rel="stylesheet">
	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/style.css" rel="stylesheet">
    <link href="<?=get_template_directory_uri()?>/js/ovalfit-lps/thumbnail-slider.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?=get_template_directory_uri()?>/js/ovalfit-lps//PicCarousel.js"></script>
    <script src="<?=get_template_directory_uri()?>/js/ovalfit-lps//thumbnail-slider.js" type="text/javascript"></script>

	<style>
		@import url("https://use.typekit.net/svd3qkc.css");
	</style>

	<script src="<?=get_template_directory_uri()?>/js/ovalfit-lps/script.js"></script>
	<script>
        (function(d) {
            var config = {
                    kitId: 'svd3qkc',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
	</script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function()
        {n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}
        ;
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '258823384988141');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=258823384988141&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68610770-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-68610770-1');
    </script>

</head>

<body>
<div class="main-container">
	<div class="content">
		<div class="content-body">

			<div class="ov-fit-nav">
				<div class="ov-fit-nav-inner">
					<a href="/ovalfit" class="ov-fit-logo">
						<img alt="" title="ovalFitLogo" src="https://richmondoval.ca/wp-content/uploads/2018/08/ovalFitLogo.png" width="120">
					</a>
					<div class="ov-nav-ride-container">
						<a href="/oval-fit-login/" class="ov-fit-btn ov-fit-btn-nav ov-fit-btn-nav ov-fit-btn-bold">
							RESERVE A BIKE
						</a>

						<a href="javascript:void(0)" class="ov-fit-hamburger-nav menuToggler"></a>

						<div class="mainMenu">

							<div class="close"><a href="#">X</a></div>
							<div class="within">
								<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 757px;">
									<div class="scrollable" style="overflow-y: auto; width: auto;">
										<div class="logoHolder">
											<a title="Richmond Olympic Oval" href="https://richmondoval.ca">
												<img width="120px" src="https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/logo.png" alt="Site name">
											</a>
										</div>
										<nav>
											<?php
											$defaults = array(
												'theme_location'  => '',
												'menu'            => 'Programs Menu',
												'container'       => '',
												'container_class' => '',
												'container_id'    => '',
												'menu_class'      => 'dl-menu',
												'menu_id'         => '',
												'echo'            => true,
												'fallback_cb'     => 'wp_page_menu',
												'before'          => '',
												'after'           => '',
												'link_before'     => '',
												'link_after'      => '',
												'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
												'depth'           => 3,
												'walker'          => new sub_class_menu()
											);

											wp_nav_menu( $defaults );
											?>
										</nav>
									</div>
									<div class="slimScrollBar" style="background: rgb(221, 221, 221); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 54px; height: 757px;"></div>
									<div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 54px;"></div></div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="ov-fit-banner" style="background-image: url(<?=get_field('hero_image');?>)">
				<div class="ov-fit-banner-inner">
					<h1><img width="100px" src="<?=get_template_directory_uri()?>/images/stages/ride-logo-white.png"><br>
                        <?=get_field('hero_title');?>
					</h1>
                    <p><?=get_field('hero_text');?></p>
					<div class="ov-fit-lets-ride-container">
						<a href="#train" class="ov-fit-btn-lg" draggable="false">LET'S RIDE</a>
					</div>
				</div>
				<div class="ov-chevron-down-container">
					<i class="ov-chevron-down"></i>
				</div>
			</div>

			<div class="ov-discover-champion ov-align-center" id="train" style="background-image: url(<?=get_field('discover_image');?>)">
				<div class="ov-discover-champion-inner">
					<h1><?=get_field('discover_title');?></h1>
					<h2><?=get_field('discover_text');?></h2>
					<div>
						<a href="/letsride/" class="ov-fit-btn ov-hide-on-mobile ov-hide-on-tablet" draggable="false">BOOK A TEST DRIVE</a>
					</div>
				</div>
			</div>

			<div class="ov-fit-training-ground-wrapper">
				<div class="ov-fit-training-ground-section">
					<div>
						<img alt="" title="trainingGround" src="<?=get_field('tab1_image');?>">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
								<h2><?=get_field('tab1_title');?></h2>
								<p><?=get_field('tab1_text');?></p>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="https://richmondoval.ca/wp-content/uploads/2018/08/Section_indicator-1.png"/>
							</div>
						</div>
					</div>
				</div>

				<div class="ov-fit-training-ground-section ov-fit-studio-mobile">
					<div>
						<img alt="" title="fitnessCenter" src="<?=get_field('tab2_image');?>">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
                                <h2><?=get_field('tab2_title');?></h2>
                                <p><?=get_field('tab2_text');?></p>
								<a href="/oval-fit-login/" class="ov-fit-btn-lg">RESERVE A BIKE</a>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="https://richmondoval.ca/wp-content/uploads/2018/08/Section_indicator-2.png"/>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ov-ride-machine-wrapper">
				<div class="ov-ride-machine-wrapper-inner">
					<div class="ov-ride-machine-header">
						<div style="flex: 1;">
							<h3><?=get_field('program_title');?></h3>
						</div>
						<div>
							<h4><?=get_field('program_subtitle');?></h4>
							<img class="ov-ride-machine-stages-logo" src="https://richmondoval.ca/wp-content/uploads/2018/08/Stages_logo.png" width="150"/>
						</div>
					</div>
					<div class="ov-ride-machine-container">

						<img class="ov-ride-machine-bike" src="<?=get_field('program_image');?>"/>

						<div class="ov-ride-section ov-ride-display-section">
							<a href="javascript:void(0)" class="ov-ride-display pulse-button">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>
							<img class="ov-ride-display-arm" src="https://richmondoval.ca/wp-content/uploads/2018/09/eco.png" width="316"/>
							<div class="ov-ride-display-content">
								<h5><?=get_field('program1_title');?></h5>
								<p><?=get_field('program1_text');?></p>
							</div>
						</div>

						<div class="ov-ride-section ov-ride-sprintshift-section">
							<a href="javascript:void(0)" class="ov-ride-sprintshift pulse-button">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>

							<img class="ov-ride-sprintshift-arm" src="https://richmondoval.ca/wp-content/uploads/2018/09/sprintshift.png" width="556"/>

							<div class="ov-ride-sprintshift-content">
                                <h5><?=get_field('program2_title');?></h5>
                                <p><?=get_field('program2_text');?></p>
							</div>
						</div>

						<div class="ov-ride-section ov-ride-powermeter-section">
							<a href="javascript:void(0)" class="ov-ride-powermeter pulse-button">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>
							<img class="ov-ride-powermeter-arm" src="https://richmondoval.ca/wp-content/uploads/2018/09/powermeter.png" width="388"/>
							<div class="ov-ride-powermeter-content">
                                <h5><?=get_field('program3_title');?></h5>
                                <p><?=get_field('program3_text');?></p>
							</div>

						</div>

						<div class="ov-ride-section ov-ride-carbonglide-section">
							<a href="javascript:void(0)" class="ov-ride-carbonglide pulse-button">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>

							<img class="ov-ride-carbonglide-arm" src="https://richmondoval.ca/wp-content/uploads/2018/09/carbonglide.png" width="316"/>
							<img class="ov-ride-carbonglide-arm-small" src="https://richmondoval.ca/wp-content/uploads/2018/09/carbonglide-arm-small.jpg" width="316"/>
							<div class="ov-ride-carbonglide-content">
                                <h5><?=get_field('program4_title');?></h5>
                                <p><?=get_field('program4_text');?></p>
							</div>
						</div>
					</div>

					<div class="ov-ride-machine-mobile ov-show-on-mobile">
						<a class="ov-ride-display-mobile pulse-button">
                            <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-sprintshift-mobile pulse-button">
                            <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-powermeter-mobile pulse-button">
                            <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-carbonglide-mobile pulse-button">
                            <img src="https://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
					</div>

					<div class="ov-ride-machine-mobile-content ov-show-on-mobile">
						<div class="ov-ride-display-content-mobile ov-ride-content-mobile ov-hide">
                            <h5><?=get_field('program1_title');?></h5>
                            <p><?=get_field('program1_text');?></p>
						</div>
						<div class="ov-ride-sprintshift-content-mobile ov-ride-content-mobile ov-hide">
                            <h5><?=get_field('program2_title');?></h5>
                            <p><?=get_field('program2_text');?></p>
						</div>
						<div class="ov-ride-powermeter-content-mobile ov-ride-content-mobile ov-hide">
                            <h5><?=get_field('program3_title');?></h5>
                            <p><?=get_field('program3_text');?></p>
						</div>
						<div class="ov-ride-carbonglide-content-mobile ov-ride-content-mobile ov-hide">
                            <h5><?=get_field('program4_title');?></h5>
                            <p><?=get_field('program4_text');?></p>
						</div>

						<div class="ov-ride-mobile-nav ov-hide">
							<a class="ov-ride-mobile-prev-btn">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/09/Group-1-1.png" class="ov-ride-mobile-prev" width="9"/>
                            </a>
							<a class="ov-ride-mobile-next-btn">
                                <img src="https://richmondoval.ca/wp-content/uploads/2018/09/Group-2.png" class="ov-ride-mobile-next" width="9"/>
                            </a>
						</div>
					</div>
				</div>
			</div>

			<?php
			$photos = get_field('team_member_photos');

			// check if the repeater field has rows of data
			if( have_rows('team_member_photos') ): ?>

            <div class="ov-results-team">
                <div class="ov-hide-on-mobile">
                    <div class="ov-results-team-1-info">
                        <h2><?=get_field('team_title');?></h2>
                        <h3 class="ov-coach-name"><?=$photos[0]['team_member_name'];?></h3>
                        <p class="ov-coach-description"><?=get_field('team_text');?></p>
                        <!--<a href="#" class="ov-fit-book-btn ov-show-on-mobile ov-program-offereing-book">> READ MORE</a>-->
                    </div>
                </div>

                <div class="ov-show-on-mobile">
                    <h2><?=get_field('team_title');?></h2>
                </div>

                <div id="thumbnail-slider">
                    <div class="inner">
                        <ul>
                        <?php
                        // loop through the rows of data
                        while ( have_rows('team_member_photos') ) : the_row();
                        ?>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-0"
                                   href="<?=get_sub_field('team_member_photo')['url'];?>"
                                   data-name="<?=get_sub_field('team_member_name');?>"
                                   data-description="<?=get_field('team_text');?>"></a>
                            </li>
                        <?php
                        endwhile;
                        ?>
	                    </ul>
                    </div>
                </div>

                <div class="ov-show-on-mobile ov-coaches-mobile">
                    <h3 class="ov-coach-name"><?=$photos[0]['team_member_name'];?></h3>
                    <p class="ov-coach-description"><?=get_field('team_text');?></p>
                </div>
            </div>

			<?php
			endif;
			?>

		<?php
		if ( count( $sessions ) > 0 && isset( $sessions[0]->StartDateTime ) ) { ?>
          <div class="ov-ride-schedule">
            <img class="ov-ride-schedule-logo"
                 src="<?= get_template_directory_uri() ?>/images/stages/rideSchedule.png" width="520"/>

            <div class="ov-class-container">
              <div class="week-calendar">

				  <?php
				  $sessionCount = 0;
				  $currentDay = 'Monday';
				  $eveTime = '2:00pm';
				  $dayOver = false;
				  ?>
                <div>
                  <h3><span><?=date( "j M", strtotime( $dateFrom ) ) ?></span><?=$currentDay?></h3>
                  <div class="day-sessions">

					  <?php

					  foreach ( $sessions as $session ) {

					  $sessionDate = date( "D, M jS", strtotime( $session->StartDateTime ) );
					  $dayOfWeek = date("l", strtotime( $session->StartDateTime ));

					  $sessionTime = date( "g:ia", strtotime( $session->StartDateTime ) ) . " - " . date( "g:ia", strtotime( '+' . $session->Duration . ' minutes', strtotime( $session->StartDateTime ) ) );

					  $sessionStartTime = date( "g:ia", strtotime( $session->StartDateTime ) );

					  $passed = '';
					  if(strtotime($session->StartDateTime) < strtotime(date("Y-m-d g:ia"))) $passed = 'passed';

					  //next day of the week
					  if($currentDay === $dayOfWeek) {
					  if(!$dayOver && strtotime($sessionStartTime) > strtotime($eveTime)) { ?>
                  </div>
                  <div class="eve-sessions">
					  <?php }
					  ?>

                    <div class="ov-class <?=$passed?>">
                      <div class="ov-class-info">
                        <div class="ov-class-info-text">
                          <p><?= $sessionTime ?></p>
                          <h5><?= $session->Name ?></h5>
                          <p><?= $sessionDate ?></p>
                        </div>
                      </div>
                    </div>

					  <?php

					  } else {

					  $currentDay = $dayOfWeek;
					  $sessionCount ++;
					  ?>
                  </div>
                </div>
                <div>
                  <h3><span><?=date( "j M", strtotime( $session->StartDateTime ) ) ?></span><?=$currentDay?></h3>
                  <div class="day-sessions">
                    <div class="ov-class  <?=$passed?>">
                      <div class="ov-class-info">
                        <div class="ov-class-info-text">
                          <p><?= $sessionTime ?></p>
                          <h5><?= $session->Name ?></h5>
                          <p><?= $sessionDate ?></p>
                        </div>
                      </div>
                    </div>
					  <?php
					  }
					  }
					  ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="ov-align-center">
              <a href="/manage-my-membership/7-day-intro-pass/ " class="ov-fit-btn-lg">ACTIVATE YOUR 7 DAY TRIAL</a>
              <a href="/oval-fit-login/" class="ov-fit-btn-lg">RESERVE A SPOT</a>
            </div>
          </div>
			<?php
		}
		?>

            <div class="ov-fit-results" style="background-image: url(<?=get_field('results_image')?>)">
                <div class="ov-fit-results-inner">
                    <h2><?=get_field('results_title');?></h2>
                    <p><?=get_field('results_text');?></p>
                    <a href="https://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg ov-hide-on-mobile" draggable="false">BOOK A TOUR</a>
                </div>
            </div>

            <div class="ov-align-center">
                <a href="https://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg ov-fit-btn-footer ov-align-center ov-show-on-mobile" draggable="false">BOOK A TOUR</a>
            </div>
		</div>
	</div>
</div>


<footer>
	<div class="footerTop">
		<div class="within">
			<div class="row">
				<div class="footerMenu col-md-7">
					<div class="navHolder">
						<?php
						$args = array(
							'theme_location'  => '',
							'menu'            => 'OVAL SERVICES',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => 'navSec',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s"><h3 class="label">OVAL SERVICES</h3>%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu( $args );
						?>
					</div>
					<div class="navHolder">
						<?php
						$args = array(
							'theme_location'  => '',
							'menu'            => 'The Facility',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => 'navSec',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s"><h3 class="label">The Facility</h3>%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu( $args );
						?>
					</div>
					<div class="navHolder">
						<?php
						$args = array(
							'theme_location'  => '',
							'menu'            => 'The Corporation',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => 'navSec',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s"><h3 class="label">The Corporation</h3>%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu( $args );
						?>
					</div>
					<div class="navHolder">
						<?php
						$args = array(
							'theme_location'  => '',
							'menu'            => 'CONTACT US',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => 'navSec',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s"><h3 class="label">CONTACT US</h3>%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu( $args );
						?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="footerSponsors col-md-5">
					<a title="Facebook" href="https://www.facebook.com/richmondoval" class="soc" target="_blank">
						<i class="fa fa-facebook-official" aria-hidden="true"></i>
					</a>
					<a title="Twitter" href="https://twitter.com/RichmondOval" class="soc" target="_blank">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a title="Instagram" href="https://www.instagram.com/richmondoval/" class="soc" target="_blank">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
					<a title="Blog" href="http://blog.richmondoval.ca/" class="soc" target="_blank">
						<i class="fa fa-rss-square" aria-hidden="true"></i>
					</a>
					<?php if ( is_active_sidebar( 'footer-right' ) ){ ?>
						<?php dynamic_sidebar('footer-right' ); ?>
					<?php }?>
				</div>
				<!--div class="footerSponsors">
                    <img src="<?=get_template_directory_uri()?>/images/basic/sponsors.jpg">
                </div-->
			</div>
		</div>
	</div>
	<div class="footerBottom ">
		<div class="within">
			<div class="copyrightHolder">
				<p class="copyright">
					Copyright <?=date('Y')?> Richmond Olympic Oval
					<span>
						<a href="https://stagesflight.com/Home/TermsOfService">Terms Of Service</a> |
						<a href="/ovalfit-privacy-policy/">Privacy Policy</a>
					</span>

				</p>
			</div>
		</div>
	</div>
</footer>
</body>
