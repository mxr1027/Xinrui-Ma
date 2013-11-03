<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title>
<?php wp_title( '|', true, 'right' ); ?>
<?php echo bloginfo( 'name' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="<?php echo get_option('reverb_favicon'); ?>">
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
<![endif]-->
</head>
<?php global $woo_options;
global $woocommerce; ?>
<body <?php body_class('woocommerce'); ?>>
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div class="header">
<div class="hero-unit"> </div>
<div class="container heading">
  <?php if ( get_option('reverb_sitelogo','true')) : {?>
  <div class="logo"> <a href="<?php echo home_url(); ?>"> <img class="a" src="<?php echo get_option('reverb_sitelogo');?>" alt=""> </a>
    <?php }
		 else: { ?>
    <div class="logo"><a href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
      </a>
      <?php } endif;?>
    </div>
    <div class="pull-right header-cart">
      <?php get_sidebar('header');?>
    </div>
    <section id="menu" class="row">
      <div class="span12">
        <aside id="quicklinks" class="navbar "  data-offset-top="130">
          <div class="navbar-inner"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> Menu </a>
            <div class="qlink ">
              <?php  wp_nav_menu( array( 'walker' => new reverb_walker_nav_menu(), 'theme_location' => 'menu-main', 'container_class' => 'nav-collapse', 'menu_class' => 'nav', 'menu_id' => 'main-menu')); ?>
              <?php $twitter  = get_option("reverb_social_twitname"); ?>
              <?php $facebook  = get_option("reverb_social_facebook"); ?>
              <?php $googleplus  = get_option("reverb_social_googleplus"); ?>
              <?php $linkedin  = get_option("reverb_social_linkedin"); ?>
              <?php $pinterest  = get_option("reverb_social_pinterest"); ?>
              <?php $rss  = get_option("reverb_social_rss"); ?>
              <?php $github  = get_option("reverb_social_github"); ?>
              <?php $youtube  = get_option("reverb_social_youtube"); ?>
              <?php $instagram  = get_option("reverb_social_instagram"); ?>
              <?php $email  = get_option("reverb_social_email"); ?>
              <?php if(!empty($twitter)){?>
              <div class="nav pull-right visible-desktop">
                <div class="social tooltips" id="social">
                  <?php if(!empty($linkedin)){?>
                  <a href="<?php echo $linkedin ?>" title="linkedin" data-tip="top" data-original-title="linkedin"> <i class="icon-linkedin"></i></a>
                  <?php } ?>
                  <?php if(!empty($pinterest)){?>
                  <a href="<?php echo $pinterest ?>" title="pinterest" data-tip="top" data-original-title="pinterest"> <i class="icon-pinterest"></i></a>
                  <?php } ?>
                  <?php if(!empty($rss)){?>
                  <a href="<?php echo $rss ?>" title="rss" data-tip="top" data-original-title="rss"> <i class="icon-rss"></i></a>
                  <?php } ?>
                  <?php if(!empty($github)){?>
                  <a href="<?php echo $github ?>" title="github" data-tip="top" data-original-title="github"> <i class="icon-github"></i></a>
                  <?php } ?>
                  <?php if(!empty($twitter)){?>
                  <a href="http://www.twitter.com/<?php echo $twitter; ?>" title="twitter" data-tip="top" data-original-title="twitter"> <i class="icon-twitter"></i></a>
                  <?php } ?>
                  <?php if(!empty($facebook)){?>
                  <a href="http://www.facebook.com/<?php echo $facebook; ?>" title="facebook" data-tip="top" data-original-title="facebook"> <i class="icon-facebook"></i></a>
                  <?php } ?>
                  <?php if(!empty($googleplus)){?>
                  <a href="<?php echo $googleplus ?>" title="googleplus" data-tip="top" data-original-title="google +1"> <i class="icon-google-plus"></i></a>
                  <?php } ?>
                  <?php if(!empty($youtube)){?>
                  <a href="<?php echo $youtube ?>" title="youtube" data-tip="top" data-original-title="you tube"> <i class="icon-youtube"></i></a>
                  <?php } ?>
                  <?php if(!empty($instagram)){?>
                  <a href="<?php echo $instagram ?>" title="instagram" data-tip="top" data-original-title="instagram"> <i class="icon-instagram"></i></a>
                  <?php } ?>
                  <?php if(!empty($email)){?>
                  <a href="mailto:<?php echo $email ?>" title="mail" data-tip="top" data-original-title="mail"> <i class="icon-envelope-alt"></i></a>
                  <?php } ?>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </aside>
      </div>
    </section>
  </div>
</div>
