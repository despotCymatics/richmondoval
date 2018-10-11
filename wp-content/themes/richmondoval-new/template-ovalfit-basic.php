<?php
/**
 * Template Name: Oval Fit Basic Page
 */

	get_header();

	?>
	<div class="within inner">
		<div class="content">
			<div class="title">
				<br>
				<a title="Oval Fit" href="/oval-fit/">
					<img width="120" class="stages-logo" src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
				</a>
				<br>
				<br>
				<div class="ride-logo">
					<img src="<?= get_stylesheet_directory_uri() ?>/images/stages/RIDE_logo.svg">
				</div>
			</div>

			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<?php if ( have_posts() ) : while( have_posts() ) : the_post();
						the_title();
						the_content();
					endwhile; endif; ?>

				</div>
			</div>
		</div>
	</div>

<?php

get_footer();