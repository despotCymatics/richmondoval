<?php
/**
 * The Template for displaying all single posts
 *
 */


get_header(); ?>

    <div class="within inner">
        <?php the_breadcrumb(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="clear"></div>

        <div class="row">
            <div class="col-md-9">

                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-box">
                            <div class="post-image">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                            </div>
                            <div class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date('j M Y') ?></div>
                            <div class="content"><?php the_content(); ?></div>
                            <div class="post-meta">
                                <i class="fa fa-folder-open-o"></i>
                                <div class="post-categories"><?php the_category(', ');?></div>
                                <i class="fa fa-comment-o"></i>
                                <div class="count-post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></div>
                                <i class="fa fa-user"></i>
                                <div class="author"><?php echo get_the_author(); ?></div>
                            </div>
                        </div>
                    </article>
                    <?php
                        if ( comments_open() || get_comments_number() ) {
                        comments_template();
                        }
                    ?>
                <?php endwhile; endif; ?>

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
