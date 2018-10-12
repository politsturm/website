jQuery(window).load(function () {
	initMasonry();

	var initInterval = setInterval(function () {
		if (jQuery('.grid-post').css('position') === 'absolute') {
			clearInterval(initInterval);
		} else {
			initMasonry();
		}
	}, 200);

	function initMasonry () {
		jQuery('.main-news').masonry({
			itemSelector: '.grid-post',
			columnWidth: '.grid-post',
			gutter: 25,
			percentPosition: true
		});

		window.masonryInstance = masonry;
	}
});
