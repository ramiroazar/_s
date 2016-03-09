<?php
/**
 * Template Name: Reviews Index
 *
 * @package _s
 */

get_header(); ?>

	<?php
		$args = wp_parse_args($query_string);

		query_posts(array(
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'terms' => array('post-format-quote'),
					'field' => 'slug',
				),
			),
		) );
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
