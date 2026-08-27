<?php
/** Project Panoramic Datum block render template. */
$title           = northform_block_field( 'project_title' );
$location        = northform_block_field( 'location' );
$year            = northform_block_field( 'year' );
$typology        = northform_block_field( 'typology' );
$image_id        = northform_block_field( 'panoramic_image' );
$premise         = northform_block_field( 'architectural_premise' );
$supporting_copy = northform_block_field( 'supporting_copy' );
$datum_label     = northform_block_field( 'datum_label' );
$project_link    = northform_block_field( 'project_link', array() );

if ( ! $title || ! $image_id || ! $premise ) {
	northform_empty_block_preview( $is_preview, __( 'Project Panoramic Datum', 'northform' ) );
	return;
}
$anchor     = northform_block_anchor( $block, '' );
$heading_id = northform_block_heading_id( $block );
?>
<section class="nf-datum reveal" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<figure class="nf-media nf-datum__media"><?php echo northform_block_image( $image_id, 'northform-project-wide', array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '100vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure>
	<?php if ( $datum_label ) : ?><div class="nf-datum__rule" aria-hidden="true" data-datum-label="<?php echo esc_attr( $datum_label ); ?>"></div><?php endif; ?>
	<div class="nf-project-copy"><p class="nf-index"><span>02 / 02</span><?php if ( $location ) : ?> <?php echo esc_html( $location ); ?><?php endif; ?></p><h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php if ( ! empty( $project_link['url'] ) ) : ?><a <?php echo northform_link_attributes( $project_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php else : ?><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php endif; ?></h2><p><?php echo esc_html( $premise ); ?></p><?php if ( $supporting_copy ) : ?><div class="nf-project-copy__supporting"><?php echo wp_kses_post( $supporting_copy ); ?></div><?php endif; ?><?php if ( $typology || $year ) : ?><small><?php echo esc_html( implode( ' / ', array_filter( array( $typology, $year ) ) ) ); ?></small><?php endif; ?></div>
</section>
