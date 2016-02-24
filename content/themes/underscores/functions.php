<?php

/**
 * Normalize.
 */
require get_stylesheet_directory() . '/inc/normalize.php';

/**
 * Enqueue scripts and styles.
 */
function _s_scripts_enqueue() {
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', '_s_scripts_enqueue' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Custom post types.
 */
require get_stylesheet_directory() . '/inc/post-types.php';

/**
 * Shortcodes.
 */
require get_stylesheet_directory() . '/inc/shortcodes.php';
