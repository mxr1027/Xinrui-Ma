<?php
/*
Template Name: Home Page
*/
?>
<?php get_header('homepage');
global $product;
global $wpdb;
global $woocommerce, $post;?>

<?php $banner  = get_option("reverb_banner"); ?>
<?php $banner_sub  = get_option("reverb_banner_sub"); ?>

<div class="banner-home">
  <div class="container box">
    <h3> <?php echo $banner; ?></h3>
    <h2> <small><?php echo $banner_sub; ?></small></h2>
  </div>
</div>

<div class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile; ?>
  <?php endif; ?>
  </div>

<div class="twit-banner">
  <div class="container">
    <div id="jstwitter"></div>
  </div>
</div>
<?php get_footer();?>
