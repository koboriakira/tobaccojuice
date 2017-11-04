<?php
  // 人気記事出力用
  function getPostViews($postID){
  	$count_key = 'post_views_count';
  	$count = get_post_meta($postID, $count_key, true);
  	if($count==''){
  			delete_post_meta($postID, $count_key);
  			add_post_meta($postID, $count_key, '0');
  			return "0 View";
  	}
  	return $count.' Views';
  }

  function setPostViews($postID) {
  	$count_key = 'post_views_count';
  	$count = get_post_meta($postID, $count_key, true);
  	if($count==''){
  			$count = 0;
  			delete_post_meta($postID, $count_key);
  			add_post_meta($postID, $count_key, '0');
  	}else{
  			$count++;
  			update_post_meta($postID, $count_key, $count);
  	}
  }

  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  function get_navigation() {
    return include( TEMPLATEPATH . '/navigation.php' );
  }

  function get_related_entries() {
    return include( TEMPLATEPATH . '/related-entries.php' );
  }

  function get_popular_entries() {
    return include( TEMPLATEPATH . '/popular-entries.php' );
  }

  function get_smart_profile() {
    return include( TEMPLATEPATH . '/smart-profile.php' );
  }

  function get_share_sns_btn() {
    return include( TEMPLATEPATH . '/share-sns-btn.php' );
  }

  function get_contact_form() {
    return include( TEMPLATEPATH . '/contact-form.php' );
  }
?>
