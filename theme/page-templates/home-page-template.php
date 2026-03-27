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
	<?php get_template_part('template-parts/components/component-faq'); ?>
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
