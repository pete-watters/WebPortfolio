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
<title>VIDEO</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymceVideo/tinymce.js"></script>
<style type="text/css">
fieldset { margin:16px 0; padding:10px; }
legend, label, select, input[type=text] { font-size:11px; }
select,input[type=text] { line-height:24px; height:24px; float:left; width:300px }
input[type=text].small { width:140px;  }
label{padding:0 0 4px 0;}
</style>
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');">
<form name="phi_video" action="#">
			<fieldset>
						<legend>Video type</legend>
						<select id="video_type" name="video_type">
									<option value="0">No video</option>
									<option value="youtube">Youtube</option>
									<option value="vimeo">Vimeo</option>
						</select>
			</fieldset>
			<fieldset>
						<legend>Video id</legend>
						<input id="video_id" name="video_id" type="text">
			</fieldset>
			<fieldset>
						<legend>Video size (Predefined sizes)</legend>
						<select id="video_size" name="video_size">
									<option value="0">None</option>
									<option value="small">Small</option>
									<option value="medium">Medium (Default pages and posts)</option>
									<option value="large">Large (Fullwidth pages)</option>
						</select>
			</fieldset>
			<fieldset>
						<legend>Custom video size (optional)</legend>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
												<td style="padding-right:20px;"><label>Width:</label>
															<input id="video_width" name="video_width" type="text" class="small"></td>
												<td><label>Height:</label>
															<input id="video_height" name="video_height" type="text" class="small"></td>
									</tr>
						</table>
			</fieldset>
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();"  style="float:left; padding:10px; width:auto; height:auto;"/>
			<input type="submit" id="insert" name="insert" value="Insert shortcode" onClick="insertVideoShortcode();" style="float:right; padding:10px; width:auto; height:auto;"/>
</form>
</body>
</html>
