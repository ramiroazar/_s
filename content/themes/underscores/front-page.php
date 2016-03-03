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

			<section id="featured" class="section featured">

				<div>

					<?php
					  $args = array(
							'post_type' => 'slider',
							'tax_query' => array(
								array(
									'taxonomy' => 'category_slider',
									'field'    => 'slug',
									'terms'    => 'front-page',
								),
							),
					  );
					?>

					<?php $query = new WP_Query( $args ); ?>

					<?php if ( $query->have_posts() ) : ?>

					  <div class="slider">

						  <div class="slides">

							  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							    <?php get_template_part( 'template-parts/content', 'slide' ); ?>

							  <?php endwhile; ?>

						  </div>

					  </div>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</section><!-- #featured -->

			<?php endif; ?>

			<section id="introduction" class="section introduction">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'About', '_s' ); ?></h2>

					</header>

					<?php
					  $args = array(
							'post_type' => 'page',
							'pagename' => 'home',
					  );
					?>

					<?php $query = new WP_Query( $args ); ?>

					<?php if ( $query->have_posts() ) : ?>

					  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

					    <?php get_template_part( 'template-parts/content', 'toggle' ); ?>

					  <?php endwhile; ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</section><!-- #introduction -->

			<section id="services" class="section services">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Services', '_s' ); ?></h2>

					</header>

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

					  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

					    <?php get_template_part( 'template-parts/content', 'service' ); ?>

					  <?php endwhile; ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</section><!-- #services -->

			<section id="services-featured" class="section services-featured">

				<div>

					<header class="section-header">

						<h2 class="section-title"><?php _e( 'Featured Services', '_s' ); ?></h2>

					</header>

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

					  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

					    <?php get_template_part( 'template-parts/content', 'service' ); ?>

					  <?php endwhile; ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</section><!-- #services -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
