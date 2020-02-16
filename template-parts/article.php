<a href="<?php the_permalink();?>" class="grid-post__wrapper">
	<article class="grid-post">
<?php
		if (in_category('video')) {
			$content = get_the_content();
			$youtube_code = get_youtube_code($content);
?>
			<iframe
				width="100%"
				height="305"
				class="article__video"
				src="https://www.youtube.com/embed/<?php echo $youtube_code;?>"
				frameborder="0"
				allow="autoplay; encrypted-media"
				allowfullscreen>
			</iframe>
<?php
		} else {
			$image = get_the_post_thumbnail_url($post->ID, 'medium_large');
			if ($image) {
?>
				<div class="main-card__cover lazy" style="background-image: url(<?php echo $image ?>)">
					<img class="main-card__image" src="<?php echo $image ?>" width="100%"  hspace="0" vspace="0" style="display:block;" loading="lazy">
				</div>
<?php
			}
		}
?>
		<div class="grid-post__text">
			<div class="grid-post__category">
				<?php get_template_part('template-parts/category'); ?>
			</div>
			<div class="grid-post__title">
				<?php the_title();?>
			</div>
		</div>
	</article>
</a>
