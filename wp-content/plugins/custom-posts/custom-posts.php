<?php
/*
* Plugin Name: Custom Posts
* Description: Plugin for custom posts
* Version: 1.0
* Author: despot
*/


//custom post type function

function create_explores() {

    // CPT Labels
    $labels = array(
        'name'              => __( 'Explores' ),
        'singular_name'     => __( 'Explore' ),
        'menu_name'         => __( 'Explores' ),
        'parent_item_colon'   => __( 'Parent Explore' ),
        'all_items'           => __( 'All Explores' ),
        'view_item'           => __( 'View Explores' ),
        'add_new_item'        => __( 'Add New Explore' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Explore' ),
        'update_item'         => __( 'Update Explore' ),
        'search_items'        => __( 'Search Explore' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'description'         => __( 'Explore Oval pages' ),
        'rewrite' => array('slug' => 'explore'),
        'hierarchical'        => false,
        'taxonomies'          => array( 'explore-category' ),
        'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', 'revisions' ),
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,

    );
    register_post_type('Explores', $args);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_explores' );

function create_explore_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Category', 'taxonomy general name', 'richmondoval' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'richmondoval' ),
        'search_items'      => __( 'Search Categories', 'richmondoval' ),
        'all_items'         => __( 'All Categories', 'richmondoval' ),
        'parent_item'       => __( 'Parent Category', 'richmondoval' ),
        'parent_item_colon' => __( 'Parent Category:', 'richmondoval' ),
        'edit_item'         => __( 'Edit Category', 'richmondoval' ),
        'update_item'       => __( 'Update Category', 'richmondoval' ),
        'add_new_item'      => __( 'Add New Category', 'richmondoval' ),
        'new_item_name'     => __( 'New Category Name', 'richmondoval' ),
        'menu_name'         => __( 'Category', 'richmondoval' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'explore-category' ),
    );

    register_taxonomy( 'explore-category', array( 'explores' ), $args );

}
add_action( 'init', 'create_explore_taxonomies', 0 );


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
		'name'              => _x( 'Category', 'taxonomy general name', 'richmondoval' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'richmondoval' ),
		'search_items'      => __( 'Search Categories', 'richmondoval' ),
		'all_items'         => __( 'All Categories', 'richmondoval' ),
		'parent_item'       => __( 'Parent Category', 'richmondoval' ),
		'parent_item_colon' => __( 'Parent Category:', 'richmondoval' ),
		'edit_item'         => __( 'Edit Category', 'richmondoval' ),
		'update_item'       => __( 'Update Category', 'richmondoval' ),
		'add_new_item'      => __( 'Add New Category', 'richmondoval' ),
		'new_item_name'     => __( 'New Category Name', 'richmondoval' ),
		'menu_name'         => __( 'Category', 'richmondoval' ),
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