<?php

include_once('render_social_icon.php');
$networks = POLITSTURM_BRANCH::get_social_networks();
foreach ($networks as $social) {
	render_social_icon($social->url, $social->title, $social->svg_id);
}
