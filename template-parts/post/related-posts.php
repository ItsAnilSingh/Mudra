<?php
/**
 * Template part for displaying related posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

?>

<?php if ( ! empty( $related_posts ) ) : ?>
<div class="related-posts">
	<h3><?php esc_html_e( 'You May Also Like', 'mudra' ); ?></h3>
	<?php
		$num = 1;
		foreach ( $related_posts as $post ) {
			setup_postdata( $post );
			$id = 'related-post-'. $num;
	?>
			<div id="<?php echo esc_attr( $id ); ?>" class="related-post">
			<?php
				if ( has_post_thumbnail() && ( get_the_post_thumbnail() != '' ) ) :
					echo '<a href="'. esc_url( get_permalink() ) .'" title="'. the_title_attribute( 'echo=0' ) .'">';
					echo '<div class="related-image">';
					echo get_the_post_thumbnail( null, 'mudra-related-image', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
					echo '</div>';
					echo '</a>';
				endif;
			?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
			</div><!-- .related-post -->
	<?php
			$num += 1;
		}
	?>
</div><!-- .related-posts -->
<?php endif; ?>
