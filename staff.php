<?php
/*
Template Name: Our Team
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
        <ul class="fiveportfolio">
        <?php
        $wp_query = new WP_Query(array('post_type' => 'staff', 'posts_per_page' => -1));
if (have_posts()) : while (have_posts()) : the_post();
?>
            <li>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img class="border" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=125&w=165&q=100" height="125" width="165" /><br />
                <strong><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></strong><br />
                <?php echo get_post_meta($post->ID, "_position", true); ?><div class="sep2"></div><br /><br />
            </li>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
            
        </ul>

    </div>
<?php get_footer(); ?>