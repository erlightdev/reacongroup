<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 * Author: Prakash Nayak
 * Author URI: https://prakashnayak.com.np/
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
	// Hero section data (single ACF read with safe defaults).
	$hero_image_webp = get_template_directory_uri() . '/public/image/hero-bg.webp';
	$hero_image_png = get_template_directory_uri() . '/public/image/hero-bg.png';
	$hero_video_mp4 = get_template_directory_uri() . '/public/home/hero-home.mp4';
	$stats_icon = get_template_directory_uri() . '/public/figma-assets/stats-icon.png';

	$hero_video_mp4_path = get_template_directory() . '/public/home/hero-home.mp4';

	$has_hero_mp4 = file_exists($hero_video_mp4_path);
	$has_hero_video = $has_hero_mp4;

	$home_hero = get_field('home_hero_section');
	$home_hero = is_array($home_hero) ? $home_hero : array();

	$hero_eyebrow = isset($home_hero['eyebrow']) ? (string) $home_hero['eyebrow'] : __('Powering how brands print, automate, and deliver worldwide.', 'reacon-group');
	$hero_heading = isset($home_hero['heading']) ? (string) $home_hero['heading'] : __('We Are Your Global Printing & Production Partner', 'reacon-group');
	$hero_description = isset($home_hero['description']) ? (string) $home_hero['description'] : __('From packaging to retail activations, we produce print at scale, on time, every time. With 30+ years of experience, Reacon delivers precision, consistency, and speed across 8 countries.', 'reacon-group');

	$hero_cta = isset($home_hero['cta']) && is_array($home_hero['cta']) ? $home_hero['cta'] : array();
	$hero_cta_label = isset($hero_cta['label']) ? (string) $hero_cta['label'] : __('Learn More About Us', 'reacon-group');
	$hero_cta_url = isset($hero_cta['url']) ? (string) $hero_cta['url'] : home_url('/about-us/');

	$hero_stat = isset($home_hero['stat']) && is_array($home_hero['stat']) ? $home_hero['stat'] : array();
	$hero_stat_value = isset($hero_stat['value']) ? (string) $hero_stat['value'] : '490,000+';
	$hero_stat_label = isset($hero_stat['label']) ? (string) $hero_stat['label'] : __('projects delivered globally', 'reacon-group');
	$hero_stat_description = isset($hero_stat['description']) ? (string) $hero_stat['description'] : __('Across 8 countries and counting powering consistent, high-quality brand execution for enterprises, institutions, and agencies worldwide.', 'reacon-group');
	?>

	<section
		id="hero"
		class="relative w-full p-1.5 md:p-2.5"
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

			<div class="relative z-10 mx-auto flex h-full w-full max-w-7xl flex-1 flex-col justify-end px-4 pb-0 pt-28 sm:px-6 sm:pt-32 lg:px-8 lg:pt-24">

				<div class="mb-10 flex w-full max-w-4xl flex-col items-start gap-6 lg:mb-[42px]">
					<div class="flex flex-col gap-3 text-white">
						<p class="font-sans text-base leading-[1.42]">
							<?php echo esc_html($hero_eyebrow); ?>
						</p>

						<h1 class="font-display text-3xl font-bold leading-[1.15] tracking-tight xs:text-[2.125rem] sm:text-[2.5rem] md:text-[3rem] lg:text-[3.75rem] lg:leading-[1.14] xl:text-[4rem] 2xl:text-[4.25rem]">
							<?php echo esc_html($hero_heading); ?>
						</h1>
					</div>

					<p class="max-w-3xl font-sans text-sm leading-[1.42] text-white/95 sm:text-base md:text-[1.0625rem]">
						<?php echo esc_html($hero_description); ?>
					</p>

					<a
						href="<?php echo esc_url($hero_cta_url); ?>"
						class="group inline-flex items-center gap-2.5 rounded-full bg-primary py-1 pl-5 pr-1 font-sans transition-all duration-300 hover:bg-secondary">
						<span class="text-base font-medium text-primary-foreground">
							<?php echo esc_html($hero_cta_label); ?>
						</span>
						<span class="flex h-[42px] w-[42px] shrink-0 items-center justify-center rounded-full bg-white/30 transition-transform duration-300 group-hover:rotate-45" aria-hidden="true">
							<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.16699 12.8333L12.8337 1.16666M12.8337 1.16666H3.49965M12.8337 1.16666V10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
					</a>
				</div>

				<div class="relative hidden w-full flex-col gap-3 rounded-t-[32px] bg-white p-6 sm:max-w-[320px] lg:absolute lg:bottom-0 lg:right-[42px] lg:flex lg:min-h-[287px]">
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
							<?php echo esc_html($hero_stat_value); ?>
						</p>
						<p class="font-sans text-base font-semibold leading-[1.42] text-foreground">
							<?php echo esc_html($hero_stat_label); ?>
						</p>
					</div>

					<div class="relative z-10 w-full">
						<p class="font-sans text-sm leading-[1.42] text-muted-foreground">
							<?php echo esc_html($hero_stat_description); ?>
						</p>
					</div>
				</div>

			</div>
		</div>
	</section>
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

	<section class="relative w-full overflow-hidden bg-white" aria-label="<?php esc_attr_e('Partners', 'reacon-group'); ?>">
		<div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-24 bg-gradient-to-r from-white via-white/90 to-transparent lg:w-32" aria-hidden="true"></div>
		<div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-24 bg-gradient-to-l from-white via-white/90 to-transparent lg:w-32" aria-hidden="true"></div>

		<div class="mx-auto flex min-h-[74px] w-full max-w-7xl items-center overflow-hidden px-4 sm:px-6 lg:px-8">
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
	</section>
	<!-- End Partners Section -->

	<!-- Brand Intro Section -->
	<?php
	// Brand intro section data (single ACF read with safe defaults).
	$brandintro_dir = get_template_directory_uri() . '/public/brandintro';
	$home_brand_intro = get_field('home_brand_intro_section');
	$home_brand_intro = is_array($home_brand_intro) ? $home_brand_intro : array();

	$brand_intro_heading = isset($home_brand_intro['heading']) ? (string) $home_brand_intro['heading'] : __('From design studios to data platforms and global print networks, Reacon turns creative concepts into physical, measurable results.', 'reacon-group');
	$brand_intro_heading_highlight = isset($home_brand_intro['heading_highlight']) ? (string) $home_brand_intro['heading_highlight'] : __('global print networks, Reacon', 'reacon-group');
	$brand_intro_description = isset($home_brand_intro['description']) ? (string) $home_brand_intro['description'] : __('Our teams manage everything - print, fulfilment, and digital automation - so you can focus on growth while we handle the execution.', 'reacon-group');

	$default_brand_cards = array(
		array(
			'title' => 'Cups Galore',
			'description' => 'Cups Galore is an Australian manufacturer that creates high-quality, custom-printed paper cups for businesses, cafes, and events.',
			'logo' => $brandintro_dir . '/cups-galore-logo.png',
			'logo_alt' => __('Cups Galore', 'reacon-group'),
			'logo_class' => 'h-full w-auto object-contain',
			'url' => '#',
		),
		array(
			'title' => 'Digital Press',
			'description' => 'Provides various printing services, including marketing materials, stationery, books, catalogues, signage, and design services.',
			'logo' => $brandintro_dir . '/digital-press-logo.png',
			'logo_alt' => __('Digital Press', 'reacon-group'),
			'logo_class' => 'h-[22px] w-auto object-contain',
			'url' => '#',
		),
		array(
			'title' => 'Westman Printing',
			'description' => 'Westman Printing offers experienced in-house design team services equipped with the latest design technology to turn any idea into a masterpiece.',
			'logo' => $brandintro_dir . '/westman.svg',
			'logo_alt' => __('Westman Printing', 'reacon-group'),
			'logo_class' => 'h-full w-auto object-contain',
			'url' => '#',
		),
		array(
			'title' => 'Horizon Print Management',
			'description' => 'Printing business and marketing materials, alongside managing integrated marketing campaigns across various platforms.',
			'logo' => $brandintro_dir . '/hirizon.png',
			'logo_alt' => __('Horizon Print Management', 'reacon-group'),
			'logo_class' => 'h-5 w-auto object-contain',
			'url' => '#',
		),
	);

	$brand_intro_cards = isset($home_brand_intro['cards']) && is_array($home_brand_intro['cards']) && !empty($home_brand_intro['cards']) ? $home_brand_intro['cards'] : $default_brand_cards;
	?>
	<section class="py-10 xs:py-10 sm:py-12 md:py-14 lg:py-16 xl:py-16 2xl:py-16" aria-labelledby="reacon-brand-intro-heading">
		<div class="mx-auto flex max-w-7xl flex-col items-center gap-10 px-4 sm:gap-12 sm:px-6 xl:gap-20 lg:px-8">
			<!-- Brand Intro Header -->
			<header class="flex max-w-5xl flex-col gap-4 text-center sm:gap-5">
				<h2 id="reacon-brand-intro-heading" class="font-display text-2xl font-medium leading-tight text-foreground sm:text-3xl md:text-[2.625rem] lg:text-[2.75rem] lg:leading-[1.32] xl:text-5xl">
					<?php
					$heading_full = $brand_intro_heading;
					$heading_highlight = $brand_intro_heading_highlight;
					if ($heading_highlight !== '' && strpos($heading_full, $heading_highlight) !== false) {
						$parts = explode($heading_highlight, $heading_full, 2);
						echo esc_html($parts[0]);
						echo '<span class="font-semibold text-primary">' . esc_html($heading_highlight) . '</span>';
						echo esc_html($parts[1]);
					} else {
						echo esc_html($heading_full);
					}
					?>
				</h2>
				<p class="mx-auto max-w-3xl font-sans text-sm leading-relaxed text-foreground sm:text-base md:text-[1.0625rem] lg:text-lg">
					<?php echo esc_html($brand_intro_description); ?>
				</p>
			</header>

			<!-- Brand Intro Cards -->
			<div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4 xl:gap-8">
				<?php foreach ($brand_intro_cards as $card): ?>
					<?php
					$card_title = isset($card['title']) ? trim((string) $card['title']) : '';
					$card_description = isset($card['description']) ? trim((string) $card['description']) : '';
					$card_logo = isset($card['logo']) ? trim((string) $card['logo']) : '';
					$card_logo_alt = isset($card['logo_alt']) ? (string) $card['logo_alt'] : $card_title;
					$card_logo_class = isset($card['logo_class']) ? (string) $card['logo_class'] : 'h-full w-auto object-contain';
					$card_url = isset($card['url']) ? (string) $card['url'] : '#';
					if ($card_title === '' || $card_description === '') {
						continue;
					}
					?>
					<article class="group flex h-full min-h-[240px] flex-col rounded-[20px] border border-border bg-muted p-5 transition-all duration-300 hover:border-primary hover:bg-white hover:shadow-sm sm:p-6">
						<div class="mb-6 flex flex-col gap-4">
							<div class="flex h-8 w-full items-center justify-end">
								<?php if ($card_logo !== ''): ?>
									<img src="<?php echo esc_url($card_logo); ?>" alt="<?php echo esc_attr($card_logo_alt); ?>" class="<?php echo esc_attr($card_logo_class); ?>" loading="lazy" decoding="async" />
								<?php endif; ?>
							</div>
							<div class="w-full">
								<h3 class="mb-1.5 font-display text-xl font-semibold text-foreground"><?php echo esc_html($card_title); ?></h3>
								<p class="line-clamp-3 font-sans text-sm leading-relaxed text-muted-foreground">
									<?php echo esc_html($card_description); ?>
								</p>
							</div>
						</div>
						<a href="<?php echo esc_url($card_url); ?>" class="mt-auto inline-flex w-max items-center gap-1.5 font-sans text-sm font-medium text-foreground no-underline transition-colors group-hover:text-primary">
							<?php esc_html_e('Explore Site', 'reacon-group'); ?>
							<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- End Brand Intro Section -->

	<!-- Content Section -->
	<?php
	// Content section data (single ACF read with safe defaults).
	$figma = get_template_directory_uri() . '/public/figma-assets';
	$home_content = get_field('home_content_section');
	$home_content = is_array($home_content) ? $home_content : array();

	$content_heading = isset($home_content['heading']) ? (string) $home_content['heading'] : __('Connecting Design, Data, and Delivery to Simplify How Brands Communicate at Scale', 'reacon-group');
	$content_description = isset($home_content['description']) ? (string) $home_content['description'] : __('Reacon combines creativity, automation, and logistics to help brands move seamlessly from concept to execution.', 'reacon-group');

	$default_rows = array(
		array(
			'eyebrow' => __('Content Studio', 'reacon-group'),
			'title_prefix' => __('Where', 'reacon-group'),
			'title_highlight' => __('Creative Ideas Become Brand Experiences', 'reacon-group'),
			'paragraph_1' => __("Reacon's Content Studio is the creative heart of the group. We design everything your audience sees - visuals, campaigns, videos, and immersive brand stories.", 'reacon-group'),
			'paragraph_2' => __('By blending design, storytelling, and technology, our studio ensures that every piece of content not only looks right but feels consistent across platforms, screens, and experiences.', 'reacon-group'),
			'items' => array(
				__('Brand design, campaign visuals, and video production', 'reacon-group'),
				__('Digital, print, and in-store content creation', 'reacon-group'),
				__('3D and experiential storytelling for activations', 'reacon-group'),
				__('Consistent brand expression across every channel', 'reacon-group'),
			),
			'button_label' => __('Explore Content Studio', 'reacon-group'),
			'button_url' => home_url('/solutions/'),
			'primary_image' => $figma . '/content-studio-bg.png',
			'primary_image_alt' => __('Content Studio', 'reacon-group'),
			'secondary_image' => $figma . '/content-studio-fg.png',
			'image_right' => true,
		),
		array(
			'eyebrow' => __('Data-Driven Innovation', 'reacon-group'),
			'title_prefix' => __('Turning Information into', 'reacon-group'),
			'title_highlight' => __('Intelligent Action', 'reacon-group'),
			'paragraph_1' => __("Reacon's Data-Driven Innovation division helps organisations digitise workflows, unify data, and automate personalised communication.", 'reacon-group'),
			'paragraph_2' => __('We transform paper-based and fragmented systems into connected digital pipelines that give businesses a single view of their customers - enabling faster decisions, better compliance, and more meaningful engagement.', 'reacon-group'),
			'items' => array(
				__('Digitisation of manual workflows and data sources', 'reacon-group'),
				__('Secure data collection and standardisation', 'reacon-group'),
				__('Automated, regulation-compliant communication systems', 'reacon-group'),
				__('Real-time visibility and analytics for business growth', 'reacon-group'),
			),
			'button_label' => __('Learn About Data-Driven Innovation', 'reacon-group'),
			'button_url' => home_url('/solutions/'),
			'primary_image' => $figma . '/data-driven-bg.png',
			'primary_image_alt' => __('Data-Driven Innovation', 'reacon-group'),
			'secondary_image' => $figma . '/data-driven-fg.png',
			'image_right' => false,
			'desktop_reverse' => true,
		),
		array(
			'eyebrow' => __('Production & Fulfilment', 'reacon-group'),
			'title_prefix' => __('Turning Vision into', 'reacon-group'),
			'title_highlight' => __('Tangible Impact', 'reacon-group'),
			'paragraph_1' => __('From packaging to retail activations, Reacon delivers all things print at scale. Our production and fulfilment network spans 8 countries, enabling consistent, high-quality execution on time, every time.', 'reacon-group'),
			'paragraph_2' => __('With 30+ years of experience, advanced print technologies, and national warehousing in NSW and QLD, we help brands produce, store, and deliver faster - without compromising on quality.', 'reacon-group'),
			'items' => array(
				__('Marketing, packaging, and merchandise printing', 'reacon-group'),
				__('National warehousing and inventory management', 'reacon-group'),
				__('Global print network across Asia and the Middle East', 'reacon-group'),
				__('Integrated logistics for speed and precision', 'reacon-group'),
			),
			'button_label' => __('Discover Production & Fulfilment', 'reacon-group'),
			'button_url' => home_url('/solutions/'),
			'primary_image' => $figma . '/production-bg.png',
			'primary_image_alt' => __('Production & Fulfilment', 'reacon-group'),
			'secondary_image' => $figma . '/production-fg.png',
			'image_right' => true,
		),
	);

	$content_rows = isset($home_content['rows']) && is_array($home_content['rows']) && count($home_content['rows']) >= 3 ? array_values($home_content['rows']) : $default_rows;
	?>
	<section class="py-12 xs:py-12 sm:py-16 md:py-16 lg:pt-12 lg:pb-16 xl:pb-20 2xl:pb-20" aria-labelledby="reacon-content-heading">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<!-- Content Section Header -->
			<header class="mb-16 text-center lg:mb-[72px]">
				<h2 id="reacon-content-heading" class="mx-auto mb-4 max-w-5xl font-display text-2xl font-semibold leading-tight text-foreground sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] lg:leading-[1.32] xl:text-5xl">
					<?php echo esc_html($content_heading); ?>
				</h2>
				<p class="mx-auto max-w-3xl font-sans text-sm leading-relaxed text-foreground sm:text-base lg:text-lg lg:leading-[1.42]">
					<?php echo esc_html($content_description); ?>
				</p>
			</header>

			<!-- Content Rows -->
			<?php foreach ($content_rows as $index => $row): ?>
				<?php
				$row_eyebrow = isset($row['eyebrow']) ? (string) $row['eyebrow'] : '';
				$row_title_prefix = isset($row['title_prefix']) ? (string) $row['title_prefix'] : '';
				$row_title_highlight = isset($row['title_highlight']) ? (string) $row['title_highlight'] : '';
				$row_p1 = isset($row['paragraph_1']) ? (string) $row['paragraph_1'] : '';
				$row_p2 = isset($row['paragraph_2']) ? (string) $row['paragraph_2'] : '';
				$row_items = isset($row['items']) && is_array($row['items']) ? $row['items'] : array();
				$row_btn_label = isset($row['button_label']) ? (string) $row['button_label'] : __('Explore Solution', 'reacon-group');
				$row_btn_url = isset($row['button_url']) ? (string) $row['button_url'] : home_url('/solutions/');
				$row_img_main = isset($row['primary_image']) ? (string) $row['primary_image'] : '';
				$row_img_main_alt = isset($row['primary_image_alt']) ? (string) $row['primary_image_alt'] : $row_eyebrow;
				$row_img_secondary = isset($row['secondary_image']) ? (string) $row['secondary_image'] : '';
				$row_image_right = isset($row['image_right']) ? (bool) $row['image_right'] : true;
				$row_desktop_reverse = isset($row['desktop_reverse']) ? (bool) $row['desktop_reverse'] : false;
				$desktop_direction_class = $row_desktop_reverse ? 'lg:flex-row-reverse' : 'lg:flex-row';
				$row_wrap_class = 'flex flex-col-reverse items-center justify-between gap-12 ' . $desktop_direction_class . ' lg:gap-16 xl:gap-20';
				$row_text_class = 'flex w-full max-w-full flex-1 flex-col justify-center lg:max-w-[500px] xl:max-w-[620px]';
				$row_image_class = $row_image_right ? 'relative ml-auto w-[85%] shrink-0 sm:w-[75%] lg:ml-0 lg:w-[450px] xl:w-[529px]' : 'relative mr-auto w-[85%] shrink-0 sm:w-[75%] lg:mr-0 lg:w-[450px] xl:w-[529px]';
				$row_secondary_pos = $row_image_right
					? 'absolute -bottom-8 -left-6 w-[55%] aspect-[295/227] overflow-hidden rounded-xl border-4 border-white shadow-xl sm:-left-12 lg:bottom-auto lg:-left-[80px] lg:top-[220px] lg:w-[240px] lg:rounded-3xl lg:border-[8px] xl:-left-[65px] xl:top-[280px] xl:w-[295px]'
					: 'absolute -bottom-8 -right-6 w-[55%] aspect-[295/227] overflow-hidden rounded-xl border-4 border-white shadow-xl sm:-right-12 lg:bottom-auto lg:-right-[80px] lg:top-[220px] lg:w-[240px] lg:rounded-3xl lg:border-[8px] xl:-right-[65px] xl:top-[280px] xl:w-[295px]';
				$row_margin_class = $index < 2 ? 'mb-24 lg:mb-[120px]' : '';
				?>
				<!-- Content Row -->
				<div class="<?php echo esc_attr(trim($row_wrap_class . ' ' . $row_margin_class)); ?>">
					<div class="<?php echo esc_attr($row_text_class); ?>">
						<div class="flex flex-col gap-4">
							<div class="flex flex-col gap-2 lg:gap-1">
								<div class="flex items-center gap-2">
									<span class="h-2 w-2 shrink-0 rounded-full bg-primary"></span>
									<span class="font-sans text-sm font-medium text-primary md:text-base"><?php echo esc_html($row_eyebrow); ?></span>
								</div>
								<h3 class="font-display text-2xl leading-tight text-foreground md:text-3xl lg:text-[32px] lg:leading-[1.32]">
									<?php echo esc_html($row_title_prefix); ?>
									<span class="bg-gradient-to-r from-primary to-secondary bg-clip-text font-semibold text-transparent"><?php echo esc_html($row_title_highlight); ?></span>
								</h3>
							</div>
							<div class="font-sans text-sm leading-relaxed text-foreground md:text-base lg:leading-[1.42]">
								<p class="mb-4"><?php echo esc_html($row_p1); ?></p>
								<p><?php echo esc_html($row_p2); ?></p>
							</div>
							<?php if (!empty($row_items)): ?>
								<div class="mt-2 flex flex-col gap-3">
									<?php foreach ($row_items as $item): ?>
										<div class="flex items-start gap-2.5 lg:items-center">
											<img src="<?php echo esc_url($figma . '/tick-circle-teal.svg'); ?>" alt="" class="mt-0.5 h-4 w-4 shrink-0 lg:mt-0" aria-hidden="true" />
											<span class="font-sans text-sm text-foreground md:text-base"><?php echo esc_html((string) $item); ?></span>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
						<a href="<?php echo esc_url($row_btn_url); ?>" class="mt-8 inline-flex w-fit items-center gap-2 rounded-full bg-primary py-2.5 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
							<?php echo esc_html($row_btn_label); ?>
							<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20" aria-hidden="true">
								<i class="ph-bold ph-arrow-up-right text-[11px]"></i>
							</span>
						</a>
					</div>

					<div class="<?php echo esc_attr($row_image_class); ?>">
						<div class="aspect-[529/474] w-full overflow-hidden rounded-2xl lg:rounded-3xl">
							<?php if ($row_img_main !== ''): ?>
								<img src="<?php echo esc_url($row_img_main); ?>" alt="<?php echo esc_attr($row_img_main_alt); ?>" class="h-full w-full object-cover" loading="lazy" decoding="async" />
							<?php endif; ?>
						</div>
						<?php if ($row_img_secondary !== ''): ?>
							<div class="<?php echo esc_attr($row_secondary_pos); ?>">
								<img src="<?php echo esc_url($row_img_secondary); ?>" alt="" class="h-full w-full object-cover" loading="lazy" decoding="async" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- End Content Section -->

	<!-- Industries Section -->
	<?php
	// Industries section data (single ACF read with safe defaults).
	$figma = get_template_directory_uri() . '/public/figma-assets';
	$home_industries = get_field('home_industries_section');
	$home_industries = is_array($home_industries) ? $home_industries : array();

	$industries_heading = isset($home_industries['heading']) ? (string) $home_industries['heading'] : __('Industries We Power', 'reacon-group');
	$industries_description = isset($home_industries['description']) ? (string) $home_industries['description'] : __('Reacon partners with businesses across diverse sectors - from retail and finance to government and healthcare - delivering consistent brand experiences through design, data, and production.', 'reacon-group');

	$default_industry_cards = array(
		array('title' => 'Banking & Finance', 'desc' => 'Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.', 'img' => $figma . '/industry-banking.png', 'alt' => 'Banking and Finance Industry', 'href' => '#', 'text_color' => 'text-white', 'overlay' => 'linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%)', 'img_class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105'),
		array('title' => 'Hospitality', 'desc' => 'Premium branding, signage, and guest materials that shape lasting experiences from check-in to checkout.', 'img' => $figma . '/industry-hospitality.png', 'alt' => 'Hospitality Industry', 'href' => '#', 'text_color' => 'text-foreground', 'overlay' => 'linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%)', 'img_class' => 'absolute bottom-0 left-0 h-[76%] w-full object-cover transition-transform duration-700 group-hover:scale-105'),
		array('title' => 'E-Commerce', 'desc' => 'Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.', 'img' => $figma . '/industry-ecommerce.png', 'alt' => 'E-Commerce Industry', 'href' => '#', 'text_color' => 'text-foreground', 'overlay' => 'linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%)', 'img_class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105'),
		array('title' => 'Health & Pharmaceuticals', 'desc' => 'Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.', 'img' => $figma . '/industry-health.png', 'alt' => 'Health and Pharmaceuticals Industry', 'href' => '#', 'text_color' => 'text-white', 'overlay' => 'linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.2) 100%), linear-gradient(180deg, #2c8d9d 6.79%, rgba(6,43,45,0.66) 39%, rgba(6,43,45,0.45) 46.5%, rgba(6,43,45,0) 56.4%)', 'img_class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105'),
		array('title' => 'Charities & Not-for-Profit', 'desc' => 'Impactful campaigns and cost-efficient production that help your message reach more supporters.', 'img' => $figma . '/industry-charities.png', 'alt' => 'Charities and Not-for-Profit Sector', 'href' => '#', 'text_color' => 'text-foreground', 'overlay' => 'linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%)', 'img_class' => 'absolute bottom-0 left-0 h-[77%] w-full object-cover transition-transform duration-700 group-hover:scale-105'),
		array('title' => 'Government', 'desc' => 'Impactful campaigns and cost-efficient production that help your message reach more supporters.', 'img' => $figma . '/industry-government.png', 'alt' => 'Government Sector', 'href' => '#', 'text_color' => 'text-white', 'overlay' => 'linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%)', 'img_class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105'),
	);

	$industry_cards = isset($home_industries['cards']) && is_array($home_industries['cards']) && count($home_industries['cards']) >= 6 ? array_values($home_industries['cards']) : $default_industry_cards;

	$render_industry_card = static function ($card, $is_tall = false) {
		$title = isset($card['title']) ? (string) $card['title'] : '';
		$desc = isset($card['desc']) ? (string) $card['desc'] : '';
		$img = isset($card['img']) ? (string) $card['img'] : '';
		$alt = isset($card['alt']) ? (string) $card['alt'] : $title;
		$href = isset($card['href']) ? (string) $card['href'] : '#';
		$text_color = isset($card['text_color']) ? (string) $card['text_color'] : 'text-white';
		$overlay = isset($card['overlay']) ? (string) $card['overlay'] : 'linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%)';
		$img_class = isset($card['img_class']) ? (string) $card['img_class'] : 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105';
		$height_class = $is_tall ? 'lg:h-[346px]' : 'lg:h-[420px]';
		?>
		<article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 <?php echo esc_attr($height_class); ?>">
			<?php if ($img !== ''): ?>
				<img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy" decoding="async" class="<?php echo esc_attr($img_class); ?>" />
			<?php endif; ?>
			<div class="absolute inset-0" style="background:<?php echo esc_attr($overlay); ?>;"></div>

			<div class="relative z-10 <?php echo esc_attr($text_color === 'text-foreground' ? 'text-white' : $text_color); ?>">
				<h3 class="mb-2 font-display text-xl font-semibold leading-tight sm:mb-3 sm:text-2xl lg:leading-[1.32]">
					<?php echo esc_html($title); ?>
				</h3>
				<p class="text-sm leading-relaxed sm:text-base lg:leading-[1.42]">
					<?php echo esc_html($desc); ?>
				</p>
			</div>

			<a href="<?php echo esc_url($href); ?>" class="relative z-10 mt-auto flex w-fit items-center gap-1.5 pt-6 text-sm font-medium <?php echo esc_attr($text_color); ?> transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8">
				<?php esc_html_e('Explore Site', 'reacon-group'); ?>
			</a>
		</article>
	<?php
	};
	?>
	<section class="py-12 xs:py-12 sm:py-12 md:py-12 lg:py-12 xl:py-16 2xl:py-16" aria-labelledby="reacon-industries-heading">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<!-- Industries Section Header -->
			<div class="mb-12 text-center md:mb-16 lg:mb-[72px]">
				<h2 id="reacon-industries-heading" class="mx-auto mb-4 max-w-4xl font-display text-3xl font-semibold leading-tight text-[#1e293b] sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] lg:leading-[1.32] xl:text-5xl">
					<?php echo esc_html($industries_heading); ?>
				</h2>
				<p class="mx-auto max-w-4xl text-base leading-relaxed text-[#383b43] sm:text-[1.0625rem] lg:text-lg lg:leading-[1.42]">
					<?php echo esc_html($industries_description); ?>
				</p>
			</div>

			<!-- Industries Mosaic Grid -->
			<div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-8">
				<div class="flex flex-col gap-6 lg:gap-[30px]">
					<?php $render_industry_card($industry_cards[0], true); ?>
					<div class="grid flex-1 grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-6">
						<?php $render_industry_card($industry_cards[1]); ?>
						<?php $render_industry_card($industry_cards[2]); ?>
					</div>
				</div>
				<div class="flex flex-col gap-6 lg:gap-8">
					<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8">
						<?php $render_industry_card($industry_cards[3]); ?>
						<?php $render_industry_card($industry_cards[4]); ?>
					</div>
					<?php $render_industry_card($industry_cards[5], true); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Industries Section -->

	<!-- Testimonials Section -->
	<?php
	// Testimonials section data (single ACF read with safe defaults).
	$about_assets_uri = get_template_directory_uri() . '/public/about';
	$home_testimonials = get_field('home_testimonials_section');
	$home_testimonials = is_array($home_testimonials) ? $home_testimonials : array();

	$testimonials_heading = isset($home_testimonials['heading']) ? (string) $home_testimonials['heading'] : __('What Our Partners Say About Us', 'reacon-group');
	$testimonials_description = isset($home_testimonials['description']) ? (string) $home_testimonials['description'] : __("Our clients trust us to deliver precision, creativity, and scale - every time. Here's what they say about working with Reacon.", 'reacon-group');

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
	if (isset($home_testimonials['row_1']) && is_array($home_testimonials['row_1']) && !empty($home_testimonials['row_1'])) {
		$testimonials_row_1 = $home_testimonials['row_1'];
	}

	if (isset($home_testimonials['row_2']) && is_array($home_testimonials['row_2']) && !empty($home_testimonials['row_2'])) {
		$testimonials_row_2 = $home_testimonials['row_2'];
	}
	?>

	<section id="reacon-testimonials-section" class="relative overflow-hidden bg-[#fafafa] py-12 xs:py-12 sm:py-12 md:py-12 lg:py-12 xl:py-16 2xl:py-16" aria-label="<?php esc_attr_e('Testimonials', 'reacon-group'); ?>">
		<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(233,251,252,0.9)_0%,rgba(255,255,255,0.85)_58%,rgba(255,255,255,1)_100%)]" aria-hidden="true"></div>

		<div class="relative z-10 mx-auto mb-10 w-full max-w-7xl px-4 text-center sm:mb-12 sm:px-6 lg:mb-14 lg:px-8">
			<div class="mx-auto flex max-w-4xl flex-col items-center gap-3 sm:gap-4">
				<h2 class="font-display text-[1.875rem] font-bold leading-tight text-[#1e293b] xs:text-[2rem] sm:text-[2.25rem] md:text-[2.375rem] lg:text-[2.625rem] xl:text-[2.75rem]">
					<?php echo esc_html($testimonials_heading); ?>
				</h2>
				<p class="max-w-3xl font-sans text-sm leading-relaxed text-[#262626] xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem]">
					<?php echo esc_html($testimonials_description); ?>
				</p>
			</div>
		</div>

		<div class="relative z-10 space-y-6 lg:space-y-8">
			<div class="reacon-testi-track-wrap">
				<div class="reacon-testi-track reacon-testi-track--forward">
					<?php for ($r = 0; $r < 2; $r++): ?>
						<?php foreach ($testimonials_row_1 as $item): ?>
							<?php
							$item_quote = isset($item['quote']) ? trim((string) $item['quote']) : '';
							$item_name = isset($item['name']) ? trim((string) $item['name']) : '';
							$item_role = isset($item['role']) ? trim((string) $item['role']) : '';
							$item_img = isset($item['img']) ? trim((string) $item['img']) : '';
							if ($item_quote === '' || $item_name === '' || $item_role === '') {
								continue;
							}
							?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="font-sans text-base leading-[1.42] text-foreground">
									<?php echo esc_html($item_quote); ?>
								</p>
								<div class="flex items-start gap-6">
									<div class="min-w-0 flex-1">
										<p class="font-sans text-base font-medium leading-[1.42] text-primary"><?php echo esc_html($item_name); ?></p>
										<p class="font-sans text-sm leading-[1.42] text-muted-foreground"><?php echo esc_html($item_role); ?></p>
									</div>
									<?php if ($item_img !== ''): ?>
										<img src="<?php echo esc_url($item_img); ?>" alt="<?php echo esc_attr($item_name); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
									<?php endif; ?>
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
							<?php
							$item_quote = isset($item['quote']) ? trim((string) $item['quote']) : '';
							$item_name = isset($item['name']) ? trim((string) $item['name']) : '';
							$item_role = isset($item['role']) ? trim((string) $item['role']) : '';
							$item_img = isset($item['img']) ? trim((string) $item['img']) : '';
							if ($item_quote === '' || $item_name === '' || $item_role === '') {
								continue;
							}
							?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="font-sans text-base leading-[1.42] text-foreground">
									<?php echo esc_html($item_quote); ?>
								</p>
								<div class="flex items-start gap-6">
									<div class="min-w-0 flex-1">
										<p class="font-sans text-base font-medium leading-[1.42] text-primary"><?php echo esc_html($item_name); ?></p>
										<p class="font-sans text-sm leading-[1.42] text-muted-foreground"><?php echo esc_html($item_role); ?></p>
									</div>
									<?php if ($item_img !== ''): ?>
										<img src="<?php echo esc_url($item_img); ?>" alt="<?php echo esc_attr($item_name); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>
		</div>

		<!-- Testimonials edge fade overlays -->
		<div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-16 bg-gradient-to-r from-[#fafafa] via-[#fafafa]/90 to-transparent sm:w-24 md:w-28 lg:w-40 xl:w-44" aria-hidden="true"></div>
		<div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-16 bg-gradient-to-l from-[#fafafa] via-[#fafafa]/90 to-transparent sm:w-24 md:w-28 lg:w-40 xl:w-44" aria-hidden="true"></div>
	</section>
	<!-- End Testimonials Section -->
	<!-- CTA Section -->
	<?php
	// CTA section data (single ACF read with safe defaults).
	$home_cta = get_field('home_cta_section');
	$home_cta = is_array($home_cta) ? $home_cta : array();

	$cta_heading = isset($home_cta['heading']) ? (string) $home_cta['heading'] : __('Print Smarter. Move Faster. Deliver Everywhere.', 'reacon-group');
	$cta_description = isset($home_cta['description']) ? (string) $home_cta['description'] : __('Reacon connects creativity, automation, and logistics to help brands operate at global speed.', 'reacon-group');

	$cta_primary = isset($home_cta['primary']) && is_array($home_cta['primary']) ? $home_cta['primary'] : array();
	$cta_secondary = isset($home_cta['secondary']) && is_array($home_cta['secondary']) ? $home_cta['secondary'] : array();

	$cta_primary_label = isset($cta_primary['label']) ? (string) $cta_primary['label'] : __('Contact Us', 'reacon-group');
	$cta_primary_url = isset($cta_primary['url']) ? (string) $cta_primary['url'] : home_url('/contact-us/');

	$cta_secondary_label = isset($cta_secondary['label']) ? (string) $cta_secondary['label'] : __('Talk to Our Team', 'reacon-group');
	$cta_secondary_url = isset($cta_secondary['url']) ? (string) $cta_secondary['url'] : home_url('/contact-us/');
	?>
	<section id="home-cta" class="py-10 xs:py-10 sm:py-12 md:py-14 lg:py-16 xl:py-16 2xl:py-20" aria-labelledby="home-cta-heading">
		<div class="mx-auto w-full  px-4 sm:px-6 lg:px-8">
			<div class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 md:px-10 md:py-[4.25rem] lg:rounded-3xl lg:px-12 lg:py-[4.5rem] xl:px-14 xl:py-20 2xl:px-16 2xl:py-24" style="background: linear-gradient(179deg, #076166 0%, #1ECAD3 100%);">
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
				<div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center justify-center text-center">
					<h2 id="home-cta-heading" class="font-display text-[2rem] font-bold leading-[1.1] text-white xs:text-[2.125rem] sm:text-[2.5rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
						<?php echo esc_html($cta_heading); ?>
					</h2>
					<p class="mx-auto mt-4 max-w-3xl font-sans text-sm leading-relaxed text-white/90 xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem] lg:text-lg">
						<?php echo esc_html($cta_description); ?>
					</p>
					<div class="mt-8 flex w-full flex-col items-center justify-center gap-3 sm:mt-9 sm:w-auto sm:flex-row sm:gap-2.5 md:mt-10">
						<a href="<?php echo esc_url($cta_primary_url); ?>" class="inline-flex w-full items-center justify-between gap-2.5 rounded-full bg-white py-1 pl-5 pr-1 font-sans text-base font-medium text-primary no-underline transition-all duration-300 hover:bg-white/90 sm:w-auto">
							<span><?php echo esc_html($cta_primary_label); ?></span>
							<span class="flex size-10 items-center justify-center rounded-full bg-secondary/15 sm:size-[42px]">
								<i class="ph ph-arrow-up-right text-base text-primary" aria-hidden="true"></i>
							</span>
						</a>
						<a href="<?php echo esc_url($cta_secondary_url); ?>" class="inline-flex w-full items-center justify-center gap-2.5 rounded-full border border-solid border-white px-5 py-2.5 font-sans text-base font-normal text-white no-underline transition-all duration-300 hover:bg-white/10 sm:w-auto sm:pr-4">
							<?php echo esc_html($cta_secondary_label); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA Section -->
	<?php
	// FAQ section data (single ACF read with safe fallbacks).
	$home_faq = get_field('home_faq_section');
	$faq_heading = isset($home_faq['heading']) ? (string) $home_faq['heading'] : 'Frequently Asked Questions';
	$faq_description = isset($home_faq['description']) ? (string) $home_faq['description'] : 'Find quick answers to how Reacon works, what we deliver, and how we support brands across print, production, and data-driven automation.';
	$faq_items = isset($home_faq['items']) && is_array($home_faq['items']) ? $home_faq['items'] : [];
	$faq_cta = isset($home_faq['cta']) && is_array($home_faq['cta']) ? $home_faq['cta'] : [];

	if (empty($faq_items)) {
		$faq_items = [
			[
				'question' => 'What services does Reacon provide?',
				'answer' => 'Reacon delivers end-to-end brand execution including content design, printing, packaging, warehousing, fulfilment, logistics, and data-driven communication systems.',
			],
			[
				'question' => 'Does Reacon offer project management solutions?',
				'answer' => 'Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.',
			],
			[
				'question' => 'What digital marketing strategies do you specialize in?',
				'answer' => "Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand's reach and return on investment.",
			],
			[
				'question' => 'Do you offer innovative solutions in software development?',
				'answer' => 'Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.',
			],
			[
				'question' => 'How does Reacon approach sustainable product design?',
				'answer' => 'We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.',
			],
		];
	}

	$faq_cta_title = isset($faq_cta['title']) ? (string) $faq_cta['title'] : 'Have additional questions about Reacon Group?';
	$faq_cta_text = isset($faq_cta['text']) ? (string) $faq_cta['text'] : 'Our Australian-based customer experience team has licensed specialists standing by to help.';
	$faq_cta_link = isset($faq_cta['link']) && is_array($faq_cta['link']) ? $faq_cta['link'] : [
		'url' => '#',
		'title' => 'Contact our Lead Team',
		'target' => '',
	];
	?>
	<!-- FAQ Section -->
	<section id="reacon-faq-section" class="w-full bg-white py-12 xs:py-12 sm:py-12 md:py-16 lg:py-16 xl:py-16 2xl:py-16" aria-labelledby="reacon-faq-heading">
		<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
			<!-- FAQ Header -->
			<header class="flex flex-col gap-6">
				<h2 id="reacon-faq-heading" class="text-3xl font-semibold leading-tight text-black sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] xl:text-5xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
					<?php echo esc_html($faq_heading); ?>
				</h2>
				<p class="max-w-4xl text-base leading-relaxed text-black/80 sm:text-[1.0625rem] md:text-lg">
					<?php echo esc_html($faq_description); ?>
				</p>
			</header>

			<!-- FAQ List -->
			<div
				class="mt-10 flex flex-col gap-3 sm:mt-12 md:mt-14 lg:mt-16"
				role="list"
				aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>"
				x-data="{ activeFaq: 0 }">
				<?php foreach ($faq_items as $index => $faq_item): ?>
					<?php
					$question = isset($faq_item['question']) ? trim((string) $faq_item['question']) : '';
					$answer = isset($faq_item['answer']) ? trim((string) $faq_item['answer']) : '';
					if ($question === '' || $answer === '') {
						continue;
					}
					$item_id = 'reacon-faq-item-' . ($index + 1);
					$panel_id = $item_id . '-panel';
					?>
					<!-- FAQ Item -->
					<div
						class="reacon-faq-item rounded-2xl border border-[#E7E7E7] px-5 py-[1.125rem] transition-colors duration-300 sm:px-6 sm:py-5"
						role="listitem"
						:class="{ 'reacon-faq-item--open': activeFaq === <?php echo esc_attr($index); ?> }">
						<button
							type="button"
							id="<?php echo esc_attr($item_id); ?>"
							class="flex w-full cursor-pointer items-start justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2"
							aria-controls="<?php echo esc_attr($panel_id); ?>"
							:aria-expanded="activeFaq === <?php echo esc_attr($index); ?> ? 'true' : 'false'"
							@click="activeFaq = activeFaq === <?php echo esc_attr($index); ?> ? -1 : <?php echo esc_attr($index); ?>">
							<span class="text-lg font-medium leading-snug text-[#383B43] sm:text-xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
								<?php echo esc_html($question); ?>
							</span>
							<span class="mt-0.5 shrink-0 text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeFaq === <?php echo esc_attr($index); ?> ? '−' : '+'">
							</span>
						</button>
						<div
							id="<?php echo esc_attr($panel_id); ?>"
							class="overflow-hidden"
							x-show="activeFaq === <?php echo esc_attr($index); ?>"
							x-transition:enter="transition-all ease-out duration-300"
							x-transition:enter-start="opacity-0 max-h-0"
							x-transition:enter-end="opacity-100 max-h-96"
							x-transition:leave="transition-all ease-in duration-200"
							x-transition:leave-start="opacity-100 max-h-96"
							x-transition:leave-end="opacity-0 max-h-0">
							<p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base">
								<?php echo esc_html($answer); ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>

				<!-- FAQ CTA -->
				<aside class="mt-1 rounded-2xl bg-[#E9FBFC] px-5 py-[1.125rem] sm:px-6 sm:py-5" aria-label="<?php esc_attr_e('FAQ contact call to action', 'reacon-group'); ?>">
					<div class="flex flex-col gap-2">
						<p class="text-[0.9375rem] font-medium leading-relaxed text-[#383B43] sm:text-base">
							<?php echo esc_html($faq_cta_title); ?>
						</p>
						<p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base">
							<?php echo esc_html($faq_cta_text); ?>
						</p>
					</div>
					<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
					<a
						href="<?php echo esc_url($faq_cta_link['url']); ?>"
						<?php echo !empty($faq_cta_link['target']) ? 'target="' . esc_attr($faq_cta_link['target']) . '" rel="noopener noreferrer"' : ''; ?>
						class="flex w-full items-center justify-between gap-4 text-[0.9375rem] font-medium leading-relaxed text-[#0A969B] transition-colors duration-300 hover:text-black sm:text-base">
						<span><?php echo esc_html($faq_cta_link['title']); ?></span>
						<i class="ph ph-arrow-right" aria-hidden="true"></i>
					</a>
				</aside>
			</div>
		</div>
	</section>
	<!-- End FAQ Section -->
	<?php

	/**
	 * ── ADDITIONAL SECTIONS ───────────────────────────────
	 * Uncomment and add more sections as they are built.
	 */
	?>

	<style>
		/* Hero Section Styles */
		@media (min-width: 1024px) {
			#hero .reacon-home-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 36px;
				--hero-notch-height: 78px;
				--hero-notch-swoop: 36px;
			}

			/* 1. Hero top notch */
			#hero .reacon-home-hero-card::before {
				content: "";
				position: absolute;
				left: 50%;
				top: 0;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: var(--hero-notch-width);
				height: var(--hero-notch-height);
				background: #fff;
				border-bottom-left-radius: var(--hero-notch-radius);
				border-bottom-right-radius: var(--hero-notch-radius);
				z-index: 3;
				pointer-events: none;
			}

			/* 2. Hero notch corner cutouts */
			#hero .reacon-home-hero-card::after {
				content: "";
				position: absolute;
				top: 0;
				left: 50%;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2));
				height: var(--hero-notch-swoop);
				background:
					radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
					radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
				z-index: 4;
				pointer-events: none;
			}
		}

		/* Partners Section Styles */
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

		/* Testimonials Section Styles */
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

		/* FAQ Section Styles */
		#reacon-faq-section .reacon-faq-item--open {
			background-color: #f9fafb;
			border-color: #f9fafb;
		}

		#reacon-faq-section [x-show] p {
			margin-top: 0.875rem;
		}

		@media (min-width: 640px) {
			#reacon-faq-section [x-show] p {
				margin-top: 1.25rem;
			}
		}
	</style>

	<script>
		// FAQ Section Logic
		document.addEventListener('DOMContentLoaded', () => {
			// Alpine drives FAQ interactions; this block is intentionally reserved for fallback hooks.

			// Hero notch width sync to centered desktop menu width.
			const syncHeroNotchToDesktopMenu = () => {
				const heroCard = document.querySelector('#hero .reacon-home-hero-card');
				const navPill = document.querySelector('#site-navigation > ul');
				if (!heroCard || !navPill) return;

				if (window.innerWidth < 1024) {
					heroCard.style.removeProperty('--hero-notch-width');
					heroCard.style.removeProperty('--hero-notch-shift');
					return;
				}

				const heroRect = heroCard.getBoundingClientRect();
				const navRect = navPill.getBoundingClientRect();
				const navWidth = Math.round(navPill.getBoundingClientRect().width);
				if (!navWidth) return;
				const heroCenterX = heroRect.left + (heroRect.width / 2);
				const navCenterX = navRect.left + (navRect.width / 2);
				const notchShift = Math.round(navCenterX - heroCenterX);

				// Keep notch visually aligned just behind the centered menu pill.
				heroCard.style.setProperty('--hero-notch-width', `${navWidth + 18}px`);
				heroCard.style.setProperty('--hero-notch-shift', `${notchShift}px`);
			};

			syncHeroNotchToDesktopMenu();
			window.addEventListener('resize', syncHeroNotchToDesktopMenu);
		});
	</script>

</main><!-- #primary -->

<?php
get_footer();
