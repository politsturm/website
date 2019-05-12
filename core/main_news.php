<?php

class POLITSTURM_MAIN_NEWS {
	public static function init_load_more() {
		wp_enqueue_script('load-more-masonry', get_stylesheet_directory_uri().'/js/load-more-masonry.js', array('jquery'));
	}
}

if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) {
	add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'init_load_more'));
}
