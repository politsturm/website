<a href="<?php the_permalink();?>" class="grid-post__wrapper">
	<article class="grid-post">
<?php
		if (in_category('video')) {
			$content = get_the_content();
			$youtube_regex = '/https.*\?v\=(.[_0-9a-zA-Z]+)|https.*youtu\.be\/(.[_0-9a-zA-Z\-]+)/i';

			preg_match_all($youtube_regex, $content, $match);

			$youtube_link = empty($match[1][0]) ? $match[2][0] : $match[1][0];
?>
			<iframe
				width="100%"
				height="345"
				class="article__video"
				src="https://www.youtube.com/embed/<?php echo $youtube_link;?>"
				frameborder="0"
				allow="autoplay; encrypted-media"
				allowfullscreen>
			</iframe>
<?php
		} else {
			$image = get_the_post_thumbnail_url($post->ID, 'medium');
			if ($image) {
?>
				<div class="main-card__cover" style="background-image: url(<?php echo $image ?>)">
					<img class="main-card__image" src="<?php echo $image ?>" width="100%"  hspace="0" vspace="0" style="display:block;">
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
