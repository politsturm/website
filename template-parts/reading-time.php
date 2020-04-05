<?php
	$post = get_post(get_the_ID());
	$content = apply_filters('the_content', $post->post_content);
	$content = str_replace( ']]>', ']]&gt;', $content );
	$count = str_word_count(strip_tags($content), 0, ' ');
	$READING_SPEED = 160; // words per minute
	$reading_time = round($count / $READING_SPEED);
	if ($reading_time == 0)
		$reading_time = 1;
?>

<div class="reading-time"><?php echo $reading_time; ?> <?php _e('min', 'politsturm'); ?></div>
