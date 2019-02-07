<?php
/*
* Template Name: Homepage
 */

get_header(); ?>

    <!-- Hero -->
    <section class="hero">
        <div class="within1920">
            <div class="row" style="background:  linear-gradient(250.09deg, rgba(21, 107, 237, 0.18) 46.27%, #000000 109.66%), url(<?=get_stylesheet_directory_uri();?>/images/basic/hero.jpg) no-repeat center / cover;">
                <div class="hero-title-wrap col-md-5">
                    <h1 class="hero-title">MORE THAN MEETS THE ICE</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="mobileMega">
        <div class="mega-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) ); ?>
        </div>
    </section>

    <!-- Slide Boxes -->
    <section class="slides">
        <div class="within1920">
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
                        </div>

                        <a class="read-more" href="<?php echo get_permalink($event->ID); ?>">Read More</a>

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
                        <h4>Today’s hours of Operations</h4>
                        <?=get_field('working_hours');?>
                        <a href="/facility/hours-location/" class="read-more">See Full Hours</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <h4>Visiting the Oval? Here’s what you need to know</h4>
                        <div class="alerts">
                            <?=get_field('alert_message');?>
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


            <div class="tab-buttons">
                <h4 class="tablink  active-tab" onclick="openTab('for-kids', this)" id="for-kids-tab">For Kids</h4>
                <h4 class="tablink" onclick="openTab('rox', this)" id="rox-tab">ROX Museum</h4>
            </div>

            <!-- Explore Tabs -->
            <div id="for-kids" class="tabcontent" style="display: block">

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
                            foreach ($events as $event) { ?>
                                <a class="explore-icon" data-id="<?=$event->ID;?>">
                                    <img class="svg" src="<?=get_stylesheet_directory_uri();?>/images/basic/rox-icon.svg" data-id="<?=$event->ID;?>">
                                    <span>Summer Camps</span>
                                </a>
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
                                    <h2>Summer Camps</h2>
                                    <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mattis nec eros a rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mattis nec eros a rutrum. </p>
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

            </div>

            <div id="rox" class="tabcontent">

            </div>


            <script>
                $( document ).ready(function() {
                    $('.explore-carousel').slick({
                        dots: true,
                        arrows:true,
                        infinite: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        appendDots: $('.explore-carousel-nav'),
                        draggable:false,
                        fade: true,
                        customPaging : function(slider, i) {
                            var slideId = $(slider.$slides[i]).data('id');
                            return '<a data-id="'+slideId+'"><span></span></a>';
                        },
                    });

                    var currentExploreSlide = 0;
                    $('.explore-icons-nav a').eq(currentExploreSlide).addClass('active');

                    $('.explore-carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
                        currentExploreSlide = currentSlide;
                        $('.explore-icons-nav a').removeClass('active');
                        $('.explore-icons-nav a').eq(currentExploreSlide).addClass('active');
                    });

                    $('.explore-icons-nav a').click(function (e) {
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


    <!-- Insta Feed -->
<!--    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <section id="insta-feed">
        <div class="elfsight-app-68c04125-a35e-456f-8499-ee5f6be481c3"></div>
    </section>-->


<?php get_footer(); ?>