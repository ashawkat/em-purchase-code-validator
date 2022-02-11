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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=400028300769066&autoLogAppEvents=1" nonce="nmFqcYPi"></script>
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
	                    <p>
                            <?php _e( 'To Show the form of purchase code use this shortcode :', 'em-puchase-code-validator' ); ?>
	                    </p>
	                    <pre>[em_purchase_code_validator]</pre>
                    </form>
                </div>
            </div>
            <div class="tr-dash-col-2">
	            <div class="fb-page" data-href="https://www.facebook.com/codeheavenbd" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codeheavenbd" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codeheavenbd">Code Heaven</a></blockquote></div>
            </div>            
		</div>
	</div> 
</div>