<?php

Class POLITSTURM_BRANCH {

	public static function is_main_site() {
		$site_type = get_option('site_type');
		if (count($site_type) < 1) {
			return true;
		}

		return $site_type[0] == "main";
	}

	public static function branch_name() {
		return get_option('branch_name');
	}
}
