<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			elseif ( is_front_page() && is_home() ) :
				the_title( '<h3 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			else :
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				get_template_part( 'template-parts/post/entry', 'meta' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
			if ( has_post_thumbnail() && ( get_theme_mod( 'single_featured_image', true ) == true ) ) :
				the_post_thumbnail(
					'mudra-featured-image',
					['class'=>'featured-image']
				);
			endif;
		?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mudra' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mudra' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		if ( true == get_theme_mod( 'single_entry_footer', true ) ) :
			mudra_entry_footer();
		endif;
	?>

</article><!-- #post-## -->

<?php
	the_post_navigation( array(
		'prev_text' => '&laquo; %title',
		'next_text' => '%title &raquo;',
	) );
?>

<?php if ( true == get_theme_mod( 'author_box', true ) ) : ?>
<div class="author-box" itemprop="author" itemscope itemtype="http://schema.org/Person">
	<h4 class="about-author">About The Author</h4>
	<span>
		<?php
			if ( function_exists( 'get_avatar' ) ) :
				echo get_avatar( get_the_author_meta( 'email' ), '100' );
			endif;
		?>
	</span>
	<div class="author-meta">
		<h5 class="author-name" itemprop="name">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><?php the_author_meta( 'display_name' ); ?></a>
		</h5>
		<span class="author-desc" itemprop="description"><?php the_author_meta( 'description' ); ?></span>
		<div class="post-author-links">
		<?php if ( get_the_author_meta( 'facebook' ) != '' ) : ?>
			<a class="facebook" title="Follow on Facebook" href="<?php echo get_the_author_meta( 'facebook' ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'twitter' ) != '' ) : ?>
			<a class="twitter" title="Follow on Twitter" href="<?php echo esc_url( 'https://twitter.com/' ) . get_the_author_meta( 'twitter' ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'googleplus' ) != '' ) : ?>
			<a class="googleplus" title="Follow on Google+" href="<?php echo get_the_author_meta( 'googleplus' ); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<?php endif; ?>
		</div>
	</div>
</div><!-- .author-box -->
<?php endif; ?>

<?php
	if ( 'disable' !== get_theme_mod( 'related_posts' ) ) :
		if ( 'tags' === get_theme_mod( 'related_posts' ) ) :
			mudra_related_posts( array( 'taxonomy' => 'post_tag' ) );
		else :
			mudra_related_posts();
		endif;
	endif;
?>
