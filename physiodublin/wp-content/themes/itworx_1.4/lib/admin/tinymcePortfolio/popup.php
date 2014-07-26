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
<title>PORTFOLIO</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymcePortfolio/tinymce.js"></script>
<style type="text/css">
fieldset { margin:16px 0; padding:10px; }
legend, label, select, input[type=text] { font-size:11px; }
select, input[type=text] { line-height:24px; height:24px; float:left; width:300px }
</style>
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');">
<form name="phi_portfolio" action="#">
			<fieldset>
						<legend>Portfolio category</legend>
						<select id="portfolio_category" name="portfolio_category">
									<?php
						
						$myterms = get_terms('phiportfoliocats');
$phi_getTerms = array();
foreach ($myterms as $term_list) {
	$phi_getTerms [$term_list->term_id] = $term_list->name;
	echo ' <option value="'.$term_list->slug.'">'.$term_list->name.'</option>';
	}
	?>
						</select>
			</fieldset>
			<fieldset>
						<legend>Portfolio layout</legend>
						<select id="portfolio_columns" name="portfolio_columns">
									<option value="0">None</option>
									<option value="1">Full width list</option>
									<option value="2">Two column grid</option>
									<option value="3">Three column grid</option>
									<option value="4">Four column grid</option>
									<option value="5">Five column grid</option>
						</select>
			</fieldset>
			<fieldset>
						<legend>Posts per page</legend>
						<input id="perpage" name="perpage" type="text">
			</fieldset>
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();"  style="float:left; padding:10px; width:auto; height:auto;"/>
			<input type="submit" id="insert" name="insert" value="Insert shortcode" onClick="insertPortfolioShortcode();" style="float:right; padding:10px; width:auto; height:auto;"/>
</form>
</body>
</html>
