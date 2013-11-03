<?php

	//Info
	function info( $atts, $content = null ) {
   		return '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>' . do_shortcode($content) . '</div>';
	}
	add_shortcode('info', 'info');

	//Warning
	function warning( $atts, $content = null ) {
   		return '<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>' . do_shortcode($content) . '</div>';
	}
	add_shortcode('warning', 'warning');
	
	//Error
	function error( $atts, $content = null ) {
   		return '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>' . do_shortcode($content) . '</div>';
	}
	add_shortcode('error', 'error');
	
	//Success
	function success( $atts, $content = null ) {
   		return '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>' . do_shortcode($content) . '</div>';
	}
	add_shortcode('success', 'success');
	
?>