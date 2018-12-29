<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

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
		_e( 'Подходящих материалов не найдено' );
		echo '</p>';
	}

	return $ids;
}
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="branch-template">
			<div class="branch-template__main-col">
				<div>
					<?php
						$top_ids = array_merge($h_ids, $v_ids);
						$args = $wp_args;
						$args['post__not_in'] = $top_ids;
						query_posts($args);
						POLITSTURM_MAIN_NEWS::update_posts_load_more($wp_query);
						while (have_posts()) {
							the_post();
							get_template_part('template-parts/articles-branch');
						}
					?>
				</div>
				<div class="news-loadmore">Загрузить ещё</div>
			</div>
			<div class="branch-template__aside-col">
				<?php get_template_part('template-parts/most-readable'); ?>
				<?php get_template_part('template-parts/aside-about'); ?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
