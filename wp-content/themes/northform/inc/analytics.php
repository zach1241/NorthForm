<?php
/** Configuration-driven GTM/GA4 integration. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function northform_gtm_id() {
	$id = defined( 'NORTHFORM_GTM_ID' ) ? NORTHFORM_GTM_ID : '';
	return preg_match( '/^GTM-[A-Z0-9]+$/', $id ) ? $id : '';
}
function northform_ga4_id() {
	$id = defined( 'NORTHFORM_GA4_ID' ) ? NORTHFORM_GA4_ID : '';
	return preg_match( '/^G-[A-Z0-9]+$/', $id ) ? $id : '';
}
function northform_analytics_head() {
	$gtm = northform_gtm_id(); $ga4 = northform_ga4_id();
	if ( $gtm ) : ?><script>window.dataLayer=window.dataLayer||[];window.dataLayer.push({'gtm.start':new Date().getTime(),event:'gtm.js'});</script><script async src="https://www.googletagmanager.com/gtm.js?id=<?php echo esc_attr( $gtm ); ?>"></script><?php
	elseif ( $ga4 ) : ?><script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga4 ); ?>"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','<?php echo esc_js( $ga4 ); ?>');</script><?php endif;
}
add_action( 'wp_head', 'northform_analytics_head', 1 );
function northform_analytics_body() {
	$gtm = northform_gtm_id(); if ( ! $gtm ) { return; }
	echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . esc_attr( $gtm ) . '" height="0" width="0" style="display:none;visibility:hidden" title="Google Tag Manager"></iframe></noscript>';
}
add_action( 'wp_body_open', 'northform_analytics_body', 1 );
