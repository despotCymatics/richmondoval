<?php
require("shortcodes.php");

// hide admin bar for non-user
if (!current_user_can('edit_posts')) {
    show_admin_bar(false);
}

function richmondoval_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'blog-post-list', 1024, 380, array( 'center', 'center' ) ); // Hard crop left top
}

add_action( 'after_setup_theme', 'richmondoval_setup_theme' );



/**
 * Enqueue scripts and styles for front-end.
 */

function richmondoval_scripts_styles() {
	global $wp_styles;
	wp_deregister_script('jquery');
    wp_deregister_script('jquery-core');
    //wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_register_script('jquery', (get_template_directory_uri() . '/js/jquery-1.11.2.min.js'), false, '1.11.2');

	//JavaScript
	//wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.2.min.js', array(), false, false );
    //wp_enqueue_script('richmondoval-prefixfree', (get_template_directory_uri() . '/js/prefixfree.min.js'), array(), false, false );
	wp_enqueue_script( 'richmondoval-modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js', array(), false, false );
	wp_enqueue_script('richmondoval-slimscroll', (get_template_directory_uri() . '/js/jquery.slimscroll.min.js'), array(), false, true );
	wp_enqueue_script('richmondoval-slick', (get_template_directory_uri() . '/js/slick.min.js'), array(), false, true );
	wp_enqueue_script( 'richmondoval-custom', get_template_directory_uri() . '/js/custom.js', array(), false, true );

	//Stylesheets
    //wp_enqueue_style( 'richmondoval-default', get_template_directory_uri() . '/css/default.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-fonts', get_template_directory_uri() . '/css/fonts.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-general', get_template_directory_uri() . '/css/general.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-slick', get_template_directory_uri() . '/css/slick.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'richmondoval-template', get_template_directory_uri() . '/css/template.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-helper', get_template_directory_uri() . '/css/helper.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'richmondoval-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, "screen, projection" );
    wp_enqueue_style( 'richmondoval-pe-icon-7-stroke', get_template_directory_uri() . '/css/pe-icon-7-stroke.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'richmondoval-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, "screen, projection" );
	wp_enqueue_style( 'richmondoval-mobile', get_template_directory_uri() . '/css/mobile.css', array(), false, "only screen and (max-width: 1200px)" );
	wp_enqueue_style( 'richmondoval-component', get_template_directory_uri() . '/css/component.css', array(), false, "only screen and (max-width: 1024px)" );
	wp_enqueue_style( 'richmondoval-custom-style', get_template_directory_uri() . '/custom-style.css', array(), false, "screen, projection)" );

	//STAGES
	//Scripts
	if(get_page_template_slug() == 'template-stages.php' || get_page_template_slug() == 'template-stages_login.php' || get_page_template_slug() == 'template-stages_registration.php' || get_page_template_slug() == 'template-stages_holding_page.php') {

		wp_enqueue_script( 'richmondoval-sweetalert', get_template_directory_uri() . '/js/sweetalert2.js', array(), false, true );
		wp_enqueue_script( 'richmondoval-moment', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array(), false, true );
		wp_enqueue_script( 'richmondoval-daterange', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array(), false, true );
		wp_enqueue_script( 'richmondoval-tabs', get_template_directory_uri() . '/js/jquery.smartTab.js', array(), false, true );
		wp_enqueue_script( 'richmondoval-stages', get_template_directory_uri() . '/js/stages.js', array(), false, true );

		//Styles
		wp_enqueue_style( 'richmondoval-sweetalert2', get_template_directory_uri() . '/css/sweetalert2.css', array(), false, "screen, projection)" );
		wp_enqueue_style( 'richmondoval-daterange', get_template_directory_uri() .'/css/daterangepicker.css', array(), false, "screen, projection)" );
		wp_enqueue_style( 'richmondoval-tabs', get_template_directory_uri() .'/css/smart_tab.css', array(), false, "screen, projection)" );
		wp_enqueue_style( 'richmondoval-stages', get_template_directory_uri() . '/css/stages.css', array(), false, "screen, projection)" );
	}

}
add_action( 'wp_enqueue_scripts', 'richmondoval_scripts_styles' );


/**
 * Register menu locations
 *
 */
add_action( 'after_setup_theme', 'register_location' );
function register_location() {
  register_nav_menu( 'primary_mega', __( 'Primary Mega Menu', 'richmondoval' ) );
}


/**
 * Register sidebars and widgetized areas.
 *
 */
function richmondoval_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Top Bar', 'richmondoval' ),
		'id' => 'top_bar',
		'description' => __( 'Top bar links', 'richmondoval' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 style="display: none">',
		'after_title'   => '</h2>',
	) );


    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'richmondoval' ),
        'id' => 'blog-sidebar',
        'description' => __( 'Widgets in this area will be shown in footer area.', 'richmondoval' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3 class="label">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar(array(
        'name' => __( 'Homepage Sponsor Banners', 'richmondoval' ),
        'id' => 'homepage-sponsors',
        'description'   => '',
        'class'         => '',
        'description' => __('Appears on homepage bottom', 'richmondoval'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<h2 class="sectionTitle">',
        'after_title'   => '</h2>',
    ));


    register_sidebar( array(
        'name' => __( 'Footer  Logos', 'richmondoval' ),
        'id' => 'footer-right',
        'description' => __( 'Widgets in this area will be shown in footer area.', 'richmondoval' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3 class="label">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar(array(
        'name' => __( 'Inner Promo', 'richmondoval' ),
        'id' => 'inner-promo-right',
        'description' => __('Appears as the promo on the inner pages', 'richmondoval'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

}
add_action( 'widgets_init', 'richmondoval_widgets_init' );


/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 */
function richmondoval_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fordreamers' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'richmondoval_wp_title', 10, 2 );



/** Breadcrumbs
/*********************************************************************************/

function the_breadcrumb () {

    // Settings
    $separator  = '&gt;';
    $id         = 'breadcrumbs';
    $class      = 'breadcrumbs';
    $home_title = 'Homepage';

    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();

    // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_single() ) {

            // Single post (Only display the first category)
            //echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
            //echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );
                //var_dump($anc);

                // Get parents in the right order
                $anc = array_reverse($anc);
                $parents = "";
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );

            // Display the tag name
            echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

    }

    echo '</ul>';

}



/*class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           $attributes .= ! empty( $item->description )        ? ' data-icon-fa="'   . esc_attr( $item->description        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           //$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;

            $item_output .= '</a>';
          $item_output .= $description.$args->link_after;
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}*/

class sub_class_menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dl-submenu\">\n";
    }
}

//Remove image link in editor
function imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'imagelink_setup', 10);




//FILTERS

add_filter( 'the_content', 'attachment_image_link_remove_filter' ); //remove image link
function attachment_image_link_remove_filter( $content ) {
    $content = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), $content ); return $content;
}

remove_filter( 'the_content', 'wpautop' );

add_filter( 'the_content', 'wpautop' , 12);

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}



