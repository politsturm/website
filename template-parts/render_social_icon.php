<?php
function render_social_icon ($url, $title, $svg_id) {
	set_query_var('url', $url);
	set_query_var('social_title', $title);
	set_query_var('svg_id', $svg_id);
	get_template_part('template-parts/social');
}

