<?php

function get_youtube_code($content)
{
	$youtube_re_list = array(
		'https.*\?v\=(.[_0-9a-zA-Z]+)',
		'https.*youtu\.be\/(.[_0-9a-zA-Z\-]+)',
		'https.*youtube.com\/embed\/(.[_0-9a-zA-Z\-]+)',
	);
	$reg_exp = '/'.implode('|', $youtube_re_list).'/i';
	preg_match_all($reg_exp, $content, $match);

	// Remove full link
	array_shift($match);
	foreach ($match as $code)
	{
		if (!empty($code[0]))
			return $code[0];
	}
	return '';
}

?>
