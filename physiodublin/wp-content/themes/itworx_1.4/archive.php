<?php get_header();?>


			<?php phi_breadcrumbs();?>

<?php
					while (have_posts()) : the_post();
						
					echo '<h1>';
					
					if(is_tag()):
					
					_e('Tag:','itworx');
					single_tag_title();
						
					elseif(is_category()):
					single_cat_title(); 
					elseif(is_archive()):
					$prefix = ' '; echo single_month_title( $prefix, $display ); 
					elseif(is_search()):
					_e('Searchresult for','itworx');
					$allsearch = &new WP_Query("s=$s&showposts=-1"); 
					$key = esc_html($s, 1); 
					$count = $allsearch->post_count;
					echo $key; 
					_e(' - ','itworx'); 
					echo $count . ' '; 
					_e('articles','itworx'); 
					wp_reset_query(); 
					endif;
					echo '</h1>';
					
					
					endwhile;
					
					$pager = get_option(phi_blog_pager);
					query_posts($query_string."&posts_per_page=$pager");
					
					if(get_option('phi_blog_layout')=='fullwidth'){
					echo phi_blog('fullwidth',true, $pager);
					}
							
					if(get_option('phi_blog_layout')=='normal'){
					echo '<div id="content-default">';
					echo phi_blog('',true, $pager);
					echo '</div>';
					get_sidebar();
					}				
					?>
<?php get_footer();?>
