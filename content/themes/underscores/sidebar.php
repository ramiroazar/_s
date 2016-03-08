<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

if (
	// ! is_active_sidebar( 'sidebar' ) ||
	wp_is_mobile()
) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>

	<?php
		$args = array(
			'post_type' => 'page',
			'tax_query' => array(
				array(
					'taxonomy' => 'category_page',
					'field'    => 'slug',
					'terms'    => 'services',
				),
			),
		);
	?>

	<?php $query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<section id="services" class="section services">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Services', '_s' ); ?></h2>

					</header>

					<div class="section-content">

						<?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'service' ); ?>

						<?php endwhile; ?>

					</div>

				</div>

			</section><!-- #services -->

		<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</aside><!-- #secondary -->
