<?php
define('TEMPLATE_DIR',get_template_directory());
define('TEMPLATE_URI',get_template_directory_uri());
include_once get_template_directory() . '/functions/bizway-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
require_once ($functions_path . 'themes-page.php');

function my_formatter($content) {
          $new_content = '';
          $pattern_full = '{(\[raw\].*?\[/raw\])}is';
          $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
          $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
          foreach ($pieces as $piece) {
             if (preg_match($pattern_contents, $piece, $matches)) {
                $new_content .= $matches[1];
             } else {
                $new_content .= wptexturize(wpautop($piece));
             }
         }
   return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);