<?php
/**
 * NORTH/FORM — Header Template
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
	<?php esc_html_e( 'Skip to content', 'northform' ); ?>
</a>

<header class="site-header" id="site-header">
	<div class="site-header__inner">
		<!-- Brand Identity -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-brand" rel="home">
			<span class="site-brand__text">NORTH<span class="site-brand__slash">/</span>FORM</span>
		</a>

		<!-- Desktop Navigation -->
		<nav class="site-nav site-nav--desktop" aria-label="<?php esc_attr_e( 'Primary Navigation', 'northform' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class'     => 'site-nav__list',
						'container'      => false,
						'fallback_cb'    => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				);
			else :
			?>
				<ul class="site-nav__list">
					<li><a href="#projects" class="site-nav__link">PROJECTS</a></li>
					<li><a href="#studio" class="site-nav__link">STUDIO</a></li>
					<li><a href="#services" class="site-nav__link">SERVICES</a></li>
					<li><a href="#contact" class="site-nav__link">CONTACT</a></li>
				</ul>
			<?php endif; ?>
		</nav>

		<!-- Mobile Navigation Toggle -->
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav-drawer" aria-label="<?php esc_attr_e( 'Open menu', 'northform' ); ?>">
			<span class="menu-toggle__box">
				<span class="menu-toggle__line"></span>
				<span class="menu-toggle__line"></span>
			</span>
		</button>
	</div>

	<!-- Mobile Navigation Drawer -->
	<div class="mobile-nav-drawer" id="mobile-nav-drawer" aria-hidden="true">
		<nav class="mobile-nav-drawer__nav" aria-label="<?php esc_attr_e( 'Mobile Navigation Drawer', 'northform' ); ?>">
			<ul class="mobile-nav-drawer__list">
				<li>
					<a href="#projects" class="mobile-nav-drawer__link">
						<span>PROJECTS</span>
						<span class="mobile-nav-drawer__index">01</span>
					</a>
				</li>
				<li>
					<a href="#studio" class="mobile-nav-drawer__link">
						<span>STUDIO</span>
						<span class="mobile-nav-drawer__index">02</span>
					</a>
				</li>
				<li>
					<a href="#services" class="mobile-nav-drawer__link">
						<span>SERVICES</span>
						<span class="mobile-nav-drawer__index">03</span>
					</a>
				</li>
				<li>
					<a href="#contact" class="mobile-nav-drawer__link">
						<span>CONTACT</span>
						<span class="mobile-nav-drawer__index">04</span>
					</a>
				</li>
			</ul>
		</nav>

		<div class="mobile-nav-drawer__footer">
			<p class="mobile-nav-drawer__meta">CAPE TOWN, SOUTH AFRICA</p>
			<p class="mobile-nav-drawer__meta">STUDIO@NORTHFORM.CO.ZA</p>
			<p class="mobile-nav-drawer__meta">+27 (0)21 424 9800</p>
		</div>
	</div>
</header>

<main id="main-content" class="site-main">
