<?php
	function shortcode_recent_posts($atts, $content=null, $code) {
	
	extract(shortcode_atts(array(
		'number' => ''
	), $atts));
	ob_start();
    $args = array('posts_per_page' => $number); ?>
    <div class="row-fluid">
		<div class="post-row blog-row">
   <?php $the_query = new WP_Query( $args );
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="span3 post blogitem">
        <div class="img"> <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
          <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('Blog Pic');
} else echo '<img src="'. get_template_directory_uri() .'/img/no-img.jpg" alt="Placeholder" />'; ?></a><a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="mask">
          </a> </div>
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
      <?php
			endwhile;  	wp_reset_query();?>
      </div></div>
      <?php
			
$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode( 'recent_posts', 'shortcode_recent_posts' );
?>