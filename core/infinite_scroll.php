<?php

class POLITSTURM_INFINITE_SCROLL {

	public static function init_scroll() {
		wp_enqueue_script('infinite-scroll', get_stylesheet_directory_uri().'/js/infinite-scroll.js');
	}
}

if (POLITSTURM_BRANCH::get_site_type() == SiteType::BranchSite) {
	add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_INFINITE_SCROLL', 'init_scroll'));
}
