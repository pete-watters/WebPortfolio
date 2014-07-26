</div>
<!-- End content -->
</div>

<div id="footer">
			<?php if(get_option('phi_disable_smi')==false || get_option('phi_disable_search_footer')== false):?>
			<div class="module">
						<?php 
								if(get_option('phi_disable_smi')==false){
								include(TEMPLATEPATH.'/lib/includes/sociables.php');
								}
								?>
						<?php if (get_option('phi_disable_search_footer')== false):?>
						<form action="<?php echo site_url();?>" method="get" id="searchform_footer">
									<p>
												<input type="submit"  value="<?php _e('Search','itworx');?>" />
												<input type="text" value="" name="s"  class="cleardefault"/>
									</p>
						</form>
						<?php endif;?>
			</div>
			<?php endif;?>
			
			
			
			<?php if (get_option('phi_footer')==false):?>
			<div class="one-fourth">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 1')){};?>
			</div>
			<div class="one-fourth">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 2')){};?>
			</div>
			<div class="one-fourth">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 3')){};?>
			</div>
			<div class="one-fourth last">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 4')){};?>
			</div>
			<br class="break"/>
			<?php endif;?>
			<?php if(has_nav_menu('footer')):?>
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'footernav','link_before' => '<span>', 'link_after' => '</span>','menu_class' => '',  'theme_location' => 'footer'));?>
			<?php endif;?>
			<div id="footercredits"><?php echo get_option('phi_credits');?></div>
</div>
</div>

<?php wp_footer();?>
<?php echo get_option('phi_analytics');?>
</body></html>