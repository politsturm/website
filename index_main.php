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
						$args['posts_per_page'] = 4;
						$args['category_name'] = 'news';
						$args['tag__not_in'] = array(); # Show LeftView
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
						<?php _e('More news'); ?> <span class="news-more-arrow">&gt;</span>
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
				LOAD_MORE::update_posts_load_more($wp_query);
				$template_name = POLITSTURM_BRANCH::get_article_template_name();
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/'.$template_name);
				}
			?>
		</div>
		<div class="news-loadmore">
			<?php _e('Load more'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
