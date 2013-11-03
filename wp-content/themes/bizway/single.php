<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Bizway
 */
?>
<?php get_header(); ?>
<div class="page-heading-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-heading">
            </div> 
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--Start Page Content -->
<div class="page-content-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">
                <div class="grid_sub_16 sub_alpha">
                    <div class="content-bar">
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : the_post(); ?>
                            <!--post start-->
                            <div class="post single">
                                <h1 class="post_title"><?php the_title(); ?></h1> 
                                <div class="post_date">
                                    <ul class="date">
                                        <li class="day"><?php echo get_the_time('M') ?></li>
                                        <li class="month"><?php echo get_the_time('d') ?></li>
                                    </ul>
                                </div>
                                <ul class="post_meta">
                                    <li class="posted_by"><span><?php _e('Posted by', 'bizway'); ?></span>&nbsp;&nbsp; <?php the_author_posts_link(); ?></li>
                                    <li class="post_category"><span><?php _e('Posted in', 'bizway'); ?></span>&nbsp;&nbsp;<?php the_category(', '); ?></li>
                                    <?php if (comments_open()) : ?>
                                        <li class="post_comment"><?php comments_popup_link('', '1', '%'); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="post_content"> 
                                    <?php the_content(); ?>
                                    <div class="clear"></div>
                                    <?php if (has_tag()) { ?>
                                        <div class="tag">
                                            <?php the_tags('Post Tagged with ', ', ', ''); ?>
                                        </div>
                                    <?php } ?>
									<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<span class="bds_more">Share to：</span>
<a class="bds_renren"></a>
<a class="bds_fbook"></a>
<a class="bds_twi"></a>
<a class="bds_tsina"></a>
<a class="bds_qzone"></a>
<a class="bds_tqq"></a>
<a class="bds_t163"></a>
<a class="bds_linkedin"></a>
<a class="bds_douban"></a>
<a class="bds_kaixin001"></a>
<a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=4844760" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
                                </div>
                            </div>
                            <!--End Post-->
                            <?php wp_link_pages(array('before' => '' . __('Pages:', 'bizway'), 'after' => '')); ?>
                            <nav id="nav-single">
                                <span class="nav-previous"><?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous post', 'bizway')); ?></span>
                                <span class="nav-next"><?php next_post_link('%link', __('Next post <span class="meta-nav">&rarr;</span>', 'bizway')); ?></span>
                            </nav><!-- #nav-single -->

                        <?php else: ?>
                            <div class="post">
                                <p>
                                    <?php _e('Sorry, no posts matched your criteria.', 'bizway'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <!--End Loop-->
                        <!--Start Comment box-->
                        <?php comments_template(); ?>
                        <!--End Comment box-->
                    </div>    
                </div>
                <div class="grid_sub_8 sub_omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>    
        </div>
        <div class="clear"></div>
    </div>    
</div>
<?php get_footer(); ?>