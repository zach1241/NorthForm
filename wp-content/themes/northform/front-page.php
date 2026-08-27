<?php
/**
 * The front page template.
 *
 * Homepage sections are authored with the NORTH/FORM ACF Gutenberg blocks.
 * The header and footer templates retain the global main landmark and theme
 * hooks used by navigation, accessibility, motion, and progressive enhancement.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	the_content();
endwhile;

get_footer();
