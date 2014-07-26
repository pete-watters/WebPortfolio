<?php get_header();

// SLIDESHOW MODULE
$slideTerm = get_option('phi_home_slideshow_category');

if(get_option('phi_home_slideshow_type') == 'cycle'){
	echo phi_cycle_slider($slideTerm,'fullwidth');
}

if(get_option('phi_home_slideshow_type') == 'accordion'){
	echo phi_accordion_slider($slideTerm);
}

if(get_option('phi_home_slideshow_type') == 'nivo'){
	echo phi_nivo_slider($slideTerm,'fullwidth');
}

// HOME PAGE WIDGET 1
if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Page Widget 1')){};


// HOME PAGE TAB PANEL

	if(get_option('phi_home_tabs')==true){
	$querystr = "
	 SELECT wposts.*
	 FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	 WHERE wposts.ID = wpostmeta.post_id 
	 AND wpostmeta.meta_key = 'phi_tab_page'
	 AND wposts.post_status = 'publish' 
	 AND wposts.post_type = 'page' 
	 ORDER BY wposts.menu_order  ASC
	";						
	
	$pageposts = $wpdb->get_results($querystr, OBJECT);

	phi_home_tabs($pageposts);
	}

// HOME PAGE ARTICLES
if(get_option('phi_display_home_article_1')==true || get_option('phi_display_home_article_2')==true){
	echo '<div class="module no-padding" id="phi_home_article">';
}
	
if(get_option('phi_display_home_article_1') == true  && get_option('phi_home_article_1')!= false){
phi_home_article();
}

if(get_option('phi_display_home_article_2') == true && get_option('phi_home_article_2')!= false){
phi_home_article2();
}

if(get_option('phi_display_home_article_1') == true || get_option('phi_display_home_article_2')==true){
	echo '</div>';
}



// HOME PAGE WIDGET 2
if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Page Widget 2')){};
	
	
// HOME PAGE FEATURED PAGES
if (get_option('phi_home_featured')==true){
	
	$querystr = "
	 SELECT wposts.*
	 FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	 WHERE wposts.ID = wpostmeta.post_id 
	 AND wpostmeta.meta_key = 'phi_home_article'
	 AND wposts.post_status = 'publish' 
	 AND wposts.post_type = 'page' 
	 ORDER BY wposts.menu_order  ASC
	";						
	
	$pageposts = $wpdb->get_results($querystr, OBJECT);
	
	
	
	phi_featured_pages($pageposts);
	echo '<!-- dfsaf--><br class="break" />';
	}
	
// HOME PAGE WIDGET 3
if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Page Widget 3')){};


// HOME PAGE BLOG POSTS
if (get_option('phi_home_blog')== true):

echo '<div class="module no-border" id="home_blog">';

if(get_option('phi_home_blog_header')!=""){
	
	echo '<h3 class="diagonal"><span>'.get_option('phi_home_blog_header').'</span></h3>';
}
		$pager = get_option('phi_home_blog_pager');

					if(get_option('phi_home_blog_layout')=='fullwidth'){
					echo phi_blog('fullwidth',false, $pager );
					}
							
					if(get_option('phi_home_blog_layout')=='normal'){
					echo '<div id="content-default">';
					echo phi_blog('',false, $pager);
					echo '</div>';
					get_sidebar();
					}
echo '</div>';
endif;


// HOME PAGE WIDGET 4
if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Page Widget 4')){};


get_footer();?>
