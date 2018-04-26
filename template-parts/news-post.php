<div class="news-post">
	<div class="news-post-date">
		<span class="news-post-date-mobile"><?php echo get_the_date('m.d'); ?></span>
		<span class="news-post-date-desktop"><?php echo get_the_date('Y-m-d'); ?></span>
	</div>
	<div class="news-post-body">
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a>
	</div>
</div>
