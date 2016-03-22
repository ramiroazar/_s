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

			<?php if ( get_theme_mod('map') ) : ?>

				<section id="map" class="section map">

					<div>

						<header class="section-header">

							<h2 class="section-title"><?php _e( 'Map', '_s' ); ?></h2>

						</header><!-- .section-header -->

						<div class="section-content">

							<?php echo do_shortcode('[contact type="map"]'); ?>

						</div><!-- .section-content -->

					</div>

				</section><!-- #map -->

			<?php endif; ?>

			<?php
			  $args = array(
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'terms' => array('post-format-quote'),
							'field' => 'slug',
						),
					),
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<section id="reviews" class="section reviews">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( 'Reviews', '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <div class="slider">

								  <div class="slides">

									  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

									    <?php get_template_part( 'template-parts/content', 'review' ); ?>

									  <?php endwhile; ?>

									</div><!-- .slides -->

								</div><!-- .slider -->

							</div><!-- .section-content -->

						</div>

					</section><!-- #reviews -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'post',
					'posts_per_page' => 1,
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

					<section id="gallery" class="section gallery">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>

							  <?php endwhile; ?><!-- .section-content -->

							</div>

						</div>

					</section><!-- #gallery -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'section',
					'posts_per_page' => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category_section',
							'terms' => array('calls-to-action'),
							'field' => 'slug',
						),
					),
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<section id="cta" class="section cta">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php the_content(); ?>

							  <?php endwhile; ?>

							</div><!-- .section-content -->

							<footer class="section-footer">

								<?php _s_entry_footer(); ?>

							</footer><!-- .section-footer -->

						</div>

					</section><!-- #cta -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'section',
					'posts_per_page' => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category_section',
							'terms' => array('credentials'),
							'field' => 'slug',
						),
					),
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<section id="credentials" class="section credentials">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php the_content(); ?>

							  <?php endwhile; ?>

							</div><!-- .section-content -->

							<footer class="section-footer">

								<?php _s_entry_footer(); ?>

							</footer><!-- .section-footer -->

						</div>

					</section><!-- #credentials -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'section',
					'posts_per_page' => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category_section',
							'terms' => array('counters'),
							'field' => 'slug',
						),
					),
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<section id="counter" class="section counter">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php the_content(); ?>

							  <?php endwhile; ?>

							</div><!-- .section-content -->

							<footer class="section-footer">

								<?php _s_entry_footer(); ?>

							</footer><!-- .section-footer -->

						</div>

					</section><!-- #counter -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<section id="contact" class="section contact">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Contact', '_s' ); ?></h2>

					</header>

					<div class="section-content">

						<?php
						  $args = array(
								'post_type' => 'wpcf7_contact_form',
								'posts_per_page' => 1,
						  );
						?>

						<?php $query = new WP_Query( $args ); ?>

							<?php if ( $query->have_posts() ) : ?>

								<section id="contact-form" class="section contact-form">

									<div>

										<header class="section-header">

											<h3 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h3>

										</header><!-- .section-header -->

										<div class="section-content">

										  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

												<?php echo do_shortcode('[contact-form-7 id="' . get_the_ID() . '"]'); ?>

										  <?php endwhile; ?>

										</div><!-- .section-content -->

									</div>

								</section><!-- #contact-form -->

							<?php endif; ?>

						<?php wp_reset_postdata(); ?>

						<?php
						  $args = array(
								'post_type' => 'section',
								'posts_per_page' => 1,
								'tax_query' => array(
									array(
										'taxonomy' => 'category_section',
										'terms' => array('contact-details'),
										'field' => 'slug',
									),
								),
						  );
						?>

						<?php $query = new WP_Query( $args ); ?>

							<?php if ( $query->have_posts() ) : ?>

								<section id="contact-details" class="section contact-details">

									<div>

										<header class="section-header">

											<h3 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h3>

										</header><!-- .section-header -->

										<div class="section-content">

										  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

										    <?php the_content(); ?>

										  <?php endwhile; ?>

										</div><!-- .section-content -->

										<footer class="section-footer">

											<?php _s_entry_footer(); ?>

										</footer><!-- .section-footer -->

									</div>

								</section><!-- #contact-details -->

							<?php endif; ?>

						<?php wp_reset_postdata(); ?>

						<?php
						  $args = array(
								'post_type' => 'section',
								'posts_per_page' => 1,
								'tax_query' => array(
									array(
										'taxonomy' => 'category_section',
										'terms' => array('social-media'),
										'field' => 'slug',
									),
								),
						  );
						?>

						<?php $query = new WP_Query( $args ); ?>

							<?php if ( $query->have_posts() ) : ?>

								<section id="social-media" class="section social-media">

									<div>

										<header class="section-header">

											<h3 class="section-title"><?php _e( $query->post->post_title, '_s' ); ?></h3>

										</header><!-- .section-header -->

										<div class="section-content">

										  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

										    <?php the_content(); ?>

										  <?php endwhile; ?>

										</div><!-- .section-content -->

										<footer class="section-footer">

											<?php _s_entry_footer(); ?>

										</footer><!-- .section-footer -->

									</div>

								</section><!-- #social-media -->

							<?php endif; ?>

						<?php wp_reset_postdata(); ?>

					</div>

				</div>

			</section><!-- #contact -->

			<div id="copyright" class="site-info">

				<div>

					<?php printf( esc_html__( '%1$s %2$s %3$s.', '_s' ), '&copy;', date('Y'), '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" itemprop="url">' . get_bloginfo( 'name' ) . '</a>' ); ?>

					<?php
						if (is_front_page()) :
							printf( esc_html__( '%1$s %2$s.', '_s' ), 'Website Designed & Developed by', '<a href="http://www.insightdigital.com.au" target="_blank">Insight Digital Marketing</a>' );
						endif;
					?>

				</div>

			</div><!-- #copyright -->

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
