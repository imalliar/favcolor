<?php


namespace FavColor;


class FavColor {
	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'FC_VERSION' ) ) {
			$this->version = FC_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = FC_NAME;

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-favcolor-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-favcolor-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-favcolor-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-favcolor-settings.php';
		$this->loader = new FavColorLoader();
	}

	private function define_admin_hooks() {
		$plugin_admin = new FavColorAdmin( $this->get_plugin_name(), $this->get_version() );
		$plugin_settings = new FavColorSettings( $this->get_plugin_name(), $this->get_version() );


		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_settings, 'favcolor_plugin_settings_menu' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'favcolor_plugin_setup_sections' );
	}

	private function define_public_hooks() {
		$plugin_public = new FavColorPublic( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

	public function run() {
		$this->loader->run();
	}


}