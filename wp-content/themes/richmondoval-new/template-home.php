<?php
/*
* Template Name: Homepage
 */

get_header(); ?>

    <!-- Hero -->
    <section class="hero">
        <div class="within">
            <div class="row flex" style="background:  linear-gradient(250.09deg, rgba(21, 107, 237, 0.18) 46.27%, #000000 109.66%), url(<?=get_stylesheet_directory_uri();?>/images/basic/hero.jpg) no-repeat center / cover; height: 400px;">
                <div class="hero-title-wrap col-md-4">
                    <h1 class="hero-title">MORE THAN MEETS THE ICE</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Slide Boxes -->
    <section class="slides">
        <div class="within">
            <div class="row">
                <div class="slide-boxes">

                    <?php
                    while ( have_rows('slide_box') ) : the_row();
                        ?>
                        <a href="<?=get_sub_field('slide_box_url');?>" class="slide-box"
                             style="background-image:linear-gradient(259.63deg, rgba(21, 107, 237, 0.18) 46.27%, #000000 109.66%),
                                     url(<?=get_sub_field('slide_box_background');?>)">
                            <h3><?=get_sub_field('slide_box_title');?></h3>
                            <p><?=get_sub_field('slide_box_text');?></p>
                            <span class="read-more">Read More</span>
                        </a>
                    <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="events">

        <div class="within">
            <div class="row">
                <div class="col-sm-8"><h2 class="sectionTitle">Upcoming Events</h2></div>
                <div class="col-sm-4"><a class="view-all-events" href="/events/">View all Events</a></div>
            </div>

        </div>

        <div class="event-carousel">
            <?php
            $events = tribe_get_events( array(
                'posts_per_page' => 30,
                'start_date' => date( 'Y-m-d H:i:s' )
            ) );
            foreach ($events as $event) { //var_dump($event); ?>
                <div class="article">
                    <div class="articleImg">
                        <a href="<?php echo get_permalink($event->ID); ?>">
                            <?php
                            $eventImg = get_the_post_thumbnail( $event->ID, array(240, 180) );
                            if($eventImg != "") echo $eventImg;
                            else { ?>
                                <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
                            <?php } ?>
                        </a>

                    </div>
                    <div class="articleTitle">
                        <p class="eventDate">
                            <span class="month">
                                <?php echo date("M", strtotime($event->EventStartDate)); ?>
                            </span>
                            <span class="day">
                                <?php echo date("d", strtotime($event->EventStartDate)); ?>
                            </span>
                        </p>
                        <div class="eventMeta">
                            <h3><a href="<?php echo get_permalink($event->ID); ?>"><?php echo $event->post_title; ?></a></h3>
                            <p class="excerpt"><?php echo $event->post_content; ?></p>
                            <a class="read-more" href="<?php echo get_permalink($event->ID); ?>">Read More</a>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Working Hours-->
    <section class="working-hours">
        <div class="within">
            <div class="row flex">
                <div class="col-md-6">
                    <div class="work-box">
                        <h4>Today's working hours</h4>
                        <ul>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                        </ul>
                        <a href="#" class="read-more">See Full Hours</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <h4>Visiting the Oval? Here’s what you need to know</h4>
                        <div class="alerts">

                            <?php

                            $args=array(
                               'post_type' => 'alerts',
                               'post_status' => 'publish',
                               'posts_per_page' => -1,
                               'ignore_sticky_posts'=> 1,
                            );

                            $query = null;
                            $query = new WP_Query($args);
                            if( $query->have_posts() ) { ?>

                               <?php
                               $i = 1;
                               while ($query->have_posts()) : $query->the_post(); ?>
                                   <p class="alert">
                                       <?php echo preg_replace("/<p>(.*?)<\/p>/", "$1", get_the_content()); ?>
                                   </p>
                                   <?php
                                   $i++;
                               endwhile;
                               ?>

                            <?php
                            }else { ?>
                                <p>There are currently no visitor alerts in place.</p>
                            <?php
                            }
                            wp_reset_query();
                            ?>

                        </div>
                        <a href="/facility/hours-location#parking" class="read-more">Parking Maps and More</a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Explore Oval -->
    <section class="explore">

        <div class="within">
            <h2 class="sectionTitle">Explore The Oval</h2>
        </div>

        <div class="within">

            <div class="explore-wrap">

	            <?php
	            $events = tribe_get_events( array(
		            'posts_per_page' => 4,
		            'start_date' => date( 'Y-m-d H:i:s' )
	            ) );

	            ?>

                <div class="explore-carousel-nav">
                    <div class="explore-icons-nav">
                    <?php
                        foreach ($events as $event) {  ?>
                            <img src="http://via.placeholder.com/100x100/85C440/fff/" data-id="<?=$event->ID;?>">
                    <?php
                        }
                    ?>
                    </div>
                </div>

                <div class="explore-carousel">
		            <?php
		            foreach ($events as $event) {  ?>
                        <div class="article" data-id="<?=$event->ID;?>">
                            <div class="articleTitle">
                                <h2><?php echo $event->post_title; ?></h2>
                                <p class="excerpt"><?php echo $event->post_content; ?></p>
                                <a class="read-more" href="<?php echo get_permalink($event->ID); ?>">Read More</a>
                            </div>
                            <div class="articleImg">
					            <?php $eventImg = get_the_post_thumbnail( $event->ID, 'large' );
					            if($eventImg != "") echo $eventImg;
					            else { ?>
                                    <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
					            <?php } ?>

                            </div>

                        </div>
			            <?php
		            }
		            ?>
                </div>
            </div>

            <script>
                $( document ).ready(function() {
                    $('.explore-carousel').slick({
                        dots: true,
                        arrows:true,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        appendDots: $('.explore-carousel-nav'),
                        draggable:false,
                        customPaging : function(slider, i) {
                            var slideId = $(slider.$slides[i]).data('id');
                            return '<a data-id="'+slideId+'"><span></span></a>';
                        },
                    });

                    var currentExploreSlide = 0;
                    $('.explore-icons-nav img').eq(currentExploreSlide).addClass('active');

                    $('.explore-carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
                        currentExploreSlide = currentSlide;
                        $('.explore-icons-nav img').removeClass('active');
                        $('.explore-icons-nav img').eq(currentExploreSlide).addClass('active');
                    });

                    $('.explore-icons-nav img').click(function (e) {
                        var thumbId = $(this).attr('data-id');
                        $('.explore-carousel-nav .slick-dots a[data-id='+thumbId+']').click();
                    });

                });
            </script>

        </div>
    </section>


    <!-- Latest News -->
    <section class="news">

        <div class="within">
            <h2 class="sectionTitle">Latest News</h2>
        </div>

        <div class="within">
            <div class="news-wrap">
                <?php
                query_posts(array(
                    'post_type' => 'news',
                    'showposts' => 3
                ));
                ?>

                <div class="news-carousel-nav">
                    <div class="news-nav">
                        <?php
                        $newsCount = 0;
                        while (have_posts()) : the_post(); ?>
                            <div class="article" data-num="<?=$newsCount;?>">
                                <div class="articleImg">
                                    <?php the_post_thumbnail( array(200, 150) ); ?>
                                </div>
                                <div class="articleTitle">
                                    <p><?php echo date("M d", strtotime(get_the_date())); ?></p>
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </div>

                        <?php
	                        $newsCount++;
                        endwhile;?>
                        <a class="all-news" href="/all-news">More News</a>
                    </div>
                </div>

                <div class="news-carousel">

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="article">
                            <div class="articleDate">
	                            <span class="month"><?php echo date("M",  strtotime(get_the_date())); ?></span>
	                            <span class="day"><?php echo date("d",  strtotime(get_the_date())); ?></span>
                            </div>
                            <div class="articleTitle">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <a class="read-more" href="<?=get_permalink(); ?>">Read More</a>
                            </div>
                        </div>

                    <?php endwhile;?>
                    <?php wp_reset_query();?>

                </div>
            </div>

            <script>
                $( document ).ready(function() {
                    $('.news-carousel').slick({
                        dots: true,
                        arrows:false,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        draggable:false,
                        appendDots: $('.news-carousel-nav'),
                    });
                });

                var currentNewsSlide = 0;
                var nextNewsSlide = 1;
                $('.news-carousel-nav .article').eq(currentNewsSlide).addClass('active');

                $('.news-carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
                    currentNewsSlide = currentSlide;
                    nextNewsSlide = nextSlide;
                    $('.news-carousel-nav .article').removeClass('active');
                    $('.news-carousel-nav .article').eq(currentNewsSlide).addClass('active');
                });

                $('.news-carousel-nav .article').click(function (e) {
                    var newsNum = $(this).attr('data-num');
                    $('.news-carousel-nav .slick-dots li').eq(newsNum).click();
                });

            </script>

        </div>
    </section>


    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-68c04125-a35e-456f-8499-ee5f6be481c3"></div>


    <!-- removing this -->
    <?php if(is_active_sidebar( 'homepage-link-boxes' ) && 1==2){ ?>

    <?php } ?>


    <?php

    if(1 == 2) {
    //if ( is_active_sidebar( 'footer-homepage-left' ) || is_active_sidebar( 'footer-homepage-right' ) ){ ?>
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
                                jQuery(document).ready(function($) {

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