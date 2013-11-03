<?php


function shortcode_featured_slider($atts, $content=null, $code) {
	
	extract(shortcode_atts(array(
		'show' => ''
	), $atts));
	ob_start();
	global $wpdb;
global $woocommerce, $post; ?>

<div class="row-fluid">
  <div class="post-row">
    <div id="myCarousel" class="carousel postCarousel slide">
      <?php global $product;

$args = array('post_type'=> 'product',
            'ignore_sticky_posts'   => 1,
						'meta_key' => '_featured',
						'meta_value' => 'yes');
query_posts($args);
if ( have_posts() ) : $c = 1; 
?>
      
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="<?php if($c=="1"){ echo 'active' ; } ?> item row-fluid">
          <?php  $loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          <div class="span3 post">
            <div class="img">
              <?php woocommerce_show_product_sale_flash(); ?>
              <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
              <?php if (has_post_thumbnail( $loop->post->ID )) echo woocommerce_template_loop_product_thumbnail(); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />'; ?>
              </a> </div>
            <div class="text">
              <h6><a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                <?php the_title(); ?>
                </a></h6><small class="product-sub"><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small>
              <?php
    
	
	
		$count = $wpdb->get_var("
			SELECT COUNT(meta_value) FROM $wpdb->commentmeta
			LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
			WHERE meta_key = 'rating'
			AND comment_post_ID = $post->ID
			AND comment_approved = '1'
			AND meta_value > 0
		");
	
		$rating = $wpdb->get_var("
			SELECT SUM(meta_value) FROM $wpdb->commentmeta
			LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
			WHERE meta_key = 'rating'
			AND comment_post_ID = $post->ID
			AND comment_approved = '1'
		");
	
		if ( $count > 0 ) {
	
			$average = number_format($rating / $count, 2);
	
			echo '<div class="star-rating" title="'.sprintf(__('Rated %s out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> '.__('out of 5', 'woocommerce').'</span></div>';
	
		}
		

	
	?>
              <span class="price"><?php echo $product->get_price_html(); ?></span>
             
            </div>
            <div class="cart-btn-wrapper">
              <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
            <?php
                if (($c % 4) == 0) { if($c == $show) { echo '</div>' ; } else { echo '</div></div><div class="item row-fluid">' ;  } }else{echo '</div>' ;} ?>
            <?php $c++; endwhile; ?>
          </div>
        </div>
        <?php endif; 
  if ($c > 4) {
							
							?>
        <!-- Carousel nav --> 
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        <?php
							}
						wp_reset_query();?>
      </div>
    </div>
  </div>

<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

	add_shortcode("featured_slider", "shortcode_featured_slider");
?>