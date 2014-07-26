<?php get_header();?>
<!-- TOP IMAGE OR VIDEO -->
<?php if (have_posts()) : the_post();
 if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_top'):
 phi_post_image('large','','prettyPhoto'); endif;

 if (get_post_meta($post->ID,'phi_videooptions',true)== 'phi_full'):
 phi_video(get_post_meta($post->ID,'phi_videourl',true),'large','','','');
 endif;

 phi_breadcrumbs();
$sidebarposition = get_option('phi_sidebarposition'); // Get sidebar position from admin

 endif;

echo '<div id="content-default" class="content-'.$sidebarposition.'">';

									
								echo '<h1>'.get_option('phi_trans_404_header').'</h1>';
								echo '<p>'.get_option('phi_trans_404_message').'</p>';
									
			
echo '</div>';
get_sidebar();
get_footer();?>
