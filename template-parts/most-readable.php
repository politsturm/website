<div class="most-readable">
	<h3 class="most-readable__title">Самое Читаемое</h3>
	<div class="most-readable__content">
		<?php
			$args = array(
				'posts_per_page' => '4',
				'orderby' => 'meta_value_num',
				'meta_key' => 'post_views_count',
				'order' => 'DESC'
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