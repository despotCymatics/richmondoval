<?php
/**
* Template Name: Oval Fit LP
*/
?>


<!Doctype html>
<html>

<head>
	<title>Oval Fit</title>
	<link rel="shortcut icon" type="image/png" href="http://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/favicon.gif">

	<link rel="stylesheet" href="https://use.typekit.net/arc0dlo.css">
	<link rel="stylesheet" href="https://use.typekit.net/svd3qkc.css">
	<link rel="stylesheet" id="richmondoval-bootstrap-css" href="<?=get_template_directory_uri()?>/css/bootstrap.css?ver=4.9.8" type="text/css" media="screen, projection">

	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/site.css" rel="stylesheet">
	<link href="<?=get_template_directory_uri()?>/css/ovalfit-lps/shared.css" rel="stylesheet">
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

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<div class="main-container">
	<div class="content">
		<div class="content-body">

			<div class="ov-fit-nav">
				<div class="ov-fit-nav-inner">
					<a href="#" class="ov-fit-logo">
						<img alt="" title="ovalFitLogo" src="http://richmondoval.ca/wp-content/uploads/2018/08/ovalFitLogo.png" width="120">
					</a>
					<div class="ov-nav-btn-container">
						<a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn ov-fit-btn-nav ov-fit-btn-bold">
							BOOK A TOUR
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
					<h1><?=get_field('hero_title');?></h1>
					<p><?=get_field('hero_text');?></p>
					<div>
						<a href="#discover" class="ov-fit-btn-lg ov-fit-banner-btn" draggable="false">LEARN MORE</a>
					</div>
				</div>
				<div class="ov-chevron-down-container">
					<i class="ov-chevron-down"></i>
				</div>
			</div>

			<div class="ov-discover-champion ov-align-center" id="discover">
				<h1><?=get_field('discover_title');?></h1>
			</div>
			<div class="ov-discover-champion ov-align-center">
				<h2><?=get_field('discover_text');?></h2>
			</div>
			<div class="ov-discover-champion ov-align-center">
				<h3><?=get_field('tabs_title');?></h3>
			</div>
			<div class="ov-discover-champion-interactive" >
				<div class="ov-discover-champion-interactive-inner ov-legacy-section1">
					<div class="ov-discover-numbers">
						<a class="ov-discover-number-btn1 ov-discover-numbers-active"><?=get_field('tab1_title');?></a>
						<a class="ov-discover-number-btn2"><?=get_field('tab2_title');?></a>
						<a class="ov-discover-number-btn3"><?=get_field('tab3_title');?></a>
					</div>
					<img alt="" title="legacyBanner" src="<?=get_field('tab1_image');?>">

					<div class="ov-discover-champion-info">
						<h3><?=get_field('tab1_text');?></h3>
						<a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg">BOOK A TOUR</a>
					</div>
				</div>
				<div class="ov-discover-champion-interactive-inner ov-hide ov-legacy-section2">
					<div class="ov-discover-numbers">
						<a href="#" class="ov-discover-number-btn1"><?=get_field('tab1_title');?></a>
						<a href="#" class="ov-discover-number-btn2 ov-discover-numbers-active"><?=get_field('tab2_title');?></a>
						<a href="#" class="ov-discover-number-btn3"><?=get_field('tab3_title');?></a>
					</div>
					<img alt="" title="legacyBanner" src="<?=get_field('tab2_image');?>">
					<div class="ov-discover-champion-info">
						<h3><?=get_field('tab2_text');?></h3>
						<a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg">BOOK A TOUR</a>
					</div>
				</div>
				<div class="ov-discover-champion-interactive-inner ov-hide ov-legacy-section3">
					<div class="ov-discover-numbers">
						<a href="#" class="ov-discover-number-btn1"><?=get_field('tab1_title');?></a>
						<a href="#" class="ov-discover-number-btn2"><?=get_field('tab2_title');?></a>
						<a href="#" class="ov-discover-number-btn3 ov-discover-numbers-active"><?=get_field('tab3_title');?></a>
					</div>
					<img alt="" title="legacyBanner" src="<?=get_field('tab3_image');?>">
					<div class="ov-discover-champion-info">
						<h3><?=get_field('tab3_text');?></h3>
						<a href="http://richmondoval.ca/membership-admissions/become-a-member/" class="ov-fit-btn-lg">BOOK A TOUR</a>
					</div>
				</div>
			</div>

			<div class="ov-fit-training-ground-wrapper">
				<div class="ov-fit-training-ground-section-header ov-align-center">
					<div>
						<h2>YOUR TRAINING GROUND</h2>
						<p>The Richmond Oval is your long term training solution. The OVALfit team, our fitness centre and specialized training studios will inspire you to reach your personal podium. Join a group of like minded people to achieve your fitness goals with the support of each other and our team.
						</p>
					</div>

					<div class="ov-fit-training-grounds-legend">
						<a href="#ride-studio">01 <span class="blue"></span> RIDE STUDIO</a>
						<a href="#fitness-center">02 <span class="blue"></span> FITNESS CENTER</a>
						<a href="#oval-team">03 <span class="blue"></span> OVAL TEAM</a>
					</div>
				</div>

				<div class="ov-fit-training-ground-section" id="ride-studio">
					<div>
						<img alt="" title="trainingGround" src="./img/Group-2.jpg">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text ov-fit-training-ground-ride-studio">
							<div>
								<h2>RIDE <br>STUDIO</h2>
								<p>Immerse yourself in our newly renovated studio designed to deliver a boundary-pushing performance based indoor cycling experience.</p>
								<div class='ov-ride-btn-container'>
									<a href="/ovalfit/ride/" class="ov-fit-btn-nochange">LEARN MORE</a>
								</div>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-1.png"/>
							</div>
						</div>
					</div>
				</div>

				<div class="ov-fit-training-ground-section" id="fitness-center">
					<div>
						<img alt="" title="fitnessCenter" src="./img/new_fitness_center_image_desktop.jpg">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
								<h2>FITNESS CENTER</h2>
								<p>Our 12,000 SQFT fitness mezzanine is where individuals aspiring to push their limits train. The fitness mezzanine is strategically arranged in pods; functional training, strength training, Olympic lifting and adaptive equipment with endless cardiovascular machines to meet everyone's exercise needs.
								</p>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-2.png"/>
							</div>
						</div>
					</div>
				</div>

				<div class="ov-fit-training-ground-section" id="oval-team">
					<div class="ov-no-line-height">
						<img alt="" title="trainingGround" src="./img/Ovalteam_Jodi.jpg">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
								<h2>OVALFIT TEAM</h2>
								<p>The OVALfit team consist of trainers, coaches and fitness attendants with a common goal - empowering our members to reach their personal podium. Our team is highly educated on effective training methods and passionate about providing our guests with the knowledge to succeed.
								</p>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-3.png"/>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ov-program-offerings">
				<div class="ov-program-offerings-inner">
					<div class="ov-program-offerings-content">
						<h2>PROGRAM OFFERINGS</h2>
						<img class="ov-ride-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/rideLogo.png"/>
						<p>Get your heart pumping to pulsating beats as you immerse yourself in a multimedia, power-based indoor cycling experience.</p>
						<span class="ov-coming-soon"></span>
						<a href="/ovalfit/ride/" class="ov-fit-btn-lg">LEARN MORE</a>
					</div>
					<div>
						<a class="ov-program-btn ov-program-ride-btn" data-name="ride" data-learn-link="/oval-fit-login/" data-learn-txt="LEARN MORE" data-description="Get your heart pumping to pulsating beats as you immerse yourself in a multimedia, power-based indoor cycling experience." data-logo="http://richmondoval.ca/wp-content/uploads/2018/08/rideLogo.png"><img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-ride.jpg" class="ov-team-image-program0"></a>

						<a class="ov-program-btn ov-program-lift-btn" data-name="lift" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" data-description="Find your inner athlete. ATHLETIC delivers heart rate based training concentrating on movement and performance" data-logo="./img/2018_Athletic_Logo_white.png"><img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-lift.jpg" class="ov-team-image-program2 ov-team-image-program"></a>
					</div>

					<div>
						<a class="ov-program-btn ov-program-flow-btn" data-name="flow" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" data-description="Take a break with FLOW - our recovery and regeneration classes that rejuvenate your body and soul." data-logo="http://richmondoval.ca/wp-content/uploads/2018/08/flowLogo.png"><img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-yoga.jpg" class="ov-team-image-program1 ov-team-image-program"></a>

						<a class="ov-program-btn ov-program-cardio-btn" data-name="cardio" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" data-description=" Who says it can't be all fun and games? Get your heart pumping and body moving through fun, movement-based classes. " data-logo="http://richmondoval.ca/wp-content/uploads/2018/08/moreLogo.png"><img src="./img/New_move_image.jpg" class="ov-team-image-program1 ov-team-image-program"></a>
					</div>
				</div>
			</div>

			<div class="ov-program-offerings-mobile">
				<h2>PROGRAM OFFERINGS</h2>
				<div class="ov-program-offerings-mobile-items">
					<div class="ov-program-offerings-mobile-item">
						<img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-ride.jpg">
						<img class="ov-ride-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/rideLogo.png"/>
						<p>Get your heart pumping to pulsating beats as you immerse yourself in a multimedia, power-based indoor cycling experience.</p>
						<div class="ov-btn-container">
							<a href="/ovalfit/ride/" class="ov-fit-btn">LEARN MORE</a>
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-yoga.jpg">
						<img class="ov-ride-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/flowLogo.png"/>
						<p>Take a break with FLOW - our recovery and regeneration classes that rejuvenate your body and soul. </p>
						<div class="ov-btn-container">
							<span class="ov-coming-soon">LAUNCHING SOON</span>
							<!--<a href="#" class="ov-fit-btn">COMING SOON</a>-->
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="http://richmondoval.ca/wp-content/uploads/2018/09/753-lift.jpg">
						<img class="ov-ride-logo" src="./img/2018_Athletic_Logo_white.png"/>
						<p>Find your inner athlete. ATHLETIC delivers heart rate based training concentrating on movement and performance</p>
						<div class="ov-btn-container">
							<span class="ov-coming-soon">LAUNCHING SOON</span>
							<!-- <a href="#" class="ov-fit-btn">COMING SOON</a>-->
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="./img/New_move_image.jpg">
						<img class="ov-ride-logo" src="http://richmondoval.ca/wp-content/uploads/2018/08/moreLogo.png"/>
						<p>Who says it can't be all fun and games? Get your heart pumping and body moving through fun, movement-based classes. </p>
						<div class="ov-btn-container">
							<span class="ov-coming-soon">LAUNCHING SOON</span>
							<!--<a href="#" class="ov-fit-btn">COMING SOON</a>-->
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
				</div>
			</div>

			<div class="ov-results-team ov-align-center">
				<div>
					<h2>YOUR RESULTS TEAM</h2>
					<p>Our team of highly educated, passionate, and diverse trainers inspire and energize you to
						help you transform your fitness goals into reality. We're focused on building a supportive
						culture with an overarching goal of improving your health, wellness, mobility, and strength.
						You may be surprised at the new adventures you'll be able to experience as a result!
					</p>
				</div>
				<div class="ov-fit-results-members">
					<img src="http://richmondoval.ca/wp-content/uploads/2018/08/team1.png" class="ov-team-image ov-team-image-1"/>
					<img src="./img/New_trainer_Pat.jpg" class="ov-team-image ov-team-image-2"/>
					<img src="http://richmondoval.ca/wp-content/uploads/2018/08/team3.png" class="ov-team-image ov-team-image-3"/>
					<img src="http://richmondoval.ca/wp-content/uploads/2018/08/team4.png" class="ov-team-image ov-team-image-4"/>
				</div>
			</div>

			<div class="ov-fit-results">
				<div class="ov-fit-results-inner">
					<h2>WANT RESULTS?<br>
						GET RESULTS
					</h2>
					<p>Getting a membership is easy! Schedule a tour with our member care team. It's time to see your fitness goals come to life.</p>
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
						<ul id="navSec" class=""><h3 class="label">OVAL SERVICES</h3><li id="menu-item-44781" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44781"><a href="http://richmondoval.ca/membership-admissions/become-a-member/membership-admission-rates/">Membership &amp; Admission Rates</a></li>
							<li id="menu-item-44782" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44782"><a href="http://richmondoval.ca/membership-admissions/become-a-member/">Become a Member</a></li>
							<li id="menu-item-44784" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44784"><a href="http://richmondoval.ca/fitness-wellness/">Fitness &amp; Wellness</a></li>
							<li id="menu-item-44785" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44785"><a href="http://richmondoval.ca/community-sport/">Community Sports</a></li>
							<li id="menu-item-44786" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44786"><a href="http://richmondoval.ca/therox/">Olympic Museum</a></li>
							<li id="menu-item-44787" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44787"><a href="http://richmondoval.ca/on-site-services/">On Site Services</a></li>
						</ul>                    </div>
					<div class="navHolder">
						<ul id="navSec" class=""><h3 class="label">The Facility</h3><li id="menu-item-2106" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2106"><a href="http://richmondoval.ca/facility/fitness-centre/">Fitness Centre</a></li>
							<li id="menu-item-2107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2107"><a href="http://richmondoval.ca/facility/ice-courts-track/">Ice, Courts, Track</a></li>
							<li id="menu-item-43546" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43546"><a href="http://richmondoval.ca/facility/climbing/">Climbing Wall</a></li>
							<li id="menu-item-2109" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2109"><a href="http://richmondoval.ca/facility/fitness-studios/">Fitness Studios</a></li>
							<li id="menu-item-2110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2110"><a href="http://richmondoval.ca/facility/riverport-community-paddling-centre/">Riverport Community Paddling Centre</a></li>
							<li id="menu-item-2111" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2111"><a href="http://richmondoval.ca/facility/ocafe/">O|Cafe</a></li>
							<li id="menu-item-42657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42657"><a href="http://richmondoval.ca/drop-in/child-minding/">Child Minding</a></li>
							<li id="menu-item-38031" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38031"><a href="http://richmondoval.ca/facility/rox-shop/">ROX SHOP</a></li>
							<li id="menu-item-40523" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40523"><a href="http://richmondoval.ca/location-2/driving-instructions/">Driving Instructions</a></li>
							<li id="menu-item-40524" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40524"><a href="http://richmondoval.ca/facility/hours-location/">Hours &amp; Location</a></li>
						</ul>                    </div>
					<div class="navHolder">
						<ul id="navSec" class=""><h3 class="label">The Corporation</h3><li id="menu-item-45254" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45254"><a href="http://richmondoval.ca/about-us/">About Us</a></li>
							<li id="menu-item-2101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2101"><a href="http://richmondoval.ca/board-of-directors/">Board of Directors</a></li>
							<li id="menu-item-4631" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4631"><a href="http://richmondoval.ca/annual-report/">Annual Reports</a></li>
							<li id="menu-item-40528" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40528"><a href="http://richmondoval.ca/financial-information/">Financial Information</a></li>
							<li id="menu-item-5831" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5831"><a href="http://richmondoval.ca/games-operating-trust/">Games Operating Trust</a></li>
						</ul>                    </div>
					<div class="navHolder">
						<ul id="navSec" class=""><h3 class="label">CONTACT US</h3><li id="menu-item-44768" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44768"><a href="/contact/">General Inquiries</a></li>
							<li id="menu-item-44769" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44769"><a href="http://richmondoval.ca/staff-directory2/">Staff Directory by First Name</a></li>
							<li id="menu-item-44770" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44770"><a href="http://richmondoval.ca/staff-directory3/">Staff Directory by Department</a></li>
							<li id="menu-item-44771" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44771"><a href="http://careers.richmondoval.ca">Careers</a></li>
							<li id="menu-item-44772" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44772"><a href="http://richmondoval.ca/volunteers/">Volunteers</a></li>
						</ul>                    </div>
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
					<h3 class="label">Proud Partners of</h3>			<div class="textwidget"><a href="#" target="_blank">
							<img style="width:175px; height:auto;" src="/wp-content/themes/richmondoval-new/images/basic/ro-logo-legacy.png"></a>
						<a href="http://www.telus.com/en/bc/index.jsp" target="_blank">
							<img style="width:175px; height:auto;" src="/wp-content/themes/richmondoval-new/images/basic/telus-logo.png"></a>
						<a href="http://www.scotiabank.com/ca/en/" target="_blank">
							<img src="/wp-content/uploads/2016/02/scotiabank.png">
						</a>
						<a href="http://www.stuartolson.com/" target="_blank">
							<img src="/wp-content/uploads/2016/02/stuartolson.png">
						</a>
						<a href="http://lehighhansoncanada.com/" target="_blank">
							<img src="/wp-content/themes/richmondoval-new/images/basic/lh-logo.png">
						</a>
					</div>
				</div>
				<!--div class="footerSponsors">
					<img src="http://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/sponsors.jpg">
				</div-->
			</div>
		</div>
	</div>
	<div class="footerBottom">
		<div class="within">
			<div class="copyrightHolder">
				<p class="copyright">Copyright 2018 Richmond Olympic Oval
					<a href="https://stagesflight.com/Home/TermsOfService">Terms Of Service</a> |
					<a href="/ovalfit-privacy-policy/">Privacy Policy</a>
				</p>
			</div>
		</div>
	</div>
</footer>
</body>

</html>
