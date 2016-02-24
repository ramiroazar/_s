<?php

/**
 * Register shortcode.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 */

function _s_shortcode_init_query( $atts ) {

	$atts = shortcode_atts(
	array(
		'post_type' => false,
		'taxonomy' => false,
		'terms' => false,
		'template_part' => false,
		'before' => false,
		'after' => false,
	),
	$atts
	);

	$args = array(
		'post_type' => $atts['post_type'],
	);

	if ($atts['taxonomy']) :
		$args['tax_query'] = array(
			array(
				'taxonomy' => $atts['taxonomy'],
				'field' => 'slug',
				'terms' => explode(',', $atts['terms']),
			)
		);
	endif;

	$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			if ($atts['before']) :
				$return .= $atts['before'];
			endif;

			while ( $query->have_posts() ) : $query->the_post();

				ob_start();

					get_template_part( 'template-parts/content', $atts['template_part'] );

				$return .= ob_get_clean();

			endwhile;

			if ($atts['after']) :
				$return .= $atts['after'];
			endif;

		endif;

	wp_reset_postdata();

	return $return;
}

add_shortcode( 'query', '_s_shortcode_init_query' );
