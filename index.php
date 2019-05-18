<?php

get_header();
if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) {
	require_once('index_main.php');
} else {
	require_once('index_branch.php');
}

get_footer();
