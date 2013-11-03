<?php

include_once get_template_directory() . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces 
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings 
?>
<?php

/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function roadfighter_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('roadfighter-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
        wp_enqueue_script('roadfighter-cunfon-yui', get_template_directory_uri() . '/js/cufon-yui.js', array('jquery'));
        wp_enqueue_script('roadfighter-Elampa-font', get_template_directory_uri() . '/js/Elampa_400.font.js', array('jquery'));
        wp_enqueue_script('roadfighter-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    } elseif (is_admin()) {
        
    }
}

add_action('wp_enqueue_scripts', 'roadfighter_wp_enqueue_scripts');
/* ----------------------------------------------------------------------------------- */
/* Custom Jqueries Enqueue */
/* ----------------------------------------------------------------------------------- */

function roadfighter_custom_jquery() {
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . "/js/mobile-menu.js", array('jquery'));
}

add_action('wp_footer', 'roadfighter_custom_jquery');
//Front Page Rename
$get_status = roadfighter_get_option('re_nm');
$get_file_ac = get_template_directory() . '/front-page.php';
$get_file_dl = get_template_directory() . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}

//
function roadfighter_get_option($name) {
    $options = get_option('roadfighter_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function roadfighter_update_option($name, $value) {
    $options = get_option('roadfighter_options');
    $options[$name] = $value;
    return update_option('roadfighter_options', $options);
}

//
function roadfighter_delete_option($name) {
    $options = get_option('roadfighter_options');
    unset($options[$name]);
    return update_option('roadfighter_options', $options);
}

//Enqueue comment thread js
function roadfighter_enqueue_scripts() {
    if (is_singular() and get_site_option('thread_comments')) {
        wp_enqueue_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'roadfighter_enqueue_scripts');
?>