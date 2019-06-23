<div class="most-readable">
	<h3 class="most-readable__title">
		<?php _e('Popular', 'politsturm'); ?>
	</h3>
	<div class="most-readable__content">
		<?php
			$timeout = POLITSTURM_BRANCH::get_popular_timeout();
			if ($timeout == '') {
				$timeout = 3;
			}
			$args = array(
				'posts_per_page' => '4',
				'orderby' => 'meta_value_num',
				'meta_key' => 'post_views_count',
				'order' => 'DESC',
				'date_query' => array(
					array(
						'after' => $timeout.' month ago'
					)
				)
			);
			$query = new WP_Query($args);
			while ($query->have_posts()) : $query->the_post();
		?>
			<div class="most-readable__item">
				<a class="most-readable__item-title" href="<?php the_permalink(); ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<div class="most-readable__item-time">
					<?php echo get_the_date('M d, Y'); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
