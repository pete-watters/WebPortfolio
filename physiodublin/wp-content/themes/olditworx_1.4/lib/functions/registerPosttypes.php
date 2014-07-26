<?php
/**********************************
 SETUP CUSTOM POST TYPES
**********************************/

// PORTFOLIO
function phi_post_type_portfolio() {
	register_post_type('phiportfolio', 
				array(
				'label' => __('Portfolio'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "portfolio-post"), // Permalinks
				'query_var' => "phiportfolio", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'comments','excerpt','custom-fields'),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
}	
	
				register_taxonomy("phiportfoliocats", 
				array("phiportfolio"), 
				array("hierarchical" => true, 
						"label" => "Portfolio Categories", 
						"singular_label" => "Category",
						"rewrite" => true,
						"show_ui" => true
					)
				);
	
add_action('init', 'phi_post_type_portfolio');


// SLIDESHOW POST TYPE
function phi_post_type_slide() {
	register_post_type('slide', 
				array(
				'label' => __('Slides'),
				'singular_label' => __('Slide'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "slide"), // Permalinks
				'query_var' => "phislide", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail','excerpt'),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
	
	
}

register_taxonomy("slidecategory", 
				array("slide"), 
				array("hierarchical" => true, 
						"label" => "Slideshow Categories", 
						"singular_label" => "Slideshow Category",
						"rewrite" => true,
						"show_ui" => true,));

add_action('init', 'phi_post_type_slide');


// TESTIMONIAL POST TYPE
function phi_post_type_testimonial() {
	register_post_type('testimonial', 
				array(
				'label' => __('Testimonials'),
				'singular_label' => __('Testimonial'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "testimonial-post"), // Permalinks
				'query_var' => "testimonial", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor', 'excerpt' ,'custom-fields'),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
}
add_action('init', 'phi_post_type_testimonial');

// NEWS POST TYPE
function phi_post_type_news() {
	register_post_type('news', 
				array(
				'label' => __('News'),
				'singular_label' => __('News'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "news-post"), // Permalinks
				'query_var' => "news", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor', 'excerpt' ,'custom-fields'),
				'menu_position' => 6,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
}
add_action('init', 'phi_post_type_news');

// FAQ POST TYPE 
function phi_post_type_faq() {
	register_post_type('faq', 
				array(
				'label' => __('FAQ'),
				'singular_label' => __('FAQ'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "faq"), // Permalinks
				'query_var' => "faq", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'excerpt'/*,'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));

	register_taxonomy("faq_categories", 
				array("faq"), 
				array("hierarchical" => true, 
						"label" => "FAQ Categories", 
						"singular_label" => "FAQ Category",
						"rewrite" => true,
						"show_ui" => true,));
}
add_action('init', 'phi_post_type_faq');

// EVENTS POST TYPE
function phi_post_type_events() {
	register_post_type('events', 
				array(
				'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
                'add_new' => __( 'Add New Event' ),
                'add_new_item' => __( 'Add New Event' ),
                'edit_item' => __( 'Edit Event' ),
                'new_item' => __( 'Add New Event' ),
                'view_item' => __( 'View Event' ),
                'search_items' => __( 'Search Event' ),
                'not_found' => __( 'No events found' ),
                'not_found_in_trash' => __( 'No events found in trash' )
            ),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "events-post"), // Permalinks
				'query_var' => "event", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'excerpt'/*,'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				//'menu_icon' => get_bloginfo('stylesheet_directory') . '/images/calendar-icon.gif',  // Icon Path
				'menu_position' => '5',
				'register_meta_box_cb' => 'add_events_metaboxes'
				));

	register_taxonomy("events_categories", 
				array("events"), 
				array("hierarchical" => false, 
						"label" => "Event tags", 
						"singular_label" => "Event tag",
						"rewrite" => true,
						"show_ui" => true,));
	}
add_action('init', 'phi_post_type_events');

?>