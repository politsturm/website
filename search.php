<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Результаты поиска: %s', 'politsturm' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div class="main-news">
				<?php
					global $wp_query;
					LOAD_MORE::update_posts_load_more($wp_query);
					$template_name = POLITSTURM_BRANCH::get_article_template_name();
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/'.$template_name);
					}
				?>
			</div>
			<div class="news-loadmore">Загрузить ещё</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
