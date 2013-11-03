<div class="grid_sub_6 sub_alpha">
    <div class="footer_widget">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
            <h6><?php _e('Stay In Touch', 'bizway'); ?></h6>
            <ul>
                <li><a href="mailto:maxinrui1027@gmail.com"><?php _e('Send Me Email', 'bizway'); ?></a></li>
                <li><a href="https://www.linkedin.com/pub/xinrui-ma/67/400/304/" target="_blank"><?php _e('Find My Resume On LinkedIn', 'bizway'); ?></a></li>
                <li><a href="#"><?php _e('Rss Feed', 'bizway'); ?></a></li>
            </ul>    
        <?php endif; ?> 
    </div>
</div>
<div class="grid_sub_6 sub_middle">
    <div class="footer_widget">   
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h6><?php _e('Contact Details', 'bizway'); ?></h6>
            <?php _e("E-mail: maxinrui1027@gmail.com<br/>
            Contact No : +1-2028128851", "bizway"); ?>
        <?php endif; ?>
    </div>
</div>

<div class="grid_sub_6 sub_omega">
    <div class="footer_widget last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <h6><?php _e("Address", "bizway"); ?></h6>
            <p><?php _e('320 23rd Street South, APT 429, Arlington, VA, US.', 'bizway'); ?></p>
        <?php endif; ?>
    </div>
</div>