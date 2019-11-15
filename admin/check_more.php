<?php

$MORE_TAG_NOTICE = '<div class="error"><p>Запись не может быть опубликована. Добавте <a href="/more-tag.html">тэг "далее"</a> для указания места окончания аннотации</p></div>';

add_action('admin_notices', 'custom_error_notice');
add_action('save_post', 'forbid_to_save_without_more');
add_filter('post_updated_messages', 'update_messages_for_notice');

if (!session_id())
	session_start();

function update_messages_for_notice($msg) {
	$notice = $_SESSION['admin_notices'];
	if(!empty($notice)) {
		unset($msg['post'][6]);
		unset($msg['page'][6]);
	}
	return $msg;
}

function custom_error_notice()
{
	$notice = $_SESSION['admin_notices'];
	if(!empty($notice)) {
		print($notice);
	}

	unset($_SESSION['admin_notices']);
}

function forbid_to_save_without_more($post_id)
{
	$post = get_post($post_id);
	if ($post->post_status != 'publish' && $post->post_status != 'future') {
		return true;
	}

	$pos = strpos($post->post_content, '<!--more-->');
	if ($pos) {
		return true;
	}

	$_SESSION['admin_notices'] .= $MORE_TAG_NOTICE;

	$post = array( 'ID' => $post_id, 'post_status' => 'draft');
	wp_update_post($post);
	return false;
}
