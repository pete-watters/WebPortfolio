<?php

$wp_include = "../wp-load.php";
$i = 0;
while (!file_exists($wp_include) && $i++ < 10) {
  $wp_include = "../$wp_include";
}

// let's load WordPress
require($wp_include);

if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MODULES AND ELEMENTS</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymceModules/tinymce.js"></script>
<style type="text/css">
fieldset { margin:16px 0; padding:10px; }
legend, label, select, input[type=text] { font-size:11px; }
select, input[type=text] { line-height:24px; height:24px; float:left; width:300px }
</style>
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');">
<form name="phi_modules" action="#">
			<!-- style_panel -->
			<fieldset>
						<legend>Modules and elements</legend>
						<select id="module_shortcode" name="module_shortcode">
									<optgroup label="Modules">
									<option value="newslist">News list</option>
									<option value="newsarchive">News archive</option>
									<option value="testimonials">Testimonials</option>
									<option value="events">Events list</option>
									<option value="faq">Faq module</option>
									</optgroup>
									
									<optgroup label="Buttons, tabs and toggels">
									<option value="boxheader">Boxed title</option>
									<option value="button">Small button</option>
									<option value="button_light">Snall button - Light</option>
									<option value="button_dark">Small button - Dark</option>
									<option value="button_medium">Medium button</option>
									<option value="button_medium_light">Medium button - Light</option>
									<option value="button_medium_dark">Medium button - Dark</option>
									<option value="button_large">Large button</option>
									<option value="button_large_light">Large button - Light</option>
									<option value="button_large_dark">Large button - Dark</option>
									<option value="toggle_single">Toggle button</option>
									<option value="toggle_list">Toggle button for list</option>
									<option value="tabs_default">Tab panel - Default version</option>
									<option value="tabs_minimal">Tab panel - Minimal version</option>
									<option value="tabs_simple">Tab panel - Simple version</option>
									</optgroup>
									<optgroup label="Misc. elements">
									<option value="lightbox">Lightbox</option>
									<option value="break">Break</option>
									<option value="line">Line</option>
									<option value="quote">Quote</option>
									<option value="pull">Pullquote</option>
									<option value="push">Pushquote</option>
									<option value="author">Author box</option>
									<option value="relatedposts">Related posts</option>
									</optgroup>
						</select>
			</fieldset>
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();"  style="float:left; padding:10px; width:auto; height:auto;"/>
			<input type="submit" id="insert" name="insert" value="Insert shortcode" onClick="insertShortcode();" style="float:right; padding:10px; width:auto; height:auto;"/>
</form>
</body>
</html>
