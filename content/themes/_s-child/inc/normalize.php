<?php

/**
 * functions.php
 */
function _s_setup_child() {
  remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', '_s_setup_child', 15 );

function _s_scripts_child() {
  wp_enqueue_style( '_s-style-parent', get_template_directory_uri() . '/style.css' );

	wp_dequeue_script( '_s-navigation' );

	wp_dequeue_script( '_s-skip-link-focus-fix' );
}
add_action( 'wp_enqueue_scripts', '_s_scripts_child', 15 );

/**
 * inc/custom-header.php
 */
function _s_custom_header_setup_child() {
  remove_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', '_s_custom_header_setup_child', 15 );

/**
 * inc/customizer.php
 */
function _s_customize_register_child() {
	remove_action( 'customize_register', '_s_customize_register' );
}
add_action( 'init', '_s_customize_register_child' );

function _s_customize_preview_js_child() {
	remove_action( 'customize_preview_init', '_s_customize_preview_js' );
}
add_action( 'init', '_s_customize_preview_js_child' );

/**
 * inc/jetpack.php
 */
function _s_jetpack_setup_child() {
  remove_theme_support( 'infinite-scroll' );
  remove_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', '_s_jetpack_setup_child', 15 );
