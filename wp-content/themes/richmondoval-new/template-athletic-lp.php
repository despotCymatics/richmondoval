<?php
/**
 * Template Name: Oval Fit Athletic LP
 */

require "stages-api.php";

$monday = strtotime('monday this week');
$sunday = strtotime('monday next week');

$dateFrom = date( 'Y-m-d', $monday );
$dateTo   = date( 'Y-m-d', $sunday );

$sessions = getCurl( $authCodeAthletic, 'https://stagesflight.com/locapi/v1/sessions?dateTimeFrom=' . $dateFrom . '.&dateTimeTo=' . $dateTo );
if ( count( $sessions ) > 1 ) {
	usort( $sessions, function ( $a, $b ) {
		return ( strtotime( $a->StartDateTime ) < strtotime( $b->StartDateTime ) ? - 1 : 1 );
	} );
}

$rand = rand( 0, 999999999999 );

?>

<!Doctype html>
<html>

<head>
  <title>Oval Fit - Athletic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png"
        href="https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/favicon.gif">

  <link rel="stylesheet" href="https://use.typekit.net/arc0dlo.css">
  <link rel="stylesheet" href="https://use.typekit.net/svd3qkc.css">
  <link rel="stylesheet" id="richmondoval-bootstrap-css"
        href="<?= get_template_directory_uri() ?>/css/bootstrap.css?ver=4.9.8" type="text/css"
        media="screen, projection">

  <link href="<?= get_template_directory_uri() ?>/css/ovalfit-lps/shared.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri() ?>/css/ovalfit-lps/athletic.css?<?=$rand?>" rel="stylesheet">
  <link href="<?= get_template_directory_uri() ?>/css/ovalfit-lps/style.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri() ?>/js/ovalfit-lps/thumbnail-slider.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri() ?>/css/font-awesome.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?= get_template_directory_uri() ?>/js/ovalfit-lps//PicCarousel.js"></script>
  <script src="<?= get_template_directory_uri() ?>/js/ovalfit-lps//thumbnail-slider.js" type="text/javascript"></script>
  <script src="<?= get_template_directory_uri() ?>/js/TweenMax.min.js" type="text/javascript"></script>
  <script src="<?= get_template_directory_uri() ?>/js/ScrollMagic.js" type="text/javascript"></script>
  <script src="<?= get_template_directory_uri() ?>/js/animation.gsap.min.js" type="text/javascript"></script>

  <style>
    @import url("https://use.typekit.net/svd3qkc.css");
  </style>

  <script src="<?= get_template_directory_uri() ?>/js/ovalfit-lps/script.js"></script>

  <script>
    (function (d) {
      var config = {
          kitId: 'svd3qkc',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement, t = setTimeout(function () {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function () {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {
        }
      };
      s.parentNode.insertBefore(tk, s)
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
            <img alt="" title="ovalFitLogo" src="https://richmondoval.ca/wp-content/uploads/2018/08/ovalFitLogo.png"
                 width="120">
          </a>
          <div class="ov-nav-ride-container">
            <a href="/lets-run/" class="ov-fit-btn ov-fit-btn-nav ov-fit-btn-nav ov-fit-btn-bold">
              LEARN MORE
            </a>

            <a href="javascript:void(0)" class="ov-fit-hamburger-nav menuToggler"></a>

            <div class="mainMenu">

              <div class="close"><a href="#">X</a></div>
              <div class="within">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 757px;">
                  <div class="scrollable" style="overflow-y: auto; width: auto;">
                    <div class="logoHolder">
                      <a title="Richmond Olympic Oval" href="https://richmondoval.ca">
                        <img width="120px"
                             src="https://richmondoval.ca/wp-content/themes/richmondoval-new/images/basic/logo.png"
                             alt="Site name">
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
                  <div class="slimScrollBar"
                       style="background: rgb(221, 221, 221); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 54px; height: 757px;"></div>
                  <div class="slimScrollRail"
                       style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 54px;"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


      <style>
        .ov-fit-banner {
          background-image: url(<?= get_field( 'hero_image' ); ?>);
        }
        @media (max-width: 1024px) {
          .ov-fit-banner {
            background-image: url(<?= get_field( 'hero_image_tablet' ); ?>);
          }
        }

        @media (max-width: 767px) {
          .ov-fit-banner {
            background-image: url(<?= get_field( 'hero_image_mobile' ); ?>);
          }
        }

      </style>


      <div class="ov-fit-banner">
        <div class="ov-fit-banner-inner">
          <h1><img width="180px" src="<?= get_template_directory_uri() ?>/images/stages/athletic-logo-white.svg"><br>
			  <?= get_field( 'hero_title' ); ?>
          </h1>
          <p><?= get_field( 'hero_text' ); ?></p>
          <div class="ov-fit-lets-ride-container">
            <a href="/oval-fit-login" class="ov-fit-btn-lg" draggable="false">RESERVE A SPOT</a>
          </div>
        </div>
        <div class="ov-chevron-down-container">
          <i class="ov-chevron-down"></i>
        </div>
      </div>

      <div class="ov-discover-champion ov-align-center hideOnMob" id="train">
        <video poster="<?= get_field( 'discover_image' ); ?>" id="bgvid" playsinline autoplay muted loop>
          <source src="/wp-content/uploads/2019/05/athvideo-overlay.mp4" type="video/mp4">
        </video>
        <div class="ov-discover-champion-inner">
          <h1><?= get_field( 'discover_title' ); ?></h1>
          <h2><?= get_field( 'discover_text' ); ?></h2>
          <div class="ov-discover-cta">
            <div>
              <img src="<?= get_template_directory_uri() ?>/images/basic/ro-logo-horizontal.svg">
            </div>
            <div>
              <p>ATHLETIC Programs are included in your Richmond Oval Membership <a href="/manage-my-membership/become-a-member/">BECOME A MEMBER</a></p>
            </div>
          </div>
          <div class="ov-fit-lets-ride-container">
            <a href="/lets-run/" class="ov-fit-btn-lg" draggable="false">LEARN MORE</a>
          </div>
        </div>
      </div>

      <div class="ov-discover-champion ov-align-center hideOnDesk"
           style="background-image: url(<?= get_field( 'discover_image' ); ?>)">
        <div class="ov-discover-champion-inner">
          <h1><?= get_field( 'discover_title' ); ?></h1>
          <h2><?= get_field( 'discover_text' ); ?></h2>
          <div class="ov-discover-cta">
            <div>
              <img src="<?= get_template_directory_uri() ?>/images/basic/ro-logo-horizontal.svg">
            </div>
            <div>
              <p>ATHLETIC Programs are included in your Richmond Oval Membership <a href="/manage-my-membership/become-a-member/">BECOME A MEMBER</a></p>
            </div>
          </div>
          <div class="ov-fit-lets-ride-container">
            <a href="/lets-run/" class="ov-fit-btn-lg" draggable="false">LEARN MORE</a>
          </div>
        </div>
      </div>

      <div class="ov-fit-training-ground-wrapper">

        <div class="ov-fit-training-ground-section scroll-section1">
          <div style="background-image: url(<?= get_field( 'tab1_image' ); ?>)">
            <!--<img alt="" title="trainingGround" src="<? /*=get_field('tab1_image');*/ ?>">-->
          </div>
          <div class="ov-fit-training-ground-text-wrapper">
            <div class="ov-fit-training-ground-text">
              <div>
                <h2><?= get_field( 'tab1_title' ); ?></h2>
                <p><?= get_field( 'tab1_text' ); ?></p>
                <!--<a href="/oval-fit-login/" class="ov-fit-btn-lg">BOOK A SESSION</a>-->
              </div>

              <!--<div class="ov-sectioner-container">
                <img class='ov-sectioner'
                     src="https://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-1.png"/>
              </div>-->

            </div>
          </div>
        </div>

        <div class="ov-fit-training-ground-section scroll-section2">
          <div style="background-image: url(<?= get_field( 'tab2_image' ); ?>) ">
            <!--<img alt="" title="fitnessCenter" src="<? /*=get_field('tab2_image');*/ ?>">-->
          </div>
          <div class="ov-fit-training-ground-text-wrapper">
            <div class="ov-fit-training-ground-text">
              <div>
                <h2><?= get_field( 'tab2_title' ); ?></h2>
                <p><?= get_field( 'tab2_text' ); ?></p>
              </div>
              <!--<div class="ov-sectioner-container">
                <img class='ov-sectioner'
                     src="https://richmondoval.ca/wp-content/uploads/2018/09/Section_indicator-2.png"/>
              </div>-->
            </div>
          </div>
        </div>

      </div>

      <div class="ov-machine-wrapper">
        <div class="ov-machine-wrapper-inner">
          <div class="ov-machine-header">
            <div style="flex: 1;">
              <h3><?= get_field( 'program_title' ); ?></h3>
            </div>
          </div>
          <div class="ov-machine-container">

            <!-- SLIDER 1 -->
            <?php if ( have_rows( 'slider1' ) ): ?>
            <div class="ov-machine-slider first">
                <div class="ov-machine-slides">
	            <?php
              $slideCount = 1;
	            while ( have_rows( 'slider1' ) ) : the_row();
	              if($slideCount == 1) $class = 'active';
	              else $class = ''
	            ?>

                <div class="ov-machine-slide <?=$class?>" data-num="<?=$slideCount?>">
                    <img class="slide-desktop" src="<?= get_sub_field( 'slide_image_desktop' )?>">
                    <img class="slide-tablet" src="<?= get_sub_field( 'slide_image_tablet' )?>">
                    <img class="slide-mobile" src="<?= get_sub_field( 'slide_image_mobile' )?>">
                  <div class="ov-machine-side-text">
                    <h4><?= get_sub_field( 'slide_title' )?></h4>
                    <div>
	                    <?= get_sub_field( 'slide_text' )?>
                    </div>
                  </div>
                </div>
                <?php
              $slideCount++;
              endwhile; ?>
              </div>

              <?php if($slideCount > 2) { ?>
              <div class="ov-machine-slider-nav">
                <span class="left"><i class="fa fa-angle-left"></i></span>
                <span class="right active"><i class="fa fa-angle-right"></i></span>
              </div>
              <?php } ?>
            </div>

            <?php endif; ?>

            <!-- SLIDER 2 -->
	          <?php if ( have_rows( 'slider2' ) ): ?>
              <div class="ov-machine-slider second">
                  <div class="ov-machine-slides">
              <?php
              $slideCount = 1;
              while ( have_rows( 'slider2' ) ) : the_row();
	              if($slideCount == 1) $class = 'active';
	              else $class = ''
                ?>
                <div class="ov-machine-slide <?=$class?>" data-num="<?=$slideCount?>">

                  <img class="slide-desktop" src="<?= get_sub_field( 'slide_image_desktop' )?>">
                  <img class="slide-tablet" src="<?= get_sub_field( 'slide_image_tablet' )?>">
                  <img class="slide-mobile" src="<?= get_sub_field( 'slide_image_mobile' )?>">

                  <div class="ov-machine-side-text">
                    <h4><?= get_sub_field( 'slide_title' )?></h4>
                    <div>
                      <?= get_sub_field( 'slide_text' )?>
                    </div>
                  </div>

                </div>
              <?php
              $slideCount++;
              endwhile; ?>
              </div>

                <?php if($slideCount > 2) { ?>
                <div class="ov-machine-slider-nav">
                  <span class="left"><i class="fa fa-angle-left"></i></span>
                  <span class="right active"><i class="fa fa-angle-right"></i></span>
                </div>
                <?php } ?>
            </div>

	          <?php endif; ?>
          </div>
        </div>
      </div>

		<?php
		$photos = get_field( 'team_member_photos' );

		// check if the repeater field has rows of data
		if ( have_rows( 'team_member_photos' ) ): ?>

          <div class="ov-results-team">
            <div class="ov-hide-on-mobile">
              <div class="ov-results-team-1-info">
                <h2><?= get_field( 'team_title' ); ?></h2>
                <h3 class="ov-coach-name"><?= $photos[0]['team_member_name']; ?></h3>
                <p class="ov-coach-description"><?= get_field( 'team_text' ); ?></p>
                <!--<a href="#" class="ov-fit-book-btn ov-show-on-mobile ov-program-offereing-book">> READ MORE</a>-->
              </div>
            </div>

            <div class="ov-show-on-mobile">
              <h2><?= get_field( 'team_title' ); ?></h2>
            </div>

            <div id="thumbnail-slider">
              <div class="inner">
                <ul>
					<?php
					// loop through the rows of data
					while ( have_rows( 'team_member_photos' ) ) : the_row();
						?>
                      <li>
                        <a class="thumb ov-coach-slider ov-results-team-0"
                           href="<?= get_sub_field( 'team_member_photo' )['url']; ?>"
                           data-name="<?= get_sub_field( 'team_member_name' ); ?>"
                           data-description="<?= get_field( 'team_text' ); ?>"></a>
                      </li>
					<?php
					endwhile;
					?>
                </ul>
              </div>
            </div>

            <div class="ov-show-on-mobile ov-coaches-mobile">
              <h3 class="ov-coach-name"><?= $photos[0]['team_member_name']; ?></h3>
              <p class="ov-coach-description"><?= get_field( 'team_text' ); ?></p>
            </div>
          </div>

		<?php
		endif;
		?>

		<?php
		if ( count( $sessions ) > 0 && isset( $sessions[0]->StartDateTime ) ) { ?>
      <div class="ov-ride-schedule">
        <img class="ov-ride-schedule-logo"
             src="<?= get_template_directory_uri() ?>/images/stages/athleticSchedule.png" width="520"/>

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

      <div class="ov-fit-results" style="background-image: url(<?= get_field( 'results_image' ) ?>)">
        <div class="ov-fit-results-inner">
          <h2><?= get_field( 'results_title' ); ?></h2>
          <p><?= get_field( 'results_text' ); ?></p>
          <a href="/manage-my-membership/become-a-member/"
             class="ov-fit-btn-lg ov-hide-on-mobile" draggable="false">BOOK A TOUR</a>
        </div>
      </div>

      <div class="ov-align-center">
        <a href="/manage-my-membership/become-a-member/"
           class="ov-fit-btn-lg ov-fit-btn-footer ov-align-center ov-show-on-mobile" draggable="false">BOOK A TOUR</a>
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
			<?php if ( is_active_sidebar( 'footer-right' ) ) { ?>
				<?php dynamic_sidebar( 'footer-right' ); ?>
			<?php } ?>
        </div>
        <!--div class="footerSponsors">
                    <img src="<?= get_template_directory_uri() ?>/images/basic/sponsors.jpg">
                </div-->
      </div>
    </div>
  </div>
  <div class="footerBottom ">
    <div class="within">
      <div class="copyrightHolder">
        <p class="copyright">
          Copyright <?= date( 'Y' ) ?> Richmond Olympic Oval
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
