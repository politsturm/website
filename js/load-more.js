function loadMore(callbacks) {
	var data = {
		'action': 'loadmore',
		'query': load_more_params.posts,
		'page': load_more_params.current_page
	};

	jQuery.ajax({
		url: load_more_params.ajaxurl,
		data: data,
		type: 'POST',
		beforeSend: callbacks.beforeSend,
		success: function(data) {
			if (!data) {
				callbacks.end();
				return;
			}

			callbacks.success(data);
			load_more_params.current_page++;

			if (load_more_params.current_page === load_more_params.max_page) {
				callbacks.end();
			}
		}
	});
}
