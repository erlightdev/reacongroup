<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package reacon-group
 */

get_header();
?>

<section id="primary" class="min-h-screen flex items-center justify-center py-20">
	<main id="main" class="w-full max-w-5xl px-4 sm:px-6 lg:px-0">
		<div class="relative mx-auto overflow-hidden rounded-[2rem] border border-border/10 bg-surface/90 p-10 shadow-[0_48px_80px_rgba(15,23,42,0.08)] backdrop-blur-md reacon-404-card">
			<span class="pointer-events-none absolute left-6 top-8 h-36 w-36 rounded-full bg-primary/10 blur-3xl reacon-soft-pulse"></span>
			<span class="pointer-events-none absolute -right-8 bottom-10 h-28 w-28 rounded-full bg-secondary/15 blur-3xl reacon-soft-pulse reacon-soft-pulse-delay"></span>
			<p class="mb-6 text-xs font-semibold uppercase tracking-[0.32em] text-primary/90">404 — Page not found</p>
			<h1 class="mb-4 text-[clamp(3rem,6vw,5.5rem)] font-extrabold leading-[0.95] text-foreground">Lost in the void?</h1>
			<p class="mx-auto mb-10 max-w-2xl text-base leading-7 text-muted-foreground">
				We couldn&rsquo;t locate the page you requested. The link may be broken, or the page may have moved.
			</p>

			<div class="grid gap-4 sm:grid-cols-[minmax(0,1fr)_auto] items-center">
				<div class="min-w-0">
					<div <?php reacon_group_content_class('page-content'); ?>>
						<?php get_search_form(); ?>
					</div>
				</div>

				<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center rounded-full bg-foreground px-6 py-3 text-sm font-semibold text-background transition duration-300 hover:-translate-y-0.5 hover:bg-foreground/90">
					<?php esc_html_e('Return home', 'reacon-group'); ?>
				</a>
			</div>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<style>
	@keyframes reacon-404-entrance {
		0% {
			opacity: 0;
			transform: translateY(24px) scale(0.98);
		}

		100% {
			opacity: 1;
			transform: translateY(0) scale(1);
		}
	}

	@keyframes reacon-soft-pulse {

		0%,
		100% {
			opacity: .45;
			transform: scale(1);
		}

		50% {
			opacity: .25;
			transform: scale(1.08);
		}
	}

	.reacon-404-card {
		animation: reacon-404-entrance .8s ease-out both;
	}

	.reacon-soft-pulse {
		animation: reacon-soft-pulse 6s ease-in-out infinite;
	}

	.reacon-soft-pulse-delay {
		animation-delay: 1.6s;
	}

	@media (prefers-reduced-motion: reduce) {

		.reacon-404-card,
		.reacon-soft-pulse {
			animation: none !important;
		}
	}
</style>

<?php
get_footer();
