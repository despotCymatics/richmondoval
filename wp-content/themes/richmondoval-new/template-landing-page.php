<?php
/**
 * Template Name: Landing Page
 */
?>
<?php get_header(); ?>

	<div class="within inner">
		<?php
		if ( has_post_thumbnail() ) : ?>
			<section class="innerphotoBox" style="background: linear-gradient(270deg, rgba(0, 136, 206, 0.4) 50%, rgba(0, 80, 136, 0.1) 100%),
				         url(<?php the_post_thumbnail_url(); ?>) no-repeat center center / cover;">
				<h1><?php the_title(); ?></h1>
			</section>
		<?php endif; ?>

		<?php the_breadcrumb(); ?>

		<div class="clear"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<?php if ( have_posts() ) : while( have_posts() ) : the_post();
						the_content();
					endwhile; endif; ?>
					<div class="pm">
					</div>
				</div><!-- /content -->
			</div>
		</div>
	</div><!-- /within -->

<?php get_footer(); ?>