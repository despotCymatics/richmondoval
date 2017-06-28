<?php
/**
 * The template for displaying Search Results pages.
 *
 */
?>

<?php get_header(); ?>

<div class="within inner">
    <?php //the_breadcrumb(); ?>
    <div class="clear"></div>

    <div class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span class="term">' . get_search_query() . '</span>' ); ?></h1>
    </div><!-- .page-header -->

<?php
    if ( have_posts() ) {

        /* Start the Loop */
        while (have_posts()) {
            the_post();
            get_template_part('content', 'search');
        }

        // Previous/next page navigation.
        the_posts_pagination( array(
            'screen_reader_text' => ' ',
            'mid_size'           => 2,
            'prev_text'          => __( '<i class="fa fa-chevron-left"></i>', 'richmondoval' ),
            'next_text'          => __( '<i class="fa fa-chevron-right"></i>', 'richmondoval' ),
            //'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'richmondoval' ) . ' </span>',
        ) );


    } else {
        get_template_part( 'no-results', 'search' );
    }
?>
</div>
<?php get_footer();

