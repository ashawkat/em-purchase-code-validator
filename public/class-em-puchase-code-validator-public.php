<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codeheavenbd.com
 * @since      1.0.0
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/public
 * @author     CodeHeaven <codeheavenbd@gmail.com>
 */
class Em_Puchase_Code_Validator_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_plugin_shortcode();

	}

	public function load_plugin_shortcode() {
		require_once dirname(__FILE__) . '/partials/em-puchase-code-validator-public-display.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/em-puchase-code-validator-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script("jquery");
		
		wp_enqueue_script( 'em-vue-lib', plugin_dir_url( __FILE__ ) . 'assets/js/vue.min.js', '', $this->version, false );
		wp_enqueue_script( 'em-vue-moment', plugin_dir_url( __FILE__ ) . 'assets/js/moment.js', '', $this->version, false );
		wp_enqueue_script( 'em-vue-moment-tz', plugin_dir_url( __FILE__ ) . 'assets/js/moment-timezone.min.js', '', $this->version, false );
		wp_enqueue_script( 'em-axios-lib', plugin_dir_url( __FILE__ ) . 'assets/js/axios.min.js', '', $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/em-puchase-code-validator-public.js', '', $this->version, true );

		wp_localize_script( $this->plugin_name, 'js_response', [
            'authToken'     => get_option('em_settings')['em_text_field_0'],
            'responseOne'   => __( 'Your purchase code is valid & result is listed above!', 'em-puchase-code-validator' ),
            'responseTwo'   => __( 'Your purchase code is not valid or having problem with connecting with the market api. Please check again!', 'em-puchase-code-validator' ),
            'responseThree' => __( 'Invalid Code!', 'em-puchase-code-validator' ),
            'responseFour'  => __( 'Please go to the settings page & set your token to see validator working!', 'em-puchase-code-validator' ),
        ] );
	}

}
