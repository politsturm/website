(function ($) {
	$(document).ready(function () {
		// const
		var MAIN_MENU_NODE = $('.mmul');
		var ANIMATION_PARAMS = {
			duration: 200,
			easing: 'linear',
			queue: false
		};

		// events
		$('.mob-menu-button').click(openMenu);
		$('.mmul-close').click(closeMenu);
		$('.menu-item-has-children').click(showChilds);

		// handlers
		function openMenu() {
			MAIN_MENU_NODE.fadeIn(ANIMATION_PARAMS);
		}

		function closeMenu() {
			MAIN_MENU_NODE.fadeOut(ANIMATION_PARAMS);
		}

		function showChilds() {
			$('.sub-menu').fadeOut(ANIMATION_PARAMS);
			$(this).children('.sub-menu').fadeIn(ANIMATION_PARAMS);
		}
	});
})(jQuery);
