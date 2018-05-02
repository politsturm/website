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
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="mp-top padhed">
				<div class="top-white-background"> </div>
				<div class="mp-top-container">
					<div class="top-hitems">
						<?php
							$query = new WP_Query('meta_key=choce&meta_value=s1&showposts=2');
							if ($query->have_posts()) {
								while ($query->have_posts()) {
									$query->the_post();
									get_template_part('template-parts/top_hitem');
									get_template_part('template-parts/microrazmetka');
								}
							wp_reset_postdata();
							} else {
								echo '<p>';
								_e( 'Подходящих материалов не найдено' );
								echo '</p>';
							}
						?>

					</div>

					<?php
						$query = new WP_Query('meta_key=choce&meta_value=s2&showposts=1');
						if ($query->have_posts()) {
							while ($query->have_posts()) {
								$query->the_post();
								get_template_part('template-parts/top_vitem');
								get_template_part('template-parts/microrazmetka');
							}
							wp_reset_postdata();
						} else {
							echo '<p>';
							_e('Подходящих материалов не найдено');
							echo '</p>';
						}
					?>


				</div>
				<div class="mnews">
					<div class="news-title">Новости</div>

					<?php
						global $post;
						$args = array( 'numberposts' => 5, 'category' => 'news' );
						$posts = get_posts( $args );
						foreach( $posts as $post ) {
							setup_postdata($post);
							get_template_part( 'template-parts/news-post' );
						}
						wp_reset_postdata();
					?>

					<div class="news-more">
						<a href="/category/news/">
							Больше новостей <span class="news-more-arrow">&gt;</span>
						</a>
					</div>
				</div>
			</div>

			<div class="main-news">
				<?php
					while (have_posts()) {
						get_template_part( 'template-parts/article' );
					}
				?>
			</div>
			<div class="news-loadmore">Загрузить ещё</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
