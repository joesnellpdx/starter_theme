<?php
namespace Project\Project_Theme\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action(), remove_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  $n( 'i18n' )        			);
	add_action( 'wp_enqueue_scripts', $n( 'scripts' )     			);
	add_action( 'wp_enqueue_scripts', $n( 'styles' )      			);
	add_action( 'wp_head',            $n( 'header_meta' ) 			);
	add_action( 'after_setup_theme',  $n( 'rss_feed_links' )		);
	add_action( 'after_setup_theme',  $n( 'title_tag_support' )		);
	add_action( 'after_setup_theme',  $n( 'post_thumbnail_support' ));
	add_action( 'after_setup_theme',  $n( 'image_sizes' )           );
	add_action( 'after_setup_theme',  $n( 'nav_menu_register' )		);
	add_action( 'after_setup_theme',  $n( 'html5_elements' )		);
	add_action( 'wp_head',            $n( 'add_custom_fonts' )      );

	remove_action( 'wp_head',               'print_emoji_detection_script', 7   );
	remove_action( 'admin_print_scripts',   'print_emoji_detection_script'      );
	remove_action( 'wp_print_styles',       'print_emoji_styles'                );
	remove_action( 'admin_print_styles',    'print_emoji_styles'                );
	remove_action('wp_head',                'rsd_link'                          );
	remove_action('wp_head',                'wp_generator'                      );
	remove_action('wp_head',                'feed_links', 2                     );
	remove_action('wp_head',                'index_rel_link'                    );
	remove_action('wp_head',                'wlwmanifest_link'                  );
	remove_action('wp_head',                'feed_links_extra', 3               );
	remove_action('wp_head',                'start_post_rel_link', 10, 0        );
	remove_action('wp_head',                'parent_post_rel_link', 10, 0       );
	remove_action('wp_head',                'adjacent_posts_rel_link', 10, 0    );
}

/**
 * Makes WP Theme available for translation.
 *
 * Translations can be added to the /lang directory.
 * If you're building a theme based on WP Theme, use a find and replace
 * to change 'wptheme' to the name of your theme in all template files.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'project', Project_PATH . '/languages' );
 }

/**
 * Enqueue scripts for front-end.
 *
 * @uses wp_enqueue_script() to load front end scripts.
 *
 * @since 0.1.0
 *
 * @return void
 */
function scripts() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool project_script_debug
	 */
	$debug = apply_filters( 'project_script_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'modernizr-custom',
		Project_TEMPLATE_URL . '/assets/js/vendor/modernizr-custom.min.js',
		false, '2.7.2'
	);
	wp_enqueue_script(
		'project',
		Project_TEMPLATE_URL . "/assets/js/project-theme{$min}.js",
		array(),
		Project_VERSION,
		true
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @return void
 */
function styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool project_style_debug
	 */
	$debug = apply_filters( 'project_style_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'project',
		Project_URL . "/assets/css/project-theme{$min}.css",
		array(),
		Project_VERSION
	);
}

/**
 * Add humans.txt to the <head> element.
 *
 * @uses apply_filters()
 *
 * @since 0.1.0
 *
 * @return void
 */
function header_meta() {
	/**
	 * Filter the path used for the site's humans.txt attribution file
	 *
	 * @param string $humanstxt
	 */
	$humanstxt = apply_filters( 'project_humans', Project_TEMPLATE_URL . '/humans.txt' );

	echo '<link type="text/plain" rel="author" href="' . esc_url( $humanstxt ) . '" />';
}

/**
 * Add default posts and comments RSS feed links to head.
 *
 * @uses add_theme_support()
 *
 * @since 0.1.0
 *
 * @return void
 */
function rss_feed_links() {
	add_theme_support( 'automatic-feed-links' );
}

/**
 * Let WordPress manage the document title.
 *
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 *
 * @uses add_theme_support()
 *
 * @since 0.1.0
 *
 * @return void
 */
function title_tag_support() {
	add_theme_support( 'title-tag' );
}

/**
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
function post_thumbnail_support() {
	add_theme_support( 'post-thumbnails' );
}

/**
 * Add custom image sizes
 */
function image_sizes() {
	add_image_size( 'rwd-small', 400, 200 );
	add_image_size( 'rwd-medium', 800, 400 );
	add_image_size( 'rwd-large', 1200, 600 );
	add_image_size( 'rwd-mediumx2', 1600, 800 );
	add_image_size( 'rwd-xl', 2000, 1000 );
	add_image_size( 'rwd-largex2', 2400, 1200 );
	add_image_size( 'rwd-xlx2', 4000, 2000 );
}

/**
 * This theme uses wp_nav_menu() in one location.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
function nav_menu_register() {
	register_nav_menus(array(
		'primary-nav' => esc_html__('Primary Nav'),
	));
}

/**
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 *
 */
function html5_elements() {
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
}

/**
 * Add custom fonts via Typekit
 * Get codescrap from Typekit and replace below
 */
function add_custom_fonts(){
	echo "<script>
					  (function(d) {
					    var config = {
					      kitId: 'xfz2xyu',
					      scriptTimeout: 3000,
					      async: true
					    },
					    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,\"\")+\" wf-inactive\";},config.scriptTimeout),tk=d.createElement(\"script\"),f=false,s=d.getElementsByTagName(\"script\")[0],a;h.className+=\" wf-loading\";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!=\"complete\"&&a!=\"loaded\")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
					  })(document);
					</script>";
	//	echo '<link rel="stylesheet" href="">';
}