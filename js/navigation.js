(function ($) {
	$(document).ready(function () {
		// const
		var MAIN_MENU_NODE = $('.mmul');
		var SEARCH_NODE = $('.search');
		var SEACH_INPUT = $('.search input');
		var OVERLAY = $('.header-overlay');
		var ANIMATION_PARAMS = {
			duration: 200,
			easing: 'linear',
			queue: false
		};

		// events
		$('.mob-menu-button').click(openMenu);
		$('.mmul-close').click(closeMenu);
		$('.menu-item-has-children').click(showChilds);
		$('.search-button').click(searchClick);

		// handlers
		function openMenu() {
			MAIN_MENU_NODE.fadeIn(ANIMATION_PARAMS);
			OVERLAY.fadeIn(ANIMATION_PARAMS);
		}

		function closeMenu() {
			MAIN_MENU_NODE.fadeOut(ANIMATION_PARAMS);
			OVERLAY.fadeOut(ANIMATION_PARAMS);
		}

		function showChilds(event) {
			var target = $(event.target).parent();
			var hasChilds = target.hasClass('menu-item-has-children');

			if (hasChilds) {
				event.preventDefault();

				target.hasClass('opened')
					? target.removeClass('opened')
					: target.addClass('opened');
			}
		}

		// Search
		checkSearchValue();

		SEACH_INPUT.on('focusout', inputListener);

		function searchClick(e) {
			var isActive = SEARCH_NODE.hasClass('active');

			if (isActive && SEACH_INPUT.val()) {
				// let search happen
				return;
			}

			// prevent form submit
			e.preventDefault();
			openSearch();
		}

		function openSearch() {
			SEARCH_NODE.addClass('active');

			// focus after input becomes visible, it takes 200ms for animation to finish
			setTimeout(function () {
				SEACH_INPUT.focus();
			}, 300);
		}

		function closeSearch() {
			SEARCH_NODE.removeClass('active');
		}

		function checkSearchValue() {
			var value = SEACH_INPUT.val();

			if (value) {
				openSearch();
			}
		}

		function inputListener(e) {
			var value = e.target.value;

			if (!value) {
				closeSearch();
			}
		}
	});
})(jQuery);
