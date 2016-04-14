<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">

<head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
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
</head>

<body <?php body_class(); ?> style="overflow: hidden;">
<div id="loading-wrap">
    <img title="logo-animate" src="<?=get_template_directory_uri()?>/images/basic/logo-animate.gif">
    <!--p>Loading, please wait.</p-->
</div>

<div class="pageWrap">
<header>
	<div class="topBar">
        <div class="row">
            <div class="col-lg-7">
                <?php
                $args=array(
                    'post_type' => 'alerts',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts'=> 1,
                );

                $query = null;
                $query = new WP_Query($args);
                if( $query->have_posts() ) { ?>
                    <div class="alerts">
                        <?php
                        $i = 1;
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <p id="alert-<?php echo $i; ?>" class="alert"><?php echo preg_replace("/<p>(.*?)<\/p>/", "$1", get_the_content()); ?></p>
                            <?php
                            $i++;
                        endwhile;
                        ?>
                    </div>
                <?php
                }
                wp_reset_query();  // Restore global post data stomped by the_post().

                ?>
            </div>
            <div class="col-lg-5">
                <!--div class="userInfo">
                    <img src="<?=get_template_directory_uri()?>/images/basic/avatar.png">
                    <span class="userMessage">Welcome back <strong>JOHN</strong></span>
                </div-->
                <div class="combinedMenu">
                    <!--a href="/hours-location" class="no-mob">HOURS & LOCATION</a>
                    <a href="/hours-location" class="mob"><i class="fa fa-clock-o"></i></a-->
                    <a href="http://ovalhp.ca/">OvalHP.ca</a>
                    <a href="http://therox.ca/">theROX.ca</a>
                    <a href="http://yyoga.ca/">YYoga.ca</a>
                    <a href="https://richmondoval.perfectmind.com/SocialSite/MemberRegistration/MemberSignIn" class="login">LOGIN</a>

                    <a title="facebook" href="https://www.facebook.com/richmondoval" class="soc" target="_blank">
                        <img src="<?=get_template_directory_uri()?>/images/basic/fb.png">
                    </a>
                    <a title="Twitter" href="https://twitter.com/RichmondOval" class="soc" target="_blank">
                        <img src="<?=get_template_directory_uri()?>/images/basic/tw.png">
                    </a>
                    <a title="Instagram" href="#" class="soc" target="_blank">
                        <img src="<?=get_template_directory_uri()?>/images/basic/in.png">
                    </a>
                    <!--a title="Google Plus" href="https://plus.google.com/113479180870162920339/about" class="soc" target="_blank">
                        <img src="<?=get_template_directory_uri()?>/images/basic/gp.png">
                    </a-->

                </div>
            </div>
        </div>


    </div>
    <div class="headerBox">
        <div class="within">
            <div class="logoHolder">
                <a title="Richmond Olympic Oval" href="<?php echo get_home_url(); ?>"><img src="<?=get_template_directory_uri()?>/images/basic/logo.png" alt="Site name"></a>
            </div>
            <div class="menuHeader">

                <?php

                $args = array(
                    'theme_location'  => '',
                    'menu'            => 'Top Menu',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'top-menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );

                wp_nav_menu( $args );
                ?>
            </div>
        </div>
        <div class="menuWrap">
            <span class="menuToggler"></span>
            <div class="mainMenu">
                <div class="within">
                    <div class="logoHolder">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?=get_template_directory_uri()?>/images/basic/logo.png" alt="Site name"></a>
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

            </div>
        </div>
    </div>
</header>
<!-- /header -->