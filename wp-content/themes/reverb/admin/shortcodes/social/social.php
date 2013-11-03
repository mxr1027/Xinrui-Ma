<?php


function shortcode_social($atts, $content=null, $code) {
	
	extract(shortcode_atts(array(
		
	), $atts));
	ob_start();
	?>
<div class="social tooltips" id="social-sc">
         <?php $twitter  = get_option("reverb_social_twitname"); ?>
    <?php $facebook  = get_option("reverb_social_facebook"); ?>
    <?php $googleplus  = get_option("reverb_social_googleplus"); ?>
    <?php $linkedin  = get_option("reverb_social_linkedin"); ?>
    <?php $pinterest  = get_option("reverb_social_pinterest"); ?>
    <?php $rss  = get_option("reverb_social_rss"); ?>
    <?php $github  = get_option("reverb_social_github"); ?>
       <?php if(!empty($linkedin)){?>
        <a href="<?php $linkedin ?>" title="linkedin" data-tip="top" data-original-title="linkedin"> <i class="icon-linkedin"></i></a>
        <?php } ?>
        <?php if(!empty($pinterest)){?>
        <a href="<?php $pinterest ?>" title="pinterest" data-tip="top" data-original-title="pinterest"> <i class="icon-pinterest"></i></a>
        <?php } ?>
        <?php if(!empty($rss)){?>
        <a href="<?php $rss ?>" title="rss" data-tip="top" data-original-title="rss"> <i class="icon-rss"></i></a>
        <?php } ?>
        <?php if(!empty($github)){?>
        <a href="<?php $github ?>" title="github" data-tip="top" data-original-title="github"> <i class="icon-github"></i></a>
        <?php } ?>
        <?php if(!empty($twitter)){?>
        <a href="http://www.twitter.com/<?php echo $twitter; ?>" title="twitter" data-tip="top" data-original-title="twitter"> <i class="icon-twitter"></i></a>
        <?php } ?>
        <?php if(!empty($facebook)){?>
        <a href="http://www.facebook.com/<?php echo $facebook; ?>" title="facebook" data-tip="top" data-original-title="facebook"> <i class="icon-facebook"></i></a>
        <?php } ?>
        <?php if(!empty($googleplus)){?>
        <a href="<?php $googleplus ?>" title="googleplus" data-tip="top" data-original-title="google +1"> <i class="icon-google-plus"></i></a>
        <?php } ?>
       
      </div>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

	add_shortcode("social", "shortcode_social");
?>