<?php
/**
 * Template Name: Oval Fit Athletic Holding Page
 */


get_header();


?>
	<!-- Pixel -->
	<img src="//p3.eyereturn.com/seg/?r=13988:4838400" height="1" width="1"  style="position: absolute"/>

	<div class="within inner">
		<div class="content">
			<div class="title">
				<br>
				<img width="120" class="stages-logo"
				     src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
				<br>
				<br>
			</div>

			<div class="row header">
				<div class="col-md-7">
					<?=get_field('hero_title') ?>
				</div>
				<div class="col-md-5">
					<h5>
						<img width="120px" style="display: inline-block; margin-right: 10px; vertical-align: middle;"
						     src="<?= get_stylesheet_directory_uri() ?>/images/stages/athletic-logo-white.svg">
						<span style="vertical-align: sub;">NOT A FITNESS TREND- A LIFESTYLE</span>
					</h5>
					<p>
						<?=get_field('hero_text') ?>
					</p>
				</div>
			</div>

		</div>
	</div>

	<div class="ovalfit-holding-body">

		<div id="ovalfit-tabs">
			<ul>
				<li>
					<a class="tab-btn1" href="#tabs-1">
            <span>
              <?=get_field('tab1_title')?>
            </span>
					</a>
				</li>
				<li>
					<a class="tab-btn2" href="#tabs-2">
            <span>
              <?=get_field('tab2_title')?>
					  </span>
          </a>
				</li>
				<li>
					<a class="tab-btn3" href="#tabs-3">
            <span>
              <?=get_field('tab3_title')?>
            </span>
					</a>
				</li>
				<li>
					<a class="tab-btn4" href="#tabs-4">
            <span>
              <?=get_field('tab4_title')?>
            </span>
					</a>
				</li>
			</ul>

			<div id="tabs-1">
				<img class="desktop" src="<?=get_field('tab1_image') ?>">
				<img  class="tablet" src="<?=get_field('tab1_image_tablet') ?>">
				<span> <?=get_field('tab1_title')?></span>
			</div>

			<div id="tabs-2">
        <img class="desktop" src="<?=get_field('tab2_image') ?>">
        <img  class="tablet" src="<?=get_field('tab2_image_tablet') ?>">
        <span> <?=get_field('tab2_title')?></span>
			</div>

			<div id="tabs-3">
        <img class="desktop" src="<?=get_field('tab3_image') ?>">
        <img  class="tablet" src="<?=get_field('tab3_image_tablet') ?>">
        <span> <?=get_field('tab3_title')?></span>
			</div>

			<div id="tabs-4">
        <img class="desktop" src="<?=get_field('tab4_image') ?>">
        <img  class="tablet" src="<?=get_field('tab4_image_tablet') ?>">
        <span> <?=get_field('tab4_title')?></span>
			</div>
		</div>

		<div class="within inner">
			<div class="ovalfit-form">

				<?=do_shortcode('[contact-form-7 id="50230" title="OvalFit Athletic - First to know"]'); ?>

			</div>
		</div>

	</div>

<?php

get_template_part('content-ovalfit-tc','ovalfit-tc');

get_footer();




