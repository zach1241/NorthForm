<?php
/**
 * NORTH/FORM — Block Categories & Gutenberg Registration Setup
 * 
 * Prepares the custom block category for Phase 3 Gutenberg / ACF blocks.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom block category for NORTH/FORM components.
 *
 * @param array                   $categories Block categories.
 * @param WP_Block_Editor_Context $context    Current block editor context.
 * @return array
 */
function northform_register_block_categories( $categories, $context ) {
	return array_merge(
		array(
			array(
				'slug'  => 'northform-blocks',
				'title' => esc_html__( 'NORTH/FORM Blocks', 'northform' ),
				'icon'  => 'admin-appearance',
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'northform_register_block_categories', 10, 2 );
