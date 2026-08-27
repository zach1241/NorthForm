<?php
/**
 * NORTH/FORM — Enqueue Scripts and Styles
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function northform_scripts() {
	$theme_version = defined( 'NORTHFORM_VERSION' ) ? NORTHFORM_VERSION : '1.0.0';

	// Production follow-up: self-host and subset these fonts after licensing review.
	// Google Fonts (Inter & Newsreader).
	wp_enqueue_style(
		'northform-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&family=JetBrains+Mono:wght@400;500&display=swap',
		array(),
		null
	);

	// Main Theme Stylesheet
	wp_enqueue_style(
		'northform-main-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'northform-fonts' ),
		$theme_version
	);

	// Theme root style.css (for child themes or WordPress header)
	wp_enqueue_style(
		'northform-style',
		get_stylesheet_uri(),
		array( 'northform-main-style' ),
		$theme_version
	);

	// Accessible Mobile Navigation Script
	wp_enqueue_script(
		'northform-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		$theme_version,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	// Core Interactions & Motion Script
	wp_enqueue_script(
		'northform-main-js',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'northform-navigation' ),
		$theme_version,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'northform_scripts' );

/**
 * Add preconnect resource hints for Google Fonts performance.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array
 */
function northform_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'northform_resource_hints', 10, 2 );
