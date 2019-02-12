<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">

<head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" type="image/png" href="<?=get_stylesheet_directory_uri();?>/images/basic/favicon.gif"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head();?>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68610770-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
    (function(d, s, id) {
      window.Wishpond = window.Wishpond || {};
      Wishpond.merchantId = '1298220';
      Wishpond.writeKey = '45a34a9a1d39';
      var js, wpjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//cdn.wishpond.net/connect.js";
      wpjs.parentNode.insertBefore(js, wpjs);
    }(document, 'script', 'wishpond-connect'));
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KW4BQQK');</script>
    <!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?> style="overflow: hidden;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW4BQQK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="loading-wrap">
	    <?php if(is_page_template("template-stages.php") || is_page_template("template-stages_login.php") || is_page_template("template-stages_registration.php") || is_page_template("template-stages_holding_page.php")) { ?>

            <img class="logo-animate" title="logo-animate" src="<?=get_template_directory_uri()?>/images/basic/oval-fit-logo-black.png"><br>
            <img class="dots" src="<?=get_template_directory_uri()?>/images/basic/oval-fit-loading-dots.gif">
        <?php }else { ?>
            <img class="logo-animate" title="logo-animate" src="<?=get_template_directory_uri()?>/images/basic/logo-animate.gif">
        <?php } ?>
    </div>

    <div class="pageWrap">

        <?php if(!is_page_template("template-blank.php")) { ?>

        <header>
            <div class="topBar">
                 <div class="within1920" style="position: relative">
                      <div class="row">
                          <div class="col-lg-7">
                              <div class="logoHolder">
                                   <a title="Richmond Olympic Oval" href="<?php echo get_home_url(); ?>">
                                      <img src="<?=get_template_directory_uri()?>/images/basic/logo-new.svg" alt="Site name">
                                   </a>
                              </div>
                          </div>
                            <div class="col-lg-5"></div>
                      </div>

                     <div class="topLeft">
                         <div class="combinedMenu desktop">
                             <?php if ( is_active_sidebar( 'top_bar' ) ) {
                                 dynamic_sidebar('top_bar' );
                             }
                             ?>
                             <a class="contact btn-flat btn-green-border" title="Contact" href="/contact">Contact Us</a>
                             <a class="member btn-flat btn-green" title="Become a member" href="/contact">Member Login</a>
                             <a class="ser" title="Search" href="#"></a>

                         </div>

                         <div class="menuWrap">
                             <span class="menuToggler"></span>
                             <div class="mainMenu">
                                 <div class="close"><a href="#"><i class="fa fa-times"></i></a></div>
                                 <div class="within">
                                     <div class="topSearch">
                                         <?php get_search_form( true ); ?>
                                     </div>
                                     <div class="scrollable">
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
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="barSearch"><?php get_search_form( true ); ?></div>
                     <div class="combinedMenu mobile">
                         <a class="contact btn-flat btn-green-border" title="Contact" href="/contact">Contact Us</a>
                         <a class="member btn-flat btn-green" title="Become a member" href="/contact">Member Login</a>
                     </div>

                </div>
            </div>

            <div class="topMega">
                <div class="within1920">
                    <div class="mega-menu row">
                        <?php wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) ); ?>
                    </div>
                </div>
            </div>
    </header>
    <!-- /header -->
    <?php }