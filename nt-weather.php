<?php
/**
 * Plugin Name: Truong Weather
 * Plugin URI: https://www.facebook.com/gun.latao
 * Author: NgocTruong
 * Version: 1.0.0
 * Description: Plugin đầu tiên
 * Author URI: https://www.facebook.com/gun.latao
 * Plugin URL: https://www.facebook.com/gun.latao
 * Text Domain: nt-weather
 * */

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define('NT_WEATHER_VERSION', '1.0.0');
define('NT_WEATHER_MINIMUM_WP_VERSION', '4.1.1');
define('NT_WEATHER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('NT_WEATHER_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once (NT_WEATHER_PLUGIN_DIR . 'includes/class.nt-weather-setting.php');
require_once (NT_WEATHER_PLUGIN_DIR . 'includes/class.nt-weather-api.php');
require_once (NT_WEATHER_PLUGIN_DIR . 'includes/class.nt-weather-widget.php');
require_once (NT_WEATHER_PLUGIN_DIR . 'includes/class.nt-weather.php');

$nt_weather = new NT_Weather();

//  echo '<pre>' . print_r(NT_Weather_API::get_weather(['ha+noi','ho+chi+minh','london']), true) .'</pre>';
//  die();

// add_shortcode('shortcode1', 'create_shortcode1');

// function create_shortcode1(){
//     return "Hello shortcode! ";
// }

// add_shortcode('youtube_video', 'create_youtube_video');
// function create_youtube_video($ts){
//     extract(shortcode_atts(array(
//         'width' => '100%',
//         'height' => '350',
//         'id' => 'cwj6PBfLdJQ'
//     ), $ts));
//     return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
// }

// add_shortcode('map', 'create_map');
// function create_map($ts){
//     extract(shortcode_atts(array(
//         'width' => '100%',
//         'height' => '350',
//         'id' => 'cwj6PBfLdJQ'
//     ), $ts));
//     return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.313792816661!2d105.78181071424515!3d21.02012679345042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab51ac9f8a81%3A0x22b86ba5d38a91d0!2sC%C3%B4ng%20Ty%20Mitec!5e0!3m2!1svi!2s!4v1616396913372!5m2!1svi!2s" 
//         width="'.$width.'" height="'.$height.'" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
// }