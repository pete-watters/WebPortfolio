

<?php $sidebarposition = get_option('phi_sidebarposition'); // Get sidebar position from admin?>

<div class="sidebar sidebar-<?php echo $sidebarposition;?>">
<span class="sidebar-top"></span>
<div class="sidebar-inner">
					
					<?php 
					global $post;
					$selectsidebar = get_post_meta($post->ID,'phi_selectsidebar',true);
					
					if(is_home()){if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Sidebar')){};}
					
					elseif(is_page_template('blog.php') || is_archive() || is_category() || is_search() || is_tag()){if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')){};}
			
					elseif(is_page()){
					
							//if($selectsidebar == 'phi_bar_1'){if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 1')){}; }
							if($selectsidebar == 'phi_bar_2') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 2')){}; }
							elseif($selectsidebar == 'phi_bar_3') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 3')){}; }				  
							elseif($selectsidebar == 'phi_bar_4') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 4')){}; }
							elseif($selectsidebar == 'phi_bar_5') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 5')){}; }
							elseif($selectsidebar == 'phi_bar_6') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 6')){}; }
							elseif($selectsidebar == 'phi_bar_7') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 7')){}; }
							elseif($selectsidebar == 'phi_bar_8') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 8')){}; }
							elseif($selectsidebar == 'phi_bar_9') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 9')){}; }
							elseif($selectsidebar == 'phi_bar_10'){ if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 10')){};}
							else{ if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 1')){};}
							
					}
					elseif(is_single()){
							if($selectsidebar == 'blog'){if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')){}; }
							elseif($selectsidebar == 'phi_bar_1'){if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 1')){}; }
							elseif($selectsidebar == 'phi_bar_2') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 2')){}; }
							elseif($selectsidebar == 'phi_bar_3') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 3')){}; }				  
							elseif($selectsidebar == 'phi_bar_4') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 4')){}; }
							elseif($selectsidebar == 'phi_bar_5') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 5')){}; }
							elseif($selectsidebar == 'phi_bar_6') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 6')){}; }
							elseif($selectsidebar == 'phi_bar_7') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 7')){}; }
							elseif($selectsidebar == 'phi_bar_8') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 8')){}; }
							elseif($selectsidebar == 'phi_bar_9') { if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 9')){}; }
							elseif($selectsidebar == 'phi_bar_10'){ if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 10')){};}
							else{ if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar)')){};}
							
					}
					
					else{
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')){};
					}
			?>
			</div>
	<span class="sidebar-bottom"></span>
</div>






