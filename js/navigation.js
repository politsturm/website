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
		$('.menu__arrow').click(showChilds);
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
			var anyValue = false;

			SEACH_INPUT.each(function () {
				if ($(this).val()) {
					anyValue = true;
				}
			});

			if (isActive && anyValue) {
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

		// up-button
		var upButton = $('.up-button');
		var prevPos;

		$(window).on('scroll', scrollListener);
		upButton.on('click', upButtonClickHandler);

		function scrollListener() {
			var fromTop = $(document).scrollTop();

			if (fromTop >= 300) {
				upButton.removeClass('up-button_hidden');
				upButton.removeClass('up-button_down');
			} else if (fromTop <= 300 && !prevPos) {
				upButton.addClass('up-button_hidden');
			}
		}

		function upButtonClickHandler() {
			if (!prevPos) {
				prevPos = $(document).scrollTop();
			}

			if ($(document).scrollTop() === 0) {
				$(document).scrollTop(prevPos);
			} else {
				$(document).scrollTop(0);
				upButton.addClass('up-button_down');
			}
		}
	});
})(jQuery);
