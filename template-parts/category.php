<?php
	$category = get_the_category();
	if ($category[0]) {
		$link = get_category_link($category[0]->term_id);
		$name = $category[0]->cat_name;
		echo $name;
		//echo '<a href="'.$link.'">'.$name.'</a>';
	}
?>
