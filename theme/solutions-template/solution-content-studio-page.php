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

$acf_enabled = function_exists('get_field');

if (!function_exists('reacon_solution_get_link')) {
	function reacon_solution_get_link($field_value)
	{
		if (is_array($field_value)) {
			return array(
				'url' => !empty($field_value['url']) ? (string) $field_value['url'] : '#',
				'title' => !empty($field_value['title']) ? (string) $field_value['title'] : '',
				'target' => !empty($field_value['target']) ? (string) $field_value['target'] : '_self',
			);
		}

		return array(
			'url' => '#',
			'title' => '',
			'target' => '_self',
		);
	}
}

if (!function_exists('reacon_solution_render_icon')) {
	function reacon_solution_render_icon($icon_data, $icon_class = '', $image_class = '')
	{
		$icon = is_array($icon_data) ? $icon_data : array();
		$source = isset($icon['icon_source']) ? (string) $icon['icon_source'] : '';

		if ('phosphor' === $source) {
			$phosphor_icon = isset($icon['phosphor_icon']) ? (string) $icon['phosphor_icon'] : '';
			$phosphor_map = array(
				'arrow-up-right' => 'ph-bold ph-arrow-up-right',
				'arrow-right' => 'ph-bold ph-arrow-right',
				'check' => 'ph-fill ph-check',
				'check-circle' => 'ph-fill ph-check-circle',
				'plus' => 'ph-bold ph-plus',
				'minus' => 'ph-bold ph-minus',
			);
			$phosphor_class = isset($phosphor_map[$phosphor_icon]) ? $phosphor_map[$phosphor_icon] : '';
			if ($phosphor_class !== '') {
				echo '<i class="' . esc_attr(trim($phosphor_class . ' ' . $icon_class)) . '" aria-hidden="true"></i>';
			}
			return;
		}

		if ('lucide' === $source) {
			$lucide_icon = isset($icon['lucide_icon']) ? (string) $icon['lucide_icon'] : '';
			if ($lucide_icon !== '') {
				echo '<i data-lucide="' . esc_attr($lucide_icon) . '" class="' . esc_attr($icon_class) . '" aria-hidden="true"></i>';
			}
			return;
		}

		if ('svg_asset' === $source) {
			$svg_asset = isset($icon['svg_asset']) ? (string) $icon['svg_asset'] : '';
			if ($svg_asset !== '' && function_exists('reacon_group_inline_svg')) {
				$svg_markup = reacon_group_inline_svg($svg_asset, $icon_class);
				if ($svg_markup) {
					echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
			return;
		}

		if ('image' === $source && isset($icon['image_asset']) && is_array($icon['image_asset'])) {
			$image = $icon['image_asset'];
			$image_url = isset($image['url']) ? (string) $image['url'] : '';
			if ($image_url !== '') {
				$image_alt = isset($image['alt']) ? (string) $image['alt'] : '';
				echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" class="' . esc_attr($image_class !== '' ? $image_class : $icon_class) . '" loading="lazy" decoding="async" />';
			}
		}
	}
}

$option_post_id = 'option';

$solution_sections = array(
	'hero' => false,
	'highlights' => false,
	'capabilities' => false,
	'cta' => false,
	'faq' => false,
);

$hero_data = array();
$highlights_data = array();
$capabilities_data = array();
$cta_data = array();
$faq_data = array();

if ($acf_enabled) {
	$solution_sections = array(
		'hero' => (bool) get_field('solution_content_enable_hero', $option_post_id),
		'highlights' => (bool) get_field('solution_content_enable_highlights', $option_post_id),
		'capabilities' => (bool) get_field('solution_content_enable_capabilities', $option_post_id),
		'cta' => (bool) get_field('solution_content_enable_cta', $option_post_id),
		'faq' => (bool) get_field('solution_content_enable_faq', $option_post_id),
	);

	$hero_data = get_field('solution_content_hero', $option_post_id);
	$highlights_data = get_field('solution_content_highlights', $option_post_id);
	$capabilities_data = get_field('solution_content_capabilities', $option_post_id);
	$cta_data = get_field('solution_content_cta', $option_post_id);
	$faq_data = get_field('solution_content_faq', $option_post_id);
}

$hero_data = is_array($hero_data) ? $hero_data : array();
$highlights_data = is_array($highlights_data) ? $highlights_data : array();
$capabilities_data = is_array($capabilities_data) ? $capabilities_data : array();
$cta_data = is_array($cta_data) ? $cta_data : array();
$faq_data = is_array($faq_data) ? $faq_data : array();

$solution_hero_bg = isset($hero_data['background_image']) && is_array($hero_data['background_image']) && !empty($hero_data['background_image']['url'])
	? (string) $hero_data['background_image']['url']
	: '';
$hero_eyebrow = isset($hero_data['eyebrow']) ? (string) $hero_data['eyebrow'] : '';
$hero_title = isset($hero_data['title']) ? (string) $hero_data['title'] : '';
$hero_lead = isset($hero_data['description']) ? (string) $hero_data['description'] : '';

$highlights_heading = isset($highlights_data['heading']) ? (string) $highlights_data['heading'] : '';
$highlights_intro = isset($highlights_data['intro']) ? (string) $highlights_data['intro'] : '';
$highlights_body = isset($highlights_data['body']) ? (string) $highlights_data['body'] : '';
$highlights_delivered_label = isset($highlights_data['delivered_label']) ? (string) $highlights_data['delivered_label'] : '';
$highlights_logo = isset($highlights_data['logo']) && is_array($highlights_data['logo']) ? $highlights_data['logo'] : array();
$highlights_video = isset($highlights_data['video_file']) && is_array($highlights_data['video_file']) ? $highlights_data['video_file'] : array();
$highlight_video_label = __('Solution highlight video', 'reacon-group');

$highlight_video_url = isset($highlights_video['url']) ? (string) $highlights_video['url'] : '';
$highlight_logo_url = isset($highlights_logo['url']) ? (string) $highlights_logo['url'] : '';
$highlight_logo_alt = isset($highlights_logo['alt']) ? (string) $highlights_logo['alt'] : '';

$capabilities_heading = isset($capabilities_data['heading']) ? (string) $capabilities_data['heading'] : '';
$capabilities_description = isset($capabilities_data['description']) ? (string) $capabilities_data['description'] : '';
$capabilities_cards = isset($capabilities_data['cards']) && is_array($capabilities_data['cards']) ? $capabilities_data['cards'] : array();
$capabilities_bullet_icon = isset($capabilities_data['bullet_icon']) && is_array($capabilities_data['bullet_icon']) ? $capabilities_data['bullet_icon'] : array();
$capabilities_default_tick_icon = home_url('/wp-content/themes/reacon-group/theme/public/solutions/capability-tick.svg');

$cta_heading = isset($cta_data['heading']) ? (string) $cta_data['heading'] : '';
$cta_description = isset($cta_data['description']) ? (string) $cta_data['description'] : '';
$cta_primary_link = reacon_solution_get_link(isset($cta_data['primary_link']) ? $cta_data['primary_link'] : array());
$cta_secondary_link = reacon_solution_get_link(isset($cta_data['secondary_link']) ? $cta_data['secondary_link'] : array());
$cta_primary_icon = isset($cta_data['primary_icon']) && is_array($cta_data['primary_icon']) ? $cta_data['primary_icon'] : array();
$cta_bg_color = isset($cta_data['background_color']) ? (string) $cta_data['background_color'] : '#0D6B75';
$cta_primary_btn_bg = isset($cta_data['primary_button_bg']) ? (string) $cta_data['primary_button_bg'] : '#FFFFFF';
$cta_primary_btn_text = isset($cta_data['primary_button_text']) ? (string) $cta_data['primary_button_text'] : '#0B6A74';
$cta_primary_btn_icon_bg = isset($cta_data['primary_button_icon_bg']) ? (string) $cta_data['primary_button_icon_bg'] : '#dbeef1';

$faq_heading = isset($faq_data['heading']) ? (string) $faq_data['heading'] : '';
$faq_description = isset($faq_data['description']) ? (string) $faq_data['description'] : '';
$faq_items = isset($faq_data['items']) && is_array($faq_data['items']) ? array_values($faq_data['items']) : array();
$faq_cta_title = isset($faq_data['cta_title']) ? (string) $faq_data['cta_title'] : '';
$faq_cta_description = isset($faq_data['cta_description']) ? (string) $faq_data['cta_description'] : '';
$faq_cta_link = reacon_solution_get_link(isset($faq_data['cta_link']) ? $faq_data['cta_link'] : array());
$faq_cta_icon = isset($faq_data['cta_icon']) && is_array($faq_data['cta_icon']) ? $faq_data['cta_icon'] : array();
?>

<main id="primary" class="overflow-x-hidden bg-background" role="main">
	<?php if ($solution_sections['hero']): ?>
		<!-- Page Section: Hero (matches About / contact notched hero) -->
		<section
			id="solution-hero"
			class="relative w-full p-1.5 md:p-2.5"
			aria-label="<?php esc_attr_e('Solution page hero', 'reacon-group'); ?>">
			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
				<img
					src="<?php echo esc_url($solution_hero_bg); ?>"
					alt=""
					aria-hidden="true"
					class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
					fetchpriority="high"
					loading="eager"
					decoding="async" />
				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
						<?php echo esc_html($hero_eyebrow); ?>
					</p>

					<h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
						<?php echo esc_html($hero_title); ?>
					</h1>

					<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
						<?php echo esc_html($hero_lead); ?>
					</p>
				</div>
			</div>
		</section>
		<!-- End Page Section: Hero -->
	<?php endif; ?>

	<?php if ($solution_sections['highlights']): ?>

		<!-- Highlights Section: scalable solutions intro, media, extended copy (Figma 570:4906). -->
		<section
			id="solution-highlights"
			class="bg-background"
			aria-labelledby="solution-highlights-heading">
			<div class="mx-auto flex w-full max-w-[1200px] flex-col gap-12 px-5 py-16 sm:gap-14 sm:px-6 sm:py-20 md:gap-16 md:py-24 lg:gap-[60px] lg:px-10 lg:py-[120px] xl:max-w-[1370px]">
				<div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between lg:gap-12">
					<h2 id="solution-highlights-heading" class="max-w-[720px] font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[40px] sm:leading-[1.15] md:text-[48px] md:leading-[1.2] lg:text-[56px] lg:leading-[73.92px]">
						<?php echo esc_html($highlights_heading); ?>
					</h2>
					<p class="max-w-[520px] font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px] lg:shrink-0 lg:pt-1">
						<?php echo esc_html($highlights_intro); ?>
					</p>
				</div>

				<figure class="relative m-0 aspect-[1370/620] w-full overflow-hidden rounded-[20px] bg-[#1c1c1c] sm:rounded-[22px] lg:rounded-[24px]">
					<?php if ($highlight_video_url !== ''): ?>
						<video
							class="absolute inset-0 h-full w-full object-cover"
							autoplay

							controlsList="nodownload"
							loop
							muted
							playsinline
							aria-label="<?php echo esc_attr($highlight_video_label); ?>">
							<source src="<?php echo esc_url($highlight_video_url); ?>" type="video/mp4" />
						</video>
					<?php else: ?>
						<span class="sr-only"><?php echo esc_html($highlight_video_label); ?></span>
					<?php endif; ?>
				</figure>

				<div class="flex flex-col gap-3 sm:gap-3">
					<p class="font-sans text-[15px] font-normal leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
						<?php echo esc_html($highlights_body); ?>
					</p>
					<div class="flex flex-col gap-2">
						<p class="font-sans text-[15px] font-medium leading-[1.42] text-foreground sm:text-base sm:leading-[22.72px]">
							<?php echo esc_html($highlights_delivered_label); ?>
						</p>
						<div class="h-[52px] w-[160px] shrink-0 sm:h-[62px] sm:w-[179px]">
							<img
								src="<?php echo esc_url($highlight_logo_url); ?>"
								alt="<?php echo esc_attr($highlight_logo_alt); ?>"
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
	<?php endif; ?>

	<?php if ($solution_sections['capabilities']): ?>
		<!-- Creation Capabilities Section: 4 core creative capability cards (Figma 570:4968). -->

		<section
			id="solution-capabilities"
			class="bg-[#ECECEC] py-16 sm:py-20 lg:py-[120px]"
			aria-labelledby="solution-capabilities-heading">
			<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
				<div class="mx-auto text-center">
					<h2
						id="solution-capabilities-heading"
						class="font-display text-[36px] font-semibold leading-tight text-foreground sm:text-[44px] lg:text-[56px] lg:leading-[73.92px]">
						<?php echo esc_html($capabilities_heading); ?>
					</h2>
					<p class="mx-auto mt-5 max-w-[720px] font-sans text-[16px] leading-[22.72px] text-foreground/80">
						<?php echo esc_html($capabilities_description); ?>
					</p>
				</div>

				<div class="mt-14 grid grid-cols-1 gap-x-[24px] gap-y-[24px] sm:mt-16 sm:grid-cols-2">
					<?php foreach ($capabilities_cards as $card): ?>
						<?php
						$card_image = isset($card['image']) && is_array($card['image']) ? $card['image'] : array();
						$card_image_url = isset($card_image['url']) ? (string) $card_image['url'] : '';
						$card_image_alt = isset($card_image['alt']) ? (string) $card_image['alt'] : '';
						$card_bullets = isset($card['bullets']) && is_array($card['bullets']) ? $card['bullets'] : array();
						$card_link = reacon_solution_get_link(isset($card['card_link']) ? $card['card_link'] : array());
						$card_title = isset($card['title']) ? (string) $card['title'] : '';
						$card_link_label = $card_link['title'] !== '' ? $card_link['title'] : $card_title;
						?>
						<article class="relative overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card">
							<a
								href="<?php echo esc_url($card_link['url']); ?>"
								target="<?php echo esc_attr($card_link['target']); ?>"
								class="absolute inset-0 z-20"
								aria-label="<?php echo esc_attr($card_link_label); ?>"></a>
							<div class="h-[260px] overflow-hidden rounded-t-[32px] rounded-b-[20px] bg-white">
								<img
									src="<?php echo esc_url($card_image_url); ?>"
									alt="<?php echo esc_attr($card_image_alt); ?>"
									loading="lazy"
									decoding="async"
									class="h-full w-full object-cover" />
							</div>

							<div class="px-[20px] pb-[20px] pt-[12px]">
								<h3 class="font-display text-[24px] font-semibold leading-[1.32] text-foreground sm:text-[28px] lg:text-[32px]">
									<?php echo esc_html($card_title); ?>
								</h3>
								<p class="mt-2 font-sans text-[16px] leading-[22.72px] text-foreground/80">
									<?php echo esc_html(isset($card['paragraph']) ? $card['paragraph'] : ''); ?>
								</p>

								<div class="mt-5 space-y-1">
									<?php foreach ($card_bullets as $bullet): ?>
										<div class="flex items-start gap-3">
											<div aria-hidden="true" class="mt-1 h-[16px] w-[16px] shrink-0">
												<img
													src="<?php echo esc_url($capabilities_default_tick_icon); ?>"
													alt=""
													class="h-[16px] w-[16px] object-contain"
													loading="lazy"
													decoding="async" />
											</div>
											<p class="font-sans text-[16px] leading-[22.72px] text-foreground">
												<?php echo esc_html(isset($bullet['text']) ? $bullet['text'] : ''); ?>
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
	<?php endif; ?>

	<?php if ($solution_sections['cta']): ?>
		<!-- Cta Section: strategic call-to-action banner (Figma 577:12234). -->
		<section
			id="solution-cta"
			class="py-10 sm:py-12 lg:py-14"
			aria-labelledby="solution-cta-heading">
			<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
				<div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]" style="background-color: <?php echo esc_attr($cta_bg_color); ?>;">
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
							<?php echo esc_html($cta_heading); ?>
						</h2>
						<p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
							<?php echo esc_html($cta_description); ?>
						</p>

						<div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
							<a
								href="<?php echo esc_url($cta_primary_link['url']); ?>"
								target="<?php echo esc_attr($cta_primary_link['target']); ?>"
								class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#0B6A74] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2"
								style="background-color: <?php echo esc_attr($cta_primary_btn_bg); ?>; color: <?php echo esc_attr($cta_primary_btn_text); ?>;">
								<span><?php echo esc_html($cta_primary_link['title']); ?></span>
								<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true" style="background-color: <?php echo esc_attr($cta_primary_btn_icon_bg); ?>;">
									<?php reacon_solution_render_icon($cta_primary_icon, 'text-[12px]', 'h-[12px] w-[12px] object-contain'); ?>
								</span>
							</a>
							<a
								href="<?php echo esc_url($cta_secondary_link['url']); ?>"
								target="<?php echo esc_attr($cta_secondary_link['target']); ?>"
								class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
								<?php echo esc_html($cta_secondary_link['title']); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Cta Section -->
	<?php endif; ?>

	<?php if ($solution_sections['faq']): ?>
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
							<?php echo esc_html($faq_heading); ?>
						</h2>
						<p class="max-w-4xl text-base leading-snug text-black">
							<?php echo esc_html($faq_description); ?>
						</p>
					</div>
				</div>

				<!-- FAQ Items -->
				<div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="Frequently asked questions list">
					<?php foreach ($faq_items as $faq_index => $faq_item): ?>
						<?php
						$faq_question = isset($faq_item['question']) ? (string) $faq_item['question'] : '';
						$faq_answer = isset($faq_item['answer']) ? (string) $faq_item['answer'] : '';
						?>
						<div
							class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
							:class="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
							itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
							<button
								type="button"
								@click="activeIndex = activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? null : <?php echo esc_attr((string) $faq_index); ?>"
								:aria-expanded="activeIndex === <?php echo esc_attr((string) $faq_index); ?>"
								aria-controls="faq-answer-<?php echo esc_attr((string) $faq_index); ?>"
								class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
								<span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
									<?php echo esc_html($faq_question); ?>
								</span>
								<span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? '−' : '+'"></span>
							</button>
							<div
								id="faq-answer-<?php echo esc_attr((string) $faq_index); ?>"
								x-show="activeIndex === <?php echo esc_attr((string) $faq_index); ?>"
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
						</div>
					<?php endforeach; ?>

					<!-- CTA card -->
					<div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
						<div class="flex flex-col gap-2">
							<p class="text-base font-medium leading-snug text-[#383B43]">
								<?php echo esc_html($faq_cta_title); ?>
							</p>
							<p class="text-base leading-snug text-[#666666]">
								<?php echo esc_html($faq_cta_description); ?>
							</p>
						</div>
						<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
						<a
							href="<?php echo esc_url($faq_cta_link['url']); ?>"
							target="<?php echo esc_attr($faq_cta_link['target']); ?>"
							class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
							<span><?php echo esc_html($faq_cta_link['title']); ?></span>
							<span aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1">
								<?php reacon_solution_render_icon($faq_cta_icon, 'text-base', 'h-[16px] w-[16px] object-contain'); ?>
							</span>
						</a>
					</div>

				</div>
			</div>
		</section>
		<!-- End Faq Section -->
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
