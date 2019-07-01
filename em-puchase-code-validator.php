<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codeheavenbd.com
 * @since             1.0.0
 * @package           Em_Puchase_Code_Validator
 *
 * @wordpress-plugin
 * Plugin Name:       EM Purchase Code Validator
 * Plugin URI:        https://wordpress.org
 * Description:       This is a simple plugin to validate your customer purchase code from Envato Market.
 * Version:           1.0.3
 * Author:            CodeHeaven
 * Author URI:        https://codeheavenbd.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       em-puchase-code-validator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EM_PURCHASE_CODE_VALIDATOR', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-em-puchase-code-validator-activator.php
 */
function activate_em_puchase_code_validator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-em-puchase-code-validator-activator.php';
	Em_Puchase_Code_Validator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-em-puchase-code-validator-deactivator.php
 */
function deactivate_em_puchase_code_validator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-em-puchase-code-validator-deactivator.php';
	Em_Puchase_Code_Validator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_em_puchase_code_validator' );
register_deactivation_hook( __FILE__, 'deactivate_em_puchase_code_validator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-em-puchase-code-validator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_em_puchase_code_validator() {

	$plugin = new Em_Puchase_Code_Validator();
	$plugin->run();

}
run_em_puchase_code_validator();
