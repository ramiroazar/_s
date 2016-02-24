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

					<h2 class="section-title"><?php _e( 'Map', '_s' ); ?></h2>

					<?php echo do_shortcode('[contact type="map"]'); ?>

				</div>

			</section><!-- #map -->

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
