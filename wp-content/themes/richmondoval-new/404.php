<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="within inner">
    <?php the_breadcrumb(); ?>
    <h1>Page Not Found</h1>
    <div class="clear"></div>

    <?php


    $cols = 10;
    ?>
    <div class="row">
        <?php

        $sidebar = get_field('select_sidebar');
        if(!$sidebar) $sidebar = 'inner-promo-right';
        ?>
        <div class="col-md-<?php echo $cols; ?>">
            <div class="content">
                <img src="<?=get_template_directory_uri()?>/images/basic/404.png">
                <div class="pm">
                </div>
            </div><!-- /content -->
        </div>

        <div class="sideBanner col-lg-2 col-md-2">
            <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="sideBar promo">
                    <div class="newsHolder w-4">
                        <?php dynamic_sidebar($sidebar);?>
                    </div>
                </div><!-- /sideBar right -->
            <?php } ?>

            <?php
            $sideText = get_field('side_text');
            if($sideText) {
                ?>
                <div class="sideBar promo">
                    <div class="newsHolder w-4">
                        <?php echo $sideText; ?>
                    </div>
                </div><!-- /sideBar right -->

            <?php } ?>
        </div>
    </div>
</div><!-- /within -->

<?php get_footer(); ?>
