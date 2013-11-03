<?php
/*
Template Name: Blog - Traditional
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
  <div class="container box" id="content">
    <div class="row left post-row">
    <div class="span9">
    
     <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $the_query = query_posts(
        array(
            
            'posts_per_page'=>2,
            'orderby'=>'date',
			 'paged'=>$paged
			
        )
    );
    
?>
<?php if (have_posts()) :
   while (have_posts()) :
       the_post(); ?>
        <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
        <?php $author_link = get_the_author_link(); ?>
        <?php $comments_count = wp_count_comments($post->ID); ?>
        <?php if(get_post_meta($post->ID, "ad_post_video", true) ) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
                                                     <span class="onsale"> <?php the_time('M d') ?></span>
        <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail(); }?></a>
        <h6><a href="<?php echo get_permalink() ?>">
            <?php the_title(); ?>
            </a></h6>
        <?php custom_excerpt('regular'); ?>
       
        <div class="arrow_box"></div>
        <div class="post-meta"><span><i class="icon-calendar"></i>
          <?php the_time('F jS, Y') ?>
          </span> <span><i class="icon-user"></i>By <?php echo $author_link; ?></a></span> <span><i class="icon-comment"></i>
          <?php  echo $comments_count->approved ?>
          comments</span></div>
      </div>
      <?php endwhile; endif;?><div class="pagination pagination-centered">
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
</div><?php wp_reset_query(); ?>
    </div> <?php get_sidebar('sidebar'); ?></div>
 </div>


<?php get_footer();?>
