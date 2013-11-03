<?php

function rv_accordion($atts, $content=null, $code) {

	extract(shortcode_atts(array(
		'open' => '1',
	), $atts));

	if (!preg_match_all("/(.?)\[(accordion-item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion-item\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} 
	else {
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
						
			$output .= '<div class="accordion-heading"><a href="#">' . $matches[3][$i]['title'] . '</a></div><div class="accordion-container">' . do_shortcode(trim($matches[5][$i])) .'</div>';
		}
		return '<div class="accordion" rel="'.$open.'">' . $output . '</div>';
		
	}	
}
add_shortcode('accordion', 'rv_accordion');
?>