<?php
/** Production SEO, social metadata and structured data. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function northform_has_seo_plugin() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) || defined( 'AIOSEO_VERSION' );
}

function northform_meta_description() {
	if ( is_singular() && has_excerpt() ) {
		return wp_strip_all_tags( get_the_excerpt(), true );
	}
	$description = get_bloginfo( 'description' );
	return $description ?: __( 'NORTH/FORM is an integrated architecture and construction practice in Cape Town, South Africa.', 'northform' );
}

function northform_social_image_url() {
	if ( is_singular() && has_post_thumbnail() ) {
		return get_the_post_thumbnail_url( get_queried_object_id(), 'northform-hero' );
	}
	$front_id = (int) get_option( 'page_on_front' );
	foreach ( parse_blocks( (string) get_post_field( 'post_content', $front_id ) ) as $block ) {
		if ( 'acf/northform-hero' === ( $block['blockName'] ?? '' ) ) {
			$image_id = absint( $block['attrs']['data']['hero_image'] ?? 0 );
			return $image_id ? wp_get_attachment_image_url( $image_id, 'northform-hero' ) : '';
		}
	}
	return '';
}

function northform_output_meta() {
	if ( northform_has_seo_plugin() ) { return; }
	// Replace WordPress core's singular-only canonical with the unified URL below.
	remove_action( 'wp_head', 'rel_canonical' );
	$description = northform_meta_description();
	$title       = wp_get_document_title();
	$url         = is_singular() ? get_permalink() : home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) );
	$image       = northform_social_image_url();
	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<link rel="canonical" href="<?php echo esc_url( $url ); ?>">
	<meta property="og:locale" content="<?php echo esc_attr( str_replace( '-', '_', get_bloginfo( 'language' ) ) ); ?>">
	<meta property="og:type" content="<?php echo is_singular() ? 'website' : 'website'; ?>">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	<?php if ( $image ) : ?><meta property="og:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<?php if ( $image ) : ?><meta name="twitter:image" content="<?php echo esc_url( $image ); ?>"><?php endif; ?>
	<?php
}
add_action( 'wp_head', 'northform_output_meta', 2 );

function northform_output_schema() {
	if ( northform_has_seo_plugin() ) { return; }
	$home = home_url( '/' );
	$graph = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type' => 'Organization', '@id' => $home . '#organization', 'name' => 'NORTH/FORM', 'url' => $home,
				'email' => 'studio@northform.co.za', 'telephone' => '+27 21 424 9800',
				'address' => array( '@type' => 'PostalAddress', 'addressLocality' => 'Cape Town', 'addressCountry' => 'ZA' ),
			),
			array(
				'@type' => 'WebSite', '@id' => $home . '#website', 'url' => $home, 'name' => get_bloginfo( 'name' ),
				'publisher' => array( '@id' => $home . '#organization' ), 'inLanguage' => get_bloginfo( 'language' ),
			),
		),
	);
	if ( is_singular() ) {
		$graph['@graph'][] = array( '@type' => 'WebPage', '@id' => get_permalink() . '#webpage', 'url' => get_permalink(), 'name' => wp_get_document_title(), 'description' => northform_meta_description(), 'isPartOf' => array( '@id' => $home . '#website' ), 'inLanguage' => get_bloginfo( 'language' ) );
	}
	echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
}
add_action( 'wp_head', 'northform_output_schema', 20 );

function northform_robots_txt( $output, $public ) {
	if ( ! $public ) { return "User-agent: *\nDisallow: /\n"; }
	return "User-agent: *\nDisallow: /wp-admin/\nAllow: /wp-admin/admin-ajax.php\nSitemap: " . esc_url_raw( home_url( '/wp-sitemap.xml' ) ) . "\n";
}
add_filter( 'robots_txt', 'northform_robots_txt', 10, 2 );
