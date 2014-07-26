<?php

if ( ! isset( $content_width ) ) $content_width = 980;

function phi_enqueue_theme_js () {
wp_enqueue_script('jquery', TEMPLATEPATH . '/lib/scripts/jquery.js');

if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }

} 

/**********************************
 CUSTOM POST TYPES
**********************************/
require_once(TEMPLATEPATH.'/lib/functions/registerPosttypes.php');

// Load theme content install script
require_once(TEMPLATEPATH.'/lib/functions/setup.php');

// Load theme options panel

/******************************************
** UNCOMMENT THIS IF YOU ONLY WANT ADMIN **
** TO BE ABLE TO SEE THEME OPTIONS PANEL **
*******************************************/

// global $current_user;
// get_currentuserinfo(); 

// if ($current_user->user_level == 0 ) { 
     include(TEMPLATEPATH . '/lib/admin/index.php');
//}

	/**********************************
			Make theme available for translation
			Translations can be filed in the /languages/ directory
			**********************************/
			load_theme_textdomain( 'itworx', TEMPLATEPATH . '/languages' );
		
			$locale = get_locale();
			$locale_file = TEMPLATEPATH . "/languages/$locale.php";
			if ( is_readable( $locale_file ) )
				require_once( $locale_file );

			
add_action( 'after_setup_theme', 'phi_setup' );

if ( ! function_exists( 'phi_setup' ) ){};

function phi_setup() {
		

			
		
			/**********************************
			 Create thumbnails
			**********************************/
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 300, get_option('phi_blog_image_height'), true ); // Normal post thumbnails
			
			/**************************************
			** DEFINE IMAGE WIDTHS FOR RESIZING **
			***************************************/
			
			define('PHI_IMGW_SLIDER', '900');
			define('PHI_IMGW_HALF', '410');
			define('PHI_IMGW_THIRD', '260');
			define('PHI_IMGW_FOURTH', '185');
			define('PHI_IMGW_FIFTH', '136');
			define('PHI_IMGW_NEWSSLIDER', '570');
			define('PHI_IMGW_BLOG', '570');
			define('PHI_IMGW_POST', '570');
			define('PHI_IMGW_POST_LARGE', '880');	
			define('PHI_IMGW_SMALL', '130');	
			define('PHI_IMGW_MICRO', '48');
			define('PHI_IMGW_FEATURED', '185');
	
			if ( function_exists( 'add_image_size' ) ){
			add_image_size( 'micro', PHI_IMGW_MICRO, PHI_IMGW_MICRO, true ); // Micro thumbnail size
			add_image_size( 'small', PHI_IMGW_SMALL, PHI_IMGW_SMALL, true ); // Small thumbnail size
			add_image_size( 'half', PHI_IMGW_HALF, get_option('phi_half_image_height'), true ); // Thumbnail for 2 column layout 
			add_image_size( 'third', PHI_IMGW_THIRD, get_option('phi_third_image_height'), true ); // Thumbnail for 3 column layout 
			add_image_size( 'fourth', PHI_IMGW_FOURTH, get_option('phi_fourth_image_height'), true ); // Thumbnail for 4 column layout 
			add_image_size( 'fifth', PHI_IMGW_FIFTH, get_option('phi_fifth_image_height'), true ); // Thumbnail for 5 column layout 
			add_image_size( 'featured', PHI_IMGW_FEATURED, get_option('phi_home_thumbnail'), true ); // Featured thumbnail size
			add_image_size( 'blog', PHI_IMGW_BLOG, get_option('phi_post_image_height'), true ); // Blog thumbnail size
			add_image_size( 'slider', PHI_IMGW_SLIDER, get_option('phi_slider_image_height'), true ); // Slideshow thumbnail size
			add_image_size( 'post',PHI_IMGW_POST, get_option('phi_post_image_height'), true ); // Post/page thumbnail size
			add_image_size( 'large', PHI_IMGW_POST_LARGE, get_option('phi_post_large_image_height'), true ); // Fullsize thumbnail size
			}
			
			
	
			// Include vars
			include(TEMPLATEPATH.'/lib/includes/vars.php');
			// Register widgets
			include(TEMPLATEPATH . '/lib/functions/registerWidgets.php');
			
			// Load TinyMCE Plugins
			require_once(TEMPLATEPATH . '/lib/admin/tinymceColumns/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymceSlideshow/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymcePortfolio/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymceGallery/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymceVideo/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymceModules/tinymce.php');
			require_once(TEMPLATEPATH . '/lib/admin/tinymceContactform/tinymce.php');
						
			// Load meta panels
			require_once(TEMPLATEPATH . '/lib/includes/video_meta.php');
			require_once(TEMPLATEPATH . '/lib/includes/page_meta.php');
			require_once(TEMPLATEPATH . '/lib/includes/image_meta.php');
			require_once(TEMPLATEPATH . '/lib/includes/event_meta.php');
			require_once(TEMPLATEPATH . '/lib/includes/sidebar_meta.php');
			require_once(TEMPLATEPATH . '/lib/includes/slideshow_meta.php');
			// Load widgets/plugins
			require_once(TEMPLATEPATH . '/lib/widgets/phi-pageteaser.php');
			require_once(TEMPLATEPATH . '/lib/widgets/phi-latestposts.php');
			require_once(TEMPLATEPATH . '/lib/widgets/phi-subpagelist.php');
			require_once(TEMPLATEPATH . '/lib/widgets/phi-testimonial.php');
			require_once(TEMPLATEPATH . '/lib/widgets/phi_tags.php');
			// Load shortcodes
			require_once(TEMPLATEPATH . '/lib/functions/shortcodes.php');
			
			/**********************************
			 THEME FUNCTIONS
			**********************************/
			require_once(TEMPLATEPATH . '/lib/functions/theme-functions.php');
			
						
			/**********************************
			 WP-NAV MENU
			**********************************/
			// Add theme support
			
			add_theme_support( 'nav-menus' );
						
			add_action( 'init', 'phi_register_menus' );

						
			// This theme uses wp_nav_menu() in four locations.
			function phi_register_menus(){
			register_nav_menus(
				array(
				  'primary'   => 'Primary Navigation',
				  'secondary' => 'Secondary Navigation',
				  'tertiary'  => 'Tertiary Navigation',
				  'footer' 	  => 'Footer Navigation',
					)
				);
			}	
			
			
			add_theme_support( 'automatic-feed-links' );
			
			
} // End phi_setup()
//***************************************************************



add_option('phi_theme_options_data', false);

if ( get_option('phi_theme_options_data')== false ){
	siteSettings();
	update_option( 'phi_theme_options_data', true,'','yes' );
}





/******************************************
-------------------------------------------
  THEME FUNCTIONS 
-------------------------------------------
*******************************************/

/**********************************
 CYCLE SLIDESHOW
**********************************/
function phi_cycle_slider($termId,$size){
	
	global $post;
	
	if($size == 'fullwidth'){
	$imagesize ='slider';
	}
	elseif($size == 'normal'){$imagesize='post';}
	else{$imagesize ='slider';}	
	
	$termName = get_term_by( 'id', $termId,'slidecategory' );
	$term = $termName->slug;
	
	$result;
	$result.= '<div id="slider" class="cycle_'.$size.'">';
	
	// Slideshow
	$result.= '<div id="cycle" class="cycle_'.$size.'">';

	$args = array(
	'post_type' => 'slide',
	'taxonomy' => 'slidecategory',
	'term' => $term,
	'order'=>'DESC',
	'showposts'=> -1,
	);

	query_posts($args);
	
	if (have_posts()): while (have_posts()) : the_post(); 		

	$slideurl = get_post_meta($post->ID,'phi_customurl',true);
	$slideurlname = get_post_meta($post->ID,'phi_customurlname',true);
	
	$boxcolor = get_post_meta($post->ID,'phi_textbox_color',true);
	$boxposition = get_post_meta($post->ID,'phi_textbox_position',true);
	
	$result.= '<div class="slide_'.$size.' cycle_'.$size.'">';
	$result.= phi_post_image($imagesize,'return',$slideurl);
	$result.= '<div class="slide-info '.$boxcolor.' '.$boxposition.'"><div class="inner">';
	$result.= '<h1>'.get_the_title().'</h1>';
	$result.= '<h3>'.get_the_excerpt().'</h3>';
	$result.= '</div>';
	$result.= '<a href="'.$slideurl.'">'.$slideurlname.'</a>';
	$result.= '</div>';
	$result.= '</div>';
	
	endwhile; endif;
	wp_reset_query();
	
	$result.= '</div>';
	// Slide nav
	
	$result.= '</div>';
	
	return $result;
	}
	
	
/**********************************
 ACCORDION SLIDESHOW
**********************************/	
function phi_accordion_slider($termId){

$termName = get_term_by( 'id', $termId,'slidecategory' );
$term = $termName->slug;
	
global $post;
	$args = array(
	'post_type' => 'slide',
	'taxonomy' => 'slidecategory',
	'term' => $term,
	'order'=>'DESC',
	'showposts'=> -1,
	
	);

query_posts($args);
$slidecounter=0;
if (have_posts()): while (have_posts()) : the_post();
$slidecounter++;
endwhile; endif;
wp_reset_query();


if($slidecounter > 0){
$accWidth = 900/$slidecounter;
}

	$args = array(
	'post_type' => 'slide',
	'taxonomy' => 'slidecategory',
	'term' => $term,
	'order'=>'DESC',
	'showposts'=> -1,
	
	);
	
if(is_home()){$kwicksClass = 'home';}
else{$kwicksClass = 'page';}
	

query_posts($args);
$counter=0;
$result;
$result.= '<div id="kwicks" class="'.$kwicksClass.'"><ul class="kwicks horizontal" id="accordion">';
			
if (have_posts()): while (have_posts()) : the_post(); 

// Get some post meta...
$slideurl = get_post_meta($post->ID,'phi_customurl',true);
$infobox = get_post_meta($post->ID,'phi_infobox',true); // phi_yes or phi_no
$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);


$result.= '<li class="accslide" id="slide'.$counter.'" style="width:'.$accWidth.'px;"><div>';
$result.= '<div class="kwickshadow" style="height:100%;" ></div>';
$result.= phi_post_image('slider','return',$slideurl);
$result.= '<p class="slide-minicaption"><span class="slide-minicaptiontitle">';
$result.= get_the_title();
$result.= '</span></p>';
$result.= '<div class="slidecaption">';

if($slideurl){
	$result.= '<h2><a href="'.$slideurl.'">'.get_the_title().'</a></h2>';
}
else{
	$result.= '<h2>'.get_the_title().'</h2>';
}
if (get_option('phi_hide_accordion_excerpt') != true){
	if($slideurl){
		$result.= '<p><a href="'.$slideurl.'">'.get_the_excerpt().'</a></p>';
	}
	else{
		$result.= get_the_excerpt();
	}
}
$result.= '</div></div></li>';
$counter++;
endwhile; endif;
$result.= '</ul></div>';
wp_reset_query();
return $result;

}

	
/**********************************
 NIVO SLIDESHOW !! NOT IN USE
**********************************/
function phi_nivo_slider($termId,$size){

$termName = get_term_by( 'id', $termId,'slidecategory' );
$term = $termName->slug;

if($size == 'fullwidth'){
	$imagesize ='slider';
	}
elseif($size == 'normal'){$imagesize='post';}
else{$imagesize ='slider';}	

	$result;
	$result .= '<div id="nivoslider">';
	$result .= '<div id="nivo" class="nivoSlider nivoSlider-'.$imagesize.'">';
	global $post;
	$args = array(
	'post_type' => 'slide',
	'taxonomy' => 'slidecategory',
	'term' => $term,
	'order'=>'DESC',
	'showposts'=> -1,
	
	);
	
	query_posts($args);
	if (have_posts()): while (have_posts()) : the_post(); 		
	$slideurl = get_post_meta($post->ID,'phi_customurl',true);
	$result .= '<div class="slide">';
	$result .= phi_post_image($imagesize,'return',$slideurl);
	$result .= '</div>';
	endwhile; endif;
	$result .= '</div>';
	$result .= '</div>';
	
	return $result;
	}

/**********************************
 IMAGE INSERTION FUNCTION
**********************************/
function phi_post_image($size,$format,$link){
global $post;
$imagesize = $size;
$format = $format;
$link = $link;


$video = get_post_meta($post->ID,'phi_lightbox_image',true);
$featuredimage  = wp_get_attachment_image_src(get_post_thumbnail_id(), '');

$customimage = get_post_meta($post->ID,'phi_custom_image',true);

if($customimage){$image = $customimage;}
else{$image = $featuredimage[0];}

// If video, link prettyPhoto to video file instead of image
if($video){$largeimage = $video;}
else{	$largeimage = $image;}
// Where to link to
if($link == 'prettyPhoto'){
	$linkstring = $largeimage.'" rel="prettyPhoto[gall]';
	$zoom = '<span class="zoom"></span>';
	}
elseif($link == 'permalink'){
	$linkstring = get_permalink();
}
elseif($link == ''){
	$linkstring = '';
}
else{
	$linkstring = $link;
	}		
$imageString;

		if(has_post_thumbnail() || $customimage || $featuredimage){	
					
					// FEATURED PAGE IMAGE
					if($imagesize == 'featured'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'"><img src="'.ubergeist_image_resize(PHI_IMGW_FOURTH,get_option('phi_home_thumbnail'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					
					// SINGLE
					if($imagesize == 'single'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_POST,get_option('phi_post_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,'blog').'</a></div>';
						}
					}
								
					// HALF
					if($imagesize == 'half'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_HALF,get_option('phi_half_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					// THIRD
					if($imagesize == 'third'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_THIRD,get_option('phi_third_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					// FOURTH
					if($imagesize == 'fourth'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_FOURTH,get_option('phi_fourth_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					// FIFTH
					if($imagesize == 'fifth'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_FIFTH,get_option('phi_fifth_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					

					// BLOG IMAGE
					if($imagesize == 'blog'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap-large"><a href="'.$linkstring.'"><img src="'.ubergeist_image_resize(PHI_IMGW_BLOG,get_option('phi_blog_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap-large"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					// POST/PAGE IMAGE					
					if($imagesize == 'post'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_POST,get_option('phi_post_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					// LARGE POST/PAGE IMAGE					
					if($imagesize == 'large'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_POST_LARGE,get_option('phi_post_large_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					// SLIDER IMAGE
					if($imagesize == 'slider'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<a href="'.$linkstring.'"><img src="'.ubergeist_image_resize(PHI_IMGW_SLIDER,get_option('phi_slider_image_height'),$image).'" height="'.get_option('phi_slider_image_height').'" width="'.PHI_IMGW_SLIDER.'" alt=""/></a>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						
						$attr = array(
							'title'	=> trim(strip_tags( $post->ID->post_excerpt ))
								);
							
							
						$imageString.= '<a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize, $attr).'</a>';
						}
					}
					// POST IMAGE MEDIUM SIZE
					if($imagesize == '620'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div class="image-wrap-large portfolio"><a href="'.$linkstring.'">'.$zoom.'<img src="'.ubergeist_image_resize(PHI_IMGW_POST,get_option('phi_post_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div class="image-wrap-large portfolio"><a href="'.$linkstring.'">'.$zoom.''.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					
		
					
					// ARCHIVE AND NEWS THUMBNAIL 2
					if($imagesize == 'small'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<a href="'.get_permalink().'"><img src="'.ubergeist_image_resize(PHI_IMGW_SMALL,PHI_IMGW_SMALL,$image).'" alt=""/></a>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a>';
						}				
					}	
							
					
					// MICRO THUMBNAIL FOR POST WIDGET
					if($imagesize == 'micro'){
						if(get_option('phi_resize')== 'timthumb'){
						$imageString.= '<div><a href="'.get_permalink().'"><img src="'.ubergeist_image_resize(PHI_IMGW_MICRO,PHI_IMGW_MICRO,$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						$imageString.= '<div><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
					}
				}
				// If format = return, do not echo result
				if($format == 'return'){return $imageString;}
				else{echo $imageString;}
		}
}




/**********************************
 GET IMAGE URL FOR ATTACHED IMAGES
**********************************/
function phi_get_images_url() {
	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	$results = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$results[] = wp_get_attachment_url($photo->ID);
			//$image_url[] = apply_filters('the_title', $photo->post_title);
		}
	}
	return $results;
}

/**********************************
 INSERT GALLERY
**********************************/

function phi_insert_gallery($columns,$per_page,$page_id){
global $post;
$columns = $columns;
$maximum = $maximum -1;
$per_page = $per_page;
$page_id = $page_id;

if($page_id != ''){$my_page_id = $page_id;}
else{$my_page_id = get_the_ID();}



if ($columns == 2){$imagewidth = 'half';  $imageheight = get_option('phi_half_image_height'); $divclass = 'one_half'; $imagewrap = 'image-wrap';}
if ($columns == 3){$imagewidth = 'third'; $imageheight = get_option('phi_third_image_height'); $divclass = 'one_third'; $imagewrap = 'image-wrap';}
if ($columns == 4){$imagewidth = 'fourth';$imageheight = get_option('phi_fourth_image_height'); $divclass = 'one_fourth'; $imagewrap = 'image-wrap';}
if ($columns == 5){$imagewidth = 'fifth'; $imageheight = get_option('phi_fifth_image_height'); $divclass = 'one_fifth'; $imagewrap = 'image-wrap';}

	
if ( $images = get_children(array(
		'post_parent' => $my_page_id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ID',
		'order' => 'DESC',
	))) : 
	
		foreach( $images as $image ) : 
		$largephotos[]= wp_get_attachment_url($image->ID, 'large');
		$smallphotos[]= wp_get_attachment_image($image->ID, $imagewidth);
		endforeach; 
		endif;
		
$count = count($largephotos);

$wrapheight = ($per_page/$columns)*($imageheight + 40);
$result;
$result .= '<div id="gallerycycle" class="module" style="overflow:hidden; height:'.$wrapheight.'px"><div class="galleryslide">';
$i=0;

while ($i < $count){
$i++;														
$a = $i - 1;
														
if(($i % $columns) == 0){$position = 'last'; }
elseif (($i % $columns) != 0){$position = ''; }
															
$result;
$result .=	 '<div class="'.$divclass.' portfolio '.$position.'" >';
$result .=	 '<div class="'.$imagewrap.'">';
$result .=	 '<a href="'.$largephotos[$a].'" rel="prettyPhoto[gall]"><span class="zoom"></span>';
if(get_option('phi_resize')== 'timthumb'){
$result.= '<img src="'.ubergeist_image_resize($imagewidth,$imageheight,$largephotos[$a]).'" height="'.$imageheight.'" alt="" />'; 
}
elseif(get_option('phi_resize')== 'wordpress'){
$result.= $smallphotos[$a]; 
}
$result .=	 '</a></div>';
$result .=	 '</div>';


if(($i % $per_page) == 0 && $i<$count){
	$result .= '</div><div class="galleryslide">'; // Inserts new galleryslide for every X entries
	}
}
$result .= '</div></div>';
if($count > $per_page):
$result.='<div class="bolk-wrapper">
<a href="#"><span id="prev-gallery" class="prev-bolk"></span></a>
<a href="#"><span id="next-gallery" class="next-bolk"></span></a>
</div>';

endif;
return $result;
}

/**********************************
 GET IMAGES ATTACHED TO POST/PAGE
**********************************/
function phi_get_images($size) {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	$results = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$results[] = wp_get_attachment_image($photo->ID, $size);
			
			
			
		}
	}

	return $results;
	
}

/**********************************
 INSERT GALLERY SLIDER
**********************************/

function phi_insert_gallery_slider($page_id){
global $post;

$page_id = $page_id;

$imagewidth = 'slider'; 
$imageheight = get_option('phi_slider_image_height'); 


if($page_id != 'none'){$my_page_id = $page_id;}
else{$my_page_id = get_the_ID();}

if ( $images = get_children(array(
		'post_parent' => $my_page_id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ID',
		'order' => 'DESC',
	))) : 
	
		foreach( $images as $image ) : 
		$largephotos[]= wp_get_attachment_url($image->ID, 'large');
		$smallphotos[]= wp_get_attachment_image($image->ID, $imagewidth);
		endforeach; 
		endif;
	
						

$result;
$result .= '<div id="gallerycycle" class="module" style="height:'.($imageheight + 22).'px;"><div class="galleryslide">';

$i=0;

$count = count($largephotos);

while ($i < $count){
$i++;	
$a = $i - 1;
$result;
$result .=	 '<div class="image-wrap portfolio">';
$result .=	 '<a href="'.$largephotos[$a].'" rel="prettyPhoto[gall]"><span class="zoom"></span>';
if(get_option('phi_resize')== 'timthumb'){
$result.= '<img src="'.ubergeist_image_resize($imagewidth,$imageheight,$largephotos[$a]).'"  alt="" height="'.$imageheight.'"  />'; 
}
elseif(get_option('phi_resize')== 'wordpress'){
$result.= $smallphotos[$a]; 
}
$result.= '</a>';
$result .=	 '</div>';
if($i < $count){
	$result .= '</div><div class="galleryslide">'; // Inserts new galleryslide for every X entries
	}
}
$result .= '</div>';
$result.='</div>';
$result.='<div class="bolk-wrapper">
<a href="#"><span id="prev-gallery" class="prev-bolk"></span></a>
<a href="#"><span id="next-gallery" class="next-bolk"></span></a>
</div>';
return $result;
}

/************************************
 FIND AND DISPLAY RELATED BLOG POSTS
************************************/
function phi_related_posts($max_posts){
global $post;
$max_posts = $max_posts;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$tag_ids = array();
	
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'caller_get_posts'=>1
	);
	
	$result;
	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		
		$result.= '<h2>Related Posts</h2>';
		$count = 0;		
		while ($my_query->have_posts() && $count < $max_posts) {
				
				
				$count++;
				$my_query->the_post();	
				
$result.= '<div class="news-list">';											
			if(has_post_thumbnail()){
				$result.= '<div class="news-image">';
				$result.= phi_post_image('small','return','permalink');
				$result.= '</div>';
				}
				
			

$result.= '<div class="news-info">';
$result.= '<div class="news-date">';
$result.= get_the_time('m/d/Y');
$result.= '</div>';
$result.= '<h3><a href="'.get_permalink().'">';
$result.= get_the_title();;
$result.= '</a></h3>';
if($usecontent == false){
$result.= '<p>'.get_the_excerpt().'</p>';
}
else{
$result.= get_the_content('');
}
$result.= '<a href="'.get_permalink().'" class="button">';
$result.= phi_more_button('news');
$result.= '</a> </div></div>';
	}
	wp_reset_query();
	return $result;
	
		
		}
	}
}

/**********************************
 DISPLAY AUTHOR INFO IN BLOG POST
**********************************/
function phi_author_box(){
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : 

$result;
$result.= '<div style="margin-top:10px; float:left; clear:both;">';
$result.= '<h2>About the author</h2>';
$result.= '<div class="author-box">';
$result.= '<div class="author-avatar">';
$result.= get_avatar( get_the_author_meta( 'user_email' ));;
$result.= '</div>';
$result.= '<div class="author-description"><p>';
$result.= get_the_author_meta( 'description' );
$result.= '</p></div></div></div>';

endif;
return $result;
}

/**********************************
 POST COMMENT FUNCTION
**********************************/
/* This function was updated in version 1.3 */
function phi_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="single-comment">
						<div class="comment-author vcard"> <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
						
						</div>
						<div class="comment-meta commentmetadata">
									<?php if ($comment->comment_approved == '0') : ?>
									<em><?php _e('Comment is awaiting moderation','itworx');?></em> <br />
									<?php endif; ?>
									<h6><?php echo __('By','itworx').' '.get_comment_author_link(). ' '. get_comment_date(). '  -  ' . get_comment_time(); ?></h6>
									
									<?php comment_text() ?>
									
									<?php edit_comment_link(__('Edit comment','itworx'),'  ',''); ?>
									
									<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','itworx'),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
						</div>
			</div>
			<?php  }
			


/**********************************
 DISPLAY ARTICLES ON HOME
**********************************/

function phi_home_article(){
	
			global $post;
			
			query_posts("page_id=".get_option('phi_home_article_1'));
			
			if (have_posts()) : the_post();
			$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
				echo '<div class="one_half" id="phi_home_article1">';
					echo '<h2>'.get_the_title().'</h2>';
					if(get_option('phi_home_article_1_format')== 'content'){
					echo get_the_content_formatted();
					}
					else{echo '<p>'.$excerpt.'</p>';}
				echo '</div>';
			endif;
			wp_reset_query(); 
	}
	
	function phi_home_article2(){
	
			global $post;
			
			query_posts("page_id=".get_option('phi_home_article_2'));
			
			if (have_posts()) : the_post();
			$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
				echo '<div class="one_half last" id="phi_home_article2">';
					echo '<h2>'.get_the_title().'</h2>';
					if(get_option('phi_home_article_2_format')== 'content'){
					echo get_the_content_formatted();
					}
					else{echo '<p>'.$excerpt.'</p>';}
				echo '</div>';
			


	endif;
	wp_reset_query(); 

	}


/**********************************
 DISPLAY TAB CONTENT ON HOME PAGE
**********************************/
function phi_home_tabs($pageposts){
	
global $post;
if ($pageposts): 
$counter = 0;

echo '<div class="hometabs" id="hometabs">';

// TAB NAVIGATION
echo '<ul id="tabnav">';
foreach ($pageposts as $post):
$counter ++;
setup_postdata($post);
echo '<li id="tabindex'.(100 - $counter).'">';
echo '<a href="#tab'.$counter.'">'.get_the_title().'</a>';
echo '</li>';
endforeach; 

echo '</ul>';

// TAB CONTENT
$pagecount = 0;
foreach ($pageposts as $post):
$pagecount ++;
setup_postdata($post);
 
$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$pageurltxt = get_post_meta($post->ID,'phi_customurlname',true);

echo '<div id="tab'.$pagecount.'" class="tabcontent"><div class="tabwrap"><div class="inner">';
//echo '<h2>'.get_the_title().'</h2>';
the_content();
//echo '<p>'.phi_custom_excerpt($excerpt,500).'</p>';
echo '</div>';

phi_random_testimonial();

echo '</div></div>';
endforeach;
echo '</div>'; 
endif;

}



/**********************************
 DISPLAY FEATURED IMAGES ON HOME PAGE
**********************************/
function phi_featured_pages($pageposts){
	
global $post;
if ($pageposts): 
$counter = 0;
echo '<div class="module" id="featuredpages">';
if(get_option('phi_home_featured_title')){
echo '<h3 class="diagonal"><span>'.get_option('phi_home_featured_title').'</span></h3>';
}
foreach ($pageposts as $post):
$counter ++;
setup_postdata($post);
 
$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$pageurltxt = get_post_meta($post->ID,'phi_customurlname',true);
$charlimit = get_option('phi_featured_charlimit');

if(($counter % 4) == 0){$position = 'last';}
else{$position = '';}

echo '<div class="one_fourth '.$position.'">';
echo phi_post_image('featured','return','permalink');
echo '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
echo '<p>'.phi_custom_excerpt($excerpt,$charlimit).'</p>';
echo phi_more_button('default');
echo '</div>';
 if(($counter % 4) == 0){echo '<br class="break"/>';}
		
endforeach; 
echo '</div>';
endif;

}

/**********************************
 DISPLAY EVENTS POSTS
**********************************/
 
function phi_show_scheduled_posts($posts) {
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0) {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
 
add_filter('the_posts', 'phi_show_scheduled_posts');

/**********************************
 DISPLAY NEWSLIST FUNCTION
**********************************/
function phi_news_list($pager,$format){
	
	global $post;
	// Query news
	
	$pager = get_option('phi_news_pager');
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;							
	$args = array( 'post_type' => 'news',
         'posts_per_page' => $pager,
         'post_status' => 'publish',
         'order' => 'DESC',
			'paged' => $paged
			);
          		 
			query_posts($args);
			$result;	
			$result.= '<div class="module no-border">';
			if (have_posts()): 
			while (have_posts()) : the_post(); 
								
			$text = $post->post_excerpt;
			$charlimit = get_option('phi_news_charlimit');
																
			$result.= '<div class="news_post">';
			$result.= '<div class="post_image">';
			$result.= phi_post_image('small','return','permalink');
			$result.= '</div>';
			$result.= '<div class="post_info">';
			$result.= '<h4 class="post_date">'.get_the_time('m/d/Y').'</h4>';
			$result.= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
			$result.= '<p>'.phi_custom_excerpt($text,$charlimit).'</p><p>'.phi_more_button('news').'</p>';
			$result.= '</div></div>';
				
			endwhile;
			endif;
			
			$result.= wp_pagenavi_return();
			$result.= '</div>';
			wp_reset_query();	
			
			if($format=='return'){
				return $result;
			}
			elseif($format==''){
				echo $result;
			}	
}
/**********************************
 DISPLAY NEWS ARCHIVE
**********************************/
function phi_news_archive($pager,$format){
	
	global $post;
	
	if($pager ==''){
	$pager = get_option('phi_news_archive_pager');
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array( 'post_type' => 'news',
			'posts_per_page' => $pager,
			'post_status' => 'publish',
			'order' => 'DESC',
			'paged' => $paged
			 );
			
			query_posts($args);
	
			$result;					
			$result.= '<div class="module no-border">';
			if (have_posts()): 
			while (have_posts()) : the_post(); 
										
			$result.= '<div class="news-archive">';
			$result.= '<p class="news-archive-date"><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong><span> '.get_the_date().'</span></p>';
			$result.= '</div>';
			endwhile;
			endif;
			$result.= wp_pagenavi_return();
			$result.= '</div>';
			
			wp_reset_query();
			
			if($format=='return'){
				return $result;
			}
			else{
			echo $result;
			}
			
}

/**********************************
 DISPLAY TESTIMONIALS FUNCTION
**********************************/
function phi_testimonial_list($pager,$format){
	
	global $post;
	
	if($pager ==''){
	$pager = get_option('phi_testimonial_pager');
	}
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;							
	$args = array( 'post_type' => 'testimonial',
         'posts_per_page' => $pager,
         'post_status' => 'publish',
         'order' => 'DESC',
			'paged' => $paged
			);
          
			query_posts($args);
								
			if (have_posts()): 
			$result.= '<div class="module no-border">';
			while (have_posts()) : the_post(); 
			$text = $post->post_excerpt;
			
			$charlimit = get_option('phi_testimonial_charlimit');
			
			$result;								
			$result.= '<div class="testimonial_post">';
			$result.= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
			
			
			$result.= '<p>'.phi_custom_excerpt($text,$charlimit).'</p>';
			$result.= '<p><em>'.get_post_meta($post->ID,'phi_signature',true).'</em></p>';
			$result.= phi_more_button('testimonial');
			$result.= '</div>';
			endwhile;
			
			
			$result.= wp_pagenavi_return();
			wp_reset_query();	
			$result.= '</div>';
			endif;
				if($format=='return'){
				return $result;
			}
				elseif($format==''){
					echo $result;
				}
				
				
}

/**********************************
 DISPLAY EVENTS FUNCTION
**********************************/
function phi_event_list($format){
	
	global $post;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array( 'post_type' => 'events',
                               'posts_per_page' => '-1',
                               'post_status' => 'future',
                               'order' => 'ASC',
										 'paged' => $paged,
										  
										  );
               				
									query_posts($args);
									
									$counter = 0;
									if (have_posts()): while (have_posts()) : the_post(); 
									$counter ++;
									$result;	
									
									if($counter < 10){					
									$result.= '<div class="events_post">';
									
									if(has_post_thumbnail()){
																$result.= '<div class="post_image">';
																$result.= phi_post_image('small','return','permalink');
																$result.= '</div>';
																}
									$result.= '<div class="post_info">';
									
									$result.= '<h4 class="post_date">'.get_the_date(). ' '. __('at','itworx').' ' .get_the_time().'</h4>';
									$result.= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
									$result.= '<p>'.get_the_excerpt().'</p>';
									$result.= '<strong><a href="'.get_permalink().'" class="button">'.__('Read more','itworx').'</a></strong>';
									$result.= '</div></div>';
									}
									
									else{
										
									$result.= '<div class="event-archive">';
									$result.= '<p class="event-date"><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong> '.get_the_date().' at '.get_the_time().'</p>';
									$result.= '</div>';
										
										
									}
									

			endwhile;
			endif;
			$result.= wp_pagenavi_return();
			wp_reset_query();	
			
				if($format=='return'){
				return $result;
			}
				elseif($format==''){
					echo $result;
				}
				
				
}

/**********************************
 DISPLAY FAQ FUNCTION
**********************************/

function phi_faq($format){
global $post;
$result;

//Menu setup
$result.= '<ul id="tabnav" style="margin-top:16px;">';
$myterms = get_terms('faq_categories');
$phi_getTerms = array();
$result.= '<li><a href="#tab0">'.get_option('phi_faq_tab_name').'</a></li>';
					
$i = 0;
foreach ($myterms as $term_list) {
$i++;
//$phi_getTerms [$term_list->term_id] = $term_list->name;
$result.= '<li><a href="#tab'.$i.'">'.$term_list->name.'</a></li>';
}
$result.= '</ul>';				
		
// End menu setup		
		
		$pager = get_option('phi_faq_pager');
		$args=array(
			'taxonomy' => 'faq_categories',
			'post_type' => 'faq',
			'orderby' => 'date',
			'order' => 'DESC',
			'post_status' => 'publish',
			'posts_per_page' => $pager
			);
		
		
		query_posts($args);
							
							if (have_posts()) : 
								 
							$result.= '<div class="tabcontent" id="tab0">';
								
							 while (have_posts()) : the_post(); 
								  
								$result.= '<div class="list"><p class="trigger"><a href="#">'.get_the_title().'</a></p>';
								$result.= '<div class="toggle_container"><div class="block">';
								$result.= '<p><strong>'.get_the_excerpt().'</strong></p>';
							   
								if (!empty($post->post_content)):
									$result.= '<h6><span>'.__('Answer','itworx').'</span></h6>';
									$result.= get_the_content_formatted();
									$result.= '<p>'.__('regards','itworx').'</p>';
									$result.= get_the_author();
									 endif;
								$result.= '</div></div></div>';
									
								endwhile; 
								$result.= '</div>';	
								endif;
								wp_reset_query();
					
					
								$a=0;
								foreach ($myterms as $term_list) {
														
								$term = $term_list->slug;
								$a++;
							
							$args=array(
							 
							  'taxonomy' => 'faq_categories',
							  'post_type' => 'faq',
							  'term' => $term,
							  'orderby' => 'date',
							  'order' => 'DESC',
							  'post_status' => 'publish',
							  'posts_per_page' => '-1'
							  
							);
							query_posts($args);
							
							if (have_posts()) : 
								 
								  $result.= '<div class="tabcontent" id="tab'.$a.'">';
								
								  while (have_posts()) : the_post(); 
								  
								 $result.= '<div class="list"><p class="trigger"><a href="#">'.get_the_title().'</a></p>';
								 $result.= '<div class="toggle_container list"><div class="block">';
									
								$result.= '<p>'.get_the_excerpt().'</p>';
								 if (!empty($post->post_content)):
									
									$result.= '<h6>'.__('Answer','itworx').'</h6>';
									
									$result.= get_the_content_formatted();
									$result.= '<p>'.__('regards','itworx').'</p>';
									$result.= get_the_author();
									 endif;
									$result.= '</div></div></div>';
									
								  endwhile; 
								  wp_reset_query();
								$result.= '</div>';	
								endif;
							}
							
							if($format=='return'){
								return $result;
							}
								else{
									echo $result;
								}
								
								
								wp_reset_query();

}
/****************************************************
 GET THE CONTENT WITH FORMATTING (get_the_content();)
*****************************************************/
function get_the_content_formatted($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/**********************************
 INSERT VIDEO
**********************************/
function phi_video($args){
global $post;

extract( $args );

$type = $type;
$id = $id;
$size = $size;	
$width = $width;
$height = $height;
$source = $source;

//Post meta
$panel_videotype = get_post_meta($post->ID,'phi_videohost',true);
$panel_videoid = get_post_meta($post->ID,'phi_videoid',true);

if($source != 'shortcode')	{
$type = $panel_videotype;
$id = $panel_videoid;
}


if($type == 'phi_vimeo' || $type == 'vimeo') {
	$url = 'http://vimeo.com/moogaloop.swf?clip_id='.$id;	
} 
elseif($type == 'phi_youtube' || $type == 'youtube') {
	$url = 'http://www.youtube.com/v/'.$id;	
}  

if ($height != ''){$videoHeight = $height;}
else{$videoHeight = get_post_meta($post->ID,'phi_videoheight',true);}
if ($width != ''){$videoWidth = $width;}
else{$videoWidth = get_post_meta($post->ID,'phi_videowidth',true);}

						
if($size == 'large'){
	$defaultVideoWidth  = '900';
	$defaultVideoHeight = '530';
	};
						
if($size == 'medium'){
	$defaultVideoWidth  = '590';
	$defaultVideoHeight = '327';
	};
	
if($size == 'small'){
	$defaultVideoWidth  = '300';
	$defaultVideoHeight = '166';	
	};
	
											
if($videoHeight == false){$newVideoHeight = $defaultVideoHeight;}
else{$newVideoHeight = $videoHeight;}
if($videoWidth == false){$newVideoWidth = $defaultVideoWidth;}
else{$newVideoWidth = $videoWidth;}

// Markup
$videoString = "";
$videoString .= '<div class="video-wrap">';
$videoString .= '<object type="application/x-shockwave-flash" data="'.$url.'" width="'.$newVideoWidth.'" height="'.$newVideoHeight.'">';
$videoString .= '<param name="allowScriptAccess" value="always" />';
$videoString .= '<param name="allowFullScreen" value="true" />';
$videoString .= '<param name="movie" value="'.$url.'" />';
$videoString .= '<param name="quality" value="high" />';
$videoString .= '<param name="wmode" value="transparent" />';
$videoString .= '<param name="bgcolor" value="#ffffff" />';
$videoString .= '<img src="banner.gif" width="'.$newVideoWidth.'" height="'.$newVideoHeight.'" alt="banner" />';
$videoString .= '</object>';
$videoString .= '</div>';


return $videoString;

}



function phi_video_new($args){
global $post;

extract( $args );

$videotype=$type;
$videoid=$id;
$size=$size;	
$width = $width;
$height = $height;
$source = $source;


if($videotype == 'vimeo') {
	$videourl = 'http://vimeo.com/moogaloop.swf?clip_id='.$videoid;	
} 
elseif($videotype == 'youtube') {
	$videourl = 'http://www.youtube.com/v/'.$videoid;	
}  

if ($height != ''){$videoHeight = $height;}
else{$videoHeight = get_post_meta($post->ID,'phi_videoheight',true);}
if ($width != ''){$videoWidth = $width;}
else{$videoWidth = get_post_meta($post->ID,'phi_videowidth',true);}

						
if($size == 'large'){
	$defaultVideoWidth  = '900';
	$defaultVideoHeight = '530';
	};
						
if($size == 'medium'){
	$defaultVideoWidth  = '590';
	$defaultVideoHeight = '327';
	};
	
if($size == 'small'){
	$defaultVideoWidth  = '300';
	$defaultVideoHeight = '166';	
	};
	
											
if($videoHeight == false){$newVideoHeight = $defaultVideoHeight;}
else{$newVideoHeight = $videoHeight;}
if($videoWidth == false){$newVideoWidth = $defaultVideoWidth;}
else{$newVideoWidth = $videoWidth;}

// Markup
$videoString = "";
$videoString .= '<div class="video-wrap">';
$videoString .= '<object type="application/x-shockwave-flash" data="'.$videourl.'" width="'.$newVideoWidth.'" height="'.$newVideoHeight.'">';
$videoString .= '<param name="allowScriptAccess" value="always" />';
$videoString .= '<param name="allowFullScreen" value="true" />';
$videoString .= '<param name="movie" value="'.$videourl.'" />';
$videoString .= '<param name="quality" value="high" />';
$videoString .= '<param name="wmode" value="transparent" />';
$videoString .= '<param name="bgcolor" value="#ffffff" />';
$videoString .= '<img src="banner.gif" width="'.$newVideoWidth.'" height="'.$newVideoHeight.'" alt="banner" />';
$videoString .= '</object>';
$videoString .= '</div>';


return $videoString;

}
/**********************************
 INSERT CONTACT FORM
**********************************/


// CONTACT FORM
function phi_contact_form($rec){

$recipient = $rec;
//If the form is submitted
if(isset($_POST['phi_name'])) {

		//Check to make sure that the name field is not empty
		if(trim($_POST['phi_name']) === __('Name','itworx') || trim($_POST['phi_name']) === '') {
			$nameError = __('Please enter your name','itworx');
			$hasError = true;
		} else {
			$name = trim($_POST['phi_name']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['phi_email']) === '')  {
			$emailError = __('Please enter an email adress','itworx');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['phi_email']))) {
			$emailError = __('Please enter a valid email adress','itworx');
			$hasError = true;
		} else {
			$email = trim($_POST['phi_email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['phi_message']) === '') {
			$commentError = __('Please enter a comment','itworx');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['phi_message']));
			} else {
				$comments = trim($_POST['phi_message']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
			$phone=trim($_POST['phi_phone']);
			if($recipient){
			$emailTo = $recipient;
			}
			else{
			$emailTo = get_option('phi_form_mail');
			}
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
}


			$formString = "";
			$formString.='<div id="contact-form" class="innercontent">';
			$formString.='<form action=""  id="validate_form" method="post"><ul>';
			// Name input
			$formString.='<li>';
			$formString.='<input type="text" name="phi_name" class="cleardefault" value="';
			if(isset($_POST['phi_name'])){
			$formString.= $_POST['phi_name'];
			}else{
			$formString.= __('Name','itworx');
			}
			$formString.= '"/>';
			if($nameError != '') {
			$formString.='<span class="red"> * '.$nameError.'</span>';
			}
			$formString.='</li>';
			// Mail input
			$formString.='<li>';
			$formString.='<input type="text" name="phi_email" class="cleardefault" value="';
			if(isset($_POST['phi_email'])) {
			$formString.= $_POST['phi_email']; 
			}else{
			$formString.= __('Email','itworx');
			}
			$formString.= '"/>';
			if($emailError != '') {
			$formString.='<span class="red"> * '.$emailError.'</span>';
			}
			$formString.='</li>';
			// Phone
			$formString.='<li>';
			$formString.='<input type="text" name="phi_phone" class="cleardefault" value="'; 
			if(isset($_POST['phi_phone'])){
			$formString.= $_POST['phi_phone']; 
			}else{ 
			$formString.= __('Phone number','itworx');
			}
			$formString.= '"/>';
			$formString.='</li>';
			$formString.='<li>';
			$formString.= __('Message','itworx');
			if($commentError != ''){ 
			$formString.= '<span class="red"> * '.$commentError.'</span>';
			}
			$formString.='</li>';
			$formString.='<li>';
			$formString.='<textarea name="phi_message" rows="8" cols="40">';
			if(isset($_POST['phi_message'])) { 
			if(function_exists('stripslashes')) {
			$formString.= stripslashes($_POST['phi_message']);
			} else {
			$formString.= $_POST['phi_message'];
			}
			}
			$formString.= '</textarea>';
			$formString.='</li>';
			$formString.='<li>';
			$formString.= '<input type="submit" id="submitbutton" value="'.__('Submit','itworx').'"  />';
			$formString.='</li>';
			$formString.='</ul>';
			$formString.='</form>';
			$formString.='</div>';
			
			if(isset($emailSent) && $emailSent == true): 
			
			$formString.= '<script type="text/javascript">jQuery("#validate_form").hide();</script>';
			$formString.= '<h1>'.__('Thank you!','itworx').' '.$name.'</h1><p>'.__('We will come back to you as soon as we can','itworx').'</p>';
			endif;
			return $formString;
}



/**********************************
 INSERT PORTFOLIO
**********************************/
function phi_portfolio($columns, $category, $postcount){
global $post;
$clickbehaviour = get_option('phi_thumbnail_click');

$posttype = 'phiportfolio';
$columns = $columns;
$term = $category;
$order = get_option('phi_portfolio_order');
$postcount = $postcount;

if(!is_single()){
if (get_option(phi_disable_portfolioexcerpt)!= true):
$disableexcerpt = 'false';
endif;


if ($columns == 5){$imageheight = get_option('phi_fifth_image_height'); $columnclass='one_fifth'; $imagewidth = 'fifth';}
if ($columns == 4){$imageheight = get_option('phi_fourth_image_height'); $columnclass='one_fourth'; $imagewidth = 'fourth';}
if ($columns == 3){$imageheight = get_option('phi_third_image_height'); $columnclass='one_third'; $imagewidth = 'third';}
if ($columns == 2){$imageheight = get_option('phi_half_image_height'); $columnclass='one_half'; $imagewidth = 'half';}
if ($columns == 1){$imageheight = get_option('phi_post_image_height'); $columnclass=''; $imagewidth = PHI_IMGW_POST;}


	
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$counter =  0;

$args = array(
'post_type' => 'phiportfolio',
'taxonomy' => 'phiportfoliocats',
'term' => $term,
'paged'=>$paged,
	
'order'=>$order,
'showposts'=> $postcount,
);

query_posts($args);

// Only run if not on single page


$result;
$result.='<div class="portfoliowrap">';

// The loop
while (have_posts()) : the_post(); 	
$counter++;

// Post text
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$video = get_post_meta($post->ID,'phi_lightbox_image',true);
$text = $post->post_excerpt;
// Post images
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');			//Timthumb Resized image
$wpimage = wp_get_attachment_image_src(get_post_thumbnail_id(), $imagewidth); //WP Resized image

if($video){$lightbox = $video;}
else{$lightbox = $image[0];}
						
						
			if($columns > 1){	
			// Grid portfolio
			$result.= '<div class="'.$columnclass.' ';
			if(($counter % $columns) == 0){$result.= ' last';}
			$result.= '">';
			$result.= phi_post_image($imagewidth,'return',$clickbehaviour);
			
			$result.= '<h4><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h4>';
				if($disableexcerpt == true){
				$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '</div>';
				if(($counter % $columns) == 0){$result.= '<br class="break" />';}
			$result.= '<!-- End Featured Page Box -->';
			}
			
			else{
			// List portfolio
			$result.= '<div class="portfolio-post">';
			$result.= '<div class="portfolio-image">';
			$result.= phi_post_image('single','return',$clickbehaviour);
			$result.= '</div>';
			$result.= '<div class="portfolio-info">';
			
			$result.= '<h2><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h2>';
			if($disableexcerpt == true){
					
					$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '<a href="'.get_permalink().'" class="button">'.__('Read more','itworx').'</a>';
			$result.= '</div>';
			$result.= '</div>';
			}
			
			endwhile; 

						
			$result.= wp_pagenavi_return();
			$result.= '<br class="break" /></div>';
			wp_reset_query();		
			return $result;
			}
			elseif(is_single()){
				//phi_portfolio_single($columns, $category, $postcount);
				}
}


function phi_portfolio_single($columns, $category, $postcount){
global $post;
$clickbehaviour = get_option('phi_thumbnail_click');

$posttype = 'phiportfolio';
$columns = $columns;
$term = $category;
$order = get_option('phi_portfolio_order');
$per_page = $postcount;

if (get_option(phi_disable_portfolioexcerpt)!= true):
$disableexcerpt = 'false';
endif;


if ($columns == 5){$imageheight = get_option('phi_fifth_image_height'); $columnclass='one_fifth'; $imagewidth = 'fifth';}
if ($columns == 4){$imageheight = get_option('phi_fourth_image_height'); $columnclass='one_fourth'; $imagewidth = 'fourth';}
if ($columns == 3){$imageheight = get_option('phi_third_image_height'); $columnclass='one_third'; $imagewidth = 'third';}
if ($columns == 2){$imageheight = get_option('phi_half_image_height'); $columnclass='one_half'; $imagewidth = 'half';}
if ($columns == 1){$imageheight = get_option('phi_post_image_height'); $columnclass=''; $imagewidth = PHI_IMGW_POST;}


$counter =  0;

$args = array(
'post_type' => 'phiportfolio',
'taxonomy' => 'phiportfoliocats',
'term' => $category,
'paged'=>$paged,
'order'=>$order,
'showposts'=> '-1',
);

query_posts($args);

// Only run if on single page


$result;
$result.='<div id="portfoliocycle">';
$result.='<div class="portfolioslide">';

// The loop
while (have_posts()) : the_post(); 	
$counter++;

// Post text
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$video = get_post_meta($post->ID,'phi_lightbox_image',true);
$text = $post->post_excerpt;
// Post images
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');			//Timthumb Resized image
$wpimage = wp_get_attachment_image_src(get_post_thumbnail_id(), $imagewidth); //WP Resized image

if($video){$lightbox = $video;}
else{$lightbox = $image[0];}
						
						
			if($columns > 1){	
			// Grid portfolio
			$result.= '<div class="'.$columnclass.' ';
			if(($counter % $columns) == 0){$result.= ' last';}
			$result.= '">';
			$result.= phi_post_image($imagewidth,'return',$clickbehaviour);
			
			$result.= '<h4><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h4>';
				if($disableexcerpt == true){
				$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '</div>';
				if(($counter % $columns) == 0){$result.= '<br class="break" />';}
			$result.= '<!-- End Featured Page Box -->';
			}
			
			else{
			// List portfolio
			$result.= '<div class="portfolio-post">';
			$result.= '<div class="portfolio-image">';
			$result.= phi_post_image('single','return',$clickbehaviour);
			$result.= '</div>';
			$result.= '<div class="portfolio-info">';
			
			$result.= '<h2><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h2>';
			if($disableexcerpt == true){
				$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '<a href="'.get_permalink().'" class="button">'.__('Read more','itworx').'</a>';
			$result.= '</div>';
			$result.= '</div>';
			}
			
			// Insert a new slide for every x items
			if(($counter % $perpage) == 0){
				$result .='</div><div class="portfolioslide">';
			}
			
			endwhile; 

			$result.= '</div>'; // End last portfolioslide			
			$result.= '<br class="break" /></div>';
			wp_reset_query();		
			return $result;
			
}


/**********************************
 INSERT PORTFOLIO 2
**********************************/
function phi_portfolio_test($columns, $category, $postcount){
global $post;

$clickbehaviour = get_option('phi_thumbnail_click');

$posttype = 'phiportfolio';
$columns = $columns;
$term = $category;
$postcount = $postcount;
$order = get_option('phi_portfolio_order');

if (get_option(phi_disable_portfolioexcerpt)!= true):
$disableexcerpt = 'false';
endif;


if ($columns == 5){$imageheight = get_option('phi_fifth_image_height'); $columnclass='one_fifth'; $imagewidth = 'fifth';}
if ($columns == 4){$imageheight = get_option('phi_fourth_image_height'); $columnclass='one_fourth'; $imagewidth = 'fourth';}
if ($columns == 3){$imageheight = get_option('phi_third_image_height'); $columnclass='one_third'; $imagewidth = 'third';}
if ($columns == 2){$imageheight = get_option('phi_half_image_height'); $columnclass='one_half'; $imagewidth = 'half';}
if ($columns == 1){$imageheight = get_option('phi_post_image_height'); $columnclass=''; $imagewidth = PHI_IMGW_POST;}



$counter =  0;







$result;
$result.='<div class="portfoliowrap">';



$args = array(
'post_type' => 'phiportfolio',
'taxonomy' => 'phiportfoliocats',
'term' => $term,
'paged'=>$paged,
//'orderby'=>'title',	
'order'=>$order,
'showposts'=> $postcount,
);

$paged = (intval(get_query_var('paged'))) ? intval(get_query_var('paged')) : 1;
query_posts('&post_type=phiportfolio&order='.$order.'&term='.$term.'&posts_per_page='.$postcount.'&paged=' . $paged);

// The loop
if (have_posts()) : while (have_posts()) : the_post(); 	
$counter++;

// Post text
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$video = get_post_meta($post->ID,'phi_lightbox_image',true);
$text = $post->post_excerpt;
// Post images
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');			//Timthumb Resized image
$wpimage = wp_get_attachment_image_src(get_post_thumbnail_id(), $imagewidth); //WP Resized image

if($video){$lightbox = $video;}
else{$lightbox = $image[0];}
						
						
			if($columns > 1){	
			// Grid portfolio
			$result.= '<div class="'.$columnclass.' ';
			if(($counter % $columns) == 0){$result.= ' last';}
			$result.= '">';
			$result.= phi_post_image($imagewidth,'return',$clickbehaviour);
			
			$result.= '<h4><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h4>';
				if($disableexcerpt == true){
				$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '</div>';
				if(($counter % $columns) == 0){$result.= '<br class="break" />';}
			$result.= '<!-- End Featured Page Box -->';
			}
			
			else{
			// List portfolio
			$result.= '<div class="portfolio-post">';
			$result.= '<div class="portfolio-image">';
			$result.= phi_post_image('single','return',$clickbehaviour);
			$result.= '</div>';
			$result.= '<div class="portfolio-info">';
			
			$result.= '<h2><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h2>';
			if($disableexcerpt == true){
					
					$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_portfolio_charlimit')).'</p>';
				}
			$result.= '<a href="'.get_permalink().'" class="button">'.__('Read more','itworx').'</a>';
			$result.= '</div>';
			$result.= '</div>';
			}
		
			endwhile; 
			endif;
						
			
			$result.= '<br class="break" /></div>';
			$result.= wp_pagenavi_return();
			$wp_reset_query;
			
			return $result;
}

function phi_excerpt($text,$count){
			
			$text = $post->post_excerpt;
			if (strlen($text) > $count) {
			$text = substr($text,0,strpos($text,' ',$count)); } ;
			$text = $text . ' ...';
			echo apply_filters('the_excerpt',$text);
}

function phi_custom_excerpt($text,$count){
			
			$short_excerpt = substr($text,0,$count); 
			
		
			return $short_excerpt;
			
}

// FULLWIDTH BLOG
function phi_blog($type,$archive,$pager){
global $post;

if($type =='fullwidth'){
	$divclass = 'blog_post_full';
}
else{
	$divclass = 'blog_post';
	}

if($archive == true){
// QUERY STRING ON ARCHIVE.PHP
}
else{
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query_string ="showposts=$pager&paged=$paged";
query_posts($query_string);
}
$usecontent = get_option('phi_display_postcontent');
global $more;    // Declare global $more (before the loop).
$more = 0; 
$result;


if (have_posts()): while (have_posts()) : the_post(); 
			
			global $post;
			
			$result.= '<div class="'.$divclass.'">';
			$result.= '<div class="post_image">';
			if (get_post_meta($post->ID,'phi_blog_video',true)){
				
				$result.= phi_video(array('size' => 'medium'));
				}
				else{																
				$result.= phi_post_image('blog','return','permalink');
				}
			$result.= '</div>';
			$result.= '<div class="post_info">';
			$result.= '<h4 class="post_date">';
						
						if($hidepublishdate == false){
						$result.= __('Posted on ','itworx');
						$result.= get_the_date();
						}
			$result.= '</h4>';
			$result.= '<h2><a href="'.get_permalink().'">';
			$result.= get_the_title();
			$result.= '</a></h2>';
			$result.= '<p class="post_meta">';
						if($hideauthor == false){
						$result.= __('Posted by','itworx').' ';
						$result.= get_the_author().' ';
						}
						if($hidecategories == false){
						$result.= __('in category','itworx').' ';
						
						
						foreach((get_the_category()) as $category) { 
						
						
						$category_id = $category->cat_ID;
    					$category_link = get_category_link( $category_id );
    					
						$result.=  '<a href="'.$category_link.'">'.$category->cat_name.'</a> '; 
} 
						}
			$result.= '</p>';
						
						if($usecontent == false){ 
						$text = $post->post_excerpt;
						$result.= '<p>'.phi_custom_excerpt($text, get_option('phi_blog_charlimit')).'</p>';
						}
						else{
						$result.= '<p>'.get_the_content('').'</p>';
						}
			$result.= '<p><a href="'.get_permalink().'" class="button">'.__('Read more','itworx').'</a></p>';
						if ( comments_open() ){
						
						}
						$result.= '</div></div>';
		
						endwhile;
						endif;
						$result.= wp_pagenavi_return();	
						wp_reset_query();
						
						return $result;
}


function phi_random_testimonial(){
	
	global $post;
		
		$loopargs = array(
		'post_type' => 'testimonial',
		'paged'=>$paged,
		'order'=>'ASC',
		'showposts'=> 1,
		'orderby' => 'rand',
		);
		
		query_posts($loopargs);
		
		echo '<div class="testimonial-widget">';
		$title = apply_filters('widget_title', $instance['title'] );

		if (have_posts()): while (have_posts()) : the_post(); 
		$text = $post->post_excerpt;
		$charlimit = get_option('phi_home_testimonial_charlimit');
		$signature = get_post_meta($post->ID,'phi_signature',true);
		?>
		<div class="blob-top">
		<?php
				echo '<p><a href="'.get_permalink().'">'.phi_custom_excerpt($text,$charlimit).'</a></p>';
				?></div>
				<div class="blob-bottom"><?php echo $signature;?></div>
		<?php
		endwhile; endif;
		wp_reset_query();
		echo '</div>';				
}

/**********************************
 BREADCRUMB SCRIPT
**********************************/

/* Breadcrumb */
function phi_breadcrumbs() {
	
	if(get_option('phi_breadcrumb')==false){
	echo '<div id="breadcrumb">';
	
 	if(get_option(phi_breadcrumb)==false){
	$delimiter = ' / ';
	$name = __('Home','itworx');
	if ( !is_home() || !is_front_page() || is_paged() ) {
		global $post;
		$home = home_url();
		echo __('You are here: ','itworx').' '.'<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo '';
			single_cat_title();
			echo '';
 
		} elseif ( is_day() ) {
    	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    	echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
    	echo get_the_time('d');
 
		} elseif ( is_month() ) {
    	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    	echo get_the_time('F');
 
		} elseif ( is_year() ) {
    	echo get_the_time('Y');
 
		} elseif ( is_single() ) {
			$cat = get_the_category(); $cat = $cat[0];
			if($cat!=''){
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			}
			the_title();
		} 	
			elseif ( is_page() && !$post->post_parent ) {
			the_title();
 
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			the_title();
 
		} elseif ( is_search() ) {
			echo 'Search results for &#39;' . get_search_query() . '&#39;';
 
		} elseif ( is_tag() ) {
			echo '';
			single_tag_title();
			echo '';
 
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo 'Articles posted by ' . $userdata->display_name;
		}
 
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
 
	}
}
echo '</div>';
}

}




	
function phi_more_button($type) {
	
	$phi_textvars = array(
			'default' 		=> __('Read more','itworx'),
			'blog' 			=> __('Read post','itworx'),
			'portfolio' 	=> __('See project','itworx'),
			'testimonial' 	=> __('Read testimonial','itworx'),
			'news' 			=> __('Read story','itworx')
			
	);
	
	return ' <a href="'. get_permalink() . '" class="button">' . $phi_textvars[$type]. '</a>';
}

function phi_more_link($type) {
	
	$phi_textvars = array(
			'default' 		=> __('Read more','itworx'),
			'blog' 			=> __('Read post','itworx'),
			'portfolio' 	=> __('See project','itworx'),
			'testimonial' 	=> __('Read testimonial','itworx'),
			'news' 			=> __('Read story','itworx')
			
	);
	
	return ' <a href="'. get_permalink() . '">' . $phi_textvars[$type]. '</a>';
}
?>