<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "of";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five");
$options_radio = array("enable" => "Enable","disable" => "Disable");
$options_logo = array("logo" => "Image Logo","text" => "Text Logo");
$options_layout = array("normal","full");
$options_sep = array("white","black");

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40");
$post_number = array("Select a number:","1","2","3","4","5","6","7","8","9","10");
$slider_type = array("Select a Homepage Slider:","nivoslider","slidejs");
$pattern = array("Select Pattern:","dot","dot_2","noise","carbon","grid","horizontal_strip","left_strip","left_strip_2","left_strip_3","right_strip","right_strip_2","right_strip_3","vertical_strip","reticulated");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
$color_scheme = array("blue","black","orange","cadetblue","yellow","red","charcoal","green");
// Set the Options Array
$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo Image",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "fggfgfg",
					"type" => "upload");
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Custom Script or Codes In Header",
					"desc" => "Paste your jQuery Init or any script or style you want to add in header section of Bizchoco.",
					"id" => $shortname."_scr_header",
					"std" => "",
					"type" => "textarea");                                                    
    
$options[] = array( "name" => "Styling Options",
					"type" => "heading");

$options[] = array( "name" => "Navigation Links Color",
					"desc" => "",
					"id" => $shortname."_cnav",
					"std" => "#6a6969",
					"type" => "color");

$options[] = array( "name" => "Navigation Links Hover Color",
					"desc" => "",
					"id" => $shortname."_cnavhover",
					"std" => "#e97059",
					"type" => "color");

$options[] = array( "name" => "Choose color For links",
					"desc" => "",
					"id" => $shortname."_clink",
					"std" => "#e97059",
					"type" => "color");

$options[] = array( "name" => "Choose Color for link Hover",
					"desc" => "",
					"id" => $shortname."_clinkhover",
					"std" => "#e97059",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 1",
					"desc" => "",
					"id" => $shortname."_ch1",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 2",
					"desc" => "",
					"id" => $shortname."_ch2",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 3",
					"desc" => "",
					"id" => $shortname."_ch3",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 4",
					"desc" => "",
					"id" => $shortname."_ch4",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 5",
					"desc" => "",
					"id" => $shortname."_ch5",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color Heading 6",
					"desc" => "",
					"id" => $shortname."_ch6",
					"std" => "#474747",
					"type" => "color");

$options[] = array( "name" => "Choose Color for Paragraph Text",
					"desc" => "",
					"id" => $shortname."_cpar",
					"std" => "#666666",
					"type" => "color");

$options[] = array( "name" => "Sidebar Link Color",
					"desc" => "",
					"id" => $shortname."_sidebarl",
					"std" => "#666666",
					"type" => "color");

$options[] = array( "name" => "Sidebar Link Hover Color",
					"desc" => "",
					"id" => $shortname."_sidebarlh",
					"std" => "#e97059",
					"type" => "color");

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");

$options[] = array( "name" => "Typography Options",
                    "type" => "heading");

$options[] = array( "name" => "Font Size for Paragraph Text",
					"desc" => "",
					"id" => $shortname."_fpar",
					"std" => "12",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 1",
					"desc" => "",
					"id" => $shortname."_fh1",
					"std" => "17",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 2",
					"desc" => "",
					"id" => $shortname."_fh2",
					"std" => "15",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 3",
					"desc" => "",
					"id" => $shortname."_fh3",
					"std" => "13",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 4",
					"desc" => "",
					"id" => $shortname."_fh4",
					"std" => "12",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 5",
					"desc" => "",
					"id" => $shortname."_fh5",
					"std" => "11",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading 6",
					"desc" => "",
					"id" => $shortname."_fh6",
					"std" => "10",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Home Page Options",
                    "type" => "heading");

$options[] = array( "name" => "Select the Slider Type which you want to display on Home Page",
					"desc" => "",
					"id" => $shortname."_slider_type",
					"std" => "nivoslider",
					"type" => "select",
					"options" => $slider_type);

$options[] = array( "name" => "Select a Page to Populate HomePage Content Area",
					"desc" => "A list of all the pages being used on the main content area of Homepage.",
					"id" => $shortname."_homepage_content",
					"std" => "Select a page:",
					"type" => "select",
					"options" => $of_pages);
					
$options[] = array( "name" => "Enable Disable Portfolio",
					"desc" => "",
					"id" => $shortname."_enable_disable_pp",
					"std" => "enable",
					"type" => "radio",
					"options" => $options_radio);
					
$options[] = array( "name" => "Enable Disable Blog",
					"desc" => "",
					"id" => $shortname."_enable_disable_bb",
					"std" => "enable",
					"type" => "radio",
					"options" => $options_radio);

$options[] = array( "name" => "Footer Options",
					"type" => "heading");      

$options[] = array( "name" => "Copyright Text",
					"desc" => "Dispaly a copyright text in footer",
					"id" => $shortname."_footer_text",
					"std" => "All rights reserved for AcrisDesign.",
					"type" => "text");

$options[] = array( "name" => "Custom Scripts Or Google Analytics Code",
                    "desc" => "Add Custom Scripts in Footer",
                    "id" => $shortname."_custom_scr",
                    "std" => "",
                    "type" => "textarea");

$options[] = array( "name" => "Twitter Username",
					"desc" => "Add Twitter username which can be used in widget and displaying your latest tweets.",
					"id" => $shortname."_twitter_user",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Facebook Profile URL",
					"desc" => "Add your facebook profile url here.",
					"id" => $shortname."_facebook_user",
					"std" => "http://",
					"type" => "text");

$options[] = array( "name" => "Dribble Profile URL",
					"desc" => "Add your feedburner url here.",
					"id" => $shortname."_feed_user",
					"std" => "http://",
					"type" => "text");
					
$options[] = array( "name" => "Footer Heading Color",
					"desc" => "",
					"id" => $shortname."_footerh",
					"std" => "#ffffff",
					"type" => "color");

$options[] = array( "name" => "Footer Text Color",
					"desc" => "",
					"id" => $shortname."_footert",
					"std" => "#ffffff",
					"type" => "color");

$options[] = array( "name" => "Footer Link Color",
					"desc" => "",
					"id" => $shortname."_footerl",
					"std" => "#ffffff",
					"type" => "color");

$options[] = array( "name" => "Footer Link Hover Color",
					"desc" => "",
					"id" => $shortname."_footerlh",
					"std" => "#ffffff",
					"type" => "color");

$options[] = array( "name" => "Font Size for Paragraph Text",
					"desc" => "",
					"id" => $shortname."_foopar",
					"std" => "12",
					"type" => "select",
					"options" => $other_entries);

$options[] = array( "name" => "Font Size for Heading Text",
					"desc" => "",
					"id" => $shortname."_fooh",
					"std" => "20",
					"type" => "select",
					"options" => $other_entries);
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
