<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<?php
	$morestring = '<!--more-->';
	$explode_content = explode( $morestring, $post->post_content );
	$count_content = count($explode_content);
	$counter = -1;
	foreach ($explode_content as $value) : $counter++;
		${"content_" . ($counter + 1)} = apply_filters( 'the_content', $explode_content[$counter] );
	endforeach;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ($count_content > 1) : ?>
		<header class="entry-header">
			<?php echo $content_1 ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-summary">

		<?php if ($count_content == 1) : ?>
			<div>
				<?php echo $content_1 ?>
			</div>
		<?php endif; ?>

		<?php if ($count_content >= 2) : ?>
			<div>
				<?php echo $content_2 ?>
			</div>
		<?php endif; ?>

		<?php if ($count_content >= 3) : ?>
			<div>
				<?php echo $content_3 ?>
			</div>
		<?php endif; ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ($count_content > 1) : ?>
			<button id="button-<?php the_ID(); ?>" class="toggle" data-target=".entry-summary" aria-pressed="false" role="button" tabindex="0">
				<span>Toggle</span>
			</button>
		<?php endif; ?>
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
