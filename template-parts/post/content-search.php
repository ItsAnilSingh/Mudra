<?php
/**
 * Template part for displaying posts with excerpts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">

	<?php if ( true == get_theme_mod( 'archive_featured_images', true ) ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php
			if ( has_post_thumbnail() ) :
				echo '<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
				the_post_thumbnail( 'medium' );
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
				echo '<meta itemprop="url" content="' . $image[0] . '">';
				echo '<meta itemprop="width" content="' . $image[1] . '">';
				echo '<meta itemprop="height" content="' . $image[2] . '">';
				echo '</span>';
			else :
				echo '<img src="' . get_template_directory_uri() . '/assets/images/thumbnail-placeholder.png" alt="" />';
			endif;
		?>
		</a>
	<?php endif; ?>

	<h2 class="entry-title" itemprop="headline">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h2><!--/.entry-title-->

	<?php get_template_part( 'template-parts/post/entry', 'meta' ); ?>

	<div class="entry-summary" itemprop="text">
		<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
	</div><!-- .entry-summary -->

	<div class="read-more">
		<a href="<?php the_permalink(); ?>" title="<?php echo get_theme_mod( 'read_more', 'Read More' ); ?>">
			<?php echo get_theme_mod( 'read_more', 'Read More' ); ?>
		</a>
	</div>

</article>
