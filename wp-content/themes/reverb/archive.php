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
<div class='post-row'>
  <div class="row">
    <?php 
if ( have_posts() ) : $c3 = 1;
   while (have_posts()) : the_post(); $c3++; ?>
    <div class="span3 post blogitem">
      <div class="img"> <a href="<?php echo get_permalink() ?>">
        <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
        </a> <a href="<?php echo get_permalink() ?>" class="mask"></a></div>
      <div class="text">
        <h6><a href="<?php echo get_permalink() ?>">
          <?php the_title(); ?>
          </a></h6>
        <?php the_excerpt() ?>
      </div>
      <div class="author-byline"> <i class="icon-pencil"></i>
        <h7><?php echo get_the_author_link(); ?></h7>
        <div class="pull-right"><i class="icon-calendar"></i>
          <?php the_time('F jS') ?>
        </div>
      </div>
    </div>
    <?php if ($c3%4 == 1){ echo '</div><div class="row">' ; } ?>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer();?>
