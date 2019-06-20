<?php

abstract class SiteType {
	const UnknownType = 0;
	const MainSite = 1;
	const BranchSite = 2;
}

class Social {
	public $url;
	public $title;
	public $svg_id;
}

class POLITSTURM_BRANCH {

	public static function get_site_type() {
		$site_type = get_option('site_type');
		if (is_array($site_type) && count($site_type) < 1) {
			return UnknownType;
		}

		switch ($site_type[0]) {
		case "main":
			return SiteType::MainSite;
		case "branch":
			return SiteType::BranchSite;
		default:
			return SiteType::UnknownType;
		}
	}

	public static function get_branch_name() {
		return get_option('branch_name');
	}

	public static function get_popular_timeout() {
		return get_option('popular_timeout');
	}

	public static function get_social_networks() {
		$raw_networks = get_option('social_networks_list');
		if (!is_string($raw_networks))
			return array();

		$networks = array();
		$networks_lines = explode(PHP_EOL, $raw_networks);
		foreach ($networks_lines as $line) {
			if ($line === "") {
				continue;
			}

			$values = explode(',', $line);
			if (count($values) != 3) {
				continue;
			}

			$network = new Social();
			$network->url = trim($values[0]);
			$network->title = trim($values[1]);
			$network->svg_id = trim($values[2]);
			array_push($networks, $network);
		}

		return $networks;
	}

	public static function get_article_template_name() {
		$site_type = POLITSTURM_BRANCH::get_site_type();
		switch ($site_type) {
			case SiteType::MainSite:
				return 'article';
			case SiteType::BranchSite:
				return 'articles-branch';
		}
		return 'article';
	}

}
