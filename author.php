<?php
/**
 * The template for displaying author archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mudra
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( true == get_theme_mod( 'mudra_breadcrumbs', true ) ) :
			mudra_breadcrumbs();
		endif;
		?>

		<div class="author-box" itemprop="author" itemscope itemtype="https://schema.org/Person">
			<div class="alignleft">
				<?php
				if ( function_exists( 'get_avatar' ) ) :
					echo get_avatar( get_the_author_meta( 'email' ), '100' );
				endif;
				?>
			</div>
			<div class="author-meta">
				<h5 class="author-name" itemprop="name">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><?php the_author_meta( 'display_name' ); ?></a>
				</h5>
				<span class="author-post-count">
					<?php
					$author_post_count = count_user_posts( get_the_author_meta( 'ID' ) );
					$author_post_count_text = __( 'Post', 'mudra' );
					if ( $author_post_count > 1 ) :
						$author_post_count_text = __( 'Posts', 'mudra' );
					endif;
					printf(
						'%1$s %2$s',
						esc_html( $author_post_count ),
						esc_html( $author_post_count_text )
					);
					?>
				</span>
				<span class="author-desc" itemprop="description"><?php the_author_meta( 'description' ); ?></span>
				<div class="post-author-links">
				<?php if ( get_the_author_meta( 'url' ) != '' ) : ?>
					<a class="url" title="<?php esc_attr_e( 'Visit Website', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'facebook' ) != '' ) : ?>
					<a class="facebook" title="<?php esc_attr_e( 'Follow on Facebook', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'twitter' ) != '' ) : ?>
					<a class="twitter" title="<?php esc_attr_e( 'Follow on Twitter', 'mudra' ); ?>" href="<?php echo esc_url( 'https://twitter.com/' ) . esc_attr( get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'instagram' ) != '' ) : ?>
					<a class="instagram" title="<?php esc_attr_e( 'Follow on Instagram', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'linkedin' ) != '' ) : ?>
					<a class="linkedin" title="<?php esc_attr_e( 'Follow on LinkedIn', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'pinterest' ) != '' ) : ?>
					<a class="pinterest" title="<?php esc_attr_e( 'Follow on Pinterest', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'youtube' ) != '' ) : ?>
					<a class="youtube" title="<?php esc_attr_e( 'Follow on Youtube', 'mudra' ); ?>" href="<?php echo esc_url( get_the_author_meta( 'youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
				<?php endif; ?>
				</div>
			</div>
		</div><!-- .author-box -->

		<?php

		if ( have_posts() ) :

			// Start the Loop
			while ( have_posts() ) :
				the_post();

				// Include the template for the archive content.
				get_template_part( 'template-parts/post/content', 'loop' );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => '&laquo; <span class="screen-reader-text">' . __( 'Previous', 'mudra' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'mudra' ) . '</span> &raquo;',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
