<?php
/*
Template Name: FAQ
*/
?>
<?php get_header();?>
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
<?php $sidebar_location = get_option('reverb_sidebar_location'); 
						if ($sidebar_location == "option1") {
						?>
<div class="row left">
<div class="span9">
  <div id="faq" class="faq_page">
    <?php
			
			//
$querystr = "SELECT terms.* FROM $wpdb->term_taxonomy tax LEFT JOIN $wpdb->terms terms ON tax.term_id = terms.term_id WHERE tax.taxonomy = 'faq_categories'";

$categories = $wpdb->get_results($querystr, OBJECT);

foreach( $categories as $category ): 
    echo '<div class="category-header"><h5>'.$category->name.'</h5>';
    echo '<p class="category-description">'.strip_tags(term_description($category->term_id,'faq_categories')).'</p></div>';

    $posts = get_posts( array( 'faq_categories' => $category->name, 'post_type' => 'faq', 'numberposts' => -1 ) ); 
    foreach($posts as $post) :
        setup_postdata($post); 
?>
    <div class="faq">
      <div class="plus">+</div>
      <div class="question">
        <?php the_title(); ?>
      </div>
      <div class="answer">
        <?php the_content(); ?>
        <hr />
      </div>
    </div>
    <?php
    endforeach;

endforeach;

?>
  </div>
</div>
<?php wp_reset_query() ?>
<?php get_sidebar();
				  } elseif ($sidebar_location == "option2") {
						
					?>
<div class="row right">
  <?php get_sidebar(); ?>
  <div class="span9">
    <div id="faq" class="faq_page">
       <?php
			
			//
$querystr = "SELECT terms.* FROM $wpdb->term_taxonomy tax LEFT JOIN $wpdb->terms terms ON tax.term_id = terms.term_id WHERE tax.taxonomy = 'faq_categories'";

$categories = $wpdb->get_results($querystr, OBJECT);

foreach( $categories as $category ): 
    echo '<div class="category-header"><h5>'.$category->name.'</h5>';
    echo '<p class="category-description">'.strip_tags(term_description($category->term_id,'faq_categories')).'</p></div>';

    $posts = get_posts( array( 'faq_categories' => $category->name, 'post_type' => 'faq', numberposts => -1 ) ); 
    foreach($posts as $post) :
        setup_postdata($post); 
?>
    <div class="faq">
      <div class="plus">+</div>
      <div class="question">
        <?php the_title(); ?>
      </div>
      <div class="answer">
        <?php the_content(); ?>
        <hr />
      </div>
    </div>
    <?php
    endforeach;

endforeach;

?>
    </div>
  </div>
  <?php wp_reset_query() ?>
  <?php	 }?>
</div>
<?php get_footer();?>
