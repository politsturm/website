<?php

class POLITSTURM_MAIN_NEWS {

	public static function masonry_script() {
		wp_enqueue_script('masonry');
	}

	public static function init_masonry() {
		wp_enqueue_script('init-masonry', get_stylesheet_directory_uri().'/js/init-masonry.js', array('jquery'));
	}

	public static function load_more_script() {
		global $wp_query;

		wp_enqueue_script('load-more', get_stylesheet_directory_uri().'/js/load-more.js', array('jquery'));
		wp_localize_script('load-more', 'load_more_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode($wp_query->query_vars),
			'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );
	}

	public static function load_more_ajax_handler(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
	 
		query_posts($args);
	 
		while (have_posts()) {
			get_template_part( 'template-parts/article' );
		}
		die;
	}
}
 
add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'masonry_script' ));
add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'init_masonry'));
add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'load_more_script'));
add_action( 'wp_ajax_loadmore',        array( 'POLITSTURM_MAIN_NEWS', 'load_more_ajax_handler'));
add_action( 'wp_ajax_nopriv_loadmore', array( 'POLITSTURM_MAIN_NEWS', 'load_more_ajax_handler'));

