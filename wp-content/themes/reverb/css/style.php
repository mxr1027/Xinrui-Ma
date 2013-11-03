<?php 
header("Content-type: text/css;");
$current_url = dirname(__FILE__);
$wp_content_pos = strpos($current_url, 'wp-content');
$wp_content = substr($current_url, 0, $wp_content_pos);
require_once($wp_content . 'wp-load.php');


$highlight_color  = get_option("reverb_highlight_color");
$font_color  = get_option("reverb_font_color");
$font_family  = get_option("reverb_font_selection");
$header_bg = get_option("reverb_header_bg");
$header_font = get_option("reverb_header_font_color");
?>

body {font-family: "<?php echo $font_family;?>",Helvetica,Arial,sans-serif;}
a { color: <?php echo $highlight_color;?>; }
.sidebar .widget ul li a:hover {color:<?php echo $highlight_color;?>;}
a:hover { color: <?php echo $highlight_color;?>;  }
#menu .pull-right {background-color:<?php echo $highlight_color;?>; }
#main-menu .active {border-bottom: 2px solid <?php echo $highlight_color;?>;}
.btn { background: <?php echo $highlight_color;?>; color:<?php echo $font_color;?>!important; }
.invert { background: <?php echo $highlight_color;?>!important;  }
.left .span3 li a:hover{ color:<?php echo $highlight_color;?>; }
.right .span3 li a:hover { color:<?php echo $highlight_color;?>; }
.sidebar .widget h5 {border-bottom: 1px solid <?php echo $highlight_color;?>;}
.sidebar .tagcloud a:hover { border: 1px solid <?php echo $highlight_color;?>;}
.footer .tagcloud a:hover { border: 1px solid <?php echo $highlight_color;?>;}
#faq .faq:hover .plus {background-color: <?php echo $highlight_color;?>;}
#faq .faq:hover .question {color: <?php echo $highlight_color;?>;}
.woocommerce span.onsale, .woocommerce-page span.onsale {background: <?php echo $highlight_color;?>!important;}
.woocommerce-info:before {background-color: <?php echo $highlight_color;?>!important;}
.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a { background-color: <?php echo $highlight_color;?>;  }
.dropdown-menu .active > a, .dropdown-menu .active > a:hover { background: <?php echo $highlight_color;?>; }
.logo a {color: <?php echo $header_font;?>;}
.header-cart {color:<?php echo $header_font;?>;}
.navbar .nav > li > a {color: <?php echo $header_font;?>;}
#social a {color: <?php echo $header_font;?>;}
.header {background: url('<?php echo $header_bg;?>') #222222;}
.woocommerce p.stars a:hover:before, .woocommerce p.stars a:focus:before, .woocommerce-page p.stars a:hover:before, .woocommerce-page p.stars a:focus:before {
   color: <?php echo $highlight_color;?>!important;
}
.woocommerce p.stars:before, .woocommerce-page p.stars:before { color: <?php echo $highlight_color;?>!important;	}
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus { border-color: <?php echo $highlight_color;?>!important; box-shadow:none!important;}
.label, .badge {background: <?php echo $highlight_color;?>;}
.woocommerce-message:before {background-color: <?php echo $highlight_color;?>!important;}
table#wp-calendar > tbody > tr > td > a {color:<?php echo $highlight_color;?>;}
.nav-tabs > .active > a, .nav-tabs > .active > a:hover { background: <?php echo $highlight_color;?>; border-color: <?php echo $highlight_color;?>;}
.nav-tabs > li > a:hover { background: <?php echo $highlight_color;?>; border-color: <?php echo $highlight_color;?>;}