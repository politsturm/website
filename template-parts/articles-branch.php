<article class='articles-branch'>
<?php
	if ( in_category( 'video' )) {
		$content = get_the_content();
		$youtube_code = get_youtube_code($content);
		$src = 'src="https://www.youtube.com/embed/'.$youtube_code.'"';
		$html = '<iframe width="100%" height="420" class="article__video articles-branch__video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen '.$src.'></iframe>';
	} else {
		$image = get_the_post_thumbnail_url($post->ID, 'large');

		if ($image) {
			$html =
			'<div class="branch-card__cover lazy" style="background-image: url('.$image.')">
				<img class="branch-card__image" src="'.$image.'" width="100%"  hspace="0" vspace="0" style="display:block;" loading="lazy">
			</div>';
		} else {
			$html = '';
		}
	}

	if ($html) {
?>
	<a href="<?php the_permalink();?>">
		<div class="branch-card">
			<?php echo $html; ?>
			<div class="branch-card__text">
				<h2 class="branch-card__title">
					<?php the_title();?>
				</h2>
				<div class="branch-card__info">
					<div class="branch-card__date"><?php echo get_the_date('d M, Y'); ?></div>
<?php
					if (!in_category('video')) { ?>
						<div class="branch-card__time">
							<?php get_template_part('template-parts/reading-time'); ?>
						</div>
<?php
					} ?>
				</div>
<?php
			if (!in_category('video')) { ?>
				<div class="branch-card__excerpt">
					<?php the_excerpt();?>
				</div>
<?php
			} ?>
			</div>
		</div>
	</a>
<?php
	} ?>
</article>
