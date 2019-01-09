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
	<div class="footer-wrapper">
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
					social('https://www.youtube.com/channel/UCdWGGzM6fX5xVq1gDNZev0A', 'Youtube', '#youtube');
					social("https://vk.com/politsturm",            "Вконтакте",   "#vk");
					social("https://twitter.com/politsturm",       "Twitter",     "#twitter");
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
</div>

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(40836644, "init", {
        id:40836644,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/40836644" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
