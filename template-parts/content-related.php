<?php
/**
 * Template part for displaying related-posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

?>

<article itemscope itemtype=http://schema.org/Article class="related-post">

	<div class="related-post-image">

		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium_large', array(
					'itemprop' => 'thumbnailUrl',
					'alt' => get_the_title()
				));
			?>
		</a>

		<?php
			setup_postdata($post);
			get_template_part('template-parts/microrazmetka');
		?>
	</div>

	<div class="related-post-content">
		<h3 class="related-post-title" itemprop="headline name">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
	</div>

</article>
