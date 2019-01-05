<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="branch-template">
			<div class="branch-template__main-col">
				<?php
					global $wp_query;
					query_posts($wp_args);
					LOAD_MORE::update_posts_load_more($wp_query);
				?>
			</div>
			<div class="branch-template__aside-col">
				<?php
					get_template_part('template-parts/most-readable');
					get_template_part('template-parts/main-link');
					get_template_part('template-parts/aside-about');
				?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
