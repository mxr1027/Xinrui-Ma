</div>
<div class="footbg">
  <div class="container box">
    <div class="row footer">
      <?php get_sidebar('footer');?>
    </div>
    <footer class="foot">
      <div class="row"> </div>
    </footer>
  </div>
  <!-- /container --> 
</div>
<div class="copyright">
  <h5><small><?php echo get_option("reverb_copyright_text"); ?></small></h5>
</div>
</div>

<?php if( get_option('reverb_google_analytics','true')): { ?>
<?php echo '<script type="text/javascript">'.stripslashes(get_option('ad_analytics','')).'</script>'; ?>
<?php }  endif;?>
<?php wp_footer(); ?>
<!-- xinruima.me Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc21c52e6ae3f8562324bee95cdc0b248' type='text/javascript'%3E%3C/script%3E"));
</script>
</body></html>