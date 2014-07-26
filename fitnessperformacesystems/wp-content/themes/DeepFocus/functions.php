<?php 
add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "DeepFocus";
		$shortname = "deepfocus";
	
		require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

		load_theme_textdomain('DeepFocus',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_deepfocus.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_deepfocus.php');
		
		include(TEMPLATEPATH . '/includes/widgets.php');
		
		add_filter( 'et_print_thumbnail_dimensions', 'et_single_post_thumbnail_dimensions' );
		function et_single_post_thumbnail_dimensions( $dimensions ){
			if ( false !== strpos( $dimensions, '9999px' ) ) $dimensions = '';
			return $dimensions;
		}
	}
}

add_action('wp_head','et_portfoliopt_additional_styles',100);
function et_portfoliopt_additional_styles(){ ?>
	<style type="text/css">
		div.pp_default .pp_content_container .pp_details { color: #666; }
	</style>
<?php }

function et_insert_thumbnail_rss($content) {
	global $post;

	$thumb = ''; $thumb = get_post_meta($post->ID, 'Thumbnail',true);

	if ( has_post_thumbnail( $post->ID ) ){
		$content = '<p>' . get_the_post_thumbnail( $post->ID, 'medium' ) . '</p>' . $content;
	} else if ($thumb <> '') {
		$content = '<p>' . '<img src="'. et_new_thumb_resize( et_multisite_thumbnail($thumb), 300, 200, '', true ) .'"/>' . '</p>' . $content;
	}

	return $content;
}
add_filter('the_excerpt_rss', 'et_insert_thumbnail_rss');
add_filter('the_content_feed', 'et_insert_thumbnail_rss');

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php } 
}

add_action( 'wp_enqueue_scripts', 'et_responsive_layout' );
function et_responsive_layout(){
	if ( 'on' != get_option('deepfocus_responsive_layout') ) return;
	$template_dir = get_template_directory_uri();
	
	wp_enqueue_style('et_responsive', $template_dir . '/css/responsive.css');
	
	wp_enqueue_script('fitvids', $template_dir . '/js/jquery.fitvids.js', array('jquery'), '1.0', true);
	wp_enqueue_script('flexslider', $template_dir . '/js/jquery.flexslider-min.js', array('jquery'), '1.0', true);	
	wp_enqueue_script('et_flexslider_script', $template_dir . '/js/et_flexslider.js', array('jquery'), '1.0', true);
}

add_action( 'wp_head', 'et_add_viewport_meta' );
function et_add_viewport_meta(){
	if ( 'on' != get_option('deepfocus_responsive_layout') ) return;
	echo '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />';
}


add_action( 'et_header_menu', 'et_add_mobile_navigation' );
function et_add_mobile_navigation(){
	if ( 'on' != get_option('deepfocus_responsive_layout') ) return;
	echo '<a href="#" id="mobile_nav" class="closed">' . esc_html__( 'Navigation Menu', 'DeepFocus' ) . '<span></span></a>';
} ?>