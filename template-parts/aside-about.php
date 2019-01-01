<div class="aside-about">
	<div class="aside-social">
		<ul class="aside-social__list">
			<?php
			function render_social_icon ($url, $title, $svg_id) {
				set_query_var('url', $url);
				set_query_var('title', $title);
				set_query_var('svg_id', $svg_id);
				get_template_part('template-parts/social');
			}
			render_social_icon('https://www.facebook.com/politsturm/', 'Facebook',    '#facebook');
			render_social_icon('https://www.youtube.com/channel/UCdWGGzM6fX5xVq1gDNZev0A', 'Youtube', '#youtube');
			render_social_icon('https://vk.com/politsturm',            'Вконтакте',   '#vk');
			render_social_icon('https://twitter.com/politsturm',       'Twitter',     '#twitter');
			render_social_icon('https://t.me/politsturm',              'Telegram',    '#telegram');
			?>
		</ul>
	</div>
	<div class="aside-footer">
		<div><?php dynamic_sidebar('footer-1'); ?></div>
		<div><?php dynamic_sidebar('footer-2'); ?></div>
		<div><?php dynamic_sidebar('footer-3'); ?></div>
	</div>
</div>
