<?php

abstract class SiteType {
	const UnknownType = 0;
	const MainSite = 1;
	const BranchSite = 2;
}

Class POLITSTURM_BRANCH {

	public static function get_site_type() {
		$site_type = get_option('site_type');
		if (count($site_type) < 1) {
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
