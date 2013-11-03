<?php
/**
 * The template for displaying the footer.
 */

?>

<?php if ( is_active_sidebar( 'pinbin_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'pinbin_footer' ); ?>
        </div><!-- // footer area with widgets -->   
<?php }  ?>           
<footer class="site-footer">
	 <div id="copyright">
	 	<?php _e( 'Pinbin Theme by', 'pinbin' ); ?> <a href="<?php echo esc_url( 'http://colorawesomeness.com/themes/' ); ?>" title="Color Awesomeness" target="_blank"><?php _e( 'Color Awesomeness', 'pinbin' ); ?></a> | 
		<?php _e( 'Copyright', 'pinbin' ) ?> <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> |
		<?php _e( 'Powered by' , 'pinbin' ); ?> <a href="http://www.wordpress.org" target="_blank" title="<?php _e( 'Powered by WordPress' , 'pinbin' ); ?>">WordPress</a>
	 </div><!-- // copyright -->   
</footer>     
</div><!-- // close wrap div -->   

<?php wp_footer(); ?>
	
<!-- xinruima.me Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc21c52e6ae3f8562324bee95cdc0b248' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>

