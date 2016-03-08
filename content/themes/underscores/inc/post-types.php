<?php

/**
* Add post type support
*
* @link https://codex.wordpress.org/Function_Reference/add_post_type_support
*/

	add_post_type_support( "page", "excerpt" );

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

add_action( 'init', '_s_post_type_init_slide' );

function _s_post_type_init_slide() {

	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', '_s' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', '_s' ),
		'menu_name'          => _x( 'Slides', 'admin menu', '_s' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', '_s' ),
		'add_new'            => _x( 'Add New', 'slide', '_s' ),
		'add_new_item'       => __( 'Add New Slide', '_s' ),
		'new_item'           => __( 'New Slide', '_s' ),
		'edit_item'          => __( 'Edit Slide', '_s' ),
		'view_item'          => __( 'View Slide', '_s' ),
		'all_items'          => __( 'All Slides', '_s' ),
		'search_items'       => __( 'Search Slides', '_s' ),
		'parent_item_colon'  => __( 'Parent Slides:', '_s' ),
		'not_found'          => __( 'No slides found.', '_s' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', '_s' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false, // array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 			=> 'dashicons-images-alt',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'slide', $args );

}

/**
 * Register a taxonomy.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

add_action( 'init', '_s_taxonomy_init_slide', 0 );

function _s_taxonomy_init_slide() {

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
		'rewrite'           => array( 'slug' => 'category_slide' ),
	);

	register_taxonomy( 'category_slide', array( 'slide' ), $args );

}

/**
 * Register a post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action( 'init', '_s_post_type_init_section' );

function _s_post_type_init_section() {

	$labels = array(
		'name'               => _x( 'Sections', 'post type general name', '_s' ),
		'singular_name'      => _x( 'Section', 'post type singular name', '_s' ),
		'menu_name'          => _x( 'Sections', 'admin menu', '_s' ),
		'name_admin_bar'     => _x( 'Section', 'add new on admin bar', '_s' ),
		'add_new'            => _x( 'Add New', 'section', '_s' ),
		'add_new_item'       => __( 'Add New Section', '_s' ),
		'new_item'           => __( 'New Section', '_s' ),
		'edit_item'          => __( 'Edit Section', '_s' ),
		'view_item'          => __( 'View Section', '_s' ),
		'all_items'          => __( 'All Sections', '_s' ),
		'search_items'       => __( 'Search Sections', '_s' ),
		'parent_item_colon'  => __( 'Parent Sections:', '_s' ),
		'not_found'          => __( 'No sections found.', '_s' ),
		'not_found_in_trash' => __( 'No sections found in Trash.', '_s' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false, // array( 'slug' => 'section' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 			=> 'dashicons-format-aside',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'section', $args );

}

/**
 * Register a taxonomy.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

add_action( 'init', '_s_taxonomy_init_section', 0 );

function _s_taxonomy_init_section() {

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
		'rewrite'           => array( 'slug' => 'category_section' ),
	);

	register_taxonomy( 'category_section', array( 'section' ), $args );

}

/**
* Register a post type.
*
* @link http://codex.wordpress.org/Function_Reference/register_post_type
*/

add_action( 'init', '_s_post_type_question_init' );

function _s_post_type_question_init() {

 $labels = array(
	 'name'               => _x( 'Questions', 'post type general name', '_s' ),
	 'singular_name'      => _x( 'Question', 'post type singular name', '_s' ),
	 'menu_name'          => _x( 'Questions', 'admin menu', '_s' ),
	 'name_admin_bar'     => _x( 'Question', 'add new on admin bar', '_s' ),
	 'add_new'            => _x( 'Add New', 'question', '_s' ),
	 'add_new_item'       => __( 'Add New Question', '_s' ),
	 'new_item'           => __( 'New Question', '_s' ),
	 'edit_item'          => __( 'Edit Question', '_s' ),
	 'view_item'          => __( 'View Question', '_s' ),
	 'all_items'          => __( 'All Questions', '_s' ),
	 'search_items'       => __( 'Search Questions', '_s' ),
	 'parent_item_colon'  => __( 'Parent Questions:', '_s' ),
	 'not_found'          => __( 'No questions found.', '_s' ),
	 'not_found_in_trash' => __( 'No questions found in Trash.', '_s' )
 );

 $args = array(
	 'labels'             => $labels,
	 'public'             => false,
	 'publicly_queryable' => false,
	 'show_ui'            => true,
	 'show_in_menu'       => true,
	 'query_var'          => true,
	 'rewrite'            => false, // array( 'slug' => 'question' ),
	 'capability_type'    => 'post',
	 'has_archive'        => false,
	 'hierarchical'       => false,
	 'menu_position'      => null,
	 'menu_icon' 			=> 'dashicons-editor-help',
	 'supports'           => array( 'title', 'editor' )
 );

 register_post_type( 'question', $args );

}

/**
 * Register a taxonomy.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

add_action( 'init', '_s_taxonomy_question_init', 0 );

function _s_taxonomy_question_init() {

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
		'rewrite'           => array( 'slug' => 'category_question' ),
	);

	register_taxonomy( 'category_question', array( 'question' ), $args );

}
