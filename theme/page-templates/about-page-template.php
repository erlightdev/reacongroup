<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 *
 * About page template with the mirrored top hero/header area.
 *
 * @package reacon-group
 */

get_header();
?>

<main id="primary" class="overflow-x-hidden" role="main">
	<?php get_template_part('template-parts/about/section', 'hero'); ?>
</main>

<?php
get_footer();
