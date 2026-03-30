<?php

/**
 * Template part: Site footer content.
 *
 * Content: ACF Options (“Footer Setting”) + Appearance → Menus (footer locations).
 * Styled with Tailwind v4 utilities (tailwind/tailwind-theme.css tokens).
 *
 * @package reacon-group
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$default_logo = get_template_directory_uri() . '/public/image/Reacon Logo 2.svg';
$current_year = absint(gmdate('Y'));
$site_name = get_bloginfo('name');

// —— ACF option helpers (graceful when ACF is disabled) ————————————————
$footer_logo = $default_logo;
$footer_show_language = true;
$footer_language_label = __('English', 'reacon-group');
$footer_cta_title = '';
$footer_cta_features = array();
$footer_cta_primary = null;
$footer_cta_secondary = null;
$footer_social_links = null;
$footer_copyright_suffix = '';

if (function_exists('get_field')) {
	$acf_logo = get_field('footer_logo', 'option');
	if (!empty($acf_logo) && is_string($acf_logo)) {
		$footer_logo = $acf_logo;
	}

	$show_lang = get_field('footer_show_language', 'option');
	if ($show_lang === false || $show_lang === '0' || $show_lang === 0) {
		$footer_show_language = false;
	}

	$lang_label = get_field('footer_language_label', 'option');
	if (is_string($lang_label) && $lang_label !== '') {
		$footer_language_label = $lang_label;
	}

	$cta_title = get_field('footer_cta_title', 'option');
	if (is_string($cta_title)) {
		$footer_cta_title = $cta_title;
	}

	$features = get_field('footer_cta_features', 'option');
	if (is_array($features)) {
		$footer_cta_features = $features;
	}

	$footer_cta_primary = get_field('footer_cta_primary', 'option');
	$footer_cta_secondary = get_field('footer_cta_secondary', 'option');

	$social = get_field('footer_social_links', 'option');
	if (is_array($social) && $social !== array()) {
		$footer_social_links = $social;
	}

	$suffix = get_field('footer_copyright_suffix', 'option');
	if (is_string($suffix)) {
		$footer_copyright_suffix = $suffix;
	}
}

// Defaults mirror previous static footer when options are empty.
if ($footer_cta_title === '') {
	$footer_cta_title = __('Power Your Communication With Precision', 'reacon-group');
}

if ($footer_cta_features === array()) {
	$footer_cta_features = array(
		array(
			'text' => __('Deliver print, packaging, and campaigns on time, every time', 'reacon-group'),
		),
		array(
			'text' => __('Cut operational delays with one integrated partner', 'reacon-group'),
		),
	);
}

if (!is_array($footer_cta_primary) || empty($footer_cta_primary['url'])) {
	$footer_cta_primary = array(
		'title' => __('Work With Reacon', 'reacon-group'),
		'url' => home_url('/contact-us/'),
		'target' => '',
	);
}

if (!is_array($footer_cta_secondary) || empty($footer_cta_secondary['url'])) {
	$footer_cta_secondary = array(
		'title' => __('Talk to Our Team', 'reacon-group'),
		'url' => home_url('/talk-to-our-team/'),
		'target' => '',
	);
}

if ($footer_social_links === null) {
	$base = get_template_directory_uri() . '/public/social-icon/';
	$footer_social_links = array(
		array('network' => 'facebook', 'url' => '#', 'label' => __('Facebook', 'reacon-group')),
		array('network' => 'twitter', 'url' => '#', 'label' => __('Twitter / X', 'reacon-group')),
		array('network' => 'instagram', 'url' => '#', 'label' => __('Instagram', 'reacon-group')),
		array('network' => 'linkedin', 'url' => '#', 'label' => __('LinkedIn', 'reacon-group')),
		array('network' => 'youtube', 'url' => '#', 'label' => __('YouTube', 'reacon-group')),
	);
}

/**
 * @param array<string,mixed> $row Repeater row.
 * @return array{src:string,class:string,w:int,h:int,label:string}|null
 */
$reacon_footer_social_asset = static function ($row) {
	if (!is_array($row)) {
		return null;
	}
	$url = isset($row['url']) ? esc_url_raw($row['url']) : '';
	if ($url === '') {
		return null;
	}

	$network = isset($row['network']) ? (string) $row['network'] : 'custom';
	$base = get_template_directory_uri() . '/public/social-icon/';
	$label = isset($row['label']) && is_string($row['label']) ? $row['label'] : '';

	$presets = array(
		'facebook' => array('src' => $base . 'facebook.svg', 'class' => 'h-5 w-auto', 'w' => 12, 'h' => 21),
		'twitter' => array('src' => $base . 'twitter.svg', 'class' => 'h-10 w-auto', 'w' => 42, 'h' => 42),
		'instagram' => array('src' => $base . 'instagram.svg', 'class' => 'h-5 w-auto', 'w' => 21, 'h' => 21),
		'linkedin' => array('src' => $base . 'linkedin.svg', 'class' => 'h-5 w-auto', 'w' => 21, 'h' => 20),
		'youtube' => array('src' => $base . 'youtube.svg', 'class' => 'h-5 w-auto', 'w' => 24, 'h' => 17),
	);

	if ($network === 'custom') {
		$icon = isset($row['icon']) && is_string($row['icon']) ? $row['icon'] : '';
		if ($icon === '') {
			return null;
		}
		if ($label === '') {
			$label = __('Social link', 'reacon-group');
		}
		return array(
			'src' => esc_url($icon),
			'class' => 'h-5 w-auto',
			'w' => 24,
			'h' => 24,
			'label' => $label,
		);
	}

	if (!isset($presets[$network])) {
		return null;
	}

	if ($label === '') {
		$fallback_labels = array(
			'facebook' => __('Facebook', 'reacon-group'),
			'twitter' => __('Twitter / X', 'reacon-group'),
			'instagram' => __('Instagram', 'reacon-group'),
			'linkedin' => __('LinkedIn', 'reacon-group'),
			'youtube' => __('YouTube', 'reacon-group'),
		);
		$label = $fallback_labels[$network] ?? __('Social link', 'reacon-group');
	}

	return array_merge($presets[$network], array('label' => $label));
};

/**
 * @param string               $location Theme location slug.
 * @param string               $menu_class <ul> classes.
 * @param array<string,mixed> $extra wp_nav_menu args overrides.
 */
$reacon_footer_echo_menu = static function ($location, $menu_class, $extra = array()) {
	$args = array_merge(
		array(
			'theme_location' => $location,
			'container' => false,
			'menu_class' => $menu_class,
			'fallback_cb' => false,
			'depth' => 1,
			'echo' => false,
		),
		$extra
	);

	$html = wp_nav_menu($args);
	if ($html) {
		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — core menu HTML.
		return;
	}

	printf(
		'<ul class="%s"></ul>',
		esc_attr($menu_class)
	);
};

?>

<footer
	id="reacon-site-footer"
	role="contentinfo"
	aria-label="<?php esc_attr_e('Site footer', 'reacon-group'); ?>"
	class="relative overflow-hidden text-white antialiased"
	style="background: url('<?php echo esc_url(get_template_directory_uri() . '/public/box-background.svg'); ?>') center center / cover no-repeat, radial-gradient(ellipse 90% 70% at 72% -10%, #148c93 0%, transparent 55%), linear-gradient(160deg, #062B2D 0%, #041f21 100%);">

	<!-- Grain texture overlay (decorative) -->
	<div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0 opacity-100" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/public/box-background.svg'); ?>') center center / cover no-repeat;"></div>

	<!-- Inner container -->
	<div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">

		<!-- ══ TOP BAR: Logo + Language ════════════════════════════════ -->
		<div class="flex items-center justify-between py-12 lg:py-14">

			<a
				href="<?php echo esc_url(home_url('/')); ?>"
				rel="home"
				aria-label="<?php echo esc_attr($site_name); ?> — <?php esc_attr_e('home', 'reacon-group'); ?>">
				<img
					src="<?php echo esc_url($footer_logo); ?>"
					alt="<?php echo esc_attr($site_name); ?>"
					width="240"
					height="64"
					loading="lazy"
					decoding="async"
					class="h-16 w-auto" />
			</a>

			<?php if ($footer_show_language) : ?>
				<!-- Language selector (label from ACF or default) -->
				<button
					type="button"
					class="inline-flex cursor-pointer items-center gap-2 rounded-full border border-white/25 bg-transparent px-[18px] py-[9px] font-sans text-[13.5px] text-white transition-colors duration-200 hover:bg-white/[.06]"
					aria-label="<?php esc_attr_e('Select language', 'reacon-group'); ?>">
					<i class="ph ph-globe shrink-0 text-[17px]" aria-hidden="true"></i>
					<span><?php echo esc_html($footer_language_label); ?></span>
					<i class="ph-bold ph-caret-down shrink-0 text-[10px] opacity-65" aria-hidden="true"></i>
				</button>
			<?php endif; ?>

		</div><!-- /top bar -->

		<!-- ══ NAVIGATION COLUMNS + CTA CARD (menus: Appearance → Menus) ══ -->
		<div class="grid grid-cols-2 gap-7 pb-14 lg:grid-cols-[190px_200px_250px_1fr]">

			<!-- Quick Links -->
			<nav aria-label="<?php echo esc_attr(reacon_group_footer_nav_column_heading('reacon-footer-quick-links', __('Quick links', 'reacon-group'))); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php echo esc_html(reacon_group_footer_nav_column_heading('reacon-footer-quick-links', __('Quick Links', 'reacon-group'))); ?>
				</h3>
				<?php
				$reacon_footer_echo_menu(
					'reacon-footer-quick-links',
					'flex flex-col gap-[11px]'
				);
				?>
			</nav>

			<!-- Solution -->
			<nav aria-label="<?php echo esc_attr(reacon_group_footer_nav_column_heading('reacon-footer-solutions', __('Solutions', 'reacon-group'))); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php echo esc_html(reacon_group_footer_nav_column_heading('reacon-footer-solutions', __('Solution', 'reacon-group'))); ?>
				</h3>
				<?php
				$reacon_footer_echo_menu(
					'reacon-footer-solutions',
					'flex flex-col gap-[11px]'
				);
				?>
			</nav>

			<!-- Industries -->
			<nav aria-label="<?php echo esc_attr(reacon_group_footer_nav_column_heading('reacon-footer-industries', __('Industries', 'reacon-group'))); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php echo esc_html(reacon_group_footer_nav_column_heading('reacon-footer-industries', __('Industries', 'reacon-group'))); ?>
				</h3>
				<?php
				$reacon_footer_echo_menu(
					'reacon-footer-industries',
					'flex flex-col gap-[11px]'
				);
				?>
			</nav>

			<!-- CTA Card — ACF options -->
			<div class="col-span-2 lg:col-span-1">
				<div class="rounded-[30px] border border-[#A6EEF2] bg-[#E9FBFC] p-8">

					<h2 class="mb-[18px] font-display text-2xl font-bold leading-[1.22] text-[#1e2330]">
						<?php echo esc_html($footer_cta_title); ?>
					</h2>

					<ul class="mb-6 flex flex-col gap-[11px]" role="list">
						<?php foreach ($footer_cta_features as $feature) : ?>
							<?php
							$ftext = '';
							if (is_array($feature) && !empty($feature['text']) && is_string($feature['text'])) {
								$ftext = $feature['text'];
							}
							if ($ftext === '') {
								continue;
							}
							?>
							<li class="flex items-start gap-[10px]">
								<span
									aria-hidden="true"
									class="mt-[3px] flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-secondary">
									<svg width="10" height="10" viewBox="0 0 12 12" fill="none"
										stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
										<polyline points="2,6.5 5,9.5 10,3" />
									</svg>
								</span>
								<p class="font-sans text-[13.5px] leading-[1.55] text-[#4b5058]">
									<?php echo esc_html($ftext); ?>
								</p>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="flex flex-wrap items-center gap-[10px]">
						<?php
						$p = $footer_cta_primary;
						$p_target = (!empty($p['target']) && is_string($p['target'])) ? trim($p['target']) : '';
						$p_title = (!empty($p['title']) && is_string($p['title'])) ? $p['title'] : '';
						?>
						<a
							href="<?php echo esc_url($p['url']); ?>"
							<?php echo $p_target !== '' ? ' target="' . esc_attr($p_target) . '"' : ''; ?>
							<?php echo ($p_target && '_blank' === strtolower($p_target)) ? ' rel="noopener noreferrer"' : ''; ?>
							class="inline-flex items-center gap-[10px] rounded-full bg-primary py-2 pl-5 pr-2.5 font-display text-[13.5px] font-bold text-white/85 no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110 whitespace-nowrap">
							<?php echo esc_html($p_title); ?>
							<span
								aria-hidden="true"
								class="flex h-[30px] w-[30px] shrink-0 items-center justify-center rounded-full bg-black/[.16]">
								<i class="ph-bold ph-arrow-up-right text-[12px]" aria-hidden="true"></i>
							</span>
						</a>

						<?php
						$s = $footer_cta_secondary;
						$s_target = (!empty($s['target']) && is_string($s['target'])) ? trim($s['target']) : '';
						$s_title = (!empty($s['title']) && is_string($s['title'])) ? $s['title'] : '';
						?>
						<a
							href="<?php echo esc_url($s['url']); ?>"
							<?php echo $s_target !== '' ? ' target="' . esc_attr($s_target) . '"' : ''; ?>
							<?php echo ($s_target && '_blank' === strtolower(trim($s_target))) ? ' rel="noopener noreferrer"' : ''; ?>
							class="inline-flex items-center justify-center rounded-full border-[1.5px] border-primary px-[22px] py-[9px] font-display text-[13.5px] font-semibold text-primary no-underline transition-all duration-200 hover:-translate-y-px hover:bg-primary/[.07] whitespace-nowrap">
							<?php echo esc_html($s_title); ?>
						</a>
					</div>

				</div>
			</div>

		</div><!-- /nav-cta grid -->

		<!-- ══ SOCIAL ICONS ROW (ACF repeater or defaults) ═══════════════ -->
		<div class="mb-[18px] flex items-center">

			<div
				aria-hidden="true"
				class="h-px flex-1"
				style="background: linear-gradient(to right, transparent, rgba(213,219,226,0.22));"></div>

			<div class="flex items-center gap-5 px-7">
				<?php foreach ($footer_social_links as $row) : ?>
					<?php
					$asset = $reacon_footer_social_asset($row);
					if (!$asset) {
						continue;
					}
					$soc_url = isset($row['url']) ? esc_url($row['url']) : '';
					if ($soc_url === '') {
						continue;
					}
					$soc_host = wp_parse_url($soc_url, PHP_URL_HOST);
					$home_host = wp_parse_url(home_url('/'), PHP_URL_HOST);
					$social_new_tab = $soc_url !== '#'
						&& $soc_host
						&& $home_host
						&& strtolower((string) $soc_host) !== strtolower((string) $home_host);
					?>
					<a
						href="<?php echo esc_url($soc_url); ?>"
						aria-label="<?php echo esc_attr($asset['label']); ?>"
						<?php echo $social_new_tab ? ' rel="noopener noreferrer" target="_blank"' : ''; ?>
						class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125">
						<img
							src="<?php echo esc_url($asset['src']); ?>"
							alt=""
							width="<?php echo esc_attr((string) $asset['w']); ?>"
							height="<?php echo esc_attr((string) $asset['h']); ?>"
							loading="lazy"
							class="<?php echo esc_attr($asset['class']); ?>" />
					</a>
				<?php endforeach; ?>
			</div>

			<div
				aria-hidden="true"
				class="h-px flex-1"
				style="background: linear-gradient(to left, transparent, rgba(213,219,226,0.22));"></div>

		</div><!-- /social row -->

		<!-- ══ BOTTOM: Copyright, Legal menu, Brands menu ═══════════════ -->
		<div class="text-center">

			<p class="mb-3 font-sans text-[12.5px] text-white/55">
				&copy; <?php echo esc_html((string) $current_year); ?> &mdash; <?php echo esc_html($site_name); ?>
				<?php if ($footer_copyright_suffix !== '') : ?>
					<?php echo ' ' . esc_html($footer_copyright_suffix); ?>
				<?php endif; ?>
			</p>

			<?php
			$reacon_footer_echo_menu(
				'reacon-footer-legal',
				'mb-[26px] flex flex-wrap justify-center gap-x-6 gap-y-1.5',
				array(
					'menu_id' => 'reacon-footer-legal-menu',
					'items_wrap' => '<ul id="%1$s" aria-label="' . esc_attr__('Legal links', 'reacon-group') . '" class="%2$s">%3$s</ul>',
				)
			);
			?>

			<div class="mb-[22px] h-px bg-white/[.08]" aria-hidden="true"></div>

			<?php
			$reacon_footer_echo_menu(
				'reacon-footer-brands',
				'flex flex-wrap justify-center gap-x-11 gap-y-2 pb-10',
				array(
					'menu_id' => 'reacon-footer-brands-menu',
					'items_wrap' => '<ul id="%1$s" aria-label="' . esc_attr__('Group brands', 'reacon-group') . '" class="%2$s">%3$s</ul>',
				)
			);
			?>

		</div><!-- /bottom -->

	</div><!-- /inner container -->
</footer>
