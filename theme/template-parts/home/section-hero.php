<?php
/**
 * Home page section: Hero.
 *
 * Full-viewport hero with background video, teal overlay,
 * headline copy, CTA, and a floating stats card.
 * Designed to sit beneath the absolutely-positioned header.
 *
 * @package reacon-group
 */

$video_src = get_template_directory_uri() . '/public/video/hero-bg.mp4';
$poster    = get_template_directory_uri() . '/public/image/hero-poster.jpg';
?>

<section
	id="hero"
	class="relative py-20 pt-24 flex items-end overflow-hidden  lg:items-center  lg:pt-24"
	aria-label="<?php esc_attr_e( 'Hero', 'reacon-group' ); ?>"
>

	<!-- ── Background Video ──────────────────────────────── -->
	<video
		class="pointer-events-none absolute inset-0 h-full w-full object-cover"
		autoplay
		muted
		loop
		playsinline
		preload="auto"
		poster="<?php echo esc_url( $poster ); ?>"
		aria-hidden="true"
	>
		<source src="<?php echo esc_url( $video_src ); ?>" type="video/mp4" />
	</video>

	<!-- ── Teal colour overlay ───────────────────────────── -->
	<div
		class="pointer-events-none absolute inset-0 bg-gradient-to-r from-[#0a6e72]/90 via-[#10898f]/75 to-primary/50"
		aria-hidden="true"
	></div>

	<!-- ── Subtle grain texture ──────────────────────────── -->
	<div
		class="pointer-events-none absolute inset-0 opacity-[0.04]"
		aria-hidden="true"
		style="background-image:url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400'%3E%3Cfilter id='g'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23g)' opacity='1'/%3E%3C/svg%3E&quot;);"
	></div>

	<!-- ── Content container ─────────────────────────────── -->
	<div class="relative z-10 mx-auto flex w-full max-w-7xl flex-col gap-10 px-6 lg:flex-row lg:items-end lg:justify-between lg:gap-16 lg:px-12">

		<!-- Left column: copy + CTA -->
		<div class="max-w-2xl">

			<!-- Tagline -->
			<p class="mb-4 font-sans text-sm font-medium tracking-wide text-white/75 lg:text-base">
				<?php esc_html_e( 'Powering how brands print, automate, and deliver worldwide.', 'reacon-group' ); ?>
			</p>

			<!-- Heading -->
			<h1 class="mb-6 font-display text-4xl font-extrabold leading-[1.12] text-white lg:text-5xl xl:text-[3.4rem]">
				<?php esc_html_e( 'We Are Your Global Printing & Production Partner', 'reacon-group' ); ?>
			</h1>

			<!-- Description -->
			<p class="mb-8 max-w-lg font-sans text-sm leading-relaxed text-white/80 lg:text-[15px]">
				<?php esc_html_e( 'From packaging to retail activations, we produce print at scale—on time, every time. With 30+ years of experience, Reacon delivers precision, consistency, and speed across 8 countries.', 'reacon-group' ); ?>
			</p>

			<!-- CTA button -->
			<a
				href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"
				class="inline-flex items-center gap-2.5 rounded-full bg-primary py-2.5 pl-6 pr-3 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110"
			>
				<?php esc_html_e( 'Learn More About Us', 'reacon-group' ); ?>
				<span
					aria-hidden="true"
					class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20"
				>
					<i class="ph-bold ph-arrow-up-right text-[11px]" aria-hidden="true"></i>
				</span>
			</a>

		</div><!-- /left column -->

		<!-- Right column: stats card -->
		<div class="w-full max-w-xs shrink-0 lg:mb-2">
			<div class="rounded-2xl bg-white/95 p-6 shadow-xl backdrop-blur-sm lg:p-7">

				<!-- Badge icon (top-right decorative) -->
				<div class="mb-3 flex items-start justify-between">
					<div>
						<!-- Stat number -->
						<p class="font-display text-4xl font-extrabold leading-none text-primary lg:text-[2.6rem]">
							<?php esc_html_e( '490,000+', 'reacon-group' ); ?>
						</p>
					</div>
					<!-- Gear / badge icon -->
					<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-foreground text-white" aria-hidden="true">
						<i class="ph-fill ph-gear-six text-lg"></i>
					</span>
				</div>

				<!-- Stat label -->
				<p class="mb-3 font-display text-sm font-bold text-foreground">
					<?php esc_html_e( 'projects delivered globally', 'reacon-group' ); ?>
				</p>

				<!-- Stat description -->
				<p class="font-sans text-xs leading-relaxed text-muted-foreground">
					<?php esc_html_e( 'Across 8 countries and counting powering consistent, high-quality brand execution for enterprises, institutions, and agencies worldwide.', 'reacon-group' ); ?>
				</p>

			</div><!-- /card -->
		</div><!-- /right column -->

	</div><!-- /container -->

</section><!-- #hero -->
