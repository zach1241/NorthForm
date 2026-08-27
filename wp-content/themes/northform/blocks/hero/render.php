<?php
/** Hero block render template. */
$eyebrow       = northform_block_field( 'eyebrow' );
$line_1        = northform_block_field( 'headline_line_1' );
$line_2        = northform_block_field( 'headline_line_2' );
$line_3        = northform_block_field( 'headline_line_3' );
$location      = northform_block_field( 'location' );
$practice_type = northform_block_field( 'practice_type' );
$edition       = northform_block_field( 'edition_meta_label' );
$image_id      = northform_block_field( 'hero_image' );
$alt_override  = northform_block_field( 'hero_image_alt_override' );
$selected_link = northform_block_field( 'selected_work_link', array() );

if ( ! $line_1 || ! $line_2 || ! $line_3 || ! $image_id ) {
	northform_empty_block_preview( $is_preview, __( 'NORTH/FORM Hero', 'northform' ) );
	return;
}

$anchor     = northform_block_anchor( $block, 'hero' );
$heading_id = northform_block_heading_id( $block );
$image_attr = array(
	'fetchpriority' => 'high',
	'loading'       => 'eager',
	'decoding'      => 'async',
	'sizes'         => '100vw',
);
if ( $alt_override ) {
	$image_attr['alt'] = $alt_override;
}
?>
<section class="nf-hero" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="nf-hero__photo"><?php echo northform_block_image( $image_id, 'northform-hero', $image_attr ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
	<div class="nf-hero__wash" aria-hidden="true"></div>
	<div class="nf-hero__editorial-plane" aria-hidden="true"></div>
	<div class="nf-hero__static-massing" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></div>
	<div class="nf-hero__webgl" data-hero-massing aria-hidden="true"></div>
	<div class="nf-hero__content site-container">
		<?php if ( $eyebrow || $location ) : ?><p class="nf-kicker nf-hero__kicker"><?php echo esc_html( $eyebrow ); ?><?php if ( $location ) : ?><span><?php echo esc_html( $location ); ?></span><?php endif; ?></p><?php endif; ?>
		<h1 class="nf-hero__title" id="<?php echo esc_attr( $heading_id ); ?>"><span><?php echo esc_html( $line_1 ); ?></span><span><?php echo esc_html( $line_2 ); ?></span><span><?php echo esc_html( $line_3 ); ?></span></h1>
		<div class="nf-hero__baseline">
			<?php if ( $practice_type ) : ?><p><?php echo northform_multiline_text( $practice_type ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p><?php endif; ?>
			<?php if ( is_array( $selected_link ) && ! empty( $selected_link['url'] ) ) : ?><a <?php echo northform_link_attributes( $selected_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $selected_link['title'] ?: __( 'Selected work', 'northform' ) ); ?> <span aria-hidden="true">↓</span></a><?php else : ?><span class="nf-hero__selected-work"><?php esc_html_e( 'Selected work', 'northform' ); ?></span><?php endif; ?>
			<?php if ( $edition ) : ?><p><?php echo northform_multiline_text( $edition ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p><?php endif; ?>
		</div>
	</div>
</section>
