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

/**
 * Register shortcode.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 */

function _s_shortcode_init_contact($atts) {

	$atts = shortcode_atts(
		array(
			'type' => false,
			'markup' => true,
		),
		$atts
	);

	 // Build array of contact details stored in database
	$contact = array();
	$contact['phone'] = get_theme_mod('phone');
	$contact['mobile'] = get_theme_mod('mobile');
	$contact['fax'] = get_theme_mod('fax');
	$contact['email'] = get_theme_mod('email'); // get_bloginfo('admin_email');
	$contact['name'] = get_bloginfo('name');
	$contact['description']= get_bloginfo('description');
	$contact['address'] = get_theme_mod('address');
	$contact['map'] = get_theme_mod('map');
	$contact['abn'] = get_theme_mod('abn');
	$contact['facebook'] = get_theme_mod('facebook');
	$contact['googleplus'] = get_theme_mod('googleplus');
	$contact['twitter'] = get_theme_mod('twitter');
	$contact['instagram']	= get_theme_mod('instagram');
	$contact['pinterest']	= get_theme_mod('pinterest');
	$contact['youtube'] = get_theme_mod('youtube');
	$contact['linkedin']	= get_theme_mod('linkedin');
	$contact = array_filter($contact);

	 // Reset and setup variables
	 $output = '';

	 // If type declared
	if ($atts['type']) :
		// If declared type is set
		if (isset($contact[$atts['type']])) :
			// If markup is true
			if ($atts['markup'] === true) :
				// Output value with markup
				switch ($atts['type']) :
					case ('name') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='" . esc_url( home_url( '/' ) ) . "'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('description') :
						$output .= "<span class='" . $atts['type'] . " contact-detail'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</span>";
						break;
					case ('phone') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='tel:" . $contact[$atts['type']] . "'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('mobile') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='tel:" . $contact[$atts['type']] . "'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('fax') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='tel:" . $contact[$atts['type']] . "'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('email') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='mailto:" . $contact[$atts['type']] . "'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('address') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='http://maps.google.com/?q=" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('map') :
						$output .= "<div class='" . $atts['type'] . " contact-detail map-container' tabindex='0'>";
							$output .= "<iframe src='" . $contact[$atts['type']] . "' frameborder='0' allowfullscreen></iframe>";
						$output .= "</div>";
						break;
					case ('abn') :
						$output .= "<a class='" . $atts['type'] . " contact-detail' href='http://abr.business.gov.au/SearchByAbn.aspx?SearchText=" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= $contact[$atts['type']];
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('facebook') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "Facebook";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('googleplus') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "Google+";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('twitter') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "Twitter";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('instagram') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "Instagram";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('pinterest') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "Pinterest";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('youtube') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "YouTube";
							$output .= "</span>";
						$output .= "</a>";
						break;
					case ('linkedin') :
						$output .= "<a class='" . $atts['type'] . " contact-detail social-media-network' href='" . $contact[$atts['type']] . "' target='_blank'>";
							$output .= "<span>";
								$output .= "LinkedIn";
							$output .= "</span>";
						$output .= "</a>";
						break;
				endswitch;
			// Else if markup is false
			else :
				// Output value without markup
				$output .= $contact[$atts['type']];
			endif;
		endif;
	// Else if type not declared
	else:
		// Output array
		$output .= implode(",", $contact);
	endif;

	// Return output
	 return $output;

}
add_shortcode("contact", "_s_shortcode_init_contact");

/**
 * Register shortcode.
 *
 * @link https://codex.wordpress.org/Shortcode_API
 */

function _s_question( $atts ) {

	$atts = shortcode_atts(
		array(
			'limit' 		=> -1,
			'questions'	=> true,
			'answers'	=> true,
			'order' => '',
			'orderby' => '',
		),
		$atts
	);

	$args = array(
		'post_type' => 'question',
		'posts_per_page' => $atts['limit'],
		'order' => $atts['order'],
		'orderby' => $atts['orderby'],
	);

	$return = '';

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :

		if ($atts['questions'] === true) :

			$return .= "<ol class='question'>";

			while ($the_query->have_posts()) : $the_query->the_post();

				$question_link = preg_replace('/\s+/', '_', get_the_title());

				$return .= "<li>";
				$return .= "<a href='#" . $question_link . "'>";
				$return .= get_the_title();
				$return .= "</a>";
				$return .= "</li>";

			endwhile;

			$return .= "</ol>";

		endif;

		if ($atts['answers'] === true) :

			$return .= "<dl class='question'>";

			while ($the_query->have_posts()) : $the_query->the_post();

				$question_link = preg_replace('/\s+/', '_', get_the_title());

				$return .= "<dt>";
				$return .= "<a href='#" . $question_link . "'>";
				$return .= get_the_title();
				$return .= "</a>";
				$return .= "</dt>";
				$return .= "<dd id='" . $question_link . "'>";
				$return .= wpautop(get_the_content());
				$return .= "</dd>";

			endwhile;

			$return .= "</dl>";

		endif;

	endif; wp_reset_query();

	return $return;
}

add_shortcode( 'question', '_s_question' );
