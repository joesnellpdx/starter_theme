<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Project Theme
 * @since 0.1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container cf'); ?>>
	<header class="entry-header">
		<div class="container__content">
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php Project\Project_Theme\Template_Tags\posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container__content">
			<?php
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container__content">
			<?php Project\Project_Theme\Template_Tags\entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
