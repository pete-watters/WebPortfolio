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
<title>CONTACTFORM</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymceContactform/tinymce.js"></script>
<style type="text/css">
fieldset { margin:16px 0; padding:10px; }
legend, label, select, input[type=text] { font-size:11px; }
select, input[type=text] { line-height:24px; height:24px; float:left; width:300px }
</style>
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');">
<form name="phi_contactform" action="#">
			<fieldset>
						<legend>Form email</legend>
						<input id="email" name="email" type="text">
			</fieldset>
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();"  style="float:left; padding:10px; width:auto; height:auto;"/>
			<input type="submit" id="insert" name="insert" value="Insert shortcode" onClick="insertContactformShortcode();" style="float:right; padding:10px; width:auto; height:auto;"/>
</form>
</body>
</html>
