<?php remove_filter('the_excerpt', 'wpautop'); ?>
<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
/*-----------------------------------------------------------------------------------*/
/* Options Framework Functions
/*-----------------------------------------------------------------------------------*/

/* Set the file path based on whether the Options Framework is in a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
  define('OF_FILEPATH', TEMPLATEPATH);
  define('OF_DIRECTORY', get_template_directory_uri());
} else {
  define('OF_FILEPATH', STYLESHEETPATH);
  define('OF_DIRECTORY', get_template_directory_uri());
}

/* These files build out the options interface.  Likely won't need to edit these. */

include (OF_FILEPATH . '/admin/admin-functions.php');    // Custom functions and plugins
include (OF_FILEPATH . '/admin/admin-interface.php');    // Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */

include (OF_FILEPATH . '/admin/theme-options.php');    // Options panel settings and custom settings
include (OF_FILEPATH . '/admin/theme-functions.php');  // Theme actions based on options settings
include (OF_FILEPATH . '/includes/shortcodes.php');    // All shortocodes
include (OF_FILEPATH . '/includes/widget.php');            // All widget codes
include (OF_FILEPATH . '/includes/custom.php');       //Custom functions

function disable_contact7_scripts() {
  wp_deregister_script( 'contact-form-7' );
}
add_action( 'wp_print_scripts', 'disable_contact7_scripts' );
function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');

/**
 * Disable styles
 * @since 0.1
 */
function disable_contact7_styles() {
  wp_deregister_style( 'contact-form-7' );
  wp_deregister_style( 'contact-form-7-rtl' );
}
add_action( 'wp_print_styles', 'disable_contact7_styles' );
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
if ( ! isset( $content_width ) )
  $content_width = 640;

?>
<?php
    class My_Contact_Form extends WP_Widget {
    function My_Contact_Form() {
    $widget_ops = array('classname' => 'contact_form', 'description' => 'Display Contact form in your widgetized area.' );
    $this->WP_Widget('contact_form', 'Bizchoco - Contact Form', $widget_ops);
    }
    function widget($args, $instance) {
    extract($args, EXTR_SKIP);
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $email = empty($instance['email']) ? ' ' : apply_filters('widget_entry_title', $instance['email']);
    if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
  echo '<form class="form" action=" ' . get_bloginfo('stylesheet_directory') . '/sendmail.php" method="post"><p class="name"><input type="text" name="name" id="name" /><label for="name">Name</label></p><p class="email"><input type="text" name="email" id="email" /><label for="email">E-mail</label></p><p class="text"><textarea name="text"></textarea></p><p class="submit"><input type="submit" value="Send" /></p></form><input type="hidden" id="receiver" name="receiver" value=" '. $email . ' "/>';
  echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['email'] = strip_tags($new_instance['email']);
    return $instance;
    }
    function form($instance) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'email' => '' ) );
    $title = strip_tags($instance['title']);
    $email = strip_tags($instance['email']);
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p><label for="<?php echo $this->get_field_id('email'); ?>">Email Id: <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></label></p>
    <?php
    }
    }
    register_widget('My_Contact_Form');
?>
<?php
    class Latest_Blog_Post extends WP_Widget {
    function Latest_Blog_Post() {
    $widget_ops = array('classname' => 'blog_post', 'description' => 'Display Latest Blog Posts.' );
    $this->WP_Widget('blog_post', 'Bizchoco - Latest Blog Post', $widget_ops);
    }
    function widget($args, $instance) {
    extract($args, EXTR_SKIP);
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $blogpostnumber = empty($instance['blogpostnumber']) ? ' ' : apply_filters('widget_entry_title', $instance['blogpostnumber']);
    if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
    global $post;
    $myposts = get_posts('numberposts='.$blogpostnumber.'&offset=0');
  foreach($myposts as $post){
      setup_postdata($post);
      ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img class="border hover" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo $image[0]; ?>&h=30&w=300&q=100" />
      <b><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></b><br />
      <em>2 Comments | Posted on <?php the_time('F jS, Y') ?></em><div class="sep2"></div>
      <?php
      }
  echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['blogpostnumber'] = strip_tags($new_instance['blogpostnumber']);
    return $instance;
    }
    function form($instance) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'blogpostnumber' => '' ) );
    $title = strip_tags($instance['title']);
    $blogpostnumber = strip_tags($instance['blogpostnumber']);
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p><label for="<?php echo $this->get_field_id('blogpostnumber'); ?>">No. Of Posts: <input class="widefat" id="<?php echo $this->get_field_id('blogpostnumber'); ?>" name="<?php echo $this->get_field_name('blogpostnumber'); ?>" type="text" value="<?php echo esc_attr($blogpostnumber); ?>" /></label></p>
    <?php
    }
    }
    register_widget('Latest_Blog_Post');
?>
<?php
    class My_Twitter extends WP_Widget {
    function My_Twitter() {
    $widget_ops = array('classname' => 'twitter', 'description' => 'Display Latest Twitter Update' );
    $this->WP_Widget('twitter', 'Bizchoco - Twitter', $widget_ops);
    }
    function widget($args, $instance) {
    extract($args, EXTR_SKIP);
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $username = empty($instance['username']) ? ' ' : apply_filters('widget_username', $instance['username']);
  $twitternumber = empty($instance['twitternumber']) ? ' ' : apply_filters('widget_twitternumber', $instance['twitternumber']);
    if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
  echo '<div id="twitter_div"><ul id="twitter_update_list"><li>&nbsp;</li></ul></div>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'. $username . ' .json?callback=twitterCallback2&count='. $twitternumber . ' "></script>';
  echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['username'] = strip_tags($new_instance['username']);
  $instance['twitternumber'] = strip_tags($new_instance['twitternumber']);
    return $instance;
    }
    function form($instance) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'username' => '', 'twitternumber' => '' ) );
    $title = strip_tags($instance['title']);
    $username = strip_tags($instance['username']);
  $twitternumber = strip_tags($instance['twitternumber']);
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p><label for="<?php echo $this->get_field_id('username'); ?>">Username: <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo esc_attr($username); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('twitternumber'); ?>">No. Of Tweets (eg. 2 or 3): <input class="widefat" id="<?php echo $this->get_field_id('twitternumber'); ?>" name="<?php echo $this->get_field_name('twitternumber'); ?>" type="text" value="<?php echo esc_attr($twitternumber); ?>" /></label></p>

    <?php
    }
    }
    register_widget('My_Twitter');


    register_post_type('service', array(  'label' => 'Service','description' => 'List of Service','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','thumbnail','page-attributes',),'labels' => array (
  'name' => 'Service',
  'singular_name' => 'Service',
  'menu_name' => 'Service',
  'add_new' => 'Add Service',
  'add_new_item' => 'Add New Service',
  'edit' => 'Edit',
  'edit_item' => 'Edit Service',
  'new_item' => 'New Service',
  'view' => 'View Service',
  'view_item' => 'View Service',
  'search_items' => 'Search Service',
  'not_found' => 'No Service Found',
  'not_found_in_trash' => 'No Service Found in Trash',
  'parent' => 'Parent Service',
),) );


register_post_type('slider', array( 'label' => 'Slider','description' => 'Slider for Home Page','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','thumbnail',),'labels' => array (
  'name' => 'Slider',
  'singular_name' => 'Slider',
  'menu_name' => 'Slider',
  'add_new' => 'Add Slider',
  'add_new_item' => 'Add New Slider',
  'edit' => 'Edit',
  'edit_item' => 'Edit Slider',
  'new_item' => 'New Slider',
  'view' => 'View Slider',
  'view_item' => 'View Slider',
  'search_items' => 'Search Slider',
  'not_found' => 'No Slider Found',
  'not_found_in_trash' => 'No Slider Found in Trash',
  'parent' => 'Parent Slider',
),) );

register_post_type('portfolio', array(  'label' => 'Portfolio','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Portfolio',
  'singular_name' => 'Portfolio',
  'menu_name' => 'Portfolio',
  'add_new' => 'Add Portfolio',
  'add_new_item' => 'Add New Portfolio',
  'edit' => 'Edit',
  'edit_item' => 'Edit Portfolio',
  'new_item' => 'New Portfolio',
  'view' => 'View Portfolio',
  'view_item' => 'View Portfolio',
  'search_items' => 'Search Portfolio',
  'not_found' => 'No Portfolio Found',
  'not_found_in_trash' => 'No Portfolio Found in Trash',
  'parent' => 'Parent Portfolio',
),) );

register_post_type('testimonial', array(  'label' => 'Testimonial','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Testimonial',
  'singular_name' => 'Testimonial',
  'menu_name' => 'Testimonial',
  'add_new' => 'Add Testimonial',
  'add_new_item' => 'Add New Testimonial',
  'edit' => 'Edit',
  'edit_item' => 'Edit Testimonial',
  'new_item' => 'New Testimonial',
  'view' => 'View Testimonial',
  'view_item' => 'View Testimonial',
  'search_items' => 'Search Testimonial',
  'not_found' => 'No Testimonial Found',
  'not_found_in_trash' => 'No Testimonial Found in Trash',
  'parent' => 'Parent Testimonial',
),) );

register_post_type('faq', array(  'label' => 'FAQ','description' => 'Frequently Asked Questions','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'FAQ',
  'singular_name' => 'FAQ',
  'menu_name' => 'FAQ',
  'add_new' => 'Add FAQ',
  'add_new_item' => 'Add New FAQ',
  'edit' => 'Edit',
  'edit_item' => 'Edit FAQ',
  'new_item' => 'New FAQ',
  'view' => 'View FAQ',
  'view_item' => 'View FAQ',
  'search_items' => 'Search FAQ',
  'not_found' => 'No FAQ Found',
  'not_found_in_trash' => 'No FAQ Found in Trash',
  'parent' => 'Parent FAQ',
),) );

register_post_type('staff', array(  'label' => 'Staff','description' => 'Our Team','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor','thumbnail','page-attributes',),'labels' => array (
  'name' => 'Staff',
  'singular_name' => 'Staff',
  'menu_name' => 'Staff',
  'add_new' => 'Add Staff',
  'add_new_item' => 'Add New Staff',
  'edit' => 'Edit',
  'edit_item' => 'Edit Staff',
  'new_item' => 'New Staff',
  'view' => 'View Staff',
  'view_item' => 'View Staff',
  'search_items' => 'Search Staff',
  'not_found' => 'No Staff Found',
  'not_found_in_trash' => 'No Staff Found in Trash',
  'parent' => 'Parent Staff',
),) );
add_action( 'add_meta_boxes', 'add_testimonial_metaboxes' );
function add_testimonial_metaboxes() {
    add_meta_box('wpt_date', 'Testimonial Date', 'wpt_date', 'testimonial', 'side', 'default');
}
function wpt_date() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="testmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_date', true);
 
    // Echo out the field
    echo '<input type="text" name="_date" value="' . $location  . '" class="widefat" />';
 
}

function wpt_save_testimonial_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $events_meta['_date'] = $_POST['_date'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
 
}
 
add_action('save_post', 'wpt_save_testimonial_meta', 1, 2); // save the custom fields

add_action( 'add_meta_boxes', 'add_staff_metaboxes' );
function add_staff_metaboxes() {
    add_meta_box('wpt_staff', 'Staff Details', 'wpt_staff', 'staff', 'side', 'default');
}

function wpt_staff() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="testmeta_noncename2" id="testmeta_noncename2" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $position = get_post_meta($post->ID, '_position', true);
    $qualification = get_post_meta($post->ID, '_qualification', true);
    $phone = get_post_meta($post->ID, '_phone', true);
    $semail = get_post_meta($post->ID, '_semail', true);
    $twitter = get_post_meta($post->ID, '_twitter', true);
    $fb = get_post_meta($post->ID, '_fb', true);
 
    // Echo out the field
    echo '<lable>Position</lable><input type="text" name="_position" value="' . $position  . '" class="widefat" />';
    echo '<lable>Qualification</lable><input type="text" name="_qualification" value="' . $qualification  . '" class="widefat" />';
    echo '<lable>Phone Number</lable><input type="text" name="_phone" value="' . $phone  . '" class="widefat" />';
    echo '<lable>Email ID</lable><input type="text" name="_semail" value="' . $semail  . '" class="widefat" />';
    echo '<lable>Twitter Username</lable><input type="text" name="_twitter" value="' . $twitter  . '" class="widefat" />';
    echo '<lable>Facebook Profile URL</lable><input type="text" name="_fb" value="' . $fb  . '" class="widefat" />';
 
}

function wpt_save_staff_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['testmeta_noncename2'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $events_meta['_position'] = $_POST['_position'];
    $events_meta['_qualification'] = $_POST['_qualification'];
    $events_meta['_phone'] = $_POST['_phone'];
    $events_meta['_semail'] = $_POST['_semail'];
    $events_meta['_twitter'] = $_POST['_twitter'];
    $events_meta['_fb'] = $_POST['_fb'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
 
}
 
add_action('save_post', 'wpt_save_staff_meta', 1, 2); // save the custom fields
?>