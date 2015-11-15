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
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img class="alignleft border" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=400&w=300&q=100" width="300" height="400" />
            <strong>Position:</strong> <?php echo get_post_meta($post->ID, "_position", true); ?><div class="sep2"></div>

<strong>Qualification:</strong> <?php echo get_post_meta($post->ID, "_qualification", true); ?><div class="sep2"></div>

<strong>Phone:</strong> <?php echo get_post_meta($post->ID, "_phone", true); ?><div class="sep2"></div>

<strong>Email:</strong> <?php echo get_post_meta($post->ID, "_semail", true); ?> <div class="sep2"></div>
<a class="ft someClass" href="http://twitter.com/<?php echo get_post_meta($post->ID, "_twitter", true); ?>" title="twitter">Twitter</a>
            <a class="ff someClass" href="<?php echo get_post_meta($post->ID, "_fb", true); ?>" title="facebook">Facebook</a>
            
<div class="clear"></div>
            <?php the_content(); ?><div class="sep"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>

                 
            
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>