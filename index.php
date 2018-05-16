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

		<div class="mp-top padhed">
			<div class="top-white-background"></div>
			<div class="mp-top-container">
				<div class="top-hitems">
					<?php $h_ids = load_top_posts('s1', 2, 'hitem'); ?>
				</div>
				<?php $v_ids = load_top_posts('s2', 1, 'vitem'); ?>
			</div>
			<div class="mnews">
				<div class="news-title">Новости</div>

				<div class="news-posts">
					<?php
						global $wp_query;
						$wp_args = $wp_query->query_vars;
						$args = $wp_args;
						$args['posts_per_page'] = 5;
						$args['category_name'] = 'news';
						query_posts($args);
						while (have_posts()) {
							the_post();
							get_template_part('template-parts/news-post');
						}
						wp_reset_postdata();
					?>
				</div>

				<div class="news-more">
					<a href="/category/news/">
						Больше новостей <span class="news-more-arrow">&gt;</span>
					</a>
				</div>
			</div>
		</div>

		<div class="main-news">
			<?php
				$top_ids = array_merge($h_ids, $v_ids);
				$args = $wp_args;
				$args['post__not_in'] = $top_ids;
				query_posts($args);
				POLITSTURM_MAIN_NEWS::update_posts_load_more($wp_query);
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/article');
				}
			?>
		</div>
		<div class="news-loadmore">Загрузить ещё</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
