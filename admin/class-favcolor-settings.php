<?php


namespace FavColor;


class FavColorSettings {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function setup_plugin_options_menu() {
		add_plugins_page(
			'FavColor Options',
			'FavColor Options',
			'manage_options',
			'favcolor_options',
			array( $this, 'render_settings_page_content')
		);
	}

	public function default_display_options() {
		$defaults = array(
			'address_bar_color'	=>	''
		);
		return $defaults;
	}

	public function render_settings_page_content() {
	?>
		<div class="wrap">
			<h2><?php _e( 'FavColor Options', 'favcolor' ); ?></h2>

		</div>
	<?php
	}

}