<?php

class LOAD_MORE {

	public static function update_posts_load_more($query) {
		wp_enqueue_script('load-more', get_stylesheet_directory_uri().'/js/load-more.js');

		$page = $query->get('paged') ? $query->get('paged') : 1;
		wp_localize_script('load-more', 'load_more_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode($query->query_vars),
			'current_page' => $page,
			'max_page' => $query->max_num_pages
		));
	}

	private static function get_template_name($site_type) {
		switch ($site_type) {
			case 'main':
				return 'article';
			case 'branch':
				return 'articles-branch';
		}
		return 'article';
	}

	public static function load_more_ajax_handler() {
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';

		$template_name = LOAD_MORE::get_template_name($_POST['site_type']);

		query_posts($args);

		while (have_posts()) {
			the_post();
			get_template_part('template-parts/'.$template_name);
		}
		die;
	}
}

add_action( 'wp_ajax_loadmore',        array( 'LOAD_MORE', 'load_more_ajax_handler'));
add_action( 'wp_ajax_nopriv_loadmore', array( 'LOAD_MORE', 'load_more_ajax_handler'));
