<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package politsturm
 */

?>

	</div><!-- #content -->

<div id="footer">
	<div class="footer-wrap">
	
		<div class="footer-area"><?php dynamic_sidebar('footer-1'); ?></div>
		
		<div class="footer-area"><?php dynamic_sidebar('footer-2'); ?></div>
		
		<div class="footer-area"><?php dynamic_sidebar('footer-3'); ?></div>
	
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
