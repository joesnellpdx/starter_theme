<?php
namespace NW_Kids\NWKids_Theme\Theme_Functions;

/**
 * Set up theme and register custom theme functions.
 *
 * @since 0.1.0
 *
 * @uses add_action(), do_action(), add_filter()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_head',  $n( 'gruntscript' )        			                );

	add_filter( 'the_content',           $n( 'fix_shortcodes' )                      );
	add_filter( 'the_content',           $n( 'attachment_image_link_remove_filter' )  );
	add_filter( 'embed_oembed_html',     $n( 'video_embed_wrapper', 99, 4 )          );
	add_filter( 'embed_handler_html',    $n( 'remove_youtube_controls' )             );
	add_filter( 'embed_oembed_html',     $n( 'remove_youtube_controls' )             );
	/**
	 * Disable open graph in jetpack > conflicts with wordpress seo by Yoast
	 */
	add_filter( 'jetpack_enable_opengraph', '__return_false', 99                );
}

/**
 *  Adds grunticon script to head
 *
 * @link http://www.grunticon.com/
 *
 * @since 0.1.0
 * @return string
 */
function gruntscript(){

	$gicon_load_path = 'assets/grunticon/output/grunticon.loader-file.js';

//	if(file_exists( NWK_PATH . $gicon_load_path )){
//		$function_file = NWK_PATH . $gicon_load_path;
//		var_dump($function_file);
//		var_dump(file_get_contents($function_file));
//	}

	if(file_exists( NWK_PATH . $gicon_load_path )){
		$gruntscript = file_get_contents(NWK_PATH . $gicon_load_path);

		if(!empty($gruntscript)) {

			$html = '';
			$html .= '<script>';
			$html .= $gruntscript;
			$html .= 'grunticon(["' . NWK_URL . '/assets/grunticon/output/icons.data.svg.css", "' . NWK_URL . '/assets/grunticon/output/icons.data.png.css", "' . NWK_URL . '/assets/grunticon/output/icons.fallback.css"], grunticon.svgLoadedCallback);';
			$html .= '</script>';
			$html .= '<noscript><link href="' . NWK_URL . '/assets/grunticon/output/icons.fallback.css" rel="stylesheet"></noscript>';


			echo $html;
		}
	}
}

/**
 * Remove <p> and <br> tags around shortcodes in $content
 * 
 * @param $content
 *
 * @return string
 */
function fix_shortcodes($content){
	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']'
	);

	$content = strtr($content, $array);
	return $content;
}

/**
 * Remove <a> tags around images in content
 * 
 * @param $content
 *
 * @return mixed
 */
function attachment_image_link_remove_filter( $content ) {
	if( !is_singular( 'talent-profile' ) ) {
		$content = preg_replace(
			array(
				'{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}',
				'{ wp-image-[0-9]*" /></a>}'
			),
			array( '<img', '" />' ),
			$content
		);

		return $content;
	}
}

/**
 * Add video embed wrapper div
 *
 * @param $html
 * @param $url
 * @param $attr
 * @param $post_id
 *
 * @return string
 */
function video_embed_wrapper($html, $url, $attr, $post_id) {
	return '<div class="jspdx-video">' . $html . '</div>';
}

/**
 * Remove / set youtube controls for youtube embeds
 *
 * @param $code
 *
 * @return mixed
 */
function remove_youtube_controls($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&modestbranding=1&origin=" . get_bloginfo('url') . "&showinfo=0&rel=0", $code);
		return $return;
	}
	return $code;
}