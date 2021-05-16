<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Favourite Color
 * Description:       A simple way to change the address bar color on mobile devices and favicon
 * Version:           1.0.0
 * Author:            Jacob Malliaros
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       favcolor
 *
 */

/*
    Copyright 2018  Jacob Malliaros

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

use FavColor\FavColorActivator;
use FavColor\FavColorDeactivator;

if ( ! defined( 'ABSPATH' ) ) die;

define( 'FC_VERSION', '1.0.0' );
define( 'FC_NAME', 'favcolor' );

function activate_favcolor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-favcolor-activator.php';
	FavColorActivator::activate();
}

function deactivate_favcolor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-favcolor-deactivator.php';
	FavColorDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_favcolor' );
register_deactivation_hook( __FILE__, 'deactivate_favcolor' );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-favcolor.php';


function run_favcolor() {
	$plugin = new \FavColor\FavColor();
	$plugin->run();
}
run_favcolor();