<?php
/*--------------------------*
/* Tag Cloud Function
/*--------------------------*/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 12;
	$args['largest'] = 12;
	$args['smallest'] = 12;
	$args['unit'] = 'px';
	return $args;
}

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"paging\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a><span class=\"active\">".$i."</span></a>":"<a href='".get_pagenum_link($i)."' class=\"inactive\"><span>".$i."</span></a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

/*--------------------------*
/*  Comments
/*--------------------------*/

if ( ! function_exists( 'cl_comment' ) ) :
function cl_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

<li>
  <div class="comment">
    <div class="avatar-box"> <?php echo get_avatar( $comment, 32 ); ?> </div>
    <div class="meta"> <strong class="author"><a href="#"><?php echo get_comment_author_link(); ?></a></strong>
      <div class="box-row">
        <ul class="links-list">
          <li><a class="edit">
            <?php edit_comment_link( __( '(Edit)', 'reverb' ), ' ' ); ?>
            </a></li>
          <li>
            <?php comment_reply_link( array_merge( $args, array( 'class'=>'text-reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
          </li>
        </ul>
        <em class="date">
         <?php comment_date('F jS'); ?>
        </em> </div>
    </div>
    <div class="comment-box">
     
         
            
              <?php comment_text(); ?>
           
    </div>
  </div>
  <?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
<li class="post pingback">
  <p>
    <?php _e( 'Pingback:', 'reverb'); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'reverb' ), ' ' ); ?>
  </p>
  <?php
			break;
	endswitch;
}
endif;


add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}
?>