<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package politsturm
 */

get_header(); ?>

	<?php setPostViews(get_the_ID()); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-single', get_post_format() );
			endwhile; // End of the loop.
			?>

			<div class="main-support">
				<?php _e('Enjoyed the material?', 'politsturm'); ?><br>
				<a href="/support-us">
					<?php _e('Support us!', 'politsturm'); ?>
				</a>
			</div>

			<div class="related-container-title">
				<?php _e('More:', 'politsturm'); ?>
			</div>
			<div class="related-container">
					<?php
					$this_id = get_the_ID();
					$tagss = array_map(function($tag) {
						return $tag->term_id;
					}, wp_get_post_tags($this_id));

					$args = array(
						'post_type' => 'post',
						'showposts' => '3',
						'post__not_in' => array($this_id),
						'orderby' => 'rand',
						'tag__in' => $tagss
					);
					$query = new WP_Query ( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post();
							get_template_part( 'template-parts/content-related', get_post_format() );
						endwhile;


						wp_reset_postdata();
					} else {
						echo '<p>';
						_e('No suitable materials found', 'politsturm');
						echo '</p>';
					}
					?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
