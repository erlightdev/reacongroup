<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 *
 * The front-page template for the Reacon Group website.
 * Each visual section is loaded from a dedicated partial inside
 * template-parts/home/ so they can be maintained independently.
 *
 * @package reacon-group
 */

get_header();
?>

<main id="primary" class="overflow-x-hidden" role="main">

	<?php
	/**
	 * ── HERO SECTION ──────────────────────────────────────
	 * Full-viewport hero with headline, sub-copy, CTA and
	 * optional background video / image. Overlaps header.
	 */
	get_template_part('template-parts/home/section', 'hero');
	?>

	<?php
	/**
	 * ── PARTNERS SECTION ──────────────────────────────────────
	 * Display partner logos in an infinite scrolling carousel.
	 */
	get_template_part('template-parts/home/section', 'partners');
	?>

	<?php
	/**
	 * ── BRAND INTRO SECTION ──────────────────────────────────────
	 * Display brand introduction content and partner cards.
	 */
	get_template_part('template-parts/home/section', 'brandintro');
	?>

	<?php
	/**
	 * ── BRAND INTRO SECTION ──────────────────────────────────────
	 * Display brand introduction content and partner cards.
	 */
	get_template_part('template-parts/home/section', 'content');
	?>
	<?php
	/**
	 * ── Industries SECTION ──────────────────────────────────────
	 * Display Industries.
	 */
	get_template_part('template-parts/home/section', 'industries');
	?>

	<?php
	/**
	 * ── Testimonials SECTION ──────────────────────────────────────
	 * Display testimonials.
	 */
	get_template_part('template-parts/home/section', 'testimonials');
	?>

	<?php
	/**
	 * ── ADDITIONAL SECTIONS ───────────────────────────────
	 * Uncomment and add more sections as they are built.
	 *
	 * get_template_part( 'template-parts/home/section', 'services' );
	 * get_template_part( 'template-parts/home/section', 'about' );
	 * get_template_part( 'template-parts/home/section', 'industries' );
	 * get_template_part( 'template-parts/home/section', 'portfolio' );
	 * get_template_part( 'template-parts/home/section', 'testimonials' );
	 * get_template_part( 'template-parts/home/section', 'blog' );
	 * get_template_part( 'template-parts/home/section', 'cta' );
	 */
	?>

</main><!-- #primary -->

<?php
get_footer();
