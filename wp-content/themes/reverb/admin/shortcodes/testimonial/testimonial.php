<?php

function shortcode_testimonial($atts, $content=null, $code) {
	
	extract(shortcode_atts( array(
			'byline' => '',
			
			
		), $atts));
	
	
 $content = '
  </div></div></div><div class="banner-home-center">
    <div class="container box">
      <blockquote>
        <p>'. trim($content) .'</p>
        <small>'. $byline .'</small> </blockquote>
    </div>
  </div><div><div><div class="container">';
 
	
	return $content;
}

	add_shortcode("testimonial", "shortcode_testimonial");
?>