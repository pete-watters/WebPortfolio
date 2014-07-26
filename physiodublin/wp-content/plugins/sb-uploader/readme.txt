=== Plugin Name ===
Contributors: seanbarton
Tags: sb uploader, timthumb, resize, feature image, uploader, post image, page image, meta box, file explorer, category image, taxonomy image, tag image
Requires at least: 3.0
Tested up to: 3.5.0

An easy, customer/user friendly way to upload images and attach them to your content. Optionally sets the featured image. Sometimes you just want to upload a file to a post/page/custom post type/taxonomy/etc.. This plugin allows you to do that with a simple user friendly interface. No popups, no additional page loads, no extra work… just a simple upload button on you post/page editor. You can have as many uploaders per page as you like. It even creates shortcodes and widgets for your use so no coding required!

== Description ==

I originally wrote this for a client as a way to get company logos to appear inside WordPress posts... easy you say huh? What about if we were dealing with people who had no idea what to do when looking at the standard Wordpress 'Add Media' or 'Add Image' page. It all seemed a bit too complicated for the average person so SB Uploader was born.

The idea of the plugin is that it means the act of uploading an image can be done on the same page as the Post/Page editor and there is no separate upload button, just the Save/Publish Post/Page button as normal. This ensures that as part of their blog post or copywriting process an image could be chosen before publishing.

I have added the ability to also upload images to a category/tag/taxonomy so you can have images showing related to a particular taxonomy. The plugin allows you to have multiple instances of an uploader meaning that each page can have as many images attached as you like. It will also set the WordPress featured image if you choose within the settinga. It creates shortcodes for each image and allows access via custom widgets as well. I'm pretty sure that's all bases covered for now.. Do let me know if you want to see this plugin extended in ANY way.

How does it work (Posts/Pages/Custom Post Types)?

A box is added to the top right hand corner of the edit page interface with a simple file selector with browse button. When the user hits Publish/Save the file is uploaded and the URL put into a post/page custom field called company_logo. This can then be used in your posts and pages using the shortcodes which are made available by the plugin. You can easily remove an image by checking a box and updating the page.

Alternatively if you wish to use them more fully within your theme you can use one of the following pieces of code. Note that these are the function declarations themselves. The usage instructions are below them:

function sbu_get_the_image($custom_field, $post_id=false, $url_only=false, $width=false, $height=false, $quality=100) {
	global $sbu;
	
	return $sbu->get_the_post_image($custom_field, $post_id, $url_only, $width, $height, $quality);
}

function sbu_the_image($custom_field, $post_id=false, $url_only=false, $width=false, $height=false, $quality=100) {
	echo sbu_the_image($custom_field, $post_id, $url_only, $width, $height, $quality);
}

function sbu_get_the_image_resized($custom_field, $width=false, $height=false, $quality=100, $post_id=false) {
	return sbu_get_the_image($custom_field, $post_id, false, $width, $height, $quality);
}

function sbu_the_image_resized($custom_field, $width=false, $height=false, $quality=100, $post_id=false) {
	echo sbu_get_the_image_resized($custom_field, $width, $height, $quality, $post_id);
}

function sbu_get_the_category_image($custom_field, $post_id=false) {
	global $sbu;
	
	return $sbu->get_taxonomy_image($custom_field, $post_id);
}

UPDATED: added the following code to grab images from the core uploader. This method resizes and saves multiple versions within the system as you would expect from the normal WP uploader but with a simpler, more customer friendly, interface.

<?php
function sbu_the_wp_image($image_size_name='full', $post_id=false) {
	global $sbu;
	
	return $sbu->get_image($image_size_name, $post_id);
}
?>

If the above doesn't make sense then, in basic terms, you just need to put something like this in your theme:

<?php sbu_the_image('post_image'); ?>

or if you wish to resize an image to fit a slot use this:

<?php sbu_the_image_resized('post_image', 700, 200); ?>

This would output the image as 700x200. Both parameters are optional so if you wanted a proportional resize based on 700 pixels in width then use this:

<?php sbu_the_image_resized('post_image', 700); ?>

Or the old fashioned direct method of retrieving the image.

if ($image = get_post_meta(get_the_ID(), 'post_image', true)) {
 $image = '<img src="' . $image . '" alt="Image" />';
}
echo $image;

How does it work (Tags/Categories/Taxonomies)?

As above but the file upload boxes are added to the taxonomy edit pages instead. Just click browse, choose an image and save the taxonomy/tag/category and you're done.

I would normally wrap the image variable in a div tag with a class or give the image itself a class so that I can restrict the size or float the image (or both?) using the stylesheet. It simply means that you can include that image inside a template if it exists. Of course you could use the resize function I have provided above to get that perfect sized image on your site.

I would like to add that there are NO adverts or links back to my site in this plugin. I personally hate it when, on adding a new plugin, dashboard widgets, donate buttons and backlinks appear. This plugin is clutter free and support is always available via my site and the WP forums. Have fun!

More info at http://www.sean-barton.co.uk/sb-uploader/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the contents of the zip file to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. A new meta box will appear in the top right of your post and page editor pages. You can upload files using that box. 
4. To deal with the files you have uploaded you need to use get_post_meta() with the name of the custom field you want to retrieve. You could also use the widgets or the shortcodes that come with the plugin or some of the sample code I have provided on the main tab of this page. More info available below...

More info here: http://www.sean-barton.co.uk/sb-uploader/

== Screenshots ==

OLD Screenshots available at: http://www.sean-barton.co.uk/sb-uploader/

But then who needs screenshots... it's a meta box which sits in the sidebar near the publish box for your posts/pages (etc..).

If you still need convincing then read some of the feedback on my site or the forum posts to see that both support and openness to additions is there. Come and join the fun and if you feel you need it to be modified in any way then please do get in touch and I can get some new features in.

== Changelog ==

1: Initial release, basic functionality

2: Added taxonomy support, added multiple instance support, added widgets, added shortcodes

2.1: Added image widget to allow the placement of an image into a sidebar without using HTML

2.2: Added uploaders for all post types instead of just post and page.

2.3: Fixed WP 3.2 compatibility problem

2.4: Added tags to the taxonomy support list

2.5: Added granularity for custom post types. You can now add X uploaders for each custom post type individually. Updated minimum uploaders to 0 from 1 in case they aren't required.

2.6: Fixed issues with custom post type uploads.

2.7: URLs now stored as relative to the site root as opposed to being fully absolute. This means that if you move server or use load balancing then the images are served from the same server as opposed to the original server they were uploaded to!

2.8: Fixed bug whereby uploaders were being shown despite 0 being selected from admin screen.

2.9: Fixed bug for sites that reside within a subdirectory.

3.0: Added option to switch from relative to absolute URLs. fixed a bug whereby you needed to click update settings twice for newly added uploaders to 'take'

3.1: Fairly major release. I have added a notification to tell you if the upload directory is not writeable. The file manager has been removed. The plugin gains an icon so it stands out in the admin menus. The plugin has a debug section on the admin page to help you work out where your images are going. The interface in the meta boxes is now more space efficient and gives the dimension and mime type. The shortcodes now support the width and height parameters to resize the images. Timthumb has been added for resizing of images on the front end and finally a few helper functions have been written to make adding images into your theme or site much easier.

3.2: Snagging release. Added some code to make sure that the uploader doesn't run more than once when saving. It now renames the uploaded file if the old file can't be deleted to save on upload errors. Now uses the page ID from $_POST if present in favour of the one passed as an argument to the save_post action. This will cut down on revision saves and fixes a conflict with another plugin I was experiencing.

3.3: Security release. An exploit was found and has been fixed. This is to do with people being able to upload whatever they wanted as opposed to certain file types. This has been resolved and replaced for image file types instead.

3.4: Modified to use the core WP uploader. This means native resizing and the ability to set the featured image. Also included legacy mode for people who would rather use the original uploader system.

3.5: Minor release.. removed the SB Uploader prefix in the meta boxes so that it feels more integrated and also removed the 'high' priority on the meta box too so it sits just under the publish box where it should be.

3.6: Minor release.. added add_theme_support('post-thumbnails'); as some themes didn't include it. Caused an error when trying to use the WP image

3.7: Minor release.. fixed bug whereby the passed post_id was being ignored for wordpress featured image requests

3.8: Minor release.. updated get_taxonomy_image to accept taxonomy name insead of assuming category. Second argument is now taxonomy name. Added sbu_get_the_taxonomy_image as template helper function sbu_get_the_taxonomy_image($custom_field_name, $taxonomy, $post_id=0);

3.9: Improved support for the taxonomy image whereby the taxonomy no longer need be specified. Also added support for timthumb resizing on the taxonomy image.

4.0: Removed jQuery to add Enctype and used the PHP filter instead. Added a remove checkbox to easily discard existing images.

4.1: Very Minor update. Added support for some video and audio formats for upload.
