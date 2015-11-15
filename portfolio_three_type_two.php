<?php
/*
Template Name: Portfolio 3 Column Type 2
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

  <div id="homecontent2">
    <ul class="threeportfolio">
    <?php
        global $wp_query;
query_posts( array('post_type' => array( 'portfolio' ),'showposts' => 12, 'paged'=>$paged )
);
if (have_posts()) : while (have_posts()) : the_post();
?>
      <li>
        <h5><?php the_title(); ?></h5>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>"><img class="border hover" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=400&w=270&q=100" height="400" width="270" /></a><br /><br />
        <?php the_excerpt(); ?><div class="sep2"></div><br /><br />
      </li>
      <?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
      
      <div class="clear"></div>
      <div class="navigation">
        <div class="alignleft"><?php posts_nav_link( '$sep', $prelabel, $nextlabel ); ?></div>
        </div>
    </ul>

  </div>
<?php get_footer(); ?>