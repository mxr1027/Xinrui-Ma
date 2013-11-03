<?php
/*
Plugin Name: No wpautop
Plugin URI: http://www.bake-the-web.de/2012/03/22/no-wpautop/
Description: Disables the wpautop function for the_content, the_excerpt or both.
Version: 1.1
Author: Peter Schuhknecht
Author URI: http://www.bake-the-web.de
License: GPL2
*/

// Load language files
load_plugin_textdomain('nowpautop', false, basename( dirname( __FILE__ ) ) . '/lang' );

// Add to the Admin function list
if (! function_exists('nowpautop_addoptions')) {
  function nowpautop_addoptions() {
    if (function_exists('add_options_page')) {
      add_options_page('No WPautop Plugin Options', 'No WPautop', 9, basename(__FILE__), 'nowpautop_options_subpanel');
    }
  }
}
if (! function_exists('nowpautop_options_subpanel')) {
  function nowpautop_options_subpanel() {
    global $wpdb, $table_prefix;

    if (isset($_POST['info_update'])) {
		update_option('nowpautop_where', $_POST['nowpautop_where']);
		

		echo '<div class="updated"><p><strong>';
		_e('Your options have been saved.', 'nowpautop');
		echo'</strong></p></div>';
    }
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30305402-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<div class="wrap">
	<h2>No WPautop <?php _e('Options', 'nowpautop'); ?></h2><br />
    <?php _e('With <b>No WPautop</b> you can disable the WordPress function wpautop which automatically inserts paragraphs in contents and excerpts.', 'nowpautop'); ?><br />
    <br />
	<?php _e('If you want to disable WPautop complete, use <b>Exerpt and Content</b> (default for this plugin).', 'nowpautop'); ?><br />
	<br />
	<?php _e('More Plugin-Information', 'nowpautop'); ?>: <a target="_blank" href="http://www.bake-the-web.de/2012/03/22/no-wpautop/">http://www.bake-the-web.de/2012/03/22/no-wpautop/</a><br />
	<br />
	<form method="post">
		<strong><?php _e('Disable WPautop for', 'nowpautop'); ?>:</strong><br />
		<br />
			<input name="nowpautop_where" id="nowpautop_where_1" type="radio" value="both" <?php if (get_option('nowpautop_where', 'both') == "both") echo "checked" ?> />
				<label for="nowpautop_where_1" title="<?php _e('Excerpt <b>and</b> Content', 'nowpautop'); ?>">
					<?php _e('Excerpt <b>and</b> Content', 'nowpautop'); ?>
				</label><br />
				
			<input name="nowpautop_where" id="nowpautop_where_2" type="radio" value="excerpt" <?php if (get_option('nowpautop_where', 'both') == "excerpt") echo "checked" ?> />
				<label for="nowpautop_where_2" title="<?php _e('Excerpt', 'nowpautop'); ?>">
					<?php _e('Excerpt', 'nowpautop'); ?>
				</label><br />
				
			<input name="nowpautop_where" id="nowpautop_where_3" type="radio" value="content" <?php if (get_option('nowpautop_where', 'both') == "content") echo "checked" ?> />
				<label for="nowpautop_where_3" title="<?php _e('Content', 'nowpautop'); ?>">
					<?php _e('Content', 'nowpautop'); ?>
				</label><br />
				
			<input name="nowpautop_where" id="nowpautop_where_4" type="radio" value="no" <?php if (get_option('nowpautop_where', 'both') == "no") echo "checked" ?> />
				<label for="nowpautop_where_4" title="<?php _e('nothing (WPautop works)', 'nowpautop'); ?>">
					<?php _e('nothing (WPautop works)', 'nowpautop'); ?>
				</label><br />
		<br />
		<br />
    <input type="submit" name="info_update" value="<?php _e('Save', 'nowpautop'); ?>" /><br /><br />
	</form>
</div>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab" id="Player_37cc7372-2db5-46f6-80c1-2e616ed823ef"  WIDTH="728px" HEIGHT="90px"> <PARAM NAME="movie" VALUE="http://ws.amazon.de/widgets/q?ServiceVersion=20070822&MarketPlace=DE&ID=V20070822%2FDE%2Fbak04-21%2F8009%2F37cc7372-2db5-46f6-80c1-2e616ed823ef&Operation=GetDisplayTemplate"><PARAM NAME="quality" VALUE="high"><PARAM NAME="bgcolor" VALUE="#FFFFFF"><PARAM NAME="allowscriptaccess" VALUE="always"><embed src="http://ws.amazon.de/widgets/q?ServiceVersion=20070822&MarketPlace=DE&ID=V20070822%2FDE%2Fbak04-21%2F8009%2F37cc7372-2db5-46f6-80c1-2e616ed823ef&Operation=GetDisplayTemplate" id="Player_37cc7372-2db5-46f6-80c1-2e616ed823ef" quality="high" bgcolor="#ffffff" name="Player_37cc7372-2db5-46f6-80c1-2e616ed823ef" allowscriptaccess="always"  type="application/x-shockwave-flash" align="middle" height="90px" width="728px"></embed></OBJECT> <NOSCRIPT><A HREF="http://ws.amazon.de/widgets/q?ServiceVersion=20070822&MarketPlace=DE&ID=V20070822%2FDE%2Fbak04-21%2F8009%2F37cc7372-2db5-46f6-80c1-2e616ed823ef&Operation=NoScript">Amazon.de Widgets</A></NOSCRIPT>
<?php
  }
}

add_action('admin_menu', 'nowpautop_addoptions');

if(get_option('nowpautop_where', 'both') == "both" OR get_option('nowpautop_where', 'both') == "content"){
	remove_filter('the_content', 'wpautop');
}

if(get_option('nowpautop_where', 'both') == "both" OR get_option('nowpautop_where', 'both') == "excerpt"){
	remove_filter('the_excerpt', 'wpautop');
}
?>
