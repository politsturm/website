function loadMore(callbacks) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', load_more_params.ajaxurl);
	xhr.onload = function() {
		if (xhr.status !== 200) {
			callbacks.end();
			return;
		}

		callbacks.success(xhr.responseText);
		load_more_params.current_page++;

		if (load_more_params.current_page === load_more_params.max_page) {
			callbacks.end();
		}
	};

	var formData = new FormData();
	formData.append('action', 'loadmore');
	formData.append('query', load_more_params.posts);
	formData.append('page', load_more_params.current_page);

	xhr.send(formData);
}
