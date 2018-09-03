<?php

class POLITSTURM_MAIN_NEWS {

	public static function masonry_script() {
		wp_enqueue_script('masonry');
	}

	public static function init_masonry() {
		wp_enqueue_script('init-masonry', get_stylesheet_directory_uri().'/js/init-masonry.js', array('jquery'));
	}

	// MUST be called from page before script using
	public static function update_posts_load_more($query) {
		wp_enqueue_script('load-more', get_stylesheet_directory_uri().'/js/load-more.js', array('jquery'));

		$page = $query->get('paged') ? $query->get('paged') : 1;
		wp_localize_script('load-more', 'load_more_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode($query->query_vars),
			'current_page' => $page,
			'max_page' => $query->max_num_pages
		));
	}

	public static function load_more_ajax_handler(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
		$args['posts_per_page'] = 6;

		query_posts($args);

		while (have_posts()) {
			the_post();
			get_template_part('template-parts/article');
		}
		die;
	}

}

add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'masonry_script' ));
add_action( 'wp_enqueue_scripts',      array( 'POLITSTURM_MAIN_NEWS', 'init_masonry'));
add_action( 'wp_ajax_loadmore',        array( 'POLITSTURM_MAIN_NEWS', 'load_more_ajax_handler'));
add_action( 'wp_ajax_nopriv_loadmore', array( 'POLITSTURM_MAIN_NEWS', 'load_more_ajax_handler'));
