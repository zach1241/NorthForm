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
			<div class="site-footer__col">
				<div class="site-footer__brand">NORTH<span class="brand-slash">/</span>FORM</div>
				<p class="site-footer__desc">Architecture and construction<br>rooted in the Western Cape.</p>
			</div>
			<div class="site-footer__col">
				<ul class="site-footer__list">
					<li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Projects', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#studio' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Studio', 'northform' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="site-footer__link"><?php esc_html_e( 'Services', 'northform' ); ?></a></li>
				</ul>
			</div>
			<div class="site-footer__col">
				<ul class="site-footer__list">
					<li><a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="site-footer__link">Instagram ↗</a></li>
					<li><a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="site-footer__link">LinkedIn ↗</a></li>
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
