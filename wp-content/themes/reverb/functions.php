<?php
/*--------------------------*
/* A Few Directories
/*--------------------------*/

define('reverb_URL', get_template_directory()  . '/');
define('reverb_ADMIN', reverb_URL . '/admin');
define('reverb_INCLUDES', reverb_URL . '/includes');


/*--------------------------*
/* Image Sizes
/*--------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;
add_image_size('Home Pic', 266, 200, true);
add_image_size('Blog Pic', 370, 250, true);

/*--------------------------*
/* Load Scripts
/*--------------------------*/

function reverb_scripts_styles() {
	
/*--------------------------*
/* Enqueu Styles
/*--------------------------*/
	
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . "/css/bootstrap.min.css", array(), '0.1', 'screen' );
	wp_enqueue_style( 'bootstrap-responsive_css', get_template_directory_uri() . "/css/bootstrap-responsive.min.css", array(), '0.1', 'screen' );
  wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . "/css/font-awesome.min.css", 'screen' );
	wp_enqueue_style( 'lightbox_css', get_template_directory_uri() . "/css/lightbox.css", array(), '0.1', 'screen' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom_css', get_template_directory_uri() . "/css/style.php", 'screen' );
	$font  = get_option("reverb_font_selection");
	$g_font = str_replace(' ','+',$font);
	
/*--------------------------*
/* Google Fonts
/*--------------------------*/
	wp_enqueue_style('google_font', 'http://fonts.googleapis.com/css?family='.$g_font, NULL , NULL, NULL );
	
/*--------------------------*
/* Register jQuery
/*--------------------------*/
	wp_enqueue_script('jquery');
	
/*--------------------------*
/* Enqueu Scripts
/*--------------------------*/
	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', false, false , true);
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', false, false , true);
	wp_enqueue_script('plugins_js', get_template_directory_uri() . '/js/plugins.js', false, false , true);
	wp_enqueue_script('retina_js', get_template_directory_uri() . '/js/retina.js');
	wp_enqueue_script('lightbox_js', get_template_directory_uri() . '/js/lightbox.min.js', false, false , true);
 wp_enqueue_script('twitter_js', get_template_directory_uri().'/js/twitter.js', false, false , true);
	$data = array( 'social_twitname' => get_option('reverb_social_twitname', ''), 'social_tweets'=> get_option('reverb_social_tweets', ''));
	wp_localize_script('twitter_js', 'php_data', $data);
	
}
add_action( 'wp_enqueue_scripts', 'reverb_scripts_styles' );

/*--------------------------*
/* Localization
/*--------------------------*/

load_theme_textdomain( 'reverb', get_template_directory() . '/languages' );

/*--------------------------*
/* Register Menus
/*--------------------------*/

add_action( 'init', 'register_reverb_menus' );
 
function register_reverb_menus() {
	register_nav_menus(
		array(
			'menu-main' => __( 'Main Menu', 'reverb' ),
		)
	);
} 

/*--------------------------*
/* Custom Walker Class
/*--------------------------*/

    class reverb_Walker_Nav_Menu extends Walker_Nav_Menu 
    {     
       
        function start_lvl(&$output, $depth) 
        {
            $tabs = str_repeat("\t", $depth); 
           
            if ($depth == 0 || $depth == 1) { 
                $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n"; 
            } else { 
                $output .= "\n{$tabs}<ul>\n"; 
            } 
            return;
        } 
         
      
        function end_lvl(&$output, $depth)  
        {
            if ($depth == 0) { 
                 
                
                $output .= '<!--.dropdown-->'; 
            } 
            $tabs = str_repeat("\t", $depth); 
            $output .= "\n{$tabs}</ul>\n"; 
            return; 
        }
                 
              
        function start_el(&$output, $item, $depth, $args)  
        {    
            global $wp_query; 
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
            $class_names = $value = ''; 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes; 

           
            if ($item->hasChildren) { 
                $classes[] = 'dropdown'; 
                
                if($depth == 1) { 
                    $classes[] = 'dropdown-submenu'; 
                } 
            } 

          
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ); 
            $class_names = ' class="' . esc_attr( $class_names ) . '"'; 
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';             
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : ''; 
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
						$args = (object) $args;
            $item_output = $args->before; 
                         
           
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-hover="dropdown">'; 
            } else { 
                $item_output .= '<a'. $attributes .'>'; 
            } 
             
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; 

                   
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<b class="caret"></b></a>'; 
            } else { 
                $item_output .= '</a>'; 
            } 

            $item_output .= $args->after; 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
            return; 
        }
        
        
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>'; 
            return;
        } 
       
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
        { 
           
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]); 

          
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); 
        }         
    } 


/*--------------------------*
/* Bootstrap Active Class
/*--------------------------*/

add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );
function add_active_class($classes, $item) {
	if($item->menu_item_parent == 0 && in_array('current-menu-item', $classes)) {
        $classes[] = "active";
	}
    return $classes;
}

/*--------------------------*
/* Register Post Types
/*--------------------------*/

register_post_type('faq', array(
  'label' => __('FAQ', 'reverb'),
  'name' => __('FAQ', 'reverb'),
  'singular_label' => __('FAQ', 'reverb'),
  'add_new' => __('Add New', 'reverb'),
  'add_new_item' => __('Add New faq', 'reverb'),
  'edit_item' => __('Edit faq', 'reverb'),
  'new_item' => __('New faq', 'reverb'),
  'public' => true,
  'has_archive' => false,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => true,
  'rewrite' => array('slug' => 'gallery', 'with_front' => false),
  'query_var' => false,
   'menu_icon' => get_template_directory_uri(). '/img/functions/faq-ico.png',
  'supports' => array('title','editor'),
  'taxonomies' => array('category' ),
  ));
add_action('init', 'faq_add_default_boxes');

function faq_add_default_boxes() {
   
    
	register_taxonomy("faq_categories", array("faq"), array("hierarchical" => true, "label" => "FAQ Categories", "rewrite" => true));
}

/*--------------------------*
/* Register Widget Areas
/*--------------------------*/

if ( function_exists('register_sidebars') )

register_sidebar(array(
	'name' => 'Sidebar',
	'description' => 'Widgets in this area will be shown in the sidebar.',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	 'before_title' => '<div class="widget-heading"><h5 class="widget-title">',
   'after_title' => '</h5></div>'
));

register_sidebar(array(
	'name' => 'Footer',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div class="span3"><div class="widget">',
	'after_widget' => '</div></div>',
	 'before_title' => '<h5 class="widget-title invert">',
   'after_title' => '</h5>'
));

register_sidebar(array(
	'name' => 'Header',
	'description' => 'Place WooCommerce Cart Plus widget here.',
	'before_widget' => '',
	'after_widget' => '',
	 'before_title' => '',
   'after_title' => ''
	 
	 
));

/*--------------------------*
/* Site Options Panel
/*--------------------------*/

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');

	
/*--------------------------*
/* Metaboxes
/*--------------------------*/

require_once(reverb_ADMIN . '/metabox/meta.php');

/*--------------------------*
/* Dynamic Sidebars
/*--------------------------*/

require_once(reverb_ADMIN . '/sidebars/sbars.php');

/*--------------------------*
/* Plugins
/*--------------------------*/

require_once(reverb_INCLUDES . '/plugins/plugin.php');


/*--------------------------*
/* Pagination
/*--------------------------*/

function reverb_page_has_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*--------------------------*
/* Image Size Filter
/*--------------------------*/

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
 
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_theme_support ('post-thumbnails');

/*--------------------------*
/* Tags/Comments
/*--------------------------*/

require_once(reverb_INCLUDES . '/tags-comments/tags.php');

/*--------------------------*
/* Excerpt Length
/*--------------------------*/

class Excerpt {

  public static $length = 15;

  public static $types = array(
      'short' => 5,
      'regular' => 15,
      'long' => 50
    );

  public static function length($new_length = 15) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');

    Excerpt::output();
  }

  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  public static function output() {
    the_excerpt();
  }

}

function custom_excerpt($length = 15) {
  Excerpt::length($length);
}

/*--------------------------*
/* Shortcodes
/*--------------------------*/

require_once(reverb_ADMIN . '/shortcodes/accordion/accordion.php');
require_once(reverb_ADMIN . '/shortcodes/columns/columns.php');
require_once(reverb_ADMIN . '/shortcodes/notifications/notifications.php');
require_once(reverb_ADMIN . '/shortcodes/buttons/buttons.php');
require_once(reverb_ADMIN . '/shortcodes/code/code.php');
require_once(reverb_ADMIN . '/shortcodes/divider/divider.php');
require_once(reverb_ADMIN . '/shortcodes/icons/icons.php');
require_once(reverb_ADMIN . '/shortcodes/progress_bars/progress.php');
require_once(reverb_ADMIN . '/shortcodes/featured-slider/featured-slider.php');
require_once(reverb_ADMIN . '/shortcodes/social/social.php');
require_once(reverb_ADMIN . '/shortcodes/twitter/twitter.php');
require_once(reverb_ADMIN . '/shortcodes/heading/heading.php');
require_once(reverb_ADMIN . '/shortcodes/recentposts/recentposts.php');
require_once(reverb_ADMIN . '/shortcodes/tabs/tabs.php');
require_once(reverb_ADMIN . '/shortcodes/testimonial/testimonial.php');
require_once(reverb_ADMIN . '/shortcodes/textbox/textbox.php');
add_filter('widget_text', 'do_shortcode');

function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

/*--------------------------*
/* Default RSS link
/*--------------------------*/
add_theme_support( 'automatic-feed-links' );

/*--------------------------*
/* Blank Search Function
/*--------------------------*/

function make_blank_search ($query){
    global $wp_query;
    if (isset($_GET['s']) && $_GET['s']==''){  
        $wp_query->set('s',' ');
        $wp_query->is_search=true;
    }
    return $query;
}
add_action('pre_get_posts','make_blank_search');

/*--------------------------*
/* Search Form Fixes
/*--------------------------*/

function rv_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:','reverb') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="btn" value="'. esc_attr__('Search','reverb') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'rv_search_form' );

function rv_product_search_form( $product_form ) {

    $product_form = '<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>
">
<div>
  <label class="screen-reader-text" for="s">'. __( 'Search for:', 'woocommerce' ) .'</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. esc_attr__('Search for Products', 'woocommerce') .'" />
  <input type="submit" id="searchsubmit" class="btn" value="'. esc_attr__('Search') .'" />
  <input type="hidden" name="post_type" value="product" />
</div>
</form>
';

    return $product_form;
}

add_filter( 'get_product_search_form', 'rv_product_search_form' );

add_filter( 'get_search_form', 'rv_search_form' );

function rv_comment_form_submit_button($button) {
	$button =
		'
<input name="submit" type="submit" class="form-submit btn" tabindex="5" id="[args:id_submit]" value="[args:label_submit]" />
' .
		get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'rv_comment_form_submit_button');

/*--------------------------*
/* wooCommerce Image Sizes
/*--------------------------*/
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'yourtheme_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function yourtheme_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '',	// px
		'crop'		=> 0 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '',	// px
		'crop'		=> 0 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '300',	// px
		'height'	=> '',	// px
		'crop'		=> 0 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/*--------------------------*
/* Custom Message Changes
/*--------------------------*/

add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
	global $woocommerce;
 
	// Output success messages
	if (get_option('woocommerce_cart_redirect_after_add')=='yes') :
 
		$return_to 	= get_permalink(woocommerce_get_page_id('shop'));
 
		$message 	= sprintf('<a href="%s" class="btn">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
 
	else :
 
		$message 	= sprintf('<a href="%s" class="btn">%s</a> %s', get_permalink(woocommerce_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
 
	endif;
 
		return $message;
}

add_theme_support( 'woocommerce' );