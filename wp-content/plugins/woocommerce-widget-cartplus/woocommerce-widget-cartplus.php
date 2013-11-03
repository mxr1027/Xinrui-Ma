<?php

   /*

   Plugin Name: WooCommerce CartPlus Widget

   Plugin URI: http://www.oxfordshireweb.com

   Description: A dropdown cart widget for WooCommerce

   Version: 1.0

   Author: Joe Clifton

   Author URI: http://www.oxfordshireweb.com

   License: GPL

   */

   

// Register the Widget



add_action('widgets_init', 'WooCommerce_Widget_CartPlus_LoadWidget');



function WooCommerce_Widget_CartPlus_LoadWidget() {



	register_widget('WooCommerce_Widget_CartPlus');

}



// Enqueue the CSS



add_action('wp_print_styles', 'addCssFonts');

	

function addCssFonts(){

	

	wp_enqueue_style('cartplus-css', plugins_url( 'css/cartplus-styles.css', __FILE__ ) );

	wp_enqueue_style('cartplus-icons-css', plugins_url( 'css/cart-icons.css', __FILE__ ) );

	

}



// Make sure CSS icons are available in Admin



function load_custom_wp_admin_style() {

	

        wp_register_style( 'custom_wp_admin_css', plugins_url( 'css/cart-icons.css', __FILE__ ) );

        wp_enqueue_style( 'custom_wp_admin_css' );

	

}



add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



// Remove action from WooCommerce



remove_filter('wp_footer', 'woocommerce_cart_link');

remove_action('add_to_cart_fragments','woocommerce_cart_link');



// Ensure cart contents update when products are added to the cart via AJAX

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cartplus_fragment', '1');

 

function woocommerce_header_add_to_cartplus_fragment( $fragments ) {

	global $woocommerce;

	

	

	ob_start();

 

	?>

	<a class="cartplus-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" onclick="javascript: return false;" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

	<?php

 

	$fragments['a.cartplus-contents'] = ob_get_clean();

 

	return $fragments;

 

}



add_filter('add_to_cart_fragments', 'woocommerce_cartitems_add_to_cart_fragment', '1');

 

function woocommerce_cartitems_add_to_cart_fragment( $fragments ) {

	global $woocommerce;

 

	ob_start();

 

	?>

	<ul class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

				

					<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

				

						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

				

							$_product = $cart_item['data'];

				

							// Only display if allowed

							if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )

								continue;

				

							// Get price

							$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

				

							$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );

							?>

				

							<li>

								<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

				

									<?php echo $_product->get_image(); ?>

				

									<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

				

								</a>

				

								<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>

				

								<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>

							</li>

				

						<?php endforeach; ?>

				

					<?php else : ?>

				

						<li class="empty"><i class="icon-shopping-cart"></i> <?php _e('Your shopping cart is empty.', 'woocommerce'); ?></li>

				

					<?php endif; ?>

				

				</ul><!-- end product list -->



	<?php

 

	$fragments['ul.cart_list'] = ob_get_clean();

 

	return $fragments;

 

}



class WooCommerce_Widget_CartPlus extends WP_Widget {



	var $woo_widget_cssclass;

	var $woo_widget_description;

	var $woo_widget_idbase;

	var $woo_widget_name;



	// Constructor

	

	function WooCommerce_Widget_CartPlus() {



		/* Widget variable settings. */

		$this->woo_widget_cssclass 		= 'widget_shopping_cartplus';

		$this->woo_widget_description 	= __( "Display the user's Cart in the sidebar. Dropdown.", 'woocommerce' );

		$this->woo_widget_idbase 		= 'woocommerce_widget_cartplus';

		$this->woo_widget_name 			= __( 'WooCommerce Cart Plus', 'woocommerce' );



		/* Widget settings. */

		$widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );



		/* Create the widget. */

		$this->WP_Widget( 'shopping_cartplus', $this->woo_widget_name, $widget_ops );

		

	}



	// Widget Function

	

	function widget( $args, $instance ) {

		global $woocommerce;

		extract( $args );

		$basket_icon = esc_attr($instance['basket_icon']);



		if ( is_cart() || is_checkout() ) return;



		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Cart', 'woocommerce') : $instance['title'], $instance, $this->id_base );

		$hide_if_empty = empty( $instance['hide_if_empty'] )  ? 0 : 1;




		echo $before_widget;



		

			

			echo $after_title;

			

			$woocommerce->add_inline_js( "

				jQuery('.cart-contents-toggle').click(function() {

					jQuery('.cartplus-dropdown').slideToggle(200);

				});

			" );

			

			?>

			<div class="cart-contents-toggle"><i class="<?php echo $basket_icon ?>"></i>

			<a class="cartplus-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" onclick="javscript: return false;" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

			</div>

			<?php



			echo '<div class="cartplus-dropdown" id="cartplus-dropdown" style="display:none">' . "\r\n";

			

			?>



				<ul class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

				

					<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

				

						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

				

							$_product = $cart_item['data'];

				

							// Only display if allowed

							if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )

								continue;

				

							// Get price

							$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

				

							$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );

							?>

							

							<!-- Get a list of products  with quantities -->

							<li>

								<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

				

									<?php echo $_product->get_image(); ?>

				

									<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

				

								</a>

				

								<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>

				

								<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>

							</li>

				

						<?php endforeach; ?>

				

					<?php else : ?>

						<!-- if the cart is empty, show a message saying so -->

						<li class="empty"><?php _e('No products in the cart.', 'woocommerce'); ?></li>

				

					<?php endif; ?>

				

				</ul><!-- end product list -->

				

				

				<!-- show cart buttons -->

				<div class="subtotal-buttons">

				

					<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				

					<p class="cartplus-buttons">

						<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn btn-grey"><?php _e('View Cart &rarr;', 'woocommerce'); ?></a>

						<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn"><?php _e('Checkout &rarr;', 'woocommerce'); ?></a>

					</p>

					

				</div>



		<?php

		

		echo $after_widget;

		

		echo '</div>' . "\r\n";

		

		// Hide the cart if empty



		if ( $hide_if_empty && sizeof( $woocommerce->cart->get_cart() ) == 0 ) {

			$woocommerce->add_inline_js( "

				jQuery('.widget_shopping_cartplus').closest('div').hide();

				jQuery('body').bind('adding_to_cart', function(){

					jQuery(this).find('.widget_shopping_cartplus').closest('div').fadeIn();

				});

			" );

		}

	}



	// Update Widget

	

	function update( $new_instance, $old_instance ) {

		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );

		$instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;

		$instance['hide_title'] = empty( $new_instance['hide_title'] ) ? 0 : 1;

		$instance['basket_icon'] = strip_tags( stripslashes( $new_instance['basket_icon'] ) );

		return $instance;

	}



	// Widget Form

	

	function form( $instance ) {

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		$basket_icon = esc_attr($instance['basket_icon']);

		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'woocommerce') ?></label>

		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
		

			<p>

				Cart Icon:

				<br />

				<label for="<?php echo $this->get_field_id('icon-cart'); ?>"><i class="iconic-cart"></i></label>

				<input class="" id="<?php echo $this->get_field_id('icon-cart'); ?>" name="<?php echo $this->get_field_name('basket_icon'); ?>" type="radio" value="iconic-cart" <?php if($basket_icon === 'iconic-cart'){ echo 'checked="checked"'; } ?> />

				<br />

				<label for="<?php echo $this->get_field_id('icon-cart'); ?>"><i class="iconic-basket"></i></label>

				<input class="" id="<?php echo $this->get_field_id('icon-basket'); ?>" name="<?php echo $this->get_field_name('basket_icon'); ?>" type="radio" value="iconic-basket" <?php if($basket_icon === 'iconic-basket'){ echo 'checked="checked"'; } ?> />

				<br />

				<label for="<?php echo $this->get_field_id('icon-cart'); ?>"><i class="iconic-basket-1"></i></label>

				<input class="" id="<?php echo $this->get_field_id('icon-basket-1'); ?>" name="<?php echo $this->get_field_name('basket_icon'); ?>" type="radio" value="iconic-basket-1" <?php if($basket_icon === 'iconic-basket-1'){ echo 'checked="checked"'; } ?> />

				<br />

				<label for="<?php echo $this->get_field_id('icon-cart'); ?>"><i class="iconic-basket-2"></i></label>

				<input class="" id="<?php echo $this->get_field_id('icon-basket-2'); ?>" name="<?php echo $this->get_field_name('basket_icon'); ?>" type="radio" value="iconic-basket-2" <?php if($basket_icon === 'iconic-basket-2'){ echo 'checked="checked"'; } ?> />

				<br />

				<label for="<?php echo $this->get_field_id('icon-cart'); ?>"><i class="iconic-basket-alt"></i></label>

				<input class="" id="<?php echo $this->get_field_id('icon-basket-alt'); ?>" name="<?php echo $this->get_field_name('basket_icon'); ?>" type="radio" value="iconic-basket-alt" <?php if($basket_icon === 'iconic-basket-alt'){ echo 'checked="checked"'; } ?> />

			</p>

		<?php

	}



}