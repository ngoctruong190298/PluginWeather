<?php
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NT_Weather{
    public function __construct(){
        $nt_weather_widget = new NT_Weather_Widget();
        $nt_weather_setting = new NT_Weather_Setting();
    }

    public function activation_hook(){

    }

    public function deactivation_hook(){

    }
}