<?php
/**
 * Template Name: Oval Fit Ride LP
 */
?>


<!Doctype html>
<html>

<head>
	<title>Oval Fit - Ride</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="http://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/favicon.gif">

	<link rel="stylesheet" href="https://use.typekit.net/arc0dlo.css">
	<link rel="stylesheet" href="https://use.typekit.net/svd3qkc.css">
	<link rel="stylesheet" id="richmondoval-bootstrap-css" href="<?=get_template_directory_uri()?>/css/bootstrap.css?ver=4.9.8" type="text/css" media="screen, projection">

	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/shared.css" rel="stylesheet">
	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/ride.css" rel="stylesheet">
	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

</head>

<body>
<div class="main-container">
	<div class="content">
		<div class="content-body">

			<div class="ov-fit-nav">
				<div class="ov-fit-nav-inner">
					<a href="/ovalfit-staging" class="ov-fit-logo">
						<img alt="" title="ovalFitLogo" src="http://richmondoval.ca/wp-content/uploads/2018/08/ovalFitLogo.png" width="120">
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
											<a title="Richmond Olympic Oval" href="http://richmondoval.ca">
												<img width="120px" src="http://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/logo.png" alt="Site name">
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
						<a href="/oval-fit-login/" class="ov-fit-btn ov-hide-on-mobile ov-hide-on-tablet" draggable="false">BOOK A TEST DRIVE</a>
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
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/08/Section_indicator-1.png"/>
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
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/08/Section_indicator-2.png"/>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ov-ride-machine-wrapper">
				<div class="ov-ride-machine-wrapper-inner">
					<div class="ov-ride-machine-header">
						<div style="flex: 1;">
							<h3><?=get_field('ride_machine_title');?></h3>
						</div>
						<div>
							<h4><?=get_field('programs_subtitle');?></h4>
							<img class="ov-ride-machine-stages-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/Stages_logo.png" width="150"/>
						</div>
					</div>
					<div class="ov-ride-machine-container">

						<img class="ov-ride-machine-bike" src="<?=get_field('program_image');?>"/>

						<div class="ov-ride-section ov-ride-display-section">
							<a href="javascript:void(0)" class="ov-ride-display pulse-button">
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>
							<img class="ov-ride-display-arm" src="http://richmondoval.ca/wp-content/uploads/2018/09/eco.png" width="316"/>
							<div class="ov-ride-display-content">
								<h5><?=get_field('program1_title');?></h5>
								<p><?=get_field('program1_text');?></p>
							</div>
						</div>

						<div class="ov-ride-section ov-ride-sprintshift-section">
							<a href="javascript:void(0)" class="ov-ride-sprintshift pulse-button">
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>

							<img class="ov-ride-sprintshift-arm" src="http://richmondoval.ca/wp-content/uploads/2018/09/sprintshift.png" width="556"/>

							<div class="ov-ride-sprintshift-content">
                                <h5><?=get_field('program2_title');?></h5>
                                <p><?=get_field('program2_text');?></p>
							</div>
						</div>

						<div class="ov-ride-section ov-ride-powermeter-section">
							<a href="javascript:void(0)" class="ov-ride-powermeter pulse-button">
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>
							<img class="ov-ride-powermeter-arm" src="http://richmondoval.ca/wp-content/uploads/2018/09/powermeter.png" width="388"/>
							<div class="ov-ride-powermeter-content">
                                <h5><?=get_field('program3_title');?></h5>
                                <p><?=get_field('program3_text');?></p>
							</div>

						</div>

						<div class="ov-ride-section ov-ride-carbonglide-section">
							<a href="javascript:void(0)" class="ov-ride-carbonglide pulse-button">
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                            </a>

							<img class="ov-ride-carbonglide-arm" src="http://richmondoval.ca/wp-content/uploads/2018/09/carbonglide.png" width="316"/>
							<img class="ov-ride-carbonglide-arm-small" src="http://richmondoval.ca/wp-content/uploads/2018/09/carbonglide-arm-small.jpg" width="316"/>
							<div class="ov-ride-carbonglide-content">
                                <h5><?=get_field('program4_title');?></h5>
                                <p><?=get_field('program4_text');?></p>
							</div>
						</div>
					</div>

					<div class="ov-ride-machine-mobile ov-show-on-mobile">
						<a class="ov-ride-display-mobile pulse-button">
                            <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-sprintshift-mobile pulse-button">
                            <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-powermeter-mobile pulse-button">
                            <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
                        </a>
						<a class="ov-ride-carbonglide-mobile pulse-button">
                            <img src="http://richmondoval.ca/wp-content/uploads/2018/08/rideMachineHotspot.png" width="22">
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
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/09/Group-1-1.png" class="ov-ride-mobile-prev" width="9"/>
                            </a>
							<a class="ov-ride-mobile-next-btn">
                                <img src="http://richmondoval.ca/wp-content/uploads/2018/09/Group-2.png" class="ov-ride-mobile-next" width="9"/>
                            </a>
						</div>
					</div>
				</div>
			</div>

            <div class="ov-results-team">
                <div class="ov-hide-on-mobile">
                    <div class="ov-results-team-1-info">
                        <h2><?=get_field('team_title');?></h2>
                        <h3 class="ov-coach-name">JODI</h3>
                        <p class="ov-coach-description"><?=get_field('team_text');?></p>
                        <a href="#" class="ov-fit-book-btn ov-show-on-mobile ov-program-offereing-book">> READ MORE</a>
                    </div>
                </div>

                <div class="ov-show-on-mobile">
                    <h2>OUR RIDE COACHES</h2>
                </div>

                <div id="thumbnail-slider">
                    <div class="inner">
                        <ul>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-0"
                                   href="<?=get_field('team1_photo');?>" data-name="Jodi" data-description="<?=get_field('team_text');?>"></a>
                            </li>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-1"
                                   href="<?=get_field('team2_photo');?>" data-name="Ashley" data-description="<?=get_field('team_text');?>"></a>
                            </li>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-2"
                                   href="<?=get_field('team3_photo');?>" data-name="Caitlin" data-description="<?=get_field('team_text');?>"></a>
                            </li>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-3"
                                   href="<?=get_field('team4_photo');?>" data-name="Melina" data-description="<?=get_field('team_text');?>"></a>
                            </li>
                            <li>
                                <a class="thumb ov-coach-slider ov-results-team-4"
                                   href="<?=get_field('team5_photo');?>" data-name="Sheldon" data-description="<?=get_field('team_text');?>"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ov-show-on-mobile ov-coaches-mobile">
                    <h3 class="ov-coach-name">JODI STOKES</h3>
                    <p class="ov-coach-description"><?=get_field('team_text');?></p>
                </div>

            </div>

            <!-- <div class="ov-ride-schedule">
				 <img class="ov-ride-schedule-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/rideSchedule.png" width="438"/>

				 <div class="ov-class-container">

					 <div class="ov-class">
						 <div class="ov-class-info">
							 <img class="ov-hide-on-mobile" src="http://richmondoval.ca/wp-content/uploads/2018/08/Oval.png" height="40" width="40"/>
							 <div class="ov-class-info-text">
								 <h5>RIDE FOUNDATIONS</h5>
								 <p>
									 <span class="ov-schedule-date">Tues, Aug 14th</span> <span>9:15am - 10:00am</span>
								 </p>
							 </div>
						 </div>
						 <div>
							 <a href="#" class="ov-fit-btn-blue">BOOK YOUR BIKE</a>
						 </div>
					 </div>

					 <div class="ov-class">
						 <div class="ov-class-info">
							 <img class="ov-hide-on-mobile"  src="http://richmondoval.ca/wp-content/uploads/2018/08/Oval.png" height="40" width="40"/>
							 <div class="ov-class-info-text">
								 <h5>RIDE FOUNDATIONS</h5>
								 <p>
									 <span class="ov-schedule-date">Tues, Aug 14th</span> <span>9:15am - 10:00am</span>
								 </p>
							 </div>
						 </div>
						 <div>
							 <a href="#" class="ov-fit-btn-blue">BOOK YOUR BIKE</a>
						 </div>
					 </div>

					 <div class="ov-class">
						 <div class="ov-class-info">
							 <img class="ov-hide-on-mobile"  src="http://richmondoval.ca/wp-content/uploads/2018/08/Oval.png" height="40" width="40"/>
							 <div class="ov-class-info-text">
								 <h5>RIDE FOUNDATIONS</h5>
								 <p>
									 <span class="ov-schedule-date">Tues, Aug 14th</span> <span>9:15am - 10:00am</span>
								 </p>
							 </div>
						 </div>
						 <div>
							 <a href="#" class="ov-fit-btn-blue">BOOK YOUR BIKE</a>
						 </div>
					 </div>

				 </div>

				 <div class="ov-align-center">
					 <a href="#" class="ov-fit-btn-lg">MORE CLASSES</a>
				 </div>
			 </div>-->

            <div class="ov-fit-results">
                <div class="ov-fit-results-inner">
                    <h2>WANT RESULTS?<br>
                        GET RESULTS
                    </h2>
                    <p>Experience Stages and OVALfit difference. Schedule a tour with our member care team. It’s time to see your fitness goals come to life</p>
                    <a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg ov-hide-on-mobile" draggable="false">BOOK A TOUR</a>
                </div>
            </div>

            <div class="ov-align-center">
                <a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg ov-fit-btn-footer ov-align-center ov-show-on-mobile" draggable="false">BOOK A TOUR</a>
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
