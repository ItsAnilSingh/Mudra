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

	<?php
		if ( true == get_theme_mod( 'archive_featured_images', true ) ) :
			if ( has_post_thumbnail() && ( get_the_post_thumbnail() != '' ) ) :
				echo '<a class="post-thumbnail" href="'. esc_url( get_permalink() ) .'" title="'. esc_attr( get_the_title() ) .'">';
				echo '<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
				the_post_thumbnail( 'medium' );
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
				echo '<meta itemprop="url" content="' . esc_url( $image[0] ) . '">';
				echo '<meta itemprop="width" content="' . esc_attr( $image[1] ) . '">';
				echo '<meta itemprop="height" content="' . esc_attr( $image[2] ) . '">';
				echo '</span>';
				echo '</a>';
			endif;
		endif;
	?>

	<h2 class="entry-title" itemprop="headline">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h2><!--/.entry-title-->

	<div class="entry-summary" itemprop="text">
		<?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?>
	</div><!-- .entry-summary -->

	<div class="read-more">
		<a href="<?php the_permalink(); ?>">
		<?php
			$read_more = get_theme_mod( 'read_more', __( 'Read More', 'mudra' ) );
			if ( '' == $read_more )
				$read_more = __( 'Read More', 'mudra' );
			echo esc_html( $read_more );
		?>
		</a>
	</div>

</article>
