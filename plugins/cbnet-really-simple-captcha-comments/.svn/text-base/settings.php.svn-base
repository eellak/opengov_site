<?php
/**
 * Plugin Settings API Implementation
 */

/**
 * Globalize Plugin options
 */
global $cbnet_rscc_options;
$cbnet_rscc_options = cbnet_rscc_get_options();

/**
 * Get Plugin options
 */
function cbnet_rscc_get_options() {
	return wp_parse_args( get_option( 'plugin_cbnet_rscc_options', array() ), cbnet_rscc_get_option_defaults() );
}

/**
 * Get Plugin option defaults
 */
function cbnet_rscc_get_option_defaults() {
	$defaults = array(	
		'chars' => 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789',
		'char_length' => '4',
		//'img_size' => array( '72', '24' ),
		'img_size_x' => '72',
		'img_size_y' => '24',
		'fg_r' => '0',
		'fg_g' => '0',
		'fg_b' => '0',
		//'fg' => array( '0', '0', '0' ),
		'bg_r' => '255',
		'bg_g' => '255',
		'bg_b' => '255',
		//'bg' => array( '255', '255', '255' ),
		'font_size' => '16',
		'font_char_width' => '15',
		'img_type' => 'png',
		'base' => array( '6', '18'),
		'comment_form_label' => __( 'Anti-Spam' , 'cbnet_rscc' )
	);
	return apply_filters( 'cbnet_rscc_option_defaults', $defaults );
}

/**
 * Get Plugin option parameters
 */
function cbnet_rscc_get_option_parameters() {
	$defaults = cbnet_rscc_get_option_defaults();
	$parameters = array(
		'chars' => array(
			'name' => 'chars',
			'title' => __( 'Characters' , 'cbnet_rscc' ),
			'description' => __( 'Characters available to be used in generated CAPTCHA images' , 'cbnet_rscc' ),
			'type' => 'textarea',
			'sanitize' => 'nohtml',
			'default' => $defaults['chars']
		),
		'char_length' => array(
			'name' => 'char_length',
			'title' => __( 'Character Length' , 'cbnet_rscc' ),
			'description' => __( 'Number of characters used in generated CAPTCHA images' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'integer',
			'default' => $defaults['char_length']
		),
		'img_size_x' => array(
			'name' => 'img_size_x',
			'title' => __( 'Image Width' , 'cbnet_rscc' ),
			'description' => __( 'Width of CAPTCHA image, in pixels (px)' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'integer',
			'default' => $defaults['img_size_x']
		),
		'img_size_y' => array(
			'name' => 'img_size_y',
			'title' => __( 'Image Height' , 'cbnet_rscc' ),
			'description' => __( 'Height of CAPTCHA image, in pixels (px)' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'integer',
			'default' => $defaults['img_size_y']
		),
		'fg_r' => array(
			'name' => 'fg_r',
			'title' => __( 'Image Foreground Color R Value' , 'cbnet_rscc' ),
			'description' => __( 'Image foreground RGB color R value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['fg_r']
		),
		'fg_g' => array(
			'name' => 'fg_g',
			'title' => __( 'Image Foreground Color G Value' , 'cbnet_rscc' ),
			'description' => __( 'Image foreground RGB color R value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['fg_g']
		),
		'fg_b' => array(
			'name' => 'fg_b',
			'title' => __( 'Image Foreground Color B Value' , 'cbnet_rscc' ),
			'description' => __( 'Image foreground RGB color B value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['fg_b']
		),
		'bg_r' => array(
			'name' => 'bg_r',
			'title' => __( 'Image Background Color R Value' , 'cbnet_rscc' ),
			'description' => __( 'Image background RGB color R value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['bg_r']
		),
		'bg_g' => array(
			'name' => 'bg_g',
			'title' => __( 'Image Background Color G Value' , 'cbnet_rscc' ),
			'description' => __( 'Image background RGB color G value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['bg_g']
		),
		'bg_b' => array(
			'name' => 'bg_b',
			'title' => __( 'Image Background Color B Value' , 'cbnet_rscc' ),
			'description' => __( 'Image background RGB color B value' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['bg_b']
		),
		'font_size' => array(
			'name' => 'font_size',
			'title' => __( 'Font Size' , 'cbnet_rscc' ),
			'description' => __( 'Font size in points (pt) of characters in generated CAPTCHA image' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'integer',
			'default' => $defaults['font_size']
		),
		'font_char_width' => array(
			'name' => 'font_char_width',
			'title' => __( 'Character Width' , 'cbnet_rscc' ),
			'description' => __( 'Width in pixels (px) between characters in generated CAPTCHA image' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'rgb',
			'default' => $defaults['font_char_width']
		),
		'img_type' => array(
			'name' => 'img_type',
			'title' => __( 'Image File Type' , 'cbnet_rscc' ),
			'description' => __( 'File type for generated CAPTCHA image' , 'cbnet_rscc' ),
			'type' => 'select',
			'valid_options' => array( 'png', 'jpeg', 'gif' ),
			'default' => $defaults['img_type']
		),
		'comment_form_label' => array(
			'name' => 'comment_form_label',
			'title' => __( 'Comment Form Label' , 'cbnet_rscc' ),
			'description' => __( 'Text label to display for the CAPTCHA in the comment form' , 'cbnet_rscc' ),
			'type' => 'text',
			'sanitize' => 'nohtml',
			'default' => $defaults['comment_form_label']
		),
		'base' => array(
			'name' => 'base',
			'title' => __( 'CAPTCHA Secret Sauce' , 'cbnet_rscc' ),
			'description' => __( 'If you want to modify this option, please use a filter' , 'cbnet_rscc' ),
			'type' => 'internal',
			'default' => $defaults['base']
		)
	);
	return apply_filters( 'cbnet_rscc_option_parameters', $parameters );
}
 
/**
 * Register Plugin Settings
 */
function cbnet_rscc_register_settings() {

	/**
	* Register Favicon setting
	* 
	* Registers Favicon setting as
	* part of core General settings
	*/
	register_setting( 'discussion', 'plugin_cbnet_rscc_options', 'cbnet_rscc_validate_settings' );

	/**
	 * Add settings section to Settings -> Discussion
	 */
	add_settings_section( 'cbnet_rscc', __( 'cbnet Really Simple CAPTCHA Comment Settings' , 'cbnet_rscc' ), 'cbnet_rscc_settings_section', 'discussion' );	
	
	/**
	 * Discussion settings section callback
	 */
	function cbnet_rscc_settings_section() {
		echo '<p>'. __( 'Configure cbnet Really Simple CAPTCHA Comments settings here.' , 'cbnet_rscc' ) . '</p>';
	}

	/**
	* Add CAPTCHA word setting field
	* 
	* Adds Favicon setting field to 
	* Settings -> General
	*/
	add_settings_field( 'cbnet_rscc_captcha_form', '<label for="cbnet_rscc_captcha_form">' . __( 'Comment Form' , 'cbnet_rscc' ) . '</label>', 'cbnet_rscc_settings_field_captcha_form', 'discussion', 'cbnet_rscc' );
	
	/**
	 * CAPTCHA word setting fields callback
	 */
	function cbnet_rscc_settings_field_captcha_form() {
		global $cbnet_rscc_options;
		$option_parameters = cbnet_rscc_get_option_parameters();
		?>
		<p>
			<input type="text" size="40" name="plugin_cbnet_rscc_options[comment_form_label]" value="<?php echo esc_attr( $cbnet_rscc_options['comment_form_label'] ); ?>" />
			<?php echo $option_parameters['comment_form_label']['description']; ?>
		</p>
		<?php
	}

	/**
	* Add CAPTCHA word setting field
	* 
	* Adds Favicon setting field to 
	* Settings -> General
	*/
	add_settings_field( 'cbnet_rscc_captcha_word', '<label for="cbnet_rscc_captcha_word">' . __( 'CAPTCHA Word' , 'cbnet_rscc' ) . '</label>', 'cbnet_rscc_settings_field_captcha_word', 'discussion', 'cbnet_rscc' );
	
	/**
	 * CAPTCHA word setting fields callback
	 */
	function cbnet_rscc_settings_field_captcha_word() {
		global $cbnet_rscc_options;
		$option_parameters = cbnet_rscc_get_option_parameters();
		?>
		<p>
			<?php echo $option_parameters['chars']['description']; ?><br />
			<textarea name="plugin_cbnet_rscc_options[chars]" cols="80" rows="4"><?php echo esc_textarea( $cbnet_rscc_options['chars'] ); ?></textarea>			 
		</p>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[char_length]" value="<?php echo esc_attr( $cbnet_rscc_options['char_length'] ); ?>" />
			<?php echo $option_parameters['char_length']['description']; ?>
		</p>
		<?php
	}

	/**
	* Add CAPTCHA font setting field
	* 
	* Adds Favicon setting field to 
	* Settings -> General
	*/
	add_settings_field( 'cbnet_rscc_captcha_font', '<label for="cbnet_rscc_captcha_font">' . __( 'CAPTCHA Font' , 'cbnet_rscc' ) . '</label>', 'cbnet_rscc_settings_field_captcha_font', 'discussion', 'cbnet_rscc' );
	
	/**
	 * CAPTCHA font setting fields callback
	 */
	function cbnet_rscc_settings_field_captcha_font() {
		global $cbnet_rscc_options;
		$option_parameters = cbnet_rscc_get_option_parameters();
		?>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[font_size]" value="<?php echo esc_attr( $cbnet_rscc_options['font_size'] ); ?>" />
			<?php echo $option_parameters['font_size']['description']; ?>
		</p>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[font_char_width]" value="<?php echo esc_attr( $cbnet_rscc_options['font_char_width'] ); ?>" />
			<?php echo $option_parameters['font_char_width']['description']; ?>
		</p>
		<?php
	}

	/**
	* Add CAPTCHA image setting field
	* 
	* Adds Favicon setting field to 
	* Settings -> General
	*/
	add_settings_field( 'cbnet_rscc_captcha_image', '<label for="cbnet_rscc_captcha_image">' . __( 'CAPTCHA Image' , 'cbnet_rscc' ) . '</label>', 'cbnet_rscc_settings_field_captcha_image', 'discussion', 'cbnet_rscc' );
	
	/**
	 * CAPTCHA image setting fields callback
	 */
	function cbnet_rscc_settings_field_captcha_image() {
		global $cbnet_rscc_options;
		$option_parameters = cbnet_rscc_get_option_parameters();
		?>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[img_size_x]" value="<?php echo esc_attr( $cbnet_rscc_options['img_size_x'] ); ?>" />
			<?php echo $option_parameters['img_size_x']['description']; ?>
			<br />
			<input type="text" size="4" name="plugin_cbnet_rscc_options[img_size_y]" value="<?php echo esc_attr( $cbnet_rscc_options['img_size_y'] ); ?>" />
			<?php echo $option_parameters['img_size_y']['description']; ?>
		</p>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[fg_r]" value="<?php echo esc_attr( $cbnet_rscc_options['fg_r'] ); ?>" />
			<?php echo $option_parameters['fg_r']['description']; ?>
			<br />
			<input type="text" size="4" name="plugin_cbnet_rscc_options[fg_g]" value="<?php echo esc_attr( $cbnet_rscc_options['fg_g'] ); ?>" />
			<?php echo $option_parameters['fg_g']['description']; ?>
			<br />
			<input type="text" size="4" name="plugin_cbnet_rscc_options[fg_b]" value="<?php echo esc_attr( $cbnet_rscc_options['fg_b'] ); ?>" />
			<?php echo $option_parameters['fg_b']['description']; ?>
		</p>
		<p>
			<input type="text" size="4" name="plugin_cbnet_rscc_options[bg_r]" value="<?php echo esc_attr( $cbnet_rscc_options['bg_r'] ); ?>" />
			<?php echo $option_parameters['bg_r']['description']; ?>
			<br />
			<input type="text" size="4" name="plugin_cbnet_rscc_options[bg_g]" value="<?php echo esc_attr( $cbnet_rscc_options['bg_g'] ); ?>" />
			<?php echo $option_parameters['bg_g']['description']; ?>
			<br />
			<input type="text" size="4" name="plugin_cbnet_rscc_options[bg_b]" value="<?php echo esc_attr( $cbnet_rscc_options['bg_b'] ); ?>" />
			<?php echo $option_parameters['bg_b']['description']; ?>
		</p>
		<p>
			<?php
			$valid_img_type_options = $option_parameters['img_type']['valid_options'];
			?>
			<select name="plugin_cbnet_rscc_options[img_type]">
			<?php 
			foreach ( $valid_img_type_options as $valid_option ) {
				?>
				<option <?php selected( $valid_option == $cbnet_rscc_options['img_type'] ); ?> value="<?php echo $valid_option; ?>"><?php echo $valid_option; ?></option>
				<?php
			}
			?>
			</select>
		</p>
		<?php
	}
}
add_action( 'admin_init', 'cbnet_rscc_register_settings' );



/**
 * Plugin register_setting() sanitize callback
 * 
 * Validate and whitelist user-input data before updating Plugin 
 * Options in the database. Only whitelisted options are passed
 * back to the database, and user-input data for all whitelisted
 * options are sanitized.
 * 
 * @link	http://codex.wordpress.org/Data_Validation	Codex Reference: Data Validation
 * 
 * @param	array	$input	Raw user-input data submitted via the Plugin Settings page
 * @return	array	$input	Sanitized user-input data passed to the database
 */
function cbnet_rscc_validate_settings( $input ) {

	// This is the "whitelist": current settings
	global $cbnet_rscc_options;
	$valid_input = $cbnet_rscc_options;
	// Get the array of option parameters
	$option_parameters = cbnet_rscc_get_option_parameters();
	// Get the array of option defaults
	$option_defaults = cbnet_rscc_get_option_defaults();
	
	// Determine what type of submit was input
	$submittype = ( ! empty( $input['reset'] ) ? 'reset' : 'submit' );	
	
	// Loop through each setting
	foreach ( $option_defaults as $setting => $value ) {
		
		// If submit, validate/sanitize $input
		if ( 'submit' == $submittype ) {
		
			// Get the setting details from the defaults array
			$optiondetails = $option_parameters[$setting];
			// Get the array of valid options, if applicable
			$valid_options = ( isset( $optiondetails['valid_options'] ) ? $optiondetails['valid_options'] : false );
			
			// Validate checkbox fields
			if ( 'checkbox' == $optiondetails['type'] ) {
				// If input value is set and is true, return true; otherwise return false
				$valid_input[$setting] = ( ( isset( $input[$setting] ) && true == $input[$setting] ) ? true : false );
			}
			// Validate radio button fields
			else if ( 'radio' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'select' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( in_array( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate text input and textarea fields
			else if ( ( 'text' == $optiondetails['type'] || 'textarea' == $optiondetails['type'] ) ) {
				// Validate no-HTML content
				if ( 'nohtml' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_nohtml_kses filter
					$valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
				}
				// Validate HTML content
				if ( 'html' == $optiondetails['sanitize'] ) {
					// Pass input data through the wp_filter_kses filter
					$valid_input[$setting] = wp_filter_kses( $input[$setting] );
				}
				// Validate integer content
				if ( 'integer' == $optiondetails['sanitize'] ) { 
					// Verify value is an integer
					$valid_input[$setting] = ( is_int( (int) $input[$setting] ) ? $input[$setting] : $valid_input[$setting] );
				}
				// Validate RGB content
				if ( 'rgb' == $optiondetails['sanitize'] ) { 
					// Verify value is an integer
					$valid_input[$setting] = ( ( is_int( (int) $input[$setting] ) && 0 <= (int) $input[$setting] && 255 >= (int) $input[$setting] ) ? $input[$setting] : $valid_input[$setting] );
				}
			}
		} 
		// If reset, reset defaults
		elseif ( 'reset' == $submittype ) {
			// Set $setting to the default value
			$valid_input[$setting] = $option_defaults[$setting];
		}
	}
	return $valid_input;		

}
?>