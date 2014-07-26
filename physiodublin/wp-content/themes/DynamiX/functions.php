<?php if (!is_admin()) if(!session_id()) session_start();
/***************************************************************/
/*	Initialise DynamiX and JQUERY Scripts					   */
/***************************************************************/

function init_dynscripts() {
    if (!is_admin()) {

		if ( function_exists('bp_is_blog_page')) {
			if (!bp_is_blog_page()) {
				wp_enqueue_script( 'bp-js', BP_PLUGIN_URL . '/bp-themes/bp-default/_inc/global.js', array( 'jquery' ) );
			}
		}

		wp_register_style('dynamix-style', get_bloginfo('stylesheet_url'));
        wp_enqueue_style('dynamix-style');
		
		wp_register_style('dynamix-varstyle', get_bloginfo('template_directory') .'/style.php');
        wp_enqueue_style('dynamix-varstyle');		
		
		wp_dequeue_style('em-ui-css'); // stop Event Manager jQuery UI CSS interfering. 
		
		wp_deregister_script('jquery-ui-core');
		wp_deregister_script('jquery-ui-tabs');
		wp_deregister_script('jquery-ui-sortable');
		wp_deregister_script('jquery-ui-draggable');
		wp_deregister_script('jquery-ui-droppable');
		wp_deregister_script('jquery-ui-selectable');
		wp_deregister_script('jquery-ui-resizable');
		wp_deregister_script('jquery-ui-dialog');
		wp_deregister_script('jquery-ui');
        wp_deregister_script('jquery-ui-core');
		
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
        wp_enqueue_script( 'jquery' );


        wp_register_script( 'jquery-ui-core', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js');
        wp_enqueue_script( 'jquery-ui-core' );			

		wp_deregister_script( 'dynamix' );	
	    wp_register_script( 'dynamix', get_bloginfo('template_directory').'/lib/js/dynamix.min.js');
        wp_enqueue_script( 'dynamix' );
		
		if(get_option('jwplayer_js')) { // Check jw player javascript file is present
		
		$CWZ_jwplayer_js = get_option('jwplayer_js');
		
		wp_deregister_script( 'jw-player' );	
	    wp_register_script( 'jw-player', $CWZ_jwplayer_js );
        wp_enqueue_script( 'jw-player' );		
		}
	
    }
}    
add_action('init', 'init_dynscripts',100);


/***************************************************************/
/*	Initialise DynamiX and JQUERY Scripts *END*			   */
/***************************************************************/

/***************************************************************/
/*	Define File Directories			  						   */
/***************************************************************/

define( 'CWZ_DIR', get_template_directory());
define( 'CWZ_FILES', CWZ_DIR . '/lib' );

require CWZ_FILES .'/adm/inc/note-admin.php';require CWZ_FILES .'/inc/constants.php';
require CWZ_FILES .'/inc/sub-functions.php';
require CWZ_DIR .'/custom-functions.php';

if ( is_admin() ) require_once CWZ_FILES . '/adm/index.php';

require CWZ_FILES .'/adm/inc/the-excerpt-reloaded.php';
require CWZ_FILES .'/adm/inc/custom-widgets.php';


/***************************************************************/
/*	Define File Directories *END*	  						   */
/***************************************************************/



/***************************************************************/
/*	Archive Excerpt					  						   */
/***************************************************************/

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . __( 'Read More', 'DynamiX' )  . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/***************************************************************/
/*	Archive Excerpt	*END*			  						   */
/***************************************************************/

/***************************************************************/
/*	Menu Pages 						  						   */
/***************************************************************/

function DYN_menupages() {

add_filter('wp_list_pages', 'DYN_page_lists');
$menupageslist = wp_list_pages('echo=0&title_li=&');

remove_filter('wp_list_pages', 'DYN_page_lists'); // Remove filter to not affect all calls to wp_list_pages
return $menupageslist;

}

/***************************************************************/
/*	Menu Pages *END*				  						   */
/***************************************************************/

/***************************************************************/
/*	Menu Descriptions				  						   */
/***************************************************************/

function DYN_page_lists($output) {	
	global $wpdb;

	$get_MenuDesc = mysql_query("SELECT p.ID, p.post_title, p.guid, p.post_parent, pm.meta_value FROM " . $wpdb->posts . " AS p LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " AS ipm WHERE meta_key = 'pgopts') AS pm ON p.ID = pm.post_id WHERE p.post_type = 'page' AND p.post_status = 'publish' ORDER BY p.menu_order ASC");
	while ($row = mysql_fetch_assoc($get_MenuDesc)) {
			extract($row);
			$post_title = wptexturize($post_title);
			$data = maybe_unserialize(get_post_meta( $ID, 'pgopts', true ));		

			$menudesc=$data["menudesc"];		
			
			if($menudesc!="") {
			$output = str_replace('>' . $post_title .'</a>' , '>' . $post_title . '</a><span class="menudesc">' . $data["menudesc"] . '</span>', $output);
			}
			
		}	

			$parts = preg_split('/(<ul|<li|<\/ul>)/',$output,null,PREG_SPLIT_DELIM_CAPTURE);
			$insert = '<li class="menubreak"></li>';
			$newmenu = '';
			$level = 0;
			foreach ($parts as $part) {
			if ('<ul' == $part) {++$level; }
			if ('</ul>' == $part) {--$level;}
			if ('<li' == $part && $level == 0) {$newmenu .= $insert;}
			if ('</ul>' == $part && $level == 1) {$newmenu .= $insert_a;}
			$newmenu .= $part;
			}

	return $newmenu;
}


/***************************************************************/
/*	Menu Descriptions *END*			  						   */
/***************************************************************/


/***************************************************************/
/*	Create Sidebars					  						   */
/***************************************************************/

global $wpdb,$num_sidebars;


$get_sidebar_num = get_option('sidebars_num');

if($get_sidebar_num) {
$num_sidebars=get_option('sidebars_num');  //  Sidebars number of Sidebars defined in Admin settings.
}

else {
$num_sidebars="2";
}

	$i=1;
    while($i<=$num_sidebars)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'sidebar'.$i,
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}


if(get_option('ftdrpwidget_enable')=="enable") { // Check to see if Droppanel / Footer widgets are enabled

$get_droppanel_num 	=	(get_option('droppanel_columns_num')!="") 	? get_option('droppanel_columns_num') 	: '4'; // If not set, default to 4 columns
$get_footer_num 	= 	(get_option('footer_columns_num')!="") 		? get_option('footer_columns_num') 		: '4'; // If not set, default to 4 columns
	
	$i=1;
    while($i<=$get_droppanel_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'Drop Panel Column '.$i,
				'description' => 'Widgets in this area will be shown in Drop Panel column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}

	$i=1;
    while($i<=$get_footer_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'Footer Column '.$i,
				'description' => 'Widgets in this area will be shown in Footer column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}	


}	


/***************************************************************/
/*	Create Sidebars	*END*			  						   */
/***************************************************************/



/***************************************************************/
/*	Browser Detection				  						   */
/***************************************************************/

require CWZ_FILES .'/inc/browser-detect.php';

/***************************************************************/
/*	Browser Detection *END*			  						   */
/***************************************************************/


/***************************************************************/
/*	Generate Custom Fields			  						   */
/***************************************************************/

require CWZ_FILES .'/adm/inc/meta-fields.php';

/***************************************************************/
/*	Generate Custom Fields	*END*	  						   */
/***************************************************************/


/***************************************************************/
/*	Short Codes						  						   */
/***************************************************************/

require CWZ_FILES .'/inc/shortcodes.php';

/***************************************************************/
/*	Short Codes	*END*				  						   */
/***************************************************************/

/***************************************************************/
/*	Breadcrumbs					  						   */
/***************************************************************/

require CWZ_FILES .'/inc/breadcrumbs.php';

/***************************************************************/
/*	Breadcrumbs	*END*				  						   */
/***************************************************************/



/***************************************************************/
/*	Pagination						  						   */
/***************************************************************/

function pagination( $query, $baseURL ) {
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="paging">';
		// Previous link?
		if ( $page > 1 ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">&laquo; previous</a></li>';
			} else {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'&amp;paged='.($page-1).'">&laquo; previous</a></li>';
			}			
			
		}
		// Loop through pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<li class="pagebutton active">'.$i.'</li>';
			} else {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton"><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
			} else {
				echo '<li class="pagebutton"><a href="'.$baseURL.'&amp;paged='.$i.'">'.$i.'</a></li>';
			}
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">next &raquo;</a></li>';
			} else {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'&amp;paged='.($page+1).'">next &raquo;</a></li>';
			}				
		}
		echo '</ul>';
	}

}




/***************************************************************/
/*	Pagination *END*				  						   */
/***************************************************************/


/***************************************************************/
/*	Add default postorder number	  						   */
/***************************************************************/

if (have_posts()) : while (have_posts()) : the_post();
    
	if(! maybe_unserialize(get_post_meta( $post->ID, 'Order', true ))) {
	update_post_meta( $post->ID, 'Order', '0' );
	}

endwhile; endif;

/***************************************************************/
/*	Add default postorder number *END* 						   */
/***************************************************************/

/***************************************************************/
/*	Post Comments					 						   */
/***************************************************************/


function dynamix_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
	<div class="commenttext">
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

		<?php comment_text() ?>
	</div>
    <div class="commentbreak">&nbsp;</div>
	<div class="clear"></div>
<div class="authorwrap clearfix">
	<ul>
        <li class="comment-author vcard">
             <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
        </li>
        <li>
        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        </li>
        <li class="comment-meta commentmetadata"><small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small></li>
        <li class="reply">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </li>
    </ul>
	</div>
	</div>
<?php
        }

/***************************************************************/
/*	Post Comments *END*				 						   */
/***************************************************************/


/***************************************************************/
/*	WP 3.0 Custom Menu Shortcode	 						   */
/***************************************************************/

// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");

/***************************************************************/
/*	WP 3.0 Custom Menu Shortcode *END* 						   */
/***************************************************************/


/***************************************************************/
/*	WP 3.0 Custom Menu for Main Navigation					   */
/***************************************************************/

add_theme_support( 'nav-menus' );
	register_nav_menus( array(
		'mainnav' => __( 'Main Navigation', 'DynamiX' ),
	) );




class dyn_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		if($depth=="0") {
		$output .= $indent . '<li class="menubreak"></li><li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		} else {
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';		
		}
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		if($item->attr_title) {
		$item_output .= '<span class="menudesc">' . $item->attr_title  . '</span>';
		}
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/***************************************************************/
/*	WP 3.0 Custom Menu for Main Navigation	*END*			   */
/***************************************************************/

/***************************************************************/
/*	Get Image Path for Timthumb								   */
/***************************************************************/
function dyn_getimagepath($img_src) {
    global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $img_src);
		if (isset($imageParts[1])) {
			$img_src = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $img_src;
}
/***************************************************************/
/*	Get Image Path for Timthumb	*END*						   */
/***************************************************************/

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_options' );
add_action('admin_head', 'add_admin_theme');

function add_admin_theme() { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/adm/css/admin.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/adm/css/colorpicker.css" type="text/css" /> 
<?php }


/***************************************************************/
/*	BuddyPress												   */
/***************************************************************/


function bp_dtheme_enqueue_styles() {
    // Bump this when changes are made to bust cache
    $version = '20110804';
 
    // Default CSS
    wp_enqueue_style( 'bp-default-main', get_template_directory_uri() . '/stylesheets/style-buddypress.css', array(), $version );
 
    // Right to left CSS
    if ( is_rtl() )
        wp_enqueue_style( 'bp-default-main-rtl',  get_template_directory_uri() . '/_inc/css/default-rtl.css', array( 'bp-default-main' ), $version );
}


if ( function_exists('bp_is_blog_page') && !is_admin()) {
	add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles' );
}

/* Constant paths. */
/* We define MY_THEME and MY_THEME_URL here for use in and calling functions-buddypress.php */
	define( 'MY_THEME', get_stylesheet_directory() );
	define( 'MY_THEME_URL', get_stylesheet_directory_uri() );


/* Load the BuddyPress functions for the theme */
	require_once( MY_THEME . '/functions-buddypress.php' );


/***************************************************************/
/*	BuddyPress *END*										   */
/***************************************************************/

/* temporary removal wp 3.1 admin bar */ remove_action( 'init', 'wp_admin_bar_init' );


/***************************************************************/
/*	Gallery SlideSet Upgrade								   */
/***************************************************************/
if(get_option('slideset_data_update')!='yes' && get_option('slideset_data')!='') {
		update_option('slideset_data_update','yes');
		$get_slideset_num = maybe_unserialize(get_option('slideset_number'));
		$get_gallery_data = maybe_unserialize(get_option('slideset_data')); 
		  
		  for($i = 0; $i < $get_slideset_num; $i++) {
		  		 foreach ($get_gallery_data as $key => $value) {
    				if($key=="slideset_id".$i."_id") {
    					$options_gallery_ids .= $value.",";	
						$slide_set_id = $value;
    				}
					if ( preg_match("/slideset_id".$i."/", $key) ) {
        				$find = "/slideset_id".$i."/";
						$replace = "slideset_id"; 
         				$key = preg_replace ($find, $replace, $key); 						
						$options_gallery_slidesets[$key] = $value;					
					
					}		 
				 }
                
        			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
        			$options_gallery_slidesets="";
		  		}
				
				update_option( 'slideset_data_ids', $options_gallery_ids );
}
/***************************************************************/
/*	Gallery SlideSet Upgrade *END*							   */
/***************************************************************/

/***************************************************************/
/*	Make DynamiX available for translation					   */
/***************************************************************/

	// Load languages directory for translation
	load_theme_textdomain( 'DynamiX', CWZ_DIR . '/languages' );

	$locale = get_locale();
	$locale_file = CWZ_DIR . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

/***************************************************************/
/*	Make DynamiX available for translation	*END*			   */
/***************************************************************/
		
/***************************************************************/
/*	Fix for WP Minify and Google jQuery CDN					   */
/***************************************************************/	
function add_minify_location(){
	if (class_exists('WPMinify')) {?>

<!-- WP-Minify JS -->
<!-- WP-Minify CSS -->

<?php }
}
add_action('wp_head','add_minify_location',99);
/***************************************************************/
/*	Fix for WP Minify and Google jQuery CDN *END*			   */
/***************************************************************/	

?>