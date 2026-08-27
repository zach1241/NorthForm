<?php
/** Studio Manifesto block render template. */
$eyebrow         = northform_block_field( 'eyebrow' );
$heading         = northform_block_field( 'heading' );
$lead_statement  = northform_block_field( 'lead_statement' );
$supporting_copy = northform_block_field( 'supporting_copy' );
$image_id        = northform_block_field( 'image' );
$proof_points    = northform_block_field( 'proof_points', array() );

if ( ! $heading ) {
	northform_empty_block_preview( $is_preview, __( 'Studio Manifesto', 'northform' ) );
	return;
}
$anchor     = northform_block_anchor( $block, 'studio' );
$heading_id = northform_block_heading_id( $block );
?>
<section class="nf-manifesto theme-dark" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="nf-manifesto__grid">
		<div class="nf-manifesto__type reveal"><?php if ( $eyebrow ) : ?><p class="nf-index"><span>03</span> <?php echo esc_html( $eyebrow ); ?></p><?php endif; ?><h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php echo northform_multiline_text( $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><?php if ( $lead_statement ) : ?><p class="nf-manifesto__lead"><?php echo esc_html( $lead_statement ); ?></p><?php endif; ?></div>
		<?php if ( $image_id ) : ?><figure class="nf-media nf-manifesto__media reveal"><?php echo northform_block_image( $image_id, 'northform-project-portrait', array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(max-width: 768px) 100vw, 42vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure><?php endif; ?>
		<?php if ( $supporting_copy || $proof_points ) : ?><div class="nf-manifesto__body reveal"><?php if ( $supporting_copy ) : ?><?php echo wp_kses_post( $supporting_copy ); ?><?php endif; ?><?php if ( is_array( $proof_points ) && $proof_points ) : ?><div class="nf-proof" aria-label="<?php esc_attr_e( 'Studio track record', 'northform' ); ?>"><?php foreach ( $proof_points as $point ) : if ( empty( $point['value'] ) || empty( $point['label'] ) ) { continue; } ?><p><strong><?php echo esc_html( $point['value'] ); ?></strong><span><?php echo esc_html( $point['label'] ); ?></span></p><?php endforeach; ?></div><?php endif; ?></div><?php endif; ?>
	</div>
</section>
