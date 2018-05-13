<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="">

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="main-news">
					<?php
						global $wp_query;
						POLITSTURM_MAIN_NEWS::update_posts_load_more($wp_query);
						while (have_posts()) {
							the_post();
							get_template_part( 'template-parts/article' );
						}
					?>
				</div>
				<div class="news-loadmore">Загрузить ещё</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
