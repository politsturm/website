<?php

Class POLITSTURM_DEREGISTER {

	public static function deregister_styles()    {
		//wp_deregister_style( 'amethyst-dashicons-style' );
		wp_deregister_style( 'dashicons' );
	}

}

add_action( 'wp_print_styles', array( 'POLITSTURM_DEREGISTER', 'deregister_styles' ), 100 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');