<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codeheavenbd.com
 * @since      1.0.0
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/includes
 * @author     CodeHeaven <codeheavenbd@gmail.com>
 */
class Em_Puchase_Code_Validator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'em-puchase-code-validator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
