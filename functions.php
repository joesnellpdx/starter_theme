<?php

/**
 * Project Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Project Theme
 * @since 0.1.0
 */

// Useful global constants
define( 'Project_VERSION',      '0.1.0' );
define( 'Project_URL',          get_stylesheet_directory_uri() );
define( 'Project_TEMPLATE_URL', get_template_directory_uri() );
define( 'Project_PATH',         get_template_directory() . '/' );
define( 'Project_INC',          Project_PATH . 'includes/' );

// Include compartmentalized functions
require_once Project_INC . 'functions/core.php';
require_once Project_INC . 'functions/theme_functions.php';
require_once Project_INC . 'functions/template_tags.php';

// Include lib classes

// Run the setup functions
Project\Project_Theme\Core\setup();

// Run the custom theme functions
Project\Project_Theme\Theme_Functions\setup();

// Run template tags for theme
Project\Project_Theme\Template_Tags\template_tags();