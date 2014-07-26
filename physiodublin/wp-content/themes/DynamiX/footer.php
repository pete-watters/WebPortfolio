<?php
/***************************************************************/
/*	Call Custom Page Variables							   	   */
/***************************************************************/

require CWZ_FILES ."/inc/page-constants.php"; // Group Slider Gallery


/***************************************************************/
/*	Call Custom Page Variables *END*					   	   */
/***************************************************************/
?>

<?php if($DYN_hidecontent!="yes") { ?>

<div class="clear"></div>
</div><!-- /content-wrapper-inner -->
</div><!-- /content-wrapper -->

<?php
/***************************************************************/
/*	Call Twiiter         									   */
/***************************************************************/

if($DYN_twitter=="pagebot") { ?>

<div class="twitter-wrap bottom">

	<?php require CWZ_FILES .'/inc/twitter.php'; // Call Twitter Template ?>

</div>

<?php }

/***************************************************************/
/*	Call Twiiter *END*    									   */
/***************************************************************/
?>



<?php
/***************************************************************/
/*	Group Slider Gallery									   */
/***************************************************************/

if($DYN_show_slider=="groupslider" && $DYN_groupsliderpos=="below") { ?>

<div class="gallery-slider bottom">

	<?php require CWZ_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery ?>

</div>

<?php } 

/***************************************************************/
/*	Group Slider Gallery *END*   							   */
/***************************************************************/


/***************************************************************/
/*	Grid Gallery										   	   */
/***************************************************************/
	

if($DYN_show_slider=="gridgallery" && $DYN_groupsliderpos=="below") { ?>

<div class="gallerywrap grid-gallery bottom">

	<?php require CWZ_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery ?>

</div>

<?php }

/***************************************************************/
/*	Grid Gallery *END*										   */
/***************************************************************/


} // Hide Content *END* 

?>


<div class="clear"></div>
</div><!-- /inner-page -->
</div><!-- /page -->
<div class="push"></div>
</div><!-- /wrapper -->
<div class="clear"></div>
<div id="footer-header"></div>
	<div id="footer-wrap" class="clearfix">
		<div id="footer-wrap-inner" class="clearfix">
			<div id="footer" class="clearfix">
<!-- I would like to give a great thankyou to WordPress for their amazing platform -->
				<?php if(get_option('ftdrpwidget_enable')=="enable") { // Check to see if Droppanel / Footer widgets are enabled ?>

				<?php
				$get_footer_num 	=	(get_option('footer_columns_num')!="") 	? get_option('footer_columns_num') 	: '4'; // If not set, default to 4 columns
				
				$i=1;
				while($i<=$get_footer_num)
				{ ?>
				
				<div class="panel-wrap panel-columns-<?php echo $get_footer_num; ?> <?php if($i == $get_footer_num) { echo "last"; } ?>">
					<ul>
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column '.$i)) : endif; ?>
					</ul>
				</div>
				
				<?php $i++;	} ?>

				<?php } else { ?>
        
				<div class="panel-wrap">
					<?php
				
                    $thiscol="BotFirst";
					
						if(get_option($thiscol.'select')==$thiscol."-1" || get_option($thiscol.'select')=="") {  // ********* Default Option ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?php	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>

				</div><!-- / panel-wrap -->
				<div class="panel-wrap">
					<?php
								
                    $thiscol="BotSecond";
                    			
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?php	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
				</div><!-- / panel-wrap -->
				<div class="panel-wrap">
					<?php
			
                    $thiscol="BotThird";
                    				
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5" || get_option($thiscol.'select')=="") {  // ********* Default Option ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
				</div><!-- / panel-wrap -->
				<div class="panel-wrap last">
					<?php
				
                    $thiscol="BotFourth";
                  					
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?php	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
						
				</div><!-- / panel-wrap -->
				<?php } global $DYN_imgheight; ?>
			</div><!-- / footer -->
		</div><!-- / footer-wrap-inner -->
	</div><!-- / footer-wrap -->
    
<?php if(get_option('lowerfooter')!="disable") {  // Check for enabled lower footer ?>
<div class="lowerfooter-wrap clearfix">
	<div class="lowerfooter">
		<div class="lowfooterleft"><?php if(get_option('lowfooterleft')) { echo get_option('lowfooterleft'); } else { echo "&copy; ". date("Y") ." ".get_option("blogname"); } ?></div>
		<div class="lowfooterright"><?php if(get_option('lowfooterright')) { echo get_option('lowfooterright'); } else { echo "Powered By <a href=\"http://themeforest.net/item/dynamix-premium-wordpress-theme/113901?ref=cwz000\" title=\"Buy Dynamix Theme\" target=\"_blank\">DynamiX</a>"; } ?></div>
    </div><!-- / lowerfooter -->		
</div><!-- / lowerfooter-wrap -->
<?php } ?>

<!-- Another Great Website Design by Creative Workz - http://www.creativeworkz.co.uk -->



<?php wp_footer(); ?>

<script type="text/javascript"> 
<!--
(function ($) {
$(document).ready(function() {
Cufon.now();

$('.post-grid.archive .galleryimg,.accordion-gallery .galleryimg').append('<div class="hoverimg" style="height:100%"></div>');	
$('.post-grid.archive .galleryvid,.accordion-gallery .galleryvid').append('<div class="hovervid" style="height:100%"></div>');	
$('.archiveimg-wrap .galleryimg').append('<div class="hoverimg" style="height:100%"></div>');	
$('.archiveimg-wrap .galleryvid').append('<div class="hovervid" style="height:100%"></div>');	
$('.container .galleryimg').append('<div class="hoverimg" style="height:inherit"></div>');	
$('.container .galleryvid').append('<div class="hovervid" style="height:inherit"></div>');	

<?php $a_browser_data = browser_detection('full'); // Detect Browser
if($a_browser_data[1]=="6.0" && $a_browser_data[0]=="ie") { // If IE6 - do nothing ?> 
<?php } else { ?>
			$("a[rel^='prettyPhoto']").prettyPhoto({
			keyboard_shortcuts: false,
			social_tools:false,
			theme: 'light_rounded'
			});
<?php } ?>

$("img.reflect").reflect({height:35,opacity:0.2});
if(navigator.appName != "Microsoft Internet Explorer") {
$("#item-body img.avatar, #members-directory-form img.avatar, #item-header-avatar img.avatar, .avatar-block img.avatar").reflect({height:35,opacity:0.2});
}

$('.target_blank a').each(function() {
       $(this).click(function(event) {
           event.preventDefault();
           event.stopPropagation();
           window.open(this.href, '_blank');
       });
});

});
})(jQuery);
//-->
</script>
</body>
</html>