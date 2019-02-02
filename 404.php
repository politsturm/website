<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<img class="nflogo" src="http://politsturm.com/wp-content/themes/politsturm/images/biglogo-eng-black.png">
			<h1 class="nftitle">
				<?php _e('Error', 'politsturm'); ?> 404
			</h1>
			<span class="nfdesc">
				<?php _e('Nothing found on this link. We recommend to return to the home page or use the search.'); ?>
			</span>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
