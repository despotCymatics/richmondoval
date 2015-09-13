<?php
/*
* Plugin Name: Custom Posts
* Description: Plugin for custom posts
* Version: 1.0
* Author: despot
*/


//custom post type function

function create_posttype() {

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
add_action( 'init', 'create_posttype' );


