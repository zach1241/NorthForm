<?php
/**
 * NORTH/FORM — Theme Setup & Support
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'northform_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function northform_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'northform', get_template_directory() . '/languages' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Custom Architectural Image Sizes
		add_image_size( 'northform-hero', 1920, 1080, true );
		add_image_size( 'northform-project-wide', 1440, 900, true );
		add_image_size( 'northform-project-portrait', 800, 1000, true );
		add_image_size( 'northform-project-landscape', 1200, 750, true );

		// Register Navigation Menus
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Navigation', 'northform' ),
				'footer'  => esc_html__( 'Footer Navigation', 'northform' ),
			)
		);

		// Switch default core markup for search form, comment form, etc., to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for full and wide align images in Gutenberg.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/main.css' );
	}
endif;
add_action( 'after_setup_theme', 'northform_setup' );

/**
 * Set the content width in pixels, based on the theme's design.
 */
function northform_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'northform_content_width', 1440 );
}
add_action( 'after_setup_theme', 'northform_content_width', 0 );
