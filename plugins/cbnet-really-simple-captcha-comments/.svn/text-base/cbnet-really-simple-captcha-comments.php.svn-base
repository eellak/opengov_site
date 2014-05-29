<?php
/*
 * Plugin Name:   cbnet Really Simple CAPTCHA Comments
 * Plugin URI:    http://www.chipbennett.net/wordpress/plugins/cbnet-really-simple-captcha-comments/
 * Description:   Comment form CAPTCHA using  Really Simple CAPTCHA plugin
 * Version:       2.1
 * Author:        chipbennett
 * Author URI:    http://www.chipbennett.net/
 *
 * License:       GNU General Public License, v2 (or newer)
 * License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * Thanks to Takayuki Miyoshi fordeveloping the Really Simple CAPTCHA
 * plugin. Hopefully this plugin will provide some inspiration for others
 * to incorporate Really Simple CAPTCHA into their own plugins.
 */
 
/**
 * Load Plugin textdomain
 */
function cbnet_rscc_load_textdomain() {
	load_plugin_textdomain( 'cbnet_rscc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
// Load Plugin textdomain
add_action( 'plugins_loaded', 'cbnet_rscc_load_textdomain' );
 
/**
 * Bootstrap Plugin settings
 */
include( plugin_dir_path( __FILE__ ) . 'settings.php' );

/**
 * Globalize Plugin options
 */
global $cbnet_rscc_options;
$cbnet_rscc_options = cbnet_rscc_get_options();
 
/**
 * Add Really Simple CAPTCHA to the comment form, using the comment_form_after_fields hook.
 * http://wordpress.org/extend/plugins/really-simple-captcha/
 */
function cbnet_rscc_captcha() { 
	if ( ( ! is_user_logged_in() ) && ( class_exists('ReallySimpleCaptcha') ) ) {
		// Instantiate the ReallySimpleCaptcha class, which will handle all of the heavy lifting
		$cbnet_rscc_captcha = new ReallySimpleCaptcha();
		
		// Get Plugin options
		global $cbnet_rscc_options;
		
	/************************************************************
	 * All configurable options are below  *
	 ************************************************************/
		
		// Set Really Simple CAPTCHA Options
		$cbnet_rscc_captcha->chars = $cbnet_rscc_options['chars']; //'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'
		$cbnet_rscc_captcha->char_length = $cbnet_rscc_options['char_length']; //'4'
		$cbnet_rscc_captcha->img_size = array( $cbnet_rscc_options['img_size_x'], $cbnet_rscc_options['img_size_y'] ); //array( '72', '24' )
		$cbnet_rscc_captcha->fg = array( $cbnet_rscc_options['fg_r'], $cbnet_rscc_options['fg_g'], $cbnet_rscc_options['fg_b'] ); //array( '0', '0', '0' )
		$cbnet_rscc_captcha->bg = array( $cbnet_rscc_options['bg_r'], $cbnet_rscc_options['bg_g'], $cbnet_rscc_options['bg_b'] ); //array( '255', '255', '255' )
		$cbnet_rscc_captcha->font_size = $cbnet_rscc_options['font_size']; //'16'
		$cbnet_rscc_captcha->font_char_width = $cbnet_rscc_options['font_char_width']; //'15'
		$cbnet_rscc_captcha->img_type = $cbnet_rscc_options['img_type']; //'png'
		$cbnet_rscc_captcha->base = $cbnet_rscc_options['base']; //array( '6', '18' )
		
		// Set Comment Form Options
		$cbnet_rscc_captcha_form_label = $cbnet_rscc_options['comment_form_label']; //'Anti-Spam:'
		
	/************************************************************
	 * Nothing else to edit.  No configurable options below this point.  *
	 ************************************************************/
		
		// Generate random word and image prefix
		$cbnet_rscc_captcha_word = $cbnet_rscc_captcha->generate_random_word();
		$cbnet_rscc_captcha_prefix = mt_rand();
		// Generate CAPTCHA image
		$cbnet_rscc_captcha_image_name = $cbnet_rscc_captcha->generate_image($cbnet_rscc_captcha_prefix, $cbnet_rscc_captcha_word);
		// Define values for comment form CAPTCHA fields
		$cbnet_rscc_captcha_image_url =  get_bloginfo('wpurl') . '/wp-content/plugins/really-simple-captcha/tmp/';
		$cbnet_rscc_captcha_image_src = $cbnet_rscc_captcha_image_url . $cbnet_rscc_captcha_image_name;
		$cbnet_rscc_captcha_image_width = $cbnet_rscc_captcha->img_size[0];
		$cbnet_rscc_captcha_image_height = $cbnet_rscc_captcha->img_size[1];
		$cbnet_rscc_captcha_field_size = $cbnet_rscc_captcha->char_length;
		// AJAX url
		$cbnet_rscc_captcha_ajax_url = plugin_dir_url( __FILE__ ) . 'ajaxresponse.php';
		// ABSPATH
		$cbnet_rscc_abspath = urlencode( ABSPATH );
		
		// Output the comment form CAPTCHA fields
	?>
		<script>
		function cbnetRsccInlineCaptchaCheck( code, prefix, url, abspath ) {
			// Setup variables
			var code_string = '?code=' + code;
			var prefix_string = '&prefix=' + prefix;
			var abspath_string = '&abspath=' + abspath;
			var request_url_base = url;
			var request_url = request_url_base + code_string + prefix_string + abspath_string;
			
			// Instantiate request
			var xmlhttp = new XMLHttpRequest();
			
			// Parse resonse
			xmlhttp.onreadystatechange=function() { 
				if ( 4 == xmlhttp.readyState && 200 ==xmlhttp.status ) {
					var ajax_response = xmlhttp.responseText;
					
					// Update form verification feedback
					if ( 'true' == ajax_response ) {
						document.getElementById( 'cbnet-rscc-captcha-verify' ).innerHTML = '<span style="color:green">Correct CAPTCHA value</span>';
						document.getElementById( 'comment_captcha_code' ).style.background = '#ccffcc';
					} else if ( 'false' == ajax_response ) {
						document.getElementById( 'cbnet-rscc-captcha-verify' ).innerHTML = '<span style="color:red">Incorrect CAPTCHA value</span>';
						document.getElementById( 'comment_captcha_code' ).style.background = '#ffccff';
					}				
				}
			}
			// Send request
			xmlhttp.open( 'GET', request_url, true );
			xmlhttp.send();
		}
		</script>
		<p class="comment-form-captcha"><img src="<?php echo $cbnet_rscc_captcha_image_src; ?>" alt="captcha" width="<?php echo $cbnet_rscc_captcha_image_width; ?>" height="<?php echo $cbnet_rscc_captcha_image_height; ?>" /></p>
		<label for="comment_captcha_code"><?php echo $cbnet_rscc_captcha_form_label; ?></label>
		<?php echo "<input type='text' name='comment_captcha_code' id='comment_captcha_code' value='' size='$cbnet_rscc_captcha_field_size' onblur='cbnetRsccInlineCaptchaCheck( this.value, \"$cbnet_rscc_captcha_prefix\", \"$cbnet_rscc_captcha_ajax_url\", \"$cbnet_rscc_abspath\" )' />"; ?>
		<input type="hidden" name="comment_captcha_prefix" id="comment_captcha_prefix" value="<?php echo $cbnet_rscc_captcha_prefix; ?>" />
		<p id="cbnet-rscc-captcha-verify">Εισάγετε τον κωδικό που βλέπετε παραπάνω</p>
		
	<?php 
	}
}
add_action( 'comment_form_after_fields' , 'cbnet_rscc_captcha' );

function cbnet_check_comment_captcha( $approved, $comment_data  ) {
	if ( ( ! is_user_logged_in() ) && ( $comment_data['comment_type'] == '' ) && ( class_exists('ReallySimpleCaptcha') ) ) {
		$cbnet_rscc_captcha = new ReallySimpleCaptcha();
		// This variable holds the CAPTCHA image prefix, which corresponds to the correct answer
		$cbnet_rscc_captcha_prefix = $_POST['comment_captcha_prefix'];
		// This variable holds the CAPTCHA response, entered by the user
		$cbnet_rscc_captcha_code = $_POST['comment_captcha_code'];
		// Validate the CAPTCHA response
		$cbnet_rscc_captcha_correct = $cbnet_rscc_captcha->check( $cbnet_rscc_captcha_prefix, $cbnet_rscc_captcha_code );
		// If CAPTCHA validation fails (incorrect value entered in CAPTCHA field) mark comment as spam.
		if ( true != $cbnet_rscc_captcha_correct ) {
			$approved = 'spam';
		}
		// clean up the tmp directory
		$cbnet_rscc_captcha->remove($cbnet_rscc_captcha_prefix);
		$cbnet_rscc_captcha->cleanup();
	}
	// Return $approved
	return $approved;
}
add_filter( 'pre_comment_approved', 'cbnet_check_comment_captcha', 99, 2 );