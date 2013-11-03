<?php

	function wp_rv_divider($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'title' => '',
			
			
		), $atts));
			
		$html = '';
		
		
			$html = '<h4 class="section-title"><span>'.$title .'</span></h4>';
		
		
		return $html;
	}

	add_shortcode('divider','wp_rv_divider');
	
?>