<?php get_header();?>
<!-- TOP IMAGE OR VIDEO -->
<?php if (have_posts()) : the_post();

 if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_top'):
 phi_post_image('large','','prettyPhoto'); endif;

 if (get_post_meta($post->ID,'phi_videooptions',true)== 'phi_full'):
	$videoargs = array('size' => "large");
	 echo phi_video($videoargs);
 endif;

phi_breadcrumbs();

if(get_post_meta($post->ID,'phi_fullwidth_post',true)==false){
$sidebarposition = get_option('phi_sidebarposition'); // Get sidebar position from admin
echo '<div id="content-default" class="content-'.$sidebarposition.'">';
}

									
									// Post video medium
									
									if(get_post_meta($post->ID,'phi_videooptions',true)== 'phi_medium'){
										$videoargs = array('size' => "medium");
										 echo phi_video($videoargs);
									}
																										
									// Post image medium
									
										if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_content'){
											phi_post_image('post','','prettyPhoto'); 
											}
									
									echo '<h1>'.get_the_title().'</h1>';
									the_content();
									edit_post_link(get_option('phi_trans_edit'), '<p>', '</p>');									
									wp_pagenavi(); 
									
									//comments_template();
									
if(get_post_meta($post->ID,'phi_fullwidth_post',true)==false){			
echo '</div>';
}
endif; 

if(get_post_meta($post->ID,'phi_fullwidth_post',true)==false){	
get_sidebar();
}
get_footer();?>

