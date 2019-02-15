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
	<h3><?php _e( 'You May Also Like', 'mudra' ); ?></h3>
	<?php
		$num = 1;
		foreach ( $related_posts as $post ) {
			setup_postdata( $post );
			$id = 'related-post-'. $num;
	?>
			<div id="<?php echo $id; ?>" class="related-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<div class="related-image">
					<?php
						if ( has_post_thumbnail() ) :
							echo get_the_post_thumbnail( null, 'mudra-related-image', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
						else :
							echo '<img src="' . get_template_directory_uri() . '/assets/images/related-placeholder.png" alt="" />';
						endif;
					?>
					</div>
				</a>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
			</div><!-- .related-post -->
	<?php
			$num += 1;
		}
	?>
</div><!-- .related-posts -->
<?php endif; ?>
