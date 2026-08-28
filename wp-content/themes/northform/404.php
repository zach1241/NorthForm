<?php get_header(); ?>
<section class="nf-error theme-dark"><div class="site-container">
	<p class="nf-index"><span>404</span> <?php esc_html_e( 'Not found', 'northform' ); ?></p>
	<h1><?php esc_html_e( 'This space does not exist.', 'northform' ); ?></h1>
	<p><?php esc_html_e( 'The page may have moved or the address may be incorrect.', 'northform' ); ?></p>
	<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'northform' ); ?> <span aria-hidden="true">↗</span></a>
</div></section>
<?php get_footer(); ?>
