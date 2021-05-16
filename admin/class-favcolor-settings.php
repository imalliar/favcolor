<?php


namespace FavColor;


class FavColorSettings {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function favcolor_plugin_settings_menu() {
		add_options_page(
			'FavColor Options',
			'Favourite Color',
			'manage_options',
			'favcolor_options',
			array( $this, 'render_settings_page_content')
		);
	}

	public function favcolor_plugin_setup_sections() {
		add_settings_section( 'fav_color_section', 'Favourite Color', array( $this, 'favcolor_section_callback' ), 'favcolor_options' );
		add_settings_field( 'our_first_field', 'Field Name', array( $this, 'field_callback' ), 'favcolor_options', 'fav_color_section' );
	}

	public function favcolor_section_callback( $arguments ) {
		if($arguments['id']=='fav_color_section') {
		    echo 'Test';
        }
	}

	public function field_callback( $arguments ) {
		echo '<input name="our_first_field" id="our_first_field" type="text" value="' . get_option( 'our_first_field' ) . '" />';
		register_setting( 'favcolor_options', 'our_first_field' );
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
			<h2><?php _e( 'Favourite Color Options', 'favcolor' ); ?></h2>

            <form action="options.php" method="post">
				<?php
				settings_fields( 'favcolor_options' );
				do_settings_sections( 'favcolor_options' );
                submit_button();
				?>
            </form>
		</div>
	<?php
	}

}