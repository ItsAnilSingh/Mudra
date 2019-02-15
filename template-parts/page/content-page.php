<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mudra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<?php mudra_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail(
					'medium_large',
					['class'=>'featured-image']
				);
			endif;

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mudra' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
