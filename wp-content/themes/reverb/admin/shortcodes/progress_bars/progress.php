<?php

	function wp_bt_progress($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'style' => '',
			'width' => '',
			
		), $atts));
			
		$html = '';
		
		
			$html = '<div class="progress progress-'.$style .' progress-striped"><div class="bar" style="width: '.$width .'"></div></div>';
		
		
		return $html;
	}

	add_shortcode('progress','wp_bt_progress');
	
?>