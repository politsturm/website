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
		<?php
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
				<span class="content-date-single" itemprop="datePublished"><?php echo get_the_date(Y-M-D); ?></span>
			</div>

			</div>

		</div>

		<h1 itemprop="headline name" class="content-title-single">
			<?php the_title(); ?>
		</h1>
		<div class="post-date post-date-mobile">
			<?php echo get_the_date('M d, Y'); ?>
		</div>
		<div class="content-image-single">
			<?php 
				echo "<a data-fancybox='gallery' rel='group' href='" . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . "'>"; 
			?>
				<?php the_post_thumbnail('full', array('itemprop' => 'thumbnailUrl', 'alt' => get_the_title() ) ); ?>
			</a>
		</div>

		<div itemprop="articleBody">
			<?php the_content(); ?>
		</div>

	</div>

<div class="up-button up-button_hidden"><div class="up-button__text">Наверх</div></div>
</article><!-- #article -->


