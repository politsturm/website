function appendHtml(el, str) {
	var div = document.createElement('div');
	div.innerHTML = str;
	while (div.children.length > 0) {
		el.appendChild(div.children[0]);
	}
}

var BOTTOM_OFFSET = 500;

window.onload = function() {
	var listElm = document.querySelector('.branch-template__main-col');

	function infLoadMore() {
		loadMore({
			success: function(data) {
				appendHtml(listElm, data);
			},
			end: function() { }
		});
	}

	// Detect when scrolled to bottom.
	window.onscroll = function() {
		var position = window.innerHeight + window.scrollY + BOTTOM_OFFSET;
		if (position >= document.body.offsetHeight) {
			infLoadMore();
		}
	};

	// Initially load some items.
	infLoadMore();
};
