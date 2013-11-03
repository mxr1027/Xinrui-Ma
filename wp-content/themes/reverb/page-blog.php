<?php
/*
Template Name: Blog
*/
?>
<?php get_header();?>

<div>
  <div class="banner-inner">
    <div class="container box">
      <h3>
        <?php the_title(); ?>
      </h3>
      <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
    </div>
  </div>
  <div class="container box blog" id="content">
    <div class="post-row "> <div class="row">
      <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $the_query = query_posts(
        array(
            
            'posts_per_page'=>8,
            'orderby'=>'date',
			 'paged'=>$paged
			
        )
    );
    
?>
      <?php if (have_posts()) : $c2 = 1;
   while (have_posts()) : the_post(); $c2++; ?>
     
      <div class="span3 post blogitem">
      
        <div class="img"> <a href="<?php echo get_permalink( ) ?>">
        <?php if(get_post_meta($post->ID, "ad_post_video", true) ) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
          <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('Blog Pic');
} else echo '<img src="'. get_template_directory_uri() .'/img/no-img.jpg" alt="Placeholder" />'; ?>
          <?php }; ?></a> <a href="<?php echo get_permalink() ?>" class="mask"></a></div>
        <div class="text">
          <h6><a href="<?php echo get_permalink() ?>">
            <?php the_title(); ?>
            </a></h6>
          <?php custom_excerpt('regular') ?>
        </div>
        <div class="author-byline"> <i class="icon-pencil"></i>
          <h7><?php echo get_the_author_link(); ?></h7>
          <div class="pull-right"><i class="icon-calendar"></i>
            <?php the_time('F jS') ?>
          </div>
        </div>
      </div>
      <?php if ($c2%4 == 1){ echo '</div><div class="row">' ; } ?>
      
      <?php endwhile; endif;?>
    </div>
  </div>
  <div class="pagination pagination-centered">
    <?php
global $wp_query;

$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
'format' => '?paged=%#%',
'show_all' => False,
'end_size' => 1,
'mid_size' => 2,
'prev_next' => True,
'prev_text' => __('&laquo;','reverb'),
'next_text' => __('&raquo;','reverb'),
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages,
'type' => 'list'
) );
?>
  </div>
  <?php wp_reset_query(); ?>
</div>
</div>
</div>
<?php get_footer();?>
