<?php
/**
 * Template part for displaying page content in page.php.
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
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container__content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container__content">
			<?php
			edit_post_link(
				sprintf(
				/* translators: %s: Name of current post */
					esc_html__( 'Edit %s' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
