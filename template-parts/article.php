<article class="grid-post">
	<a href="<?php the_permalink();?>">
		<?php
			$image = get_the_post_thumbnail_url($post->ID, 'medium');
			if ($image) {
				?>
				<img src="<?php echo $image;?>" width="100%"  hspace="0" vspace="0" style="display:block;">
				<?php
			}
		?>
	</a>
	<h2>
		<?php the_title();?>
	</h2>
</article>
