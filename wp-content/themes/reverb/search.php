<?php get_header();?>

<div>
<div class="banner-inner">
  <div class="container box">
    <h3>
      <?php wp_title("",true); ?>
    </h3>
  </div>
</div>
<div class="container box">
<div class="post-row">
   <?php if ($posts) : foreach ($posts as $post) : ?>
      <div class="span3 post">
        <div class="img"> <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
          <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
          </a> </div>
        <div class="text">
          <h6><a href="<?php echo get_permalink() ?>">
            <?php the_title(); ?>
            </a></h6>
          <?php the_excerpt() ?>
        </div>
        <div class="cart-btn-wrapper"> <i class="icon-circle-arrow-right"></i> <a href="" class="">read more</a> </div>
      </div>
     <?php endforeach;  ?>
    <?php else : ?>
  </div>
  <h4>
    <?php _e( 'Nothing Found', 'reverb' ); ?>
  </h4>
  <p>
    <?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'reverb' ); ?>
  </p>
  <br/>
  <?php  endif;?>
</div></div>

<?php get_footer();?>
