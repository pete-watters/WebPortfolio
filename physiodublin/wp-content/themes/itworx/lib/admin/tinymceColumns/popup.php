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
<title>COLUMNS</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymceColumns/tinymce.js"></script>
<style type="text/css">
fieldset { margin:16px 0; padding:10px; }
legend, label, select, input[type=text] { font-size:11px; }
select, input[type=text] { line-height:24px; height:24px; float:left; width:300px }
</style>
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');">
<form name="phi_portfolio" action="#">
			<!-- style_panel -->
			<fieldset>
						<legend>Column shortcode</legend>
						<select id="column_shortcode" name="column_shortcode">
									<optgroup label="Grid layouts">
									<option value="two_column_grid">Two column grid</option>
									<option value="three_column_grid">Three column grid</option>
									<option value="four_column_grid">Four column grid</option>
									<option value="five_column_grid">Five column grid</option>
									</optgroup>
									<optgroup label="Single columns">
									<option value="one_half">One half</option>
									<option value="one_half_last">One half - last</option>
									<option value="one_third">One third</option>
									<option value="one_third_last">One third - last</option>
									<option value="two_third">Two third</option>
									<option value="two_third_last">Two third - last</option>
									<option value="one_fourth">One fourth</option>
									<option value="one_fourth_last">One fourth - last</option>
									<option value="three_fourth">Three fourth</option>
									<option value="three_fourth_last">Three fourth - last</option>
									<option value="one_fifth">One fifth</option>
									<option value="one_fifth_last">One fifth - last</option>
									<option value="two_fifth">Two fifth</option>
									<option value="two_fifth_last">Two fifth - last</option>
									<option value="three_fifth">Three fifth</option>
									<option value="three_fifth_last">Three fifth - last</option>
									</optgroup>
									<optgroup label="3 columns mixed grids">
									<option value="onethird_twothird">One third / Two third</option>
									<option value="twothird_onethird">Two third / One third</option>
									</optgroup>
									<optgroup label="4 columns mixed grids">
									<option value="half_onefourth_onefourth">One half / One fourth / One fourth</option>
									<option value="onefourth_half_onefourth">One fourth / One half / One fourth</option>
									<option value="onefourth_onefourth_half">One fourth / One fourth / One half </option>
									<option value="onefourth_threefourth">One fourth / Three fourth </option>
									<option value="threefourth_onefourth">Three fourth / One fourth </option>
									</optgroup>
									<optgroup label="5 columns mixed grids">
									<option value="twofifth_threefifth">Two fifth / Three fifth  </option>
									<option value="threefifth_twofifth">Three fifth / Two fifth  </option>
									<option value="twofifth_onefifth_onefifth_onefifth">Two fifth / One fifth / One fifth / One fifth</option>
									<option value="onefifth_twofifth_onefifth_onefifth">One fifth / Two fifth / One fifth / One fifth</option>
									<option value="onefifth_onefifth_twofifth_onefifth">One fifth / One fifth / Two fifth / One fifth</option>
									<option value="onefifth_onefifth_onefifth_twofifth">One fifth / One fifth / One fifth / Two fifth</option>
									<option value="onefifth_twofifth_twofifth">One fifth / Two fifth / Two fifth </option>
									<option value="twofifth_onefifth_twofifth">Two fifth / One fifth / Two fifth </option>
									<option value="twofifth_twofifth_onefifth">Two fifth / Two fifth / One fifth </option>
									
									<option value="threefifth_onefifth_onefifth">Three fifth / One fifth / One fifth </option>
									<option value="onefifth_threefifth_onefifth">One fifth / Three fifth/  One fifth</option>
									<option value="onefifth_onefifth_threefifth">One fifth / One fifth / Three fifth</option>
									</optgroup>
									
						</select>
			</fieldset>
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();"  style="float:left; padding:10px; width:auto; height:auto;"/>
			<input type="submit" id="insert" name="insert" value="Insert shortcode" onClick="insertShortcode();" style="float:right; padding:10px; width:auto; height:auto;"/>
</form>
</body>
</html>
