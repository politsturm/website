<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

			<div class="main-news">
				<?php
					global $wp_query;
					$template_name = POLITSTURM_BRANCH::get_article_template_name();
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/'.$template_name);
					}
					$wp_query->set('paged', 1);
					LOAD_MORE::update_posts_load_more($wp_query);
				?>
			</div>
			<div class="news-loadmore">Загрузить ещё</div>
		</div>
	</main>
</div>
