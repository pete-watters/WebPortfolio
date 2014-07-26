<?php



// Add the Events Meta Boxes
 
function add_events_metaboxes() {
    add_meta_box('devinsays_events_date', 'End Date', 'devinsays_events_date', 'events', 'side', 'default');
}
 
// The Event Date Metabox
 
function devinsays_events_date() {
    global $post, $wp_locale;
 
    // Use nonce for verification ... ONLY USE ONCE!
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    $time_adj = current_time('timestamp');
 
    $month = get_post_meta($post->ID, '_month', true);
 
    if ( empty($month) ) {
        $month = gmdate( 'm', $time_adj );
    }
 
    $day = get_post_meta($post->ID, '_day', true);
 
    if ( empty($day) ) {
        $day = gmdate( 'd', $time_adj );
    }
 
    $year = get_post_meta($post->ID, '_year', true);
 
    if ( empty($year) ) {
        $year = gmdate( 'Y', $time_adj );
    }
 
    $hour = get_post_meta($post->ID, '_hour', true);
 
    if ( empty($hour) ) {
        $hour = gmdate( 'H', $time_adj );
    }
 
    $min = get_post_meta($post->ID, '_minute', true);
 
    if ( empty($min) ) {
        $min = '00';
    }
 
    $month_s = "<select name=\"_month\">\n";
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        $month_s .= "\t\t\t" . '<option value="' . zeroise($i, 2) . '"';
        if ( $i == $month )
            $month_s .= ' selected="selected"';
        $month_s .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
    }
    $month_s .= '</select>';
 
    echo $month_s;
 
    echo '<input type="text" name="_day" value="' . $day  . '" size="2" maxlength="2" />';
    echo '<input type="text" name="_year" value="' . $year . '" size="4" maxlength="4" /> @ ';
    echo '<input type="text" name="_hour" value="' . $hour . '" size="2" maxlength="2"/>:';
    echo '<input type="text" name="_minute" value="' . $min . '" size="2" maxlength="2" />';
 
}

// Save the Metabox Data
 
function devinsays_save_events_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $events_meta['_month'] = $_POST['_month'];
    $events_meta['_day'] = $_POST['_day'];
    $events_meta['_year'] = $_POST['_year'];
    $events_meta['_hour'] = $_POST['_hour'];
    $events_meta['_minute'] = $_POST['_minute'];
    $events_meta['_eventtimestamp'] = $events_meta['_year'] . $events_meta['_month'] . $events_meta['_day'] . $events_meta['_hour'] . $events_meta['_minute'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
 
}
 
add_action('save_post', 'devinsays_save_events_meta', 1, 2); // save the custom fields
?>