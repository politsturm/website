<div class="news-post">
	<div class="news-post-date">
		<span><?php echo get_the_date('Y-m-d'); ?></span>
	</div>
	<div class="news-post-body">
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a>
	</div>
</div>
