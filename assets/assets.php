<?php

Class POLITSTURM_ASSETS {

	public static function styles() {
		wp_enqueue_style( 'politsturm-style', get_stylesheet_uri() );
	}


	public static function scripts() {
		wp_enqueue_script( 'politsturm-navigation', get_template_directory_uri() . '/js/index.js', array(), '', true );
	}

}

add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_ASSETS', 'scripts' ) );
add_action( 'wp_enqueue_scripts', array( 'POLITSTURM_ASSETS', 'styles' ) );
