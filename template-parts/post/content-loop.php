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

	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) :
			printf( '<span class="sticky-label">%s</span>', __( 'Featured', 'mudra' ) );
		endif;
		if ( is_front_page() && ! is_home() ) :
			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
			the_title( sprintf(
				'<h3 class="entry-title" itemprop="headline"><a href="%1$s" rel="bookmark" title="%2$s">',
				esc_url( get_permalink() ),
				esc_html( get_the_title() ) ),
				'</a></h3>'
			);
		else :
			the_title( sprintf(
				'<h2 class="entry-title" itemprop="headline"><a href="%1$s" rel="bookmark" title="%2$s">',
				esc_url( get_permalink() ),
				esc_html( get_the_title() ) ),
				'</a></h2>'
			);
		endif;
		?>
		<?php get_template_part( 'template-parts/post/entry', 'meta' ); ?>
	</header><!-- .entry-header -->

	<?php if ( true == get_theme_mod( 'archive_featured_images', true ) ) : ?>
		<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php
			if ( has_post_thumbnail() ) :
				echo '<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
				the_post_thumbnail( 'mudra-featured-image' );
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'mudra-featured-image' );
				echo '<meta itemprop="url" content="' . $image[0] . '">';
				echo '<meta itemprop="width" content="' . $image[1] . '">';
				echo '<meta itemprop="height" content="' . $image[2] . '">';
				echo '</span>';
			else :
				echo '<img src="' . get_template_directory_uri() . '/assets/images/featured-placeholder.png" alt="" />';
			endif;
		?>
		</a>
	<?php endif; ?>

	<div class="entry-summary" itemprop="text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="read-more">
		<a href="<?php the_permalink(); ?>">
			<?php echo esc_attr( get_theme_mod( 'read_more' ) ); ?>
		</a>
	</div>

	<?php
		if ( true == get_theme_mod( 'archive_entry_footer', true ) ) :
			mudra_entry_footer();
		endif;
	?>

</article>
