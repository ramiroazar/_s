<?php

/**
 * functions.php
 */
function _s_setup_normalize() {
  remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', '_s_setup_normalize', 15 );

function _s_widgets_init_normalize() {
	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', '_s_widgets_init_normalize', 15 );

function _s_scripts_normalize() {
  wp_enqueue_style( '_s-stylesheet', get_stylesheet_directory_uri() . '/stylesheet.css', array('font-awesome'));

  wp_enqueue_script( '_s-javascript', get_stylesheet_directory_uri() . '/js/javascript.js', array('jquery'), false, true );

  wp_dequeue_style( '_s-style', get_stylesheet_uri() );

	wp_dequeue_script( '_s-navigation' );

	wp_dequeue_script( '_s-skip-link-focus-fix' );

	// 1) Deregister local copy of jQuery (wp_enqueue_script( 'jquery' );)
	wp_deregister_script('jquery');
	// 2) Replace with Google CDN
	wp_enqueue_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"));
	// 3) Load jQuery backup script (http://stackoverflow.com/a/1014251)
	// wp_enqueue_script('jquery-backup', (get_template_directory_uri() . "/js/jquery-backup.js"), false, '', true);
}
add_action( 'wp_enqueue_scripts', '_s_scripts_normalize', 15 );

/**
 * inc/custom-header.php
 */
function _s_custom_header_setup_normalize() {
  remove_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', '_s_custom_header_setup_normalize', 15 );

/**
 * inc/customizer.php
 */
function _s_customize_register_normalize() {
	remove_action( 'customize_register', '_s_customize_register' );
}
add_action( 'init', '_s_customize_register_normalize' );

function _s_customize_preview_js_normalize() {
	remove_action( 'customize_preview_init', '_s_customize_preview_js' );
}
add_action( 'init', '_s_customize_preview_js_normalize' );

/**
 * inc/jetpack.php
 */
function _s_jetpack_setup_normalize() {
  remove_theme_support( 'infinite-scroll' );
  remove_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', '_s_jetpack_setup_normalize', 15 );
