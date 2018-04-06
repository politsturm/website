jQuery(function($){
	$(document).on('click', '.news-loadmore', function(){

		var button = $(this);
		var data = {
			'action': 'loadmore',
			'query': load_more_params.posts,
			'page': load_more_params.current_page
		};
 
		$.ajax({
			url: load_more_params.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.text('Загрузка...');
			},
			success: function(data) {
				if (!data) { 
					button.remove();
					return;
				}

				button.text('Загрузить ещё');
				$('.main-news').append(data);
				var imageCount = $(data).find('img').length;

				var imagesLoaded = 0;
				$('.main-news img').load(function () {
					imagesLoaded++;
					if (imagesLoaded == imageCount) {
						$('.main-news')
							.masonry('reloadItems')
							.masonry('layout'); 
					}
				})
				load_more_params.current_page++;

				if (load_more_params.current_page == load_more_params.max_page) {
					button.remove();
				}
			}
		});
	});
});
