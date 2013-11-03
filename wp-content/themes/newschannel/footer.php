
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">
			<?php echo __('&copy; ', 'newschannel') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_home() || is_front_page() ) : ?>
            <?php _e('- Powered by ', 'newschannel'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'newschannel' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'newschannel' ); ?>"><?php _e('Wordpress' ,'newschannel'); ?></a>
			<?php _e(' and ', 'newschannel'); ?><a href="<?php echo esc_url( __( 'http://citizenjournal.net/', 'newschannel' ) ); ?>"><?php _e('Citizen Journal', 'newschannel'); ?></a>
            <?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>

<!-- xinruima.me Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc21c52e6ae3f8562324bee95cdc0b248' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>