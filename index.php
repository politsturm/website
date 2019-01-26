<?php

get_header();
function load_top_posts($meta_value, $count, $class) {
	$ids = array();
	$query = new WP_Query(array(
			'meta_key' => 'choce',
			'meta_value' => $meta_value,
			'showposts' => $count
		)
	);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/top_' . $class);
			get_template_part('template-parts/microrazmetka');
			$ids[] = get_the_ID();
		}
		wp_reset_postdata();
	} else {
		echo '<p>';
		_e( 'No suitable materials found' );
		echo '</p>';
	}

	return $ids;
}


if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) {
	require_once('index_main.php');
} else {
	require_once('index_branch.php');
}

get_footer();
