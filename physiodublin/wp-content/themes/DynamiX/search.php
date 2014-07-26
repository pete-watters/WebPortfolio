<?php get_header(); 
/******************************************************************/
/*	Page Variables							      				  */
/******************************************************************/
$DYN_layout=get_option("arhlayout");
/******************************************************************/
/*	Page Variables *END*					      				  */
/******************************************************************/

?>


<?php if($DYN_hidecontent!="yes") { ?>

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
<?php if ( have_posts() ) : ?>
   
			<h2 class="pagetitle"><?php _e('Search Results For: ', 'DynamiX' ); ?> <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; echo '<span class="search-terms"> "'. $key .'</span>" ( '. $count . ' '. __('articles found','DynamiX'). ' )'; wp_reset_query(); ?></h2>

		<?php while (have_posts()) : the_post(); ?>
                
                <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?><?php echo $title; ?></a></h3>
                
		<?php endwhile; ?>                
<?php else : ?>

		<h2><?php _e('No posts found. Try a different search? ', 'DynamiX' ); ?></h2>

<?php endif; ?>                
			</div><!-- /content -->                    
		<div class="clear"></div>
<?php include(CWZ_FILES .'/inc/wp-pagenavi.php');

if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	</div><!-- /mid-wrap -->

<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>