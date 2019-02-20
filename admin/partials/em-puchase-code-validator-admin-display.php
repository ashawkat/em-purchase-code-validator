<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codeheavenbd.com
 * @since      1.0.0
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap about-wrap tr-help">
    <div class="tr-dash-row">
        <div class="header">
	        <div class="info">
                <h1><?php _e( 'Welcome to Envato Market Purchase Code Validator!', 'em-puchase-code-validator' ); ?></h1>
	            <div class="ti-about-header-text about-text"><?php _e( 'Best way to check if the item purchase code is valid or not.', 'em-puchase-code-validator' ); ?></div>
	        </div>
	    </div>
    </div>    

    <hr>

    <div class="tr-dash-row">
		<div class="tr-dash-content">
            <div class="tr-dash-col-2">
                <div class="settings-section">
                    <form action='options.php' method='post'>

                        <?php
                        settings_fields( 'em_page' );
                        do_settings_sections( 'em_page' );
                        submit_button();
                        ?>

                        <?php _e( '<p>To Show the form of purchase code use this shortcode :</p><pre>[em_purchase_code_validator]</pre>', 'em-puchase-code-validator' ); ?>
                    </form>
                </div>
            </div>
            <div class="tr-dash-col-2">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcodeheavenbd%2F&tabs=timeline&width=500&height=350&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=400028300769066" width="500" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>            
		</div>
	</div> 
</div>