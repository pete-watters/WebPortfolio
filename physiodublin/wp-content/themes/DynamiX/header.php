<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(get_option('header_favicon')) { ?>
<link rel="shortcut icon" href="<?php echo get_option('header_favicon'); ?>" />
<?php } ?>
<title><?php if(is_front_page()) { bloginfo('name'); } else { wp_title( '', true, 'right' ); }?></title>

<?php
/***************************************************************/
/*	Call Custom Page Variables							   	   */
/***************************************************************/

if (have_posts()) : while (have_posts()) : the_post();
    $data = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true )); // Call custom page attributes  
endwhile; endif;

$show_slider = $data["gallery"];
$gallerycat=$data["gallerycat"];

require CWZ_FILES ."/inc/page-constants.php"; // Page Constants

/***************************************************************/
/*	Call Custom Page Variables *END*					   	   */
/***************************************************************/?>


<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head();

if(!$DYN_outskin) {if(DYN_OUTSKIN) {$DYN_outskin=DYN_OUTSKIN;} else {$DYN_outskin=$_SESSION['DYN_outskin'];}}
if(!$DYN_inskin) {if(DYN_INSKIN) {$DYN_inskin=DYN_INSKIN;} else {$DYN_inskin=$_SESSION['DYN_inskin'];}}

if($DYN_outskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/darkblue.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="three") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/blue.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="four" ) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/teal.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="five" ) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/green.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="six") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/mustard.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="seven") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/orange.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eight") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/red.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="nine") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/pink.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="ten") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/grey.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eleven") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/urban.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="twelve") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/carbon.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="thirteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/wood.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="fourteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/grunge.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="fithteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/bokeh.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="sixteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/teal-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="seventeen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/green-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eighteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/pink-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="nineteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/red-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="twenty") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/brown-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="custom") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/custom.css" type="text/css" media="screen" />
<?php } 

// BUDDYPRESS 

if(DYN_INSKIN!="one" && $DYN_inskin!="one") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/dark-content.css" type="text/css" media="screen" />
<?php wp_enqueue_style( 'buddypressdark', MY_THEME_URL . '/stylesheets/style-buddypress-dark.css', false, '0.1', 'screen' ); ?>
<?php } elseif($DYN_inskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/dark-content.css" type="text/css" media="screen" />
<?php wp_enqueue_style( 'buddypressdark', MY_THEME_URL . '/stylesheets/style-buddypress-dark.css', false, '0.1', 'screen' ); ?>
<?php } 

//**  IE / Opera Only Functions 
$a_browser_data = browser_detection('full');
if ( $a_browser_data[0] == 'ie' || $a_browser_data[0] == 'op') { 
if($a_browser_data[0] == 'op' && $a_browser_data[1]<"9.8" || $a_browser_data[0] == 'ie' && $a_browser_data[1]<"9" )   { // Opera 10.5 introduced CSS3
?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only.css" type="text/css" media="screen" />
<?php if(DYN_INSKIN!="one" && $DYN_inskin!="one") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_inskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only-dark.css" type="text/css" media="screen" />
<?php } ?>
<?php } ?>
<?php } ?>


<!--[if IE 6]>
<style type="text/css" media="screen">
  @import "<?php bloginfo('template_url'); ?>/stylesheets/ie6.css";
</style>
<![endif]-->

<!--[if IE 7]>
<style type="text/css" media="screen">
  @import "<?php bloginfo('template_url'); ?>/stylesheets/ie7.css";
</style>
<![endif]-->

<!--[if IE]> <style> .clearfix {display: inline-block;} /* Hides from IE-mac \*/ * html .clearfix {height: 1%;} .clearfix {display: block;} /* End hide from IE-mac */ </style> <![endif]-->

<?php if(get_option("cufon_font")) { // If a user defined font exists use it. ?> 
<script type="text/javascript" src="<?php echo get_option("cufon_font"); ?>"></script>
<?php } else { ?> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/js/Lucida_Sans_Unicode_400.font.js" defer></script>
<!--[if gte IE 9]>
Cufon.set('engine', 'canvas');
<![endif]-->
<?php } ?>

<script type='text/javascript'>
<?php 
if(TWITTERUSR!="" && $DYN_twitter!="none") { ?>
window.onload=function(){
 gettweets('<?php echo TWITTERUSR; ?>','<?php if(TWITTERNUM) {echo TWITTERNUM;} else { echo "5";} ?>');
}
<?php } ?>
</script>

<?php require CWZ_FILES ."/inc/cufon-replace.php"; // Cufon Font Replacement Script ?>

<!--[if lte IE 8]>
<style type="text/css">
.content-wrapper,.styledbox.general,.styledbox.help,.styledbox.information,.styledbox.warning,.styledbox.download,.columns.border,.gallery-wrap,div#object-nav.item-list-tabs,div#message {
    behavior: url(<?php bloginfo('template_directory'); ?>/lib/js/PIE.htc);
}
</style>
<![endif]-->

<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { $i_device=true; } // detect iPhone / iPad ?>

</head>
<body <?php body_class(); ?>>
<div><a id="top"></a></div>

<?php if(get_option('droppanel')!="none") { // Check if drop panel is enabled ?>
<!-- Drop Panel -->
<div id="toppanel">

<?php if(get_option('droppanel')!="disable") { // Check if drop panel is enabled ?>

	<div id="panel" style="<?php if(isset($_POST['TopFirstsubmitted']) || isset($_POST['TopSecondsubmitted']) || isset($_POST['TopThirdsubmitted']) || isset($_POST['TopFourthsubmitted'])) { ?>display:block;<?php if(isset($hasError) || isset($captchaError)) { ?>min-height:300px <?php } ?> <?php } ?>">
		<div class="content clearfix">
				
				<?php if(get_option('ftdrpwidget_enable')=="enable") { // Check to see if Droppanel / Footer widgets are enabled ?>

				<?php
				$get_droppanel_num 	=	(get_option('droppanel_columns_num')!="") 	? get_option('droppanel_columns_num') 	: '4'; // If not set, default to 4 columns
				
				$i=1;
				while($i<=$get_droppanel_num)
				{ ?>
				
				<div class="panel-wrap panel-columns-<?php echo $get_droppanel_num; ?> <?php if($i == $get_droppanel_num) { echo "last"; } ?>">
					<ul>
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Drop Panel Column '.$i)) : endif; ?>
					</ul>
				</div>
				
				<?php $i++;	} ?>

				<?php } else { ?>
        
				<div class="panel-wrap">
					<?php
				
                    $thiscol="TopFirst";
					
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
								
                    $thiscol="TopSecond";
                    			
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
			
                    $thiscol="TopThird";
                    				
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
				
                    $thiscol="TopFourth";
                  					
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
				<?php } ?>
		</div><!-- / content -->
	</div> <!-- / panel -->

<?php } ?>
    
    <div class="tab-wrap">
	<!-- The tab on top -->
	<div class="tab">
		<ul class="panelswitch">
			<li class="left"> </li>
			<!-- Login / Register -->
			<li id="toggle" <?php if(get_option('droppanel')!="disable") { ?>style="width:227px;"<?php } ?>>
				<div class="search-wrap">
					<form method="get" id="panelsearchform" action="<?php bloginfo('url'); ?>">
						<fieldset>
                        <input type="text" value="<?php _e('Search', 'DynamiX' ); ?>" name="s" id="drops" onFocus="if(this.value == '<?php _e('Search', 'DynamiX' ); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php _e('Search', 'DynamiX' ); ?>';}" />
						<input type="submit" id="panelsearchsubmit" value="&nbsp;" />
        				</fieldset>
                    </form>
				</div><!-- search-wrap end -->
                <?php if(get_option('droppanel')!="disable") { ?>
                <div class="trigger">
					<?php if(isset($_POST['TopFirstsubmitted']) || isset($_POST['TopSecondsubmitted']) || isset($_POST['TopThirdsubmitted']) || isset($_POST['TopFourthsubmitted'])) { ?> 
                    <a id="open" style="display: none;" class="toggle open" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="open panel" /></a>
                    <a id="close" class="toggle close" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="close panel" /></a>
                    <?php } else { ?>
                    <a id="open" class="toggle open" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="open panel" /></a>
                    <a id="close" style="display: none;" class="toggle close" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="close panel" /></a>
                    <?php } ?>
                </div><!-- /trigger -->
                <?php } ?>
			</li> <!-- / toggle -->
			<li class="right"> </li>
		</ul>
	</div> <!-- / top -->
    </div> <!-- / tab-wrap -->
</div> <!--/toppanel -->
<?php } ?>
<div id="wrapper" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="gallery3d" && is_page() || $show_slider=="galleryaccordion" && is_page()) { ?>gallery <?php } ?>">
	<div id="page" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="gallery3d" && is_page() || $show_slider=="galleryaccordion" && is_page()) { ?>gallery <?php } else { ?>pages <?php } ?>">
		<div id="header" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="galleryaccordion" && is_page() || $show_slider=="gallery3d" && $i_device==true) { ?>gallery <?php } elseif($show_slider=="gallery3d" && is_page() && $i_device!=true) {?>gallery3d <?php } else { ?>pages <?php } ?>">
        	<?php if(get_option('header_html')) { echo do_shortcode(get_option('header_html')); } ?>
			<div id="header-logo">
				<div id="logo">
<?php if(get_option("branding_url")) { // Is Branding Image Set ?>
					<a href="<?php echo get_option('home'); ?>/"><img src="<?php echo get_option("branding_url"); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
					<div class="description"><h2><?php bloginfo('description'); ?></h2></div>
						<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<?php } ?>
				</div>
				<div class="clear"></div>
			</div><!-- /header-logo -->
              
			<div id="tabs">
				<?php if(get_option('wpcustomm_enable')=="enable") { // WP3.0 Custom Menu Support
                
                $walker = new dyn_walker;
                wp_nav_menu(array('echo' => true,'container' => 'ul','menu_id' => 'dyndropmenu','theme_location' => 'mainnav','walker' => $walker	));?>
                <?php } else { ?>
                
				<ul id="dropmenu">
                <?php echo DYN_menupages(); ?>
					<li class="menubreak"></li>
				<?php if(get_option('droppanel')!="disable") { ?>
                <?php if(get_option('droptriggername')) { ?>
					<li class="page_item"><a href="#" class="droppaneltrigger" title="<?php echo get_option('droptriggername'); ?>"><?php echo get_option('droptriggername'); ?></a><span class="menudesc"><?php echo get_option('droptriggerdesc'); ?></span></li><li class="menubreak"></li>
                <?php } ?>
                <?php } ?>
				</ul>
				<?php } ?>
			</div><!-- /tabs -->
		</div><!-- /header -->

<?php



/***************************************************************/
/*	Stage Gallery        									   */
/***************************************************************/

if(is_page()) { 
	if($DYN_show_slider=="stageslider") {
	
		require CWZ_FILES ."/inc/gallery-stage.php"; // Group Slider Gallery
	
	}
}
/***************************************************************/
/*	Stage Gallery *END*   									   */
/***************************************************************/

/***************************************************************/
/*	Piecemaker Gallery 		   								   */
/***************************************************************/

if($i_device && $DYN_show_slider=="gallery3d") { // if iPad or iPhone
	if(is_page()) { 
		require CWZ_FILES ."/inc/gallery-stage.php"; // Group Slider Gallery
	}

} else {

	if(is_page()) { 
	
		if($DYN_show_slider=="gallery3d") { ?>
			<?php require CWZ_FILES .'/inc/gallery-piecemaker.php'; //
		}
	}

}

/***************************************************************/
/*	Piecemaker Gallery *END*   								   */
/***************************************************************/

/***************************************************************/
/*	Accordion Gallery 		   								   */
/***************************************************************/

if(is_page()) { 
	if($DYN_show_slider=="galleryaccordion") { ?>
		<?php require CWZ_FILES .'/inc/gallery-accordion.php';
	}
}

/***************************************************************/
/*	Accordion Gallery *END*   								   */
/***************************************************************/


/***************************************************************/
/*	Breadcrumbs			  									   */
/***************************************************************/

if(is_archive()) {
		if(get_option("archbreadcrumb")=="disable") {
		$DYN_hidebreadcrumbs="yes";
	}	else {
		$DYN_hidebreadcrumbs="";
	}
}

if (class_exists( 'BP_Core_User' ) ) {
if(!bp_is_blog_page()) {
	$DYN_hidebreadcrumbs="yes";
}
}

if(!$DYN_hidebreadcrumbs) {
?>

<div id="sub-header">
	<div id="sub-tabs">
		<ul>
<?php if (function_exists('DYN_breadcrumbs')) DYN_breadcrumbs(); ?>
		</ul>
	</div>
</div> 

<?php

}

/***************************************************************/
/*	Breadcrumbs *END*	  									   */
/***************************************************************/
?>

<div class="clear"></div>
	<div class="inner-page <?php if($DYN_show_slider=='stageslider' || $DYN_show_slider=='gallery3d') { ?>gallery<?php } ?>"><!-- inner page -->
<?php

/***************************************************************/
/*	Grid Gallery										   	   */
/***************************************************************/
	
if(is_page()) { 
if($DYN_show_slider=="gridgallery" && $DYN_groupsliderpos!="below") { ?>

<div class="gallerywrap grid-gallery top">

	<?php require CWZ_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery ?>

</div>
<?php } 
}

/***************************************************************/
/*	Grid Gallery *END*										   */
/***************************************************************/




/***************************************************************/
/*	Group Slider Gallery									   */
/***************************************************************/

if(is_page()) { 
if($DYN_show_slider=="groupslider" && $DYN_groupsliderpos!="below") { ?>

<div class="gallery-slider top">

	<?php require CWZ_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery ?>

</div>

<?php }
}

/***************************************************************/
/*	Group Slider Gallery *END*   							   */
/***************************************************************/


/***************************************************************/
/*	Call Twiiter         									   */
/***************************************************************/

if($DYN_twitter=="pagetop") { ?>

<div class="twitter-wrap top">

	<?php require CWZ_FILES .'/inc/twitter.php'; // Call Twitter Template ?>

</div>

<?php }

/***************************************************************/
/*	Call Twiiter *END*    									   */
/***************************************************************/

?>

<?php if($DYN_hidecontent!="yes") { ?>
<?php 
if(is_archive()) {
		if(get_option("archcontentborder")=="disable") {
		$DYN_contentborder="yes";
	} else {
		$DYN_contentborder="no";
	}
} 

if (class_exists( 'BP_Core_User' ) ) {
if(!bp_is_blog_page()) {
		if(get_option("buddycontentborder")=="disable") {
		$DYN_contentborder="yes";
	} else {
		$DYN_contentborder="no";
	}
}
}
?>
<div <?php if($DYN_contentborder!="yes") { ?>class="content-wrapper"<?php } ?>>
	<div class="content-wrapper-inner">
    
<?php } ?>
