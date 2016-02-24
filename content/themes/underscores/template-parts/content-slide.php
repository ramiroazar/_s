<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<figure class="slide">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>

	<figcaption>
		<div>
			<div>
				<p>
					<?php the_title(); ?>
				</p>
				<?php the_content(); ?>
			</div>
		</div>
	</figcaption>
</figure>
