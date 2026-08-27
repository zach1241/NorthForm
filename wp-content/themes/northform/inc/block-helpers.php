<?php
/**
 * Shared, presentation-neutral helpers for NORTH/FORM block templates.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Get an ACF block field without warnings when ACF is unavailable. */
function northform_block_field( $name, $default = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}
	$value = get_field( $name );
	return null === $value || false === $value ? $default : $value;
}

/** Create a unique, sanitized block anchor. */
function northform_block_anchor( $block, $default ) {
	static $used = array();
	$requested   = ! empty( $block['anchor'] ) ? $block['anchor'] : $default;
	$base        = sanitize_title( $requested );

	if ( '' === $base ) {
		$base = 'northform-block';
	}

	$id = $base;
	if ( isset( $used[ $id ] ) ) {
		$suffix = ! empty( $block['id'] ) ? sanitize_title( str_replace( 'block_', '', $block['id'] ) ) : wp_unique_id();
		$id    .= '-' . $suffix;
	}
	$used[ $id ] = true;
	return $id;
}

/** Build an ID unique to the block for aria-labelledby relationships. */
function northform_block_heading_id( $block, $suffix = 'title' ) {
	$block_id = ! empty( $block['id'] ) ? sanitize_title( str_replace( 'block_', '', $block['id'] ) ) : wp_unique_id( 'northform-' );
	return $block_id . '-' . sanitize_title( $suffix );
}

/** Escape textarea headings while retaining intentional line breaks. */
function northform_multiline_text( $text ) {
	return nl2br( esc_html( trim( (string) $text ) ) );
}

/** Render a responsive attachment image when a valid attachment ID exists. */
function northform_block_image( $attachment_id, $size, $attributes = array() ) {
	$attachment_id = absint( $attachment_id );
	if ( ! $attachment_id ) {
		return '';
	}
	return wp_get_attachment_image( $attachment_id, $size, false, $attributes );
}

/** Normalize an ACF link field into safely escaped HTML attributes. */
function northform_link_attributes( $link ) {
	if ( ! is_array( $link ) || empty( $link['url'] ) ) {
		return '';
	}
	$target = ! empty( $link['target'] ) && '_blank' === $link['target'] ? '_blank' : '_self';
	$rel    = '_blank' === $target ? 'noopener noreferrer' : '';
	$attrs  = 'href="' . esc_url( $link['url'] ) . '"';
	if ( '_blank' === $target ) {
		$attrs .= ' target="_blank" rel="' . esc_attr( $rel ) . '"';
	}
	return $attrs;
}

/** Show a small, editor-only message when a new block has no required content. */
function northform_empty_block_preview( $is_preview, $label ) {
	if ( ! $is_preview ) {
		return false;
	}
	echo '<div class="northform-block-preview"><strong>' . esc_html( $label ) . '</strong><span>' . esc_html__( 'Add the required fields to preview this block.', 'northform' ) . '</span></div>';
	return true;
}
