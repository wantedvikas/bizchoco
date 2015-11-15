<?php
/*-----------------------------------------------------------------------------------*/
/* Sidebar And Footer Widgets
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Right Sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h5>',
'after_title' => '</h5>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Home1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3><div class="sep2"></div>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Home2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3><div class="sep2"></div>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Home3',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3><div class="sep2"></div>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Left',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Middle',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Right',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
?>