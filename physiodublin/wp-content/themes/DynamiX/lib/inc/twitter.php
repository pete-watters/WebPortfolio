<script type="text/javascript">
/******************************************************************/
/*	Twitter Feed Cycle									      	  */
/******************************************************************/
/* Combining Tweets with JQuery Cycle ALL - CreativeWorkz.  */

function gettweets( name,tweetsnum ) {

//Your twitter name
var twitter_name = name;

//Number of tweets you want to get back
var twitter_count = tweetsnum;
//Callback function name
var callback_name = "tweet_callback";
//Twitter search url
var twitter_search = "http://twitter.com/statuses/user_timeline";
//Return type (json or xml)
var return_type = "json";
//Adds script tags to the head/body tag

( function() {
var ts = document.createElement('script');
ts.type = 'text/javascript';
ts.async = true;
ts.src = twitter_search + "." + return_type + "?screen_name=" + twitter_name + "&count=" + twitter_count + "&callback=" + callback_name;
( document.getElementsByTagName( 'head' )[ 0 ] || document.getElementsByTagName( 'body' )[ 0 ] ).appendChild( ts );
} )();

}

//Call back function
function tweet_callback( data ) {
//Loop through the data from twitter
jQuery.each( data, function( i, tweet ) {
//Make sure the text isn't undefined
if( tweet.text != undefined ) {
//Lets do some regex magic to replace urls, hashtags, and usernames
var text = tweet.text.toString().replace( /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig, '<a href="$1">$1</a>' ).replace( /(^|\s)@(\w+)/, '<a href="http://www.twitter.com/$2">@$2</a>' ).replace( /[#]+[A-Za-z0-9-_]+/ig, function(t) { var tag = t.replace("#","%23"); return t.link("http://search.twitter.com/search?q="+tag); } );
//Lets append each tweet to a ul with the id of tweet_container
jQuery( "#tweet_container" ).append( "<span>" + text + "</span>");
			jQuery('#tweet_container').cycle({ // Cycle through tweets
				fx: 'fade',
				speed: 1000,
				timeout: 10000,
				cleartype:  1 // enable cleartype corrections 
			});
}
});
}
/******************************************************************/
/*	Twitter Feed Cycle *END*							      	  */
/******************************************************************/
</script>
<div class="hozbreak nospace">&nbsp;</div>
<div class="tweets">
	<div class="tweettitle"><span class="twitterfollow"><a href="http://www.twitter.com/<?php echo TWITTERUSR; ?>"><img src="<?php echo bloginfo('template_url'); ?>/images/blank.gif" width="21" height="21" alt="twitter" /></a></span><h3><a href="http://www.twitter.com/<?php echo TWITTERUSR; ?>" title="Follow <?php echo TWITTERUSR; ?>"><?php if(TWITTERLAB) { echo TWITTERLAB; } else { ?>Latest Tweets<?php } ?></a></h3></div>
	<div id="tweet_quote_wrapper">
		<div id="tweet_container"></div>
	</div>
<div class="clear"></div>
</div>

