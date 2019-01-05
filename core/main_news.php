<?php

class POLITSTURM_MAIN_NEWS {

	public static function masonry_script() {
		wp_enqueue_script('masonry');
	}

	public static function init_masonry() {
		wp_enqueue_script('init-masonry', get_stylesheet_directory_uri().'/js/init-masonry.js', array('jquery'));
	}

	public static function init_load_more() {
		wp_enqueue_script('load-more-masonry', get_stylesheet_directory_uri().'/js/load-more-masonry.js', array('jquery'));
	}
}

if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) {
	add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'masonry_script' ));
	add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'init_masonry'));
	add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'init_load_more'));
}
