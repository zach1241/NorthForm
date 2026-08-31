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
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script>document.documentElement.classList.replace('no-js', 'js');</script>
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
						'link_before'    => '<span>',
						'link_after'     => '</span>',
					)
				);
			else :
			?>
				<ul class="site-nav__list">
					<li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>"><?php esc_html_e( 'Projects', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#studio' ) ); ?>"><?php esc_html_e( 'Studio', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Services', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'northform' ); ?></a></li>
				</ul>
			<?php endif; ?>
		</nav>

		<!-- Mobile Navigation Toggle -->
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav-drawer" aria-label="<?php esc_attr_e( 'Open menu', 'northform' ); ?>" data-open-label="<?php esc_attr_e( 'Open menu', 'northform' ); ?>" data-close-label="<?php esc_attr_e( 'Close menu', 'northform' ); ?>">
			<span class="menu-toggle__box">
				<span class="menu-toggle__line"></span>
				<span class="menu-toggle__line"></span>
			</span>
		</button>
	</div>

	<!-- Mobile Navigation Drawer -->
	<dialog class="mobile-nav-drawer" id="mobile-nav-drawer" aria-labelledby="mobile-nav-title">
		<button class="menu-toggle menu-toggle--dialog-close" type="button" aria-label="<?php esc_attr_e( 'Close menu', 'northform' ); ?>">
			<span class="menu-toggle__box" aria-hidden="true"><span class="menu-toggle__line"></span><span class="menu-toggle__line"></span></span>
		</button>
		<nav class="mobile-nav-drawer__nav" aria-label="<?php esc_attr_e( 'Mobile Navigation Drawer', 'northform' ); ?>">
			<h2 id="mobile-nav-title" class="screen-reader-text"><?php esc_html_e( 'Site navigation', 'northform' ); ?></h2>
			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class'     => 'mobile-nav-drawer__list',
						'container'      => false,
						'fallback_cb'    => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
					)
				);
			else :
				?>
				<ul class="mobile-nav-drawer__list">
					<li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>"><span><?php esc_html_e( 'Projects', 'northform' ); ?></span></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#studio' ) ); ?>"><span><?php esc_html_e( 'Studio', 'northform' ); ?></span></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><span><?php esc_html_e( 'Services', 'northform' ); ?></span></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><span><?php esc_html_e( 'Contact', 'northform' ); ?></span></a></li>
				</ul>
			<?php endif; ?>
		</nav>

		<div class="mobile-nav-drawer__footer">
			<p class="mobile-nav-drawer__meta"><?php esc_html_e( 'Cape Town, South Africa', 'northform' ); ?></p>
			<p class="mobile-nav-drawer__meta">STUDIO@NORTHFORM.CO.ZA</p>
			<p class="mobile-nav-drawer__meta">+27 (0)21 424 9800</p>
		</div>
	</dialog>
</header>

<main id="main-content" class="site-main">
