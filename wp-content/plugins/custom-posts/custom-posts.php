<?php
/*
* Plugin Name: Custom Posts
* Description: Plugin for custom posts
* Version: 1.0
* Author: despot
*/


//custom post type function

function create_alerts() {

    // CPT Labels
    $labels = array(
        'name'              => __( 'Alerts' ),
        'singular_name'     => __( 'Alert' ),
        'menu_name'         => __( 'Alerts' ),
        'parent_item_colon'   => __( 'Parent Alert' ),
        'all_items'           => __( 'All Alerts' ),
        'view_item'           => __( 'View Alert' ),
        'add_new_item'        => __( 'Add New Alert' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Alert' ),
        'update_item'         => __( 'Update Alert' ),
        'search_items'        => __( 'Search Alert' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'description'         => __( 'Messages that appear in the alert bar' ),
        'rewrite' => array('slug' => 'alerts'),
        'hierarchical'        => false,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,

    );
    register_post_type('Alerts', $args);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_alerts' );


function create_news() {

	// CPT Labels
	$labels = array(
		'name'              => __( 'News' ),
		'singular_name'     => __( 'News' ),
		'menu_name'         => __( 'News' ),
		'parent_item_colon'   => __( 'Parent News' ),
		'all_items'           => __( 'All News' ),
		'view_item'           => __( 'View News' ),
		'add_new_item'        => __( 'Add New News' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit News' ),
		'update_item'         => __( 'Update News' ),
		'search_items'        => __( 'Search News' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'description'         => __( 'Messages that appear in the alert bar' ),
		'rewrite'             => array('slug' => 'news'),
		'hierarchical'        => false,
		'taxonomies'          => array( 'news-category' ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,

	);
	register_post_type('News', $args);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_news' );


function create_news_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Category', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category Name', 'textdomain' ),
		'menu_name'         => __( 'Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news-category' ),
	);

	register_taxonomy( 'news-category', array( 'news' ), $args );

}
add_action( 'init', 'create_news_taxonomies', 0 );