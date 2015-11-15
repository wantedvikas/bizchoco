<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml"> 
<head profile="http://gmpg.org/xfn/11"> 
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tipTip.minified.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slides.min.jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mosaic.1.0.1.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/prettyphoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo get_template_directory_uri(); ?>/js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
$(".someClass").tipTip({maxWidth: "auto", edgeOffset: 10, defaultPosition: "top", delay: 200});
});
</script>

 <script type="text/javascript">
    $(window).load(function() {
        $('#nivoSlider').nivoSlider();
    });
    </script>

<script type="text/javascript">
        $(function(){
            $('#slides').slides({
                preload: true,
                preloadImage: '<?php echo get_template_directory_uri(); ?>/images/loading.gif',
                play: false,
                generatePagination: false,
                pause: 2500,
                hoverPause: true
            });
        });
    </script>

<script type="text/javascript">
        $(function(){
            $('#content_slider').slides({
                preload: true,
                preloadImage: '<?php echo get_template_directory_uri(); ?>/images/loading.gif',
                play: false,
                container: 'content_slider',
                pause: 2500,
                hoverPause: true
            });
        });
    </script>

<script type="text/javascript">
jQuery('#nav ul.sub-menu').superfish({
        delay: 200,
        animation: {opacity:'show', height:'show'},
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });
</script>
<script type='text/javascript'>
$(document).ready(function(){
$("img.hover").hover(
function() {
$(this).stop().animate({"opacity": "0.4"}, "fast");
},
function() {
$(this).stop().animate({"opacity": "1"}, "fast");
});
});
</script>

<script type="text/javascript">
function mainmenu(){
$(" #nav ul.sub-menu ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
        $(this).find('ul:first').css({visibility: "visible",display: "none"}).slideToggle(200);
        },function(){
        $(this).find('ul:first').css({visibility: "hidden"});
        });
}
 $(document).ready(function(){                  
    mainmenu();
});
$(document).ready(function () {
    
    $('#toggle-view li').click(function () {

        var text = $(this).children('p');

        if (text.is(':hidden')) {
            text.slideDown('200');
            $(this).children('span').html('+');     
        } else {
            text.slideUp('200');
            $(this).children('span').html('-');     
        }
        
    });

});

</script>
<script type="text/javascript">
this.label2value = function(){  

    // CSS class names
    // put any class name you want
    // define this in external css (example provided)
    var inactive = "inactive";
    var active = "active";
    var focused = "focused";
    
    // function
    $("label").each(function(){     
        obj = document.getElementById($(this).attr("for"));
        if(($(obj).attr("type") == "text") || (obj.tagName.toLowerCase() == "textarea")){           
            $(obj).addClass(inactive);          
            var text = $(this).text();
            $(this).css("display","none");          
            $(obj).val(text);
            $(obj).focus(function(){    
                $(this).addClass(focused);
                $(this).removeClass(inactive);
                $(this).removeClass(active);                                  
                if($(this).val() == text) $(this).val("");
            }); 
            $(obj).blur(function(){ 
                $(this).removeClass(focused);                                                    
                if($(this).val() == "") {
                    $(this).val(text);
                    $(this).addClass(inactive);
                } else {
                    $(this).addClass(active);       
                };              
            });             
        };  
    });     
};
// on load
$(document).ready(function(){   
    label2value();  
});
</script>
<?php get_template_part( 'customstyle' ); ?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<link rel="icon" type="image/png" href="<?php echo get_option('of_custom_favicon'); ?>">
<?php echo get_option('of_scr_header'); ?>

</head>
<body>
    <div id="toplayer"></div>

    <div id="header">
        <div id="inheader">
            <div id="logo">
                <a href="<?php echo site_url(); ?>"><img style="margin-top:20px;" src="<?php echo get_option('of_logo'); ?>" alt="" /></a>
            </div>
            <div id="nav">
                <?php wp_nav_menu(); ?>
            </div>
        </div>
    </div>