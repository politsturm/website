<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

?>

<?
	error_reporting(E_ALL);
	ini_set('display_errors',1);

?>

<link href="/wp-content/themes/politsturm/book-single.css" rel="stylesheet" media="all" />
<article itemscope itemtype=http://schema.org/Article id="post-<?php the_ID(); ?>" class="content-post-single">
<meta itemprop="inLanguage" content="ru" />

	<div class="content-upmeta-single">
		<?php
			setup_postdata($post);
			get_template_part('template-parts/microrazmetka');
		?>
	</div>

	<div class="content-summary-single">


		<div itemprop="articleBody">
		  <div class="vc_row wpb_row vc_row-fluid">
			<div class="wpb_column vc_column_container vc_col-sm-5">
			  <div class="vc_column-inner ">
				<div class="wpb_wrapper">
				  <div class="wpb_single_image wpb_content_element vc_align_left   pow">
					<figure class="wpb_wrapper vc_figure">
					  <div class="vc_single_image-wrapper   vc_box_border_grey"><?php the_post_thumbnail('medium', array('itemprop' => 'thumbnailUrl', 'alt' => get_the_title() ) ); ?></div>
					</figure>
				  </div>
				</div>
			  </div>
			</div>
			<div class="wpb_column vc_column_container vc_col-sm-7">
			  <div class="vc_column-inner ">
				<div class="wpb_wrapper">
				  <div class="wpb_text_column wpb_content_element  pow">
					<div class="wpb_wrapper">
					  <h2><?php the_title(); ?></h2>
					  <p><strong>// АВТОР: </strong><?= get_post_meta($post->ID, "автор", 1) ?></p>
					  <p><strong>// ГОД:</strong> <?= get_post_meta($post->ID, "год", 1) ?></p>
					  <p><strong>// ОПИСАНИЕ::</strong></p>
					  <p><?= the_content() ?></p>
					  <p><a class="download_book_button" href="<?= get_field("файл")['url'] ?>">Скачать</a></p>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>










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





	</div>


</article><!-- #article -->


