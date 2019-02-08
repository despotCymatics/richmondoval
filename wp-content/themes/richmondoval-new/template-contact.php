<?php
/**
 * Created by PhpStorm.
 * User: despot
 * Date: 4/29/2015
 * Time: 18:35
 * Template Name: Contact
 */
?>
<?php get_header(); ?>

<?php if (has_post_thumbnail()) : ?>
    <section class="innerphotoBox">
        <?php the_post_thumbnail(); ?>
    </section>
<?php endif; ?>

    <div class="within inner">
        <h1><?php the_title(); ?></h1>

        <div class="clear"></div>

        <div class="contactBox">
            <div class="contactData">

	            <?php if (have_posts()) : while (have_posts()) : the_post();
		            the_content();
	            endwhile; endif; ?>

                <div class="contactMeta">
                    <p class="cmLocation"><?php the_field('address'); ?></p>

                    <p class="cmPhone"><?php the_field('phone_number'); ?></p>

                    <p class="cmMail"><a href="#"><?php the_field('email'); ?></a></p>

                    <p class="cmWorkingHours">
                        <?php the_field('working_days'); ?>
                    </p>
                </div>
                <!-- /contactMeta -->
                <?php
                $contact_form = get_field('contact_form');
                if ($contact_form !== FALSE) {
                    $short_code_contact_form = '[contact-form-7 id="' . $contact_form->ID . '" title="' . $contact_form->post_title . '"]';
                    echo do_shortcode($short_code_contact_form);
                }
                ?>
            </div>
            <!-- /contactData -->
            <div class="contactMap">
                <div class="mapHolder">
                    <?= get_field('google_map'); ?>
                </div>
                <!-- /mapHolder -->

            </div>
            <!-- /contactMap -->
        </div>
        <!-- /contactBox -->

    </div><!-- /within -->

<?php get_footer(); ?>