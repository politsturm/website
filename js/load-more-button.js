jQuery(function($){
	$(document).on('click', '.news-loadmore', function(){

		var button = $(this);

		button.text('Загрузка...');
		loadMore({
			success: function(data) {
				button.text('Загрузить ещё');
				$('.main-news').append(data);
				loadLazy();
			},
			end: function() {
				button.remove();
			}
		});
	});
});
