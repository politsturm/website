<?php

// Post Views Counter
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }

    return $count.'';
}

function setPostViews($postID) {
    if (!current_user_can('level_7')) :
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count=='') {
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    endif;
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
?>
