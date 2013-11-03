<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		 <meta name="keywords" content="Xinrui Ma, 马昕睿, Java, Web开发, GWU, Web前端" />
		 <meta name="description" content="Xinrui Ma's personal website, I am an overseas students, from China, located in USA now, the website is used for hunting jobs and make study notes, display my ability. 这是马昕睿的个人网站，我是一个在美国的留学生，这个网站用来展示我的能力，以及找工作需要，兼具学习笔记的blog." />
		 <meta name="baidu_union_verify" content="d588a6fe937a63416ee0afc89644b55b">
		 <meta name="baidu-site-verification" content="yxlZ8w96rr" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?>
        </title>             
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
         </script>
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?> id="regal_body">
        <div class="header-container">
            <div class="container_24">
                <div class="grid_24">
                    <div class="header">
                        <!--Start Logo-->
                        <div class="logo"> <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php if (bizway_get_option('bizway_logo') != '') { ?><?php echo bizway_get_option('bizway_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
                        <!--End Logo-->
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="menu-container">
            <div class="container_24">
                <div class="grid_24">
                    <div class="grid_sub_19 sub_alpha"> 
                        <!--Start Menu_Wrapper-->
                        <div class="menu_wrapper">
                            <?php bizway_nav(); ?>
                        </div>
                        <!--End Menu Wrapper-->
                    </div>
                    <div class="grid_sub_5 sub_omega">
                        <div class="top-search">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
