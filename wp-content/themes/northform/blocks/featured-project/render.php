<?php
/** Featured Project block render template. */
$title           = northform_block_field( 'project_title' );
$location        = northform_block_field( 'location' );
$year            = northform_block_field( 'year' );
$typology        = northform_block_field( 'typology' );
$image_id        = northform_block_field( 'primary_image' );
$plane_image_id  = northform_block_field( 'editorial_plane_image' );
$premise         = northform_block_field( 'architectural_premise' );
$supporting_copy = northform_block_field( 'supporting_copy' );
$project_link    = northform_block_field( 'project_link', array() );

if ( ! $title || ! $image_id || ! $premise ) {
	northform_empty_block_preview( $is_preview, __( 'Featured Project', 'northform' ) );
	return;
}

$anchor     = northform_block_anchor( $block, 'featured-project' );
$heading_id = northform_block_heading_id( $block );
?>
<section class="nf-opener" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<header class="nf-opener__header site-container reveal"><p class="nf-index"><span>01</span> <?php esc_html_e( 'Featured project', 'northform' ); ?></p><h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php if ( ! empty( $project_link['url'] ) ) : ?><a <?php echo northform_link_attributes( $project_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php else : ?><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php endif; ?></h2></header>
	<div class="nf-opener__stage reveal">
		<figure class="nf-media nf-opener__media"><?php echo northform_block_image( $image_id, 'northform-hero', array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '100vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure>
		<div class="nf-opener__panel"><p><?php echo esc_html( $premise ); ?></p><?php if ( $location || $typology || $year ) : ?><dl><?php if ( $location ) : ?><div><dt><?php esc_html_e( 'Place', 'northform' ); ?></dt><dd><?php echo esc_html( $location ); ?></dd></div><?php endif; ?><?php if ( $typology ) : ?><div><dt><?php esc_html_e( 'Type', 'northform' ); ?></dt><dd><?php echo esc_html( $typology ); ?></dd></div><?php endif; ?><?php if ( $year ) : ?><div><dt><?php esc_html_e( 'Year', 'northform' ); ?></dt><dd><?php echo esc_html( $year ); ?></dd></div><?php endif; ?></dl><?php endif; ?><?php if ( $plane_image_id ) : ?><figure class="nf-opener__panel-image"><?php echo northform_block_image( $plane_image_id, 'northform-project-landscape', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure><?php endif; ?></div>
	</div>
	<?php if ( $supporting_copy || $typology ) : ?><div class="nf-opener__after site-container reveal"><?php if ( $supporting_copy ) : ?><div><?php echo wp_kses_post( $supporting_copy ); ?></div><?php endif; ?><?php if ( $typology ) : ?><span><?php echo esc_html( $typology ); ?></span><?php endif; ?></div><?php endif; ?>
</section>
