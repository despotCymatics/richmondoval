<?php
?>
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
                <p class="copyright">Copyright <?=date('Y')?> Richmond Olympic Oval</p>
            </div>
        </div>
    </div>
</footer>
</div><!-- /pageWrap -->

<?php wp_footer(); ?>

</body>
</html>