<?php
function remove_wpautop($content) { 
    $content = do_shortcode( shortcode_unautop($content) ); 
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    return $content;
}
/*-----------------------------------------------------------------------------------*/
/*Coloumn Shortcodes
/*-----------------------------------------------------------------------------------*/
function shortcode_disable($atts, $content) {
	$output		=	"<pre style=\"white-space: pre-wrap; white-space: -moz-pre-wrap; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word;\" >" . $content . "</pre>";
	return $output;
}

add_shortcode('sd', 'shortcode_disable');

function frusion_one_third( $atts, $content = null ) {
   return '<div class="one_third"><p>' . remove_wpautop($content) . '</p></div>';
}
add_shortcode('one_third', 'frusion_one_third');


function frusion_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last"><p>' . remove_wpautop($content) . '</p></div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'frusion_one_third_last');


function frusion_two_third( $atts, $content = null ) {
   return '<div class="two_third"><p>' . remove_wpautop($content) . '</p></div>';
}
add_shortcode('two_third', 'frusion_two_third');


function frusion_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last"><p>' . remove_wpautop($content) . '</p></div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'frusion_two_third_last');


function frusion_one_half( $atts, $content = null ) {
   return '<div class="one_half"><p>' . remove_wpautop($content) . '</p></div>';
}
add_shortcode('one_half', 'frusion_one_half');


function frusion_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last"><p>' . remove_wpautop($content) . '</p></div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'frusion_one_half_last');


function frusion_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth"><p>' . remove_wpautop($content) . '</p></div>';
}
add_shortcode('one_fourth', 'frusion_one_fourth');


function frusion_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last"><p>' . remove_wpautop($content) . '</p></div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'frusion_one_fourth_last');


function frusion_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('three_fourth', 'frusion_three_fourth');


function frusion_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'frusion_three_fourth_last');


function frusion_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('one_fifth', 'frusion_one_fifth');


function frusion_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'frusion_one_fifth_last');


function frusion_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('two_fifth', 'frusion_two_fifth');


function frusion_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'frusion_two_fifth_last');


function frusion_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('three_fifth', 'frusion_three_fifth');


function frusion_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'frusion_three_fifth_last');


function frusion_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('four_fifth', 'frusion_four_fifth');


function frusion_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'frusion_four_fifth_last');


function frusion_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('one_sixth', 'frusion_one_sixth');


function frusion_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'frusion_one_sixth_last');


function frusion_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . remove_wpautop($content) . '</div>';
}
add_shortcode('five_sixth', 'frusion_five_sixth');


function frusion_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . remove_wpautop($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'frusion_five_sixth_last');

/*-----------------------------------------------------------------------------------*/
/* Divider / Seperator
/*-----------------------------------------------------------------------------------*/
function frusion_sep() {
   return '<div class="sep"></div>';
}
add_shortcode('sep', 'frusion_sep');
/*-----------------------------------------------------------------------------------*/
/* Buttons
/*-----------------------------------------------------------------------------------*/
function frusion_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => false,
		'class' => false,
		'size' => 'small',
		'link' => '',
		'color' => 'gray',
		'full' => "false",
	), $atts));
	$id = $id?' id="'.$id.'"':'';
	$full = ($full==="false")?'':' full';
	$color = $color?' '.$color:'';
	$link = $link?' href="'.$link.'"':'';
	return '<a'.$id.$link.' class="sbutton '.$size.$color.$full.'"><span>' . trim($content) . '</span></a>';
}
add_shortcode('button','frusion_button');
/*-----------------------------------------------------------------------------------*/
/* Message Box
/*-----------------------------------------------------------------------------------*/
function frusion_download_box( $atts, $content = null ) {
   return '<div class="download_box">' . remove_wpautop($content) . '</div>';
}
add_shortcode('download_box', 'frusion_download_box');

function frusion_warning_box( $atts, $content = null ) {
   return '<div class="warning_box">' . remove_wpautop($content) . '</div>';
}
add_shortcode('warning_box', 'frusion_warning_box');

function frusion_info_box( $atts, $content = null ) {
   return '<div class="info_box">' . remove_wpautop($content) . '</div>';
}
add_shortcode('info_box', 'frusion_info_box');
function frusion_note_box( $atts, $content = null ) {
   return '<div class="note_box">' . remove_wpautop($content) . '</div>';
}
add_shortcode('note_box', 'frusion_note_box');
/*-----------------------------------------------------------------------------------*/
/* Toggle
/*-----------------------------------------------------------------------------------*/
function frusion_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h4 class="toggle_title">' . $title . '</h4><div class="toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
}
add_shortcode('toggle', 'frusion_toggle');
/*-----------------------------------------------------------------------------------*/
/* List Styles
/*-----------------------------------------------------------------------------------*/
function frusion_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'arrow',
		'color' => 'black'
	), $atts));
	$color = $color?' '.$color:'';
	return '<div class="'.$type.$color.'">' . remove_wpautop($content) . '</div>';
}
add_shortcode('list', 'frusion_list');

/*-----------------------------------------------------------------------------------*/
/* Tabs
/*-----------------------------------------------------------------------------------*/
function frusion_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div>';
		
		return '<div class="'.$code.'_container">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'frusion_tabs');
add_shortcode('mini_tabs', 'frusion_tabs');
/*-----------------------------------------------------------------------------------*/
/* Nivo Slider
/*-----------------------------------------------------------------------------------*/
function frusion_slider($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '960',
		'height' => '450'
	), $atts));
	return '<div style="width:'.$width.'px;height:'.$height.'px;" id="slider2" class="nivoSlider">' . remove_wpautop($content) . '</div>';
}
add_shortcode('slider', 'frusion_slider');
/*-----------------------------------------------------------------------------------*/
/* 3d Pie chart
/*-----------------------------------------------------------------------------------*/
function frusion_3dpiechart($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '400',
		'height' => '200',
		'value' => '60,40',
		'name' => 'Hello|World'
	), $atts));
	return '<img style="margin-bottom:60px;" src="https://chart.googleapis.com/chart?chs='.$width.'x'.$height.'&amp;chd=t:'.$value.'&amp;cht=p3&amp;chl='.$name.'" />';
}
add_shortcode('3dpiechart', 'frusion_3dpiechart');
/*-----------------------------------------------------------------------------------*/
/* 2D pie chart
/*-----------------------------------------------------------------------------------*/
function frusion_2dpiechart($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '400',
		'height' => '200',
		'value' => '60,40',
		'name' => 'Hello|World'
	), $atts));
	return '<img style="margin-bottom:60px;" src="https://chart.googleapis.com/chart?chs='.$width.'x'.$height.'&amp;chd=t:'.$value.'&amp;cht=p&amp;chl='.$name.'" />';
}
add_shortcode('2dpiechart', 'frusion_2dpiechart');
/*-----------------------------------------------------------------------------------*/
/* X Line Chart
/*-----------------------------------------------------------------------------------*/
function frusion_xlinechart($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '400',
		'height' => '200',
		'value' => '60,40,30',
		'name' => '2008|2009|2010',
		'title' => 'Line Chart',
		'color' => '058DC7'
	), $atts));
	return '<img style="margin-bottom:60px;" src="http://chart.apis.google.com/chart?cht=lc&chtt='.$title.'&chl='.$name.'&chco='.$color.'&chs='.$width.'x'.$height.'&chd=t:'.$value.'&chf=bg,s,bg,s,ffffff" />';
}
add_shortcode('xlinechart', 'frusion_xlinechart');
/*-----------------------------------------------------------------------------------*/
/* XY Line Chart
/*-----------------------------------------------------------------------------------*/
function frusion_xylinechart($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '400',
		'height' => '200',
		'value' => '0,25,50,75,100|2,33,43,17,25|0,25,50,75,100|0,20,25,40,75',
		'name' => '2005|2006|2007|2008|2009|2010|2011',
		'title' => 'Line Chart',
		'color' => '058DC7,666666'
	), $atts));
	return '<img style="margin-bottom:60px;" src="http://chart.apis.google.com/chart?cht=lxy&chtt='.$title.'&chl='.$name.'&chco='.$color.'&chs='.$width.'x'.$height.'&chd=t:'.$value.'&chf=bg,s,bg,s,ffffff" />';
}
add_shortcode('xylinechart', 'frusion_xylinechart');

function frusion_highlight($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => false,
	), $atts));

	return '<span class="highlight'.(($type)?' '.$type:'').'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'frusion_highlight');

function frusion_dropcaps($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));

	if($color){
		$color = ' '.$color;
	}
	return '<span class="' . $code.$color . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap1', 'frusion_dropcaps');
add_shortcode('dropcap2', 'frusion_dropcaps');
/*-----------------------------------------------------------------------------------*/
/* Venn Chart
/*-----------------------------------------------------------------------------------*/
function frusion_vennchart($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '400',
		'height' => '200',
		'value' => '100,80,60,30,30,30,10',
		'name' => 'A|B|C',
		'title' => 'Line Chart',
		'color' => 'FF6342,ADDE63,63C6DE'
	), $atts));
	return '<img style="margin-bottom:60px;" src="http://chart.apis.google.com/chart?cht=v&chtt='.$title.'&chco='.$color.'&chs='.$width.'x'.$height.'&chd=t:'.$value.'&chf=bg,s,bg,s,F7F9FA&chdl='.$name.'" />';
}
add_shortcode('vennchart', 'frusion_vennchart');

function frusion_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'fontsize' => '14',						 
		'align' => false,
		'cite' => false,
	), $atts));
	
	return '<blockquote style="font-size:'. $fontsize .'px;"' . ($align ? ' class="align' . $align . '"' : '') . '>' . do_shortcode($content) . ($cite ? '<p><cite>- ' . $cite . '</cite></p>' : '') . '</blockquote>';
}
add_shortcode('blockquote', 'frusion_blockquote');

function frusion_lightbox($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'link' => ''
	), $atts));
	return '<div class="slight"><a href="'. $link .'" rel="prettyPhoto">' . remove_wpautop($content) . '</a></div>';
}
add_shortcode('lightbox', 'frusion_lightbox');

function frusion_contact($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'email' => ''
	), $atts));
	return '<form id="contactForm" action="' . get_bloginfo('stylesheet_directory') . '/sendmail.php" method="post">
            
            <fieldset>
                <p>
                    <label for="contact_name">Input your name here</label>
                    <input type="text" name="contact_name" id="contact_name" value="" size="60"  />
                </p><br />
                <p>
                    <label for="contact_email">And email address please</label>
                    <input type="text" name="contact_email" id="contact_email" value="" size="60"  />
                </p>    <br />
                <p>
                    <label for="contact_message">Send us a couple of words</label>
                    <textarea id="contact_message" name="contact_message"></textarea>
                </p>    <br />                                                              
                <p class="submit">
                    <button type="submit" class="sb" title="Send your message"><p>Submit Here</p></button>
                    <input type="hidden" id="receiver" name="receiver" value="'. $email . '"/>
                </p>
            </fieldset>
            
        </form>';
}
add_shortcode('contact', 'frusion_contact');
function frusion_space() {
   return '<div class="space"></div>';
}
add_shortcode('space', 'frusion_space');

function frusion_sep2() {
   return '<div class="sep2"></div>';
}
add_shortcode('sep2', 'frusion_sep2');

function frusion_slide($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '600',
		'height' => '400'
	), $atts));
	return '<div id="content_slider"><div style="width:'.$width.'px;height:'.$height.'px;" class="content_slider">' . remove_wpautop($content) . '</div></div>';
}
add_shortcode('slide', 'frusion_slide');
?>