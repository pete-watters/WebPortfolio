<?php
/***************************************************************/
/*	Generate Custom Fields			  						   */
/***************************************************************/

$pgopts = "pgopts";



$meta_descriptions = array(  // Page Titles & Descriptions

"menudesc" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Page Options</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "menudesc",
"title" => "Menu Description",
"size" => "large"),


"pagetitle" => array(
"type" => "field",
"name" => "pagetitle",
"title" => "Page Title",
"description" => "<small class=\"description\">Overrides Default Page Title. Enter <em><strong>BLANK</strong></em> to disable displaying title.</small>",
"size" => "large"),


"pagesubtitle" => array(
"type" => "field",
"name" => "pagesubtitle",
"title" => "Page Sub Title",
"size" => "large"),

"hidebreadcrumbs" => array(
"type" => "chkbox",
"name" => "hidebreadcrumbs",
"size" => "large",
"description" => "<strong>Hide</strong> Breadcrumbs <br />"),

"hidecontent" => array(
"type" => "chkbox",
"name" => "hidecontent",
"size" => "large",
"description" => "<strong>Hide</strong> Content <br /><small class=\"description\">Use to display Gallery only.</small><br /><br />"),

"contentborder" => array(
"type" => "chkbox",
"name" => "contentborder",
"size" => "large",
"description" => "<strong>Disable</strong> Content Border<br /><br />"),

"author" => array(
"type" => "chkbox",
"name" => "authorname",
"size" => "large",
"description" => "Publish Author Name"),

"postdate" => array(
"type" => "chkbox",
"name" => "postdate",
"size" => "large",
"description" => "Publish Date"),

"textresize" => array(
"type" => "chkbox",
"checked" => "yes",
"name" => "textresize",
"size" => "large",
"description" => "<strong>Enable</strong> Text Resizer",
"closetag" => '</div></div>'),

"outskin" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Page Skins</h4><div class="reveal-content"><br />',
"type" => "menu",
"id" => "outskin",
"name" => "outskin",
"title" => "Select Outer Skin",
"size" => "large",
"description" => "Switch theme outer skin for this page."),

"inskin" => array(
"type" => "menu",
"id" => "inskin",
"name" => "inskin",
"title" => "Select Inner Skin",
"size" => "large",
"description" => "Switch theme inner skin for this page.",
"closetag" => '</div></div>'),
);


$meta_post_descriptions = array(  // Page Titles & Descriptions

"posttitle" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Post Titles</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "posttitle",
"title" => "Post Title",
"description" => "Overrides Default Post Title.",
"size" => "large"),

"postsubtitle" => array(
"type" => "field",
"name" => "postsubtitle",
"title" => "Post Sub Title",
"size" => "large",
"closetag" => '</div></div>'),

"textresize" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Post Layout</h4><div class="reveal-content"><br />',
"type" => "chkbox",
"checked" => "yes",
"name" => "textresize",
"size" => "large",
"description" => "<strong>Enable</strong> Text Resizer"),

"hidebreadcrumbs" => array(
"type" => "chkbox",
"name" => "hidebreadcrumbs",
"size" => "large",
"description" => "<strong>Hide</strong> Breadcrumbs <br />"),


"contentborder" => array(
"type" => "chkbox",
"name" => "contentborder",
"size" => "large",
"description" => "<strong>Disable</strong> Content Border<br /><br />"),

"author" => array(
"type" => "chkbox",
"name" => "authorname",
"size" => "large",
"description" => "Publish Author Name",
"closetag" => '</div></div>')

);


$meta_sidebar_layout = array( // Sidebar(s) Position

"layout_one" => array(
"opentag" => '<div style="line-height:30px;" class="revealbox reverse">',
"type" => "radio",
"name" => "layout",
"id" => "layout_one",
"title" => "Full Width",
"image" => "layout_one.png",
"size" => "medium"),

"layout_two" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_two",
"title" => "1x Column (Left) ",
"image" => "layout_two.png",
"size" => "medium"),

"layout_three" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_three",
"title" => "2x Column (Left) ",
"image" => "layout_three.png",
"size" => "medium"),

"layout_four" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_four",
"title" => "1x Column (Right) ",
"image" => "layout_four.png",
"size" => "medium"),

"layout_five" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_five",
"title" => "2x Column (Right) ",
"image" => "layout_five.png",
"size" => "medium"),

"layout_six" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_six",
"title" => "2x Column (Left,Right) ",
"image" => "layout_six.png",
"size" => "medium",
"closetag" => "<div class=\"clear\"></div></div>"),

"sidebar_one" => array(
"opentag" => '<div class="clear"></div><div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Sidebar Configuration</h4><div class="reveal-content"><p>Select a sidebar for the relevant column (See <strong>Layout Configuration</strong> above). Sidebars are configured under <strong>Widgets</strong>. Also select the border configuration for both Sidebars.</p><br /><div class="columnone">',
"type" => "menu",
"id" => "columns",
"name" => "sidebar_one",
"title" => "Select <strong>Column 1</strong> Sidebar",
"image" => "Select a sidebar for Column 1.",
"size" => "xlarge"),

"col_one_opt_one" => array(
"type" => "radio",
"name" => "border_config_one",
"id" => "sidebarwrap",
"maintitle" => "Select <strong>Column 1</strong> Sidebar Border Type",
"title" => "Border <em>(Default)</em>",
"image" => "sidebar_border_wrap.png",
"size" => "small"),

"col_one_opt_three" => array(
"type" => "radio",
"name" => "border_config_one",
"id" => "borderless",
"title" => "Borderless",
"image" => "sidebar_borderless.png",
"closetag" => "<div class=\"clear\"></div></div>"),


"sidebar_two" => array(
"opentag" => "<div class=\"columntwo\">",
"type" => "menu",
"id" => "columns",
"name" => "sidebar_two",
"title" => "Select <strong>Column 2</strong> Sidebar",
"image" => "Select a sidebar for Column 2.",
"size" => "xlarge"),

"col_two_opt_one" => array(
"type" => "radio",
"name" => "border_config_two",
"id" => "sidebarwrap",
"maintitle" => "Select <strong>Column 2</strong> Sidebar Border Type",
"title" => "Border <em>(Default)</em>",
"image" => "sidebar_border_wrap.png",
"size" => "small"),

"col_two_opt_three" => array(
"type" => "radio",
"name" => "border_config_two",
"id" => "borderless",
"title" => "Borderless",
"image" => "sidebar_borderless.png",
"size" => "small",
"closetag" => '<div class="clear"></div></div><div class="clear"></div><p><strong>Note! </strong>If a single Sidebar layout option is selected in the <strong>Layout Configuration</strong>, the "Column 2 Sidebar" option is ignored.</p></div></div>'),

);

$meta_sidebar_select = array( // Sidebars Select


);

$meta_sidebar_border = array( // Sidebar Border Configuration

);

$meta_gallery = array( // Gallery Options

"nogallery" => array(
"opentag" => '<div style="line-height:30px;" class="revealbox reverse">',
"type" => "radio",
"name" => "gallery",
"id" => "nogallery",
"title" => "No Gallery",
"description" => "",
"image" => "blank.gif",
"size" => "medium"),

"stageslider" => array(
"type" => "radio",
"name" => "gallery",
"id" => "stageslider",
"title" => "Stage Gallery",
"description" => "",
"image" => "stagegallery.png",
"size" => "medium"),

"groupslider" => array(
"type" => "radio",
"name" => "gallery",
"id" => "groupslider",
"title" => "Group Slider",
"description" => "",
"image" => "groupgallery.png",
"size" => "medium"),

"gridgallery" => array(
"type" => "radio",
"name" => "gallery",
"id" => "gridgallery",
"title" => "Grid Gallery",
"description" => "",
"image" => "gridgallery.png",
"size" => "medium"),

"gallery3d" => array(
"type" => "radio",
"name" => "gallery",
"id" => "gallery3d",
"title" => "3d Gallery",
"description" => "",
"image" => "3dgallery.png",
"size" => "medium"),

"galleryaccordion" => array(
"type" => "radio",
"name" => "gallery",
"id" => "galleryaccordion",
"title" => "Accordion Gallery",
"description" => "",
"image" => "accordiongallery.png",
"size" => "medium",
"closetag" => "<div class=\"clear\"></div></div>"),

"gallerycat" => array(
"opentag" => '<div class="clear"></div><div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Gallery Data Source</h4><div class="reveal-content"><div style="margin-top:10px;line-height:35px;padding:5px 15px;" class="divborder galcats"><div style="width:50%;float:left"><strong>Select Post Categories</strong><br />',
"type" => 'chkbox',
"array" => 'cats',
"id" => 'gallerycat',
"name" => 'gallerycat',
"title" => 'Gallery Category',
"size" => 'medium',
"closetag" => '</div>',
"description" => 'Select the Category to display as a Gallery.'),


"slidesetselect" => array(
"opentag" => "<div style=\"float:left\">",
"type" => "menu",
"id" => "slidesetselect",
"name" => "slidesetselect",
"title" => '<strong>Select Slide Set ID</strong><br><small class="description">Slide Sets override Post Category options.</small>',
"size" => "large"),


"slideset" => array(
"type" => "hidden",
"name" => "slideset",
"id" => "slideset",
"class" => "selected_cats",
"closetag" => '</div><div class="clear"></div></div></div></div>'),

"imageeffect" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Image Effects</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'imageeffect',
"name" => 'imageeffect',
"title" => '<strong>Select Effect</strong>',
"size" => 'large',
"description" => '<small class="description">Does <strong>NOT</strong> apply to 3d Gallery</small>'),

"lightbox" => array(
"type" => "chkbox",
"id" => "lightbox",
"name" => "lightbox",
"title" => "<strong>Enable Lighbox</strong>",
"size" => "xxlarge",
"description" => "Enable Lightbox on images, alternatively image links to post/url.<br /><small class=\"description\">Only applies to Group &amp; Grid Galleries.</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"groupgridcontent" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Additional Settings (All Galleries)</h4><div class="reveal-content"><div style="margin-top:10px;line-height:30px;" class="divborder">',
"type" => 'menu',
"id" => 'groupgridcontent',
"name" => 'groupgridcontent',
"title" => '<strong>Group Slider</strong>, <strong>Grid</strong>, <br /><strong>Acccordion</strong> Gallery Content',
"size" => 'large'),

"groupsliderpos" => array(
"type" => "menu",
"id" => "groupsliderpos",
"name" => "groupsliderpos",
"title" => "<strong>Group Slider</strong> / <strong>Grid</strong> <br />Gallery Position",
"size" => "large"),

"gridcolumns" => array(
"type" => "menu",
"id" => "gridcolumns",
"name" => "gridcolumns",
"title" => '<strong>Grid Gallery Columns</strong><br /><small class="description">Number of columns to display.</small>',
"size" => "large"),


"gridshowposts" => array(
"type" => "field",
"name" => "gridshowposts",
"title" => '<strong>Grid Gallery</strong> Show Posts<br /><small class="description">Paginate number of posts (6 Default).</small>',
"size" => "large",
"class" =>"xsmall"),

"gridfilter" => array(
"opentag" => '<div class="clear" style="padding-bottom:15px;"></div>',
"type" => "chkbox",
"name" => "gridfilter",
"checked" => "no",
"title" => '<strong>Grid Gallery</strong> Category Filter<br /><small class="description">Filter Posts by Category (Animated). Pagination will be disabled.</small>',
"size" => "xxlarge",
"description" => "Enable Category Filtering",
"closetag" => "<div class=\"clear\"></div></div>"),

"galleryheight" => array(
"opentag" => "<div style=\"line-height:30px;\" class=\"divborder lite\">",
"type" => "field",
"name" => "galleryheight",
"title" => "Group Slider, 3d Gallery, Grid Row Height (Optional) <small class=\"description\">Adjust to accommodate text and image height ( <strong>Grid</strong> &amp; <strong>Group Slider</strong> &amp; <strong>3d Gallery</strong> galleries only ).</small>",
"extras" => "<small class=\"description\">px</small>  <small style=\"padding-left:10px;\">Default <strong>Grid Row Height</strong> &amp; <strong>Group Slider Gallery Height</strong> are set to 435.</small>",
"size" => "xxxlarge",
"closetag" => "<div class=\"clear\"></div></div>"),

"imgheight" => array(
"opentag" => "<div style=\"line-height:30px;\" class=\"divborder \">",
"type" => "field",
"name" => "imgheight",
"title" => "<strong>Image Height</strong> (Optional) <small class=\"description\">Applies to all Gallery Images.</small>",
"extras" => "<small class=\"description\">px</small>  <small style=\"padding-left:10px;\">Default <strong>Grid</strong> &amp; <strong>Group Slider</strong> image heights are 160, <strong>Stage, 3d, Accordion Gallery</strong> is 350.</small>",
"size" => "xxxlarge"),


"imgwidth" => array(
"type" => "field",
"name" => "imgwidth",
"title" => "<strong>Image Width</strong> (Optional) <small class=\"description\">Applies to <strong>3d</strong> &amp; <strong>Stage</strong> Gallery Images ONLY.</small>",
"extras" => "<small class=\"description\">px</small>  <small style=\"padding-left:10px;\">Default size is 940px.</small>",
"size" => "xxxlarge",
"closetag" => "<div class=\"clear\"></div></div>"),

"gallerynumposts" => array(
"opentag" => "<div style=\"line-height:30px;\" class=\"divborder lite\">",
"type" => "field",
"name" => "gallerynumposts",
"class" =>"xsmall",
"title" => 'Limit Number of Posts to Display <br /><small class="description">(<strong>Stage</strong>, <strong>3d</strong>, <strong>Accordion</strong> &amp; <strong>Group Slider</strong>)</small>',
"size" => "large"),

"gallerynpostexcerpt" => array(
"type" => "field",
"name" => "gallerynpostexcerpt",
"class" =>"xsmall",
"title" => 'Exceprt Word Limit <br /><small class="description">(Default 55 words)</small>',
"size" => "medium"),

"gallerysortby" => array(
"type" => "menu",
"id" => "gallerysortby",
"name" => "gallerysortby",
"title" => "<strong>Sort By</strong> (Optional)",
"size" => "large"),

"galleryorderby" => array(
"type" => "menu",
"id" => "galleryorderby",
"name" => "galleryorderby",
"title" => "<strong>Order By</strong> (Optional)",
"size" => "large",
"closetag" => "<div class=\"clear\"></div></div>"),

"stagetimeout" => array(
"opentag" => "<div style=\"line-height:30px;\" class=\"divborder\">",
"type" => "field",
"name" => "stagetimeout",
"title" => "<strong>Slide Timeout</strong> <small>Stage, 3d, Accordion, Group Slider Galleries</small> <br /><small class=\"description\">Enter the amount of time each slide is visible for.</small>",
"size" => "xxlarge",
"class" => "small",
"extras" => "<small class=\"description\">seconds</small>"),


"stageplaypause" => array(
"type" => "menu",
"id" => "stageplaypause",
"name" => "stageplaypause",
"title" => "<strong>Stage Gallery Navigation</strong><br /><small class=\"description\">Display Navigation for Gallery</small>",
"size" => "xlarge",
"class" => "small",
"extras" => "<small class=\"description\">seconds</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),


"gallery3dsegments" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>3d Gallery Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dsegments',
"title" => 'Pieces<br /><small class="description">(Default 15)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtween" => array(
"type" => 'menu',
"id" => 'gallery3dtween',
"name" => 'gallery3dtween',
"title" => 'Transition <br /><small class="description">(Optional)</small>',
"size" => 'large'),


"gallery3dtweentime" => array(
"type" => 'field',
"name" => 'gallery3dtweentime',
"title" => 'Transition Time<br /><small class="description">(Default 1.2)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtweendelay" => array(
"type" => 'field',
"name" => 'gallery3dtweendelay',
"title" => 'Delay<br /><small class="description">(Default 0.1)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium',
),

"gallery3dzdistance" => array(
"type" => 'field',
"name" => 'gallery3dzdistance',
"title" => 'Depth Offset<br /><small class="description">(-200 to 700)</small>',
"class" => 'xsmall',
"size" => 'medium'),



"gallery3dexpand" => array(
"type" => 'field',
"name" => 'gallery3dexpand',
"title" => 'Cube Distance<br /><small class="description">(Default 20)</small>',
"class" => 'xsmall',
"size" => 'medium',
"closetag" => '<div class="clear"></div></div>'),

"gallery3dxpos" => array(
"opentag" => '<div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dxpos',
"title" => 'Controls X Postion<br /><small class="description">(Default 470)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dypos" => array(
"type" => 'field',
"name" => 'gallery3dypos',
"title" => 'Controls Y Postion<br /><small class="description">(Default 280)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtextcolor" => array(
"type" => 'field',
"name" => 'gallery3dtextcolor',
"title" => 'Text Background Color<br /><small class="description">(Default 111111)</small>',
"extras" => '<span class="color_icon">&nbsp;</span>',
"size" => 'large'),

"gallery3dincolor" => array(
"type" => 'field',
"name" => 'gallery3dincolor',
"title" => 'Text Color<br /><small class="description">(Default 111111)</small>',
"extras" => '<span class="color_icon">&nbsp;</span>',
"size" => 'large',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"accordionautoplay" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Accordion Gallery Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'accordionautoplay',
"name" => 'accordionautoplay',
"title" => '<strong>Accordion Auto Rotate</strong>',
"size" => 'xlarge'),

"accordiontitles" => array(
"type" => 'menu',
"id" => 'accordiontitles',
"name" => 'accordiontitles',
"title" => '<strong>Accordion Startup Mini Titles</strong>',
"size" => 'xlarge',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),
);

$meta_social = array( // Social Options

"twitter" => array(
"type" => "menu",
"id" => "twitter",
"name" => "twitter",
"title" => "Enable Twitter",
"size" => "large",
"description" => "Select where to place twitter feed."),

"socialicons" => array(
"type" => "chkbox",
"name" => "socialicons",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Enable</strong> Social Icons"),

"socialdeli" => array(
"type" => "chkbox",
"name" => "socialdeli",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Delicious"),

"socialdigg" => array(
"type" => "chkbox",
"name" => "socialdigg",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Digg"),

"socialfb" => array(
"type" => "chkbox",
"name" => "socialfb",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Facebook"),

"socialtwitter" => array(
"type" => "chkbox",
"name" => "socialtwitter",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Twitter"),

"socialrss" => array(
"type" => "chkbox",
"name" => "socialrss",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> RSS"),

"disableheart" => array(
"type" => "chkbox",
"name" => "disableheart",
"checked" => "no",
"size" => "large",
"description" => "<strong>Disable</strong> Heart Icon <br /><small class=\"description\">(Individual Icons will be displayed instead)</small>"),

);

$meta_archive_cats = array( // Social Options
"archivecat" => array(
"opentag" => "<em><strong>Select Categories for Blog Template.</strong></em><br /><br /><small class=\"description\">Select \"Blog\" from \"Template\" under \"Page Attributes\" Meta Box.</small><br /><br /><div style=\"line-height:35px;\">",
"type" => "chkbox",
"array" => "cats",
"id" => "archivecat",
"name" => "archivecat",
"title" => "Select Blog Category",
"size" => "medium",
"closetag" => "</div>"),
);


$meta_post_gallery = array( // Post Gallery Options

"gallerytext" => array(
"opentag" => 'Please see documentation for help with Gallery Options.<br /><br /><div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Image / Video Source</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "text",
"title" => "URL of Video File",
"extras" => "<div style=\"padding-top:4px;\"><a style=\"margin-left:15px;\" class=\"button\" href=\"media-upload.php?post_id=298&amp;type=image&amp;TB_iframe=true\" id=\"add_image\" class=\"thickbox\" title=\"Add a Video\" onclick=\"return false;\">Get Video</a></div>",
"description" => ""),


"cleargalone" => array(
"type" => "clear"),


"previewimgurl" => array(
"type" => "field",
"name" => "previewimgurl",
"title" => "URL of Image File",
"class" => "large floatleft",
"extras" => "<div style=\"padding-top:4px;\"><a style=\"margin-left:15px;\" href=\"media-upload.php?post_id=&amp;type=image&amp;TB_iframe=true\" id=\"add_image\" class=\"thickbox button\" title='Add an Image' onclick=\"return false;\">Get Image</a></div><div class=\"clear\"></div>",
"size" => "xxlarge",
"description" => "<small class=\"description\">Leave blank if you wish to use the first image in the post as the gallery image.</small>"),

"movieurl" => array(
"type" => "field",
"name" => "movieurl",
"title" => "URL of Video File",
"class" => "large floatleft",
"extras" => "<div style=\"padding-top:4px;\"><a style=\"margin-left:15px;\" href=\"media-upload.php?post_id=&amp;type=video&amp;TB_iframe=true\" id=\"add_video\" class=\"thickbox button\" title='Add a Video' onclick=\"return false;\">Get Video</a></div><div class=\"clear\"></div>",
"size" => "xxlarge",
"description" => "<small class=\"description\">If you wish to display a video, enter the URL of the file ( Please also provide a \"URL of Image\" in previous option. ).</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"cleargalthree" => array(
"type" => "clear"),

"videotype" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Embed Video / Timeout Options</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "menu",
"id" => "videotype",
"name" => "videotype",
"class" => "medium",
"title" => "Embed Video Type",
"description" => "<small class=\"description\">Enter the URL in <em>URL of Video File</em> and select type here.</small>",
"size" => "large"),


"videoautoplay" => array(
"type" => "chkbox",
"name" => "videoautoplay",
"title" => "AutoPlay Video",
"size" => "large",
"description" => "<small class=\"description\">Autoplay video when gallery slide<br />becomes visible.</small>"),


"slidetimeout" => array(
"type" => "field",
"name" => "slidetimeout",
"title" => "Stage Gallery Slide Timeout <br /><small class=\"description\">Enter the amount of time this slide is visible. e.g. video length</small>",
"size" => "large",
"class" => "small",
"extras" => "<small class=\"description\">seconds</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),


"orderbynum" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Additional Settings</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "field",
"name" => "orderbynum",
"class" => "medium",
"title" => "Enter post order number",
"description" => "<small class=\"description\">0 being first, then increment with a 0 in front e.g. 01,02,03.</small>",
"size" => "large"),


"postshowimage" => array(
"type" => "menu",
"id" => "postshowimage",
"name" => "postshowimage",
"title" => "Show Image in Post/Archive",
"size" => "large",
"description" => "<small class=\"description\">Override default setting in <a href='admin.php?page=blog'>Blog Options</a></small>"),

"imgorientation" => array(
"type" => "menu",
"id" => "imgorientation",
"name" => "imgorientation",
"title" => "Image Orientation",
"size" => "large",
"description" => "<small class=\"description\">Changes shadow size to suit Image Orientation.</small>"),

"cssclasses" => array(
"type" => "field",
"name" => "cssclasses",
"class" => "medium",
"title" => "CSS Classes",
"description" => "<small class=\"description\">Separate by spaces.</small>",
"closetag" => "<div class=\"clear\"></div></div>"),

"galexturl" => array(
"opentag" => "<div style=\"padding-top:10px;padding-bottom:10px;\" class=\"divborder lite\">",
"type" => "field",
"name" => "galexturl",
"class" => "medium",
"title" => "Link Post to alternative URL",
"description" => "<small class=\"description\">Link to a page instead of this post or external site.</small>",
"size" => "large"),

"disablegallink" => array(
"type" => "chkbox",
"name" => "disablegallink",
"title" => "Disable Post Link",
"size" => "large",
"description" => "<small class=\"description\">Disables link to Post and <br />
external URL's.</small>"),

"disablereadmore" => array(
"type" => "chkbox",
"name" => "disablereadmore",
"title" => "Disable Read More Only",
"size" => "large",
"description" => "<small class=\"description\">Disables Read More Text.</small>"),

"imgzoomcrop" => array(
"type" => "menu",
"id" => "imgzoomcrop",
"name" => "imgzoomcrop",
"title" => "Image Crop Settings",
"size" => "large",
"description" => "<small class=\"description\">Default is Crop, If the image is disproportionate to the gallery, select Zoom.</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"stagegallery" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Stage Gallery Options</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "menu",
"id" => "stagegallery",
"name" => "stagegallery",
"title" => "Gallery Image Content",
"size" => "large"),

"displaytitle" => array(
"type" => "menu",
"id" => "displaytitle",
"name" => "displaytitle",
"title" => "Display Post Title on Image",
"size" => "large",
"description" => "<small class=\"description\">Displays title and sub title on <br />
top of gallery image.</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"gallery3dsegments" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>3d Gallery Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dsegments',
"title" => 'Pieces<br /><small class="description">(Default 15)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtween" => array(
"type" => 'menu',
"id" => 'gallery3dtween',
"name" => 'gallery3dtween',
"title" => 'Transition<br /><small class="description">(Optional)</small>',
"size" => 'large'),


"gallery3dtweentime" => array(
"type" => 'field',
"name" => 'gallery3dtweentime',
"title" => 'Transition Time<br /><small class="description">(Default 1.2)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtweendelay" => array(
"type" => 'field',
"name" => 'gallery3dtweendelay',
"title" => 'Delay<br /><small class="description">(Default 0.1)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium',
),

"gallery3dzdistance" => array(
"type" => 'field',
"name" => 'gallery3dzdistance',
"title" => 'Depth Offset<br /><small class="description">(-200 to 700)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dexpand" => array(
"type" => 'field',
"name" => 'gallery3dexpand',
"title" => 'Cube Distance<br /><small class="description">(Default 20)</small>',
"class" => 'xsmall',
"size" => 'medium',
"closetag" => '<div class="clear"></div></div></div></div>'),




);


/***************************************************************/
/*	Generate Custom Fields *END*	  						   */
/***************************************************************/


/***************************************************************/
/*	Generate META boxes				  						   */
/***************************************************************/

function create_meta_box() {
global $pgopts;

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-description', 'Page Content Configuration', 'display_meta_descriptions', 'page', 'side', 'high' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-post-description', 'Post Content Configuration', 'display_meta_post_descriptions', 'post', 'side', 'high' );
}


if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-layout', 'Page Layout Configuration', 'display_meta_layout', 'page', 'normal', 'high' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-post-layout', 'Page Layout Configuration', 'display_meta_layout', 'post', 'normal', 'high' );
}

/*if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-select', 'Column Configuration', 'display_meta_select', 'page', 'normal', 'high' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-post-select', 'Column Configuration', 'display_meta_select', 'post', 'normal', 'high' );
} */


if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-gallery', 'Add Post / Slide Set Gallery', 'display_meta_gallery', 'page', 'normal', 'high' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-social', 'Social Options', 'display_meta_social', 'page', 'side', 'low' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-social', 'Social Options', 'display_meta_social', 'post', 'side', 'low' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-archive', 'Blog Categories', 'display_meta_archive', 'page', 'side', 'low' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'post-gallery-options', 'Post Image / Gallery Options', 'display_meta_post_gallery', 'post', 'normal', 'high' );
}

}

function display_meta_descriptions() {
global $post, $meta_descriptions, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_descriptions as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 

function display_meta_post_descriptions() {
global $post, $meta_post_descriptions, $pgopts, $num_sidebars;

?>

<div class="form-wrap">
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_post_descriptions as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
     
</div>
<div class="clear"></div>

<?php } 



function display_meta_layout() {
global $post, $meta_sidebar_layout, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_sidebar_layout as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 

/*function display_meta_select() {
global $post, $meta_sidebar_select,$meta_sidebar_border, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    <p>Select a sidebar for the relevant column (See <strong>Layout Configuration</strong> above). Sidebars are configured under <strong>Widgets</strong>. Also select the border configuration for both Sidebars.</p><br />

    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_sidebar_select as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?> 
     <div class="clear"></div>  
     
     <?php 
      foreach($meta_sidebar_border as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>  
     
     <div class="clear"></div>
     
     <p><strong>Note! </strong>If a single Sidebar layout option is selected in the <strong>Layout Configuration</strong>, the "Column 2 Sidebar" option is ignored.</p>
</div>
<div class="clear"></div>

<?php } */


function display_meta_gallery() {
global $post, $meta_gallery, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_gallery as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_social() {
global $post, $meta_social, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_social as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_archive() {
global $post, $meta_archive_cats, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_archive_cats as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_post_gallery() {
global $post, $meta_post_gallery, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_post_gallery as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require CWZ_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function save_options( $post_id ) {
global $post, $meta_descriptions, $meta_post_descriptions, $meta_sidebar_layout, $meta_sidebar_select, $meta_sidebar_border, $meta_gallery, $meta_archive_cats, $meta_social, $meta_post_gallery,  $pgopts;

foreach( $meta_descriptions as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

foreach( $meta_post_descriptions as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

foreach( $meta_sidebar_layout as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

/*foreach( $meta_sidebar_select as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}*/

foreach( $meta_gallery as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

foreach( $meta_archive_cats as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

foreach( $meta_social as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

foreach( $meta_post_gallery as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

if ( !wp_verify_nonce( $_POST[ $pgopts . '_wpnonce' ], plugin_basename(__FILE__) ) )
return $post_id;

if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;

update_post_meta( $post_id, $pgopts, $data );

$postopts = "Order";

$postorder = $_POST["orderbynum"];

update_post_meta( $post_id, $postopts, $postorder );

}

/***************************************************************/
/*	Generate META boxes				  						   */
/***************************************************************/