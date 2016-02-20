<?php

/**
 * functions.php
 */
function _s_setup_normalize() {
  remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', '_s_setup_normalize', 15 );

function _s_scripts_normalize() {
  wp_enqueue_style( '_s-stylesheet', get_stylesheet_directory_uri() . '/stylesheet.css' );

  wp_dequeue_style( '_s-style', get_stylesheet_uri() );

	wp_dequeue_script( '_s-navigation' );

	wp_dequeue_script( '_s-skip-link-focus-fix' );
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
