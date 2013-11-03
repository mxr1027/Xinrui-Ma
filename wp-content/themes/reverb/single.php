<?php get_header();?>
<?php $sidebar_location = get_option('reverb_sidebar_location'); 
						if ($sidebar_location == "option1") {
						?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div>
<div class="banner-inner">
  <div class="container box">
    <h3>
      <?php the_title(); ?>
    </h3>
    <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
  </div>
</div>
<div class="container box">
  <div class="row left post-row">
    <div class="span9">
      <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
        <?php $author_link = get_the_author_link(); ?>
        <?php $comments_count = wp_count_comments($post->ID); ?>
        <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
        <?php the_post_thumbnail(); }?>
        <?php the_content(); ?>
        <div class="arrow_box"></div>
        <div class="post-meta"><span><i class="icon-calendar"></i>
          <?php the_time('F jS, Y') ?>
          </span> <span><i class="icon-user"></i>By <?php echo $author_link; ?></a></span> <span><i class="icon-comment"></i>
          <?php  echo $comments_count->approved ?>
          comments</span></div>
      </div>
      <?php endwhile; ?>
      <p>
        <?php the_tags(); ?>
      </p>
      <?php previous_post_link(); wp_link_pages();?>
      <div class="pull-right">
        <?php next_post_link(); ?>
      </div>
      <?php endif; ?>
      <?php comments_template( '', true ); ?>
    </div>
  </div>
</div>
<?php get_sidebar();
         } elseif ($sidebar_location == "option2") {
					 ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div>
  <div class="banner-inner">
    <div class="container box">
      <h3>
        <?php the_title(); ?>
      </h3>
      <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
    </div>
  </div>
  <div class="container box">
    <div class="row right post-row">
      <?php get_sidebar(); ?>
      <div class="span9">
        <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
          <?php $author_link = get_the_author_link(); ?>
          <?php $comments_count = wp_count_comments($post->ID); ?>
          <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
          <?php the_post_thumbnail(); }?>
          <?php the_content(); ?>
          <div class="post-meta"><span><i class="icon-calendar"></i>
            <?php the_time('F jS, Y') ?>
            </span> <span><i class="icon-user"></i>By <?php echo $author_link; ?></a></span> <span><i class="icon-comment"></i>
            <?php  echo $comments_count->approved ?>
            comments</span></div>
        </div>
        <?php endwhile; ?>
        <p>
          <?php the_tags(); ?>
        </p>
        <?php previous_post_link(); ?>
        |
        <?php next_post_link(); ?>
        <?php endif; ?>
        <?php comments_template( '', true ); ?>
      </div>
    </div>
  </div>
  <?php 
					  } ?>
</div>
<?php get_footer();?>
