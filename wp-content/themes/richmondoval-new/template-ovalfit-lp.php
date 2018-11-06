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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<h2><?=get_field('ground_title');?></h2>
						<p><?=get_field('ground_text');?>
						</p>
					</div>

					<div class="ov-fit-training-grounds-legend">
						<a href="#ride-studio">01 <span class="blue"></span> <?=get_field('ground_section1_title');?></a>
						<a href="#fitness-center">02 <span class="blue"></span> <?=get_field('ground_section2_title');?></a>
						<a href="#oval-team">03 <span class="blue"></span> <?=get_field('ground_section3_title');?></a>
					</div>
				</div>

				<div class="ov-fit-training-ground-section" id="ride-studio">
					<div style="background-image: url('<?=get_field('ground_section1_image');?>')">
						<img alt="" title="trainingGround" src="<?=get_field('ground_section1_image');?>" >
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text ov-fit-training-ground-ride-studio">
							<div>
								<h2><?=get_field('ground_section1_title');?></h2>
								<p><?=get_field('ground_section1_text');?></p>
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
                    <!--FAQ's-->
                    <div class="ovalfit-faqs" style="display: none;">
                        <span class="close">X</span>
                        <h3>OVALFIT Q AND A</h3>
                        <div class="ovalfit-qas">
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">What is Stages Flight?</a>
                                <p><span style="color: #008BD1;">Stages Flight</span> is a web-based data analysis tool, with big screen display, integrated spot-reservation and mobile applications Its functions include dynamic FTP testing, custom intensity rides, GPS rides, and competition modes. Video integration and coaches cueing top off the experience for a true power-based indoor cycling solution. <a href="http://stagesflight.com" target="_blank">http://stagesflight.com</a>
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">Do I have to create an OVALfit profile?</a>
                                <p>In order to receive a record of your performance metrics and be able to book your spot and bike in
                                    advance, an Ovalfit profile is necessary. Otherwise, you are welcome to register for class in person at
                                    the front desk a half hour prior to the class start time.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">Can I only register online?</a>
                                <p>Online registration will enable you to select your bike and track your performance. If you prefer you can
                                    register in person at the front desk.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">How can I view my performance metrics?</a>
                                <p>OVALfit will display a summary of your performance metrics. For a more in-depth view of your Ride statistics, please login here: <a  href="http://stagesflight.com" target="_blank">http://stagesflight.com</a>.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">Do I still need to use my Stages App?</a>
                                <p>Your OVALfit profile provides you with greater convenience and ease of use. You will no longer be required to connect your app to the power meter of your bike. Instead, your OVALfit profile will automatically sync with the power meter and log your workout data.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">I already have a Stages Flight account. Will the previous data carry over to my OVALfit profile?</a>
                                <p>Your OVALfit profile provides you with greater convenience and ease of use. You will no longer be required to connect your app to the power meter of your bike. Instead, your OVALfit profile will automatically sync with the power meter and log your workout data.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">What if class is full?</a>
                                <p>Keep checking back online to see if a spot has opened up. Class participants now have the ability to withdraw themselves from class so the attendance lists are constantly changing.
                                </p>
                            </div>
                            <div class="ovalfit-qa">
                                <a href="javascript:void(0);">What if I am not a Richmond Olympic Oval member?</a>
                                <p>In order to register in advance for a class, you must have a valid pass or membership with the Oval. To view rates, click here <a href="http://richmondoval.ca/drop-in/rates/" target="_blank">http://richmondoval.ca/drop-in/rates/</a>
                                </p>
                            </div>
                        </div>

                        <div class="ovalfit-qa-single"></div>
                    </div>
					<div>
						<img alt="" title="fitnessCenter" src="<?=get_field('ground_section2_image');?>">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
								<h2><?=get_field('ground_section2_title');?></h2>
								<p><?=get_field('ground_section2_text');?></p>
                                <a class="ovalfit-faq-trigger" href="javascript:void(0)">&gt; OVALfit QUESTIONS</a>
							</div>
							<div class="ov-sectioner-container">
								<img class='ov-sectioner' src="http://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-2.png"/>
							</div>
						</div>
					</div>
				</div>

				<div class="ov-fit-training-ground-section" id="oval-team">
					<div class="ov-no-line-height">
						<img alt="" title="trainingGround" src="<?=get_field('ground_section3_image');?>">
					</div>
					<div class="ov-fit-training-ground-text-wrapper">
						<div class="ov-fit-training-ground-text">
							<div>
								<h2><?=get_field('ground_section3_title');?></h2>
								<p><?=get_field('ground_section3_text');?></p>
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
						<h2><?=get_field('offerings_title');?></h2>
						<img class="ov-ride-logo" src="<?=get_field('program1_logo');?>"/>
						<p><?=get_field('program1_text');?></p>
						<span class="ov-coming-soon"></span>
						<a href="/ovalfit/ride/" class="ov-fit-btn-lg">LEARN MORE</a>
					</div>

					<div>
						<a class="ov-program-btn ov-program-ride-btn" data-name="ride" data-learn-link="/oval-fit-login/" data-learn-txt="LEARN MORE" data-description="<?=get_field('program1_text');?>" data-logo="<?=get_field('program1_logo');?>">
							<img src="<?=get_field('program1_image');?>" class="ov-team-image-program0">
						</a>
						<a class="ov-program-btn ov-program-lift-btn" data-name="lift" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" data-description="<?=get_field('program2_text');?>" data-logo="<?=get_field('program2_logo');?>">
							<img src="<?=get_field('program2_image');?>" class="ov-team-image-program2 ov-team-image-program">
						</a>
					</div>

					<div>
						<a class="ov-program-btn ov-program-flow-btn" data-name="flow" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" data-description="<?=get_field('program3_text');?>" data-logo="<?=get_field('program3_logo');?>">
							<img src="<?=get_field('program3_image');?>" class="ov-team-image-program1 ov-team-image-program">
						</a>
						<a class="ov-program-btn ov-program-cardio-btn" data-name="cardio" data-learn-link="" data-learn-txt="" data-coming-soon="LAUNCHING SOON" 						   data-description="<?=get_field('program4_text');?>" data-logo="<?=get_field('program4_logo');?>">
							<img src="<?=get_field('program4_image');?>" class="ov-team-image-program1 ov-team-image-program">
						</a>
					</div>
				</div>
			</div>

			<div class="ov-program-offerings-mobile">
				<h2><?=get_field('offerings_title');?></h2>
				<div class="ov-program-offerings-mobile-items">
					<div class="ov-program-offerings-mobile-item">
						<img src="<?=get_field('program1_image');?>">
						<img class="ov-ride-logo" src="<?=get_field('program1_logo');?>"/>
						<p><?=get_field('program1_text');?></p>
						<div class="ov-btn-container">
							<a href="/ovalfit/ride/" class="ov-fit-btn">LEARN MORE</a>
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="<?=get_field('program2_image');?>">
						<img class="ov-ride-logo" src="<?=get_field('program2_logo');?>"/>
						<p><?=get_field('program2_text');?></p>
						<div class="ov-btn-container">
							<span class="ov-coming-soon">LAUNCHING SOON</span>
							<!--<a href="#" class="ov-fit-btn">COMING SOON</a>-->
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="<?=get_field('program3_image');?>">
						<img class="ov-ride-logo" src="<?=get_field('program3_logo');?>"/>
						<p><?=get_field('program3_text');?></p>
						<div class="ov-btn-container">
							<span class="ov-coming-soon">LAUNCHING SOON</span>
							<!-- <a href="#" class="ov-fit-btn">COMING SOON</a>-->
						</div>
						<!--<a href="#" class="ov-fit-book-btn ov-program-offereing-book">> BOOK YOUR CLASS</a>-->
					</div>
					<div class="ov-program-offerings-mobile-item">
						<img src="<?=get_field('program4_image');?>">
						<img class="ov-ride-logo" src="<?=get_field('program4_logo');?>"/>
						<p><?=get_field('program4_text');?></p>
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
					<h2><?=get_field('team_title');?></h2>
					<p><?=get_field('team_text');?></p>
				</div>
				<div class="ov-fit-results-members">
					<img src="<?=get_field('team1_photo');?>" class="ov-team-image ov-team-image-1"/>
					<img src="<?=get_field('team2_photo');?>" class="ov-team-image ov-team-image-2"/>
					<img src="<?=get_field('team3_photo');?>" class="ov-team-image ov-team-image-3"/>
					<img src="<?=get_field('team4_photo');?>" class="ov-team-image ov-team-image-4"/>
				</div>
			</div>

			<div class="ov-fit-results" style="background-image: url(<?=get_field('results_image');?>);">
				<div class="ov-fit-results-inner">
					<h2><?=get_field('results_title');?></h2>
					<p><?=get_field('results_text');?></p>
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
</html>
