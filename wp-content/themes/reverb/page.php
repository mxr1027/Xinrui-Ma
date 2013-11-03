<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div>
 <div class="banner-inner"><div class="container box">
  <h3>
    <?php the_title(); ?></h3>
  <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
</div></div></div>

<div class="container box">
<div class="row">
  <div class="span12">
    <div class="fullwidth">
    <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
      <?php the_post_thumbnail('', array('class' => 'full-thumb')); } ?>
    </div>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</div>

<?php get_footer();?>
