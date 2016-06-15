<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Project Theme
 * @since 0.1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content' ); ?></a>
	<?php // @todo add advertising header here ?>
	<header class="primary-header container cf" role="banner">
		<div class="container__content">
			<?php
			if (  is_home() ) : ?>
				<h1 class="primary-heading">
					<a class="primary-heading__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="is-vishidden"><?php bloginfo( 'name' ); ?></span>
						<figure class="primary-heading__logo fixedratio projectids-icon-logo" title="<?php bloginfo( 'name' ); ?>"></figure>
					</a>
				</h1>
			<?php else : ?>
				<span class="primary-heading">
					<a class="primary-heading__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="is-vishidden"><?php bloginfo( 'name' ); ?></span>
						<figure class="primary-heading__logo fixedratio projectids-icon-logo" title="<?php bloginfo( 'name' ); ?>"></figure>
					</a>
				</span>

			<?php endif; ?>

			<button class="js-mobile-expandable-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'navigation', 'menu_class' => 'navigation--primary js-mobile-expandable', 'container' => ''  ) ); ?>
		</div>
	</header>