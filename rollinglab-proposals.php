<?php
/*
Plugin Name: Proposals
Plugin URI: 
Description: A brief description of the Plugin.
Version: 0.1
Author: Rolling Lab
Author URI: http://rollinglab.com
License: A "Slug" license name e.g. GPL2
*/



/**
 * Sets up proposal custom post type
 * 
 * @since 0.1
 */
 
function lab_create_post_type() {
  $labels = array(
    'name' => 'Proposals',
    'singular_name' => 'Proposal',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Proposal',
    'edit_item' => 'Edit Proposal',
    'new_item' => 'New Proposal',
    'all_items' => 'All Proposals',
    'view_item' => 'View Proposal',
    'search_items' => 'Search Proposals',
    'not_found' =>  'No Proposals found',
    'not_found_in_trash' => 'No Proposals found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Proposals'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'proposal' ),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'custom-fields' )
  ); 

  register_post_type( 'proposal', $args );
}
add_action( 'init', 'lab_create_post_type' );



/**
 * Uses custom template instead of standard theme single.php
 * 
 * @since 0.1
 */

/* Filter the single_template with our custom function*/
function lab_get_custom_post_type_template( $single_template ) {
     global $post;

     if ($post->post_type == 'proposal') {
          $single_template = dirname( __FILE__ ) . '/website-template.php';
     }
     return $single_template;
}

add_filter( "single_template", "lab_get_custom_post_type_template" ) ;

function lab_email_link() {
     print_r('test');
}
add_action( 'publish_post', 'lab_email_link' );








