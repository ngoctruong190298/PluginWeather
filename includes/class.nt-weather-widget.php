<?php
/**
 * Adds Foo_Widget widget.
 */

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
} 

class NT_Weather_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('nt-weather-widget', __('NT Weather Widget', 'nt-weather'), array( 'description' => esc_html__( 'Simple Weather Widget', 'nt-weather' ) ) );
        add_action('widgets_init', function() {
            register_widget('NT_Weather_Widget');

        });

        add_action('wp_enqueue_scripts', function(){
            wp_register_style('nt-css', NT_WEATHER_PLUGIN_URL . 'scripts/css/style.css');
            wp_enqueue_style('nt-css');

            wp_register_script('nt-js', NT_WEATHER_PLUGIN_URL . 'scripts/js/functions.js', ['jquery']);
			wp_localize_script('nt-js', 'nt', [
				'url' => admin_url('admin-ajax.php')
			]);
			wp_enqueue_script('nt-js');
        });
    }

    public function form( $instance ) {
        $title = (isset($instance['title'])  && !empty($instance['title'])) ? apply_filters('widget_title', $instance['title']) : __('NT Weather Widget', 'nt_weather');
		$unit = (isset($instance['unit']) && !empty($instance['unit'])) ? $instance['unit'] : 'celsius';
		require (NT_WEATHER_PLUGIN_DIR. 'views/nt-weather-widget-form.php ');
	}

    public function update($new_instance, $old_instance){
        $instance = [];
		$instance['title'] = (isset($new_instance['title'])  && !empty($new_instance['title'])) ? apply_filters('widget_title', $new_instance['title']) : __('NT Weather Widget', 'nt_weather');
		$instance['unit'] = (isset($new_instance['unit']) && !empty($new_instance['unit'])) ? $new_instance['unit'] : 'celsius';
		return $instance;
    }

    public function widget($args, $instance){
        $title = (isset($instance['title'])  && !empty($instance['title'])) ? apply_filters('widget_title', $instance['title']) : __('NT Weather Widget', 'nt_weather');
		if (get_option('nt_weather_setting')) {
			$city_name = get_option('nt_weather_setting')['city_name'];
		} else {
			$city_name[] = 'Ho+Chi+Minh';
		}
		$widget_option = $instance;
		$data = NT_Weather_API::get_weather($city_name);
        require (NT_WEATHER_PLUGIN_DIR. 'views/nt-weather-widget-view.php ');
    }
}