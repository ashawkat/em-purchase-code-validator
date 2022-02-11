<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codeheavenbd.com
 * @since      1.0.0
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/admin
 * @author     CodeHeaven <codeheavenbd@gmail.com>
 */
class Em_Puchase_Code_Validator_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->em_init_actions();
	}

	/**
	 * Init all the actions of admin pages
	 */
	public function em_init_actions() {
		
		add_action( 'admin_menu', array( $this, 'em_admin_sub_menu' ));
		add_action( 'admin_init', array( $this, 'em_settings_init' ) );
		add_filter( 'plugin_action_links', array($this,'em_add_plugin_action_links'), 10, 5 );
	}

	/**
	 * Add plugin action menu
	 */
	public function em_add_plugin_action_links( $actions, $plugin_file ) {

		if ( 'em-purchase-code-validator/em-puchase-code-validator.php' === $plugin_file ) {

			$settings = array(
				sprintf( '<a href="%s">%s</a>',
					admin_url( 'tools.php?page=em_settings_page' ),
					__( 'Settings', 'em-puchase-code-validator' ) ),
			);
			$support_link = [
				'support' => '<a href="https://wordpress.org/support/plugin/em-purchase-code-validator/" target="_blank">' . __( 'Support', 'em-puchase-code-validator' ) . '</a>'
			];
				
			$actions = array_merge( $support_link, $actions );
			$actions = array_merge( $settings, $actions );
		}
			
		return $actions;
	}

	/**
	 * Create a submenu for the plugin under tools
	 */
	public function em_admin_sub_menu() {

		add_submenu_page(
			'tools.php',
			__( 'EM Purchase Code Validator', 'em-puchase-code-validator' ),
			__( 'EM Purchase Code Validator', 'em-puchase-code-validator' ),
			'manage_options',
			'em_settings_page',
			array( $this, 'em_settings_page_callback' )
		);
	}

	public function em_settings_init(  ) { 

		register_setting( 'em_page', 'em_settings' );
	
		add_settings_section(
			'em_page_section', 
			__( 'EMPCV Settings', 'em-puchase-code-validator' ), 
			array( $this, 'em_settings_section_callback' ), 
			'em_page'
		);
	
		add_settings_field( 
			'em_text_field_0',
			__( 'API Token', 'em-puchase-code-validator' ), 
			array( $this, 'em_text_field_0_render' ),
			'em_page', 
			'em_page_section' 
		);	
	}
	
	
	public function em_text_field_0_render(  ) { 
	
		$options = get_option( 'em_settings' );
		if ( isset( $options ) && $options != '' ) $value = $options['em_text_field_0'];
		else $value = '';
		?>
		<input type='text' name='em_settings[em_text_field_0]' value='<?php echo $value; ?>'>
		<?php
	
	}
	
	
	public function em_settings_section_callback(  ) { 
		$return = '<p>Provide your Envato Market Authorization Token from <a href="https://build.envato.com/register/" target="_blank">here</a>.</p>';
		echo wp_kses_post( $return );
	
	}

	public function em_settings_page_callback() {

		require_once dirname( __FILE__ ) . '/partials/em-puchase-code-validator-admin-display.php';
		?>
		
		<?php
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/em-puchase-code-validator-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/em-puchase-code-validator-admin.js', array( 'jquery' ), $this->version, false );

	}

}
