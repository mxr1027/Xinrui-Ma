<?php
/*
Template Name: Site Map
*/
?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div>
 <div class="banner-inner"><div class="container box">
  <h3>
    <?php the_title(); ?></h3>
  <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
</div></div>


<div class="container box" id="content">
<div class="row">
  <div class="span12">
    <div id="archive">
      <div class="row">
        <div class="span4">
        <h5><i class="icon-folder-open"> </i> 
            <?php _e('Archive By Day','reverb'); ?>
          </h5>
          <ul>
            <?php wp_get_archives('type=daily&limit=15'); ?>
          </ul>
        </div>
        <div class="span4">
          <h5><i class="icon-folder-open"> </i> 
            <?php _e('Archive By Month','reverb'); ?>
          </h5>
          <ul>
            <?php wp_get_archives('type=monthly&limit=12'); ?>
          </ul>
        </div>
        <div class="span4">
          <h5><i class="icon-folder-open"> </i> 
            <?php _e('Archive By Year','reverb'); ?>
          </h5>
          <ul>
            <?php wp_get_archives('type=yearly&limit=12'); ?>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="span4">
          <h5><i class="icon-pencil"> </i> 
            <?php _e('Latest Posts','reverb'); ?>
          </h5>
          <ul>
            <?php wp_get_archives('type=postbypost&limit=20'); ?>
          </ul>
        </div>
        <div class="span4">
          <h5><i class="icon-file-alt"> </i> 
            <?php _e('Pages','reverb'); ?>
          </h5>
          <ul>
            <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
          </ul>
        </div>
        <div class="span4">
          <h5><i class="icon-th"> </i> 
            <?php _e('Categories','reverb'); ?>
          </h5>
          <ul>
            <?php wp_list_categories('orderby=name&title_li='); ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- archive --> 
  </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>
