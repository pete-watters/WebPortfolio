<?php /* Stop the theme from killing WordPress if BuddyPress is not enabled. */
if ( !class_exists( 'BP_Core_User' ) )
	return false;

/* Load the default BuddyPress AJAX functions */
/* We are going to load the ajax from the BuddyPress plugin directory so we always use the latest version */
require_once( BP_PLUGIN_DIR . '/bp-themes/bp-default/_inc/ajax.php' );

/* Load the BuddyPress javascript and css */
/* We use !bp_is_blog_page() here to only load the JS and CSS on BuddyPress pages to save on load time */
/* We want to load the adminbar css on all pages so it has been taken out of the if statement */
/* We are going to load the JS from the BuddyPress plugin directory so we always use the latest version */

function theme_loaded_init() {
global $DYN_inskin;
	wp_enqueue_style( 'buddypressadminbar', MY_THEME_URL . '/stylesheets/style-adminbar.css', false, '0.1', 'screen' );
}

add_action('wp_head', 'theme_loaded_init', 1);

/* Add required BuddyPress JavaScript vars. */
/* Add words that we need to use in JS to the end of the page so they can be translated and still used. */
function bp_dtheme_js_terms() { ?>
<script type="text/javascript">
	var bp_terms_my_favs = '<?php _e( "My Favorites", "buddypress" ) ?>';
	var bp_terms_accepted = '<?php _e( "Accepted", "buddypress" ) ?>';
	var bp_terms_rejected = '<?php _e( "Rejected", "buddypress" ) ?>';
	var bp_terms_show_all_comments = '<?php _e( "Show all comments for this thread", "buddypress" ) ?>';
	var bp_terms_show_all = '<?php _e( "Show all", "buddypress" ) ?>';
	var bp_terms_comments = '<?php _e( "comments", "buddypress" ) ?>';
	var bp_terms_close = '<?php _e( "Close", "buddypress" ) ?>';
	var bp_terms_mention_explain = '<?php printf( __( "%s is a unique identifier for %s that you can type into any message on this site. %s will be sent a notification and a link to your message any time you use it.", "buddypress" ), '@' . bp_get_displayed_user_username(), bp_get_user_firstname(bp_get_displayed_user_fullname()), bp_get_user_firstname(bp_get_displayed_user_fullname()) ); ?>';
	</script>
<?php
}
add_action( 'wp_footer', 'bp_dtheme_js_terms' );

/* Added so BuddyPress can take care of page titles on BuddyPress pages */
if (!bp_is_blog_page() ) {
	add_action( 'wp_title', 'bp_get_page_title');
}

// CHANGE BP ADMIN BAR LOGO
function erocks_bp_adminbar_logo() {

global $bp;
echo '';
}
remove_action( 'bp_adminbar_logo', 'bp_adminbar_logo' );
add_action( 'bp_adminbar_logo', 'erocks_bp_adminbar_logo' );

define( 'BP_ENABLE_USERNAME_COMPATIBILITY_MODE', true );

/* enable shortcodes in budypress*/
add_filter( 'bp_get_the_topic_post_content', 'do_shortcode' );
/* enable shortcodes in budypress*//*END*/

?>