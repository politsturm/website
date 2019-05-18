<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="branch-template">
			<div class="branch-template__main-col">
				<?php $h_ids = load_top_posts('s1', 1); ?>
			</div>
			<div class="branch-template__aside-col">
				<?php
					get_template_part('template-parts/most-readable');
				?>
			</div>
		</div>
		<div class="main-news">
			<?php
				$top_ids = array_merge($h_ids, $v_ids);
				$args = $wp_args;
				$args['post__not_in'] = $top_ids;
				query_posts($args);
				$template_name = POLITSTURM_BRANCH::get_article_template_name();
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/'.$template_name);
				}
				$wp_query->set('paged', 1);
				LOAD_MORE::update_posts_load_more($wp_query);
			?>
		</div>
		<div class="news-loadmore">
			<?php _e('Load more', 'politsturm'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
