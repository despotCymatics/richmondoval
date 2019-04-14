<?php
/*
* Template Name: Homepage
 */

get_header(); ?>

    <!-- Hero -->
    <section class="hero">
        <div class="within1920">
            <div class="row mobile-hero-image" style="background:
                    linear-gradient(250.09deg, rgba(21, 107, 237, 0.18) 46.27%, #121e40 110%),
                    url(<?=get_field('hero_mobile_image')?>) no-repeat center / cover;">
                <div class="hero-image"
                     style="background:
                             linear-gradient(250.09deg, rgba(21, 107, 237, 0.18) 46.27%, #121e40 110%),
                             url(<?=get_field('hero_image')?>) no-repeat center / cover;">
                    <div class="hero-title-wrap">
                        <h1 class="hero-title"><?=get_field('hero_title')?></h1>
                    </div>
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
                             style="background-image:linear-gradient(260deg, rgba(21, 107, 237, 0.18) 25%, #121e40 110%),
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

        <div class="within">
            <div class="row">
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
                                    <div class="excerpt"><?php echo $event->post_excerpt; ?></div>
                                </div>
                            </div>

                            <a class="read-more" href="<?php echo get_permalink($event->ID); ?>">Read More</a>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Working Hours-->
    <section class="working-hours">
        <div class="within">
            <div class="row flex">
                <div class="col-sm-6">
                    <div class="work-box">
                        <h4>Today’s Hours of Operations</h4>
                        <?//=get_field(strtolower(date('l')));?>
                        <a href="/facility/hours-location/" class="read-more">See Full Hours</a>
                    </div>
                </div>

                <div class="col-sm-6">
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

        <img class="explore-section-img" src="<?=get_stylesheet_directory_uri();?>/images/basic/explore-section.png">

        <div class="within">

            <!-- Explore Tabs -->
            <div id="responsiveTabs">
                <ul class="tab-buttons">
                <?php
                    $args = array(
                    'taxonomy' => 'explore-category',
                    'orderby' => 'name',
                    'order'   => 'ASC'
                    );

                    $cats = get_categories($args);

                    foreach($cats as $cat) { ?>

                    <li><a href="#<?=strtolower(str_replace(" ", '-', $cat->name))?>" class="tablink"><?=$cat->name;?></a></li>

                   <?php } ?>
                </ul>


                <?php
                $countCats = 1;

                foreach($cats as $cat) { ?>

                <div id="<?=strtolower(str_replace(" ", '-', $cat->name))?>" class="tabcontent<?=$countCats;?>">
                    <div class="explore-wrap">

						<?php
						$args = array(
							'post_type' => 'explores',
							'tax_query' => array(
								array(
									'taxonomy' => 'explore-category',
									'field'    => 'slug',
									'terms'    => $cat->slug,
								),
							),
						);
						$exploreQuery = new WP_Query( $args ); ?>

                        <div class="explore-carousel-nav">
                            <div class="explore-icons-nav">
                                <?php
                                if ( $exploreQuery->have_posts() ) :
                                    while ( $exploreQuery->have_posts() ) : $exploreQuery->the_post(); ?>
                                    <a class="explore-icon" data-id="<?=get_the_ID();?>">
                                        <div>
                                            <img alt="Explore Icon" class="svg" src="<?=get_field('explore_icon');?>" data-id="<?=get_the_ID();?>">
                                            <span><?=get_the_title();?></span>
                                        </div>
                                    </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="explore-carousel">
							<?php
							if ( $exploreQuery->have_posts() ) :
								while ( $exploreQuery->have_posts() ) : $exploreQuery->the_post(); ?>
                                <div class="article" data-id="<?=get_the_ID();?>">
                                    <div class="articleImg">
										<?php $eventImg = get_the_post_thumbnail( get_the_ID(), 'large' );
										if($eventImg != "") echo $eventImg;
										else { ?>
                                            <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
										<?php } ?>

                                    </div>

                                    <div class="articleTitle">
                                        <h2><?=get_the_title();?></h2>
                                        <p class="excerpt"><?=get_the_excerpt();?></p>
                                        <a class="read-more" href="<?=get_field('explore_url');?>">Read More</a>
                                    </div>

                                </div>
								<?php endwhile; ?>
							<?php endif; ?>

                        </div>
                    </div>

                    <script>
                        $( document ).ready(function() {

                            var tabcontent = '.tabcontent<?=$countCats;?>';

                            $(tabcontent +' .explore-carousel').slick({
                                dots: true,
                                arrows:true,
                                infinite: false,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                appendDots: $(tabcontent +' .explore-carousel-nav'),
                                draggable:false,
                                fade: true,
                                customPaging : function(slider, i) {
                                    var slideId = $(slider.$slides[i]).data('id');
                                    return '<a data-id="'+slideId+'"><span></span></a>';
                                },
                            });

                            var currentExploreSlide = 0;
                            $(tabcontent +' .explore-icons-nav a').eq(currentExploreSlide).addClass('active');

                            $(tabcontent +' .explore-carousel').on('afterChange', function(event, slick, currentSlide, nextSlide){
                                currentExploreSlide = currentSlide;
                                $(tabcontent +' .explore-icons-nav a').removeClass('active');
                                $(tabcontent +' .explore-icons-nav a').eq(currentExploreSlide).addClass('active');
                            });

                            $(tabcontent +' .explore-icons-nav a').click(function (e) {
                                var thumbId = $(this).attr('data-id');
                                $(tabcontent +' .explore-carousel-nav .slick-dots a[data-id='+thumbId+']').click();
                            });

                            $(document).on('click', '.tab-buttons .tablink, .r-tabs-anchor', function(){
                                $(tabcontent +' .explore-carousel').slick('reinit');
                            });

                        });
                    </script>

                </div>

                <?php
	                $countCats++;
                } ?>

                <?php wp_reset_postdata(); ?>

            </div>
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

                $args = array(
	                'post_type' => 'news',
	                'showposts' => 3
                );
                $newsQuery = new WP_Query( $args ); ?>

                <div class="news-carousel">

                    <?php
                    if ( $newsQuery->have_posts() ) :
		                while ( $newsQuery->have_posts()) : $newsQuery->the_post(); ?>
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
                    <?php endif; ?>

                </div>

                <div class="news-carousel-nav">
                    <div class="news-nav">
                        <?php
                        $newsCount = 0;
                        if ( $newsQuery->have_posts() ) :
                            while ( $newsQuery->have_posts()) : $newsQuery->the_post(); ?>
                            <div class="article" data-num="<?=$newsCount;?>">
                                <div class="articleImg">
                                    <?php $newsImg = get_the_post_thumbnail( get_the_ID(), array(200, 150) );
                                    if($newsImg != "") echo $newsImg;
                                    else { ?>
                                        <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
                                    <?php } ?>
                                    <?php //the_post_thumbnail( array(200, 150) ); ?>
                                </div>
                                <div class="articleTitle">
                                    <p><?php echo date("M d", strtotime(get_the_date())); ?></p>
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </div>

                            <?php $newsCount++; ?>
	                        <?php endwhile;?>
                        <?php endif; ?>

	                    <?php wp_reset_postdata(); ?>

                        <a class="all-news" href="/all-news">More News</a>
                    </div>
                </div>
            </div>

	        <?php wp_reset_query();?>
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
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <section id="insta-feed">
        <div class="elfsight-app-68c04125-a35e-456f-8499-ee5f6be481c3"></div>
    </section>


<?php get_footer(); ?>