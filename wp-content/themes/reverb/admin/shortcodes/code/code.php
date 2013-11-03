<?php

	function rv_code($params = array(), $content = null) {
	$content = preg_replace('#<br\s*/?>#', "", $content);
	$code = '<span class="code">'.$content.'</span>';
	return $code;
}

	add_shortcode('code','rv_code');
	
?>