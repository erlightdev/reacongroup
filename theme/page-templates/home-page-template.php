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

// Helper to render icon subfields consistently.
if (!function_exists('render_reacon_dynamic_icon')) {
	function render_reacon_dynamic_icon($icon_data, $default_classes = '')
	{
		if (empty($icon_data) || !is_array($icon_data)) return;
		$type = $icon_data['icon_type'] ?? '';
		if ($type === 'phosphor' && !empty($icon_data['phosphor_class'])) {
			echo '<i class="' . esc_attr($icon_data['phosphor_class'] . ' ' . $default_classes) . '" aria-hidden="true"></i>';
		} elseif ($type === 'lucide' && !empty($icon_data['lucide_name'])) {
			echo '<i data-lucide="' . esc_attr($icon_data['lucide_name']) . '" class="' . esc_attr($default_classes) . '" aria-hidden="true"></i>';
		} elseif ($type === 'svg' && !empty($icon_data['svg_code'])) {
			// Basic standard allowance for raw SVG, bypassing esc_html for actual SVG rendering
			echo $icon_data['svg_code'];
		} elseif ($type === 'image' && !empty($icon_data['icon_image'])) {
			echo '<img src="' . esc_url($icon_data['icon_image']) . '" alt="" class="' . esc_attr($default_classes) . '" loading="lazy" aria-hidden="true" />';
		}
	}
}
?>

<main id="primary" class="overflow-x-hidden" role="main">

	<!-- Home Page Hero Section -->
	<?php if (get_field('enable_hero_section')): ?>
		<?php
		$home_hero = get_field('home_hero_section');
		if (is_array($home_hero)):

			$hero_eyebrow = !empty($home_hero['eyebrow']) ? $home_hero['eyebrow'] : '';
			$hero_heading = !empty($home_hero['heading']) ? $home_hero['heading'] : '';
			$hero_description = !empty($home_hero['description']) ? $home_hero['description'] : '';
			$hero_cta = !empty($home_hero['cta']) && is_array($home_hero['cta']) ? $home_hero['cta'] : array();
			$hero_cta_label = !empty($hero_cta['title']) ? $hero_cta['title'] : '';
			$hero_cta_url = !empty($hero_cta['url']) ? $hero_cta['url'] : '#';
			$hero_cta_target = !empty($hero_cta['target']) ? $hero_cta['target'] : '_self';
			$hero_stat = !empty($home_hero['hero_stat']) && is_array($home_hero['hero_stat']) ? $home_hero['hero_stat'] : array();
			$hero_stat_value = !empty($hero_stat['value']) ? $hero_stat['value'] : '';
			$hero_stat_label = !empty($hero_stat['label']) ? $hero_stat['label'] : '';
			$hero_stat_description = !empty($hero_stat['description']) ? $hero_stat['description'] : '';
			$hero_stat_icon = !empty($hero_stat['icon']) ? $hero_stat['icon'] : '';
			$bg_type = !empty($home_hero['bg_type']) ? $home_hero['bg_type'] : 'video';
			$bg_video = !empty($home_hero['bg_video']) ? $home_hero['bg_video'] : '';
			$bg_image = !empty($home_hero['bg_image']) ? $home_hero['bg_image'] : '';
		?>

			<section id="hero" class="relative w-full p-0 md:p-2.5" aria-label="<?php esc_attr_e('Hero', 'reacon-group'); ?>">

				<div class="reacon-home-hero-card relative mb-1.5 flex min-h-[calc(100vh-6px)] w-full flex-col overflow-hidden rounded-b-[31px] bg-foreground md:rounded-[31px]">
					<?php if ($bg_image): ?>
						<picture class="pointer-events-none absolute inset-0" aria-hidden="true">
							<img src="<?php echo esc_url($bg_image); ?>" alt="" class="h-full w-full object-cover object-center" fetchpriority="high" loading="eager" decoding="async" />
						</picture>
					<?php endif; ?>

					<?php if ($bg_type === 'video' && $bg_video): ?>
						<video class="pointer-events-none absolute inset-0 z-[1] h-full w-full object-cover object-center" autoplay="autoplay" muted="muted" loop="loop" playsinline preload="auto" controlsList="nodownload" oncontextmenu="return false;" disablePictureInPicture <?php echo $bg_image ? 'poster="' . esc_url($bg_image) . '"' : ''; ?> aria-hidden="true">
							<source src="<?php echo esc_url($bg_video); ?>" type="video/mp4" />
						</video>
					<?php endif; ?>

					<div class="pointer-events-none absolute inset-0 bg-black/40 lg:bg-gradient-to-t lg:from-black/55 lg:via-black/20 lg:to-transparent" aria-hidden="true"></div>

					<div class="pointer-events-none absolute left-0 top-0 h-[60%] w-[42%] min-w-[280px]" style="background-image:linear-gradient(130deg, rgba(30, 202, 211, 0.34) 12%, rgba(30, 202, 211, 0) 58%);" aria-hidden="true"></div>

					<div class="relative z-10 mx-auto flex h-full w-full md:max-w-7xl lg:max-w-7xl xl:max-w-7xl 2xl:max-w-none 2xl:w-full flex-1 flex-col justify-end px-4 pb-0 pt-28 sm:px-6 sm:pt-32 lg:px-8 lg:pt-24 ">
						<div class="mb-10 flex w-full max-w-4xl flex-col items-start gap-6 lg:mb-[42px]">
							<div class="flex flex-col gap-3 text-white">
								<?php if ($hero_eyebrow): ?>
									<p class="reacon-type-body text-white/95"><?php echo esc_html($hero_eyebrow); ?></p>
								<?php endif; ?>
								<?php if ($hero_heading): ?>
									<h1 class="reacon-type-hero font-bold tracking-tight xs:text-[2.125rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
										<?php echo esc_html($hero_heading); ?>
									</h1>
								<?php endif; ?>
							</div>

							<?php if ($hero_description): ?>
								<p class="reacon-type-body max-w-3xl text-white/95 md:text-[1.0625rem]">
									<?php echo esc_html($hero_description); ?>
								</p>
							<?php endif; ?>

							<?php if ($hero_cta_label && $hero_cta_url): ?>
								<a href="<?php echo esc_url($hero_cta_url); ?>" target="<?php echo esc_attr($hero_cta_target); ?>" class="group inline-flex items-center gap-2.5 rounded-full bg-primary py-1 pl-5 pr-1 font-sans transition-all duration-300 hover:bg-secondary">
									<span class="reacon-type-button text-primary-foreground"><?php echo esc_html($hero_cta_label); ?></span>
									<span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full bg-white/30" aria-hidden="true">
										<svg class="absolute h-[14px] w-[14px] transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.16699 12.8333L12.8337 1.16666M12.8337 1.16666H3.49965M12.8337 1.16666V10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<svg class="absolute h-[14px] w-[14px] translate-x-[-12px] translate-y-[12px] opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.16699 12.8333L12.8337 1.16666M12.8337 1.16666H3.49965M12.8337 1.16666V10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</span>
								</a>
							<?php endif; ?>
						</div>

						<?php if ($hero_stat_value || $hero_stat_label): ?>
							<div class="relative hidden w-full flex-col gap-3 rounded-t-[32px] bg-white p-6 sm:max-w-[320px] lg:absolute lg:bottom-0 lg:right-[42px] lg:flex lg:min-h-[287px]">
								<?php if ($hero_stat_icon): ?>
									<div class="pointer-events-none absolute right-4 top-4 h-20 w-[76px] overflow-hidden">
										<img src="<?php echo esc_url($hero_stat_icon); ?>" alt="" class="h-full w-full object-cover object-top" loading="lazy" decoding="async" />
									</div>
								<?php endif; ?>

								<div class="relative z-10 flex w-full flex-col gap-1">
									<p class="reacon-type-h2 text-primary"><?php echo esc_html($hero_stat_value); ?></p>
									<p class="reacon-type-body font-semibold text-foreground"><?php echo esc_html($hero_stat_label); ?></p>
								</div>

								<?php if ($hero_stat_description): ?>
									<div class="relative z-10 w-full">
										<p class="reacon-type-caption text-muted-foreground"><?php echo esc_html($hero_stat_description); ?></p>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Home Page Hero Section -->

	<!-- Partners Section -->
	<?php if (get_field('enable_partners_section')): ?>
		<?php
		$partner_logos = get_field('home_partners_logos');
		if (!empty($partner_logos) && is_array($partner_logos)):
		?>
			<section class="relative w-full overflow-hidden bg-white" aria-label="<?php esc_attr_e('Partners', 'reacon-group'); ?>">
				<div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-24 bg-gradient-to-r from-white via-white/90 to-transparent lg:w-32" aria-hidden="true"></div>
				<div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-24 bg-gradient-to-l from-white via-white/90 to-transparent lg:w-32" aria-hidden="true"></div>

				<div class="mx-auto flex min-h-[74px] w-full max-w-7xl items-center overflow-hidden px-4 sm:px-6 lg:px-8">
					<div class="flex w-fit animate-partner-marquee items-center gap-12">
						<?php for ($rep = 0; $rep < 2; $rep++): ?>
							<?php foreach ($partner_logos as $logo_item):
								$url = !empty($logo_item['logo']) ? $logo_item['logo'] : '';
								$alt = !empty($logo_item['alt']) ? $logo_item['alt'] : '';
								if (!$url) continue;
							?>
								<img class="h-14 w-[90px] object-contain mix-blend-luminosity opacity-70 transition-opacity duration-200 hover:opacity-100" src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy" decoding="async" />
							<?php endforeach; ?>
						<?php endfor; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Partners Section -->

	<!-- Brand Intro Section -->
	<?php if (get_field('enable_brand_intro_section')): ?>
		<?php
		$home_brand_intro = get_field('home_brand_intro_section');
		if (is_array($home_brand_intro)):
			$brand_intro_heading = !empty($home_brand_intro['heading']) ? $home_brand_intro['heading'] : '';
			$brand_intro_heading_highlight = !empty($home_brand_intro['heading_highlight']) ? $home_brand_intro['heading_highlight'] : '';
			$brand_intro_description = !empty($home_brand_intro['description']) ? $home_brand_intro['description'] : '';
			$brand_intro_cards = !empty($home_brand_intro['cards']) && is_array($home_brand_intro['cards']) ? $home_brand_intro['cards'] : array();
		?>
			<section class="py-10 xs:py-10 sm:py-12 md:py-14 lg:py-16 xl:py-16 2xl:py-16" aria-labelledby="reacon-brand-intro-heading">
				<div class="mx-auto flex max-w-7xl flex-col items-center gap-10 px-4 sm:gap-12 sm:px-6 xl:gap-20 lg:px-8">
					<header class="flex max-w-5xl flex-col gap-4 text-center sm:gap-5">
						<?php if ($brand_intro_heading): ?>
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
						<?php endif; ?>
						<?php if ($brand_intro_description): ?>
							<p class="mx-auto max-w-3xl font-sans text-sm leading-relaxed text-foreground sm:text-base md:text-[1.0625rem] lg:text-lg">
								<?php echo esc_html($brand_intro_description); ?>
							</p>
						<?php endif; ?>
					</header>

					<?php if (!empty($brand_intro_cards)): ?>
						<div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-4 lg:grid-cols-4 xl:gap-4">
							<?php foreach ($brand_intro_cards as $card):
								$card_title = !empty($card['title']) ? $card['title'] : '';
								$card_description = !empty($card['description']) ? $card['description'] : '';
								$card_logo = !empty($card['logo']) ? $card['logo'] : '';
								$card_logo_alt = !empty($card['logo_alt']) ? $card['logo_alt'] : $card_title;

								$card_link = !empty($card['url']) && is_array($card['url']) ? $card['url'] : array();
								$card_url = !empty($card_link['url']) ? $card_link['url'] : '#';
								$card_link_title = !empty($card_link['title']) ? $card_link['title'] : __('Explore Site', 'reacon-group');
								$card_target = !empty($card_link['target']) ? $card_link['target'] : '_self';

								if (!$card_title && !$card_description) continue;
							?>
								<article class="group flex h-full min-h-[240px] flex-col rounded-[20px] border border-border bg-muted p-5 transition-all duration-300 hover:border-primary hover:bg-white hover:shadow-sm sm:p-6">
									<!-- Logo Container: Fixed to top right -->
									<div class="flex w-full justify-end mb-6">
										<?php if ($card_logo): ?>
											<img src="<?php echo esc_url($card_logo); ?>" alt="<?php echo esc_attr($card_logo_alt); ?>" class="max-h-[32px] w-auto object-contain object-right" loading="lazy" decoding="async" />
										<?php endif; ?>
									</div>

									<!-- Content Container -->
									<div class="w-full mb-6">
										<?php if ($card_title): ?><h3 class="mb-1.5 font-display text-xl font-semibold text-foreground"><?php echo esc_html($card_title); ?></h3><?php endif; ?>
										<?php if ($card_description): ?><p class="line-clamp-3 font-sans text-sm leading-relaxed text-muted-foreground"><?php echo esc_html($card_description); ?></p><?php endif; ?>
									</div>

									<!-- Link -->
									<a href="<?php echo esc_url($card_url); ?>" target="<?php echo esc_attr($card_target); ?>" class="mt-auto inline-flex w-max items-center gap-1.5 font-sans text-sm font-medium text-foreground no-underline transition-colors group-hover:text-primary">
										<?php echo esc_html($card_link_title); ?>
										<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
									</a>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Brand Intro Section -->

	<!-- Content Section -->
	<?php if (get_field('enable_content_section')): ?>
		<?php
		$home_content = get_field('home_content_section');
		if (is_array($home_content)):
			$content_heading = !empty($home_content['heading']) ? $home_content['heading'] : '';
			$content_description = !empty($home_content['description']) ? $home_content['description'] : '';
			$content_rows = !empty($home_content['rows']) && is_array($home_content['rows']) ? $home_content['rows'] : array();
		?>
			<section class="py-12 xs:py-12 sm:py-16 md:py-16 lg:pt-12 lg:pb-16 xl:pb-20 2xl:pb-20" aria-labelledby="reacon-content-heading">
				<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
					<header class="mb-16 text-center lg:mb-[72px]">
						<?php if ($content_heading): ?>
							<h2 id="reacon-content-heading" class="mx-auto mb-4 max-w-5xl font-display text-2xl font-semibold leading-tight text-foreground sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] lg:leading-[1.32] xl:text-5xl">
								<?php echo esc_html($content_heading); ?>
							</h2>
						<?php endif; ?>
						<?php if ($content_description): ?>
							<p class="mx-auto max-w-3xl font-sans text-sm leading-relaxed text-foreground sm:text-base lg:text-lg lg:leading-[1.42]">
								<?php echo esc_html($content_description); ?>
							</p>
						<?php endif; ?>
					</header>

					<?php if (!empty($content_rows)): ?>
						<?php foreach ($content_rows as $index => $row):
							$row_eyebrow = !empty($row['eyebrow']) ? $row['eyebrow'] : '';
							$row_title_prefix = !empty($row['title_prefix']) ? $row['title_prefix'] : '';
							$row_title_highlight = !empty($row['title_highlight']) ? $row['title_highlight'] : '';
							$row_p1 = !empty($row['paragraph_1']) ? $row['paragraph_1'] : '';
							$row_p2 = !empty($row['paragraph_2']) ? $row['paragraph_2'] : '';
							$row_items = !empty($row['items']) && is_array($row['items']) ? $row['items'] : array();

							$row_btn = !empty($row['button']) && is_array($row['button']) ? $row['button'] : array();
							$row_btn_label = !empty($row_btn['title']) ? $row_btn['title'] : __('Explore Solution', 'reacon-group');
							$row_btn_url = !empty($row_btn['url']) ? $row_btn['url'] : '#';
							$row_btn_target = !empty($row_btn['target']) ? $row_btn['target'] : '_self';

							$row_img_main = !empty($row['primary_image']) ? $row['primary_image'] : '';
							$row_img_main_alt = !empty($row['primary_image_alt']) ? $row['primary_image_alt'] : $row_eyebrow;
							$row_img_secondary = !empty($row['secondary_image']) ? $row['secondary_image'] : '';

							$row_image_right = isset($row['image_right']) && $row['image_right'] ? true : false;
							$row_desktop_reverse = !empty($row['desktop_reverse']) ? true : false;

							$desktop_direction_class = $row_desktop_reverse ? 'lg:flex-row-reverse' : 'lg:flex-row';
							$row_wrap_class = 'flex flex-col-reverse items-center justify-between gap-12 ' . $desktop_direction_class . ' lg:gap-16 xl:gap-20';
							$row_text_class = 'flex w-full max-w-full flex-1 flex-col justify-center lg:max-w-[500px] xl:max-w-[620px]';
							$row_image_class = $row_image_right ? 'relative ml-auto w-[85%] shrink-0 sm:w-[75%] lg:ml-0 lg:w-[450px] xl:w-[529px]' : 'relative mr-auto w-[85%] shrink-0 sm:w-[75%] lg:mr-0 lg:w-[450px] xl:w-[529px]';
							$row_secondary_pos = $row_image_right
								? 'absolute -bottom-8 -left-6 w-[55%] aspect-[295/227] overflow-hidden rounded-xl border-4 border-white shadow-xl sm:-left-12 lg:bottom-auto lg:-left-[80px] lg:top-[220px] lg:w-[240px] lg:rounded-3xl lg:border-[8px] xl:-left-[65px] xl:top-[280px] xl:w-[295px]'
								: 'absolute -bottom-8 -right-6 w-[55%] aspect-[295/227] overflow-hidden rounded-xl border-4 border-white shadow-xl sm:-right-12 lg:bottom-auto lg:-right-[80px] lg:top-[220px] lg:w-[240px] lg:rounded-3xl lg:border-[8px] xl:-right-[65px] xl:top-[280px] xl:w-[295px]';
							$row_margin_class = $index < (count($content_rows) - 1) ? 'mb-24 lg:mb-[120px]' : '';
						?>
							<div class="<?php echo esc_attr(trim($row_wrap_class . ' ' . $row_margin_class)); ?>">
								<div class="<?php echo esc_attr($row_text_class); ?>">
									<div class="flex flex-col gap-4">
										<div class="flex flex-col gap-2 lg:gap-1">
											<?php if ($row_eyebrow): ?>
												<div class="flex items-center gap-2">
													<span class="h-2 w-2 shrink-0 rounded-full bg-primary"></span>
													<span class="font-sans text-sm font-medium text-primary md:text-base"><?php echo esc_html($row_eyebrow); ?></span>
												</div>
											<?php endif; ?>

											<h3 class="font-display text-2xl leading-tight text-foreground md:text-3xl lg:text-[32px] lg:leading-[1.32]">
												<?php echo esc_html($row_title_prefix); ?>
												<span class="bg-gradient-to-r from-primary to-secondary bg-clip-text font-semibold text-transparent"><?php echo esc_html($row_title_highlight); ?></span>
											</h3>
										</div>

										<div class="font-sans text-sm leading-relaxed text-foreground md:text-base lg:leading-[1.42]">
											<?php if ($row_p1): ?><p class="mb-4"><?php echo esc_html($row_p1); ?></p><?php endif; ?>
											<?php if ($row_p2): ?><p><?php echo esc_html($row_p2); ?></p><?php endif; ?>
										</div>

										<?php if (!empty($row_items)): ?>
											<div class="mt-2 flex flex-col gap-3">
												<?php foreach ($row_items as $item):
													$item_text = !empty($item['text']) ? $item['text'] : '';
												?>
													<div class="flex items-start gap-2.5 lg:items-center">
														<div class="mt-0.5 h-4 w-4 shrink-0 flex items-center justify-center lg:mt-0 text-primary">
															<i class="ph-fill ph-check-circle" aria-hidden="true"></i>
														</div>
														<span class="font-sans text-sm text-foreground md:text-base"><?php echo esc_html((string) $item_text); ?></span>
													</div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>

									<?php if (!empty($row['button']['url'])): ?>
										<a href="<?php echo esc_url($row_btn_url); ?>" target="<?php echo esc_attr($row_btn_target); ?>" class="group mt-8 inline-flex w-fit items-center gap-2 rounded-full bg-primary py-2.5 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
											<?php echo esc_html($row_btn_label); ?>
											<span class="relative flex h-7 w-7 shrink-0 items-center justify-center overflow-hidden rounded-full bg-white/20" aria-hidden="true">
												<i class="ph-bold ph-arrow-up-right absolute text-[16px] transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0"></i>
												<i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-[16px] opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100"></i>
											</span>
										</a>
									<?php endif; ?>
								</div>

								<div class="<?php echo esc_attr($row_image_class); ?>">
									<div class="aspect-[529/474] w-full overflow-hidden rounded-2xl lg:rounded-3xl">
										<?php if ($row_img_main): ?>
											<img src="<?php echo esc_url($row_img_main); ?>" alt="<?php echo esc_attr($row_img_main_alt); ?>" class="h-full w-full object-cover" loading="lazy" decoding="async" />
										<?php endif; ?>
									</div>
									<?php if ($row_img_secondary): ?>
										<div class="<?php echo esc_attr($row_secondary_pos); ?>">
											<img src="<?php echo esc_url($row_img_secondary); ?>" alt="" class="h-full w-full object-cover" loading="lazy" decoding="async" />
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Content Section -->

	<!-- Industries Section -->
	<?php if (get_field('enable_industries_section')): ?>
		<?php
		$home_industries = get_field('home_industries_section');
		if (is_array($home_industries)):

			$industries_heading = !empty($home_industries['heading']) ? $home_industries['heading'] : '';
			$industries_description = !empty($home_industries['description']) ? $home_industries['description'] : '';
			$industry_cards = !empty($home_industries['cards']) && is_array($home_industries['cards']) ? array_values($home_industries['cards']) : array();

			$render_industry_card = static function ($card, $is_tall = false) {
				if (empty($card)) return;
				$title = !empty($card['title']) ? $card['title'] : '';
				$desc = !empty($card['desc']) ? $card['desc'] : '';
				$img = !empty($card['img']) ? $card['img'] : '';
				$alt = !empty($card['alt']) ? $card['alt'] : '';

				$href_data = !empty($card['link']) && is_array($card['link']) ? $card['link'] : array();
				$href = !empty($href_data['url']) ? $href_data['url'] : '#';
				$link_title = !empty($href_data['title']) ? $href_data['title'] : __('Explore Site', 'reacon-group');
				$target = !empty($href_data['target']) ? $href_data['target'] : '_self';

				$text_color = !empty($card['text_color']) ? $card['text_color'] : 'text-white';
				$button_text_color = $text_color;
				$overlay = !empty($card['overlay']) ? $card['overlay'] : 'linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%)';
				$img_class = !empty($card['img_class']) ? $card['img_class'] : 'absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105';
				$height_class = $is_tall ? 'lg:h-[346px]' : 'lg:h-[420px]';
		?>
				<article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 <?php echo esc_attr($height_class); ?>">
					<?php if ($img): ?>
						<img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy" decoding="async" class="<?php echo esc_attr($img_class); ?>" />
					<?php endif; ?>
					<div class="absolute inset-0" style="background:<?php echo esc_attr($overlay); ?>;"></div>

					<div class="relative z-10 <?php echo esc_attr($text_color === 'text-foreground' ? 'text-white' : $text_color); ?>">
						<h3 class="mb-2 font-display text-xl  leading-tight sm:mb-3 sm:text-2xl lg:leading-[1.32]">
							<?php echo esc_html($title); ?>
						</h3>
						<p class="text-sm leading-relaxed sm:text-base lg:leading-[1.42]">
							<?php echo esc_html($desc); ?>
						</p>
					</div>

					<a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="relative z-10 mt-auto flex w-fit cursor-pointer items-center gap-1.5 pt-6 text-sm font-medium <?php echo esc_attr($button_text_color); ?> transition-all duration-300 lg:translate-y-2 lg:opacity-0 lg:pointer-events-none lg:group-hover:translate-y-0 lg:group-hover:opacity-100 lg:group-hover:pointer-events-auto lg:group-focus-within:translate-y-0 lg:group-focus-within:opacity-100 lg:group-focus-within:pointer-events-auto before:absolute before:inset-0 before:-m-8">
						<?php echo esc_html($link_title); ?>
						<i class="ph ph-arrow-right text-sm transition-all duration-300 lg:translate-x-[-4px] lg:opacity-0 lg:group-hover:translate-x-0 lg:group-hover:opacity-100 lg:group-focus-within:translate-x-0 lg:group-focus-within:opacity-100" aria-hidden="true"></i>
					</a>
				</article>
			<?php
			};
			?>
			<section class="py-12 xs:py-12 sm:py-12 md:py-12 lg:py-12 xl:py-16 2xl:py-16" aria-labelledby="reacon-industries-heading">
				<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
					<div class="mb-12 text-center md:mb-16 lg:mb-[72px]">
						<?php if ($industries_heading): ?>
							<h2 id="reacon-industries-heading" class="mx-auto mb-4 max-w-4xl font-display text-3xl font-semibold leading-tight text-[#1e293b] sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] lg:leading-[1.32] xl:text-5xl">
								<?php echo esc_html($industries_heading); ?>
							</h2>
						<?php endif; ?>
						<?php if ($industries_description): ?>
							<p class="mx-auto max-w-4xl text-base leading-relaxed text-[#383b43] sm:text-[1.0625rem] lg:text-lg lg:leading-[1.42]">
								<?php echo esc_html($industries_description); ?>
							</p>
						<?php endif; ?>
					</div>

					<?php if (count($industry_cards) >= 6): ?>
						<div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-8">
							<div class="flex flex-col gap-6 lg:gap-[30px]">
								<?php $render_industry_card($industry_cards[0], true); ?>
								<div class="grid flex-1 grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-6">
									<?php $render_industry_card($industry_cards[3]); ?>
									<?php $render_industry_card($industry_cards[4]); ?>
								</div>
							</div>
							<div class="flex flex-col gap-6 lg:gap-8">
								<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-8">
									<?php $render_industry_card($industry_cards[1]); ?>
									<?php $render_industry_card($industry_cards[2]); ?>
								</div>
								<?php $render_industry_card($industry_cards[5], true); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Industries Section -->

	<!-- Testimonials Section -->
	<?php if (get_field('enable_testimonials_section')): ?>
		<?php
		$home_testimonials = get_field('home_testimonials_section');
		if (is_array($home_testimonials)):
			$testimonials_heading = !empty($home_testimonials['heading']) ? $home_testimonials['heading'] : '';
			$testimonials_description = !empty($home_testimonials['description']) ? $home_testimonials['description'] : '';
			$testimonials_row_1 = !empty($home_testimonials['row_1']) && is_array($home_testimonials['row_1']) ? $home_testimonials['row_1'] : array();
			$testimonials_row_2 = !empty($home_testimonials['row_2']) && is_array($home_testimonials['row_2']) ? $home_testimonials['row_2'] : array();
		?>
			<section id="reacon-testimonials-section" class="relative overflow-hidden bg-[#fafafa] py-12 xs:py-12 sm:py-12 md:py-12 lg:py-12 xl:py-16 2xl:py-16" aria-label="<?php esc_attr_e('Testimonials', 'reacon-group'); ?>">
				<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(233,251,252,0.9)_0%,rgba(255,255,255,0.85)_58%,rgba(255,255,255,1)_100%)]" aria-hidden="true"></div>

				<div class="relative z-10 mx-auto mb-10 w-full max-w-7xl px-4 text-center sm:mb-12 sm:px-6 lg:mb-14 lg:px-8">
					<div class="mx-auto flex max-w-4xl flex-col items-center gap-3 sm:gap-4">
						<?php if ($testimonials_heading): ?>
							<h2 class="font-display text-[1.875rem] font-bold leading-tight text-[#1e293b] xs:text-[2rem] sm:text-[2.25rem] md:text-[2.375rem] lg:text-[2.625rem] xl:text-[2.75rem]">
								<?php echo esc_html($testimonials_heading); ?>
							</h2>
						<?php endif; ?>
						<?php if ($testimonials_description): ?>
							<p class="max-w-3xl font-sans text-sm leading-relaxed text-[#262626] xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem]">
								<?php echo esc_html($testimonials_description); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="relative z-10 space-y-6 lg:space-y-8">
					<?php if (!empty($testimonials_row_1)): ?>
						<div class="reacon-testi-track-wrap">
							<div class="reacon-testi-track reacon-testi-track--forward">
								<?php for ($r = 0; $r < 2; $r++): ?>
									<?php foreach ($testimonials_row_1 as $item):
										$item_quote = !empty($item['quote']) ? $item['quote'] : '';
										$item_name = !empty($item['name']) ? $item['name'] : '';
										$item_role = !empty($item['role']) ? $item['role'] : '';
										$item_img = !empty($item['img']) ? $item['img'] : '';
										if (!$item_quote) continue;
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
												<?php if ($item_img): ?>
													<img src="<?php echo esc_url($item_img); ?>" alt="<?php echo esc_attr($item_name); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
												<?php endif; ?>
											</div>
										</article>
									<?php endforeach; ?>
								<?php endfor; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if (!empty($testimonials_row_2)): ?>
						<div class="reacon-testi-track-wrap">
							<div class="reacon-testi-track reacon-testi-track--reverse">
								<?php for ($r = 0; $r < 2; $r++): ?>
									<?php foreach ($testimonials_row_2 as $item):
										$item_quote = !empty($item['quote']) ? $item['quote'] : '';
										$item_name = !empty($item['name']) ? $item['name'] : '';
										$item_role = !empty($item['role']) ? $item['role'] : '';
										$item_img = !empty($item['img']) ? $item['img'] : '';
										if (!$item_quote) continue;
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
												<?php if ($item_img): ?>
													<img src="<?php echo esc_url($item_img); ?>" alt="<?php echo esc_attr($item_name); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
												<?php endif; ?>
											</div>
										</article>
									<?php endforeach; ?>
								<?php endfor; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="pointer-events-none absolute inset-y-0 left-0 z-20 w-16 bg-gradient-to-r from-[#fafafa] via-[#fafafa]/90 to-transparent sm:w-24 md:w-28 lg:w-40 xl:w-44" aria-hidden="true"></div>
				<div class="pointer-events-none absolute inset-y-0 right-0 z-20 w-16 bg-gradient-to-l from-[#fafafa] via-[#fafafa]/90 to-transparent sm:w-24 md:w-28 lg:w-40 xl:w-44" aria-hidden="true"></div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End Testimonials Section -->

	<!-- CTA Section -->
	<?php if (get_field('enable_cta_section')): ?>
		<?php
		$home_cta = get_field('home_cta_section');
		if (is_array($home_cta)):
			$cta_heading = !empty($home_cta['heading']) ? $home_cta['heading'] : '';
			$cta_description = !empty($home_cta['description']) ? $home_cta['description'] : '';

			$cta_primary = !empty($home_cta['primary']) && is_array($home_cta['primary']) ? $home_cta['primary'] : array();
			$cta_secondary = !empty($home_cta['secondary']) && is_array($home_cta['secondary']) ? $home_cta['secondary'] : array();

			$cta_primary_label = !empty($cta_primary['title']) ? $cta_primary['title'] : '';
			$cta_primary_url = !empty($cta_primary['url']) ? $cta_primary['url'] : '#';
			$cta_primary_target = !empty($cta_primary['target']) ? $cta_primary['target'] : '_self';

			$cta_secondary_label = !empty($cta_secondary['title']) ? $cta_secondary['title'] : '';
			$cta_secondary_url = !empty($cta_secondary['url']) ? $cta_secondary['url'] : '#';
			$cta_secondary_target = !empty($cta_secondary['target']) ? $cta_secondary['target'] : '_self';
		?>
			<section id="home-cta" class="py-10 xs:py-10 sm:py-12 md:py-14 " aria-labelledby="home-cta-heading">
				<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
					<div class="relative overflow-hidden rounded-[22px] px-5 py-10 sm:px-8 sm:py-10 lg:rounded-[24px] lg:px-12" style="background: linear-gradient(179deg, #076166 0%, #1ECAD3 100%);">
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

						<div class="pointer-events-none absolute inset-0 z-[2] bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.0)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>

						<div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center justify-center text-center">
							<?php if ($cta_heading): ?>
								<h2 id="home-cta-heading" class="font-display text-[24px] font-bold leading-[1.1] text-white xs:text-[2.125rem] sm:text-[2.5rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
									<?php echo esc_html($cta_heading); ?>
								</h2>
							<?php endif; ?>
							<?php if ($cta_description): ?>
								<p class="mx-auto mt-4 max-w-3xl font-sans text-sm leading-relaxed text-white/90 xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem] lg:text-lg">
									<?php echo esc_html($cta_description); ?>
								</p>
							<?php endif; ?>
							<div class="mt-8 flex w-full flex-col items-center justify-center gap-3 sm:mt-9 sm:w-auto sm:flex-row sm:gap-2.5 md:mt-10">
								<?php if ($cta_primary_label && $cta_primary_url): ?>
									<a href="<?php echo esc_url($cta_primary_url); ?>" target="<?php echo esc_attr($cta_primary_target); ?>" class="group inline-flex w-full items-center justify-between gap-2.5 rounded-full bg-white py-1 pl-5 pr-1 font-sans text-base font-medium text-primary no-underline transition-all duration-300 hover:bg-white/90 sm:w-auto">
										<span><?php echo esc_html($cta_primary_label); ?></span>
										<span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full bg-secondary/15">
											<i class="ph-bold ph-arrow-up-right absolute text-base transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" aria-hidden="true"></i>
											<i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-base opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
										</span>
									</a>
								<?php endif; ?>
								<?php if ($cta_secondary_label && $cta_secondary_url): ?>
									<a href="<?php echo esc_url($cta_secondary_url); ?>" target="<?php echo esc_attr($cta_secondary_target); ?>" class="inline-flex w-full items-center justify-start gap-2.5 rounded-full border border-solid border-white px-5 py-2.5 font-sans text-base font-normal text-white no-underline transition-all duration-300 hover:bg-white/10 sm:w-auto sm:justify-center sm:pr-4">
										<?php echo esc_html($cta_secondary_label); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End CTA Section -->

	<!-- FAQ Section -->
	<?php if (get_field('enable_faq_section')): ?>
		<?php
		$home_faq = get_field('home_faq_section');
		if (is_array($home_faq)):
			$faq_heading = !empty($home_faq['heading']) ? $home_faq['heading'] : '';
			$faq_description = !empty($home_faq['description']) ? $home_faq['description'] : '';
			$faq_items = !empty($home_faq['items']) && is_array($home_faq['items']) ? $home_faq['items'] : array();

			$faq_cta = array();
			if (!empty($home_faq['faq_cta']) && is_array($home_faq['faq_cta'])) {
				$faq_cta = $home_faq['faq_cta'];
			} elseif (!empty($home_faq['cta']) && is_array($home_faq['cta'])) {
				// Backward compatibility for older field name.
				$faq_cta = $home_faq['cta'];
			}
			$faq_cta_title = !empty($faq_cta['title']) ? $faq_cta['title'] : '';
			$faq_cta_text = !empty($faq_cta['text']) ? $faq_cta['text'] : '';

			$faq_cta_link_data = !empty($faq_cta['link']) && is_array($faq_cta['link']) ? $faq_cta['link'] : array();
			$faq_cta_link_url = !empty($faq_cta_link_data['url']) ? $faq_cta_link_data['url'] : '#';
			$faq_cta_link_title = !empty($faq_cta_link_data['title']) ? $faq_cta_link_data['title'] : '';
			$faq_cta_link_target = !empty($faq_cta_link_data['target']) ? $faq_cta_link_data['target'] : '_self';
		?>
			<section id="reacon-faq-section" class="w-full bg-white py-12 xs:py-12 sm:py-12 md:py-16 lg:py-16 xl:py-16 2xl:py-16" aria-labelledby="reacon-faq-heading">
				<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
					<header class="flex flex-col gap-6">
						<?php if ($faq_heading): ?>
							<h2 id="reacon-faq-heading" class="text-[24px] font-semibold leading-tight text-black sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] xl:text-5xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
								<?php echo esc_html($faq_heading); ?>
							</h2>
						<?php endif; ?>
						<?php if ($faq_description): ?>
							<p class="max-w-4xl text-base leading-relaxed text-black/80 sm:text-[1.0625rem] md:text-lg">
								<?php echo esc_html($faq_description); ?>
							</p>
						<?php endif; ?>
					</header>

					<?php if (!empty($faq_items)): ?>
						<div class="mt-10 flex flex-col gap-3 sm:mt-12 md:mt-14 lg:mt-16" role="list" aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>" x-data="{ activeFaq: 0 }">
							<?php foreach ($faq_items as $index => $faq_item):
								$question = !empty($faq_item['question']) ? $faq_item['question'] : '';
								$answer = !empty($faq_item['answer']) ? $faq_item['answer'] : '';
								if (!$question || !$answer) continue;
								$item_id = 'reacon-faq-item-' . ($index + 1);
								$panel_id = $item_id . '-panel';
							?>
								<div class="reacon-faq-item rounded-2xl border border-[#E7E7E7] px-5 py-[1.125rem] transition-colors duration-300 sm:px-6 sm:py-5" role="listitem" :class="{ 'reacon-faq-item--open': activeFaq === <?php echo esc_attr($index); ?> }">
									<button type="button" id="<?php echo esc_attr($item_id); ?>" class="flex w-full cursor-pointer items-start justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2" aria-controls="<?php echo esc_attr($panel_id); ?>" :aria-expanded="activeFaq === <?php echo esc_attr($index); ?> ? 'true' : 'false'" @click="activeFaq = activeFaq === <?php echo esc_attr($index); ?> ? -1 : <?php echo esc_attr($index); ?>">
										<span class="text-lg font-medium leading-snug text-[#383B43] sm:text-xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
											<?php echo esc_html($question); ?>
										</span>
										<span class="mt-0.5 shrink-0 text-xl leading-none text-[#0A969B] select-none" aria-hidden="true" x-text="activeFaq === <?php echo esc_attr($index); ?> ? '−' : '+'"></span>
									</button>
									<div id="<?php echo esc_attr($panel_id); ?>" class="overflow-hidden" x-show="activeFaq === <?php echo esc_attr($index); ?>" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in duration-200" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0">
										<p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base">
											<?php echo nl2br(esc_html($answer)); ?>
										</p>
									</div>
								</div>
							<?php endforeach; ?>

							<?php if ($faq_cta_title || $faq_cta_text): ?>
								<aside class="mt-1 rounded-2xl bg-[#E9FBFC] px-5 py-[1.125rem] sm:px-6 sm:py-5" aria-label="<?php esc_attr_e('FAQ contact call to action', 'reacon-group'); ?>">
									<div class="flex flex-col gap-2">
										<?php if ($faq_cta_title): ?><p class="text-[0.9375rem] font-medium leading-relaxed text-[#383B43] sm:text-base"><?php echo esc_html($faq_cta_title); ?></p><?php endif; ?>
										<?php if ($faq_cta_text): ?><p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base"><?php echo esc_html($faq_cta_text); ?></p><?php endif; ?>
									</div>
									<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
									<?php if ($faq_cta_link_title && $faq_cta_link_url): ?>
										<a href="<?php echo esc_url($faq_cta_link_url); ?>" target="<?php echo esc_attr($faq_cta_link_target); ?>" class="flex w-full items-center justify-between gap-4 text-[0.9375rem] font-medium leading-relaxed text-[#0A969B] transition-colors duration-300 hover:text-black sm:text-base">
											<span><?php echo esc_html($faq_cta_link_title); ?></span>
											<i class="ph ph-arrow-right" aria-hidden="true"></i>
										</a>
									<?php endif; ?>
								</aside>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- End FAQ Section -->

	<style>
		@media (min-width: 1024px) {
			#masthead #site-navigation>ul {
				position: relative;
				box-shadow: 0 0 0 2px #fff;
				outline: 2px solid #fff;
				outline-offset: 0;
			}

			#masthead.top-0 #site-navigation>ul {
				box-shadow: 0 0 0 2px #fff, 0 10px 22px rgba(0, 0, 0, 0.16);
			}

			#hero .reacon-home-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 36px;
				--hero-notch-height: 78px;
				--hero-notch-swoop: 36px;
			}

			#hero .reacon-home-hero-card::before {
				content: "";
				position: absolute;
				left: 50%;
				top: -1px;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + 2px);
				height: calc(var(--hero-notch-height) + 1px);
				background: #fff;
				border-bottom-left-radius: var(--hero-notch-radius);
				border-bottom-right-radius: var(--hero-notch-radius);
				margin-left: -1px;
				box-shadow: 0 0 0 2px #fff;
				z-index: 3;
				pointer-events: none;
			}

			#hero .reacon-home-hero-card::after {
				content: "";
				position: absolute;
				top: -1px;
				left: 50%;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2) + 2px);
				height: calc(var(--hero-notch-swoop) + 1px);
				background:
					radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
					radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
				margin-left: -1px;
				filter: drop-shadow(0 0 1px #fff) drop-shadow(0 0 1px #fff);
				z-index: 4;
				pointer-events: none;
			}
		}

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
		document.addEventListener('DOMContentLoaded', () => {
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
