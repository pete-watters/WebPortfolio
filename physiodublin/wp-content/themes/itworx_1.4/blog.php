<?php
/*
Template Name: Blog
*/

get_header();?>

<?php phi_breadcrumbs();?>
<?php load_theme_textdomain( 'itworx', TEMPLATEPATH . '/languages' );?>
<?php 
			
			$pager = get_option(phi_blog_pager);
			
			if(get_option('phi_blog_layout')=='fullwidth'){
			echo phi_blog('fullwidth',false, $pager);
			}
				
			if(get_option('phi_blog_layout')=='normal'){
			echo '<div class="content-default">';
			echo phi_blog('',false, $pager);
			echo '</div>';
			get_sidebar();
			}				
			?>
			

<?php get_footer();?>
