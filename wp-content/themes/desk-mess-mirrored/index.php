<?php
/**
 * Desk Mess Mirrored
 *
 * Theme Description: Marble desktop covered with a mix of old and new items,
 * such as some vintage papers, a stainless steel pen, and, a hot cup of coffee!
 * Now with more documentation and post-format support for the following types:
 * asides, quotes and status!
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @internal    REQUIRES WordPress version 3.4
 * @internal    Tested up to WordPress version 3.5.1
 *
 * @version     2.2.1
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2013, Edward Caissie
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @internal Project To-do List - see readme.txt for pre-2.0 PTL
 * @todo Review post meta comment text - sort out how to show amount of comments if they exist when comments are closed
 * @todo Add Post-Format: Link - use infinity symbol
 * @todo Add specific CSS to the placeholders used by the new (comment) author classes
 *
 * @version     2.2
 * @date        March 2013
 *
 * @version     2.2.1
 * @date        July 2013
 *
 * @version     2.2.2
 * @date        July 20, 2013
 */

get_header(); ?>

<div id="maintop"></div>
<div id="wrapper">
    <div id="content">

        <div id="main-blog">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'desk-mess-mirrored', get_post_format() );
                } /** End while - have posts */
                get_template_part( 'dmm-navigation' );
            } else {
                dmm_no_posts_found();
            } /** End if - have posts */ ?>
        </div><!--end main blog-->

        <?php get_sidebar(); ?>

        <div class="clear"></div>

    </div><!--end content-->
</div><!--end wrapper-->
<?php get_footer();