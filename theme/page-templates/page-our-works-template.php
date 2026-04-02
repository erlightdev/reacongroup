<?php

/**
 * Template Name: Our Works
 * Template Post Type: page
 *
 * Portfolio-style Our Works page (static placeholder content).
 *
 * @package reacon-group
 */
get_header();

$acf_enabled = function_exists('get_field');
if (!$acf_enabled) {
	get_footer();
	return;
}

if (!function_exists('reacon_our_works_render_icon')) {
	function reacon_our_works_render_icon($icon_data, $class = '')
	{
		if (empty($icon_data) || !is_array($icon_data)) {
			return;
		}

		$source = isset($icon_data['icon_source']) ? (string) $icon_data['icon_source'] : '';
		$class = trim((string) $class);

		if ('phosphor' === $source) {
			$ph_map = array(
				'arrow-right' => 'ph ph-arrow-right',
				'arrow-up-right' => 'ph ph-arrow-up-right',
				'arrow-down-right' => 'ph ph-arrow-down-right',
				'check-circle' => 'ph-fill ph-check-circle',
			);

			$preset = isset($icon_data['phosphor_icon']) ? (string) $icon_data['phosphor_icon'] : '';
			$ph_classes = '';

			if ('custom' === $preset && !empty($icon_data['phosphor_class'])) {
				$ph_classes = (string) $icon_data['phosphor_class'];
			} elseif ($preset !== '' && isset($ph_map[$preset])) {
				$ph_classes = (string) $ph_map[$preset];
			}

			if ($ph_classes !== '') {
				$all_classes = trim($ph_classes . ' ' . $class);
				echo '<i class="' . esc_attr($all_classes) . '" aria-hidden="true"></i>';
			}

			return;
		}

		if ('lucide' === $source) {
			$lucide_map = array(
				'arrow-right' => 'arrow-right',
				'arrow-up-right' => 'arrow-up-right',
				'arrow-down-right' => 'arrow-down-right',
				'check-circle' => 'check-circle',
			);

			$preset = isset($icon_data['lucide_icon']) ? (string) $icon_data['lucide_icon'] : '';
			$lname = '';

			if ('custom' === $preset && !empty($icon_data['lucide_name'])) {
				$lname = (string) $icon_data['lucide_name'];
			} elseif ($preset !== '' && isset($lucide_map[$preset])) {
				$lname = (string) $lucide_map[$preset];
			}

			if ($lname !== '') {
				echo '<i data-lucide="' . esc_attr($lname) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
			}

			return;
		}

		if ('svg_inline' === $source && !empty($icon_data['svg_inline'])) {
			echo $icon_data['svg_inline']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return;
		}

		if ('svg_asset' === $source && !empty($icon_data['svg_asset']) && function_exists('reacon_group_inline_svg')) {
			$svg_markup = reacon_group_inline_svg($icon_data['svg_asset'], $class);
			if ($svg_markup) {
				echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			return;
		}

		if ('image' === $source && !empty($icon_data['icon_image'])) {
			echo '<img src="' . esc_url($icon_data['icon_image']) . '" alt="" class="' . esc_attr($class) . '" loading="lazy" decoding="async" aria-hidden="true" />';
		}
	}
}

$page_id = get_queried_object_id();

$ow_enable_hero_section = (bool) get_field('our_works_enable_hero_section', $page_id);
$ow_enable_intro_section = (bool) get_field('our_works_enable_intro_section', $page_id);
$ow_enable_projects_section = (bool) get_field('our_works_enable_projects_section', $page_id);
$ow_enable_capabilities_section = (bool) get_field('our_works_enable_capabilities_section', $page_id);
$ow_enable_cta_section = (bool) get_field('our_works_enable_cta_section', $page_id);

$ow_hero = get_field('our_works_hero', $page_id);
$ow_hero = is_array($ow_hero) ? $ow_hero : array();

$ow_intro = get_field('our_works_intro', $page_id);
$ow_intro = is_array($ow_intro) ? $ow_intro : array();

$ow_projects = get_field('our_works_projects', $page_id);
$ow_projects = is_array($ow_projects) ? $ow_projects : array();

$ow_capabilities = get_field('our_works_capabilities', $page_id);
$ow_capabilities = is_array($ow_capabilities) ? $ow_capabilities : array();

$ow_cta = get_field('our_works_cta', $page_id);
$ow_cta = is_array($ow_cta) ? $ow_cta : array();

// Hero variables.
$hero_eyebrow = trim((string) ($ow_hero['hero_eyebrow'] ?? ''));
$hero_heading = trim((string) ($ow_hero['hero_heading'] ?? ''));
$hero_description = trim((string) ($ow_hero['hero_description'] ?? ''));

$hero_gradient_start = trim((string) ($ow_hero['hero_gradient_start'] ?? ''));
$hero_gradient_middle = trim((string) ($ow_hero['hero_gradient_middle'] ?? ''));
$hero_gradient_end = trim((string) ($ow_hero['hero_gradient_end'] ?? ''));

$hero_radial_opacity = $ow_hero['hero_radial_highlight_opacity'] ?? null;
$hero_dark_opacity = $ow_hero['hero_dark_overlay_opacity'] ?? null;
$hero_pattern_opacity = $ow_hero['hero_pattern_opacity'] ?? null;

$hero_pattern_mode = trim((string) ($ow_hero['hero_pattern_mode'] ?? ''));
$hero_pattern_custom_file = trim((string) ($ow_hero['hero_pattern_custom_file'] ?? ''));

$hero_ready = $ow_enable_hero_section
	&& $hero_eyebrow !== ''
	&& $hero_heading !== ''
	&& $hero_description !== ''
	&& $hero_gradient_start !== ''
	&& $hero_gradient_middle !== ''
	&& $hero_gradient_end !== ''
	&& null !== $hero_radial_opacity
	&& null !== $hero_dark_opacity
	&& null !== $hero_pattern_opacity
	&& $hero_pattern_mode !== '';

if ($hero_ready && 'custom_file' === $hero_pattern_mode) {
	$hero_ready = $hero_pattern_custom_file !== '';
}

$hero_bg_style = '';
$hero_radial_style = '';
$hero_dark_overlay_style = '';
$hero_pattern_style = '';

if ($hero_ready) {
	$hero_bg_style = sprintf(
		'background-image: linear-gradient(145deg,%s 0%%,%s 42%%,%s 100%%);',
		esc_attr($hero_gradient_start),
		esc_attr($hero_gradient_middle),
		esc_attr($hero_gradient_end)
	);

	$hero_radial_style = sprintf('opacity:%s;', (string) $hero_radial_opacity);
	$hero_dark_overlay_style = sprintf('opacity:%s;', (string) $hero_dark_opacity);

	// Preserve the original built-in registration-grid appearance by not applying an
	// extra opacity multiplier to the default tile. Only apply opacity when a custom
	// SVG/PNG tile is used.
	$hero_pattern_style = '';
	if ('custom_file' === $hero_pattern_mode) {
		$hero_pattern_style = sprintf('opacity:%s;', (string) $hero_pattern_opacity);
	}
	if ('custom_file' === $hero_pattern_mode && $hero_pattern_custom_file !== '') {
		$hero_pattern_style .= '--so-hero-pattern-svg:url("' . esc_url($hero_pattern_custom_file) . '");';
	}
}

// Intro variables.
$intro_heading = trim((string) ($ow_intro['intro_heading'] ?? ''));
$intro_description = trim((string) ($ow_intro['intro_description'] ?? ''));
$intro_ready = $ow_enable_intro_section && $intro_heading !== '' && $intro_description !== '';

// Projects variables.
$load_more_label = trim((string) ($ow_projects['load_more_label'] ?? ''));
$load_more_icon = isset($ow_projects['load_more_icon']) && is_array($ow_projects['load_more_icon']) ? $ow_projects['load_more_icon'] : array();

$works_projects = array();
if ($ow_enable_projects_section) {
	$raw_projects = is_array($ow_projects['projects'] ?? null) ? (array) ($ow_projects['projects'] ?? array()) : array();

	foreach ($raw_projects as $proj) {
		if (!is_array($proj)) {
			continue;
		}

		$image_url = trim((string) ($proj['project_image'] ?? ''));
		$title = trim((string) ($proj['project_title'] ?? ''));
		$category = trim((string) ($proj['project_category'] ?? ''));
		$excerpt = trim((string) ($proj['project_excerpt'] ?? ''));

		$cta_icon = isset($proj['project_cta_icon']) && is_array($proj['project_cta_icon']) ? $proj['project_cta_icon'] : array();

		$link = $proj['project_cta_link'] ?? array();
		$link_url = '';
		$link_target = '_self';
		$link_title = '';

		if (is_array($link)) {
			$link_url = trim((string) ($link['url'] ?? ''));
			$link_target = trim((string) ($link['target'] ?? '_self'));
			$link_title = trim((string) ($link['title'] ?? ''));
		}

		$cta_label = $link_title;

		if (
			$image_url === '' ||
			$title === '' ||
			$category === '' ||
			$excerpt === '' ||
			$cta_label === '' ||
			$link_url === '' ||
			empty($cta_icon)
		) {
			continue;
		}

		$works_projects[] = array(
			'image' => $image_url,
			'title' => $title,
			'category' => $category,
			'excerpt' => $excerpt,
			'cta_label' => $cta_label,
			'cta_url' => $link_url,
			'cta_target' => $link_target,
			'cta_icon' => $cta_icon,
		);
	}
}

$projects_ready = $ow_enable_projects_section && $load_more_label !== '' && !empty($works_projects) && !empty($load_more_icon);

// Capabilities variables.
$cap_heading = trim((string) ($ow_capabilities['capabilities_heading'] ?? ''));
$capabilities_image = trim((string) ($ow_capabilities['capabilities_image'] ?? ''));

$cap_raw_items = is_array($ow_capabilities['capabilities_items'] ?? null) ? (array) ($ow_capabilities['capabilities_items'] ?? array()) : array();
$capability_items = array();

foreach ($cap_raw_items as $it) {
	if (!is_array($it)) {
		continue;
	}

	$item_text = trim((string) ($it['capability_text'] ?? ''));
	$item_icon = isset($it['capability_icon']) && is_array($it['capability_icon']) ? $it['capability_icon'] : array();

	if ($item_text === '' || empty($item_icon)) {
		continue;
	}

	$capability_items[] = array(
		'text' => $item_text,
		'icon' => $item_icon,
	);
}

$capabilities_ready = $ow_enable_capabilities_section && $cap_heading !== '' && $capabilities_image !== '' && count($capability_items) === 3;

// CTA variables.
$cta_heading = trim((string) ($ow_cta['cta_heading'] ?? ''));
$cta_description = trim((string) ($ow_cta['cta_description'] ?? ''));

$primary_label = trim((string) ($ow_cta['primary_button_label'] ?? ''));
$primary_link = $ow_cta['primary_button_link'] ?? array();
$primary_link_url = is_array($primary_link) ? trim((string) ($primary_link['url'] ?? '')) : '';
$primary_link_target = is_array($primary_link) ? trim((string) ($primary_link['target'] ?? '_self')) : '_self';
$primary_icon = isset($ow_cta['primary_button_icon']) && is_array($ow_cta['primary_button_icon']) ? $ow_cta['primary_button_icon'] : array();

$secondary_label = trim((string) ($ow_cta['secondary_button_label'] ?? ''));
$secondary_link = $ow_cta['secondary_button_link'] ?? array();
$secondary_link_url = is_array($secondary_link) ? trim((string) ($secondary_link['url'] ?? '')) : '';
$secondary_link_target = is_array($secondary_link) ? trim((string) ($secondary_link['target'] ?? '_self')) : '_self';
$secondary_icon = isset($ow_cta['secondary_button_icon']) && is_array($ow_cta['secondary_button_icon']) ? $ow_cta['secondary_button_icon'] : array();

$cta_ready = $ow_enable_cta_section
	&& $cta_heading !== ''
	&& $cta_description !== ''
	&& $primary_label !== ''
	&& $primary_link_url !== ''
	&& !empty($primary_icon)
	&& $secondary_label !== ''
	&& $secondary_link_url !== ''
	&& !empty($secondary_icon);
?>

<main id="primary" class="overflow-x-hidden bg-[#f6f6f6]" role="main">
	<!-- Page Header Hero -->
	<?php if ($hero_ready): ?>
		<section
			id="our-works-hero"
			class="relative w-full p-1.5 md:p-2.5"
			aria-labelledby="our-works-heading">
			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[linear-gradient(145deg,#0E6D77_0%,#062B53_42%,#0A4E57_100%)] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]" style="<?php echo esc_attr($hero_bg_style); ?>">
				<div class="reacon-works-hero-pattern pointer-events-none absolute inset-0" aria-hidden="true" style="<?php echo esc_attr($hero_pattern_style); ?>"></div>
				<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_85%_60%_at_50%_-10%,rgba(30,202,211,0.22)_0%,transparent_55%)]" aria-hidden="true" style="<?php echo esc_attr($hero_radial_style); ?>"></div>
				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.22)_0%,rgba(0,10,33,0.12)_45%,rgba(0,10,33,0.26)_100%)]" aria-hidden="true" style="<?php echo esc_attr($hero_dark_overlay_style); ?>"></div>
				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
						<?php echo esc_html($hero_eyebrow); ?>
					</p>
					<h1 id="our-works-heading" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
						<?php echo esc_html($hero_heading); ?>
					</h1>
					<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
						<?php echo esc_html($hero_description); ?>
					</p>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Intro -->
	<?php if ($intro_ready): ?>
		<section class="bg-white px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-intro-heading">
			<div class="mx-auto w-full max-w-7xl">
				<h2 id="our-works-intro-heading" class="max-w-3xl font-display text-[28px] font-semibold leading-[1.2] text-[#0F172A] sm:text-[34px] lg:text-[40px]">
					<?php echo esc_html($intro_heading); ?>
				</h2>
				<p class="mt-4 max-w-3xl font-sans text-[15px] leading-[1.55] text-[#4B5058] sm:text-[16px] lg:text-[17px]">
					<?php echo esc_html($intro_description); ?>
				</p>
			</div>
		</section>
	<?php endif; ?>

	<!-- Project grid -->
	<?php if ($projects_ready): ?>
		<section class="bg-slate-50 px-4 py-12 sm:px-6 sm:py-16 lg:px-8" aria-label="<?php esc_attr_e('Featured projects', 'reacon-group'); ?>">
	<style>
		/* Prevent flash before Alpine initializes x-cloak elements. */
		[x-cloak] {
			display: none !important;
		}
	</style>
	<div class="mx-auto w-full max-w-7xl" x-data="{ visibleCount: 3, perPage: 3, totalCount: <?php echo (int) count($works_projects); ?> }">
		
		<!-- Optional: Enterprise-style section header could go here -->
		
		<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-10">
			<?php foreach ($works_projects as $index => $project): ?>
				<!-- Card acts as a static display panel, not a clickable link -->
				<article
					class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/70 bg-white shadow-[0_1px_2px_rgba(15,23,42,0.04)] transition-[transform,box-shadow,border-color] duration-300 hover:-translate-y-0.5 hover:border-slate-300/90 hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)]"
					x-data="{ idx: <?php echo (int) $index; ?> }"
					x-show="idx < visibleCount"
					x-transition:enter="transition-all ease-out duration-300"
					x-transition:enter-start="opacity-0 translate-y-2"
					x-transition:enter-end="opacity-100 translate-y-0"
					x-transition:leave="transition-all ease-in duration-200"
					x-transition:leave-start="opacity-100 translate-y-0"
					x-transition:leave-end="opacity-0 translate-y-2"
					x-cloak>
					
					<!-- Image Container -->
					<div class="relative aspect-[16/10] w-full overflow-hidden bg-slate-100">
						<img
							src="<?php echo esc_url($project['image']); ?>"
							alt="<?php echo esc_attr($project['title']); ?>"
							class="h-full w-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-[1.04]"
							loading="lazy"
							decoding="async" 
						/>
						<!-- Subtle gradient overlay on hover for premium feel -->
						<div class="absolute inset-0 bg-gradient-to-t from-slate-900/18 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 pointer-events-none"></div>
					</div>

					<!-- Content Area -->
					<div class="flex flex-1 flex-col p-5 sm:p-6 lg:p-7">
						
						<!-- Sleek Category Label with "Status" Dot -->
						<div class="flex items-center gap-2">
							<span class="h-1.5 w-1.5 rounded-full bg-primary" aria-hidden="true"></span>
							<p class="font-sans text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">
								<?php echo esc_html($project['category']); ?>
							</p>
						</div>

						<!-- Title -->
						<h3 class="mt-4 font-display text-[18px] font-semibold tracking-tight text-slate-900 sm:text-[20px]">
							<?php echo esc_html($project['title']); ?>
						</h3>

						<!-- Excerpt -->
						<p class="mt-2 flex-1 font-sans text-sm leading-relaxed text-slate-600">
							<?php echo esc_html($project['excerpt']); ?>
						</p>

					</div>

					<!-- Dedicated Call-to-Action Footer -->
					<div class="border-t border-slate-100 bg-white/60 px-5 py-3.5 sm:px-6 transition-colors duration-300 group-hover:bg-slate-50">
						<a
							href="<?php echo esc_url($project['cta_url']); ?>"
							class="group/link flex items-center justify-between font-sans text-sm font-semibold text-slate-900 transition-colors hover:text-primary focus:outline-none"
							<?php if (!empty($project['cta_target']) && '_self' !== $project['cta_target']) : ?>
								target="<?php echo esc_attr($project['cta_target']); ?>"
								rel="noopener noreferrer"
							<?php endif; ?>
						>
							<span><?php echo esc_html($project['cta_label']); ?></span>
							
							<!-- Arrow animates to the right to indicate moving forward/contacting -->
							<span class="flex h-8 w-8 items-center justify-center rounded-full bg-white border border-slate-200 text-slate-400 transition-all duration-300 group-hover/link:border-primary group-hover/link:bg-primary group-hover/link:text-white group-hover/link:translate-x-1 shadow-sm">
								<?php reacon_our_works_render_icon($project['cta_icon'], 'text-sm'); ?>
							</span>
						</a>
					</div>
					
				</article>
			<?php endforeach; ?>
		</div>
		<div class="mt-10 flex items-center justify-center">
			<button
				type="button"
				class="inline-flex cursor-pointer items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 font-sans text-sm font-semibold text-slate-900 shadow-sm transition-colors hover:border-slate-300 hover:bg-white/80 disabled:opacity-50 disabled:hover:bg-white"
				@click="visibleCount = Math.min(visibleCount + perPage, totalCount)"
				x-show="visibleCount < totalCount"
				x-transition:enter="transition-all ease-out duration-300"
				x-transition:enter-start="opacity-0 translate-y-2"
				x-transition:enter-end="opacity-100 translate-y-0"
				x-transition:leave="transition-all ease-in duration-200"
				x-transition:leave-start="opacity-100 translate-y-0"
				x-transition:leave-end="opacity-0 translate-y-2"
				x-cloak
			>
				<span><?php echo esc_html($load_more_label); ?></span>
				<?php reacon_our_works_render_icon($load_more_icon, 'text-[16px]'); ?>
			</button>
		</div>
	</div>
		</section>
	<?php endif; ?>

	<!-- Capabilities strip -->
	<?php if ($capabilities_ready): ?>
		<section class="bg-white px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-capabilities-heading">
			<div class="mx-auto w-full max-w-7xl">
				<div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center lg:gap-12">
					<div>
						<h2 id="our-works-capabilities-heading" class="font-display text-[26px] font-semibold leading-[1.2] text-[#0F172A] sm:text-[30px] lg:text-[34px]">
							<?php echo esc_html($cap_heading); ?>
						</h2>
						<ul class="mt-6 space-y-4 font-sans text-[15px] leading-[1.5] text-[#4B5058] sm:text-[16px]">
							<li class="flex gap-3">
								<?php reacon_our_works_render_icon($capability_items[0]['icon'], 'mt-0.5 shrink-0 text-primary text-lg'); ?>
								<span><?php echo esc_html($capability_items[0]['text']); ?></span>
							</li>
							<li class="flex gap-3">
								<?php reacon_our_works_render_icon($capability_items[1]['icon'], 'mt-0.5 shrink-0 text-primary text-lg'); ?>
								<span><?php echo esc_html($capability_items[1]['text']); ?></span>
							</li>
							<li class="flex gap-3">
								<?php reacon_our_works_render_icon($capability_items[2]['icon'], 'mt-0.5 shrink-0 text-primary text-lg'); ?>
								<span><?php echo esc_html($capability_items[2]['text']); ?></span>
							</li>
						</ul>
					</div>
					<div class="overflow-hidden rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB]">
						<img
							src="<?php echo esc_url($capabilities_image); ?>"
							alt=""
							class="h-full w-full object-cover object-center"
							loading="lazy"
							decoding="async" />
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- CTA -->
	<?php if ($cta_ready): ?>
		<section class="bg-[#0E6D77] px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-cta-heading">
			<div class="mx-auto flex w-full max-w-7xl flex-col items-start justify-between gap-8 lg:flex-row lg:items-center">
				<div class="max-w-2xl">
					<h2 id="our-works-cta-heading" class="font-display text-[26px] font-semibold leading-[1.2] text-white sm:text-[30px] lg:text-[34px]">
						<?php echo esc_html($cta_heading); ?>
					</h2>
					<p class="mt-3 font-sans text-[15px] leading-[1.5] text-white/90 sm:text-[16px]">
						<?php echo esc_html($cta_description); ?>
					</p>
				</div>
				<div class="flex w-full flex-col gap-3 sm:flex-row sm:w-auto">
					<a
						href="<?php echo esc_url($primary_link_url); ?>"
						class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 font-sans text-[15px] font-medium text-[#0E6D77] transition-colors hover:bg-[#E9FBFC]"
						<?php if (!empty($primary_link_target) && '_self' !== $primary_link_target) : ?>
							target="<?php echo esc_attr($primary_link_target); ?>"
							rel="noopener noreferrer"
						<?php endif; ?>
					>
						<?php echo esc_html($primary_label); ?>
						<?php reacon_our_works_render_icon($primary_icon, 'text-[16px]'); ?>
					</a>
					<a
						href="<?php echo esc_url($secondary_link_url); ?>"
						class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 px-6 py-3 font-sans text-[15px] font-medium text-white transition-colors hover:bg-white/10"
						<?php if (!empty($secondary_link_target) && '_self' !== $secondary_link_target) : ?>
							target="<?php echo esc_attr($secondary_link_target); ?>"
							rel="noopener noreferrer"
						<?php endif; ?>
					>
						<?php echo esc_html($secondary_label); ?>
						<?php reacon_our_works_render_icon($secondary_icon, 'text-[16px]'); ?>
					</a>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<style>
		/* Hero: registration-style grid + diagonal texture (print / production portfolio mood). */
		#our-works-hero .reacon-works-hero-pattern {
			--so-hero-pattern-svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23FFFFFF' stroke-opacity='0.1'%3E%3Cpath d='M36 10v52M10 36h52' stroke-width='1'/%3E%3Ccircle cx='36' cy='36' r='3' stroke-opacity='0.14' stroke-width='1'/%3E%3C/g%3E%3Cpath d='M0 72L72 0' stroke='%23FFFFFF' stroke-opacity='0.04' stroke-width='1'/%3E%3C/svg%3E");
			background-image:
				var(--so-hero-pattern-svg),
				repeating-linear-gradient(
					-18deg,
					transparent,
					transparent 14px,
					rgba(255, 255, 255, 0.025) 14px,
					rgba(255, 255, 255, 0.025) 15px
				);
			background-size: 72px 72px, auto;
		}

		/* Desktop-only top notch (matches About / Contact hero). */
		@media (min-width: 1024px) {
			#our-works-hero .reacon-about-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 40px;
				--hero-notch-height: 86px;
				--hero-notch-swoop: 40px;
			}

			#our-works-hero .reacon-about-hero-card::before {
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

			#our-works-hero .reacon-about-hero-card::after {
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
			const syncOurWorksHeroNotchToDesktopMenu = () => {
				const heroCard = document.querySelector('#our-works-hero .reacon-about-hero-card');
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

			let worksNotchRaf = null;
			const scheduleWorksNotchSync = () => {
				if (worksNotchRaf) cancelAnimationFrame(worksNotchRaf);
				worksNotchRaf = requestAnimationFrame(syncOurWorksHeroNotchToDesktopMenu);
			};

			scheduleWorksNotchSync();
			window.addEventListener('resize', scheduleWorksNotchSync);
			window.addEventListener('load', scheduleWorksNotchSync);
			if (document.fonts && document.fonts.ready) {
				document.fonts.ready.then(scheduleWorksNotchSync).catch(() => {});
			}
		});
	</script>
</main>

<?php
get_footer();
