<?php

// This variable holds the ABSPATH
$cbnet_rscc_abspath = ( isset( $_GET['abspath'] ) ? urldecode( $_GET['abspath'] ) : false );

require( $cbnet_rscc_abspath . 'wp-load.php' );

// Instantiate class
$cbnet_rscc_captcha = new ReallySimpleCaptcha();

// This variable holds the CAPTCHA image prefix, which corresponds to the correct answer
$cbnet_rscc_captcha_prefix = ( isset( $_GET['prefix'] ) ? $_GET['prefix'] : false );

// This variable holds the CAPTCHA response, entered by the user
$cbnet_rscc_captcha_code = ( isset( $_GET['code'] ) ? $_GET['code'] : false );

// This variable will hold the result of the CAPTCHA validation. Set to 'false' until CAPTCHA validation passes
$cbnet_rscc_captcha_correct = ( $cbnet_rscc_captcha->check( $cbnet_rscc_captcha_prefix, $cbnet_rscc_captcha_code ) ? 'true' : 'false' ); 

// Return response
echo $cbnet_rscc_captcha_correct;
?>