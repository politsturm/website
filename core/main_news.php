<?php

class POLITSTURM_MAIN_NEWS {

	public static function masonry_script() {
		wp_enqueue_script('masonry');
	}

	public static function init_masonry() {
		wp_enqueue_script('jquery');
		wp_register_script('init-masonry', get_stylesheet_directory_uri().'/js/init-masonry.js', array('jquery'));
		wp_enqueue_script('init-masonry');
	}

	public static function load_more_script() {
		global $wp_query;

		wp_enqueue_script('jquery');
		wp_register_script('load-more', get_stylesheet_directory_uri().'/js/load-more.js', array('jquery'));
	 
		wp_localize_script('load-more', 'load_more_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode($wp_query->query_vars),
			'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );
	 
		wp_enqueue_script('load-more');
	}

	public static function print_post() {
		echo '<article class="grid-post">';
		{
			the_post();
			$image = get_the_post_thumbnail_url($post->ID, 'large');
			if ($image) {
				echo '<img src="' . $image. '" width="100%"  hspace="0" vspace="0" style="display:block;">';
			}
			echo '<h2>';
			the_title();
			echo '</h2>';
			the_excerpt();
			echo '<a href="';
			the_permalink();
			echo '">Читать далее...</a>';
		}
		echo '</article>';
	}
	 
}

add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_MAIN_NEWS', 'masonry_script' ));
add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_MAIN_NEWS', 'init_masonry'));

add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_MAIN_NEWS', 'load_more_script'));
