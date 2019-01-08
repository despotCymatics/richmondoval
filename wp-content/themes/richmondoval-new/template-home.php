<?php
/*
* Template Name: Homepage
 */

get_header(); ?>

    <!-- Hero -->
    <section class="hero">
        <div class="within">
            <div class="row" style="background: url(<?=get_stylesheet_directory_uri();?>/images/basic/hero.jpg) no-repeat center / cover; height: 400px;">
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
                        <div class="slide-box"
                             style="background:linear-gradient(259.63deg, rgba(21, 107, 237, 0.18) 46.27%, #000000 109.66%),
                                     url(<?=get_sub_field('slide_box_background');?>) no-repeat center / cover">
                            <h3><?=get_sub_field('slide_box_title');?></h3>
                            <p><?=get_sub_field('slide_box_text');?></p>
                            <a class="read-more" href="<?=get_sub_field('slide_box_url');?>">Read More</a>
                        </div>
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
                <div class="col-md-6"><h2 class="sectionTitle">Upcoming Events</h2></div>
                <div class="col-md-6"><a class="view-all-events" href="/events/">View all Events</a></div>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="work-box">
                        <h4>Today's working hours</h4>
                        <ul>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <h4>Today's working hours</h4>
                        <ul>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                            <li>Oval Facility <span>8am-11pm</span></li>
                        </ul>
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
		            'posts_per_page' => 3,
		            'start_date' => date( 'Y-m-d H:i:s' )
	            ) );

	            ?>

                <div class="explore-carousel-nav">
                    <div class="explore-icons-nav">
                    <?php
                        foreach ($events as $event) { //var_dump($event); ?>
                            <img src="http://via.placeholder.com/80x80/ccc/fff/" data-id="<?=$event->ID;?>">
                    <?php
                        }
                    ?>
                    </div>
                </div>

                <div class="explore-carousel">
		            <?php
		            foreach ($events as $event) { //var_dump($event); ?>
                        <div class="article" data-id="<?=$event->ID;?>">
                            <div class="articleImg">
					            <?php $eventImg = get_the_post_thumbnail( $event->ID, array(240, 180) );
					            if($eventImg != "") echo $eventImg;
					            else { ?>
                                    <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
					            <?php } ?>

                            </div>
                            <div class="articleTitle">
                                <p class="eventDate"><?php echo date("F j Y", strtotime($event->EventStartDate)); ?></p>
                                <h2><a href="<?php echo get_permalink($event->ID); ?>"><?php echo $event->post_title; ?></a></h2>
                                <p class="excerpt"><?php echo $event->post_content; ?></p>
                            </div>
                            <a class="read-more" href="<?php echo get_permalink($event->ID); ?>">Read More</a>
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
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        appendDots: $('.explore-carousel-nav'),
                        draggable:false,
                        customPaging : function(slider, i) {
                            var slideId = $(slider.$slides[i]).data('id');
                            return '<a data-id="'+slideId+'"><img src="http://via.placeholder.com/40x40/000/fff/"></a>';
                        },
                    });

                    $('.explore-icons-nav img:first-child').addClass('active');

                    $('.explore-icons-nav img').click(function (e) {
                        $('.explore-icons-nav img').removeClass('active');
                        $(this).addClass('active');
                        var thumbId = $(this).attr('data-id');
                        $('.slick-dots a[data-id='+thumbId+']').click();
                    });

                    $('.slick-dots a').click(function(){
                        var thumbId = $(this).attr('data-id');
                        $('.explore-icons-nav img').removeClass('active');
                        $('.explore-icons-nav img[data-id='+thumbId+']').addClass('active');
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
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="article">
                                <div class="articleImg">
                                    <?php the_post_thumbnail( array(200, 150) ); ?>
                                </div>
                                <div class="articleTitle">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            </div>

                        <?php endwhile;?>
                    </div>
                </div>

                <div class="news-carousel">

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="article">
                            <div class="articleDate">
                                <?php the_date(); ?>
                            </div>
                            <div class="articleTitle">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>

                    <?php endwhile;?>

                </div>
            </div>

            <script>
                $( document ).ready(function() {
                    $('.news-carousel').slick({
                        dots: true,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        appendDots: $('.news-carousel-nav'),
                        draggable:false,

                    });

                });
            </script>

        </div>
    </section>



    <!-- removing this -->
    <?php if(is_active_sidebar( 'homepage-link-boxes' ) && 1==2){ ?>
    <section class="homepageLinkBoxes">
        <div class="within">
            <div class="row">
                <?php dynamic_sidebar('homepage-link-boxes' );?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- removing this -->
    <section class="homepageNews">
        <div class="within">
            <div class="row">
                <div class="col-sm-12">
                <?php if ( is_active_sidebar( 'home-cta' ) ){ ?>
                    <?php dynamic_sidebar('home-cta' ); ?>
                <?php } ?>
                    <!--<a href="#" class="parkingMaps-btn">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <i class="fa fa-car" aria-hidden="true"></i>
                        PARKING MAPS
                    </a>-->
                </div>
                <div class="col-sm-6">
                    <h2 class="sectionTitle"><span>Latest News</span></h2>
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
                    <a class="allArticlesBtn" href="/all-news/">View all News </a>
                </div>
                <div class="col-sm-6">
                    <h2 class="sectionTitle"><span>Upcoming Events</span></h2>
                    <?php
                    $events = tribe_get_events( array(
                        'posts_per_page' => 3,
                        'start_date' => date( 'Y-m-d H:i:s' )
                    ) );
                    foreach ($events as $event) { //var_dump($event); ?>
                        <div class="article">
                            <div class="articleImg">
                                <?php $eventImg = get_the_post_thumbnail( $event->ID, array(240, 180) );
                                    if($eventImg != "") echo $eventImg;
                                    else { ?>
                                    <img src="<?=get_stylesheet_directory_uri();?>/images/basic/thumb-default.jpg">
                                <?php } ?>

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