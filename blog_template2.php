<?php
/*
Template Name: Blog Left Thumbnail
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

    <div id="homecontent">
        <div id="blog">
        <?php
$query_string = "paged=$paged";
query_posts($query_string);
if (have_posts()) : while (have_posts()) : the_post();
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<img class="border alignleft" style="margin-top:8px;" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=150&w=200&q=100" width="200" height="150" />
            <h2><?php the_title(); ?></h2>
            <em style="font-size:11px;">By <a href="#"><?php the_author_posts_link(); ?></a> on <?php the_time('F jS') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php the_category(', ') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></em>
            <div class="space"></div>
            
            <?php the_excerpt(); ?><p><a href="<?php echo get_permalink() ?>">Read More &rarr;</a></p><div class="clear"></div><div class="sep"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
                <div class="navigation">
        <div class="alignleft"><?php posts_nav_link( '$sep', $prelabel, $nextlabel ); ?></div>
        </div>
            
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>