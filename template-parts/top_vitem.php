<div class="top-vitem" itemscope itemtype=http://schema.org/Article>
	<a href="<?php the_permalink(); ?>">
		<?php
			// For vertical images `medium_large` is larger than `large`
			$url = get_the_post_thumbnail_url( $post->ID, 'large' );
		?>
		<img src="<?php echo $url; ?>" width="100%"  hspace="0" vspace="0" style="display:block;">
	</a>
</div>
