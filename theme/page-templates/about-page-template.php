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


	<section
		id="about-overview"
		class="bg-[#f5f5f5] py-14 sm:py-16 lg:py-20"
		aria-label="<?php esc_attr_e('About Reacon Group overview', 'reacon-group'); ?>">
		<div class="mx-auto grid w-full max-w-[1220px] grid-cols-1 gap-8 px-5 sm:px-6 lg:grid-cols-[220px_1fr] lg:gap-10 lg:px-10">
			<div class="pt-1">
				<p class="font-sans text-[11px] font-medium uppercase tracking-[0.14em] text-muted-foreground">
					<?php esc_html_e('About Reacon Group', 'reacon-group'); ?>
				</p>
			</div>

			<div>
				<p class="max-w-4xl font-sans text-[24px] font-medium leading-[1.22] text-foreground sm:text-[28px] lg:text-[32px]">
					<?php esc_html_e('We are dedicated to helping brands create, produce, and deliver with confidence. From content and design to industrial print, custom packaging, and nationwide fulfillment, our integrated ecosystem empowers businesses to streamline operations, reduce costs, and achieve consistent, high-quality outcomes.', 'reacon-group'); ?>
				</p>

				<div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-7 border-t border-black/8 pt-7 sm:mt-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-8 lg:pt-8">
					<div>
						<p class="max-w-[180px] font-sans text-[12px] leading-[1.35] text-muted-foreground">
							<?php esc_html_e('Customer satisfaction rate, proving our reliability', 'reacon-group'); ?>
						</p>
						<p class="mt-2 font-sans text-[44px] font-medium leading-none text-foreground">
							<?php esc_html_e('95%', 'reacon-group'); ?>
						</p>
					</div>

					<div>
						<p class="max-w-[180px] font-sans text-[12px] leading-[1.35] text-muted-foreground">
							<?php esc_html_e('Years of production & creative innovation', 'reacon-group'); ?>
						</p>
						<p class="mt-2 font-sans text-[44px] font-medium leading-none text-foreground">
							<?php esc_html_e('10+', 'reacon-group'); ?>
						</p>
					</div>

					<div>
						<p class="max-w-[180px] font-sans text-[12px] leading-[1.35] text-muted-foreground">
							<?php esc_html_e('Annual print & packaging output value', 'reacon-group'); ?>
						</p>
						<p class="mt-2 font-sans text-[44px] font-medium leading-none text-foreground">
							<?php esc_html_e('$50M+', 'reacon-group'); ?>
						</p>
					</div>

					<div>
						<p class="max-w-[180px] font-sans text-[12px] leading-[1.35] text-muted-foreground">
							<?php esc_html_e('Brands supported across Australia & beyond', 'reacon-group'); ?>
						</p>
						<p class="mt-2 font-sans text-[44px] font-medium leading-none text-foreground">
							<?php esc_html_e('200+', 'reacon-group'); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php

	/**
	 * ── PARTNERS SECTION ──────────────────────────────────────
	 * Display partner logos in an infinite scrolling carousel.
	 */
	get_template_part('template-parts/about/section', 'partners');
	?>
	<!-- Ecosystem Section -->
	<?php
	$ecosystem_assets_uri = get_template_directory_uri() . '/public/about';
	$ecosystem_cards = array(
		array(
			'name' => __('Cups Galore', 'reacon-group'),
			'description' => __('Cups Galore is an Australian manufacturer that creates high-quality, custom-printed paper cups for businesses, cafes, and events.', 'reacon-group'),
			'logo' => $ecosystem_assets_uri . '/ecosystem-cupsgalore-logo.png',
			'logo_alt' => __('Cups Galore logo', 'reacon-group'),
			'url' => '#',
			'type' => 'image',
		),
		array(
			'name' => __('Digital Press', 'reacon-group'),
			'description' => __('Provides various printing services, including marketing materials, stationery, books, catalogues, signage, and design services.', 'reacon-group'),
			'logo' => $ecosystem_assets_uri . '/ecosystem-digitalpress-logo.png',
			'logo_alt' => __('Digital Press logo', 'reacon-group'),
			'url' => '#',
			'type' => 'image',
		),
		array(
			'name' => __('Westman Printing', 'reacon-group'),
			'description' => __('Westman Printing offers the services of an experienced in-house design team, equipped with the latest design technology and creativity.', 'reacon-group'),
			'logo' => '',
			'logo_alt' => __('Westman Printing logo', 'reacon-group'),
			'url' => '#',
			'type' => 'westman',
		),
		array(
			'name' => __('Horizon Print Management', 'reacon-group'),
			'description' => __('This includes printing business and marketing materials, alongside managing integrated marketing campaigns across various platforms.', 'reacon-group'),
			'logo' => $ecosystem_assets_uri . '/horizon.png',
			'logo_alt' => __('Horizon logo', 'reacon-group'),
			'url' => '#',
			'type' => 'image',
		),
	);
	?>
	<section id="reacon-ecosystem-section" class="pb-12 pt-14 sm:pb-14 sm:pt-16 md:pb-16 md:pt-20 lg:pb-20 lg:pt-24 xl:pb-[120px] xl:pt-[160px]">
		<div class="mx-auto w-full max-w-[1370px] px-4 sm:px-6 md:px-8 xl:px-0">
			<div class="mx-auto w-full max-w-[820px] text-center">
				<p class="font-sans text-[13px] uppercase tracking-[0.08em] text-muted-foreground sm:text-sm md:text-base">
					<?php esc_html_e('Our Ecosystem', 'reacon-group'); ?>
				</p>
				<h2 class="mt-2 font-display text-[34px] font-semibold leading-[1.15] text-foreground sm:text-[40px] md:text-[44px] lg:text-[52px] xl:text-[56px]">
					<?php esc_html_e('A unified ecosystem powering creation, production, and delivery', 'reacon-group'); ?>
				</h2>
				<p class="mt-3 font-sans text-[15px] leading-[1.42] text-muted-foreground sm:text-base md:mt-4">
					<?php esc_html_e('Our family of specialized brands works together under one integrated system - combining creativity, manufacturing, automation, and fulfillment to deliver consistent quality from concept to distribution.', 'reacon-group'); ?>
				</p>
			</div>

			<div class="mt-8 grid grid-cols-1 gap-4 sm:mt-10 sm:grid-cols-2 sm:gap-5 lg:mt-12 lg:grid-cols-4 lg:gap-8">
				<?php foreach ($ecosystem_cards as $card): ?>
					<article class="flex min-h-[240px] flex-col justify-between rounded-[20px] border border-[#f3f4f6] bg-[#f6f6f6] p-5 sm:p-6">
						<div>
							<div class="mb-3 flex h-[32px] items-center justify-end">
								<?php if ('westman' === $card['type']): ?>
									<div class="relative h-10 w-auto" aria-label="<?php echo esc_attr($card['logo_alt']); ?>">

										<img src="<?php echo esc_url($ecosystem_assets_uri . '/westman.png'); ?>" alt="" aria-hidden="true" class="h-12 w-[55px]" />
									</div>
								<?php else: ?>
									<img src="<?php echo esc_url($card['logo']); ?>" alt="<?php echo esc_attr($card['logo_alt']); ?>" class="h-[32px] w-auto object-contain" loading="lazy" decoding="async" />
								<?php endif; ?>
							</div>
							<h3 class="font-display text-[28px] font-semibold leading-[1.2] text-foreground sm:text-[24px]">
								<?php echo esc_html($card['name']); ?>
							</h3>
							<p class="mt-2 font-sans text-[14px] leading-[1.42] text-muted-foreground">
								<?php echo esc_html($card['description']); ?>
							</p>
						</div>
						<a href="<?php echo esc_url($card['url']); ?>" class="mt-5 inline-flex items-center gap-1.5 font-sans text-sm text-[#1e293b] no-underline">
							<span><?php esc_html_e('Explore Site', 'reacon-group'); ?></span>
							<img src="<?php echo esc_url($ecosystem_assets_uri . '/ecosystem-arrow-right.svg'); ?>" alt="" aria-hidden="true" class="h-3 w-3" />
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- End Ecosystem Section -->
	<!-- What we do section -->
	<?php
	$about_assets_uri = get_template_directory_uri() . '/public/about';
	$what_we_do_cards = array(
		array(
			'title' => __('Creative & Content Studio', 'reacon-group'),
			'subtitle' => __('Visual storytelling made for scale', 'reacon-group'),
			'body' => __('Brand design, photography, CGI, video, and campaign content crafted for consistency and impact across touchpoints.', 'reacon-group'),
			'highlight' => false,
		),
		array(
			'title' => __('Print & Packaging Manufacturing', 'reacon-group'),
			'subtitle' => __('Industrial-grade production', 'reacon-group'),
			'body' => __('Digital, offset, and large-format printing, custom packaging, labeling, and structural fabrication engineered for precision and volume.', 'reacon-group'),
			'highlight' => true,
		),
		array(
			'title' => __('Automation & Technology', 'reacon-group'),
			'subtitle' => __('Smarter workflows, faster operations', 'reacon-group'),
			'body' => __('Order management, job tracking, workflow automation, and data-driven systems that simplify processes and reduce operational friction.', 'reacon-group'),
			'highlight' => true,
		),
		array(
			'title' => __('Fulfillment & Distribution', 'reacon-group'),
			'subtitle' => __('End-to-end logistics you can rely on', 'reacon-group'),
			'body' => __('Warehouse storage, inventory management, kitting, pick-pack, and nationwide distribution with real-time delivery visibility.', 'reacon-group'),
			'highlight' => false,
		),
	);
	?>
	<section id="reacon-what-we-do-section" class="bg-[#f5f5f5] py-12 sm:py-14 md:py-16 lg:py-20 xl:py-[120px]">
		<div class="mx-auto grid w-full max-w-[1370px] grid-cols-1 gap-8 px-4 sm:px-6 md:gap-10 lg:grid-cols-[minmax(0,720px)_minmax(0,620px)] lg:items-stretch lg:gap-[30px] lg:px-8 xl:px-0">
			<div class="flex flex-col gap-6 md:gap-8">
				<div class="w-full max-w-[720px]">
					<p class="font-sans text-[13px] uppercase tracking-[0.08em] text-muted-foreground sm:text-sm md:text-base">
						<?php esc_html_e('What We Do', 'reacon-group'); ?>
					</p>
					<h2 class="mt-2 font-display text-[36px] font-semibold leading-[1.15] text-foreground sm:text-[40px] md:text-[44px] lg:text-[56px] xl:text-[60px]">
						<?php esc_html_e('Integrated solutions built to create, produce, and deliver at scale', 'reacon-group'); ?>
					</h2>
					<p class="mt-3 max-w-[720px] font-sans text-[15px] leading-[1.42] text-muted-foreground sm:text-base md:mt-4">
						<?php esc_html_e('Reacon Group brings together creative, manufacturing, technology, and fulfillment capabilities - allowing brands to operate with speed, consistency, and efficiency across every stage of their workflow.', 'reacon-group'); ?>
					</p>
				</div>

				<div class="grid grid-cols-1 border border-[#eceff2] sm:grid-cols-2">
					<?php foreach ($what_we_do_cards as $index => $card): ?>
						<?php
						$is_top_row = $index < 2;
						$is_left_col = 0 === $index % 2;
						$cell_border = $is_top_row ? 'border-b border-[#eceff2]' : '';
						if ($is_left_col) {
							$cell_border .= ' sm:border-r sm:border-[#eceff2]';
						}
						?>
						<article class="flex gap-2 p-4 sm:p-5 md:p-6 <?php echo esc_attr(trim($cell_border)); ?> <?php echo $card['highlight'] ? 'bg-[rgba(233,251,252,0.5)]' : 'bg-transparent'; ?>">
							<div class="pt-1.5 text-primary">
								<i class="ph-fill ph-check-circle text-[18px] leading-none" aria-hidden="true"></i>
							</div>
							<div class="min-w-0">
								<h3 class="font-display text-[24px] font-semibold leading-[1.2] text-foreground sm:text-xl md:text-2xl">
									<?php echo esc_html($card['title']); ?>
								</h3>
								<p class="mt-2 font-sans text-[15px] font-medium leading-[1.42] text-foreground sm:text-base">
									<?php echo esc_html($card['subtitle']); ?>
								</p>
								<p class="mt-1 font-sans text-[15px] leading-[1.42] text-muted-foreground sm:text-base">
									<?php echo esc_html($card['body']); ?>
								</p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="relative h-[440px] overflow-hidden rounded-3xl sm:h-[560px] md:h-[640px] lg:h-auto lg:min-h-[774px]">
				<img
					src="<?php echo esc_url($about_assets_uri . '/what-we-do-image.png'); ?>"
					alt="<?php esc_attr_e('Integrated solutions workflow', 'reacon-group'); ?>"
					class="h-full w-full object-cover"
					loading="lazy"
					decoding="async" />
			</div>
		</div>
	</section>
	<!-- End What we do section -->

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

	<!-- CTA SECTION START -->
	<?php
	$about_cta = array(
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
			<div class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]" style="background: linear-gradient(179deg, #062b2d 0%, #1ECAD3 100%);">
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
				<div class="pointer-events-none absolute inset-0 z-[2] bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
				<div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center justify-center text-center">
					<h2 id="home-cta-heading" class="font-display text-[34px] font-bold leading-[1.08] text-white sm:text-[46px] lg:text-[56px]">
						<?php echo esc_html($about_cta['heading']); ?>
					</h2>
					<p class="mx-auto mt-4 font-sans text-[14px] leading-[1.4] text-white/90 sm:text-[16px]">
						<?php echo esc_html($about_cta['description']); ?>
					</p>
					<div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-[10px]">
						<a href="<?php echo esc_url($about_cta['primary']['url']); ?>" class="inline-flex items-center gap-[10px] rounded-full bg-white py-[4px] pl-[20px] pr-[4px] font-sans text-[16px] font-medium text-primary no-underline transition-all duration-300 hover:bg-white/90">
							<span><?php echo esc_html($about_cta['primary']['label']); ?></span>
							<span class="flex h-[42px] w-[42px] items-center justify-center rounded-full bg-secondary/15">
								<i class="ph ph-arrow-up-right text-base text-primary" aria-hidden="true"></i>
							</span>
						</a>
						<a href="<?php echo esc_url($about_cta['secondary']['url']); ?>" class="inline-flex items-center gap-[10px] rounded-full border border-solid border-white pl-[20px] pr-[16px] py-[4px] font-sans text-[16px] font-normal text-white no-underline transition-all duration-300 hover:bg-white/10">
							<?php echo esc_html($about_cta['secondary']['label']); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End CTA SECTION -->

	<?php

	/**
	 * ── FAQ SECTION ──────────────────────────────────────
	 * Display FAQs.
	 */
	get_template_part('template-parts/components/component', 'faq');
	?>
</main>

<?php
get_footer();
