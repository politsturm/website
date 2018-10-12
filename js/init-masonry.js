jQuery(window).load(function () {
	initMasonry();

	function initMasonry () {
		var container = document.querySelector('.main-news');
		var masonry = new Masonry(container, {
			itemSelector: '.grid-post',
			columnWidth: '.grid-post',
			gutter: 25,
			percentPosition: true
		});

		window.masonryInstance = masonry;
	}
});
