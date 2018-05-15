<?php

get_header(); ?>

    <section class="photo">
        <div class="photoBox">
            <?php echo do_shortcode('[wonderplugin_slider id="1"]'); ?>
            <div class="within">
                <!--<div class="topSearch">
                    <?php /*get_search_form( true ); */?>
                    <?php /*$allProgramsLink = get_field('all_programs_page');
                    if($allProgramsLink){ */?>
                        <p class="all"><a href="<?php /*echo $allProgramsLink; */?>"><i class="fa fa-search"></i> Review all programs</a></p>
                    <?php /*} */?>
                </div>-->
            </div>
            <?php $infoMsg = get_field('info_message');
            if($infoMsg){ ?>
                <div class="galley">
                    <p><?php echo $infoMsg; ?></p>
                </div>
            <?php }  ?>
        </div>
    </section>

<?php if(is_active_sidebar( 'homepage-link-boxes' )){ ?>
    <section class="homepageLinkBoxes">
        <div class="within">
            <div class="row">
                <?php dynamic_sidebar('homepage-link-boxes' );?>
            </div>
        </div>
    </section>
<?php } ?>
    <section class="homepageNews">
        <div class="within">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="sectionTitle">Latest News</h2>
                    <?php
                    query_posts(array(
                        'post_type' => 'news',
                        'showposts' => 3
                    ));
                    ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="article">
                            <div class="articleImg">
                                <?php the_post_thumbnail( array(200, 150) ); ?>
                            </div>
                            <div class="articleTitle">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>

                    <?php endwhile;?>
                    <a class="allArticlesBtn" href="/news/">View all News </a>
                </div>
                <div class="col-sm-6">
                    <h2 class="sectionTitle">Upcoming Events</h2>
                    <?php
                    $events = tribe_get_events( array(
                        'posts_per_page' => 3
                        //'start_date' => date( 'Y-m-d H:i:s' )
                    ) );
                    foreach ($events as $event) { //var_dump($event); ?>
                        <div class="article">
                            <div class="articleImg">
                                <?php echo get_the_post_thumbnail( $event->ID, array(240, 180) ); ?>
                            </div>
                            <div class="articleTitle">
                                <p class="eventDate"><?php echo date("F j Y", strtotime($event->EventStartDate)); ?></p>
                                <h2><a href="<?php echo get_permalink($event->ID); ?>"><?php echo $event->post_title; ?></a></h2>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <a class="allArticlesBtn" href="/events/">View all Events </a>
                </div>
            </div>
        </div>
    </section>

<?php if ( is_active_sidebar( 'footer-homepage-left' ) || is_active_sidebar( 'footer-homepage-right' ) ){ ?>
    <section class="wallBox">
        <div class="within">
            <?php if ( is_active_sidebar( 'footer-homepage-left' ) ){ ?>
                <div class=" col-md-4">
                    <?php dynamic_sidebar('footer-homepage-left' ); ?>
                </div>
            <?php }?>
            <?php if ( is_active_sidebar( 'footer-homepage-right' ) ){ ?>
                <div class=" col-md-4">
                    <?php dynamic_sidebar('footer-homepage-right' ); ?>
                </div>
            <?php } ?>

            <?php
            //Sponsors
            if ( is_active_sidebar( 'homepage-sponsors' ) ){ ?>
                <div class="col-md-4 homepage-alerts">
                    <div class="row">
                        <h2 class="sectionTitle">Legacy Partners</h2>
                        <div class="col-sm-6">
                            <img src="<?=get_template_directory_uri()?>/images/basic/ro-logo-white.png">
                        </div>
                        <div id="shuffle">
                            <?php
                            $the_sidebars = wp_get_sidebars_widgets();
                            $alert_sidebar = $the_sidebars['homepage-sponsors'];
                            $widget_count = count($alert_sidebar);

                            dynamic_sidebar('homepage-sponsors');

                            ?>
                            <script type="text/javascript">
                                $( document ).ready(function() {

                                    $('.homepage-alerts .row .newsHolder').each(function(index, value){
                                        $(this).addClass('ad '+ 'num_'+index);
                                    });

                                    var maxdivs = <?php echo $widget_count; ?>;

                                    var currentIndex = Math.floor(Math.random() * (maxdivs - 1 + 1));

                                    $(".homepage-alerts .row .newsHolder.ad:not(:eq(" + currentIndex + "))").hide();
                                    //$(".homepage-alerts .row .newsHolder.ad").hide();
                                    //$(".homepage-alerts .row .newsHolder.ad:first-child").show(10);

                                    var totalDiv = $(".homepage-alerts .row .newsHolder.ad").length;

                                    setInterval(function () {
                                        currentIndex = (currentIndex + 1) % totalDiv;

                                        $(".homepage-alerts .row .newsHolder.ad:not(:eq(" + currentIndex + "))").hide();
                                        $(".homepage-alerts .row .newsHolder.ad").eq(currentIndex).fadeIn(600);

                                    }, 6000);
                                });
                            </script>

                        </div>
                    </div>
                </div>
            <?php }?>


        </div>
    </section>

<?php } ?>

<?php get_footer(); ?>