<article class='articles-branch'>
	<?php
	if ( in_category( 'video' )) { ?>
		<?php
			$content = get_the_content();
			preg_match_all('/https.*\?v\=(.[0-9a-zA-Z]+)|https.*youtu\.be\/(.[0-9a-zA-Z\-]+)/i', $content, $match);

			$youtube_link = empty($match[1][0]) ? $match[2][0] : $match[1][0];
		?>

		<iframe width="100%" height="479" class="article__video articles-branch__video" src="https://www.youtube.com/embed/<?php echo $youtube_link;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

	<?php } else {
		$image = get_the_post_thumbnail_url($post->ID, 'medium');

		if ($image) {
			?>
				<div class="branch-card">
					<a href="<?php the_permalink();?>" class="branch-card__cover" style="background-image: url(<?php echo $image;?>)">
						<img class="branch-card__image" src="<?php echo $image;?>" width="100%"  hspace="0" vspace="0" style="display:block;">
					</a>
					<div class="branch-card__text">
						<h2 class="branch-card__title">
							<?php the_title();?>
						</h2>
						<div class="branch-card__info">
							<div class="branch-card__date"><?php echo get_the_date('d M, Y'); ?></div>
							<div class="branch-card__time">
								<?php get_template_part('template-parts/reading-time'); ?>
							</div>
						</div>
						<p class="branch-card__excerpt"><?php the_excerpt();?></p>
						<a href="<?php the_permalink();?>" class="branch-card__read-more">Читать далее</a>
					</div>
				</div>
			<?php
		}
	} ?>
</article>
