jQuery(function($){
	$(document).on('click', '.news-loadmore', function(){

		var button = $(this);
		var masonryInstance = window.masonryInstance;

		button.text('Загрузка...');
		loadMore({
			success: function(data) {
				button.text('Загрузить ещё');
				$('.main-news').append(data);
				var imageCount = $(data).find('img').length;

				var imagesLoaded = 0;
				$('.main-news img').load(function () {
					imagesLoaded++;
					if (imagesLoaded === imageCount) {
						masonryInstance.reloadItems();
						masonryInstance.layout();
					}
				})
			},
			end: function() {
				button.remove();
            }
		});
	});
});
