<?php 
/*
Template Name: Full width page
*/

get_header();

phi_breadcrumbs();

if (have_posts()) : while (have_posts()) : the_post();

		
			if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_top'):
			phi_post_image('top','post'); 
			endif;

			if (get_post_meta($post->ID,'phi_videooptions',true)== 'phi_full'):
			$videoargs = array('size' => 'large');
			echo phi_video($videoargs);
			endif;
			
	

// Post video medium
if(get_post_meta($post->ID,'phi_videooptions',true)== 'phi_medium'){
	$videoargs = array('size' => 'medium');
	 echo phi_video($videoargs);
}
// Post image medium
if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_content'){
	phi_post_image('content','post',''); 
	}


echo '<h1>'.get_the_title().'</h1>';
the_content();
edit_post_link(get_option('phi_trans_edit'), '<p class="edit_link">', '</p>');
endwhile; 
endif; 
 
get_footer();?>