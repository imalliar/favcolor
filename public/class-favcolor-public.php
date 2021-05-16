<?php


namespace FavColor;


class FavColorPublic {

	protected $plugin_name;

	protected $version;

	public function __construct( $plugin_name, $version){
		$this->version = $plugin_name;
		$this->plugin_name = $version;
	}

	public function enqueue_styles() {

	}

	public function enqueue_scripts() {

	}
}