<article class="grid-post">
	<?php
		the_post();
		$link = get_the_permalink();
		$image = get_the_post_thumbnail_url($post->ID, 'large');
		if ($image) {
			?>
			<img src="<?php echo $image;?>" width="100%"  hspace="0" vspace="0" style="display:block;">
			<?php
		}
	?>
	<h2>
		<?php the_title();?>
	</h2>
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink();?>">Читать далее...</a>
</article>
