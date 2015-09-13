<?php
/**
 * Created by PhpStorm.
 * User: dusan.ristic
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

        <?php if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif; ?>

        <div class="contactBox">
            <div class="contactData">
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

                    <?php $map = get_field('google_map'); ?>
                    <span class="mapAspect" role="presentation" aria-hidden="true"></span>
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <div id="gmap_canvas" style="height:500px;width:600px;"></div>
                    <style>
                        #gmap_canvas img {
                            max-width: none !important;
                            background: none !important
                        }
                    </style>
                    <script type="text/javascript">
                        function init_map() {
                            var myOptions = {
                                zoom: 14,
                                center: new google.maps.LatLng(<?=$map['lat']?>, <?=$map['lng']?>),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(<?=$map['lat']?>, <?=$map['lng']?>)
                            });
                            infowindow = new google.maps.InfoWindow({content: "<?=$map['address']?>"});
                            google.maps.event.addListener(marker, "click", function () {
                                infowindow.open(map, marker);
                            });
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                    </script>

                </div>
                <!-- /mapHolder -->

            </div>
            <!-- /contactMap -->
        </div>
        <!-- /contactBox -->

    </div><!-- /within -->

<?php get_footer(); ?>