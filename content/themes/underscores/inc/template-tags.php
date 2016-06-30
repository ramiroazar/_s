<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */

if ( ! function_exists( '_s_entry_footer_child' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _s_more_link() {
		echo '<p><a href="' . esc_url( get_permalink() ) . '" class="button more-link">More</a></p>';
	}
endif;

if ( ! function_exists( 'wp_body' ) ) :
	/**
	 * Print scripts or data in the body tag on the front end.
	 */
	 function wp_body() {
	   do_action( 'wp_body' );
	 }
endif;
