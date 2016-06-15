<?php

/**
 * NW Kids Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package NW Kids Theme
 * @since 0.1.0
 */

// Useful global constants
define( 'NWK_VERSION',      '0.1.0' );
define( 'NWK_URL',          get_stylesheet_directory_uri() );
define( 'NWK_TEMPLATE_URL', get_template_directory_uri() );
define( 'NWK_PATH',         get_template_directory() . '/' );
define( 'NWK_INC',          NWK_PATH . 'includes/' );

// Include compartmentalized functions
require_once NWK_INC . 'functions/core.php';
require_once NWK_INC . 'functions/theme_functions.php';
require_once NWK_INC . 'functions/template_tags.php';

// Include lib classes

// Run the setup functions
NW_Kids\NWKids_Theme\Core\setup();

// Run the custom theme functions
NW_Kids\NWKids_Theme\Theme_Functions\setup();

// Run template tags for theme
NW_Kids\NWKids_Theme\Template_Tags\template_tags();