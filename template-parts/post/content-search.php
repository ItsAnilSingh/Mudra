<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mudra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/CreativeWork">

	<?php
	if ( true == get_theme_mod( 'archive_featured_images', true ) ) :
		if ( has_post_thumbnail() && ( get_the_post_thumbnail() != '' ) ) :
			echo '<a class="post-thumbnail" href="'. esc_url( get_permalink() ) .'" title="'. the_title_attribute( 'echo=0' ) .'">';
			echo '<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
			the_post_thumbnail( 'thumbnail' );
			$mudra_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
			echo '<meta itemprop="url" content="' . esc_url( $mudra_image[0] ) . '">';
			echo '<meta itemprop="width" content="' . esc_attr( $mudra_image[1] ) . '">';
			echo '<meta itemprop="height" content="' . esc_attr( $mudra_image[2] ) . '">';
			echo '</span>';
			echo '</a>';
		endif;
	endif;
	?>

	<h2 class="entry-title" itemprop="headline">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h2><!--/.entry-title-->

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

</article>
