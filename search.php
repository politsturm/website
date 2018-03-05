<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Результаты поиска: %s', 'politsturm' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
						
			The_Grid('Archive grid', true);

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
