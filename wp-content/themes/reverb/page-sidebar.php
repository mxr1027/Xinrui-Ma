<?php
/*
Template Name: Page with sidebar
*/
?>
<?php get_header();?>
<div>
 <div class="banner-inner"><div class="container box">
  <h3>
    <?php the_title(); ?></h3>
  <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
</div></div>
<?php $sidebar_location = get_option('reverb_sidebar_location'); 
						if ($sidebar_location == "option1") {
						?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="container box">
<div class="row left">
<div class="span9 text-post">
  <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
  <?php the_post_thumbnail(); }?>
  <?php the_content(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar();
				  } elseif ($sidebar_location == "option2") {
						
					?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<div class="container box">
<div class="row right">
  <?php get_sidebar(); ?>
  <div class="span9 text-post">
    <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
    <?php the_post_thumbnail(); }?>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php	 }?>
</div>

<?php get_footer();?>
