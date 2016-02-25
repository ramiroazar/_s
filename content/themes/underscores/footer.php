<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

		</div>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div>

			<section id="map" class="section map">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Map', '_s' ); ?></h2>

					</header>

					<?php echo do_shortcode('[contact type="map"]'); ?>

				</div>

			</section><!-- #map -->

			<section id="gallery" class="section gallery">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Gallery', '_s' ); ?></h2>

					</header>

					<?php
					  $args = array(
							'post_type' => 'post',
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'terms' => array('post-format-gallery'),
									'field' => 'slug',
								),
							),
					  );
					?>

					<?php $query = new WP_Query( $args ); ?>

					<?php if ( $query->have_posts() ) : ?>

					  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

					    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>

					  <?php endwhile; ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</section><!-- #gallery -->

			<div class="site-info">

				<div>

					<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>

				</div>

			</div><!-- .site-info -->

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
