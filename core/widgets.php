<?php

Class POLITSTURM_WIDGETS {

	public static function register_areas() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'politsturm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'politsturm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name' => "Footer 1",
			'id' => 'footer-1',
			'description' => 'Footer 1',
		) );
		register_sidebar( array(
			'name' => "Footer 2",
			'id' => 'footer-2',
			'description' => 'Footer 2',
		) );
		register_sidebar( array(
			'name' => "Footer 3",
			'id' => 'footer-3',
			'description' => 'Footer 3',
		) );

	}

}

add_action( 'widgets_init', array( 'POLITSTURM_WIDGETS', 'register_areas' ) );