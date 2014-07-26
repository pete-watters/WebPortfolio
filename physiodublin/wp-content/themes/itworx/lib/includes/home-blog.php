<?php	
global $post;


	$query_string ="showposts=$pager&paged=$paged";
	query_posts($query_string);


if (have_posts()): while (have_posts()) : the_post(); 

global $post;
global $more;    // Declare global $more (before the loop).
$more = 0; 
?>


<div class="post">
<div class="post-date">
	<?php if($hidepublishdate == false):?>
									<?php echo get_option('phi_trans_postedon');?>
									<?php the_time('m/d/Y');?>
	<?php endif;?>
	</div>
	

<h2>
			<?php the_title();?>
</h2>


						
			<div class="post-image">
						<?php 
															
															if (get_post_meta($post->ID,'phi_blog_video',true)){
															phi_video(get_post_meta($post->ID,'phi_videourl',true),'medium','','','');
															}
															
															else{																
																phi_post_image('blog','','permalink');
																}
																				
															?>
			</div>
			<div class="post-info">
						
						<?php if($usecontent == false):?>
						<?php the_excerpt();?>
						<?php else:?>
						<?php the_content('');?>
						<?php endif;?>
						<a href="<?php the_permalink();?>" class="button"><?php echo get_option('phi_trans_readmore');?></a> 
			
			
			</div>
			
			<div class="meta">
								
									<?php if($hideauthor == false):?>
									<?php echo get_option('phi_trans_postedby');?>
									<?php the_author();?>
									<?php endif;?>
									<?php if($hidecategories == false):?>
									<?php echo get_option('phi_trans_incategory');?>
									<?php the_category('  |  ') ?>
									<?php endif;?>
			
									<div class="post-comments">
												<?php if ( comments_open() ) : ?>
												<?php comments_popup_link ( '0 '.get_option('phi_trans_responses'), '1 '.get_option('phi_trans_response'), '% '.get_option('phi_trans_responses'), '', '')?>
												<?php endif; ?>
									</div>
			
			</div>
</div>

<?php 
						
						endwhile;
						endif;
						wp_pagenavi();	
						wp_reset_query();?>
