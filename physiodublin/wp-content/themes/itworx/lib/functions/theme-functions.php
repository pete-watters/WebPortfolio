<?php
/**********************************
 TIMTHUMB 
**********************************/

// Define Folder Constants
define('PHI_SCRIPTS_FOLDER', get_bloginfo('template_url') . '/lib/scripts');

function ubergeist_image_resize($width,$height,$img_url) {
	global $blog_id;
	
	// Get image-quality settings from theme options
	$imageQuality = 70;
	$image['url'] = $img_url;
	$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
	$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
	$image_info = @getimagesize($image_path);

	// If we cannot get the image locally, try for an external URL
	if (!$image_info)
		$image_info = @getimagesize($image['url']);

	$image['width'] = $image_info[0];
	$image['height'] = $image_info[1];
	if($img_url != "" && ($image['width'] != $width || $image['height'] != $height || !isset($image['width']))){
		
	//If WP MU
		if ( (defined('WP_ALLOW_MULTISITE')) && (WP_ALLOW_MULTISITE == true) ) {
			$the_image_src = $img_url;
			if (isset($blog_id) && $blog_id > 0) {
				$image_parts = explode('/files/', $the_image_src);
				if (isset($image_parts[1])) {
					$the_image_src = '/blogs.dir/' . $blog_id . '/files/' . $image_parts[1];
				}
			}
			$img_url = PHI_SCRIPTS_FOLDER."/timthumb.php?src=$the_image_src&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=$imageQuality";
		}else{
			$img_url = PHI_SCRIPTS_FOLDER."/timthumb.php?src=$img_url&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=$imageQuality";	
		}
	}
	return $img_url;
}











/*
Plugin Name: WP-PageNavi
Plugin URI: http://lesterchan.net/portfolio/programming/php/
Description: Adds a more advanced paging navigation to your WordPress blog.
Version: 2.50
Author: Lester 'GaMerZ' Chan
Author URI: http://lesterchan.net
*/


/*  
	Copyright 2009  Lester Chan  (email : lesterchan@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


### Create Text Domain For Translations
//add_action('init', 'pagenavi_textdomain');
function pagenavi_textdomain() {
	load_plugin_textdomain('wp-pagenavi', false, 'wp-pagenavi');
}


### Function: Page Navigation Option Menu
//add_action('admin_menu', 'pagenavi_menu');
function pagenavi_menu() {
	if (function_exists('add_options_page')) {
		add_options_page(__('PageNavi', 'wp-pagenavi'), __('PageNavi', 'wp-pagenavi'), 'manage_options', 'wp-pagenavi/pagenavi-options.php') ;
	}
}


### Function: Enqueue PageNavi Stylesheets
//add_action('wp_print_styles', 'pagenavi_stylesheets');
function pagenavi_stylesheets() {
	if(@file_exists(TEMPLATEPATH.'/pagenavi-css.css')) {
		wp_enqueue_style('wp-pagenavi', get_stylesheet_directory_uri().'/pagenavi-css.css', false, '2.50', 'all');
	} else {
		wp_enqueue_style('wp-pagenavi', plugins_url('wp-pagenavi/pagenavi-css.css'), false, '2.50', 'all');
	}	
}


### Function: Page Navigation: Boxed Style Paging
function wp_pagenavi($before = '', $after = '') {

    global $wpdb, $wp_query;

    pager_init(); //Calling the pager_init() function

	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$pager_options = get_option('pager_options');
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pager_options['num_pages']);
		$larger_page_to_show = intval($pager_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pager_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pager_options['always_show']) == 1) {
			//$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pager_options['pages_text']);
			//$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div id="pager"><ul id="postPagination">'."\n";
			switch(intval($pager_options['style'])) {
				case 1:
					if(!empty($pages_text)) {
						echo '<span class="pages">'.$pages_text.'</span>';
					}
						if ($start_page >= 2 && $pages_to_show < $max_page) {
							$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pager_options['first_text']);
							echo '<li><a href="'.clean_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'"><span>'.$first_page_text.'</span></a></li>';
							if(!empty($pager_options['dotleft_text'])) {
								echo '<li><a href="#"><span class="extend">'.$pager_options['dotleft_text'].'</span></a></li>';
							}
						}
					if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
						for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							echo '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
						}
					}
					//previous_posts_link($pager_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['current_text']);
							echo '<li class="current"><a href="#"><span>'.$current_page_text.'</span></a></li>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							echo '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
						}
					}
					//next_posts_link($pager_options['next_text'], $max_page);
//					if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
//						for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
//							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
//							echo '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
//						}
//					}
					if ($end_page < $max_page) {
						if(!empty($pager_options['dotright_text'])) {
							echo '<li><a href="#"><span class="extend">'.$pager_options['dotright_text'].'</span></a></li>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pager_options['last_text']);
						echo '<li><a href="'.clean_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'"><span>'.$last_page_text.'</span></a></li>';
					}
					break;
					case 2;
					echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['current_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
						}
					}
					echo "</select>\n";
					echo "</form>\n";
					break;
			}
			echo '</ul></div>'.$after."\n";
		}
	}
}


### Function: Page Navigation: Boxed Style Paging
function wp_pagenavi_return($before = '', $after = '') {

    global $wpdb, $wp_query;

	$pagerstring;
    pager_init(); //Calling the pager_init() function

	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$pager_options = get_option('pager_options');
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pager_options['num_pages']);
		$larger_page_to_show = intval($pager_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pager_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pager_options['always_show']) == 1) {
			//$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pager_options['pages_text']);
			//$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			$pagerstring.= $before.'<div id="pager"><ul id="postPagination">'."\n";
			switch(intval($pager_options['style'])) {
				case 1:
					if(!empty($pages_text)) {
						$pagerstring.= '<span class="pages">'.$pages_text.'</span>';
					}
						if ($start_page >= 2 && $pages_to_show < $max_page) {
							$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pager_options['first_text']);
							$pagerstring.= '<li><a href="'.clean_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'"><span>'.$first_page_text.'</span></a></li>';
							if(!empty($pager_options['dotleft_text'])) {
								$pagerstring.= '<li><a href="#"><span class="extend">'.$pager_options['dotleft_text'].'</span></a></li>';
							}
						}
					if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
						for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							$pagerstring.= '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
						}
					}
					//previous_posts_link($pager_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['current_text']);
							$pagerstring.= '<li class="current"><a href="#"><span>'.$current_page_text.'</span></a></li>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							$pagerstring.= '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
						}
					}
					//next_posts_link($pager_options['next_text'], $max_page);
//					if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
//						for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
//							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
//							$pagerstring.= '<li><a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'"><span>'.$page_text.'</span></a></li>';
//						}
//					}
					if ($end_page < $max_page) {
						if(!empty($pager_options['dotright_text'])) {
							$pagerstring.= '<li><a href="#"><span class="extend">'.$pager_options['dotright_text'].'</span></a></li>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pager_options['last_text']);
						$pagerstring.= '<li><a href="'.clean_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'"><span>'.$last_page_text.'</span></a></li>';
					}
					break;
					case 2;
					$pagerstring.= '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					$pagerstring.= '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['current_text']);
							$pagerstring.= '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pager_options['page_text']);
							$pagerstring.= '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
						}
					}
					$pagerstring.= "</select>\n";
					$pagerstring.= "</form>\n";
					break;
			}
			$pagerstring.= '</ul></div>'.$after."\n";
		}
	}
	return $pagerstring;
}

### Function: Round To The Nearest Value
function n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}

### Function: Page Navigation Options

function pager_init() {
	//pager_textdomain();
	// Add Options
	$pager_options = array();
	$pager_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wp-pager');
	$pager_options['current_text'] = '%PAGE_NUMBER%';
	$pager_options['page_text'] = '%PAGE_NUMBER%';
	$pager_options['first_text'] = __('&laquo; First','wp-pager');
	$pager_options['last_text'] = __('Last &raquo;','wp-pager');
	$pager_options['next_text'] = __('<li>&raquo;</li>','wp-pager');
	$pager_options['prev_text'] = __('<li>&laquo;</li>','wp-pager');
	$pager_options['dotright_text'] = __('...','wp-pager');
	$pager_options['dotleft_text'] = __('...','wp-pager');
	$pager_options['style'] = 1;
	$pager_options['num_pages'] = 30;
	$pager_options['always_show'] = 0;
	$pager_options['num_larger_page_numbers'] = 3;
	$pager_options['larger_page_numbers_multiple'] = 10;
	add_option('pager_options', $pager_options, 'pager Options');
}
?>