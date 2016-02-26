<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<section id="<?php echo sanitize_title(get_the_title()); ?>" class="section <?php echo sanitize_title(get_the_title()); ?>">

	<div>

		<header class="section-header">
			<?php the_title( sprintf( '<h3 class="section-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="section-image">
				<?php the_post_thumbnail( 'medium' ); ?>
			</div><!-- .section-image -->
		<?php endif; ?>

		<div class="section-content">
			<?php the_content(); ?>
		</div><!-- .section-content -->

		<footer class="section-footer">
			<?php _s_entry_footer(); ?>
		</footer><!-- .section-footer -->

	</div>
	
</section><!-- #<?php echo sanitize_title(get_the_title()); ?> -->
