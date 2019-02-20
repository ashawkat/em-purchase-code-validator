<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://codeheavenbd.com
 * @since      1.0.0
 *
 * @package    Em_Puchase_Code_Validator
 * @subpackage Em_Puchase_Code_Validator/public/partials
 */

// Create Shortcode em_purchase_code_validator
// Shortcode: [em_purchase_code_validator]
function create_empurchasecodeval_shortcode($atts) {

	$atts = shortcode_atts(
		array(
		),
		$atts,
		'em_purchase_code_validator'
    );
    ob_start();
    ?>
    <div id="em-form" class="em-wrapper">
        <div class="em-form-wrapper">
            <div class="em-verify-result" v-bind:class="{ valid: validClass, 'invalid': invalidClass }" v-if="responseDataEnabler">
                <ul v-for="data in responseData">
                    <li><strong><?php _e( 'Purchase Code', 'em-puchase-code-validator' ); ?>:</strong> {{ purchaseCode }}</li>
                    <li><strong><?php _e( 'Item Name', 'em-puchase-code-validator' ); ?>:</strong> {{ data.item_name }}</li>
                    <li><strong><?php _e( 'Buyer', 'em-puchase-code-validator' ); ?>:</strong> {{ data.buyer }}</li>
                    <li><strong><?php _e( 'Purchased At', 'em-puchase-code-validator' ); ?>:</strong> {{ getHumanDate( data.created_at ) }}</li>
                    <li><strong><?php _e( 'Support Until', 'em-puchase-code-validator' ); ?>:</strong> {{ getHumanDate( data.supported_until ) }}</li>
                    <li><strong><?php _e( 'License Type', 'em-puchase-code-validator' ); ?>:</strong> {{ data.licence }}</li>
                    <li class="em-float-right" v-bind:class="{ valid: validClass, 'invalid': invalidClass }"><strong>{{ getValidity( getHumanDate( data.supported_until ) ) }}</strong></li>
                </ul>                
            </div>
            <form @submit.prevent="emFormHandler">
                <div class="em-form-group">
                    <label for="purchase-code"><?php _e( 'Enter your purchase code:', 'em-puchase-code-validator' ); ?></label>
                    <input type="text" name="purchase_code" id="purchase-code" v-model="purchaseCode">
                </div>
                <div class="em-form-group">
                    <input type="submit" value="<?php _e( 'Validate', 'em-purchase-code-validator' ); ?>">
                </div>
            </form>
            <div class="em-message" v-if="responseMessageEnabler" class="static" v-bind:class="{ success: responseMessageSuccess, 'error': responseMessageError }">
                <p>{{ responseMessage }}</p>
            </div>
        </div>
    </div>
    <?php
    $em_content = ob_get_clean();

    return $em_content;
}
add_shortcode( 'em_purchase_code_validator', 'create_empurchasecodeval_shortcode' );
