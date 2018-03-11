(function ($) {
	$(document).ready(function () {
		// const
		var MAIN_MENU_NODE = $('.mmul');
		var SEARCH_NODE = $('.header-right .search');
		var SEACH_INPUT = $('.header-right .search input');
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

		checkSearchValue();

		SEACH_INPUT.on('focusout', inputListener);

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

		function searchClick(e) {
			var isActive = SEARCH_NODE.hasClass('active');

			if (isActive && SEACH_INPUT.val()) {
				// let search happen
				return;
			}

			// prevent form submit
			e.preventDefault();

			isActive ? closeSearch() : openSearch();
		}

		function openSearch() {
			SEARCH_NODE.addClass('active');

			// focus after input becomes visible, it takes 200ms for animation to finish
			setTimeout(function () {
				console.log('tries to focus')
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
