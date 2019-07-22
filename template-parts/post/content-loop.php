<?php
/**
 * Template part for displaying posts with excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mudra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/CreativeWork">

	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) :
			printf( '<span class="sticky-label">%s</span>', esc_html__( 'Sticky', 'mudra' ) );
		endif;
		if ( is_front_page() && ! is_home() ) :
			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
			the_title( sprintf(
				'<h3 class="entry-title" itemprop="headline"><a href="%1$s" rel="bookmark" title="%2$s">',
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ) ),
				'</a></h3>'
			);
		else :
			the_title( sprintf(
				'<h2 class="entry-title" itemprop="headline"><a href="%1$s" rel="bookmark" title="%2$s">',
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ) ),
				'</a></h2>'
			);
		endif;
		?>
		<?php get_template_part( 'template-parts/post/entry', 'meta' ); ?>
	</header><!-- .entry-header -->

	<?php
	if ( true == get_theme_mod( 'archive_featured_images', true ) ) :
		if ( has_post_thumbnail() && ( get_the_post_thumbnail() != '' ) ) :
			echo '<a class="featured-image" href="'. esc_url( get_permalink() ) .'" title="'. the_title_attribute( 'echo=0' ) .'">';
			echo '<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
			the_post_thumbnail( 'mudra-featured-image' );
			$mudra_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'mudra-featured-image' );
			echo '<meta itemprop="url" content="' . esc_url( $mudra_image[0] ) . '">';
			echo '<meta itemprop="width" content="' . esc_attr( $mudra_image[1] ) . '">';
			echo '<meta itemprop="height" content="' . esc_attr( $mudra_image[2] ) . '">';
			echo '</span>';
			echo '</a>';
		endif;
	endif;
	?>

	<?php
	if ( '' != get_the_excerpt() ) :
		?>
		<div class="entry-summary" itemprop="text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php
	endif;
	?>

	<div class="read-more">
		<a href="<?php the_permalink(); ?>">
			<?php
			$mudra_read_more = get_theme_mod( 'read_more', __( 'Read More', 'mudra' ) );
			if ( '' == $mudra_read_more )
				$mudra_read_more = __( 'Read More', 'mudra' );
			echo esc_html( $mudra_read_more );
			?>
		</a>
	</div>

	<?php
	if ( true == get_theme_mod( 'archive_entry_footer', true ) ) :
		mudra_entry_footer();
	endif;
	?>

</article>
