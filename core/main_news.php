<?php

class POLITSTURM_MAIN_NEWS {

	public static function masonry_script() {
		wp_enqueue_script('masonry');
	}

}

add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_MAIN_NEWS', 'masonry_script' ));
