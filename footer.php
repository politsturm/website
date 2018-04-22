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
	<div class="social">
		<ul>
			<?php
				function social($url, $title, $svg_id) {
					set_query_var("url", $url);
					set_query_var("title", $title);
					set_query_var("svg_id", $svg_id);
					get_template_part('template-parts/social') ;
				}
				social("https://www.facebook.com/politsturm/", "Facebook",    "#facebook");
				social("https://vk.com/politsturm",            "Вконтакте",   "#vk");
				social("https://twitter.com/politsturm",       "Twitter",     "#twitter");
				social("http://politshturm.livejournal.com/",  "LiveJournal", "#livejournal");
				social("https://t.me/politsturm",              "Telegram",    "#telegram");
			?>
	  </ul>
	</div>

	<div class="footer-wrap">
		<div class="footer-area"><?php dynamic_sidebar('footer-1'); ?></div>

		<div class="footer-area"><?php dynamic_sidebar('footer-2'); ?></div>

		<div class="footer-area"><?php dynamic_sidebar('footer-3'); ?></div>

	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
