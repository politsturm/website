<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

?>

<article itemscope itemtype=http://schema.org/Article id="post-<?php the_ID(); ?>" class="content-post-single">
<meta itemprop="inLanguage" content="ru" />
	
	<div class="content-upmeta-single">
	
		<?php $cho = get_post_meta($post->ID, 'choce', true);
		if ($cho == 's1') { ?>
	
		<div class="content-image-single">
		<?php the_post_thumbnail('full', array('itemprop' => 'thumbnailUrl', 'alt' => get_the_title() ) ); ?>
		</div>
		
		<?php } else { ?>
		
		<div class="content-image-single-v">
		<?php the_post_thumbnail('full', array('itemprop' => 'thumbnailUrl', 'alt' => get_the_title() ) ); ?>
		</div>
			
		<?php } ?>
		
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
		
	<div class="content-summary-single">		
				
		<div class="content-meta-card">		
			
			<div itemprop="author" itemscope itemtype="http://schema.org/Person" class="content-author-info-single">
			
			<div class="autor-box-left"> 
				<div class="author-box-avatar-single"><?php $avatar = get_the_author_meta('basic_user_avatar'); ?> <img class="single-avatar" src="<?php echo $avatar['96']; ?>"></div>
			</div>
			
			<div class="autor-box-right">
				<span class="author-posts-single" itemprop="name"><?php echo get_the_author_meta('display_name'); ?></span><br>			
				<span class="content-date-single" itemprop="datePublished"><?php echo get_the_date(Y-M-D); ?></span>
			</div>	
				
			</div>
			
		</div>	
		
				
		
		<h1 itemprop="headline name" class="content-title-single">
			<?php the_title(); ?>
		</h1>		
	
		<?php echo get_the_tag_list('<ul class="content-tags-single"><li class="content-tag">',',&nbsp;</li><li class="content-tag">','</li></ul>'); ?>	
		
		<div itemprop="articleBody">
		<?php the_content(); ?>
		</div>
		
	</div>
		
</article><!-- #article -->


