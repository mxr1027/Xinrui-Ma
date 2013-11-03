<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Bizway
 * @since Bizway 1.0
 */
?>

<!--Start Footer Wrapper-->
<div class="footer-wrapper">
    <!--Start Wrapper-->
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
<!--End Wrapper-->
<!--End Footer Wrapper-->
<!--Start Footer Bottom-->
<div class="footer_bottom">
    <!--Start Wrapper-->
    <div class="wrapper">
        <div class="container_24">
            <div class="grid_24">
                <div class="footer_bottom_content">
                    <p class="theme_desc"><?php echo get_bloginfo('title'); ?>-<?php echo get_bloginfo('description'); ?></p>
                    <?php if (bizway_get_option('bizway_footertext') != '') { ?>
                    <p class="copyright"><?php echo esc_attr(bizway_get_option('bizway_footertext')); ?></p> 
                    <?php } else { ?>
                        <p class="copyright"> <?php _e('<a href="http://www.inkthemes.com">BizWay Theme</a> powered by <a href="http://www.wordpress.org">WordPress</a>','bizway'); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--End Wrapper-->
</div>
<!--End Footer Bottom-->
<?php wp_footer(); ?>

<!-- xinruima.me Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc21c52e6ae3f8562324bee95cdc0b248' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fdd218eaaa290363d167758132bc71867' type='text/javascript'%3E%3C/script%3E"));
</script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-42630226-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>