<?php $nslide = get_option('of_slider_number'); ?>
<?php
	$slidertype = get_option('of_slider_type');
	if ($slidertype==nivoslider) {
		?>
<div id="slider" class="nivoSlider" style="width:<?php echo get_option('of_swidth'); ?>px;height:<?php echo get_option('of_sheight'); ?>px;">
<?php $ex = get_catId(get_option('of_slider_category')); ?>
<?php
global $post;
$args = array( 'numberposts' => $nslide, 'category' => $ex );
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post);
?>
<a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, 'dbt_frontslider', true) ?>&h=<?php echo get_option('of_sheight'); ?>&w=<?php echo get_option('of_swidth'); ?>&zc=1" title="<?php the_excerpt(); ?>" /></a>      
<?php endforeach; ?>
</div>
<?php
	}
?>

<?php
	$slidertype = get_option('of_slider_type');
	if ($slidertype==slidejs) {
		?>
<div id="slides" style="width:<?php echo get_option('of_swidth'); ?>px;height:<?php echo get_option('of_sheight'); ?>px;">
<div class="slides_container" style="width:<?php echo get_option('of_swidth'); ?>px;height:<?php echo get_option('of_sheight'); ?>px;">
<?php $ex = get_catId(get_option('of_slider_category')); ?>
<?php
global $post;
$args = array( 'numberposts' => $nslide, 'category' => $ex );
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post);
?>
				
					<a href="<?php echo get_permalink() ?>" title="twelve.inch | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, 'dbt_frontslider', true) ?>&h=<?php echo get_option('of_sheight'); ?>&w=<?php echo get_option('of_swidth'); ?>&zc=1" alt="Slide 6" /></a>
<?php endforeach; ?>
				</div>
				
			</div>
<?php
	}
?>