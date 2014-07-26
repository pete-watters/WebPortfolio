<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/***************************************************************/
/*	Call Custom Page Variables							   	   */
/***************************************************************/

if(!is_search()) {
require CWZ_FILES ."/inc/page-constants.php"; // Get constants
}


// Check if BuddyPress page
if (class_exists( 'BP_Core_User' ) ) {
if(!bp_is_blog_page()) {
$DYN_layout=get_option("buddylayout"); 
$DYN_sidebar_one_select=get_option("buddycolone");
$DYN_sidebar_two_select=get_option("buddycoltwo");
$DYN_sidebar_one_borders=get_option("buddycolone_border");
$DYN_sidebar_two_borders=get_option("buddycoltwo_border");
}
}

// If not singular use default config.

if(!is_page()) {
if(!is_singular()) {
$DYN_layout=get_option("arhlayout"); 
$DYN_sidebar_one_select=get_option("archcolone");
$DYN_sidebar_two_select=get_option("archcoltwo");
$DYN_sidebar_one_borders=get_option("archcolone_border");
$DYN_sidebar_two_borders=get_option("archcoltwo_border");
}
}

// If is singular but no layout config, use default.
if(!is_page()) {
if(!$DYN_layout) {
$DYN_layout=get_option("arhlayout"); 
}
if(!$DYN_sidebar_one_select) {
$DYN_sidebar_one_select=get_option("archcolone");
}
if(!$DYN_sidebar_two_select) {
$DYN_sidebar_two_select=get_option("archcoltwo");
}
}

global $DYN_layout_force;

if($DYN_layout_force) {
	$DYN_layout="layout_four";
}

/***************************************************************/
/*	Call Custom Page Variables *END*					   	   */
/***************************************************************/
?>

<?php if($DYN_layout=="layout_six" || $DYN_layout=="layout_two" || $DYN_layout=="layout_three" ) { ?>
		
        <div class="side-wrap left out-quarter">

<?php if($DYN_sidebar_one_borders=="sidebarwrap" || $DYN_sidebar_one_borders=="") {?> 

            <div class="border-wrap left in-full border bottom">
                <div class="border-inner border">
                    <div class="sidebar-content out-full border top">
                    <ul>
                    <?php
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_one_select)) : ?>
                    <?php endif; ?>
                    </ul>
                    </div>
                </div>
            </div>
    
         <?php } else { ?>
    
            <div class="no-border-wrap left in-full">
                <div class="sidebar-content">
                    <ul>
                    <?php
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_one_select)) : ?>
                    <?php endif; ?>	
                    </ul>
                </div>
            </div>
    
         <?php } ?>
     
		</div><!-- /side-wrap -->

<?php if($DYN_layout=="layout_three") { ?>     

        <div class="side-wrap left out-quarter">
     
     <?php if($DYN_sidebar_two_borders=="sidebarwrap" || $DYN_sidebar_two_borders=="") {?> 

            <div class="border-wrap left in-full border bottom">            
                <div class="border-inner border">
                    <div class="sidebar-content out-full border top">
                        <ul>
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_two_select)) : ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>    
                <div class="clear"></div>
            </div>
         
         <?php } else {?> 

         
            <div class="no-border-wrap left in-full">
                <div class="sidebar-content">
                    <ul>
                    <?php
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_two_select)) : ?>
                    <?php endif; ?>	
                    </ul>
                </div>
            </div>

    
     <?php } ?>

		</div><!-- /side-wrap -->     

<?php } ?>     
<?php } ?>	

<?php if($DYN_layout!="layout_one") { ?>
	
    <?php if($DYN_layout!="layout_two" && $DYN_layout!="layout_three" && $DYN_layout!="layout_six" ) { ?>

    <div class="side-wrap <?php 

		if($DYN_layout=="layout_four") { ?> right out-quarter  <?php }
		
		elseif($DYN_layout=="layout_five") { ?> left out-quarter  <?php }
		
		elseif($DYN_layout=="layout_six") { ?> left out-quarter  <?php }
		
		else { ?> right out-quarter  <?php }
	
	?>">
    
        
     <?php if($DYN_sidebar_one_borders=="sidebarwrap" || $DYN_sidebar_one_borders=="") {?> 

         
            <div class="border-wrap <?php if($DYN_layout=="layout_six") {?> left <?php } else { ?> right <?php }?> in-full border bottom">
                <div class="border-inner border">
                    <div class="sidebar-content out-full border top">
                        <ul>
                        <?php
						if($DYN_sidebar_one_select=="") { $DYN_sidebar_one_select="sidebar1"; } // If a sidebar is not specified
						
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_one_select)) :
                        endif;
						?>
                        </ul>
                    </div>
                </div>
            </div>
         
         <?php } else {?> 
         
            <div class="no-border-wrap <?php if($DYN_layout=="layout_six") {?> left <?php } else { ?> right <?php }?> in-full">
                <div class="sidebar-content">
                    <ul>
                       <?php
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_one_select)) : ?>
                       <?php endif; ?>	
                    </ul>
                </div>
            </div>
        
     <?php } ?>
    
		</div><!-- /side-wrap -->
     
     <?php } ?>
     
	<?php if($DYN_layout=="layout_five" || $DYN_layout=="layout_six") { ?>
     
		<div class="side-wrap <?php 

		if($DYN_layout=="layout_four") { ?> left out-half  <?php }
		
		elseif($DYN_layout=="layout_five") { ?> right out-quarter  <?php }
		
		elseif($DYN_layout=="layout_six") { ?> right out-quarter  <?php }
        
	?>">
       	
		<?php if($DYN_sidebar_two_borders=="sidebarwrap" || $DYN_sidebar_two_borders=="") {?> 
     
            <div class="border-wrap <?php if(!$DYN_layout=="layout_two" || $DYN_layout=="layout_three") {?> left <?php } else { ?> right <?php }?> in-full border bottom">
                <div class="border-inner border">
                    <div class="sidebar-content out-full border top">
                        <ul>
                        <?php
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_two_select)) : // Each sidebar name ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
     
		<?php } else {?> 
     
            <div class="no-border-wrap <?php if(!$DYN_layout=="layout_two" || $DYN_layout=="layout_three") {?> left <?php } else { ?> right <?php }?> in-full">
                <div class="sidebar-content">
                   <ul>
                   <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($DYN_sidebar_two_select)) : // Each sidebar name ?>
                   <?php endif; ?>
                   </ul>	
                </div>
            </div>
     <?php } ?>

		</div><!-- /side-wrap -->
	<?php } ?>
   
<?php } ?>
