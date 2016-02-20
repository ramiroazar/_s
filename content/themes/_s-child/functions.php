<?php

/**
 * Normalize
 */
require get_stylesheet_directory() . '/inc/normalize.php';

/**
 * Enqueue scripts and styles.
 */
function _s_scripts_child() {
  wp_enqueue_script( '_s-javascript', get_stylesheet_directory_uri() . '/js/javascript.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', '_s_scripts_child' );
