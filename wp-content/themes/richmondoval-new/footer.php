<?php
?>

<footer>

    <div class="footerTop">

        <!-- Green -->
        <section class="green">
            <div class="within">
                <div class="row">
                    <div class="col-sm-7">
                        <a title="Richmond Olympic Oval" class="logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?=get_template_directory_uri()?>/images/basic/logo-new-white.svg" alt="Site name">
                        </a>
                    </div>
                    <div class="col-sm-5 alignRight">
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
                    </div>

                    <div class="col-sm-7">
                        <h3>Contact us</h3>
                        <div class="contact-info">
                            <span>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                6111 River Rd
                                Richmond, BC V7C 0A2
                                Canada
                            </span>
                            <span>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                              info@richmondoval.ca
                            </span>
                            <span>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                1 778-296-1400
                            </span>
                        </div>

                    </div>
                    <div class="col-sm-5">
<!--                        <h3>Subscribe to Oval Newsletter</h3>
                        <div class="subscribe-form">
                            <form>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Your email address">
                                    </div>

                                    <div class="col-md-5">
                                        <button class="btn" style="width: 100%">SIGN UP</button>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                    </div>
                </div>
            </div>
        </section>

        <!-- Blue -->
        <section class="blue">
            <div class="within">
                <div class="row">

                    <div class="col-sm-12">
                        <h3>Proud Sponsors</h3>
                        <div class="footerSponsors">
		                    <?php if ( is_active_sidebar( 'footer-right' ) ){ ?>
			                    <?php dynamic_sidebar('footer-right' ); ?>
		                    <?php }?>
                        </div>
                    </div>
                    <!--<div class="col-sm-5">
                        <h3>Legacy Partners</h3>
                        <div class="legacy-partners">
	                        <?php /*if ( is_active_sidebar( 'homepage-sponsors' ) ){ */?>
		                        <?php /*dynamic_sidebar('homepage-sponsors' ); */?>
	                        <?php /*}*/?>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>


        <div class="within">
            <div class="row">
                <div class="footerMenu col-md-12">
                    <div class="flex">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footerBottom ">
        <div class="within">
            <div class="copyrightHolder">
                <p class="copyright">Copyright <?=date('Y')?> Richmond Olympic Oval</p>
            </div>
        </div>
    </div>
</footer>
</div><!-- /pageWrap -->

<?php wp_footer(); ?>

</body>
</html>