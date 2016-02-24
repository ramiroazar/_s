<?php

/**
* Register a taxonomy.
*
* @link http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

add_action( 'init', '_s_taxonomy_init_page', 0 );

function _s_taxonomy_init_page() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category_page' ),
	);

	register_taxonomy( 'category_page', array( 'page' ), $args );

}

/**
 * Register a post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action( 'init', '_s_post_type_init_slider' );

function _s_post_type_init_slider() {

	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', '_s' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', '_s' ),
		'menu_name'          => _x( 'Sliders', 'admin menu', '_s' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', '_s' ),
		'add_new'            => _x( 'Add New', 'slider', '_s' ),
		'add_new_item'       => __( 'Add New Slider', '_s' ),
		'new_item'           => __( 'New Slider', '_s' ),
		'edit_item'          => __( 'Edit Slider', '_s' ),
		'view_item'          => __( 'View Slider', '_s' ),
		'all_items'          => __( 'All Sliders', '_s' ),
		'search_items'       => __( 'Search Sliders', '_s' ),
		'parent_item_colon'  => __( 'Parent Sliders:', '_s' ),
		'not_found'          => __( 'No sliders found.', '_s' ),
		'not_found_in_trash' => __( 'No sliders found in Trash.', '_s' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false, // array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 			=> 'dashicons-images-alt',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'slider', $args );

}

/**
 * Register a taxonomy.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

add_action( 'init', '_s_taxonomy_init_slider', 0 );

function _s_taxonomy_init_slider() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category_slider' ),
	);

	register_taxonomy( 'category_slider', array( 'slider' ), $args );

}
