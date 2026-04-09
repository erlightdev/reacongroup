<?php

/**
 * Template Name: Solution — Main
 * Template Post Type: page, solution
 *
 * Dynamic ACF-powered solution page template for Main.
 * All content is managed through ACF Pro field groups.
 *
 * @package reacon-group
 */

get_header();

// Helper function for rendering SVG icons
if (!function_exists('reacon_get_icon_html')) {
	function reacon_get_icon_html($icon_config, $classes = 'h-4 w-4')
	{
		if (empty($icon_config)) {
			return '';
		}

		$icon_type = $icon_config['icon_type'] ?? 'phosphor';

		switch ($icon_type) {
			case 'phosphor':
				$icon_class = $icon_config['phosphor_class'] ?? 'ph-arrow-right';
				return sprintf('<i class="ph ph-bold %s %s" aria-hidden="true"></i>', esc_attr($icon_class), esc_attr($classes));

			case 'lucide':
				$lucide_icon = $icon_config['lucide_icon'] ?? 'arrow-right';
				return sprintf('<i class="lucide lucide-%s %s" aria-hidden="true"></i>', esc_attr($lucide_icon), esc_attr($classes));

			case 'svg':
				$svg_id = $icon_config['svg_upload'] ?? null;
				if ($svg_id) {
					$svg_url = wp_get_attachment_url($svg_id);
					return sprintf('<img src="%s" alt="" aria-hidden="true" class="%s" />', esc_url($svg_url), esc_attr($classes));
				}
				return '';

			case 'image':
				$img_id = $icon_config['image_upload'] ?? null;
				if ($img_id) {
					$img_url = wp_get_attachment_url($img_id);
					return sprintf('<img src="%s" alt="" aria-hidden="true" class="%s" />', esc_url($img_url), esc_attr($classes));
				}
				return '';

			default:
				return '';
		}
	}
}

if (!function_exists('reacon_solution_media_url')) {
	function reacon_solution_media_url($value)
	{
		if (is_numeric($value)) {
			$url = wp_get_attachment_url((int) $value);
			return is_string($url) ? $url : '';
		}
		if (is_array($value)) {
			if (!empty($value['url']) && is_string($value['url'])) {
				return $value['url'];
			}
			if (!empty($value['ID']) && is_numeric($value['ID'])) {
				$url = wp_get_attachment_url((int) $value['ID']);
				return is_string($url) ? $url : '';
			}
			if (!empty($value['id']) && is_numeric($value['id'])) {
				$url = wp_get_attachment_url((int) $value['id']);
				return is_string($url) ? $url : '';
			}
		}
		return is_string($value) ? $value : '';
	}
}

// Get all section toggles
$show_hero = get_field('solution_hero_enabled');
$show_highlights = get_field('solution_highlights_enabled');
$show_capabilities = get_field('solution_capabilities_enabled');
$show_cta = get_field('solution_cta_enabled');
$show_faq = get_field('solution_faq_enabled');
?>

<main id="primary" class="overflow-x-hidden bg-background" role="main">
	<?php if ($show_hero): ?>
		<!-- Page Section: Hero -->
		<?php
		$hero_bg_id = get_field('solution_hero_background');
		$hero_bg_url = $hero_bg_id ? wp_get_attachment_url($hero_bg_id) : '';
		$hero_eyebrow = get_field('solution_hero_eyebrow');
		$hero_title = get_field('solution_hero_title');
		$hero_title = $hero_title ? $hero_title : get_the_title();
		$hero_lead = get_field('solution_hero_lead');
		?>
		<section
			id="solution-hero"
			class="relative w-full p-1.5 md:p-2.5"
			aria-label="<?php esc_attr_e('Solution page hero', 'reacon-group'); ?>">

			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
				<?php if ($hero_bg_url): ?>
					<img
						src="<?php echo esc_url($hero_bg_url); ?>"
						alt=""
						aria-hidden="true"
						class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
						fetchpriority="high"
						loading="eager"
						decoding="async" />
				<?php endif; ?>

				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<?php if ($hero_eyebrow): ?>
						<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
							<?php echo esc_html($hero_eyebrow); ?>
						</p>
					<?php endif; ?>

					<h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
						<?php echo esc_html($hero_title); ?>
					</h1>

					<?php if ($hero_lead): ?>
						<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
							<?php echo esc_html($hero_lead); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- End Page Section: Hero -->
	<?php endif; ?>
	<?php if ($show_highlights): ?>
		<!-- Highlights Section -->
		<?php
		$highlights_heading = get_field('solution_highlights_heading');
		$highlights_intro = get_field('solution_highlights_intro');
		$highlights_body = get_field('solution_highlights_body');
		$highlights_delivered_label = get_field('solution_highlights_delivered_label');
		$highlights_logo_id = get_field('solution_highlights_logo');
		$highlights_logo_url = $highlights_logo_id ? wp_get_attachment_url($highlights_logo_id) : '';
		$highlights_video_field = get_field('solution_highlights_video');

		$highlight_video_url = reacon_solution_media_url($highlights_video_field);
		$has_highlight_video = !empty($highlight_video_url);
		$highlight_video_label = __('Solution main showreel video', 'reacon-group');
		?>
		<section
			id="solution-highlights"
			class="bg-background"
			aria-labelledby="solution-highlights-heading">
			<div class="mx-auto flex w-full max-w-[1200px] flex-col gap-12 px-5 py-16 sm:gap-14 sm:px-6 sm:py-20 md:gap-16 md:py-24 lg:gap-[60px] lg:px-10 lg:py-[120px] xl:max-w-[1370px]">
				<div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between lg:gap-12">
					<?php if ($highlights_heading): ?>
						<h2 id="solution-highlights-heading" class="max-w-[720px] font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[40px] sm:leading-[1.15] md:text-[48px] ">
							<?php echo esc_html($highlights_heading); ?>
						</h2>
					<?php endif; ?>

					<?php if ($highlights_intro): ?>
						<p class="max-w-[520px] font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px] lg:shrink-0 lg:pt-1">
							<?php echo esc_html($highlights_intro); ?>
						</p>
					<?php endif; ?>
				</div>

				<?php if ($has_highlight_video): ?>
					<figure class="relative m-0 aspect-[1370/620] w-full overflow-hidden rounded-[20px] bg-[#1c1c1c] sm:rounded-[22px] lg:rounded-[24px]">
						<video
							class="absolute inset-0 h-full w-full object-cover"
							autoplay
							muted
							loop
							playsinline
							preload="auto"
							controlsList="nodownload"
							aria-label="<?php echo esc_attr($highlight_video_label); ?>">
							<source src="<?php echo esc_url($highlight_video_url); ?>" type="video/mp4" />
						</video>
					</figure>
				<?php endif; ?>

				<div class="flex flex-col gap-3 sm:gap-3">
					<?php if ($highlights_body): ?>
						<p class="font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
							<?php echo esc_html($highlights_body); ?>
						</p>
					<?php endif; ?>

					<?php if ($highlights_delivered_label || $highlights_logo_url): ?>
						<div class="flex flex-col gap-2">
							<?php if ($highlights_delivered_label): ?>
								<p class="font-sans text-[15px] font-medium leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
									<?php echo esc_html($highlights_delivered_label); ?>
								</p>
							<?php endif; ?>

							<?php if ($highlights_logo_url): ?>
								<div class="h-[52px] w-[160px] shrink-0 sm:h-[62px] sm:w-[179px]">
									<img
										src="<?php echo esc_url($highlights_logo_url); ?>"
										alt="<?php echo esc_attr(__('Delivered by logo', 'reacon-group')); ?>"
										class="h-full w-full object-contain object-left"
										loading="lazy"
										decoding="async"
										width="179"
										height="62" />
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- End Highlights Section -->
	<?php endif; ?>
	<?php if ($show_capabilities): ?>
		<!-- Creation Capabilities Section -->
		<?php
		$capabilities_heading = get_field('solution_capabilities_heading');
		$capabilities_intro = get_field('solution_capabilities_intro');
		$capabilities_bg_color = get_field('solution_capabilities_bg_color') ?: '#ECECEC';
		$capabilities_cards = get_field('solution_capabilities_cards') ?: array();
		?>
		<section
			id="solution-capabilities"
			class="py-16 sm:py-20 lg:py-[120px]"
			style="background-color: <?php echo esc_attr($capabilities_bg_color); ?>;"
			aria-labelledby="solution-capabilities-heading">
			<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
				<div class="mx-auto text-center">
					<?php if ($capabilities_heading): ?>
						<h2
							id="solution-capabilities-heading"
							class="font-display text-[36px] font-semibold leading-tight text-foreground sm:text-[44px] lg:text-[56px] lg:leading-[73.92px]">
							<?php echo esc_html($capabilities_heading); ?>
						</h2>
					<?php endif; ?>

					<?php if ($capabilities_intro): ?>
						<p class="mx-auto mt-5 max-w-[720px] font-sans text-[16px] leading-[22.72px] text-foreground/80">
							<?php echo esc_html($capabilities_intro); ?>
						</p>
					<?php endif; ?>
				</div>

				<?php if (!empty($capabilities_cards)): ?>
					<div class="mt-14 grid grid-cols-1 gap-x-[24px] gap-y-[24px] sm:mt-16 sm:grid-cols-2">
						<?php foreach ($capabilities_cards as $card): ?>
							<?php
							$card_title = $card['title'] ?? '';
							$card_paragraph = $card['paragraph'] ?? '';
							$card_image_id = $card['image'] ?? null;
							$card_image_url = $card_image_id ? wp_get_attachment_url($card_image_id) : '';
							$card_link = isset($card['link']) && is_array($card['link']) ? $card['link'] : array();
							$card_link_url = !empty($card_link['url']) ? $card_link['url'] : '';
							$card_link_target = !empty($card_link['target']) ? $card_link['target'] : '_self';
							$card_link_rel = ('_blank' === $card_link_target) ? 'noopener noreferrer' : '';
							$card_bullets = $card['bullets'] ?? array();
							$tick_icon_id = get_field('solution_capabilities_tick_icon');
							$tick_icon_url = $tick_icon_id ? wp_get_attachment_url($tick_icon_id) : '';
							?>
							<article class="overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card">
								<?php if ($card_link_url): ?>
									<a
										href="<?php echo esc_url($card_link_url); ?>"
										target="<?php echo esc_attr($card_link_target); ?>"
										<?php echo $card_link_rel ? 'rel="' . esc_attr($card_link_rel) . '"' : ''; ?>
										aria-label="<?php echo esc_attr($card_title !== '' ? $card_title : __('Open capability card', 'reacon-group')); ?>"
										class="group block no-underline">
									<?php endif; ?>
									<?php if ($card_image_url): ?>
										<div class="h-[260px] overflow-hidden rounded-t-[32px] rounded-b-[20px] bg-white">
											<img
												src="<?php echo esc_url($card_image_url); ?>"
												alt="<?php echo esc_attr($card_title); ?>"
												loading="lazy"
												decoding="async"
												class="h-full w-full object-cover" />
										</div>
									<?php endif; ?>

									<div class="px-[20px] pb-[20px] pt-[12px]">
										<?php if ($card_title): ?>
											<h3 class="font-display text-[24px] font-semibold leading-[1.32] text-foreground sm:text-[28px] lg:text-[32px]">
												<?php echo esc_html($card_title); ?>
											</h3>
										<?php endif; ?>

										<?php if ($card_paragraph): ?>
											<p class="mt-2 font-sans text-[16px] leading-[22.72px] text-foreground/80">
												<?php echo esc_html($card_paragraph); ?>
											</p>
										<?php endif; ?>

										<?php if (!empty($card_bullets)): ?>
											<div class="mt-5 space-y-1">
												<?php foreach ($card_bullets as $bullet_item): ?>
													<?php $bullet_text = $bullet_item['bullet'] ?? ''; ?>
													<?php if ($bullet_text): ?>
														<div class="flex items-start gap-3">
															<?php if ($tick_icon_url): ?>
																<img
																	src="<?php echo esc_url($tick_icon_url); ?>"
																	alt=""
																	aria-hidden="true"
																	loading="lazy"
																	decoding="async"
																	class="mt-1 h-[16px] w-[16px] shrink-0" />
															<?php endif; ?>
															<p class="font-sans text-[16px] leading-[22.72px] text-foreground">
																<?php echo esc_html($bullet_text); ?>
															</p>
														</div>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
									<?php if ($card_link_url): ?>
									</a>
								<?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<!-- End Creation Capabilities Section -->
	<?php endif; ?>

	<?php if ($show_cta): ?>
		<!-- CTA Section -->
		<?php
		$cta_heading = get_field('solution_cta_heading');
		$cta_description = get_field('solution_cta_description');
		$cta_bg_color = get_field('solution_cta_bg_color') ?: '#0D6B75';
		$cta_primary_btn = get_field('solution_cta_primary_button');
		$cta_secondary_btn = get_field('solution_cta_secondary_button');
		?>
		<section
			id="solution-cta"
			class="py-10 sm:py-12 lg:py-14"
			aria-labelledby="solution-cta-heading">
			<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
				<div
					class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]"
					style="background-color: <?php echo esc_attr($cta_bg_color); ?>;">

					<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
					<div class="pointer-events-none absolute inset-0 opacity-75" style="background: linear-gradient(180deg, <?php echo esc_attr($cta_bg_color); ?> 0%, rgba(0,0,0,0.2) 100%);" aria-hidden="true"></div>

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
						class="pointer-events-none absolute right-[-955px] h-[791px] w-[2122px]"
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
						<?php if ($cta_heading): ?>
							<h2
								id="solution-cta-heading"
								class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
								<?php echo esc_html($cta_heading); ?>
							</h2>
						<?php endif; ?>

						<?php if ($cta_description): ?>
							<p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
								<?php echo esc_html($cta_description); ?>
							</p>
						<?php endif; ?>

						<div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
							<?php if (!empty($cta_primary_btn)): ?>
								<?php
								$primary_url = $cta_primary_btn['url'] ?? '';
								$primary_label = $cta_primary_btn['title'] ?? __('Contact Us', 'reacon-group');
								$primary_target = $cta_primary_btn['target'] ?? '_self';
								?>
								<a
									href="<?php echo esc_url($primary_url); ?>"
									target="<?php echo esc_attr($primary_target); ?>"
									class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#0B6A74] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
									<span><?php echo esc_html($primary_label); ?></span>
									<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
										<i class="ph-bold ph-arrow-up-right text-[12px] text-[#0B6A74]"></i>
									</span>
								</a>
							<?php endif; ?>

							<?php if (!empty($cta_secondary_btn)): ?>
								<?php
								$secondary_url = $cta_secondary_btn['url'] ?? '';
								$secondary_label = $cta_secondary_btn['title'] ?? __('Talk to Our Team', 'reacon-group');
								$secondary_target = $cta_secondary_btn['target'] ?? '_self';
								?>
								<a
									href="<?php echo esc_url($secondary_url); ?>"
									target="<?php echo esc_attr($secondary_target); ?>"
									class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
									<?php echo esc_html($secondary_label); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End CTA Section -->
	<?php endif; ?>

	<?php if ($show_faq): ?>
		<!-- FAQ Section -->
		<?php
		$faq_items = get_field('solution_faq_items') ?: array();
		$faq_heading = get_field('solution_faq_heading');
		$faq_description = get_field('solution_faq_description');
		$faq_cta_text = get_field('solution_faq_cta_text');
		$faq_cta_subtext = get_field('solution_faq_cta_subtext');
		$faq_cta_link = get_field('solution_faq_cta_link');

		if (!$faq_heading) {
			$faq_heading = __('Frequently Asked Questions', 'reacon-group');
		}
		if (!$faq_description) {
			$faq_description = __('Find quick answers to how Reacon works, what we deliver, and how we support brands across print, production, and data-driven automation.', 'reacon-group');
		}
		?>
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
							<?php echo esc_html($faq_heading); ?>
						</h2>
						<p class="max-w-4xl text-base leading-snug text-black">
							<?php echo esc_html($faq_description); ?>
						</p>
					</div>
				</div>

				<!-- FAQ Items -->
				<div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="Frequently asked questions list">

					<?php if (!empty($faq_items)): ?>
						<?php foreach ($faq_items as $index => $faq_item): ?>
							<?php
							$faq_question = $faq_item['question'] ?? '';
							$faq_answer = $faq_item['answer'] ?? '';
							?>
							<?php if ($faq_question): ?>
								<div
									class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
									:class="activeIndex === <?php echo absint($index); ?> ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
									itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
									<button
										type="button"
										@click="activeIndex = activeIndex === <?php echo absint($index); ?> ? null : <?php echo absint($index); ?>"
										:aria-expanded="activeIndex === <?php echo absint($index); ?>"
										aria-controls="faq-answer-<?php echo absint($index); ?>"
										class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
										<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
											<?php echo esc_html($faq_question); ?>
										</span>
										<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === <?php echo absint($index); ?> ? '−' : '+'"></span>
									</button>
									<?php if ($faq_answer): ?>
										<div
											id="faq-answer-<?php echo absint($index); ?>"
											x-show="activeIndex === <?php echo absint($index); ?>"
											x-transition:enter="transition-all duration-300 ease-in-out"
											x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
											x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
											x-transition:leave="transition-all duration-250 ease-in-out"
											x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
											x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
											class="overflow-hidden"
											itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
											<p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
												<?php echo esc_html($faq_answer); ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>

					<!-- CTA Card -->
					<div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
						<div class="flex flex-col gap-2">
							<?php if ($faq_cta_text): ?>
								<p class="text-base font-medium leading-snug text-[#383B43]">
									<?php echo esc_html($faq_cta_text); ?>
								</p>
							<?php endif; ?>

							<?php if ($faq_cta_subtext): ?>
								<p class="text-base leading-snug text-[#666666]">
									<?php echo esc_html($faq_cta_subtext); ?>
								</p>
							<?php endif; ?>
						</div>

						<?php if ($faq_cta_text || $faq_cta_subtext): ?>
							<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
						<?php endif; ?>

						<?php if (!empty($faq_cta_link)): ?>
							<?php
							$cta_url = $faq_cta_link['url'] ?? '#';
							$cta_label = $faq_cta_link['title'] ?? __('Contact our Lead Team', 'reacon-group');
							$cta_target = $faq_cta_link['target'] ?? '_self';
							?>
							<a
								href="<?php echo esc_url($cta_url); ?>"
								target="<?php echo esc_attr($cta_target); ?>"
								class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
								<span><?php echo esc_html($cta_label); ?></span>
								<i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<!-- End FAQ Section -->
	<?php endif; ?>

	<!-- End Main Content -->
</main>

<style>
	/* Desktop-only top notch aligned with fixed header nav (same as About page). */
	@media (min-width: 1024px) {
		#solution-hero .reacon-about-hero-card {
			--hero-notch-width: clamp(560px, 48vw, 720px);
			--hero-notch-radius: 40px;
			--hero-notch-height: 86px;
			--hero-notch-swoop: 40px;
		}

		#solution-hero .reacon-about-hero-card::before {
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

		#solution-hero .reacon-about-hero-card::after {
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
</style>

<script>
	document.addEventListener('DOMContentLoaded', () => {
		const syncSolutionHeroNotchToDesktopMenu = () => {
			const heroCard = document.querySelector('#solution-hero .reacon-about-hero-card');
			const navPill = document.querySelector('#site-navigation > ul');
			if (!heroCard || !navPill) return;

			if (window.innerWidth < 1024) {
				heroCard.style.removeProperty('--hero-notch-width');
				heroCard.style.removeProperty('--hero-notch-shift');
				return;
			}

			const heroRect = heroCard.getBoundingClientRect();
			const navRect = navPill.getBoundingClientRect();
			const navWidth = Math.round(navRect.width);
			if (!navWidth) return;

			const heroCenterX = heroRect.left + (heroRect.width / 2);
			const navCenterX = navRect.left + (navRect.width / 2);
			const notchShift = Math.round(navCenterX - heroCenterX);

			heroCard.style.setProperty('--hero-notch-width', `${navWidth + 18}px`);
			heroCard.style.setProperty('--hero-notch-shift', `${notchShift}px`);
		};

		let solutionNotchSyncRaf = null;
		const scheduleSolutionNotchSync = () => {
			if (solutionNotchSyncRaf) {
				cancelAnimationFrame(solutionNotchSyncRaf);
			}
			solutionNotchSyncRaf = requestAnimationFrame(syncSolutionHeroNotchToDesktopMenu);
		};

		scheduleSolutionNotchSync();
		window.addEventListener('resize', scheduleSolutionNotchSync);
		window.addEventListener('load', scheduleSolutionNotchSync);
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(scheduleSolutionNotchSync).catch(() => {});
		}
	});
</script>

<?php
get_footer();
