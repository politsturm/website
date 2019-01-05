function appendHtml(el, str) {
	var div = document.createElement('div');
	div.innerHTML = str;
	while (div.children.length > 0) {
		el.appendChild(div.children[0]);
	}
}

var BOTTOM_OFFSET = 500;

window.onload = function() {
	var element = document.querySelector('.branch-template__main-col');
	var loadInProcess = false;

	function infLoadMore() {
		loadInProcess = true;
		loadMore({
			success: function(data) {
				appendHtml(element, data);
				loadInProcess = false;
			},
			end: function() { }
		});
	}

	// Detect when scrolled to bottom.
	window.onscroll = function() {
		var rect = element.getBoundingClientRect();
		var bottom = + element.offsetTop + rect.height - BOTTOM_OFFSET;
		var position = window.scrollY + window.innerHeight;
		if (position >= bottom && !loadInProcess) {
			infLoadMore();
		}
	};

	// Initially load some items.
	infLoadMore();
};
