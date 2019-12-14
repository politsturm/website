<?php

add_action('admin_notices', 'custom_error_notice');
add_action('save_post', 'forbid_to_save_without_more');
add_filter('post_updated_messages', 'remove_success_published_message');

if (!session_id())
	session_start();

function remove_success_published_message($msg)
{
	$SUCCESS_PUBLISHED_ID = 6;

	$notice = $_SESSION['admin_notices'];
	if(!empty($notice)) {
		unset($msg['post'][$SUCCESS_PUBLISHED_ID]);
		unset($msg['page'][$SUCCESS_PUBLISHED_ID]);
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
	$MORE_TAG_ERROR = '<div class="error"><p>'.
		__("Post can't be published.", 'politsturm').' '.
		__('Add <a href="/more-tag.html">"more" tag</a> to specify place to cut an annotation.', 'politsturm').
		'</p></div>';
	$MORE_TAG_NOTICE = '<div class="notice"><p>'.
		__("Don't forget to add <a href=\"/more-tag.html\">\"more\" tag</a> to specify place to cut an annotation.", 'politsturm').
		'</p></div>';
	$ALLOWED_STATUSES = array('draft', 'pending', 'private', 'trash', 'inherit');

	$post = get_post($post_id);
	if ($post->post_type != 'post') {
		return;
	}

	if ($post->post_status == 'auto-draft') {
		$_SESSION['admin_notices'] = $MORE_TAG_NOTICE;
		return;
	}

	if (in_array($post->post_status, $ALLOWED_STATUSES)) {
		return;
	}

	$pos = strpos($post->post_content, '<!--more-->');
	if ($pos) {
		return;
	}

	$_SESSION['admin_notices'] = $MORE_TAG_ERROR;
	$post = array('ID' => $post_id, 'post_status' => 'draft');

	remove_action('save_post', 'forbid_to_save_without_more');
	wp_update_post($post);
	add_action('save_post', 'forbid_to_save_without_more');
	return;
}
