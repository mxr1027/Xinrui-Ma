<?php

function ac_one_third( $atts, $content = null ) {
   return '<div class="span4">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'ac_one_third');

function ac_two_third( $atts, $content = null ) {
   return '<div class="span7">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_third', 'ac_two_third');

function ac_one_half( $atts, $content = null ) {
   return '<div class="span6">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'ac_one_half');

function ac_one_fourth( $atts, $content = null ) {
   return '<div class="span3">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'ac_one_fourth');

function ac_three_fourth( $atts, $content = null ) {
   return '<div class="span9">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fourth', 'ac_three_fourth');

function ac_one_half_sb( $atts, $content = null ) {
   return '<div class="span5">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half_sb', 'ac_one_half_sb');

function ac_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode('row', 'ac_row');
?>