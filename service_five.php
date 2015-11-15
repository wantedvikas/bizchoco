<?php
/*
Template Name: Service Five Column
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

    <div id="homecontent2" style="padding-top:10px;">
    <?php
if (have_posts()) : while (have_posts()) : the_post();
?><div class="ninesixty" style="width:960px;">
            <?php the_content(); ?><div class="sep"></div></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
        <ul class="fiveservice">
        <?php
        $wp_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => -1));
if (have_posts()) : while (have_posts()) : the_post();
?>
            <li><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img class="alignleft" style="margin-top:5px;" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=30&w=30&q=100" height="30" width="30" /><h5><?php the_title(); ?></h5>
                <?php the_content(); ?><div class="sep2"></div><br /><br />
            </li>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
            
        </ul>

    </div>
<?php get_footer(); ?>