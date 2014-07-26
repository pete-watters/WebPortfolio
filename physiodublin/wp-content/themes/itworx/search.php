<?php
 get_header();
phi_breadcrumbs();?>

<div id="content-default"  class="content-<?php echo $sidebarposition;?>">
			<!-- TOP IMAGE OR VIDEO -->
			<!-- Page content -->
			<?php 
									
									
									
									$pager = get_option(phi_blog_pager);
									
									$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$s = get_query_var('s');
	query_posts("s=$s&paged=$page&showposts=-1");
							
	if (have_posts()): while (have_posts()) : the_post(); 
									?>
									
			<div class="searchresult">
			
						<h3>
									<?php the_title();?>
						</h3>
						<?php 
						$customexcerpt = get_post_meta($post->ID,'phi_custom_excerpt',true);
															if(has_excerpt()){
															the_excerpt();
															}
															elseif($customexcerpt){
															echo '<p>'.$customexcerpt.'</p>';						
															}
															
															echo '<div style="float:left; clear:both; margin: 0 0 10px 0;"><a href="'.get_permalink().'">'.get_permalink(),'</a></div>';
															?>
						<a href="<?php the_permalink();?>" class="button"><?php echo get_option('phi_trans_readmore');?></a>
</div>
<?php
endwhile;
						endif;
						wp_pagenavi();	
						wp_reset_query();
						?>
								
			<!-- end page content -->
</div>
<?php get_sidebar();?>
<?php get_footer();?>
