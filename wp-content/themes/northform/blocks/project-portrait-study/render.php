<?php
/** Project Portrait Study block render template. */
$title           = northform_block_field( 'project_title' );
$location        = northform_block_field( 'location' );
$year            = northform_block_field( 'year' );
$typology        = northform_block_field( 'typology' );
$primary_image   = northform_block_field( 'primary_image' );
$detail_image    = northform_block_field( 'detail_image' );
$premise         = northform_block_field( 'architectural_premise' );
$supporting_copy = northform_block_field( 'supporting_copy' );
$project_link    = northform_block_field( 'project_link', array() );

if ( ! $title || ! $primary_image || ! $premise ) {
	northform_empty_block_preview( $is_preview, __( 'Project Portrait Study', 'northform' ) );
	return;
}
$anchor          = northform_block_anchor( $block, 'projects' );
$section_title_id = northform_block_heading_id( $block, 'section-title' );
$project_title_id = northform_block_heading_id( $block, 'project-title' );
?>
<section class="nf-works" id="<?php echo esc_attr( $anchor ); ?>" aria-labelledby="<?php echo esc_attr( $section_title_id ); ?>">
	<header class="nf-works__header site-container reveal"><p class="nf-index"><span>02</span> <?php esc_html_e( 'Selected works', 'northform' ); ?></p><h2 id="<?php echo esc_attr( $section_title_id ); ?>"><?php echo northform_multiline_text( __( "Structures\nof place.", 'northform' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><p><?php esc_html_e( 'Studies in material, light and permanence across the Western Cape.', 'northform' ); ?></p></header>
	<article class="nf-portrait-study reveal" aria-labelledby="<?php echo esc_attr( $project_title_id ); ?>">
		<div class="nf-project-copy"><p class="nf-index"><span>01 / 02</span><?php if ( $location ) : ?> <?php echo esc_html( $location ); ?><?php endif; ?></p><h3 id="<?php echo esc_attr( $project_title_id ); ?>"><?php if ( ! empty( $project_link['url'] ) ) : ?><a <?php echo northform_link_attributes( $project_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a><?php else : ?><?php echo northform_multiline_text( $title ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php endif; ?></h3><p><?php echo esc_html( $premise ); ?></p><?php if ( $supporting_copy ) : ?><div class="nf-project-copy__supporting"><?php echo wp_kses_post( $supporting_copy ); ?></div><?php endif; ?><?php if ( $typology || $year ) : ?><small><?php echo esc_html( implode( ' / ', array_filter( array( $typology, $year ) ) ) ); ?></small><?php endif; ?></div>
		<figure class="nf-media nf-portrait-study__primary"><?php echo northform_block_image( $primary_image, 'northform-project-portrait', array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(max-width: 768px) 100vw, 52vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure>
		<?php if ( $detail_image ) : ?><figure class="nf-media nf-portrait-study__detail"><?php echo northform_block_image( $detail_image, 'northform-project-landscape', array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(max-width: 768px) 0px, 29vw' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></figure><?php endif; ?>
	</article>
</section>
