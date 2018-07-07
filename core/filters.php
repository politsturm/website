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

		$tags = wp_get_post_tags(get_the_ID());
		$tags = implode(' ', array_map(function($tag) {
			$url = '/tag/' . $tag->slug;
			$name = $tag->name;
			return '<a href="' . $url . '" class="content-tag">' . $name . '</a>';
		}, $tags));

		$tags = '<div class="content-tags-single">' . $tags . '</div>';

		return $content . $tags;
	}

	public static function separator( $content ) {
		return $content . '<div class="separator"></div>';
	}

	public static function start_info_block( $content ) {
		return $content . '<div class="info-block">';
	}

	public static function end_info_block( $content ) {
		return $content . '</div>';
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

	public static function post_date( $content ) {
		$date = '<div class="post-date">' . get_the_date('M d, Y') . '</div>';
		return $content . $date;
	}

}

add_action( 'after_setup_theme', array( 'POLITSTURM_FILTERS', 'content_width' ) );
add_filter( 'excerpt_length', array( 'POLITSTURM_FILTERS', 'excerpt_length' ), 999 );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'tags' ) );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'separator' ) );

add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'start_info_block' ) );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'ya_share' ) );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'post_date' ) );
add_filter( 'the_content', array( 'POLITSTURM_FILTERS', 'end_info_block' ) );

add_filter( 'the_content', 'modify_images', 100 );

function modify_images( $content ) {
    if ( ! preg_match_all( '/<img [^>]+>/', $content, $matches ) ) {
        return $content;
    }

    $selected_images = $attachment_ids = array();

    foreach ( $matches[0] as $image ) {
        if ( preg_match( '/size-([a-z]+)/i', $image, $class_size ) && preg_match( '/wp-image-([0-9]+)/i', $image, $class_id ) && $image_size = $class_size[1] && $attachment_id = absint( $class_id[1] ) ) {
            /*
             * If exactly the same image tag is used more than once, overwrite it.
             * All identical tags will be replaced later with 'str_replace()'.
             */
            $selected_images[ $image ] = $attachment_id;
            // Overwrite the ID when the same image is included more than once.
            $attachment_ids[ $attachment_id ] = true;
        }
    }
    foreach ( $selected_images as $image => $attachment_id ) {
        $content = str_replace( $image, modify_image_tag( $image, $attachment_id, $image_size ), $content );
    }

    return $content;
}

function modify_image_tag( $image, $attachment_id, $image_size ) {
    $image_src = preg_match( '/src="([^"]+)"/', $image, $match_src ) ? $match_src[1] : '';
    list( $image_src ) = explode( '?', $image_src );

    // Return early if we couldn't get the image source.
    if ( ! $image_src ) {
        return $image;
    }
    //Get attachment meta for size
    $size_large  = wp_get_attachment_image_src( $attachment_id, 'large' );
    $size_large  = $size_large ? $size_large[0] : '';

    // Add 'data' attributes
    $image = preg_replace( '/<img ([^>]+?)[\/ ]*>/', '<img $1' . $attr . ' />', $image );

    //Append <a> tag
    $r_image = sprintf( '<a id="image-%d" href='. $size_large .' data-fancybox="gallery">', $image_size, $attachment_id );
    $r_image .= $image . '</a>';

    return $r_image;
}

add_filter('excerpt_more', function($more) {
	return '';
});

add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});
