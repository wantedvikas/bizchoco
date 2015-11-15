<?php get_header(); ?>
<div id="headerbottom">
    <div id="inheaderbottom">
        <div id="hbleft">
                <h2>Blog</h2>
        </div>
        <div id="hbright">
            <div id="searchwrapper"><form action="">
            <input type="text" id="s" class="searchbox" name="s" value="" />
            </form>
            </div>
        </div><div class="clear"></div>
    </div>
    </div>

    <div id="homecontent">
        <div id="blog">
        <?php
if (have_posts()) : while (have_posts()) : the_post();
?>
            <h2><?php the_title(); ?></h2>
            <em style="font-size:11px;">By <a href="#"><?php the_author_posts_link(); ?></a> on <?php the_time('F jS') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php the_category(', ') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></em>
            <div class="space"></div><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content(); ?></div><p><?php the_tags(); ?></p>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=standard&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; margin-top:3px;height:25px;" allowTransparency="true"></iframe>
<div id="ts" style="margin-left:300px;margin-top:-25px;">
        <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink() ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="acrisdesign">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="http://www.stumbleupon.com/hostedbadge.php?s=1"></script>&nbsp;&nbsp;
<g:plusone size="medium"></g:plusone>
</div>

<div class="sep"></div>
<?php endwhile; ?><?php comments_template( '', true ); ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
            
        </div>
        <div id="blogsidebarsep"></div>
        <div id="sidebar">
            <?php dynamic_sidebar( 'Right Sidebar' ); ?>


        </div><div class="clear"></div>

    </div>
<?php get_footer(); ?>