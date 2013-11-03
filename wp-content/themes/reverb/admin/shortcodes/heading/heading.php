<?php

	function wp_rv_heading($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'title' => '',
			
			
		), $atts));
			
		$html = '';
		
		
			$html = '<h5>'.$title .'</h5>';
		
		
		return $html;
	}

	add_shortcode('heading','wp_rv_heading');
	
?>