<?php

// Post Views Counter
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if ($count=='') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}

	return $count.'';
}

function setPostViews($postID) {
	$days  = get_post_meta($postID, 'post_views_count_days', true);
	if (!is_array($days))
		$days = array();

	$today = date('Ymd');
	// update today's counter
	$days[$today] = isset($days[$today]) ? $days[$today] + 1 : 1;
	update_post_meta($postID, 'post_views_count_days', $days);
	update_post_meta($postID, 'post_views_count', array_sum($days));
}

function trackPostViews ( $post_id ) {
	if (!is_singular('post'))
		return;

	if (empty($post_id))
		$post_id = $GLOBALS['post']->ID;
	setPostViews($post_id);
}

function scheduleDailyCleanup() {
	if (!wp_next_scheduled('dailyCleanupCronjob')) {
		wp_schedule_event(time(), 'daily', 'dailyCleanupCronjob');
	}
}

function dailyCleanup() {
	// get all published posts ids
	$posts = new WP_Query(array(
		'posts_per_page' => -1, 'fields' => 'ids') );
	// date 30 days ago
	$clean_from_date = date('Ymd', strtotime('-30 days'));
	// for every post delete old counters
	foreach ($posts->posts as $postID) {
		$days = get_post_meta($postID, 'post_views_count_days', array());
		if (!empty($days)) {
			foreach ($days as $date => $views) {
				if ($date < $clean_from_date) {
					unset($days[$date]);
				}
			}
			update_post_meta($postID, 'post_views_count_days', $days);
			update_post_meta($postID, 'post_views_count', array_sum($days));
		}
	}
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_action('init', 'scheduleDailyCleanup');
add_action('dailyCleanupCronjob', 'dailyCleanup');
add_action('wp_head', 'trackPostViews');

?>
