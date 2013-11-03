<?php

	function wp_rv_textbox($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'style' => '',
			
			
		), $atts));
			
		$html = '';
		
		
			$html = '<div class="post-row"><div class="post"><div class="textshort">'. trim($content) .'</div></div></div>';
		
		
		return $html;
	}

	add_shortcode('textbox','wp_rv_textbox');
	
?>