<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Project Theme
 * @since 0.1.0
 */

?>

<section class="no-results not-found container cf">
	<div class="container__content">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', '_s' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '_s' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_s' ); ?></p>
				<?php
				get_search_form();

			else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '_s' ); ?></p>
				<?php
				get_search_form();

			endif; ?>
		</div><!-- .page-content -->
	</div> <!_ .container__content -->
</section><!-- .no-results -->
