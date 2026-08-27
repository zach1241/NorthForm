<?php
/**
 * NORTH/FORM — ACF block registration and Local JSON configuration.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once NORTHFORM_DIR . '/inc/block-helpers.php';

/**
 * Add the NORTH/FORM block category.
 *
 * @param array $categories Existing categories.
 * @return array
 */
function northform_register_block_category( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'northform',
				'title' => esc_html__( 'NORTH/FORM', 'northform' ),
				'icon'  => 'admin-appearance',
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'northform_register_block_category' );

/** Register all metadata-driven ACF blocks after ACF initializes. */
function northform_register_acf_blocks() {
	$blocks = array(
		'hero',
		'featured-project',
		'project-portrait-study',
		'project-panoramic-datum',
		'studio-manifesto',
		'integrated-practice',
		'commission-cta',
	);

	foreach ( $blocks as $block ) {
		$path = NORTHFORM_DIR . '/blocks/' . $block;
		if ( file_exists( $path . '/block.json' ) ) {
			register_block_type( $path );
		}
	}
}
add_action( 'acf/init', 'northform_register_acf_blocks' );

/**
 * Keep field-group JSON inside the theme and under version control.
 *
 * @param string $path Default ACF save path.
 * @return string
 */
function northform_acf_json_save_path( $path ) {
	return NORTHFORM_DIR . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'northform_acf_json_save_path' );

/**
 * Add the theme JSON directory without discarding plugin/default paths.
 *
 * @param array $paths ACF load paths.
 * @return array
 */
function northform_acf_json_load_paths( $paths ) {
	$paths[] = NORTHFORM_DIR . '/acf-json';
	return array_values( array_unique( $paths ) );
}
add_filter( 'acf/settings/load_json', 'northform_acf_json_load_paths' );

/** Explain the required plugin without breaking the public site. */
function northform_acf_dependency_notice() {
	if ( class_exists( 'ACF' ) || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	?>
	<div class="notice notice-warning">
		<p><?php esc_html_e( 'NORTH/FORM: ACF Pro is required to register and edit the custom Gutenberg blocks. The existing frontend remains available until ACF Pro is activated and the homepage migration is completed.', 'northform' ); ?></p>
	</div>
	<?php
}
add_action( 'admin_notices', 'northform_acf_dependency_notice' );
