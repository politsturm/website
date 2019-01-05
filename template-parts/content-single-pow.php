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

		<?php
			}

			setup_postdata($post);
			get_template_part('template-parts/microrazmetka');
		?>

	</div>

	<div class="content-summary-single">

		<div class="content-meta-card">

			<div itemprop="author" itemscope itemtype="http://schema.org/Person" class="content-author-info-single">

			<div class="autor-box-left">
				<div class="author-box-avatar-single"><?php $avatar = get_the_author_meta('basic_user_avatar'); ?> <img class="single-avatar" src="<?php echo $avatar['96']; ?>"></div>
			</div>

			<div class="autor-box-right">
				<span class="author-posts-single" itemprop="name"><?php echo get_the_author_meta('display_name'); ?></span><br>
				<span class="content-date-single" itemprop="datePublished"><?php echo get_the_date('Y-M-D'); ?></span>
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


