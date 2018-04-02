<?php

Class POLITSTURM_CUSTOMS {

	public static function favicon() {

		$theme_url = get_template_directory_uri();
		echo '<link rel="shortcut icon" href="' . $theme_url . '/assets/img/favicon/favicon.ico" />';

	}

}

add_action('login_head', array( 'POLITSTURM_CUSTOMS', 'favicon' ) );
add_action('admin_head', array( 'POLITSTURM_CUSTOMS', 'favicon' ) );
add_action('signup_header', array( 'POLITSTURM_CUSTOMS', 'favicon' ) );