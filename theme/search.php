<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package reacon-group
 */

get_header();
?>

<section id="primary" class="min-h-screen bg-background py-16 sm:py-20">
	<main id="main" class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="space-y-8">
			<header class="space-y-4">
				<div class="flex flex-wrap items-center gap-3">
					<span class="inline-flex items-center rounded-full border border-border bg-background px-3 py-1 text-xs font-medium uppercase tracking-[0.28em] text-muted-foreground">
						<?php esc_html_e('Search results', 'reacon-group'); ?>
					</span>
					<span class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">
						<?php echo esc_html(sprintf(_n('%s result', '%s results', (int) $wp_query->found_posts, 'reacon-group'), number_format_i18n((int) $wp_query->found_posts))); ?>
					</span>
				</div>

				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="max-w-4xl text-4xl font-semibold tracking-tight text-foreground sm:text-5xl">%1$s <span class="text-primary">%2$s</span></h1>',
					esc_html__('Results for:', 'reacon-group'),
					esc_html(get_search_query())
				);
				?>

				<p class="max-w-3xl text-base leading-7 text-muted-foreground">
					<?php esc_html_e('A minimal, focused view of matching content. Use the search box to refine the query or browse the cards below.', 'reacon-group'); ?>
				</p>
			</header><!-- .page-header -->

			<div class="rounded-[1.75rem] border border-border/10 bg-surface p-4 shadow-sm sm:p-6">
				<div <?php reacon_group_content_class('page-content m-0'); ?>>
					<?php get_search_form(); ?>
				</div>
			</div>

			<?php if (have_posts()) : ?>
				<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
					<?php
					while (have_posts()) :
						the_post();
						global $wp_query;
						get_template_part('template-parts/content/content', 'excerpt');
					endwhile;
					?>
				</div>

				<div class="pt-2">
					<?php reacon_group_the_posts_navigation(); ?>
				</div>
			<?php else : ?>
				<?php get_template_part('template-parts/content/content', 'none'); ?>
			<?php endif; ?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
