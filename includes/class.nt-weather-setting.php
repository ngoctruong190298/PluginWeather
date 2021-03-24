<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class NT_Weather_Setting {
	protected $option;
	protected $option_group = 'nt_weather_group';

	public function __construct() {
		$this->option = get_option('nt_weather_setting');
		//Add Menu
		add_action('admin_menu', function() {
			add_submenu_page(
				'options-general.php',
				'NT Weather Settings',
				'NT Settings',
				'manage_options',
				'nt_weather',
				[$this, 'create_page']
			);
		});

		add_action('admin_init', [$this, 'register_setting']);
		add_action('admin_enqueue_scripts', function() {
			wp_register_script('nt-js', NT_WEATHER_PLUGIN_URL . 'scripts/js/functions.js', ['jquery']);
			wp_localize_script('nt-js', 'nt', [
				'url' => admin_url('admin-ajax.php')
			]);
			wp_enqueue_script('nt-js');
		});

		add_action('wp_ajax_search_city_ajax', [$this, 'search_city_ajax']);
	}

	public function create_page() {
		$option_group = $this->option_group;
		require (NT_WEATHER_PLUGIN_DIR . 'views/nt-weather-setting.php');
	}


	public function register_setting() {
		register_setting(
			$this->option_group,
			'nt_weather_setting',
			[$this, 'save_setting']
		);
	}

	public function save_setting($input) {
		$new_input = [];
		if (isset($input['city_name']) && !empty($input['city_name'])) {
			foreach ($input['city_name'] as $value) {
				$new_input['city_name'][] = preg_replace('/[ ]/u', '+', trim($value));
			}
		} else {
			$new_input['city_name'] = 'Ho+Chi+Minh';
		}
		return $new_input;
	}

	public function search_city_ajax() {
		if (isset($_POST['city']) && !empty($_POST['city'])) {
			$data = NT_Weather_API::request($_POST['city']);
			wp_send_json_success($data);
		}
	}

}