<?php
/** Commission CTA block render template. */
$eyebrow      = northform_block_field( 'eyebrow' );
$heading      = northform_block_field( 'heading' );
$email        = sanitize_email( northform_block_field( 'primary_email' ) );
$primary_link = northform_block_field( 'primary_link', array() );
$phone        = northform_block_field( 'phone' );
$location     = northform_block_field( 'location' );

if ( ! $heading ) {
	northform_empty_block_preview( $is_preview, __( 'Commission CTA', 'northform' ) );
	return;
}
$anchor        = northform_block_anchor( $block, 'contact' );
$heading_id    = northform_block_heading_id( $block );
$has_link      = is_array( $primary_link ) && ! empty( $primary_link['url'] );
$has_contact   = $has_link || $email || $phone || $location;
$telephone_uri = $phone ? preg_replace( '/[^0-9+]/', '', $phone ) : '';
?>
<section class="nf-contact theme-dark" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"><div class="site-container">
	<?php if ( $eyebrow ) : ?><p class="nf-index reveal"><span>05</span> <?php echo esc_html( $eyebrow ); ?></p><?php endif; ?><h2 id="<?php echo esc_attr( $heading_id ); ?>" class="reveal"><?php echo northform_multiline_text( $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
	<?php if ( $has_contact ) : ?><div class="nf-contact__base reveal"><?php if ( $has_link ) : ?><a <?php echo northform_link_attributes( $primary_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $primary_link['title'] ?: $primary_link['url'] ); ?> <span aria-hidden="true">↗</span></a><?php elseif ( $email ) : ?><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?> <span aria-hidden="true">↗</span></a><?php endif; ?><?php if ( $location || $phone ) : ?><address><?php if ( $location ) : ?><?php echo northform_multiline_text( $location ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php endif; ?><?php if ( $phone ) : ?><br><a href="tel:<?php echo esc_attr( $telephone_uri ); ?>"><?php echo esc_html( $phone ); ?></a><?php endif; ?></address><?php endif; ?></div><?php endif; ?>
</div></section>
