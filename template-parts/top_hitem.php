<div class="top-hitem" itemscope itemtype=http://schema.org/Article>
	<?php
		if ( in_category( 'video' )) { ?>
			<?php
				$content = get_the_content();
				$youtube_code = get_youtube_code($content);
			?>

			<iframe width="100%" class="top-hitem__video" src="https://www.youtube.com/embed/<?php echo $youtube_code;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<?php } else { ?>
			<a href="<?php the_permalink(); ?>">
				<?php $url = get_the_post_thumbnail_url( $post->ID, 'medium_large' ); ?>
				<img src="<?php echo $url; ?>" width="100%"  hspace="0" vspace="0" style="display:block;">
			</a>
		<?php } ?>
	<div><?php the_title(); ?></div>
</div>

