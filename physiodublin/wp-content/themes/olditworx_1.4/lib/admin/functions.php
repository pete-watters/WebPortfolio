<?php

$myterms = get_terms('phiportfoliocats');
$phi_getTerms = array();
foreach ($myterms as $term_list) {
	$phi_getTerms [$term_list->term_id] = $term_list->name;
	
	}

$categories = get_categories(array('hide_empty'=>false));
$phi_getcat = array();
foreach ($categories as $category_list ) {
       $phi_getcat[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages();
$phi_getpages = array();
foreach ($pages as $page_list ) {
       $phi_getpages[$page_list ->ID] = $page_list ->post_title;
}

$pages_top_level = get_pages('sort_column=menu_order&depth=0');
$phi_gettoplevelpages = array();
foreach ($pages_top_level as $page_list ) {
	if ($page_list->post_parent == "0") {
       $phi_gettoplevelpages[$page_list ->ID] = $page_list ->post_title;
	}
}


$styles = array();
if(is_dir(TEMPLATEPATH . "/styles/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/styles/")) {
		while(($style = readdir($open_dirs)) !== false) {
			if(stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}
$style_dropdown = array_unshift($styles, "Choose a colour scheme:");
?>