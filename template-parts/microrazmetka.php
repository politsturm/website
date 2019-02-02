<div class="microrazmetka" style="display:none;">

	<?php $iurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<span itemprop="headline name"> <?php the_title(); ?></span>
	<span itemprop="datePublished"> <?php echo get_the_date('Y-M-D'); ?></span>
	<span itemprop="description"> <?php echo get_the_excerpt(); ?> </span>
	<span itemprop="image"><?php echo $iurl; ?></span>
	<span style="display:none;" itemprop="keywords"><?php echo get_the_tag_list( '', ', ' ); ?> ,<?php echo get_the_category_list(', '); ?></span>

	<span style="display:none;" itemprop="publisher" itemscope="itemscope" itemtype="http://schema.org/Organization">
		<span style="display:none;" itemprop="name">
			politsturm.com - <?php echo get_bloginfo('description'); ?>
		</span>
		<img src="https://politsturm.com/wp-content/uploads/2017/02/Без-имени-1.png" style="display:none;" itemprop="logo">
		<span style="display:none;" itemprop="email">
			politsturm@gmail.com
		</span>
		<a href="https://politsturm.com/" itemprop="url" style="display:none;">
			politsturm.com - <?php echo get_bloginfo('description'); ?>
		</a>
	</span>

</div>
