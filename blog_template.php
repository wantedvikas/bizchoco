<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<div id="headerbottom">
    <div id="inheaderbottom">
        <div id="hbleft">
                <h2><?php the_title(); ?></h2>
        </div>
        <div id="hbright">
            <div id="searchwrapper"><form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
            <input type="text" id="s" class="searchbox" name="s" value="<?php the_search_query(); ?>" />
            <input type="submit" id="searchsubmit" value="Search" />
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
            <h2><?php the_title(); ?></h2>
            <em style="font-size:11px;">By <a href="#"><?php the_author_posts_link(); ?></a> on <?php the_time('F jS') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php the_category(', ') ?>   &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;   <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></em>
            <div class="space"></div>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <a href="<?php echo get_permalink() ?>"><img class="border hover" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=225&w=605&q=100" alt="" /></a>
            <?php the_excerpt(); ?><p style="margin-top:5px;"><a href="<?php echo get_permalink() ?>">Read More &rarr;</a></p><div class="sep"></div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
                <div class="navigation">
                    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bizchoco' ) ); ?></div>
                    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bizchoco' ) ); ?></div>
                </div>
            
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>