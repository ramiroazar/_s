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
	echo '<p><a href="' . esc_url( get_permalink() ) . '" class="more-link">More</a></p>';
}
endif;
