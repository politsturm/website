<div class="aside-about">
	<div class="aside-social">
		<ul class="aside-social__list">
			<?php
			function social($url, $title, $svg_id) {
				set_query_var('url', $url);
				set_query_var('title', $title);
				set_query_var('svg_id', $svg_id);
				get_template_part('template-parts/social');
			}
			social('https://www.facebook.com/politsturm/', 'Facebook',    '#facebook');
			social('https://www.youtube.com/channel/UCdWGGzM6fX5xVq1gDNZev0A', 'Youtube', '#youtube');
			social('https://vk.com/politsturm',            'Вконтакте',   '#vk');
			social('https://twitter.com/politsturm',       'Twitter',     '#twitter');
			social('https://t.me/politsturm',              'Telegram',    '#telegram');
			?>
		</ul>
	</div>
	<div class="aside-footer">
		<div><?php dynamic_sidebar('footer-1'); ?></div>
		<div><?php dynamic_sidebar('footer-2'); ?></div>
		<div><?php dynamic_sidebar('footer-3'); ?></div>
	</div>
</div>
