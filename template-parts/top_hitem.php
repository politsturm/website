<div class="top-hitem" itemscope itemtype=http://schema.org/Article>
	<?php
		if ( in_category( 'video' )) { ?>
			<?php
				$content = get_the_content();
				$youtube_regex = '/https.*\?v\=(.[0-9a-zA-Z]+)|https.*youtu\.be\/(.[_0-9a-zA-Z\-]+)/i';

				preg_match_all($youtube_regex, $content, $match);

				$youtube_link = empty($match[1][0]) ? $match[2][0] : $match[1][0];
			?>

			<iframe width="100%" class="top-hitem__video" src="https://www.youtube.com/embed/<?php echo $youtube_link;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<?php } else { ?>
			<a href="<?php the_permalink(); ?>">
				<?php $url = get_the_post_thumbnail_url( $post->ID, 'medium_large' ); ?>
				<img src="<?php echo $url; ?>" width="100%"  hspace="0" vspace="0" style="display:block;">
			</a>
		<?php } ?>
</div>

