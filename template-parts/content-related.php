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
			<?php the_post_thumbnail('full', array(
					'itemprop' => 'thumbnailUrl',
					'alt' => get_the_title()
				));
			?>
		</a>

		<!-- Начало микроразметки -->
		<div class="microrazmetka" style="display:none;">

		<?php $iurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<span itemprop="headline name"> <?php the_title(); ?></span>
		<span itemprop="datePublished"> <?php echo get_the_date(Y-M-D); ?></span>
		<span itemprop="description"> <?php echo get_the_excerpt(); ?> </span>
		<span itemprop="image"><?php echo $iurl; ?></span>
		<span style="display:none;" itemprop="keywords"><?php echo get_the_tag_list( '', ', ' ); ?> ,<?php echo get_the_category_list(', '); ?></span>

		<span style="display:none;" itemprop="publisher" itemscope="itemscope" itemtype="http://schema.org/Organization">
			<span style="display:none;" itemprop="name">politsturm.com - Социалистический информационный ресурс</span>
			<img src="https://politsturm.com/wp-content/uploads/2017/02/Без-имени-1.png" style="display:none;" itemprop="logo">
			<span style="display:none;" itemprop="email">politsturm@gmail.com</span>
			<a href="https://politsturm.com/" itemprop="url" style="display:none;">politsturm.com - Социалистический информационный ресурс</a>
			<span style="display:none;" itemprop="address">USSR</span>
			<span style="display:none;" itemprop="telephone">+79192335725</span>
		</span>

		</div>
		<!-- Конец микроразметки -->

	</div>

	<div class="related-post-content">
		<h3 class="related-post-title" itemprop="headline name">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
	</div>

</article>
