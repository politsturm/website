<a href="<?php the_permalink();?>">
	<article class="grid-post">
		<?php
		if ( in_category( 'video' )) { ?>
			<?php
				$content = get_the_content();
				preg_match_all('/https.*\?v\=(.[0-9a-zA-Z]+)|https.*youtu\.be\/(.[_0-9a-zA-Z\-]+)/i', $content, $match);

				$youtube_link = empty($match[1][0]) ? $match[2][0] : $match[1][0];
			?>

			<iframe width="100%" height="225" class="article__video" src="https://www.youtube.com/embed/<?php echo $youtube_link;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<?php } else {
				$image = get_the_post_thumbnail_url($post->ID, 'medium');

				if ($image) {
					?>
					<img src="<?php echo $image;?>" width="100%"  hspace="0" vspace="0" style="display:block;">
					<?php
				}

			?>
		<?php } ?>
		<h2>
			<?php the_title();?>
		</h2>
	</article>
</a>
