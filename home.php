<?php get_header(); ?>
    <div id="inslider">
   
    <div id="slider">


    <?php
    $slidertype = get_option('of_slider_type');
    if ($slidertype=="nivoslider") {
        ?>

        <div id="nivoSlider" class="nivoSlider">
                <?php
        $wp_query = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => -1));
if (have_posts()) : while (have_posts()) : the_post();
?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&amp;h=366&amp;w=960&amp;q=100" width="960" alt="" title="<?php the_title(); ?>" />
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>                
            </div>

<?php } ?>
<?php
    $slidertype = get_option('of_slider_type');
    if ($slidertype=="slidejs") {
        ?>
             <div id="slides">
                <div class="slides_container">
                <?php
        $wp_query = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => -1));
if (have_posts()) : while (have_posts()) : the_post();
?>
                    <div><?php the_content(); ?></div>
                    <?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
                </div>
                <a href="#" class="prev"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
                <a href="#" class="next"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
            </div>

<?php } ?>
    </div>
    </div>

    <div id="homecontent">


        <div class="one_third">
            <?php dynamic_sidebar( 'Home1' ); ?>
        </div>
        <div class="one_third">
            <?php dynamic_sidebar( 'Home2' ); ?>
        </div>
        <div class="one_third last">
            <?php dynamic_sidebar( 'Home3' ); ?>
        </div><div class="clear"></div>

        <div class="sep"></div>


<?php
    $slidertype = get_option('of_enable_disable_bb');
    if ($slidertype=="enable") {
        ?>       

<?php
query_posts('posts_per_page=2');
if (have_posts()) : while (have_posts()) : the_post();
?><div class="one_third">
            <h3><?php the_title(); ?></h3>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="imgHover"><div class="hover"><a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/view.png" alt="" /></a></div><img class="border" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&amp;h=115&amp;w=288&amp;q=100" width="288" alt="" /></div>
            <div class="sep2"></div>
            <?php the_excerpt(); ?>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
<?php
query_posts('posts_per_page=1&offset=2');
if (have_posts()) : while (have_posts()) : the_post();
?>
        <div class="one_third last">
            <h3><?php the_title(); ?></h3>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="imgHover"><div class="hover"><a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/view.png" alt="" /></a></div><img class="border" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&amp;h=115&amp;w=288&amp;q=100" width="288" alt="" /></div>
            <div class="sep2"></div>
            <?php the_excerpt(); ?>
        </div>
<?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?>
        <div class="clear"></div>
            <div class="sep"></div>

<?php } ?>

<?php
    $slidertype = get_option('of_enable_disable_pp');
    if ($slidertype=="enable") {
        ?>

<ul id="slider1" class="multiple"> 
<?php
global $wp_query;
query_posts( array('post_type' => array( 'portfolio' ),'showposts' => -1, 'paged'=>$paged )
);
if (have_posts()) : while (have_posts()) : the_post();
?>
  <li> 
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&amp;h=128&amp;w=207&amp;q=100" width="207" height="128" alt="" /></a>
  </li>
  <?php endwhile; ?>
        <?php else: ?>
                    <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
                <?php endif; ?> 
  
</ul> 

<div class="sep"></div>

<?php } ?>



<?php
        if(get_ID_by_slug(get_option('of_homepage_content'))){
            $maincontent = get_ID_by_slug(get_option('of_homepage_content'));
            $maincontent = "showposts=1&page_id=$maincontent";
            query_posts($maincontent);

            if (have_posts()) : 
            while (have_posts()) : the_post();
            $more = 0;
            ?>
                <?php the_content("<span>Read More</span>",false);

            endwhile;
            endif;
            } else {
                get_template_part( 'homepage-default' );
            } ?>
    </div>
<?php get_footer(); ?>