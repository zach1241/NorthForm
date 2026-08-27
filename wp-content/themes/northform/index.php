<?php
/**
 * NORTH/FORM — Index Template Fallback
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section">
	<div class="site-container">
		<?php if ( have_posts() ) : ?>
			<header class="section-header">
				<h1 class="h2"><?php single_post_title(); ?></h1>
			</header>

			<div class="site-content">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'project-item entry-card' ); ?>>
						<header>
							<h2 class="project-item__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
						</header>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php
				endwhile;
				the_posts_navigation();
				?>
			</div>
		<?php else : ?>
			<header class="section-header">
				<h1 class="h2"><?php esc_html_e( 'Nothing Found', 'northform' ); ?></h1>
			</header>
			<p><?php esc_html_e( 'It seems we cannot find what you are looking for.', 'northform' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
