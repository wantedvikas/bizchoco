<?php
/*
Template Name: FAQ
*/

?>
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

    <div id="homecontent" style="padding-top:10px;">
    <?php
if (have_posts()) : while (have_posts()) : the_post();
?><div class="ninesixty" style="width:960px;">
            
            
            <?php the_content(); ?><div class="sep"></div></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
                <?php
        query_posts(array('post_type'=>'faq'));
if (have_posts()) : while (have_posts()) : the_post();
?>
        <h3>Q : <?php the_title(); ?></h3>
        <?php the_content(); ?><div class="sep2"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>

    </div>
<?php get_footer(); ?>