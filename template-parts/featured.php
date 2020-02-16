<a href="<?php the_permalink(); ?>">
<div class="top-hitem" itemscope itemtype=http://schema.org/Article>
	<?php
		if ( in_category( 'video' )) { ?>
			<?php
				$content = get_the_content();
				$youtube_code = get_youtube_code($content);
			?>

			<iframe width="100%" height="479px" class="featured__video" src="https://www.youtube.com/embed/<?php echo $youtube_code;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<?php } else {
			$image = get_the_post_thumbnail_url($post->ID, 'large');
			if ($image) {
?>
				<div class="main-card__cover main-card__featured" style="background-image: url(<?php echo $image ?>)">
					<img class="main-card__image" src="<?php echo $image ?>" width="100%"  hspace="0" vspace="0" style="display:block;">
				</div>
<?php
			}
		}
?>

	<div class="featured__text">
		<div class="featured__category">
			<?php get_template_part('template-parts/category'); ?>
		</div>
		<div class="featured__title">
			<?php the_title(); ?>
		</div>
	</div>
</div>
</a>
