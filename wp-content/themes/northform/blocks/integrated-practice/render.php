<?php
/** Integrated Practice block render template. */
$eyebrow             = northform_block_field( 'eyebrow' );
$heading             = northform_block_field( 'heading' );
$central_proposition = northform_block_field( 'central_proposition' );
$disciplines         = northform_block_field( 'disciplines', array() );

if ( ! $heading || ! is_array( $disciplines ) || count( $disciplines ) < 2 ) {
	northform_empty_block_preview( $is_preview, __( 'Integrated Practice', 'northform' ) );
	return;
}
$anchor     = northform_block_anchor( $block, 'services' );
$heading_id = northform_block_heading_id( $block );
?>
<section class="nf-practice" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"><div class="site-container">
	<header class="nf-practice__header reveal"><?php if ( $eyebrow ) : ?><p class="nf-index"><span>04</span> <?php echo esc_html( $eyebrow ); ?></p><?php endif; ?><h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php echo northform_multiline_text( $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><?php if ( $central_proposition ) : ?><p><?php echo esc_html( $central_proposition ); ?></p><?php endif; ?></header>
	<div class="nf-practice__field reveal"><p class="nf-practice__mark">NORTH<span>/</span>FORM <small><?php echo northform_multiline_text( __( "Design integrity\nthrough delivery", 'northform' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></small></p><ol><?php foreach ( $disciplines as $position => $discipline ) : if ( empty( $discipline['discipline_name'] ) ) { continue; } $index = ! empty( $discipline['index'] ) ? $discipline['index'] : str_pad( (string) ( $position + 1 ), 2, '0', STR_PAD_LEFT ); ?><li><span><?php echo esc_html( $index ); ?></span><div><h3><?php echo esc_html( $discipline['discipline_name'] ); ?></h3><?php if ( ! empty( $discipline['description'] ) ) : ?><p><?php echo esc_html( $discipline['description'] ); ?></p><?php endif; ?></div></li><?php endforeach; ?></ol></div>
</div></section>
