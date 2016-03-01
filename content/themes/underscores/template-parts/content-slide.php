<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( get_post_meta(get_the_ID(), 'video', true) ) : ?>
		<figure class="entry-video">
			<?php /* <video preload="none" loop="1" muted="muted">
				<source type="video/youtube" src="<?php echo get_post_meta(get_the_ID(), 'video', true); ?>" />
			</video> */ ?>
			<?php // echo do_shortcode('[video src="http://fvsch.com/code/video-background/video.mp4"]'); ?>
			<?php // echo do_shortcode('[video type="video/youtube" src="' . get_post_meta(get_the_ID(), 'video', true) . '"]'); ?>
			<?php // echo do_shortcode('[video autoplay="true" loop="true" type="video/youtube" src="' . get_post_meta(get_the_ID(), 'video', true) . '"]'); ?>
			<?php echo do_shortcode(get_post_meta(get_the_ID(), 'video', true)); ?>
		</figure><!-- .entry-video -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<figure class="entry-image">
			<?php the_post_thumbnail(); ?>
		</figure><!-- .entry-image -->
	<?php endif; ?>

	<div>
		<div>
			<div>
				<header class="entry-header">
					<?php the_title( '<span class="entry-title">', '</span>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php _s_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				<footer class="entry-footer">
					<?php _s_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->
