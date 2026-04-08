<?php

/**
 * Template Name: Start an Order
 * Template Post Type: page
 *
 * Static design pass for Start an Order page.
 *
 * @package reacon-group
 */
get_header();
?>

<?php
$acf_enabled = function_exists('get_field');
$start_order_page_id = (int) get_queried_object_id();

$start_order_show_hero = false;
$start_order_show_form_section = false;
$start_order_show_stats_section = false;

$so_hero = array();
$so_form = array();
$so_stats = array();

$so_hero_bg_style = '';
$so_pattern_style = '';
$so_radial_style = '';
$so_dark_overlay_style = '';

$so_thank_you_url = '';
$so_steps = array();
$so_stats_items = array();

if ($acf_enabled) {
	$start_order_enable_hero = (bool) get_field('start_order_enable_hero_section', $start_order_page_id);
	$start_order_enable_form = (bool) get_field('start_order_enable_form_section', $start_order_page_id);
	$start_order_enable_stats = (bool) get_field('start_order_enable_stats_section', $start_order_page_id);

	$so_hero = get_field('start_order_hero', $start_order_page_id);
	$so_form = get_field('start_order_form_section', $start_order_page_id);
	$so_stats = get_field('start_order_stats_section', $start_order_page_id);

	$so_hero = is_array($so_hero) ? $so_hero : array();
	$so_form = is_array($so_form) ? $so_form : array();
	$so_stats = is_array($so_stats) ? $so_stats : array();

	if ($start_order_enable_hero) {
		$hero_eyebrow = trim((string) ($so_hero['hero_eyebrow'] ?? ''));
		$hero_heading = trim((string) ($so_hero['hero_heading'] ?? ''));
		$hero_description = trim((string) ($so_hero['hero_description'] ?? ''));

		$g_start = trim((string) ($so_hero['hero_gradient_start'] ?? ''));
		$g_middle = trim((string) ($so_hero['hero_gradient_middle'] ?? ''));
		$g_end = trim((string) ($so_hero['hero_gradient_end'] ?? ''));

		$radial_opacity = $so_hero['hero_radial_highlight_opacity'] ?? null;
		$dark_opacity = $so_hero['hero_dark_overlay_opacity'] ?? null;
		$pattern_opacity = $so_hero['hero_pattern_opacity'] ?? null;

		$pattern_mode = trim((string) ($so_hero['hero_pattern_mode'] ?? ''));
		$pattern_custom_file = $so_hero['hero_pattern_custom_file'] ?? '';

		$radial_opacity = is_numeric($radial_opacity) ? (float) $radial_opacity : null;
		$dark_opacity = is_numeric($dark_opacity) ? (float) $dark_opacity : null;
		$pattern_opacity = is_numeric($pattern_opacity) ? (float) $pattern_opacity : null;

		$pattern_custom_url = '';
		if (is_string($pattern_custom_file)) {
			$pattern_custom_url = trim($pattern_custom_file);
		} elseif (is_array($pattern_custom_file) && !empty($pattern_custom_file['url'])) {
			$pattern_custom_url = trim((string) $pattern_custom_file['url']);
		}

		// Clamp opacities to [0..1] to avoid invalid CSS.
		if (null !== $radial_opacity)
			$radial_opacity = max(0.0, min(1.0, $radial_opacity));
		if (null !== $dark_opacity)
			$dark_opacity = max(0.0, min(1.0, $dark_opacity));
		if (null !== $pattern_opacity)
			$pattern_opacity = max(0.0, min(1.0, $pattern_opacity));

		$pattern_needs_custom = ('custom_file' === $pattern_mode);

		$hero_ready = $hero_eyebrow !== '' && $hero_heading !== '' && $hero_description !== '' && $g_start !== '' && $g_middle !== '' && $g_end !== '';
		$hero_ready = $hero_ready && (null !== $radial_opacity) && (null !== $dark_opacity) && (null !== $pattern_opacity) && $pattern_mode !== '';
		if ($pattern_needs_custom) {
			$hero_ready = $hero_ready && $pattern_custom_url !== '';
		}

		if ($hero_ready) {
			$start_order_show_hero = true;
			$so_hero_bg_style = sprintf(
				'background-image: linear-gradient(145deg,%s 0%%,%s 42%%,%s 100%%);',
				esc_attr($g_start),
				esc_attr($g_middle),
				esc_attr($g_end)
			);

			$so_radial_style = sprintf('opacity:%s;', (string) $radial_opacity);
			$so_dark_overlay_style = sprintf('opacity:%s;', (string) $dark_opacity);

			// Preserve the original built-in registration-grid appearance by only
			// applying the extra opacity multiplier when using a custom tile.
			$so_pattern_style = '';
			if ($pattern_needs_custom) {
				$so_pattern_style = sprintf('opacity:%s;', (string) $pattern_opacity);
				if ($pattern_custom_url !== '') {
					$so_pattern_style .= '--so-hero-pattern-svg:url("' . esc_url($pattern_custom_url) . '");';
				}
			}
		}
	}

	if ($start_order_enable_form) {
		$left_heading = trim((string) ($so_form['form_card_heading'] ?? ''));
		$left_body = trim((string) ($so_form['form_card_body'] ?? ''));
		$how_heading = trim((string) ($so_form['how_it_works_heading'] ?? ''));

		$form_cf7_id = $so_form['cf7_form'] ?? 0;
		$form_cf7_id = is_numeric($form_cf7_id) ? absint($form_cf7_id) : 0;

		$thank_you_link = $so_form['thank_you_link'] ?? null;
		if (is_array($thank_you_link) && !empty($thank_you_link['url'])) {
			$so_thank_you_url = trim((string) $thank_you_link['url']);
		}

		$so_steps = is_array($so_form['steps'] ?? null) ? (array) ($so_form['steps'] ?? array()) : array();

		$steps_ok = count($so_steps) === 4;
		if ($steps_ok) {
			foreach ($so_steps as $s) {
				if (!is_array($s)) {
					$steps_ok = false;
					break;
				}

				$label = trim((string) ($s['step_number_label'] ?? ''));
				$text = trim((string) ($s['step_description'] ?? ''));
				if ($label === '' || $text === '') {
					$steps_ok = false;
					break;
				}
			}
		}

		$form_ready = $left_heading !== '' && $left_body !== '' && $how_heading !== '' && $form_cf7_id > 0 && $so_thank_you_url !== '' && $steps_ok;
		if ($form_ready) {
			$start_order_show_form_section = true;
		}
	}

	if ($start_order_enable_stats) {
		$so_stats_items = is_array($so_stats['stats_items'] ?? null) ? (array) ($so_stats['stats_items'] ?? array()) : array();
		$stats_ok = count($so_stats_items) === 4;
		if ($stats_ok) {
			foreach ($so_stats_items as $st) {
				$val = trim((string) ($st['stat_value'] ?? ''));
				$desc = trim((string) ($st['stat_description'] ?? ''));
				if ($val === '' || $desc === '') {
					$stats_ok = false;
					break;
				}
			}
		}
		if ($stats_ok) {
			$start_order_show_stats_section = true;
			$so_stats_items = array_values($so_stats_items);
			$so_stats['stats_items'] = $so_stats_items;
		}
	}
}

// Steps now render number labels only (no icon mode selection).
?>

<main id="primary" class="overflow-x-hidden" role="main">
	<!-- Page Header Hero -->
	<?php if ($start_order_show_hero): ?>
		<section id="start-order-hero" class="relative w-full p-0 md:p-2.5" aria-labelledby="start-order-heading">
			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] bg-[linear-gradient(145deg,#0E6D77_0%,#062B53_42%,#0A4E57_100%)] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]" style="<?php echo esc_attr($so_hero_bg_style); ?>">
				<div class="reacon-start-order-hero-pattern pointer-events-none absolute inset-0" aria-hidden="true" style="<?php echo esc_attr($so_pattern_style); ?>"></div>
				<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_85%_60%_at_50%_-10%,rgba(30,202,211,0.22)_0%,transparent_55%)]" aria-hidden="true" style="<?php echo esc_attr($so_radial_style); ?>"></div>
				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.22)_0%,rgba(0,10,33,0.12)_45%,rgba(0,10,33,0.26)_100%)]" aria-hidden="true" style="<?php echo esc_attr($so_dark_overlay_style); ?>"></div>

				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<p class="reacon-type-overline mb-4 text-white/85 lg:mb-5"><?php echo esc_html((string) ($so_hero['hero_eyebrow'] ?? '')); ?></p>
					<h1 id="start-order-heading" class="reacon-type-h1 max-w-[860px] text-white">
						<?php echo esc_html((string) ($so_hero['hero_heading'] ?? '')); ?>
					</h1>
					<p class="reacon-type-lead mt-4 max-w-[780px] text-white/90 lg:mt-5">
						<?php echo esc_html((string) ($so_hero['hero_description'] ?? '')); ?>
					</p>
				</div>
			</div>
		</section>
	<?php endif; ?>



	<!-- Form Layout -->
	<?php if ($start_order_show_form_section): ?>
		<section class="bg-[#FAFAFA] px-4 py-12 sm:px-6 md:py-14 lg:px-8 lg:py-16" aria-labelledby="order-form-title">
			<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-8 lg:grid-cols-[minmax(0,1fr)_360px] lg:gap-10">
				<div class="rounded-3xl border border-[#ECEFF2] bg-white p-5 sm:p-6 md:p-8">
					<h2 id="order-form-title" class="reacon-type-h2 text-[#1E293B]"><?php echo esc_html((string) ($so_form['form_card_heading'] ?? '')); ?></h2>
					<p class="reacon-type-body mt-3 text-[#4B5058]">
						<?php echo esc_html((string) ($so_form['form_card_body'] ?? '')); ?>
					</p>

					<div class="start-order-cf7 mt-8">
						<?php
						$cf7_form_id = isset($so_form['cf7_form']) ? absint((int) $so_form['cf7_form']) : 0;
						if ($cf7_form_id > 0) {
							echo do_shortcode('[contact-form-7 id="' . esc_attr((string) $cf7_form_id) . '"]');
						}
						?>
					</div>
				</div>

				<aside class="rounded-3xl border border-[#ECEFF2] bg-white p-6 sm:p-7 lg:sticky lg:top-28 lg:h-fit" aria-label="How it works">
					<h3 class="reacon-type-h3 text-[#1E293B]"><?php echo esc_html((string) ($so_form['how_it_works_heading'] ?? '')); ?></h3>
					<ol class="mt-6 space-y-5">
						<?php foreach ($so_steps as $step): ?>
							<?php
							if (!is_array($step))
								continue;
							$step_desc = trim((string) ($step['step_description'] ?? ''));
							$step_number = trim((string) ($step['step_number_label'] ?? ''));
							?>
							<li class="flex gap-3">
								<span class="reacon-type-caption mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary font-semibold text-white">
									<?php echo esc_html($step_number); ?>
								</span>
								<p class="reacon-type-body text-[#4B5058]"><?php echo esc_html($step_desc); ?></p>
							</li>
						<?php endforeach; ?>
					</ol>
				</aside>
			</div>
		</section>
	<?php endif; ?>
	<!-- Intro Stats -->
	<?php if ($start_order_show_stats_section): ?>
		<section class="bg-white px-4 py-10 sm:px-6 sm:py-12 md:py-14 lg:px-8 lg:py-16" aria-label="Order highlights">
			<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
				<?php
				$stats_items = is_array($so_stats['stats_items'] ?? null) ? (array) $so_stats['stats_items'] : array();
				foreach ($stats_items as $stat):
					if (!is_array($stat))
						continue;
					$stat_val = trim((string) ($stat['stat_value'] ?? ''));
					$stat_desc = trim((string) ($stat['stat_description'] ?? ''));
					if ($stat_val === '' || $stat_desc === '')
						continue;
				?>
					<div class="rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB] p-6">
						<p class="reacon-type-h3 text-primary"><?php echo esc_html($stat_val); ?></p>
						<p class="reacon-type-body mt-2 text-[#383B43]"><?php echo esc_html($stat_desc); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
	<style>
		/* Hero pattern mirrors Our Works for cross-page consistency. */
		#start-order-hero .reacon-start-order-hero-pattern {
			--so-hero-pattern-svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23FFFFFF' stroke-opacity='0.1'%3E%3Cpath d='M36 10v52M10 36h52' stroke-width='1'/%3E%3Ccircle cx='36' cy='36' r='3' stroke-opacity='0.14' stroke-width='1'/%3E%3C/g%3E%3Cpath d='M0 72L72 0' stroke='%23FFFFFF' stroke-opacity='0.04' stroke-width='1'/%3E%3C/svg%3E");
			background-image:
				var(--so-hero-pattern-svg),
				repeating-linear-gradient(-18deg,
					transparent,
					transparent 14px,
					rgba(255, 255, 255, 0.025) 14px,
					rgba(255, 255, 255, 0.025) 15px);
			background-size: 72px 72px, auto;
		}

		/* Start an Order CF7 form styles */
		.start-order-cf7 .wpcf7 {
			margin: 0;
		}

		.start-order-cf7 .wpcf7 br {
			display: none;
		}

		.start-order-cf7 .wpcf7 p {
			margin: 0;
		}

		.start-order-cf7 .so-grid {
			display: grid;
			grid-template-columns: 1fr;
			gap: 20px;
		}

		@media (min-width: 640px) {
			.start-order-cf7 .so-grid {
				grid-template-columns: repeat(2, minmax(0, 1fr));
				column-gap: 24px;
			}

			.start-order-cf7 .so-col-2 {
				grid-column: span 2 / span 2;
			}
		}

		.start-order-cf7 .so-label {
			display: block;
			margin-bottom: 8px;
			padding: 2px;
			font-family: var(--font-sans);
			font-size: var(--reacon-text-caption-size);
			line-height: var(--reacon-text-caption-line-height);
			font-weight: 500;
			color: #383b43;
			letter-spacing: var(--reacon-letter-spacing);
		}

		.start-order-cf7 .wpcf7-form-control-wrap {
			display: block;
		}

		.start-order-cf7 .so-label .wpcf7-form-control-wrap {
			margin-top: 6px;
		}

		.start-order-cf7 .so-grid>div {
			margin: 2px 0;
		}

		.start-order-cf7 input[type="text"],
		.start-order-cf7 input[type="email"],
		.start-order-cf7 input[type="tel"],
		.start-order-cf7 select,
		.start-order-cf7 textarea {
			width: 100%;
			padding: 2px;
			border: 1px solid #e5e7eb;
			background: #fff;
			color: #1e293b;
			font-size: var(--reacon-text-body-size);
			line-height: var(--reacon-text-body-line-height);
			font-family: var(--font-sans);
			letter-spacing: var(--reacon-letter-spacing);
			transition: border-color 0.2s ease;
			outline: none;
		}

		.start-order-cf7 input[type="text"],
		.start-order-cf7 input[type="email"],
		.start-order-cf7 input[type="tel"],
		.start-order-cf7 select {
			height: 46px;
			padding: 0 16px;
			border-radius: 12px;
		}

		.start-order-cf7 select {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			padding-right: 44px;
			background-image:
				url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 256 256'%3E%3Cpath fill='%231E293B' d='M213.66 101.66a8 8 0 0 1 0 11.31l-80 80a8 8 0 0 1-11.32 0l-80-80a8 8 0 0 1 11.32-11.31L128 176l74.34-74.34a8 8 0 0 1 11.32 0Z'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-position: right 14px center;
			background-size: 18px 18px;
			cursor: pointer;
		}

		.start-order-cf7 select::-ms-expand {
			display: none;
		}

		.start-order-cf7 textarea {
			height: 90px;
			min-height: 90px;
			padding: 12px 16px;
			border-radius: 12px;
			resize: vertical;
		}

		.start-order-cf7 input:focus,
		.start-order-cf7 select:focus,
		.start-order-cf7 textarea:focus {
			border-color: var(--color-primary, #0a969b);
		}

		.start-order-cf7 .wpcf7-submit {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			border: 0;
			border-radius: 9999px;
			background: var(--color-primary, #0a969b);
			padding: 12px 24px;
			font-family: var(--font-sans);
			font-size: var(--reacon-text-button-size);
			line-height: var(--reacon-text-button-line-height);
			font-weight: 500;
			letter-spacing: var(--reacon-letter-spacing);
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}

		.start-order-cf7 .wpcf7-submit:hover {
			background: var(--color-secondary, #0e6d77);
		}

		.start-order-cf7 .wpcf7 form .wpcf7-response-output {
			margin: 14px 0 0;
			padding: 10px 14px;
			border-radius: 12px;
			font-family: var(--font-sans);
			font-size: var(--reacon-text-caption-size);
			line-height: var(--reacon-text-caption-line-height);
		}

		.start-order-cf7 .wpcf7-not-valid-tip {
			margin-top: 6px;
			font-family: var(--font-sans);
			font-size: var(--reacon-text-caption-size);
			line-height: var(--reacon-text-caption-line-height);
		}

		.start-order-cf7 .wpcf7-spinner {
			margin: 8px 0 0 10px;
			vertical-align: middle;
		}

		.start-order-cf7 .wpcf7 form.sent .wpcf7-response-output {
			border-color: #0a969b;
			color: #0b5a60;
			background: rgba(10, 150, 155, 0.08);
		}

		.start-order-cf7 .wpcf7 form.invalid .wpcf7-response-output,
		.start-order-cf7 .wpcf7 form.unaccepted .wpcf7-response-output,
		.start-order-cf7 .wpcf7 form.payment-required .wpcf7-response-output {
			border-color: #f87171;
			color: #b91c1c;
			background: #fff1f2;
		}

		/* Desktop-only top notch to keep header/hero consistency with About page. */
		@media (min-width: 1024px) {
			#start-order-hero .reacon-about-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 40px;
				--hero-notch-height: 86px;
				--hero-notch-swoop: 40px;
			}

			#start-order-hero .reacon-about-hero-card::before {
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

			#start-order-hero .reacon-about-hero-card::after {
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
			const syncStartOrderHeroNotchToDesktopMenu = () => {
				const heroCard = document.querySelector('#start-order-hero .reacon-about-hero-card');
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

			let startOrderNotchSyncRaf = null;
			const scheduleStartOrderNotchSync = () => {
				if (startOrderNotchSyncRaf) {
					cancelAnimationFrame(startOrderNotchSyncRaf);
				}
				startOrderNotchSyncRaf = requestAnimationFrame(syncStartOrderHeroNotchToDesktopMenu);
			};

			scheduleStartOrderNotchSync();
			window.addEventListener('resize', scheduleStartOrderNotchSync);
			window.addEventListener('load', scheduleStartOrderNotchSync);
			if (document.fonts && document.fonts.ready) {
				document.fonts.ready.then(scheduleStartOrderNotchSync).catch(() => {});
			}

			const startOrderThankYouUrl = '<?php echo esc_js((string) $so_thank_you_url); ?>';
			const handleStartOrderSuccess = (event) => {
				if (!event || !event.target) return;
				const formWrapper = event.target.closest('.start-order-cf7');
				if (!formWrapper) return;

				if (!startOrderThankYouUrl) return;

				const submitButton = formWrapper.querySelector('.wpcf7-submit');
				if (submitButton) {
					submitButton.value = 'Submitted';
					submitButton.setAttribute('disabled', 'disabled');
				}

				window.setTimeout(() => {
					window.location.href = startOrderThankYouUrl;
				}, 700);
			};

			document.addEventListener('wpcf7mailsent', handleStartOrderSuccess);
			document.addEventListener('wpcf7submit', (event) => {
				if (event && event.detail && event.detail.status === 'mail_sent') {
					handleStartOrderSuccess(event);
				}
			});
		});
	</script>
</main>

<?php
get_footer();
