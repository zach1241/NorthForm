<?php
/**
 * NORTH/FORM — Footer Template
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #main-content -->

<footer class="site-footer" id="site-footer">
	<div class="site-container">
		<div class="site-footer__main">
			<!-- Col 1: Studio Identity -->
			<div class="site-footer__col">
				<div class="site-footer__brand">NORTH<span class="brand-slash">/</span>FORM</div>
				<p class="site-footer__desc">
					Contemporary architecture, structural engineering, and tectonic precision rooted in the Western Cape landscape.
				</p>
			</div>

			<!-- Col 2: Studio Location -->
			<div class="site-footer__col">
				<div class="site-footer__heading"><?php esc_html_e( 'Studio', 'northform' ); ?></div>
				<address class="site-footer__address">
					Kloof Street, Gardens<br>
					Cape Town, 8001<br>
					South Africa<br><br>
					<a href="mailto:studio@northform.co.za" class="site-footer__link">studio@northform.co.za</a><br>
					<a href="tel:+27214249800" class="site-footer__link">+27 (0)21 424 9800</a>
				</address>
			</div>

			<!-- Col 3: Navigation Links -->
			<div class="site-footer__col">
				<div class="site-footer__heading"><?php esc_html_e( 'Navigation', 'northform' ); ?></div>
				<ul class="site-footer__list">
					<li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Projects', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#studio' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Studio', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Services', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Contact', 'northform' ); ?></a></li>
				</ul>
			</div>

			<!-- Col 4: Publications & Media -->
			<div class="site-footer__col">
				<div class="site-footer__heading"><?php esc_html_e( 'Social and media', 'northform' ); ?></div>
				<ul class="site-footer__list">
					<li><a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="site-footer__link">Instagram ↗</a></li>
					<li><a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="site-footer__link">LinkedIn ↗</a></li>
					<li><a href="https://archdaily.com" target="_blank" rel="noopener noreferrer" class="site-footer__link">ArchDaily ↗</a></li>
				</ul>
			</div>
		</div>

		<!-- Footer Bottom Bar -->
		<div class="site-footer__bottom">
			<div>
				© <?php echo esc_html( gmdate( 'Y' ) ); ?> NORTH/FORM. ALL RIGHTS RESERVED.
			</div>
			<div>
				<button class="back-to-top" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'northform' ); ?>">
					<span class="back-to-top__arrow">↑</span>
					<span><?php esc_html_e( 'Back to top', 'northform' ); ?></span>
				</button>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
