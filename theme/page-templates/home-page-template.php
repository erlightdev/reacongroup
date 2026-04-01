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

	<!-- Home Page Hero Section -->
	<?php

	$hero_image_webp = get_template_directory_uri() . '/public/image/hero-bg.webp';
	$hero_image_png  = get_template_directory_uri() . '/public/image/hero-bg.png';
	$hero_video_mp4  = get_template_directory_uri() . '/public/home/hero-home.mp4';
	$stats_icon      = get_template_directory_uri() . '/public/figma-assets/stats-icon.png';

	$hero_video_mp4_path = get_template_directory() . '/public/home/hero-home.mp4';

	$has_hero_mp4   = file_exists($hero_video_mp4_path);
	$has_hero_video = $has_hero_mp4;
	?>

	<section
		id="hero"
		class="relative w-full p-4"
		aria-label="<?php esc_attr_e('Hero', 'reacon-group'); ?>">
		<div class="reacon-home-hero-card relative flex min-h-[60vh] w-full flex-col overflow-hidden rounded-[31px] bg-foreground lg:min-h-[640px] xl:min-h-[720px]">

			<!-- Always render image placeholder under video for reliable fallback -->
			<picture class="pointer-events-none absolute inset-0" aria-hidden="true">
				<source srcset="<?php echo esc_url($hero_image_webp); ?>" type="image/webp" />
				<img
					src="<?php echo esc_url($hero_image_png); ?>"
					alt=""
					class="h-full w-full object-cover object-center"
					fetchpriority="high"
					loading="eager"
					decoding="async" />
			</picture>

			<?php if ($has_hero_video): ?>
				<video
					class="pointer-events-none absolute inset-0 z-[1] h-full w-full object-cover object-center"
					autoplay
					muted
					loop
					playsinline
					preload="metadata"
					poster="<?php echo esc_url($hero_image_png); ?>"
					onerror="this.style.display='none';"
					aria-hidden="true">
					<source src="<?php echo esc_url($hero_video_mp4); ?>" type="video/mp4" />
				</video>
			<?php endif; ?>

			<div class="pointer-events-none absolute inset-0 bg-black/40 lg:bg-gradient-to-t lg:from-black/55 lg:via-black/20 lg:to-transparent" aria-hidden="true"></div>

			<div
				class="pointer-events-none absolute left-0 top-0 h-[60%] w-[42%] min-w-[280px]"
				style="background-image:linear-gradient(130deg, rgba(30, 202, 211, 0.34) 12%, rgba(30, 202, 211, 0) 58%);"
				aria-hidden="true"></div>

			<div class="relative z-10 mx-auto flex h-full w-full flex-1 flex-col justify-end px-6 pb-0 pt-28 lg:px-[42px] lg:pt-24">

				<div class="mb-10 flex w-full max-w-[860px] flex-col items-start gap-6 lg:mb-[42px]">
					<div class="flex flex-col gap-3 text-white">
						<p class="font-sans text-base leading-[1.42]">
							<?php esc_html_e('Powering how brands print, automate, and deliver worldwide.', 'reacon-group'); ?>
						</p>

						<h1 class="font-display text-4xl font-bold leading-[1.15] tracking-tight lg:text-[64px] lg:leading-[1.14]">
							<?php esc_html_e('We Are Your Global Printing & Production Partner', 'reacon-group'); ?>
						</h1>
					</div>

					<p class="max-w-[847px] font-sans text-base leading-[1.42] text-white/95">
						<?php esc_html_e('From packaging to retail activations, we produce print at scale, on time, every time. With 30+ years of experience, Reacon delivers precision, consistency, and speed across 8 countries.', 'reacon-group'); ?>
					</p>

					<a
						href="<?php echo esc_url(home_url('/about-us/')); ?>"
						class="group inline-flex items-center gap-2.5 rounded-full bg-primary py-1 pl-5 pr-1 font-sans transition-all duration-300 hover:bg-secondary">
						<span class="text-base font-medium text-primary-foreground">
							<?php esc_html_e('Learn More About Us', 'reacon-group'); ?>
						</span>
						<span class="flex h-[42px] w-[42px] shrink-0 items-center justify-center rounded-full bg-white/30 transition-transform duration-300 group-hover:rotate-45" aria-hidden="true">
							<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.16699 12.8333L12.8337 1.16666M12.8337 1.16666H3.49965M12.8337 1.16666V10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
					</a>
				</div>

				<div class="relative flex w-full flex-col gap-3 rounded-t-[32px] bg-white p-6 sm:max-w-[320px] lg:absolute lg:bottom-0 lg:right-[42px] lg:min-h-[287px]">
					<div class="pointer-events-none absolute right-4 top-4 h-[34px] w-[76px] overflow-hidden">
						<img
							src="<?php echo esc_url($stats_icon); ?>"
							alt=""
							class="h-full w-full object-cover object-top"
							loading="lazy"
							decoding="async" />
					</div>

					<div class="relative z-10 flex w-full flex-col gap-1">
						<p class="font-display text-[44px] font-bold leading-[1.2] text-primary">
							<?php esc_html_e('490,000+', 'reacon-group'); ?>
						</p>
						<p class="font-sans text-base font-semibold leading-[1.42] text-foreground">
							<?php esc_html_e('projects delivered globally', 'reacon-group'); ?>
						</p>
					</div>

					<div class="relative z-10 w-full">
						<p class="font-sans text-sm leading-[1.42] text-muted-foreground">
							<?php esc_html_e('Across 8 countries and counting powering consistent, high-quality brand execution for enterprises, institutions, and agencies worldwide.', 'reacon-group'); ?>
						</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<style>
		/* Desktop-only top notch that lets the fixed header "recess" into the hero. */
		@media (min-width: 1024px) {

			/* 1. The White Notch (same geometry as the About hero) */
			#hero .reacon-home-hero-card::before {
				content: "";
				position: absolute;
				left: 50%;
				top: 0;
				/* Align to the very top */
				transform: translateX(-50%);
				width: clamp(420px, 46vw, 720px);
				height: 86px;
				background: #fff;
				border-bottom-left-radius: 40px;
				border-bottom-right-radius: 40px;
				z-index: 3;
				pointer-events: none;
			}

			/* 2. The Inverted Corners (The "Swoop") */
			#hero .reacon-home-hero-card::after {
				content: "";
				position: absolute;
				top: 0;
				left: 50%;
				transform: translateX(-50%);

				/* Width = Notch Width + 78px (40px radius on each side) */
				width: calc(clamp(420px, 46vw, 720px) + 78px);
				height: 40px;

				background:
					radial-gradient(circle at 0% 100%, transparent 40px, var(--background) 41px) no-repeat left bottom / 40px 40px,
					radial-gradient(circle at 100% 100%, transparent 40px, var(--background) 41px) no-repeat right bottom / 40px 40px;

				z-index: 4;
				pointer-events: none;
			}
		}
	</style>
	<!-- End Home Page Hero Section -->

	<!-- Partners Section -->
	<?php


	$partner_logo_dir_uri = untrailingslashit(get_template_directory_uri()) . '/public/partner-logo';

	// Static list: keep in sync with files inside `theme/public/partner-logo/`.
	// SEO note: `alt` is descriptive but generic (no brand names provided).
	$partner_logos = array(
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-1.png',
			'alt' => 'Partner logo 1',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-2.png',
			'alt' => 'Partner logo 2',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-3.png',
			'alt' => 'Partner logo 3',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-4.png',
			'alt' => 'Partner logo 4',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-5.png',
			'alt' => 'Partner logo 5',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-6.png',
			'alt' => 'Partner logo 6',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-7.png',
			'alt' => 'Partner logo 7',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-8.png',
			'alt' => 'Partner logo 8',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-9.png',
			'alt' => 'Partner logo 9',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-10.png',
			'alt' => 'Partner logo 10',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-11.png',
			'alt' => 'Partner logo 11',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-12.png',
			'alt' => 'Partner logo 12',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-13.png',
			'alt' => 'Partner logo 13',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-14.png',
			'alt' => 'Partner logo 14',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-15.png',
			'alt' => 'Partner logo 15',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-16.png',
			'alt' => 'Partner logo 16',
		),
		array(
			'url' => $partner_logo_dir_uri . '/partner-logo-17.png',
			'alt' => 'Partner logo 17',
		),
	);

	// Map/normalize once for safe output (esc_url + ensure strings).
	$partner_logos = array_map(function ($item) {
		return array(
			'url' => esc_url($item['url']),
			'alt' => sanitize_text_field($item['alt']),
		);
	}, $partner_logos);

	if (empty($partner_logos)) {
		return;
	}
	?>

	<section class="relative w-full overflow-hidden" aria-label="<?php esc_attr_e('Partners', 'reacon-group'); ?>">
		<div class="pointer-events-none absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white to-transparent lg:w-32" aria-hidden="true"></div>
		<div class="pointer-events-none absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white to-transparent lg:w-32" aria-hidden="true"></div>

		<div class="mx-auto flex min-h-[74px] w-full max-w-[1440px] items-center overflow-hidden px-4 lg:px-0">
			<div class="flex w-fit animate-partner-marquee items-center gap-12">
				<?php for ($rep = 0; $rep < 2; $rep++): ?>
					<?php foreach ($partner_logos as $logo): ?>
						<img
							class="h-14 w-[90px] object-contain mix-blend-luminosity opacity-70 transition-opacity duration-200 hover:opacity-100"
							src="<?php echo esc_attr($logo['url']); ?>"
							alt="<?php echo esc_attr($logo['alt']); ?>"
							loading="lazy"
							decoding="async" />
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>

		<style>
			@keyframes partner-marquee {
				0% {
					transform: translateX(0);
				}

				100% {
					transform: translateX(-50%);
				}
			}

			.animate-partner-marquee {
				animation: partner-marquee 30s linear infinite;
			}

			.animate-partner-marquee:hover {
				animation-play-state: paused;
			}
		</style>
	</section>
	<!-- End Partners Section -->

	<!-- Brand Intro Section -->
	<?php

	/**
	 * Home page section: Brand intro — heading + partner cards.
	 *
	 * @package reacon-group
	 */
	$brandintro_dir = get_template_directory_uri() . '/public/brandintro';
	?>

	<div class="max-w-[1370px] mx-auto px-4 sm:px-6 flex flex-col items-center gap-10 md:gap-12 xl:gap-[52px] py-10">

		<!-- Heading Section -->
		<div class="text-center max-w-5xl flex flex-col gap-4 sm:gap-5">
			<h2 class="font-display font-medium text-3xl sm:text-4xl lg:text-[44px] leading-tight lg:leading-[1.32] text-foreground">
				<?php esc_html_e('From design studios to data platforms and', 'reacon-group'); ?>
				<span class="font-semibold text-primary"><?php esc_html_e('global print networks, Reacon', 'reacon-group'); ?></span>
				<?php esc_html_e('turns creative concepts into physical, measurable results.', 'reacon-group'); ?>
			</h2>
			<p class="font-sans text-sm sm:text-base text-foreground leading-relaxed max-w-[658px] mx-auto">
				<?php esc_html_e('Our teams manage everything — print, fulfilment, and digital automation — so you can focus on growth while we handle the execution.', 'reacon-group'); ?>
			</p>
		</div>

		<!-- Partner Cards Row -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 xl:gap-8 w-full max-w-[1400px]">

			<!-- Cups Galore -->
			<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:bg-white hover:border-primary hover:shadow-sm">
				<div class="flex flex-col gap-4 mb-6">
					<div class="flex h-8 w-full items-center justify-end">
						<img
							src="<?php echo esc_url($brandintro_dir . '/cups-galore-logo.png'); ?>"
							alt="<?php esc_attr_e('Cups Galore', 'reacon-group'); ?>"
							class="h-full w-auto object-contain"
							loading="lazy" decoding="async" />
					</div>
					<div class="w-full">
						<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Cups Galore', 'reacon-group'); ?></h3>
						<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
							<?php esc_html_e('Cups Galore is an Australian manufacturer that creates high-quality, custom-printed paper cups for businesses, cafes, and events.', 'reacon-group'); ?>
						</p>
					</div>
				</div>
				<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
					<?php esc_html_e('Explore Site', 'reacon-group'); ?>
					<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
				</a>
			</div>

			<!-- Digital Press -->
			<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:bg-white hover:border-primary hover:shadow-sm">
				<div class="flex flex-col gap-4 mb-6">
					<div class="flex h-8 w-full items-center justify-end">
						<img
							src="<?php echo esc_url($brandintro_dir . '/digital-press-logo.png'); ?>"
							alt="<?php esc_attr_e('Digital Press', 'reacon-group'); ?>"
							class="h-[22px] w-auto object-contain"
							loading="lazy" decoding="async" />
					</div>
					<div class="w-full">
						<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Digital Press', 'reacon-group'); ?></h3>
						<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
							<?php esc_html_e('Provides various printing services, including marketing materials, stationery, books, catalogues, signage, and design services.', 'reacon-group'); ?>
						</p>
					</div>
				</div>
				<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
					<?php esc_html_e('Explore Site', 'reacon-group'); ?>
					<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
				</a>
			</div>

			<!-- Westman Printing -->
			<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:bg-white hover:border-primary hover:shadow-sm">
				<div class="flex flex-col gap-4 mb-6">
					<div class="flex h-8 w-full items-center justify-end">
						<img
							src="<?php echo esc_url($brandintro_dir . '/westman.svg'); ?>"
							alt="<?php esc_attr_e('Westman Printing', 'reacon-group'); ?>"
							class="h-full w-auto object-contain"
							loading="lazy" decoding="async" />
					</div>
					<div class="w-full">
						<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Westman Printing', 'reacon-group'); ?></h3>
						<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
							<?php esc_html_e('Westman Printing offers experienced in-house design team services equipped with the latest design technology to turn any idea into a masterpiece.', 'reacon-group'); ?>
						</p>
					</div>
				</div>
				<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
					<?php esc_html_e('Explore Site', 'reacon-group'); ?>
					<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
				</a>
			</div>

			<!-- Horizon Print Management -->
			<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:bg-white hover:border-primary hover:shadow-sm">
				<div class="flex flex-col gap-4 mb-6">
					<div class="flex h-8 w-full items-center justify-end">
						<img
							src="<?php echo esc_url($brandintro_dir . '/hirizon.png'); ?>"
							alt="<?php esc_attr_e('Horizon Print Management', 'reacon-group'); ?>"
							class="h-5 w-auto object-contain"
							loading="lazy" decoding="async" />
					</div>
					<div class="w-full">
						<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Horizon Print Management', 'reacon-group'); ?></h3>
						<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
							<?php esc_html_e('Printing business and marketing materials, alongside managing integrated marketing campaigns across various platforms.', 'reacon-group'); ?>
						</p>
					</div>
				</div>
				<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
					<?php esc_html_e('Explore Site', 'reacon-group'); ?>
					<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
				</a>
			</div>

		</div>
	</div>

	<!-- End Brand Intro Section -->


	<?php

	/**
	 * ── Industries SECTION ──────────────────────────────────────
	 * Display Industries.
	 */
	get_template_part('template-parts/home/section', 'industries');
	?>
	<!-- Testimonials Section -->
	<?php
	$about_assets_uri = get_template_directory_uri() . '/public/about';

	$testimonials_row_1 = array(
		array(
			'quote' => __('Reacon has been a game-changer for our branding strategy. Their creative solutions have not only elevated our product presentation but also enhanced customer engagement at every touchpoint.', 'reacon-group'),
			'name' => __('Maria Gomez', 'reacon-group'),
			'role' => __('Brand Manager, Lifestyle Products Co.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-1.png',
		),
		array(
			'quote' => __('Since partnering with Reacon, we have seen a significant increase in our market reach. Their innovative approaches to design and marketing have truly set us apart from competitors.', 'reacon-group'),
			'name' => __('James Chen', 'reacon-group'),
			'role' => __('Marketing Director, Tech Innovations Ltd.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-2.png',
		),
		array(
			'quote' => __("Reacon's expertise in digital marketing has transformed our online presence. Their strategies have led to increased traffic and conversion rates across all platforms.", 'reacon-group'),
			'name' => __('Linda Patel', 'reacon-group'),
			'role' => __('E-commerce Lead, Fashion Forward.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-3.png',
		),
		array(
			'quote' => __('Collaborating with Reacon has been an enlightening experience. Their ability to understand our vision and turn it into reality has exceeded our expectations.', 'reacon-group'),
			'name' => __('Carlos Martinez', 'reacon-group'),
			'role' => __('Creative Director, Artistry Agency.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-4.png',
		),
		array(
			'quote' => __('The team at Reacon brought our ideas to life with their stunning visuals and compelling narratives. Our audience response has been overwhelmingly positive since the rebranding.', 'reacon-group'),
			'name' => __('Samantha Lee', 'reacon-group'),
			'role' => __('Product Development Manager, Fresh Foods Inc.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-5.png',
		),
	);

	$testimonials_row_2 = array(
		array(
			'quote' => __('The partnership with Reacon allowed us to redefine our visual identity. Their innovative approach helped us stand out in a competitive market, driving increased sales and brand loyalty.', 'reacon-group'),
			'name' => __('James Lee', 'reacon-group'),
			'role' => __('Marketing Director, Tech Innovations Inc.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-6.png',
		),
		array(
			'quote' => __("Thanks to Reacon's expertise, our advertising campaigns have seen a remarkable improvement in conversion rates. Their strategic insight was invaluable to our success.", 'reacon-group'),
			'name' => __('Linda Carter', 'reacon-group'),
			'role' => __('Chief Marketing Officer, Eco Friendly Solutions.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-7.png',
		),
		array(
			'quote' => __('Working with Reacon has transformed our storytelling. Their unique designs and concepts resonate deeply with our audience, creating a memorable brand experience.', 'reacon-group'),
			'name' => __('Raj Patel', 'reacon-group'),
			'role' => __('Creative Director, NextGen Media.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-8.png',
		),
		array(
			'quote' => __("Reacon's attention to detail and commitment to excellence has made a significant impact on our product launches. Their designs have consistently received positive feedback from our customers.", 'reacon-group'),
			'name' => __('Sophia Chen', 'reacon-group'),
			'role' => __('Product Development Lead, HealthTech Co.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-9.png',
		),
		array(
			'quote' => __('Reacon has been a game-changer for our branding strategy. Their creative solutions have not only elevated our product presentation but also enhanced customer engagement at every touchpoint.', 'reacon-group'),
			'name' => __('Maria Gomez', 'reacon-group'),
			'role' => __('Brand Manager, Lifestyle Products Co.', 'reacon-group'),
			'img' => $about_assets_uri . '/testimonial-avatar-10.png',
		),
	);
	?>

	<section id="reacon-testimonials-section" class="relative overflow-hidden bg-[#fafafa] py-16 lg:py-24" aria-label="<?php esc_attr_e('Testimonials', 'reacon-group'); ?>">
		<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(233,251,252,0.9)_0%,rgba(255,255,255,0.85)_58%,rgba(255,255,255,1)_100%)]" aria-hidden="true"></div>

		<div class="relative z-10 mx-auto mb-10 flex w-full max-w-[760px] flex-col items-center gap-3 px-6 text-center lg:mb-12">
			<h2 class="font-display text-[32px] font-bold leading-[1.3] text-[#1e293b] sm:text-[38px] lg:text-[42px]">
				<?php esc_html_e('What Our Partners Say About Us', 'reacon-group'); ?>
			</h2>
			<p class="max-w-[706px] font-sans text-sm leading-[1.42] text-[#262626] sm:text-base">
				<?php esc_html_e("Our clients trust us to deliver precision, creativity, and scale - every time. Here's what they say about working with Reacon.", 'reacon-group'); ?>
			</p>
		</div>

		<div class="relative z-10 space-y-6 lg:space-y-8">
			<div class="reacon-testi-track-wrap">
				<div class="reacon-testi-track reacon-testi-track--forward">
					<?php for ($r = 0; $r < 2; $r++): ?>
						<?php foreach ($testimonials_row_1 as $item): ?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="font-sans text-base leading-[1.42] text-foreground">
									<?php echo esc_html($item['quote']); ?>
								</p>
								<div class="flex items-start gap-6">
									<div class="min-w-0 flex-1">
										<p class="font-sans text-base font-medium leading-[1.42] text-primary"><?php echo esc_html($item['name']); ?></p>
										<p class="font-sans text-sm leading-[1.42] text-muted-foreground"><?php echo esc_html($item['role']); ?></p>
									</div>
									<img src="<?php echo esc_url($item['img']); ?>" alt="<?php echo esc_attr($item['name']); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
								</div>
							</article>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>

			<div class="reacon-testi-track-wrap">
				<div class="reacon-testi-track reacon-testi-track--reverse">
					<?php for ($r = 0; $r < 2; $r++): ?>
						<?php foreach ($testimonials_row_2 as $item): ?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="font-sans text-base leading-[1.42] text-foreground">
									<?php echo esc_html($item['quote']); ?>
								</p>
								<div class="flex items-start gap-6">
									<div class="min-w-0 flex-1">
										<p class="font-sans text-base font-medium leading-[1.42] text-primary"><?php echo esc_html($item['name']); ?></p>
										<p class="font-sans text-sm leading-[1.42] text-muted-foreground"><?php echo esc_html($item['role']); ?></p>
									</div>
									<img src="<?php echo esc_url($item['img']); ?>" alt="<?php echo esc_attr($item['name']); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
								</div>
							</article>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>
		</div>

		<div class="pointer-events-none absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-[#fafafa] via-[#fafafa]/75 to-transparent sm:w-24 lg:w-40" aria-hidden="true"></div>
		<div class="pointer-events-none absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-[#fafafa] via-[#fafafa]/75 to-transparent sm:w-24 lg:w-40" aria-hidden="true"></div>

		<style>
			.reacon-testi-track-wrap {
				overflow: hidden;
			}

			.reacon-testi-track {
				display: flex;
				width: max-content;
				gap: 32px;
				will-change: transform;
			}

			.reacon-testi-track--forward {
				animation: reacon-testi-forward 46s linear infinite;
			}

			.reacon-testi-track--reverse {
				animation: reacon-testi-reverse 52s linear infinite;
			}

			.reacon-testi-track-wrap:hover .reacon-testi-track {
				animation-play-state: paused;
			}

			@keyframes reacon-testi-forward {
				0% {
					transform: translateX(0);
				}

				100% {
					transform: translateX(calc(-50% - 16px));
				}
			}

			@keyframes reacon-testi-reverse {
				0% {
					transform: translateX(calc(-50% - 16px));
				}

				100% {
					transform: translateX(0);
				}
			}
		</style>
	</section>
	<!-- End Testimonials Section -->
	<!-- CTA Section -->
	<?php
	$home_cta = array(
		'heading' => __('Print Smarter. Move Faster. Deliver Everywhere.', 'reacon-group'),
		'description' => __('Reacon connects creativity, automation, and logistics to help brands operate at global speed.', 'reacon-group'),
		'primary' => array(
			'label' => __('Contact Us', 'reacon-group'),
			'url' => home_url('/contact-us/'),
		),
		'secondary' => array(
			'label' => __('Talk to Our Team', 'reacon-group'),
			'url' => home_url('/contact-us/'),
		),
	);
	?>
	<section id="home-cta" class="py-10 sm:py-12 lg:py-14" aria-labelledby="home-cta-heading">
		<div class="mx-auto w-full  px-5 sm:px-6 lg:px-10">
			<div class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]" style="background: linear-gradient(179deg, #076166 0%, #1ECAD3 100%);">
				<!-- Background Gradients & Overlays -->
				<div class="pointer-events-none absolute inset-0 z-0" aria-hidden="true">
					<svg preserveAspectRatio="none" style="display:block; width:100%; height:100%;" viewBox="0 0 2014 746" fill="none" xmlns="http://www.w3.org/2000/svg">
						<defs>
							<linearGradient id="home-cta-left" x1="0" y1="0" x2="1000" y2="560" gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#1ECAD3" stop-opacity="0.3" />
								<stop offset="1" stop-color="#1ECAD3" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="home-cta-right" x1="2014" y1="0" x2="980" y2="746" gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#1ECAD3" stop-opacity="0.25" />
								<stop offset="1" stop-color="#1ECAD3" stop-opacity="0.04" />
							</linearGradient>
						</defs>
						<path d="M0 0 L0 285 L270 530 L960 0 Z" fill="url(#home-cta-left)" fill-opacity="0.5" />
						<path d="M2014 0 L2014 290 L1520 746 L980 746 L1590 0 Z" fill="url(#home-cta-right)" fill-opacity="0.36" />
					</svg>
				</div>

				<!-- Noise Texture with Grain Effect (Figma Design) -->
				<div class="pointer-events-none absolute inset-0 z-[1]" aria-hidden="true">
					<svg preserveAspectRatio="none" style="display:block; width:100%; height:100%;" viewBox="0 0 1888 520" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g filter="url(#filter0_n_611_7678)">
							<rect x="0" y="0" width="1888" height="520" fill="black" fill-opacity="0.1" />
						</g>
						<defs>
							<filter id="filter0_n_611_7678" x="0" y="0" width="1888" height="520" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
								<feFlood flood-opacity="0" result="BackgroundImageFix" />
								<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
								<feTurbulence type="fractalNoise" baseFrequency="0.625 0.625" stitchTiles="stitch" numOctaves="3" result="noise" seed="367" />
								<feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
								<feComponentTransfer in="alphaNoise" result="coloredNoise1">
									<feFuncA type="discrete" tableValues="1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
								</feComponentTransfer>
								<feComposite operator="in" in2="shape" in="coloredNoise1" result="noise1Clipped" />
								<feFlood flood-color="#000000" result="color1Flood" />
								<feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
								<feMerge result="effect1_noise_611_7678">
									<feMergeNode in="shape" />
									<feMergeNode in="color1" />
								</feMerge>
							</filter>
						</defs>
					</svg>
				</div>

				<!-- Radial Gradient Overlay -->
				<div class="pointer-events-none absolute inset-0 z-[2] bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.0)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>

				<!-- Content -->
				<div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center justify-center text-center">
					<h2 id="home-cta-heading" class="font-display text-[34px] font-bold leading-[1.08] text-white sm:text-[46px] lg:text-[56px]">
						<?php echo esc_html($home_cta['heading']); ?>
					</h2>
					<p class="mx-auto mt-4 font-sans text-[14px] leading-[1.4] text-white/90 sm:text-[16px]">
						<?php echo esc_html($home_cta['description']); ?>
					</p>
					<div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-[10px]">
						<a href="<?php echo esc_url($home_cta['primary']['url']); ?>" class="inline-flex items-center gap-[10px] rounded-full bg-white py-[4px] pl-[20px] pr-[4px] font-sans text-[16px] font-medium text-primary no-underline transition-all duration-300 hover:bg-white/90">
							<span><?php echo esc_html($home_cta['primary']['label']); ?></span>
							<span class="flex size-[42px] items-center justify-center rounded-full bg-secondary/15">
								<i class="ph ph-arrow-up-right text-base text-primary" aria-hidden="true"></i>
							</span>
						</a>
						<a href="<?php echo esc_url($home_cta['secondary']['url']); ?>" class="inline-flex items-center gap-[10px] rounded-full border border-solid border-white pl-[20px] pr-[16px] py-[10px] font-sans text-[16px] font-normal text-white no-underline transition-all duration-300 hover:bg-white/10">
							<?php echo esc_html($home_cta['secondary']['label']); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA Section -->
	<!-- Faq Section -->
	<section
		id="reacon-faq-section"
		class="w-full bg-white py-[72px] sm:py-[96px] lg:py-16"
		aria-labelledby="reacon-faq-heading">
		<div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
			<!-- Header -->
			<div class="flex flex-col gap-[24px] lg:flex-row lg:items-end lg:justify-between">
				<div class="flex flex-col gap-[24px]">
					<h2
						id="reacon-faq-heading"
						class="text-[28px] font-semibold leading-[1.32] text-black sm:text-[36px] lg:text-[44px]"
						style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
						Frequently Asked Questions
					</h2>
					<p
						class="max-w-[1177px] text-[15px] leading-[1.42] text-black sm:text-[16px]">
						Find quick answers to how Reacon works, what we deliver, and how we
						support brands across print, production, and data-driven automation.
					</p>
				</div>
			</div>

			<!-- FAQ items -->
			<div
				class="mt-[40px] flex flex-col gap-[12px] sm:mt-[48px] lg:mt-[56px]"
				aria-label="Frequently asked questions list">
				<!-- Item 1 (open) -->
				<details
					open
					class="transition-colors duration-300 rounded-[16px] bg-[#F9FAFB] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
						<span
							class="text-[18px] font-medium leading-[1.32] text-[#383B43] sm:text-[20px]"
							style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							What services does Reacon provide?
						</span>
						<span class="text-[20px] leading-none text-[#383B43] select-none" aria-hidden="true">
							−
						</span>
					</summary>
					<p class="mt-[14px] text-[15px] leading-[1.42] text-[#666666] sm:mt-[20px] sm:text-[16px]">
						Reacon delivers end-to-end brand execution including content design,
						printing, packaging, warehousing, fulfilment, logistics, and
						data-driven communication systems.
					</p>
				</details>

				<!-- Item 2 -->
				<details
					class="transition-colors duration-300 rounded-[16px] border border-[#E7E7E7] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
						<span
							class="text-[18px] font-medium leading-[1.32] text-[#383B43] sm:text-[20px]"
							style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							Does Reacon offer project management solutions?
						</span>
						<span class="text-[20px] leading-none text-[#383B43] select-none" aria-hidden="true">
							+
						</span>
					</summary>
					<p class="mt-[14px] text-[15px] leading-[1.42] text-[#666666] sm:mt-[20px] sm:text-[16px]">
						Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.
					</p>
				</details>

				<!-- Item 3 -->
				<details
					class="transition-colors duration-300 rounded-[16px] border border-[#E7E7E7] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
						<span
							class="text-[18px] font-medium leading-[1.32] text-[#383B43] sm:text-[20px]"
							style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							What digital marketing strategies do you specialize in?
						</span>
						<span class="text-[20px] leading-none text-[#383B43] select-none" aria-hidden="true">
							+
						</span>
					</summary>
					<p class="mt-[14px] text-[15px] leading-[1.42] text-[#666666] sm:mt-[20px] sm:text-[16px]">
						Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand's reach and return on investment.
					</p>
				</details>

				<!-- Item 4 -->
				<details
					class="transition-colors duration-300 rounded-[16px] border border-[#E7E7E7] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
						<span
							class="text-[18px] font-medium leading-[1.32] text-[#383B43] sm:text-[20px]"
							style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							Do you offer innovative solutions in software development?
						</span>
						<span class="text-[20px] leading-none text-[#383B43] select-none" aria-hidden="true">
							+
						</span>
					</summary>
					<p class="mt-[14px] text-[15px] leading-[1.42] text-[#666666] sm:mt-[20px] sm:text-[16px]">
						Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.
					</p>
				</details>

				<!-- Item 5 -->
				<details
					class="transition-colors duration-300 rounded-[16px] border border-[#E7E7E7] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
						<span
							class="text-[18px] font-medium leading-[1.32] text-[#383B43] sm:text-[20px]"
							style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							How does Reacon approach sustainable product design?
						</span>
						<span class="text-[20px] leading-none text-[#383B43] select-none" aria-hidden="true">
							+
						</span>
					</summary>
					<p class="mt-[14px] text-[15px] leading-[1.42] text-[#666666] sm:mt-[20px] sm:text-[16px]">
						We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.
					</p>
				</details>

				<!-- CTA card -->
				<div
					class="mt-[4px] rounded-[16px] bg-[#E9FBFC] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
					<div class="flex flex-col gap-[8px]">
						<p class="text-[15px] font-medium leading-[1.42] text-[#383B43] sm:text-[16px]">
							Have additional questions about Reacon Group?
						</p>
						<p class="text-[15px] leading-[1.42] text-[#666666] sm:text-[16px]">
							Our Australian-based customer experience team has licensed
							specialists standing by to help.
						</p>
					</div>
					<div
						class="my-[16px] h-px w-full bg-[#ECEFF2] sm:my-[20px]"
						aria-hidden="true"></div>
					<a
						href="#"
						class="flex w-full items-center justify-between gap-4 text-[15px] font-medium leading-[1.42] text-[#0A969B] hover:text-black transition-colors duration-300 sm:text-[16px]">
						<span>Contact our Lead Team</span>
						<i class="ph ph-arrow-right"></i>
					</a>
				</div>
			</div>
		</div>
	</section>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const faqSection = document.getElementById('reacon-faq-section');
			if (!faqSection) return;

			const items = faqSection.querySelectorAll('details');

			items.forEach((details) => {
				const summary = details.querySelector('summary');

				summary.addEventListener('click', (e) => {
					e.preventDefault();

					// Lock to prevent glitching if user spam-clicks
					if (details.dataset.isAnimating === 'true') return;

					if (details.hasAttribute('open')) {
						closeItem(details);
					} else {
						// Auto-close other open items safely
						items.forEach((other) => {
							if (other !== details && other.hasAttribute('open')) {
								closeItem(other);
							}
						});
						openItem(details);
					}
				});
			});

			function openItem(el) {
				el.dataset.isAnimating = 'true';
				const icon = el.querySelector('summary span:last-child');

				// Update Styles for "Active" state
				el.classList.add('bg-[#F9FAFB]');
				el.classList.remove('border', 'border-[#E7E7E7]');
				icon.textContent = '−';

				// Measure current (closed) height
				const startHeight = el.offsetHeight;

				// Force open to measure full content height
				el.setAttribute('open', 'true');
				const endHeight = el.offsetHeight;

				el.style.overflow = 'hidden';

				// Web Animations API
				const anim = el.animate([{
						height: `${startHeight}px`
					},
					{
						height: `${endHeight}px`
					}
				], {
					duration: 300,
					easing: 'ease-in-out'
				});

				anim.onfinish = () => {
					el.style.height = ''; // Clean up inline styles
					el.style.overflow = '';
					el.dataset.isAnimating = 'false';
				};
			}

			function closeItem(el) {
				el.dataset.isAnimating = 'true';
				const icon = el.querySelector('summary span:last-child');

				// Measure current (open) height
				const startHeight = el.offsetHeight;

				// Temporarily close it to measure closed height without guessing paddings
				el.removeAttribute('open');
				const endHeight = el.offsetHeight;

				// Re-open it to play the shrinking animation smoothly
				el.setAttribute('open', 'true');
				el.style.overflow = 'hidden';

				const anim = el.animate([{
						height: `${startHeight}px`
					},
					{
						height: `${endHeight}px`
					}
				], {
					duration: 300,
					easing: 'ease-in-out'
				});

				anim.onfinish = () => {
					el.removeAttribute('open');

					// Revert Styles to "Inactive" state
					el.classList.remove('bg-[#F9FAFB]');
					el.classList.add('border', 'border-[#E7E7E7]');
					icon.textContent = '+';

					el.style.height = ''; // Clean up inline styles
					el.style.overflow = '';
					el.dataset.isAnimating = 'false';
				};
			}
		});
	</script>
	<!--End Faq Section -->
	<?php

	/**
	 * ── ADDITIONAL SECTIONS ───────────────────────────────
	 * Uncomment and add more sections as they are built.
	 */
	?>

</main><!-- #primary -->

<?php
get_footer();
