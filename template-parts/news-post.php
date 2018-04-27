<div class="news-post">
	<div class="news-post-date-desktop">
		<?php echo get_the_date('Y-m-d'); ?>
	</div>
	<div class="news-post-body">
		<span class="news-post-date-mobile"><?php echo get_the_date('m.d'); ?></span>
		<a href="<?php the_permalink();?>">
			<?php the_title(); ?>
		</a>
	</div>
</div>
