<?php

/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * Contact page template (ACF-driven content).
 *
 * @package reacon-group
 */
get_header();

$acf_enabled = function_exists('get_field');
$contact_page_id = (int) get_queried_object_id();

if (!function_exists('reacon_contact_get_link')) {
	/**
	 * Normalize ACF link field; returns null if URL missing.
	 *
	 * @param mixed $field_value ACF link array.
	 * @return array<string,string>|null
	 */
	function reacon_contact_get_link($field_value)
	{
		if (!is_array($field_value) || empty($field_value['url'])) {
			return null;
		}

		return array(
			'url' => $field_value['url'],
			'title' => isset($field_value['title']) ? (string) $field_value['title'] : '',
			'target' => !empty($field_value['target']) ? (string) $field_value['target'] : '_self',
		);
	}
}

if (!function_exists('reacon_contact_phosphor_preset_map')) {
	/**
	 * Preset slug => full Phosphor class string (editor-friendly dropdown).
	 *
	 * @return array<string,string>
	 */
	function reacon_contact_phosphor_preset_map()
	{
		return array(
			'envelope-simple' => 'ph ph-envelope-simple',
			'envelope' => 'ph ph-envelope',
			'envelope-open' => 'ph ph-envelope-open',
			'at' => 'ph ph-at',
			'phone' => 'ph ph-phone',
			'phone-call' => 'ph ph-phone-call',
			'whatsapp-logo' => 'ph ph-whatsapp-logo',
			'map-pin' => 'ph ph-map-pin',
			'map-pin-line' => 'ph ph-map-pin-line',
			'chats' => 'ph ph-chats',
			'chat-circle-text' => 'ph ph-chat-circle-text',
			'user' => 'ph ph-user',
			'users' => 'ph ph-users',
			'buildings' => 'ph ph-buildings',
			'globe' => 'ph ph-globe',
			'paper-plane-tilt' => 'ph ph-paper-plane-tilt',
		);
	}
}

if (!function_exists('reacon_contact_lucide_preset_map')) {
	/**
	 * Preset slug => Lucide icon name for data-lucide.
	 *
	 * @return array<string,string>
	 */
	function reacon_contact_lucide_preset_map()
	{
		return array(
			'mail' => 'mail',
			'inbox' => 'inbox',
			'phone' => 'phone',
			'phone-call' => 'phone-call',
			'map-pin' => 'map-pin',
			'message-circle' => 'message-circle',
			'users' => 'users',
			'building-2' => 'building-2',
			'globe' => 'globe',
			'send' => 'send',
		);
	}
}

if (!function_exists('reacon_contact_render_icon')) {
	/**
	 * Render icon group from ACF (Phosphor, Lucide, SVG, image).
	 *
	 * @param array<string,mixed>|null $icon ACF icon group.
	 * @param string                   $class Extra classes (e.g. text-xl).
	 */
	function reacon_contact_render_icon($icon, $class = '')
	{
		if (empty($icon) || !is_array($icon)) {
			return;
		}

		$source = isset($icon['icon_source']) ? (string) $icon['icon_source'] : '';
		$class = trim($class);

		if ('phosphor' === $source) {
			$ph_classes = '';
			$preset = isset($icon['phosphor_icon']) ? (string) $icon['phosphor_icon'] : '';
			$map = reacon_contact_phosphor_preset_map();
			if ('custom' === $preset && !empty($icon['phosphor_class'])) {
				$ph_classes = (string) $icon['phosphor_class'];
			} elseif ($preset !== '' && 'custom' !== $preset && isset($map[$preset])) {
				$ph_classes = $map[$preset];
			} elseif ($preset === '' && !empty($icon['phosphor_class'])) {
				$ph_classes = (string) $icon['phosphor_class'];
			}
			if ($ph_classes !== '') {
				echo '<i class="' . esc_attr(trim($ph_classes . ' ' . $class)) . '" aria-hidden="true"></i>';
			}
			return;
		}

		if ('lucide' === $source) {
			$lname = '';
			$preset = isset($icon['lucide_icon']) ? (string) $icon['lucide_icon'] : '';
			$map = reacon_contact_lucide_preset_map();
			if ('custom' === $preset && !empty($icon['lucide_name'])) {
				$lname = (string) $icon['lucide_name'];
			} elseif ($preset !== '' && 'custom' !== $preset && isset($map[$preset])) {
				$lname = $map[$preset];
			} elseif ($preset === '' && !empty($icon['lucide_name'])) {
				$lname = (string) $icon['lucide_name'];
			}
			if ($lname !== '') {
				echo '<i data-lucide="' . esc_attr($lname) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
			}
			return;
		}

		if ('svg_inline' === $source && !empty($icon['svg_inline'])) {
			echo $icon['svg_inline'];  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted editor SVG.
			return;
		}

		if ('svg_asset' === $source && !empty($icon['svg_asset']) && function_exists('reacon_group_inline_svg')) {
			$svg_markup = reacon_group_inline_svg($icon['svg_asset'], $class);
			if ($svg_markup) {
				echo $svg_markup;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			return;
		}

		if ('image' === $source && !empty($icon['icon_image'])) {
			echo '<img src="' . esc_url($icon['icon_image']) . '" alt="" class="' . esc_attr($class) . '" loading="lazy" decoding="async" aria-hidden="true" />';
		}
	}
}

$contact_enable_hero = false;
$contact_enable_main = false;
$contact_enable_apac = false;
$contact_enable_faq = false;

$contact_hero = array();
$contact_intro = array();
$contact_form_block = array();
$contact_apac = array();
$contact_email_link = null;
$contact_phone_link = null;
$contact_email_icon = array();
$contact_phone_icon = array();
$contact_faq = array();

if ($acf_enabled) {
	$contact_enable_hero = (bool) get_field('contact_enable_hero', $contact_page_id);
	$contact_enable_main = (bool) get_field('contact_enable_main', $contact_page_id);
	$contact_enable_apac = (bool) get_field('contact_enable_apac', $contact_page_id);
	$contact_enable_faq = (bool) get_field('contact_enable_faq', $contact_page_id);

	$h = get_field('contact_hero', $contact_page_id);
	$contact_hero = is_array($h) ? $h : array();

	$i = get_field('contact_intro', $contact_page_id);
	$contact_intro = is_array($i) ? $i : array();

	$f = get_field('contact_form_block', $contact_page_id);
	$contact_form_block = is_array($f) ? $f : array();

	$a = get_field('contact_apac', $contact_page_id);
	$contact_apac = is_array($a) ? $a : array();

	$contact_email_link = reacon_contact_get_link(get_field('contact_email_link', $contact_page_id));
	$contact_phone_link = reacon_contact_get_link(get_field('contact_phone_link', $contact_page_id));
	$ei = get_field('contact_email_icon', $contact_page_id);
	$contact_email_icon = is_array($ei) ? $ei : array();
	$pi = get_field('contact_phone_icon', $contact_page_id);
	$contact_phone_icon = is_array($pi) ? $pi : array();

	$q = get_field('contact_faq_section', $contact_page_id);
	$contact_faq = is_array($q) ? $q : array();
}

$hero_bg_url = '';
if (!empty($contact_hero['background_image'])) {
	if (is_string($contact_hero['background_image'])) {
		$hero_bg_url = $contact_hero['background_image'];
	} elseif (is_array($contact_hero['background_image']) && !empty($contact_hero['background_image']['url'])) {
		$hero_bg_url = $contact_hero['background_image']['url'];
	}
}

$hero_eyebrow = isset($contact_hero['eyebrow']) ? trim((string) $contact_hero['eyebrow']) : '';
$hero_title = isset($contact_hero['title']) ? trim((string) $contact_hero['title']) : '';
$hero_description = isset($contact_hero['description']) ? trim((string) $contact_hero['description']) : '';
$hero_overlay = isset($contact_hero['overlay_intensity']) ? (string) $contact_hero['overlay_intensity'] : 'default';
$hero_overlay_class = 'pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]';
if ('strong' === $hero_overlay) {
	$hero_overlay_class = 'pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.42)_0%,rgba(0,10,33,0.28)_45%,rgba(0,10,33,0.42)_100%)]';
} elseif ('soft' === $hero_overlay) {
	$hero_overlay_class = 'pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.18)_0%,rgba(0,10,33,0.12)_45%,rgba(0,10,33,0.18)_100%)]';
}

$intro_title = isset($contact_intro['title']) ? trim((string) $contact_intro['title']) : '';
$intro_body = isset($contact_intro['body']) ? trim((string) $contact_intro['body']) : '';

$form_title = isset($contact_form_block['title']) ? trim((string) $contact_form_block['title']) : '';
$form_cf7_id = isset($contact_form_block['cf7_form']) ? absint($contact_form_block['cf7_form']) : 0;

$apac_section_title = isset($contact_apac['section_title']) ? trim((string) $contact_apac['section_title']) : '';
$apac_aria = isset($contact_apac['list_aria_label']) ? trim((string) $contact_apac['list_aria_label']) : '';
$apac_decor_url = '';
if (!empty($contact_apac['decor_image'])) {
	if (is_string($contact_apac['decor_image'])) {
		$apac_decor_url = $contact_apac['decor_image'];
	} elseif (is_array($contact_apac['decor_image']) && !empty($contact_apac['decor_image']['url'])) {
		$apac_decor_url = $contact_apac['decor_image']['url'];
	}
}
$apac_items = array();
if (!empty($contact_apac['items']) && is_array($contact_apac['items'])) {
	$apac_items = $contact_apac['items'];
}

$faq_heading = isset($contact_faq['heading']) ? trim((string) $contact_faq['heading']) : '';
$faq_description = isset($contact_faq['description']) ? trim((string) $contact_faq['description']) : '';
$faq_items = !empty($contact_faq['items']) && is_array($contact_faq['items']) ? $contact_faq['items'] : array();

$faq_cta = array();
if (!empty($contact_faq['faq_cta']) && is_array($contact_faq['faq_cta'])) {
	$faq_cta = $contact_faq['faq_cta'];
} elseif (!empty($contact_faq['cta']) && is_array($contact_faq['cta'])) {
	$faq_cta = $contact_faq['cta'];
}
$faq_cta_title = isset($faq_cta['title']) ? trim((string) $faq_cta['title']) : '';
$faq_cta_text = isset($faq_cta['text']) ? trim((string) $faq_cta['text']) : '';
$faq_cta_link_data = !empty($faq_cta['link']) && is_array($faq_cta['link']) ? $faq_cta['link'] : array();
$faq_cta_link_url = !empty($faq_cta_link_data['url']) ? (string) $faq_cta_link_data['url'] : '';
$faq_cta_link_title = !empty($faq_cta_link_data['title']) ? (string) $faq_cta_link_data['title'] : '';
$faq_cta_link_target = !empty($faq_cta_link_data['target']) ? (string) $faq_cta_link_data['target'] : '_self';

$show_contact_faq = $contact_enable_faq && ($faq_heading !== '' || $faq_description !== '' || !empty($faq_items) || $faq_cta_title !== '' || $faq_cta_text !== '' || ($faq_cta_link_title !== '' && $faq_cta_link_url !== ''));

$show_intro_col = $intro_title !== '' || $intro_body !== '' || null !== $contact_email_link || null !== $contact_phone_link;
$show_form_col = $form_title !== '' || $form_cf7_id > 0;
$show_main_section = $contact_enable_main && ($show_intro_col || $show_form_col);

$main_grid_cols = ($show_intro_col && $show_form_col) ? 'lg:grid-cols-[1fr_620px]' : 'lg:grid-cols-1';

$show_hero_section = $contact_enable_hero && ($hero_bg_url !== '' || $hero_eyebrow !== '' || $hero_title !== '' || $hero_description !== '');

$show_apac_section = $contact_enable_apac && ($apac_section_title !== '' || !empty($apac_items) || $apac_decor_url !== '');

?>

<main id="primary" class="overflow-x-hidden bg-[#f6f6f6]" role="main">
	<?php if ($show_hero_section): ?>
		<section
			id="contact-hero"
			class="relative w-full p-1.5 md:p-2.5"
			<?php echo $hero_title !== '' ? 'aria-labelledby="contact-heading"' : 'aria-label="' . esc_attr__('Contact page hero', 'reacon-group') . '"'; ?>>
			<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
				<?php if ($hero_bg_url !== ''): ?>
					<img
						src="<?php echo esc_url($hero_bg_url); ?>"
						alt=""
						aria-hidden="true"
						class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
						fetchpriority="high"
						loading="eager"
						decoding="async" />
				<?php endif; ?>
				<div class="<?php echo esc_attr($hero_overlay_class); ?>" aria-hidden="true"></div>
				<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<?php if ($hero_eyebrow !== ''): ?>
						<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
							<?php echo esc_html($hero_eyebrow); ?>
						</p>
					<?php endif; ?>
					<?php if ($hero_title !== ''): ?>
						<h1 id="contact-heading" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
							<?php echo esc_html($hero_title); ?>
						</h1>
					<?php endif; ?>
					<?php if ($hero_description !== ''): ?>
						<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
							<?php echo esc_html($hero_description); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($show_main_section): ?>
		<section class="relative pb-12 pt-10 sm:pt-12 md:pt-14 lg:pt-[120px]">
			<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 md:px-8 <?php echo esc_attr($main_grid_cols); ?> lg:items-start lg:gap-6 xl:px-0">
				<?php if ($show_intro_col): ?>
					<div class="pt-2 md:pt-4 lg:pt-0">
						<?php if ($intro_title !== ''): ?>
							<h2 id="contact-intro-heading" class="max-w-[760px] font-display text-[38px] font-semibold leading-[1.15] text-black sm:text-[44px] md:text-[50px] lg:text-[56px]">
								<?php echo esc_html($intro_title); ?>
							</h2>
						<?php endif; ?>
						<?php if ($intro_body !== ''): ?>
							<p class="mt-4 max-w-[581px] font-display text-[18px] leading-[1.32] text-foreground sm:text-[20px]">
								<?php echo esc_html($intro_body); ?>
							</p>
						<?php endif; ?>

						<?php if (null !== $contact_email_link || null !== $contact_phone_link): ?>
							<div class="mt-10 flex flex-col gap-5">
								<?php if (null !== $contact_email_link): ?>
									<p class="flex items-center gap-1.5 font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl">
										<?php reacon_contact_render_icon($contact_email_icon, 'text-xl'); ?>
										<span>
											<a
												class="font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl"
												href="<?php echo esc_url($contact_email_link['url']); ?>"
												target="<?php echo esc_attr($contact_email_link['target']); ?>"
												<?php echo '_blank' === $contact_email_link['target'] ? ' rel="noopener noreferrer"' : ''; ?>>
												<?php echo esc_html($contact_email_link['title'] !== '' ? $contact_email_link['title'] : $contact_email_link['url']); ?>
											</a>
										</span>
									</p>
								<?php endif; ?>
								<?php if (null !== $contact_phone_link): ?>
									<p class="flex items-center gap-1.5 font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl">
										<?php reacon_contact_render_icon($contact_phone_icon, 'text-xl'); ?>
										<span>
											<a
												class="font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl"
												href="<?php echo esc_url($contact_phone_link['url']); ?>"
												target="<?php echo esc_attr($contact_phone_link['target']); ?>"
												<?php echo '_blank' === $contact_phone_link['target'] ? ' rel="noopener noreferrer"' : ''; ?>>
												<?php echo esc_html($contact_phone_link['title'] !== '' ? $contact_phone_link['title'] : $contact_phone_link['url']); ?>
											</a>
										</span>
									</p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($show_form_col): ?>
					<div class="w-full z-20 rounded-2xl rounded-br-[24px] bg-white p-5 sm:p-6 lg:rounded-bl-[32px] lg:rounded-br-[32px] lg:p-8">
						<?php if ($form_title !== ''): ?>
							<h2 class="font-display text-[44px] font-semibold leading-[1.15] text-black sm:text-[48px] lg:text-[56px]">
								<?php echo esc_html($form_title); ?>
							</h2>
						<?php endif; ?>

						<?php if ($form_cf7_id > 0): ?>
							<div class="mt-4">
								<?php echo do_shortcode('[contact-form-7 id="' . esc_attr((string) $form_cf7_id) . '" html_class="reacon-contact-cf7"]'); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($show_apac_section): ?>
		<!-- Talk to sales -->
		<section class="bg-[#e9fbfc] py-10 sm:py-12 lg:py-14 mt-0 sm:-mt-80 relative">
			<div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 md:px-8 xl:px-0">
				<div class="max-w-[581px]">
					<?php if ($apac_section_title !== ''): ?>
						<h3 class="font-display text-[32px] font-medium leading-[1.32] text-black">
							<?php echo esc_html($apac_section_title); ?>
						</h3>
					<?php endif; ?>

					<?php if (!empty($apac_items)): ?>
						<div
							class="mt-8 flex flex-col gap-2 sm:gap-3"
							role="list"
							aria-label="<?php echo esc_attr($apac_aria !== '' ? $apac_aria : __('Asia Pacific office locations', 'reacon-group')); ?>"
							x-data="{ activeApac: -1 }">
							<?php foreach ($apac_items as $index => $row): ?>
								<?php
								if (!is_array($row)) {
									continue;
								}
								$loc_label = isset($row['location_label']) ? trim((string) $row['location_label']) : '';
								$panel_txt = isset($row['panel_text']) ? trim((string) $row['panel_text']) : '';
								if ($loc_label === '') {
									continue;
								}
								$item_id = 'reacon-apac-item-' . ((int) $index + 1);
								$panel_id = $item_id . '-panel';
								$idx = (int) $index;
								?>
								<div class="rounded-xl border border-[#c8ecef]/80 bg-white/60 px-4 py-3 sm:px-5 sm:py-4" role="listitem">
									<button
										type="button"
										id="<?php echo esc_attr($item_id); ?>"
										class="group flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
										aria-controls="<?php echo esc_attr($panel_id); ?>"
										:aria-expanded="activeApac === <?php echo esc_attr((string) $idx); ?> ? 'true' : 'false'"
										@click="activeApac = activeApac === <?php echo esc_attr((string) $idx); ?> ? -1 : <?php echo esc_attr((string) $idx); ?>">
										<span class="font-display text-lg font-medium leading-[1.32] text-foreground sm:text-xl">
											<?php echo esc_html($loc_label); ?>
										</span>
										<span
											class="shrink-0 text-xl leading-none text-primary transition-transform duration-200 select-none group-hover:scale-110"
											aria-hidden="true"
											x-text="activeApac === <?php echo esc_attr((string) $idx); ?> ? '−' : '+'"></span>
									</button>
									<?php if ($panel_txt !== ''): ?>
										<div
											id="<?php echo esc_attr($panel_id); ?>"
											class="overflow-hidden"
											x-show="activeApac === <?php echo esc_attr((string) $idx); ?>"
											x-transition:enter="transition-all ease-out duration-300"
											x-transition:enter-start="opacity-0 max-h-0"
											x-transition:enter-end="opacity-100 max-h-96"
											x-transition:leave="transition-all ease-in duration-200"
											x-transition:leave-start="opacity-100 max-h-96"
											x-transition:leave-end="opacity-0 max-h-0"
											x-cloak>
											<p class="mt-3 max-w-[520px] font-sans text-[15px] leading-relaxed text-[#4B5058]">
												<?php echo nl2br(esc_html($panel_txt)); ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ($apac_decor_url !== ''): ?>
					<img
						src="<?php echo esc_url($apac_decor_url); ?>"
						alt=""
						aria-hidden="true"
						class="absolute bottom-0 right-0 hidden h-auto w-[45%] max-w-[709px] opacity-95 md:block"
						loading="lazy"
						decoding="async" />
				<?php endif; ?>
			</div>
		</section>
		<!-- End Talk to sales -->
	<?php endif; ?>

	<!-- FAQ Section -->
	<?php if ($show_contact_faq): ?>
		<section id="reacon-faq-section" class="w-full bg-white py-12 xs:py-12 sm:py-12 md:py-16 lg:py-16 xl:py-16 2xl:py-16" aria-labelledby="reacon-faq-heading">
			<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
				<header class="flex flex-col gap-6">
					<?php if ($faq_heading !== ''): ?>
						<h2 id="reacon-faq-heading" class="text-3xl font-semibold leading-tight text-black sm:text-4xl md:text-[2.625rem] lg:text-[2.75rem] xl:text-5xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
							<?php echo esc_html($faq_heading); ?>
						</h2>
					<?php endif; ?>
					<?php if ($faq_description !== ''): ?>
						<p class="max-w-4xl text-base leading-relaxed text-black/80 sm:text-[1.0625rem] md:text-lg">
							<?php echo esc_html($faq_description); ?>
						</p>
					<?php endif; ?>
				</header>

				<?php if (!empty($faq_items)): ?>
					<div class="mt-10 flex flex-col gap-3 sm:mt-12 md:mt-14 lg:mt-16" role="list" aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>" x-data="{ activeFaq: 0 }">
						<?php foreach ($faq_items as $index => $faq_item):
							$question = !empty($faq_item['question']) ? (string) $faq_item['question'] : '';
							$answer = !empty($faq_item['answer']) ? (string) $faq_item['answer'] : '';
							if ($question === '' || $answer === '') continue;
							$item_id = 'reacon-contact-faq-item-' . ((int) $index + 1);
							$panel_id = $item_id . '-panel';
						?>
							<div class="reacon-faq-item rounded-2xl border border-[#E7E7E7] px-5 py-[1.125rem] transition-colors duration-300 sm:px-6 sm:py-5" role="listitem" :class="{ 'reacon-faq-item--open': activeFaq === <?php echo esc_attr((string) $index); ?> }">
								<button type="button" id="<?php echo esc_attr($item_id); ?>" class="flex w-full cursor-pointer items-start justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[var(--reacon-teal)] focus-visible:ring-offset-2" aria-controls="<?php echo esc_attr($panel_id); ?>" :aria-expanded="activeFaq === <?php echo esc_attr((string) $index); ?> ? 'true' : 'false'" @click="activeFaq = activeFaq === <?php echo esc_attr((string) $index); ?> ? -1 : <?php echo esc_attr((string) $index); ?>">
									<span class="text-lg font-medium leading-snug text-[#383B43] sm:text-xl" style="font-family: 'Plus Jakarta Sans','Graphik Trial',ui-sans-serif,system-ui">
										<?php echo esc_html($question); ?>
									</span>
									<span class="mt-0.5 shrink-0 text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeFaq === <?php echo esc_attr((string) $index); ?> ? '−' : '+'"></span>
								</button>
								<div id="<?php echo esc_attr($panel_id); ?>" class="overflow-hidden" x-show="activeFaq === <?php echo esc_attr((string) $index); ?>" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in duration-200" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" x-cloak>
									<p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base">
										<?php echo nl2br(esc_html($answer)); ?>
									</p>
								</div>
							</div>
						<?php endforeach; ?>

						<?php if ($faq_cta_title !== '' || $faq_cta_text !== ''): ?>
							<aside class="mt-1 rounded-2xl bg-[#E9FBFC] px-5 py-[1.125rem] sm:px-6 sm:py-5" aria-label="<?php esc_attr_e('FAQ contact call to action', 'reacon-group'); ?>">
								<div class="flex flex-col gap-2">
									<?php if ($faq_cta_title !== ''): ?><p class="text-[0.9375rem] font-medium leading-relaxed text-[#383B43] sm:text-base"><?php echo esc_html($faq_cta_title); ?></p><?php endif; ?>
									<?php if ($faq_cta_text !== ''): ?><p class="text-[0.9375rem] leading-relaxed text-[#666666] sm:text-base"><?php echo esc_html($faq_cta_text); ?></p><?php endif; ?>
								</div>
								<div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
								<?php if ($faq_cta_link_title !== '' && $faq_cta_link_url !== ''): ?>
									<a href="<?php echo esc_url($faq_cta_link_url); ?>" target="<?php echo esc_attr($faq_cta_link_target); ?>" <?php echo '_blank' === $faq_cta_link_target ? 'rel="noopener noreferrer"' : ''; ?> class="flex w-full items-center justify-between gap-4 text-[0.9375rem] font-medium leading-relaxed text-[#0A969B] transition-colors duration-300 hover:text-black sm:text-base">
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
	<!-- End FAQ Section -->
</main>

<style>
	/* Hide Alpine-controlled panels until JS runs (avoids flash of open content). */
	[x-cloak] {
		display: none !important;
	}

	.reacon-contact-cf7 {
		margin-top: 4px;
	}

	.reacon-contact-cf7 p {
		margin: 0 0 16px;
	}

	.reacon-contact-cf7 p:last-of-type {
		margin-bottom: 0;
	}

	.reacon-contact-cf7 label {
		display: block;
		margin-bottom: 3px;
		font-family: var(--font-sans);
		font-size: 15px;
		font-weight: 500;
		line-height: 1.42;
		color: var(--foreground);
	}

	.reacon-contact-cf7 input[type="text"],
	.reacon-contact-cf7 input[type="email"],
	.reacon-contact-cf7 input[type="tel"],
	.reacon-contact-cf7 input[type="url"],
	.reacon-contact-cf7 select,
	.reacon-contact-cf7 textarea {
		width: 100%;
		border: 1px solid #e7e7e7;
		border-radius: 999px;
		background: #fff;
		padding: 10px 14px;
		font-family: var(--font-sans);
		font-size: 15px;
		line-height: 1.42;
		color: #516278;
		outline: 0;
	}

	.reacon-contact-cf7 select {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding-right: 42px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'%3E%3Cpath d='M3.5 5.25L7 8.75L10.5 5.25' stroke='%23516278' stroke-width='1.7' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
		background-repeat: no-repeat;
		background-position: right 14px center;
		background-size: 14px 14px;
	}

	.reacon-contact-cf7 select::-ms-expand {
		display: none;
	}

	.reacon-contact-cf7 textarea {
		border-radius: 20px;
		min-height: 84px;
		resize: vertical;
	}

	.reacon-contact-cf7 input:focus,
	.reacon-contact-cf7 select:focus,
	.reacon-contact-cf7 textarea:focus {
		border-color: var(--primary);
		box-shadow: 0 0 0 2px rgba(30, 202, 211, 0.25);
	}

	.reacon-contact-cf7 .wpcf7-submit {
		border: 0;
		border-radius: 999px;
		background: var(--primary);
		color: #fff;
		font-family: var(--font-sans);
		font-size: 15px;
		font-weight: 500;
		line-height: 1.42;
		padding: 11px 20px;
		cursor: pointer;
		transition: filter 0.2s ease;
	}

	.reacon-contact-cf7 .wpcf7-form-control-wrap {
		display: block;
	}

	.reacon-contact-cf7 br {
		display: none;
	}

	.reacon-contact-cf7 .wpcf7-submit:hover {
		filter: brightness(1.05);
	}

	.reacon-contact-cf7 .wpcf7-spinner {
		margin-left: 8px;
	}

	.reacon-contact-cf7 .wpcf7-not-valid-tip {
		margin-top: 6px;
		font-size: 13px;
	}

	/* Desktop-only top notch to keep header/hero consistency with About page. */
	@media (min-width: 1024px) {
		#contact-hero .reacon-about-hero-card {
			--hero-notch-width: clamp(560px, 48vw, 720px);
			--hero-notch-radius: 40px;
			--hero-notch-height: 86px;
			--hero-notch-swoop: 40px;
		}

		#contact-hero .reacon-about-hero-card::before {
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

		#contact-hero .reacon-about-hero-card::after {
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
		const syncContactHeroNotchToDesktopMenu = () => {
			const heroCard = document.querySelector('#contact-hero .reacon-about-hero-card');
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

		let contactNotchSyncRaf = null;
		const scheduleContactNotchSync = () => {
			if (contactNotchSyncRaf) {
				cancelAnimationFrame(contactNotchSyncRaf);
			}
			contactNotchSyncRaf = requestAnimationFrame(syncContactHeroNotchToDesktopMenu);
		};

		scheduleContactNotchSync();
		window.addEventListener('resize', scheduleContactNotchSync);
		window.addEventListener('load', scheduleContactNotchSync);
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(scheduleContactNotchSync).catch(() => {});
		}

		if (window.lucide && typeof window.lucide.createIcons === 'function') {
			window.lucide.createIcons();
		}
	});
</script>

<?php
get_footer();
