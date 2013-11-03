<div class="footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer">
                <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">
                <div class="grid_8 alpha">         
                    <ul class="social_logos">
                        <?php if (roadfighter_get_option('roadfighter_facebook') != '') { ?>
                            <li class="sl-1"><a href="<?php echo roadfighter_get_option('roadfighter_facebook'); ?>"><span></span></a></li>
                        <?php } ?> 
                        <?php if (roadfighter_get_option('roadfighter_twitter') != '') { ?>
                            <li class="sl-2"><a href="<?php echo roadfighter_get_option('roadfighter_twitter'); ?>"><span></span></a></li>
                        <?php } ?>            
                        <?php if (roadfighter_get_option('roadfighter_rss') != '') { ?>
                            <li class="sl-3"><a href="<?php echo roadfighter_get_option('roadfighter_rss'); ?>"><span></span></a></li>
                        <?php } ?> 
                        <?php if (roadfighter_get_option('roadfighter_google') != '') { ?>
                            <li class="sl-4"><a href="<?php echo roadfighter_get_option('roadfighter_google'); ?>"><span></span></a></li>
                        <?php } ?> 
                        <?php if (roadfighter_get_option('roadfighter_pinterest') != '') { ?>
                            <li class="sl-5"><a href="<?php echo roadfighter_get_option('roadfighter_pinterest'); ?>"><span></span></a></li>
                        <?php } ?> 
                        <?php if (roadfighter_get_option('roadfighter_youtube') != '') { ?>
                            <li class="sl-6"><a href="<?php echo roadfighter_get_option('roadfighter_youtube'); ?>"><span></span></a></li>
                        <?php } ?> 
                        <?php if (roadfighter_get_option('roadfighter_sd') != '') { ?>
                            <li class="sl-7"><a href="<?php echo roadfighter_get_option('roadfighter_sd'); ?>"><span></span></a></li>
                        <?php } ?> 
                    </ul>
                </div>
                <div class="grid_16 omega">
                    <div class="copyrightinfo">
                        <p class="copyright"><a href="<?php echo urldecode('http://www.inkthemes.com'); ?>"><?php _e('RoadFighter Theme','rdf'); ?></a> <?php _e('Powered By','rdf'); ?><a href="<?php echo urlencode('http://www.wordpress.org'); ?>"><?php _e('WordPress','rdf'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php wp_footer(); ?>
<!-- xinruima.me Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc21c52e6ae3f8562324bee95cdc0b248' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
