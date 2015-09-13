<?php
/**
 * The template for displaying all pages
 */
?>
<?php get_header(); ?>

<?php
if ( has_post_thumbnail() ) : ?>
    <section class="innerphotoBox">
        <?php the_post_thumbnail(); ?>
    </section>
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
?>

<?php if($pages != '') { ?>
    <div class="sideBar">
        <div id="pimaryMenu">
        <ul class="primHolder">
            <?php if ( isset($current_parent[0]) ) { ?>
                <a class="parent" href="<?php echo get_permalink( $current_parent[0] ); ?>" >
                   <span>&lt;&lt; </span><?php echo get_the_title( $current_parent[0] ); ?>
                </a>
            <?php } ?>
            <?php echo $pages; ?>
        </ul>
    </div>
</div><!-- /sideBar -->

<?php } ?>
    <?php
    $sidebar = get_field('select_sidebar');
    if(!$sidebar) $sidebar = 'inner-promo-right';
    if ( is_active_sidebar( $sidebar ) ) {
        $class = 'wrap';
    } ?>

<div class="<?=$class;?>">
    <div class="content">
        <?php if ( is_active_sidebar( $sidebar ) ) { ?>
        <div class="sideBar promo">
            <div class="newsHolder w-4">
                <?php dynamic_sidebar($sidebar);?>
            </div>
        </div><!-- /sideBar right -->

        <?php if ( have_posts() ) : while( have_posts() ) : the_post();
            the_content();
        endwhile; endif; ?>
        <div class="pm">
        </div>
    </div><!-- /content -->
</div>

    <?php } ?>
</div><!-- /within -->

<?php get_footer(); ?>


