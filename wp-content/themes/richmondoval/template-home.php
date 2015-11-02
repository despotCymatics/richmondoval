<?php
/*
* Template Name: Homepage
 */

get_header(); ?>

    <section class="photo">
        <div class="photoBox">
            <?php echo do_shortcode('[wonderplugin_slider id="1"]'); ?>
            <div class="within">
                <div id="pimaryMenu">

                    <?php

                    $args = array(
                        'theme_location'  => '',
                        'menu'            => 'Main',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'primHolder',
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
                <div class="topSearch">
                    <?php get_search_form( true ); ?>
                    <?php $allProgramsLink = get_field('all_programs_page');
                    if($allProgramsLink){ ?>
                        <p class="all"><a href="<?php echo $allProgramsLink; ?>"><i class="fa fa-search"></i> Review all programs</a></p>
                    <?php } ?>
                </div>
            </div>
            <?php $infoMsg = get_field('info_message');
                if($infoMsg){ ?>
            <div class="galley">
                <p><?php echo $infoMsg; ?></p>
            </div>
            <?php }  ?>
        </div>
    </section>

<?php if ( is_active_sidebar( 'homepage-news' ) || is_active_sidebar( 'homepage-alerts' ) ){ ?>
    <section class="newsBox">
        <div class="within">
            <div class="row">
                <?php if ( is_active_sidebar( 'homepage-news' ) ){ ?>
                    <div class="col-md-9">
                        <div class="row">
                            <h3 class="sectionTitle">What's new</h3>
                            <?php dynamic_sidebar('homepage-news' ); ?>
                        </div>
                    </div>
                <?php }?>
                <?php if ( is_active_sidebar( 'homepage-alerts' ) ){ ?>
                    <div class="col-md-3">
                        <div class="row">
                            <h3 class="sectionTitle">Alerts</h3>
                            <?php dynamic_sidebar('homepage-alerts' ); ?>
                        </div>
                    </div>
                <?php }?>
            </div>

        </div>
    </section>
<?php } ?>

    <?php if ( is_active_sidebar( 'footer-homepage-left' ) || is_active_sidebar( 'footer-homepage-right' ) ){ ?>
    <section class="wallBox">
        <div class="within">
            <?php if ( is_active_sidebar( 'footer-homepage-left' ) ){ ?>
                <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
                    <?php dynamic_sidebar('footer-homepage-left' ); ?>
                </div>
            <?php }?>
            <?php if ( is_active_sidebar( 'footer-homepage-right' ) ){ ?>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                    <?php dynamic_sidebar('footer-homepage-right' ); ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <?php } ?>

<?php get_footer(); ?>