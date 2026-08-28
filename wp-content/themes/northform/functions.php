<?php
/**
 * NORTH/FORM — Theme Functions & Definitions
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define Theme Constants
define( 'NORTHFORM_VERSION', '1.1.0' );
define( 'NORTHFORM_DIR', get_template_directory() );
define( 'NORTHFORM_URI', get_template_directory_uri() );

// Include Theme Modules
require_once NORTHFORM_DIR . '/inc/setup.php';
require_once NORTHFORM_DIR . '/inc/enqueue.php';
require_once NORTHFORM_DIR . '/inc/blocks.php';
require_once NORTHFORM_DIR . '/inc/seo.php';
require_once NORTHFORM_DIR . '/inc/contact.php';
require_once NORTHFORM_DIR . '/inc/security.php';
require_once NORTHFORM_DIR . '/inc/analytics.php';
