<?php

Class POLITSTURM_FILTERS {

	public static function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'politsturm_content_width', 640 );
	}

	public static function excerpt_length( $length ) {
		return 30;
	}

	public static function tags( $content ) {
		if( !is_single() ) return $content;

		$tags = implode(' ', array_map(function($category) {
			$url = '/category/international/' . $category->category_nicename;
			$name = $category->name;
			return '<a href="' . $url . '" class="tag">' . $name . '</a>';
		}, get_the_category()));

		$tags = '<div class="tags">' . $tags . '</div>';

		return $content . $tags;
	}

	public static function ya_share( $content ) {
		if( !is_single() ) return $content;

		$button_share = '<div class="share-ya">
			<script async="async" src="https://yastatic.net/share2/share.js"></script>
			<div class="ya-share2"
				data-counter=""
				data-services="vkontakte,facebook,odnoklassniki,twitter,lj,telegram"
				data-lang="ru"
				data-size="s"
				data-url="'.get_permalink().'"
				data-title="'. get_the_title().'"
				data-description=""
				data-image="">
			</div>
		</div>';

		return $content . $button_share;
	}


}

add_action( 'after_setup_theme', array( 'POLITSTURM_FILTERS', 'content_width' ) );
add_filter( 'excerpt_length', array( 'POLITSTURM_FILTERS', 'excerpt_length' ), 999 );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'tags' ) );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'ya_share' ) );

add_filter('excerpt_more', function($more) {
	return '';
});

add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});
