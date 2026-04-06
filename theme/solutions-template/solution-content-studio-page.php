<?php

/**
 * Template Name: Solution — Content Studio
 * Template Post Type: page, solution
 *
 * Placeholder layout for Content Studio solution pages. Assign this template in
 * Page Attributes (or the template panel on your `solution` CPT). If the CPT slug
 * registered by your plugin is not `solution`, update `Template Post Type` below.
 *
 * @package reacon-group
 */
get_header();

$solution_hero_bg = get_template_directory_uri() . '/public/solutions/hero-content-studio-subtract.png';
?>

<main id="primary" class="overflow-x-hidden bg-background" role="main">
	<?php

	$hero_lead = __("Reacon's Content Studio crafts high-impact content across digital, social, and physical channels. From design to video and 3D assets, we bring brand stories to life with speed and precision.", 'reacon-group');
	if (has_excerpt()) {
		$hero_lead = wp_strip_all_tags(get_the_excerpt());
	}
	?>
	<!-- Page Header -->
	<section
		id="solution-hero"
		class="relative w-full p-4 sm:p-5 lg:p-6"
		aria-label="<?php esc_attr_e('Solution header', 'reacon-group'); ?>">
		<div class="relative flex  w-full flex-col overflow-hidden rounded-[31px] bg-foreground">
			<img
				src="<?php echo esc_url($solution_hero_bg); ?>"
				alt=""
				aria-hidden="true"
				class="absolute inset-0 h-full w-full object-cover object-center"
				loading="eager"
				decoding="async"
				fetchpriority="high" />
			<!-- Dark overlay to keep typography readable over the image -->
			<div
				class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,0,0,0.55)_0%,rgba(0,0,0,0.25)_55%,rgba(0,0,0,0.55)_100%)]"
				aria-hidden="true"></div>

			<div class="relative z-10 mx-auto flex w-full flex-1 flex-col items-center justify-center px-5 py-24 text-center sm:px-6 lg:px-10">
				<div class="flex max-w-[900px] flex-col items-center">
					<p class="w-full font-sans text-[14px] font-normal leading-[22.72px] text-white/80 sm:text-[16px]">
						<?php esc_html_e('Solutionss', 'reacon-group'); ?>
					</p>

					<h1 class="mt-3 font-display text-[40px] font-semibold leading-tight text-white sm:text-[48px] lg:text-[56px]">
						<?php the_title(); ?>
					</h1>

					<p class="mt-5 max-w-[820px] font-sans text-[16px] leading-[22.72px] text-white/80">
						<?php echo esc_html($hero_lead); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Page Header -->
	<?php
	$reacon_solution_highlights = array(
		'heading' => __('Scalable Creative Solutions for Every Channel', 'reacon-group'),
		'intro' => __("Populus, Reacon's agile content studio, creates scalable, campaign-ready content across digital, social, and physical channels—transforming master creative into on-brand assets quickly and efficiently across formats, languages, and platforms.", 'reacon-group'),
		'body' => __("We work as an extension of your team—flexibly, efficiently, and creatively. From art directors and designers to animators, photographers, and videographers, our multidisciplinary experts can embed directly within your workflows or operate as a fully managed service. This integrated approach ensures faster turnaround, consistent execution, and the ability to adapt creative seamlessly across touchpoints—from social posts and landing pages to video ads, POS displays, and beyond. With Populus, you get more than a studio—you get a strategic content partner built for today's omnichannel marketing landscape.", 'reacon-group'),
		'delivered_label' => __('Delivered by:', 'reacon-group'),
		'logo_src' => get_template_directory_uri() . '/public/solutions/populus-delivered-by-logo.svg',
		'logo_alt' => __('Populus — Reacon Group content studio', 'reacon-group'),
		'video_rel_path' => '/public/solutions/cs1.mp4',
		'video_poster_rel' => '/public/solutions/content-studio-highlight-poster.jpg',
		'poster_alt' => __('Content studio highlight frame', 'reacon-group'),
	);

	$theme_dir = get_template_directory();
	$highlight_video_path = $theme_dir . $reacon_solution_highlights['video_rel_path'];
	$highlight_poster_path = $theme_dir . $reacon_solution_highlights['video_poster_rel'];
	$has_highlight_video = is_readable($highlight_video_path);
	$highlight_video_url = get_template_directory_uri() . $reacon_solution_highlights['video_rel_path'];
	$highlight_poster_url = get_template_directory_uri() . $reacon_solution_highlights['video_poster_rel'];
	$has_highlight_poster = is_readable($highlight_poster_path);
	$highlight_video_label = __('Content studio showreel video', 'reacon-group');
	?>

	<!-- Highlights Section: scalable solutions intro, media, extended copy (Figma 570:4906). -->
	<section
		id="solution-highlights"
		class="bg-background"
		aria-labelledby="solution-highlights-heading">
		<div class="mx-auto flex w-full max-w-[1200px] flex-col gap-12 px-5 py-16 sm:gap-14 sm:px-6 sm:py-20 md:gap-16 md:py-24 lg:gap-[60px] lg:px-10 lg:py-[120px] xl:max-w-[1370px]">
			<div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between lg:gap-12">
				<h2 id="solution-highlights-heading" class="max-w-[720px] font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[40px] sm:leading-[1.15] md:text-[48px] md:leading-[1.2] lg:text-[56px] lg:leading-[73.92px]">
					<?php echo esc_html($reacon_solution_highlights['heading']); ?>
				</h2>
				<p class="max-w-[520px] font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px] lg:shrink-0 lg:pt-1">
					<?php echo esc_html($reacon_solution_highlights['intro']); ?>
				</p>
			</div>

			<figure class="relative m-0 aspect-[1370/620] w-full overflow-hidden rounded-[20px] bg-[#1c1c1c] sm:rounded-[22px] lg:rounded-[24px]">
				<?php if ($has_highlight_video): ?>
					<video
						class="absolute inset-0 h-full w-full object-cover"
						<?php
						if ($has_highlight_poster):
						?>
						poster="<?php echo esc_url($highlight_poster_url); ?>"
						<?php
						endif;
						?>
						autoplay

						controlsList="nodownload"
						loop
						muted
						playsinline
						aria-label="<?php echo esc_attr($highlight_video_label); ?>">
						<source src="<?php echo esc_url($highlight_video_url); ?>" type="video/mp4" />
					</video>
				<?php elseif ($has_highlight_poster): ?>
					<img
						src="<?php echo esc_url($highlight_poster_url); ?>"
						alt="<?php echo esc_attr($reacon_solution_highlights['poster_alt']); ?>"
						class="absolute inset-0 h-full w-full object-cover"
						loading="lazy"
						decoding="async" />
				<?php else: ?>
					<span class="sr-only"><?php echo esc_html($highlight_video_label); ?></span>
				<?php endif; ?>
			</figure>

			<div class="flex flex-col gap-3 sm:gap-3">
				<p class="font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
					<?php echo esc_html($reacon_solution_highlights['body']); ?>
				</p>
				<div class="flex flex-col gap-2">
					<p class="font-sans text-[15px] font-medium leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
						<?php echo esc_html($reacon_solution_highlights['delivered_label']); ?>
					</p>
					<div class="h-[52px] w-[160px] shrink-0 sm:h-[62px] sm:w-[179px]">
						<img
							src="<?php echo esc_url($reacon_solution_highlights['logo_src']); ?>"
							alt="<?php echo esc_attr($reacon_solution_highlights['logo_alt']); ?>"
							class="h-full w-full object-contain object-left"
							loading="lazy"
							decoding="async"
							width="179"
							height="62" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Highlights Section -->
	<!-- Creation Capabilities Section: 4 core creative capability cards (Figma 570:4968). -->
	<?php
	$reacon_solution_capabilities = array(
		array(
			'title' => __('Visual', 'reacon-group'),
			'paragraph' => __('Striking visual content designed to communicate clearly and perform consistently across every channel.', 'reacon-group'),
			'bullets' => array(
				__('Brand campaigns & key visuals', 'reacon-group'),
				__('Social, print & in-store assets', 'reacon-group'),
				__('Adaptation across formats and markets', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/capability-visual.png',
			'image_alt' => __('Visual capability', 'reacon-group'),
		),
		array(
			'title' => __('Video', 'reacon-group'),
			'paragraph' => __('Purpose-built video content created for scale-optimised for speed, clarity, and multi-channel delivery.', 'reacon-group'),
			'bullets' => array(
				__('Social, digital & in-store video', 'reacon-group'),
				__('Motion graphics & animation', 'reacon-group'),
				__('Localised and versioned content', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/capability-video.png',
			'image_alt' => __('Video capability', 'reacon-group'),
		),
		array(
			'title' => __('Digital', 'reacon-group'),
			'paragraph' => __('Digital-first creative built for performance across platforms, devices, and user journeys.', 'reacon-group'),
			'bullets' => array(
				__('Display, web & app creative', 'reacon-group'),
				__('UI assets & interactive content', 'reacon-group'),
				__('Channel-specific optimization', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/capability-digital.png',
			'image_alt' => __('Digital capability', 'reacon-group'),
		),
		array(
			'title' => __('Structure (3D)', 'reacon-group'),
			'paragraph' => __('Three-dimensional creative that brings brands to life in physical and experiential environments.', 'reacon-group'),
			'bullets' => array(
				__('3D renders & visualisation', 'reacon-group'),
				__('Retail, POS & activation builds', 'reacon-group'),
				__('Structural design for fabrication', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/capability-structure.png',
			'image_alt' => __('3D structure capability', 'reacon-group'),
		),
	);

	$tick_icon_src = get_template_directory_uri() . '/public/solutions/capability-tick.svg';
	?>

	<section
		id="solution-capabilities"
		class="bg-[#ECECEC] py-16 sm:py-20 lg:py-[120px]"
		aria-labelledby="solution-capabilities-heading">
		<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
			<div class="mx-auto text-center">
				<h2
					id="solution-capabilities-heading"
					class="font-display text-[36px] font-semibold leading-tight text-foreground sm:text-[44px] lg:text-[56px] lg:leading-[73.92px]">
					<?php esc_html_e('Our Core Creative Capabilities', 'reacon-group'); ?>
				</h2>
				<p class="mx-auto mt-5 max-w-[720px] font-sans text-[16px] leading-[22.72px] text-foreground/80">
					<?php esc_html_e('Expert content creation across visual, video, digital, and structural formats.', 'reacon-group'); ?>
				</p>
			</div>

			<div class="mt-14 grid grid-cols-1 gap-x-[24px] gap-y-[24px] sm:mt-16 sm:grid-cols-2">
				<?php foreach ($reacon_solution_capabilities as $card): ?>
					<article class="overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card">
						<div class="h-[260px] overflow-hidden rounded-t-[32px] rounded-b-[20px] bg-white">
							<img
								src="<?php echo esc_url($card['image']); ?>"
								alt="<?php echo esc_attr($card['image_alt']); ?>"
								loading="lazy"
								decoding="async"
								class="h-full w-full object-cover" />
						</div>

						<div class="px-[20px] pb-[20px] pt-[12px]">
							<h3 class="font-display text-[24px] font-semibold leading-[1.32] text-foreground sm:text-[28px] lg:text-[32px]">
								<?php echo esc_html($card['title']); ?>
							</h3>
							<p class="mt-2 font-sans text-[16px] leading-[22.72px] text-foreground/80">
								<?php echo esc_html($card['paragraph']); ?>
							</p>

							<div class="mt-5 space-y-1">
								<?php foreach ($card['bullets'] as $bullet): ?>
									<div class="flex items-start gap-3">
										<img
											src="<?php echo esc_url($tick_icon_src); ?>"
											alt=""
											aria-hidden="true"
											loading="lazy"
											decoding="async"
											class="mt-1 h-[16px] w-[16px] shrink-0" />
										<p class="font-sans text-[16px] leading-[22.72px] text-foreground">
											<?php echo esc_html($bullet); ?>
										</p>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- End Creation Capabilities Section -->

	<!-- Cta Section: strategic call-to-action banner (Figma 577:12234). -->
	<?php
	$solution_cta = array(
		'heading' => __('Print Smarter. Move Faster. Deliver Everywhere.', 'reacon-group'),
		'description' => __('Reacon connects creativity, automation, and logistics to help brands operate at global speed.', 'reacon-group'),
		'primary' => array(
			'label' => __('Contact Us', 'reacon-group'),
			'url' => home_url('/contact/'),
		),
		'secondary' => array(
			'label' => __('Talk to Our Team', 'reacon-group'),
			'url' => home_url('/contact/'),
		),
	);
	?>
	<section
		id="solution-cta"
		class="py-10 sm:py-12 lg:py-14"
		aria-labelledby="solution-cta-heading">
		<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
			<div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">
				<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0E6D77_0%,#0A4E57_100%)] opacity-75" aria-hidden="true"></div>
				<div
					class="pointer-events-none absolute left-16 top-0 h-[205px] w-[1566px]"
					aria-hidden="true">
					<svg viewBox="0 0 1566 205" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
						<path
							d="M278.503 205L1566 -538.596L-556 -586L278.503 205Z"
							fill="url(#solutionCtaShardLeftGradient)"
							fill-opacity="0.15" />
						<defs>
							<linearGradient id="solutionCtaShardLeftGradient" x1="504.197" y1="170.056" x2="505.001" y2="-586" gradientUnits="userSpaceOnUse">
								<stop stop-color="#1ECAD3" />
								<stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
							</linearGradient>
						</defs>
					</svg>
				</div>
				<div
					class="pointer-events-none absolute  right-[-955px] h-[791px] w-[2122px]"
					aria-hidden="true">
					<svg width="2122" height="791" viewBox="0 0 2122 791" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
						<path d="M1287.5 -60L0 683.596L2122 731L1287.5 -60Z" fill="url(#solutionCtaShardGradient)" fill-opacity="0.15" />
						<defs>
							<linearGradient id="solutionCtaShardGradient" x1="1061.8" y1="-25.0558" x2="1061" y2="731" gradientUnits="userSpaceOnUse">
								<stop stop-color="#1ECAD3" />
								<stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
							</linearGradient>
						</defs>
					</svg>
				</div>

				<div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
					<h2
						id="solution-cta-heading"
						class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
						<?php echo esc_html($solution_cta['heading']); ?>
					</h2>
					<p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
						<?php echo esc_html($solution_cta['description']); ?>
					</p>

					<div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
						<a
							href="<?php echo esc_url($solution_cta['primary']['url']); ?>"
							class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#0B6A74] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
							<span><?php echo esc_html($solution_cta['primary']['label']); ?></span>
							<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
								<i class="ph-bold ph-arrow-up-right text-[12px] text-[#0B6A74]"></i>
							</span>
						</a>
						<a
							href="<?php echo esc_url($solution_cta['secondary']['url']); ?>"
							class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
							<?php echo esc_html($solution_cta['secondary']['label']); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Cta Section -->

	<!-- Faq Section -->
	<section
		id="reacon-faq-section"
		class="w-full bg-white py-16"
		aria-labelledby="reacon-faq-heading"
		itemscope
		itemtype="https://schema.org/FAQPage"
		x-data="{ activeIndex: 0 }">

		<div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
			<!-- Header -->
			<div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
				<div class="flex flex-col gap-6">
					<h2
						id="reacon-faq-heading"
						class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
						Frequently Asked Questions
					</h2>
					<p class="max-w-4xl text-base leading-snug text-black">
						Find quick answers to how Reacon works, what we deliver, and how we
						support brands across print, production, and data-driven automation.
					</p>
				</div>
			</div>

			<!-- FAQ Items -->
			<div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="Frequently asked questions list">

				<!-- Item 1 -->
				<div
					class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
					:class="activeIndex === 0 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
					itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button
						type="button"
						@click="activeIndex = activeIndex === 0 ? null : 0"
						:aria-expanded="activeIndex === 0"
						aria-controls="faq-answer-0"
						class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
						<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
							What services does Reacon provide?
						</span>
						<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 0 ? '−' : '+'"></span>
					</button>
					<div
						id="faq-answer-0"
						x-show="activeIndex === 0"
						x-transition:enter="transition-all duration-300 ease-in-out"
						x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
						x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
						x-transition:leave="transition-all duration-250 ease-in-out"
						x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
						x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
						class="overflow-hidden"
						itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
							Reacon delivers end-to-end brand execution including content design,
							printing, packaging, warehousing, fulfilment, logistics, and
							data-driven communication systems.
						</p>
					</div>
				</div>

				<!-- Item 2 -->
				<div
					class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
					:class="activeIndex === 1 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
					itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button
						type="button"
						@click="activeIndex = activeIndex === 1 ? null : 1"
						:aria-expanded="activeIndex === 1"
						aria-controls="faq-answer-1"
						class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
						<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
							Does Reacon offer project management solutions?
						</span>
						<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 1 ? '−' : '+'"></span>
					</button>
					<div
						id="faq-answer-1"
						x-show="activeIndex === 1"
						x-transition:enter="transition-all duration-300 ease-in-out"
						x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
						x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
						x-transition:leave="transition-all duration-250 ease-in-out"
						x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
						x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
						class="overflow-hidden"
						itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
							Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.
						</p>
					</div>
				</div>

				<!-- Item 3 -->
				<div
					class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
					:class="activeIndex === 2 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
					itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button
						type="button"
						@click="activeIndex = activeIndex === 2 ? null : 2"
						:aria-expanded="activeIndex === 2"
						aria-controls="faq-answer-2"
						class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
						<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
							What digital marketing strategies do you specialize in?
						</span>
						<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 2 ? '−' : '+'"></span>
					</button>
					<div
						id="faq-answer-2"
						x-show="activeIndex === 2"
						x-transition:enter="transition-all duration-300 ease-in-out"
						x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
						x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
						x-transition:leave="transition-all duration-250 ease-in-out"
						x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
						x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
						class="overflow-hidden"
						itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
							Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand's reach and return on investment.
						</p>
					</div>
				</div>

				<!-- Item 4 -->
				<div
					class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
					:class="activeIndex === 3 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
					itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button
						type="button"
						@click="activeIndex = activeIndex === 3 ? null : 3"
						:aria-expanded="activeIndex === 3"
						aria-controls="faq-answer-3"
						class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
						<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
							Do you offer innovative solutions in software development?
						</span>
						<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 3 ? '−' : '+'"></span>
					</button>
					<div
						id="faq-answer-3"
						x-show="activeIndex === 3"
						x-transition:enter="transition-all duration-300 ease-in-out"
						x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
						x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
						x-transition:leave="transition-all duration-250 ease-in-out"
						x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
						x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
						class="overflow-hidden"
						itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
							Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.
						</p>
					</div>
				</div>

				<!-- Item 5 -->
				<div
					class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
					:class="activeIndex === 4 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
					itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button
						type="button"
						@click="activeIndex = activeIndex === 4 ? null : 4"
						:aria-expanded="activeIndex === 4"
						aria-controls="faq-answer-4"
						class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
						<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
							How does Reacon approach sustainable product design?
						</span>
						<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 4 ? '−' : '+'"></span>
					</button>
					<div
						id="faq-answer-4"
						x-show="activeIndex === 4"
						x-transition:enter="transition-all duration-300 ease-in-out"
						x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
						x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
						x-transition:leave="transition-all duration-250 ease-in-out"
						x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
						x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
						class="overflow-hidden"
						itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
							We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.
						</p>
					</div>
				</div>

				<!-- CTA card -->
				<div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
					<div class="flex flex-col gap-2">
						<p class="text-base font-medium leading-snug text-[#383B43]">
							Have additional questions about Reacon Group?
						</p>
						<p class="text-base leading-snug text-[#666666]">
							Our Australian-based customer experience team has licensed
							specialists standing by to help.
						</p>
					</div>
					<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
					<a
						href="#"
						class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
						<span>Contact our Lead Team</span>
						<!-- Added group-hover to animate the arrow dynamically on hover -->
						<i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
					</a>
				</div>

			</div>
		</div>
	</section>
	<!-- End Faq Section -->

	<!-- End Main Content -->
</main>

<?php
get_footer();
