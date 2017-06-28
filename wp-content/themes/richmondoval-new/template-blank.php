<?php
/**
 * The template for displaying blank template for LP
 * Template Name: Blank
 */
?>

<?php get_header(); ?>
<div class="within inner">
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

</div><!-- /pageWrap -->


<?php //get_footer(); ?>

<?php wp_footer(); ?>


