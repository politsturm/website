<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-single', get_post_format() );
			endwhile; // End of the loop.
			?>

			<h2 class="related-title"> Похожие материалы </h2>
			<div class="related-container">
					<?php
					$this_id = get_the_ID();
					$tagss = wp_get_post_terms($this_id, 'post_tag', array("fields" => "ids"));

					$args = array(
						'post_type' => 'post',
						'meta_key' => 'choce',
						'meta_value' => 's1',
						'showposts' => '3',
						'post__not_in' => array($this_id),
						'orderby' => 'rand ',
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
						_e( 'Подходящих материалов не найдено' );
						echo '</p>';
					}
					?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
