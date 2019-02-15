<div class="entry-meta">
<?php
	if ( ! is_single() ) :
		if ( 'disable' !== get_theme_mod( 'archive_entry_date' ) ) :
			printf( '<span class="entry-date">' );
			mudra_entry_date( get_theme_mod( 'archive_entry_date', 'posted_date' ) );
			printf( '</span>' );
		endif;
		if ( true == get_theme_mod( 'archive_entry_author', true ) ) :
			if ( 'disable' !== get_theme_mod( 'archive_entry_date' ) ) :
				printf( ' &vert; ' );
			endif;
			printf( '<span class="entry-author vcard">' );
			_e( 'By: ', 'mudra' );
			printf( '<span itemprop="author" itemscope itemtype="http://schema.org/Person">' );
			mudra_author_posts_link();
			printf( '</span></span>' );
		endif;
		if ( true == get_theme_mod( 'archive_entry_comments', true ) ) :
			if ( true == get_theme_mod( 'archive_entry_author', true ) || 'disable' !== get_theme_mod( 'archive_entry_date' ) ) :
				printf( ' &ndash; ' );
			endif;
			printf( '<span class="entry-comment">' );
			comments_popup_link( __( 'Leave a Comment', 'mudra' ), __( '1 Comment', 'mudra' ), __( '% Comments', 'mudra' ), 'comments-link', __( 'Comments Off', 'mudra' ) );
			printf( '</span>' );
		endif;
		edit_post_link( __( 'Edit', 'mudra' ), ' &vert; <span>', '</span>' );
	else :
		if ( 'disable' !== get_theme_mod( 'single_entry_date' ) ) :
			printf( '<span class="entry-date">' );
			mudra_entry_date( get_theme_mod( 'single_entry_date', 'posted_date' ) );
			printf( '</span>' );
		endif;
		if ( true == get_theme_mod( 'single_entry_author', true ) ) :
			if ( 'disable' !== get_theme_mod( 'single_entry_date' ) ) :
				printf( ' &vert; ' );
			endif;
			printf( '<span class="entry-author vcard">' );
			_e( 'By: ', 'mudra' );
			printf( '<span itemprop="author" itemscope itemtype="http://schema.org/Person">' );
			mudra_author_posts_link();
			printf( '</span></span>' );
		endif;
		if ( true == get_theme_mod( 'single_entry_comments', true ) ) :
			if ( true == get_theme_mod( 'single_entry_author', true ) || 'disable' !== get_theme_mod( 'single_entry_date' ) ) :
				printf( ' &ndash; ' );
			endif;
			printf( '<span class="entry-comment">' );
			comments_popup_link( __( 'Leave a Comment', 'mudra' ), __( '1 Comment', 'mudra' ), __( '% Comments', 'mudra' ), 'comments-link', __( 'Comments Off', 'mudra' ) );
			printf( '</span>' );
		endif;
		edit_post_link( __( 'Edit', 'mudra' ), ' &vert; <span>', '</span>' );
	endif;
?>
</div><!-- .entry-meta -->
