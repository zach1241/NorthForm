<?php
/** Conservative frontend hardening that does not interfere with Gutenberg. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
add_filter( 'the_generator', '__return_empty_string' );
add_filter( 'login_errors', static function () { return __( 'Login failed.', 'northform' ); } );
function northform_security_headers() {
	if ( headers_sent() ) { return; }
	header( 'X-Content-Type-Options: nosniff' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
	header( 'X-Frame-Options: SAMEORIGIN' );
}
add_action( 'send_headers', 'northform_security_headers' );
