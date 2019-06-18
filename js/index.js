function loadLazy() {
	var lazyloadImages;

	if ('IntersectionObserver' in window) {
		lazyloadImages = document.querySelectorAll('.lazy');

		var imageObserver = new IntersectionObserver(function(entries, observer) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting) {
					var image = entry.target;
					image.classList.remove('lazy');
					imageObserver.unobserve(image);
				}
			});
		});

		lazyloadImages.forEach(function(image) {
			imageObserver.observe(image);
		});
	} else {
		var lazyloadThrottleTimeout;
		lazyloadImages = document.querySelectorAll('.lazy');

		function lazyload () {
			if(lazyloadThrottleTimeout) {
				clearTimeout(lazyloadThrottleTimeout);
			}

			lazyloadThrottleTimeout = setTimeout(function() {
				var scrollTop = window.pageYOffset;

				lazyloadImages.forEach(function(img) {
					if (img.offsetTop < (window.innerHeight + scrollTop)) {
						img.src = img.dataset.src;
						img.classList.remove('lazy');
					}
				});

				if (lazyloadImages.length == 0) {
					document.removeEventListener('scroll', lazyload);
					window.removeEventListener('resize', lazyload);
					window.removeEventListener('orientationChange', lazyload);
				}
			}, 20);
		}

		document.addEventListener('scroll', lazyload);
		window.addEventListener('resize', lazyload);
		window.addEventListener('orientationChange', lazyload);
	}
}

(function ($) {
	$(document).ready(function () {
		// const
		var MAIN_MENU_NODE = $('.mmul');
		var SEARCH_NODE = $('.search');
		var SEACH_INPUT = $('.search input');
		var OVERLAY = $('.header-overlay');

		// events
		$('.mob-menu-button').click(openMenu);
		$('.mmul-close').click(closeMenu);
		$('.menu__arrow').click(showChilds);
		$('.search-button').click(searchClick);
		$('.search__close').click(closeSearch);

		// handlers
		function openMenu() {
			MAIN_MENU_NODE.addClass('active');
			OVERLAY.addClass('active');
		}

		function closeMenu(event) {
			event.stopPropagation();

			MAIN_MENU_NODE.removeClass('active');
			OVERLAY.removeClass('active');
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
			} else if (fromTop <= 300 && fromTop > 50) {
				upButton.addClass('up-button_hidden');
			}
		}

		function upButtonClickHandler() {
			if (!upButton.hasClass('up-button_down')) {
				prevPos = $(document).scrollTop();
			}

			if ($(document).scrollTop() <= 50) {
				$(document).scrollTop(prevPos);
			} else {
				$(document).scrollTop(0);
				upButton.addClass('up-button_down');
			}
		}
	});

	document.addEventListener('DOMContentLoaded', loadLazy);
})(jQuery);
