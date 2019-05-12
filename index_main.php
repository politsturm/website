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
		<div class="news-loadmore">
			<?php _e('Load more', 'politsturm'); ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
