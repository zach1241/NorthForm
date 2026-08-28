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

	// Main Theme Stylesheet
	wp_enqueue_style(
		'northform-main-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
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
	wp_enqueue_script( 'northform-analytics', get_template_directory_uri() . '/assets/js/analytics.js', array(), $theme_version, array( 'strategy' => 'defer', 'in_footer' => true ) );

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

	// Optional hero enhancement; the HTML/CSS hero is the complete fallback.
	if ( is_front_page() ) {
		wp_enqueue_script(
			'northform-hero-massing',
			get_template_directory_uri() . '/assets/js/hero-massing.js',
			array(),
			$theme_version,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'northform_scripts' );
