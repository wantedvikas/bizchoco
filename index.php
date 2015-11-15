<?php get_header(); ?>
<div id="headerbottom">
    <div id="inheaderbottom">
        <div id="hbleft">
                <h2><?php the_title(); ?></h2>
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
            <?php the_excerpt(); ?><p><a href="<?php echo get_permalink() ?>">Read More &rarr;</a></p><div class="sep"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
            
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>