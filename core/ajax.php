<?php

class POLITSTURM_AJAX {

	public static function load_more_ajax_handler(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
	 
		query_posts($args);
	 
		while (have_posts()) {
			POLITSTURM_MAIN_NEWS::print_post();
		}
		die;
	}
}
 
add_action('wp_ajax_loadmore', array( 'POLITSTURM_AJAX', 'load_more_ajax_handler'));
add_action('wp_ajax_nopriv_loadmore', array( 'POLITSTURM_AJAX', 'load_more_ajax_handler'));
