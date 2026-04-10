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

$about_header_bg = get_template_directory_uri() . '/public/about/about-header.png';
$about_assets_uri = get_template_directory_uri() . '/public/about';
$acf_enabled = function_exists('get_field');

if (!function_exists('reacon_about_get_link')) {
	function reacon_about_get_link($field_value, $fallback_url = '#', $fallback_title = '')
	{
		if (is_array($field_value)) {
			return array(
				'url' => !empty($field_value['url']) ? $field_value['url'] : $fallback_url,
				'title' => !empty($field_value['title']) ? $field_value['title'] : $fallback_title,
				'target' => !empty($field_value['target']) ? $field_value['target'] : '_self',
			);
		}

		return array(
			'url' => $fallback_url,
			'title' => $fallback_title,
			'target' => '_self',
		);
	}
}

if (!function_exists('reacon_about_render_icon')) {
	function reacon_about_render_icon($icon_type, $icon_value, $icon_wrap_class = '', $icon_class = '')
	{
		if ('lucide' === $icon_type && is_string($icon_value) && $icon_value !== '') {
			echo '<i data-lucide="' . esc_attr($icon_value) . '" class="' . esc_attr($icon_class) . '" aria-hidden="true"></i>';
			return;
		}

		if ('svg' === $icon_type && !empty($icon_value)) {
			$svg_markup = '';
			if (function_exists('reacon_group_inline_svg')) {
				$svg_markup = reacon_group_inline_svg($icon_value, $icon_class);
			}
			if ($svg_markup) {
				echo $svg_markup;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				return;
			}
		}

		$ph_class = is_string($icon_value) && $icon_value !== '' ? $icon_value : 'ph-fill ph-check-circle';
		echo '<i class="' . esc_attr(trim($ph_class . ' ' . $icon_class)) . '" aria-hidden="true"></i>';
	}
}

if (!function_exists('reacon_about_fallback_text')) {
	function reacon_about_fallback_text($value, $fallback)
	{
		$value = trim((string) $value);
		return $value !== '' ? $value : $fallback;
	}
}

$about_sections = array(
	'hero' => true,
	'overview' => true,
	'partners' => true,
	'ecosystem' => true,
	'what_we_do' => true,
	'testimonials' => true,
	'cta' => true,
	'faq' => true,
);
if ($acf_enabled) {
	$about_sections = array(
		'hero' => (bool) get_field('about_enable_hero'),
		'overview' => (bool) get_field('about_enable_overview'),
		'partners' => (bool) get_field('about_enable_partners'),
		'ecosystem' => (bool) get_field('about_enable_ecosystem'),
		'what_we_do' => (bool) get_field('about_enable_what_we_do'),
		'testimonials' => (bool) get_field('about_enable_testimonials'),
		'cta' => (bool) get_field('about_enable_cta'),
		'faq' => (bool) get_field('about_enable_faq'),
	);
}
?>

<main id="primary" class="overflow-x-hidden" role="main">
	<?php
	$hero_bg = '';
	$hero_eyebrow = '';
	$hero_title = '';
	$hero_description = '';
	if ($acf_enabled) {
		$hero_bg_field = get_field('about_hero_background');
		$hero_bg = is_array($hero_bg_field) && !empty($hero_bg_field['url']) ? $hero_bg_field['url'] : (is_string($hero_bg_field) ? $hero_bg_field : '');
		$hero_eyebrow = (string) get_field('about_hero_eyebrow');
		$hero_title = (string) get_field('about_hero_title');
		$hero_description = (string) get_field('about_hero_description');
	}
	?>
	<!-- Page Section: Hero -->
	<?php if ($about_sections['hero']): ?>
		<section
			id="about-hero"
			class="relative w-full p-0 md:p-2.5"
			aria-label="<?php esc_attr_e('About page hero', 'reacon-group'); ?>">

			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
				<img
					src="<?php echo esc_url($hero_bg !== '' ? $hero_bg : $about_header_bg); ?>"
					alt=""
					aria-hidden="true"
					class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
					fetchpriority="high"
					loading="eager"
					decoding="async" />

				<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<p class="reacon-type-overline mb-4 text-white/85 lg:mb-5">
						<?php echo esc_html(reacon_about_fallback_text($hero_eyebrow, 'About')); ?>
					</p>

					<h1 class="reacon-type-h1 max-w-[860px] text-white">
						<?php echo esc_html(reacon_about_fallback_text($hero_title, 'Hero content coming soon.')); ?>
					</h1>

					<p class="reacon-type-lead mt-4 max-w-[780px] text-white/90 lg:mt-5">
						<?php echo esc_html(reacon_about_fallback_text($hero_description, 'Please add hero description content in ACF.')); ?>
					</p>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Page Section: Hero -->


	<?php
	$overview_eyebrow = '';
	$overview_body = '';
	$overview_stats = array();
	if ($acf_enabled) {
		$overview_eyebrow = (string) get_field('about_overview_eyebrow');
		$overview_body = (string) get_field('about_overview_body');
		$overview_stats_field = get_field('about_overview_stats');
		if (is_array($overview_stats_field) && !empty($overview_stats_field)) {
			$overview_stats = $overview_stats_field;
		}
	}
	?>
	<?php if ($about_sections['overview']): ?>
		<section
			id="about-overview"
			class="bg-[#f5f5f5] py-14 sm:py-16 lg:py-20"
			aria-label="<?php esc_attr_e('About Reacon Group overview', 'reacon-group'); ?>">
			<div class="mx-auto grid w-full max-w-[1220px] grid-cols-1 gap-8 px-5 sm:px-6 lg:grid-cols-[220px_1fr] lg:gap-10 lg:px-10">
				<div class="pt-1">
					<p class="reacon-type-overline text-muted-foreground">
						<?php echo esc_html(reacon_about_fallback_text($overview_eyebrow, 'Overview')); ?>
					</p>
				</div>

				<div>
					<p class="reacon-type-h3 max-w-4xl text-foreground">
						<?php echo esc_html(reacon_about_fallback_text($overview_body, 'Please add overview content in ACF.')); ?>
					</p>

					<div class="mt-8 grid grid-cols-2 gap-x-6 gap-y-7 border-t border-black/8 pt-7 sm:mt-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-8 lg:pt-8">
						<?php if (!empty($overview_stats)): ?>
							<?php foreach ($overview_stats as $stat): ?>
								<div>
									<p class="reacon-type-caption max-w-[180px] text-muted-foreground">
										<?php echo esc_html(isset($stat['label']) ? $stat['label'] : ''); ?>
									</p>
									<p class="reacon-type-h1 mt-2 leading-none text-foreground">
										<?php echo esc_html(isset($stat['value']) ? $stat['value'] : ''); ?>
									</p>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div>
								<p class="reacon-type-caption max-w-[180px] text-muted-foreground"><?php echo esc_html('Statistic'); ?></p>
								<p class="reacon-type-h1 mt-2 leading-none text-foreground"><?php echo esc_html('--'); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>


	<!--Start Partners Section -->
	<?php if ($about_sections['partners']): ?>
		<?php
		$partner_logos = array();
		$partners_aria_label = '';
		$partners_marquee_duration = 30;

		if (function_exists('get_field')) {
			$partners_aria_label = (string) get_field('about_partners_aria_label');
			$partners_marquee_duration_raw = get_field('about_partners_marquee_duration');
			if (is_numeric($partners_marquee_duration_raw) && (int) $partners_marquee_duration_raw > 0) {
				$partners_marquee_duration = (int) $partners_marquee_duration_raw;
			}

			$partners_logos_field = get_field('about_partners_logos');
			if (is_array($partners_logos_field) && !empty($partners_logos_field)) {
				foreach ($partners_logos_field as $item) {
					$image_field = isset($item['logo']) ? $item['logo'] : '';
					$image_url = '';
					$image_alt = '';

					if (is_array($image_field)) {
						$image_url = !empty($image_field['url']) ? (string) $image_field['url'] : '';
						$image_alt = !empty($image_field['alt']) ? (string) $image_field['alt'] : '';
					} elseif (is_string($image_field)) {
						$image_url = $image_field;
					}

					$custom_alt = isset($item['alt']) ? (string) $item['alt'] : '';
					if ($image_url === '') {
						continue;
					}

					$partner_logos[] = array(
						'url' => esc_url($image_url),
						'alt' => sanitize_text_field($custom_alt !== '' ? $custom_alt : $image_alt),
					);
				}
			}
		}

		$partners_empty_text = 'Please add partner logos in ACF.';
		?>

		<section class="relative w-full overflow-hidden" aria-label="<?php echo esc_attr($partners_aria_label !== '' ? $partners_aria_label : 'Partners section'); ?>">
			<div class="pointer-events-none absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white to-transparent lg:w-32" aria-hidden="true"></div>
			<div class="pointer-events-none absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white to-transparent lg:w-32" aria-hidden="true"></div>

			<div class="mx-auto flex min-h-[74px] w-full max-w-[1320px] items-center overflow-hidden px-4 lg:px-0">
				<?php if (!empty($partner_logos)): ?>
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
				<?php else: ?>
					<p class="reacon-type-body w-full text-center text-muted-foreground"><?php echo esc_html($partners_empty_text); ?></p>
				<?php endif; ?>
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
					animation: partner-marquee <?php echo esc_attr($partners_marquee_duration); ?>s linear infinite;
				}

				.animate-partner-marquee:hover {
					animation-play-state: paused;
				}
			</style>
		</section>
	<?php endif; ?>
	<!--End Partners Section -->
	<!-- Ecosystem Section -->
	<?php
	$ecosystem_assets_uri = get_template_directory_uri() . '/public/about';
	$ecosystem_eyebrow = '';
	$ecosystem_title = '';
	$ecosystem_description = '';
	$ecosystem_cards = array();
	if ($acf_enabled) {
		$ecosystem_eyebrow = (string) get_field('about_ecosystem_eyebrow');
		$ecosystem_title = (string) get_field('about_ecosystem_title');
		$ecosystem_description = (string) get_field('about_ecosystem_description');
		$ecosystem_cards_field = get_field('about_ecosystem_cards');
		if (is_array($ecosystem_cards_field) && !empty($ecosystem_cards_field)) {
			$ecosystem_cards = $ecosystem_cards_field;
		}
	}
	?>
	<?php if ($about_sections['ecosystem']): ?>
		<section id="reacon-ecosystem-section" class="pb-12 pt-14 sm:pb-14 sm:pt-16 md:pb-16 md:pt-20 lg:pb-20 lg:pt-24 xl:pb-16 xl:pt-16">
			<div class="mx-auto w-full max-w-[1370px] px-4 sm:px-6 md:px-8 xl:px-0">
				<div class="mx-auto w-full max-w-[820px] text-center">
					<p class="reacon-type-overline text-muted-foreground">
						<?php echo esc_html(reacon_about_fallback_text($ecosystem_eyebrow, 'Our Ecosystem')); ?>
					</p>
					<h2 class="reacon-type-h2 mt-2 text-foreground">
						<?php echo esc_html(reacon_about_fallback_text($ecosystem_title, 'Ecosystem content coming soon.')); ?>
					</h2>
					<p class="reacon-type-body mt-3 text-muted-foreground md:mt-4">
						<?php echo esc_html(reacon_about_fallback_text($ecosystem_description, 'Please add ecosystem description in ACF.')); ?>
					</p>
				</div>

				<div class="mt-8 grid grid-cols-1 gap-4 sm:mt-10 sm:grid-cols-2 sm:gap-5 lg:mt-12 lg:grid-cols-4 lg:gap-8">
					<?php if (!empty($ecosystem_cards)): ?>
						<?php foreach ($ecosystem_cards as $card): ?>
							<article class="flex min-h-[240px] group flex-col justify-between rounded-[20px] border border-[#f3f4f6] bg-[#f6f6f6] p-5 sm:p-6 transition-all duration-200 hover:bg-white hover:border-primary hover:shadow-sm">
								<?php
								$card_link = isset($card['link']) ? $card['link'] : (isset($card['url']) ? $card['url'] : '');
								$card_link_data = reacon_about_get_link($card_link, '#', 'Explore');
								?>
								<div>
									<div class="mb-3 flex h-[32px] items-center justify-end">
										<?php if (isset($card['type']) && 'westman' === $card['type']): ?>
											<div class="relative h-10 w-auto" aria-label="<?php echo esc_attr(isset($card['logo_alt']) ? $card['logo_alt'] : ''); ?>">

												<img src="<?php echo esc_url($ecosystem_assets_uri . '/westman.png'); ?>" alt="" aria-hidden="true" class="h-12 w-[55px]" />
											</div>
										<?php else: ?>
											<img src="<?php echo esc_url(isset($card['logo']) ? $card['logo'] : ''); ?>" alt="<?php echo esc_attr(isset($card['logo_alt']) ? $card['logo_alt'] : ''); ?>" class="max-h-[32px] w-auto object-contain object-right" loading="lazy" decoding="async" />
										<?php endif; ?>
									</div>
									<h3 class="reacon-type-h4 text-foreground">
										<?php echo esc_html(isset($card['name']) ? $card['name'] : ''); ?>
									</h3>
									<p class="reacon-type-body mt-2 text-muted-foreground">
										<?php echo esc_html(isset($card['description']) ? $card['description'] : ''); ?>
									</p>
								</div>
								<a href="<?php echo esc_url($card_link_data['url']); ?>" target="<?php echo esc_attr($card_link_data['target']); ?>" class="reacon-type-button mt-auto inline-flex w-max items-center gap-1.5 text-foreground no-underline transition-colors group-hover:text-primary">
									<span><?php echo esc_html($card_link_data['title']); ?></span>
									<i class="ph-bold ph-arrow-right text-[12px]" aria-hidden="true"></i>
								</a>
							</article>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="reacon-type-body col-span-full text-center text-muted-foreground">
							<?php echo esc_html('Please add ecosystem cards in ACF.'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Ecosystem Section -->
	<!-- What we do section -->
	<?php
	$about_assets_uri = get_template_directory_uri() . '/public/about';
	$what_we_do_eyebrow = '';
	$what_we_do_title = '';
	$what_we_do_description = '';
	$what_we_do_image_url = '';
	$what_we_do_image_alt = '';
	$what_we_do_cards = array();
	if ($acf_enabled) {
		$what_we_do_eyebrow = (string) get_field('about_what_we_do_eyebrow');
		$what_we_do_title = (string) get_field('about_what_we_do_title');
		$what_we_do_description = (string) get_field('about_what_we_do_description');
		$what_we_do_image = get_field('about_what_we_do_image');
		if (is_array($what_we_do_image) && !empty($what_we_do_image['url'])) {
			$what_we_do_image_url = $what_we_do_image['url'];
			$what_we_do_image_alt = !empty($what_we_do_image['alt']) ? $what_we_do_image['alt'] : '';
		} elseif (is_string($what_we_do_image) && $what_we_do_image !== '') {
			$what_we_do_image_url = $what_we_do_image;
		}
		$what_we_do_cards_field = get_field('about_what_we_do_cards');
		if (is_array($what_we_do_cards_field) && !empty($what_we_do_cards_field)) {
			$what_we_do_cards = $what_we_do_cards_field;
		}
	}
	?>
	<?php if ($about_sections['what_we_do']): ?>
		<section id="reacon-what-we-do-section" class="bg-[#f5f5f5] py-12 sm:py-14 md:py-16 lg:py-20 xl:py-[120px]">
			<div class="mx-auto grid w-full max-w-[1370px] grid-cols-1 gap-8 px-4 sm:px-6 md:gap-10 lg:grid-cols-[minmax(0,720px)_minmax(0,620px)] lg:items-stretch lg:gap-[30px] lg:px-8 xl:px-0">
				<div class="flex flex-col gap-6 md:gap-8">
					<div class="w-full max-w-[720px]">
						<p class="reacon-type-overline text-muted-foreground">
							<?php echo esc_html(reacon_about_fallback_text($what_we_do_eyebrow, 'What We Do')); ?>
						</p>
						<h2 class="reacon-type-h2 mt-2 text-foreground">
							<?php echo esc_html(reacon_about_fallback_text($what_we_do_title, 'Section content coming soon.')); ?>
						</h2>
						<p class="reacon-type-body mt-3 max-w-[720px] text-muted-foreground md:mt-4">
							<?php echo esc_html(reacon_about_fallback_text($what_we_do_description, 'Please add What We Do description in ACF.')); ?>
						</p>
					</div>

					<div class="grid grid-cols-1 border border-[#eceff2] sm:grid-cols-2">
						<?php if (!empty($what_we_do_cards)): ?>
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
										<?php
										reacon_about_render_icon(
											isset($card['icon_type']) ? $card['icon_type'] : 'phosphor',
											isset($card['icon_value']) ? $card['icon_value'] : 'ph-fill ph-check-circle',
											'',
											'text-[18px] leading-none'
										);
										?>
									</div>
									<div class="min-w-0">
										<h5 class="reacon-type-h5 text-foreground">
											<?php echo esc_html($card['title']); ?>
										</h5>
										<p class="reacon-type-body mt-2 font-medium text-foreground">
											<?php echo esc_html($card['subtitle']); ?>
										</p>
										<p class="reacon-type-body mt-1 text-muted-foreground">
											<?php echo esc_html($card['body']); ?>
										</p>
									</div>
								</article>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="reacon-type-body p-4 text-muted-foreground sm:p-5 md:p-6">
								<?php echo esc_html('Please add What We Do cards in ACF.'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="relative h-[440px] overflow-hidden rounded-3xl sm:h-[560px] md:h-[640px] lg:h-auto lg:min-h-[774px]">
					<img
						src="<?php echo esc_url($what_we_do_image_url); ?>"
						alt="<?php echo esc_attr($what_we_do_image_alt); ?>"
						class="h-full w-full object-cover"
						loading="lazy"
						decoding="async" />
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End What we do section -->

	<!-- Testimonials Section -->
	<?php
	$testimonials_row_1 = array();
	$testimonials_row_2 = array();
	$testimonials_heading = '';
	$testimonials_description = '';
	if ($acf_enabled) {
		$testimonials_heading = (string) get_field('about_testimonials_heading');
		$testimonials_description = (string) get_field('about_testimonials_description');
		$testimonials_row_1_field = get_field('about_testimonials_row_1');
		$testimonials_row_2_field = get_field('about_testimonials_row_2');
		if (is_array($testimonials_row_1_field) && !empty($testimonials_row_1_field)) {
			$testimonials_row_1 = $testimonials_row_1_field;
		}
		if (is_array($testimonials_row_2_field) && !empty($testimonials_row_2_field)) {
			$testimonials_row_2 = $testimonials_row_2_field;
		}
	}
	?>

	<?php if ($about_sections['testimonials']): ?>
		<section id="reacon-testimonials-section" class="relative overflow-hidden bg-[#fafafa] py-16 lg:py-24" aria-label="<?php esc_attr_e('Testimonials', 'reacon-group'); ?>">
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(233,251,252,0.9)_0%,rgba(255,255,255,0.85)_58%,rgba(255,255,255,1)_100%)]" aria-hidden="true"></div>

			<div class="relative z-10 mx-auto mb-10 flex w-full max-w-[760px] flex-col items-center gap-3 px-6 text-center lg:mb-12">
				<h2 class="reacon-type-h2 text-[#1e293b]">
					<?php echo esc_html(reacon_about_fallback_text($testimonials_heading, 'Testimonials')); ?>
				</h2>
				<p class="reacon-type-body max-w-[706px] text-[#262626]">
					<?php echo esc_html(reacon_about_fallback_text($testimonials_description, 'Please add testimonials intro in ACF.')); ?>
				</p>
			</div>

			<div class="relative z-10 space-y-6 lg:space-y-8">
				<div class="reacon-testi-track-wrap">
					<div class="reacon-testi-track reacon-testi-track--forward">
						<?php if (!empty($testimonials_row_1)): ?>
							<?php for ($r = 0; $r < 2; $r++): ?>
								<?php foreach ($testimonials_row_1 as $item): ?>
									<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
										<p class="reacon-type-body text-foreground">
											<?php echo esc_html($item['quote']); ?>
										</p>
										<div class="flex items-start gap-6">
											<div class="min-w-0 flex-1">
												<p class="reacon-type-body font-medium text-primary"><?php echo esc_html($item['name']); ?></p>
												<p class="reacon-type-caption text-muted-foreground"><?php echo esc_html($item['role']); ?></p>
											</div>
											<?php
											$item_img = isset($item['img']) ? $item['img'] : '';
											$item_img_url = is_array($item_img) && !empty($item_img['url']) ? $item_img['url'] : $item_img;
											?>
											<img src="<?php echo esc_url($item_img_url); ?>" alt="<?php echo esc_attr($item['name']); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
										</div>
									</article>
								<?php endforeach; ?>
							<?php endfor; ?>
						<?php else: ?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-center rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="reacon-type-body text-foreground"><?php echo esc_html('Please add testimonials in ACF.'); ?></p>
							</article>
						<?php endif; ?>
					</div>
				</div>

				<div class="reacon-testi-track-wrap">
					<div class="reacon-testi-track reacon-testi-track--reverse">
						<?php if (!empty($testimonials_row_2)): ?>
							<?php for ($r = 0; $r < 2; $r++): ?>
								<?php foreach ($testimonials_row_2 as $item): ?>
									<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-between rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
										<p class="reacon-type-body text-foreground">
											<?php echo esc_html($item['quote']); ?>
										</p>
										<div class="flex items-start gap-6">
											<div class="min-w-0 flex-1">
												<p class="reacon-type-body font-medium text-primary"><?php echo esc_html($item['name']); ?></p>
												<p class="reacon-type-caption text-muted-foreground"><?php echo esc_html($item['role']); ?></p>
											</div>
											<?php
											$item_img = isset($item['img']) ? $item['img'] : '';
											$item_img_url = is_array($item_img) && !empty($item_img['url']) ? $item_img['url'] : $item_img;
											?>
											<img src="<?php echo esc_url($item_img_url); ?>" alt="<?php echo esc_attr($item['name']); ?>" class="h-[52px] w-[52px] shrink-0 rounded-full object-cover" loading="lazy" decoding="async" />
										</div>
									</article>
								<?php endforeach; ?>
							<?php endfor; ?>
						<?php else: ?>
							<article class="flex h-[260px] w-[86vw] max-w-[472px] shrink-0 flex-col justify-center rounded-3xl border border-[#e5e5e5] bg-white p-6 shadow-[0_1px_0_rgba(0,0,0,0.02)] sm:w-[472px]">
								<p class="reacon-type-body text-foreground"><?php echo esc_html('Please add testimonials in ACF.'); ?></p>
							</article>
						<?php endif; ?>
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
	<?php endif; ?>
	<!-- End Testimonials Section -->

	<!-- CTA SECTION START -->
	<?php
	$about_cta = array(
		'heading' => '',
		'description' => '',
		'primary' => array(
			'label' => '',
			'url' => '#',
		),
		'secondary' => array(
			'label' => '',
			'url' => '#',
		),
	);
	$about_cta_bg = 'teal';
	$about_cta_primary_icon_type = 'phosphor';
	$about_cta_primary_icon_value = 'ph ph-arrow-up-right';
	if ($acf_enabled) {
		$about_cta_heading = (string) get_field('about_cta_heading');
		$about_cta_description = (string) get_field('about_cta_description');
		$about_cta_primary = reacon_about_get_link(get_field('about_cta_primary_button'), $about_cta['primary']['url'], $about_cta['primary']['label']);
		$about_cta_secondary = reacon_about_get_link(get_field('about_cta_secondary_button'), $about_cta['secondary']['url'], $about_cta['secondary']['label']);
		$about_cta['heading'] = $about_cta_heading;
		$about_cta['description'] = $about_cta_description;
		$about_cta['primary'] = array('label' => $about_cta_primary['title'], 'url' => $about_cta_primary['url'], 'target' => $about_cta_primary['target']);
		$about_cta['secondary'] = array('label' => $about_cta_secondary['title'], 'url' => $about_cta_secondary['url'], 'target' => $about_cta_secondary['target']);
		$about_cta_bg = (string) get_field('about_cta_color');
		$about_cta_primary_icon_type = (string) get_field('about_cta_primary_icon_type');
		$about_cta_primary_icon_value = get_field('about_cta_primary_icon_value');
	}
	$cta_bg_style = '';
	if ('teal' === $about_cta_bg || '' === $about_cta_bg) {
		$cta_bg_style = 'background: linear-gradient(179deg, #062b2d 0%, #1ECAD3 100%);';
	}
	if ('blue' === $about_cta_bg) {
		$cta_bg_style = 'background: linear-gradient(179deg, #062B53 0%, #0A969B 100%);';
	}
	?>
	<?php if ($about_sections['cta']): ?>
		<section id="home-cta" class="py-10 sm:py-12 lg:py-14" aria-labelledby="home-cta-heading">
			<div class="mx-auto w-full  px-5 sm:px-6 lg:px-10">
				<div class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]" style="<?php echo esc_attr($cta_bg_style); ?>">
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
						<h2 id="home-cta-heading" class="reacon-type-h1 text-white">
							<?php echo esc_html(reacon_about_fallback_text($about_cta['heading'], 'CTA content coming soon.')); ?>
						</h2>
						<p class="reacon-type-body mx-auto mt-4 text-white/90">
							<?php echo esc_html(reacon_about_fallback_text($about_cta['description'], 'Please add CTA description in ACF.')); ?>
						</p>
						<div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-[10px]">
							<a href="<?php echo esc_url($about_cta['primary']['url']); ?>" target="<?php echo esc_attr(isset($about_cta['primary']['target']) ? $about_cta['primary']['target'] : '_self'); ?>" class="group reacon-type-button inline-flex items-center gap-[10px] rounded-full bg-white py-[4px] pl-[20px] pr-[4px] text-primary no-underline transition-all duration-300 hover:bg-white/90">
								<span><?php echo esc_html(reacon_about_fallback_text($about_cta['primary']['label'], 'Primary Action')); ?></span>
								<span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full bg-secondary/15">
									<i class="ph-bold ph-arrow-up-right absolute text-base transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" aria-hidden="true"></i>
									<i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-base opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
								</span>
							</a>
							<a href="<?php echo esc_url($about_cta['secondary']['url']); ?>" target="<?php echo esc_attr(isset($about_cta['secondary']['target']) ? $about_cta['secondary']['target'] : '_self'); ?>" class="reacon-type-button inline-flex items-center gap-[10px] rounded-full border border-solid border-white py-2.5 pl-[20px] pr-[16px] text-white no-underline transition-all duration-300 hover:bg-white/10">
								<?php echo esc_html(reacon_about_fallback_text($about_cta['secondary']['label'], 'Secondary Action')); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- End CTA SECTION -->

	<!-- Faq Section -->
	<?php
	$faq_heading = '';
	$faq_description = '';
	$faq_items = array();
	$faq_cta_title = '';
	$faq_cta_description = '';
	$faq_cta_link = array('url' => '#', 'title' => '', 'target' => '_self');
	$faq_cta_icon_type = 'phosphor';
	$faq_cta_icon_value = 'ph ph-arrow-right';
	if ($acf_enabled) {
		$faq_heading = (string) get_field('about_faq_heading');
		$faq_description = (string) get_field('about_faq_description');
		$faq_items_field = get_field('about_faq_items');
		if (is_array($faq_items_field) && !empty($faq_items_field)) {
			$faq_items = $faq_items_field;
		}
		$faq_cta_title = (string) get_field('about_faq_cta_title');
		$faq_cta_description = (string) get_field('about_faq_cta_description');
		$faq_cta_link = reacon_about_get_link(get_field('about_faq_cta_link'), '#', '');
		$faq_cta_icon_type = (string) get_field('about_faq_cta_icon_type');
		$faq_cta_icon_value = get_field('about_faq_cta_icon_value');
	}
	?>
	<?php if ($about_sections['faq']): ?>
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
							class="reacon-type-h2 text-black">
							<?php echo esc_html(reacon_about_fallback_text($faq_heading, 'Frequently Asked Questions')); ?>
						</h2>
						<p
							class="reacon-type-body max-w-[1177px] text-black">
							<?php echo esc_html(reacon_about_fallback_text($faq_description, 'Please add FAQ intro content in ACF.')); ?>
						</p>
					</div>
				</div>

				<!-- FAQ items -->
				<div
					class="mt-[40px] flex flex-col gap-[12px] sm:mt-[48px] lg:mt-[56px]"
					aria-label="Frequently asked questions list">
					<?php if (!empty($faq_items)): ?>
						<?php foreach ($faq_items as $faq_index => $faq_item): ?>
							<details
								<?php echo 0 === $faq_index ? 'open' : ''; ?>
								class="transition-colors duration-300 rounded-[16px] <?php echo 0 === $faq_index ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'; ?> px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
								<summary class="flex cursor-pointer list-none items-center justify-between gap-4 outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2 rounded-md">
									<span class="reacon-type-h5 text-[#383B43]">
										<?php echo esc_html(isset($faq_item['question']) ? $faq_item['question'] : ''); ?>
									</span>
									<span class="reacon-type-h5 leading-none text-[#0A969B] select-none" aria-hidden="true">
										<?php echo 0 === $faq_index ? '−' : '+'; ?>
									</span>
								</summary>
								<p class="reacon-type-body mt-[14px] text-[#666666] sm:mt-[20px]">
									<?php echo esc_html(isset($faq_item['answer']) ? $faq_item['answer'] : ''); ?>
								</p>
							</details>
						<?php endforeach; ?>
					<?php else: ?>
						<details
							open
							class="transition-colors duration-300 rounded-[16px] bg-[#F9FAFB] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
							<summary class="flex cursor-pointer list-none items-center justify-between gap-4 rounded-md outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2">
								<span class="reacon-type-h5 text-[#383B43]">
									<?php echo esc_html('FAQ content coming soon.'); ?>
								</span>
								<span class="reacon-type-h5 leading-none text-[#0A969B] select-none" aria-hidden="true">−</span>
							</summary>
							<p class="reacon-type-body mt-[14px] text-[#666666] sm:mt-[20px]">
								<?php echo esc_html('Please add FAQ items in ACF.'); ?>
							</p>
						</details>
					<?php endif; ?>

					<!-- CTA card -->
					<div
						class="mt-[4px] rounded-[16px] bg-[#E9FBFC] px-[20px] py-[18px] sm:px-[24px] sm:py-[20px]">
						<div class="flex flex-col gap-[8px]">
							<p class="reacon-type-body font-medium text-[#383B43]">
								<?php echo esc_html(reacon_about_fallback_text($faq_cta_title, 'Need more help?')); ?>
							</p>
							<p class="reacon-type-body text-[#666666]">
								<?php echo esc_html(reacon_about_fallback_text($faq_cta_description, 'Please add FAQ CTA description in ACF.')); ?>
							</p>
						</div>
						<div
							class="my-[16px] h-px w-full bg-[#ECEFF2] sm:my-[20px]"
							aria-hidden="true"></div>
						<a
							href="<?php echo esc_url($faq_cta_link['url']); ?>"
							target="<?php echo esc_attr($faq_cta_link['target']); ?>"
							class="reacon-type-button flex w-full items-center justify-between gap-4 text-[#0A969B] transition-colors duration-300 hover:text-black">
							<span><?php echo esc_html(reacon_about_fallback_text($faq_cta_link['title'], 'Contact our team')); ?></span>
							<i class="ph ph-arrow-right text-base" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Faq Section -->
</main>

<style>
	/* Desktop-only top notch that lets the fixed header "recess" into the hero. */
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

		#about-hero .reacon-about-hero-card {
			--hero-notch-width: clamp(560px, 48vw, 720px);
			--hero-notch-radius: 40px;
			--hero-notch-height: 86px;
			--hero-notch-swoop: 40px;
		}

		/* 1. Hero top notch */
		#about-hero .reacon-about-hero-card::before {
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

		/* 2. Hero notch corner cutouts */
		#about-hero .reacon-about-hero-card::after {
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
</style>

<script>
	document.addEventListener('DOMContentLoaded', () => {
		if (window.lucide && typeof window.lucide.createIcons === 'function') {
			window.lucide.createIcons();
		}

		// Sync about-hero notch with centered desktop nav menu.
		const syncAboutHeroNotchToDesktopMenu = () => {
			const heroCard = document.querySelector('#about-hero .reacon-about-hero-card');
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

		let aboutNotchSyncRaf = null;
		const scheduleAboutNotchSync = () => {
			if (aboutNotchSyncRaf) {
				cancelAnimationFrame(aboutNotchSyncRaf);
			}
			aboutNotchSyncRaf = requestAnimationFrame(syncAboutHeroNotchToDesktopMenu);
		};

		scheduleAboutNotchSync();
		window.addEventListener('resize', scheduleAboutNotchSync);
		window.addEventListener('load', scheduleAboutNotchSync);
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(scheduleAboutNotchSync).catch(() => {});
		}

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

<?php
get_footer();
