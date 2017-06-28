<?php
/**
 * The template for displaying all pages
 */
?>
<?php get_header(); ?>

<?php
if ( has_post_thumbnail() ) : ?>
    <!--section class="innerphotoBox">
        <?php the_post_thumbnail(); ?>
    </section-->
<?php endif; ?>

<div class="within inner">
    <?php the_breadcrumb(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="clear"></div>

    <?php


    if(count(get_pages('child_of='.get_the_ID())) != 0 ){
        $child_of = get_the_ID();
        $link_after = '<i class="fa fa-angle-right right"></i>';
    }else{

        $child_of = get_post(get_the_ID())->post_parent;
        if($child_of == 0){
            $child_of = get_the_ID();

        }
        //var_dump($child_of);
        $link_after = "";
    }

    $current_parent = get_ancestors( get_the_ID(), 'page' );

    $args = array(
        'authors'      => '',
        'child_of'     => $child_of,
        'date_format'  => get_option('date_format'),
        'depth'        => 3,
        'echo'         => 0,
        'exclude'      => '',
        'include'      => '',
        'link_after'   => $link_after,
        'link_before'  => '',
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'show_date'    => '',
        'sort_column'  => 'menu_order, post_title',
        'sort_order'   => '',
        //'title_li'     => __(get_the_title()),
        'title_li'     => "",
        'walker'       => ''
    );

    $pages = wp_list_pages( $args );
    $pages = str_replace('<i class="fa fa-angle-right right"></i></a>','</a><i class="fa fa-angle-right right"></i>', $pages);
    $cols = 10;
    ?>
    <div class="row">
        <?php if($pages != '') { $cols = 8; ?>
            <div class="sideBar col-md-2">
                <div id="pimaryMenu">
                    <ul class="primHolder">
                        <h4>Pages</h4>
                        <?php if ( isset($current_parent[0]) ) { ?>
                            <a class="parent" href="<?php echo get_permalink( $current_parent[0] ); ?>" >
                                <span>&lt; </span><?php echo get_the_title( $current_parent[0] ); ?>
                            </a>
                        <?php } ?>
                        <?php echo $pages; ?>
                    </ul>
                </div>
                <?php if(get_field('qlinks') != '') { //var_dump(get_field('qlinks'));?>

                    <div class="quick-links">
                        <h4><i class="fa fa-link"></i> Quick links</h4>
                        <ul>
                            <?php
                            $qlinks = get_field('qlinks');
                            echo do_shortcode($qlinks);
                            ?>
                        </ul>
                    </div>
                <?php } ?>
            </div><!-- /sideBar -->

        <?php }

        $sidebar = get_field('select_sidebar');
        if(!$sidebar) $sidebar = 'inner-promo-right';
        ?>
        <div class="col-md-<?php echo $cols; ?>">
            <div class="content">
                <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                    the_content();
                endwhile; endif; ?>
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

	                <?php
	                $sideBoxTitle = get_field("sidebox_title");
	                if($sideBoxTitle){
		            ?>
		                <div class="newsHolder">
			                <div class="promoBox">
				                <a class="side-box" target="_blank" title="<?php echo $sideBoxTitle; ?>" href="<?php echo get_field("sidebox_link"); ?>">
					                <?php if(get_field("sidebox_image")){ ?>
						                <div class="promo-img-wrap"><img src="<?php echo get_field("sidebox_image"); ?>"></div>
					                <?php } ?>
					                <div class="titleHolder">
						                <h3 class="title"><?php echo $sideBoxTitle; ?></h3>
						                <p class="additionalText"><?php echo get_field("sidebox_text"); ?></p>
						                <p class="download">See More</p>
					                </div>
				                </a>
			                </div>
		                </div>
	                <?php } ?>
	                
	                <?php
	                $sideBoxTitle2 = get_field("sidebox_title2");
	                if($sideBoxTitle2){
		                ?>
		                <div class="newsHolder">
			                <div class="promoBox">
				                <a class="side-box" target="_blank" title="<?php echo $sideBoxTitle2; ?>" href="<?php echo get_field("sidebox_link2"); ?>">
					                <?php if(get_field("sidebox_image2")){ ?>
						                <div class="promo-img-wrap"><img src="<?php echo get_field("sidebox_image2"); ?>"></div>
					                <?php } ?>
					                <div class="titleHolder">
						                <h3 class="title"><?php echo $sideBoxTitle2; ?></h3>
						                <p class="additionalText"><?php echo get_field("sidebox_text2"); ?></p>
						                <p class="download">See More</p>
					                </div>
				                </a>
			                </div>
		                </div>
	                <?php } ?>
                </div><!-- /sideBar right -->
            <?php } ?>




            <?php
            $sideText = get_field('side_text');
            if($sideText) {
                ?>
                <div class="sideBar promo">
                    <div class="newsHolder w-4">
                        <?php echo str_replace("><br />", ">", $sideText); ?>
                    </div>
                </div><!-- /sideBar right -->

            <?php } ?>
        </div>
    </div>
</div><!-- /within -->

<?php get_footer(); ?>