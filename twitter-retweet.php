<?php
/*
Plugin Name: Twitter ReTweet
Plugin URI: http://blog.chromaticsites.com/wordpress-plugin-twitter-retweet/
Description: Function that displays a ReTweet link which gives visitors the ability to ReTweet the current post; supports custom URLs (perfect for Google Analytics Campaign Tracking).
Version: 1.0
Author: Matt Jurmann
Author URI: http://blog.chromaticsites.com/
*/

function twitterReTweet() {
  ob_start();
  
  global $post;
  
  $retweetURL = get_post_meta($post->ID, "retweet_url", true);
  $retweetTitle = str_replace(" ","+",$post->post_title);

  if ($retweetURL != NULL) { 
	  echo '<a class="reTweetPost" href="http://twitter.com/home/?status=RT+@';
	  the_author_nickname();
	  echo ':+';
	  echo $retweetTitle;
	  echo '+-+';
	  echo $retweetURL;
	  echo '">ReTweet This Post</a>';
  }

  return ob_get_clean();
}
?>
