<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$template = get_option('template');

switch( $template ) {
	case 'twentyeleven' :
		echo '<div id="primary"><div id="content" role="main">';
		break;
	case 'twentytwelve' :
		echo '<div id="primary" class="site-content"><div id="content" role="main">';
		break;
	default :
		echo '<div class="banner-inner"><div class="container box">
  <h3>
    ' ?> <?php woocommerce_page_title(); ?> <?php echo '</h3>
  <h2> <small></small></h2>
</div></div><div class="container"><div id="content" role="main" class="post-row">';
		break;
}