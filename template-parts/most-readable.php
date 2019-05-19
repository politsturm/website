<div class="most-readable">
	<?php
		if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) {
			$header_class = 'most-readable__main-title';
			$header_text = __('Most popular', 'politsturm');
			$content_class = 'most-readable__main-content';
		} else {
			$header_class = 'most-readable__branch-title';
			$header_text = __('Popular', 'politsturm');
			$content_class = 'most-readable__content';
		}
	?>
	<h3 class="<?php echo $header_class; ?>">
		<?php echo $header_text; ?>
	</h3>
	<?php if (POLITSTURM_BRANCH::get_site_type() == SiteType::MainSite) { ?>
		<div class="most-readable__separator"></div>
	<?php } ?>
	<div class="<?php echo $content_class; ?>">
		<?php
			$args = array(
				'posts_per_page' => '4',
				'orderby' => 'meta_value_num',
				'meta_key' => 'post_views_count',
				'order' => 'DESC',
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
