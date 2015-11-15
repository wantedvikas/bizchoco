<?php
/*
Template Name: Testimonial
*/
$pagenum = $wp_query->query_vars;
$pagenum = $pagenum['paged'];
if (empty($pagenum)) {
$pagenum = 1;
}
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
?>
            
            
            <?php the_content(); ?><div class="sep"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
        <?php
        $wp_query = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => -1));
if (have_posts()) : while (have_posts()) : the_post();
?>
        <blockquote><?php the_content(); ?></blockquote>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<img class="border alignright" src="<?php echo $image[0]; ?>" width="30" height="30" />
			<p class="border alignright"><?php the_title(); ?><br /><em style="font-size:10px;"><?php echo get_post_meta($post->ID, "_date", true); ?></em></p><div class="clear"></div><div class="sep2"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
    </div>
<?php get_footer(); ?>