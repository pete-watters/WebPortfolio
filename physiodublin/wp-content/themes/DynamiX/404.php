<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
*/

/******************************************************************/
/*	Page Variables							      				  */
/******************************************************************/
$DYN_layout=get_option("arhlayout");
/******************************************************************/
/*	Page Variables *END*					      				  */
/******************************************************************/
?>
<?php get_header(); ?>

<?php if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") { 

	get_sidebar(); 

} ?>

    <div class="mid-wrap <?php 

		if($DYN_layout=="layout_one") { ?> left out-full  <?php } 
		
		elseif($DYN_layout=="layout_two") { ?> right out-threequarter  <?php }
		
		elseif($DYN_layout=="layout_three") { ?> right out-half  <?php }
		
		elseif($DYN_layout=="layout_four") { ?> left out-threequarter  <?php }
		
		elseif($DYN_layout=="layout_five") { ?> left out-half  <?php }
		
		elseif($DYN_layout=="layout_six") { ?> left out-half  <?php }
		
		else { ?> left out-threequarter  <?php }
	
	?>">
 
		<div id="content">    
   
			<h2 class="pagetitle"><?php _e("We're sorry but that page could not be found.", 'DynamiX' ); ?></h2>
                <div class="list arrow white">
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>                         
		</div><!-- /content -->                    
		<div class="clear"></div>

	</div><!-- /mid-wrap -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>