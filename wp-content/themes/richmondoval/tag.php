<?php
/**
 * Template for displaying category posts
 */




get_header(); ?>

    <div class="within inner">
        <?php the_breadcrumb(); ?>
        <h1>Tag: <?php single_tag_title();?></h1>
        <div class="clear"></div>

        <?php

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $tag  = ( get_query_var( 'tag' ) ) ? get_query_var( 'tag' ) : 1;

        $args = array(
            'posts_per_page' => 5,
            'paged' => $paged,
            'tag' => $tag,

        );

        $wp_query = new WP_Query($args);
        ?>

        <div class="row">
            <div class="col-md-9">

                <?php if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-box">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="col-sm-2">
                                    <div class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date('j M Y') ?></div>
                                </div>
                            </div>

                            <div class="post-image">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-post-list' ); ?></a>
                            </div>

                            <div class="content"><?php the_excerpt(); ?></div>
                            <div class="post-meta">
                                <div class="row">
                                    <div class="col-sm-10 cc">
                                        <i class="fa fa-folder-open-o"></i>
                                        <div class="post-categories"><?php the_category(', ');?></div>
                                        <i class="fa fa-comment-o"></i>
                                        <div class="count-post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></div>
                                        <i class="fa fa-user"></i>
                                        <div class="author"><?php echo get_the_author(); ?></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="read-more">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                    <?php
                    the_posts_pagination( array(
                        'screen_reader_text' => ' ',
                        'mid_size'           => 2,
                        'prev_text'          => __( '<i class="fa fa-chevron-left"></i>', 'richmondoval' ),
                        'next_text'          => __( '<i class="fa fa-chevron-right"></i>', 'richmondoval' ),
                        //'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'richmondoval' ) . ' </span>',
                    ) );
                    ?>

                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>

            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'blog-sidebar' ) ){ ?>
                    <div class="blog-sidebar">
                        <?php dynamic_sidebar('blog-sidebar' ); ?>
                    </div>
                <?php }?>

            </div>

        </div>

    </div>

<?php get_footer(); ?>