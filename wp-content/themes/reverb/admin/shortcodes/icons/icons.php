<?php

	function wp_bt_icon($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'style' => '',
			
			
		), $atts));
			
		$html = '';
		
		
			$html = '<i class="'.$style .'"></i>';
		
		
		return $html;
	}

	add_shortcode('icon','wp_bt_icon');
	
?>