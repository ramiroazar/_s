<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( !wp_is_mobile() ) : ?>

				<?php
				  $args = array(
						'post_type' => 'slide',
						'tax_query' => array(
							array(
								'taxonomy' => 'category_slide',
								'field'    => 'slug',
								'terms'    => 'featured',
							),
						),
				  );
				?>

				<?php $query = new WP_Query( $args ); ?>

					<?php if ( $query->have_posts() ) : ?>

						<section id="featured" class="section featured">

							<div>

								<div class="section-content">

								  <div class="slider">

									  <div class="slides">

										  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

										    <?php get_template_part( 'template-parts/content', 'slide' ); ?>

										  <?php endwhile; ?>

									  </div><!-- .slides -->

								  </div><!-- .slider -->

								</div><!-- .section-content -->

							</div>

						</section><!-- #featured -->

					<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php
			  $args = array(
					'post_type' => 'page',
					'pagename' => 'home',
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

						  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

								<?php if (get_the_content() != '') : ?>

									<section id="introduction" class="section introduction">

										<div>

											<header class="section-header">

												<h2 class="section-title"><?php _e( 'Introduction', '_s' ); ?></h2>

											</header><!-- .section-header -->

											<div class="section-content">

										    <?php get_template_part( 'template-parts/content', 'toggle' ); ?>

											</div><!-- .section-content -->

										</div>

									</section><!-- #introduction -->

								<?php endif; ?>

						  <?php endwhile; ?>

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'page',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'category_page',
							'field'    => 'slug',
							'terms'    => 'services',
						),
						array(
							'taxonomy' => 'category_page',
							'field'    => 'slug',
							'terms'    => 'featured',
							'operator' => 'NOT IN',
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

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php get_template_part( 'template-parts/content', 'service' ); ?>

							  <?php endwhile; ?>

							</div><!-- .section-content -->

						</div>

					</section><!-- #services -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php
			  $args = array(
					'post_type' => 'page',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'category_page',
							'field'    => 'slug',
							'terms'    => 'services',
						),
						array(
							'taxonomy' => 'category_page',
							'field'    => 'slug',
							'terms'    => 'featured',
						),
					),
			  );
			?>

			<?php $query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<section id="services-featured" class="section services-featured">

						<div>

							<header class="section-header">

								<h2 class="section-title"><?php _e( 'Featured Services', '_s' ); ?></h2>

							</header><!-- .section-header -->

							<div class="section-content">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php get_template_part( 'template-parts/content', 'service' ); ?>

							  <?php endwhile; ?>

							</div><!-- .section-content -->

						</div>

					</section><!-- #services-featured -->

				<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
