<?php

/**
 * Template Name: Industry — Custom Template
 * Template Post Type: page, industry
 *
 * Dynamic ACF-powered industry custom page template.
 * All content is managed through ACF Pro field groups.
 *
 * @package reacon-group
 */

get_header();

$industry_id = (int) get_the_ID();

if (!function_exists('reacon_group_industry_single_link_data')) {
    /**
     * Normalize ACF link arrays.
     *
     * @param mixed $link ACF link field value.
     * @return array<string,string>|null
     */
    function reacon_group_industry_single_link_data($link)
    {
        if (!is_array($link) || empty($link['url'])) {
            return null;
        }

        return array(
            'url' => (string) $link['url'],
            'title' => isset($link['title']) ? (string) $link['title'] : '',
            'target' => !empty($link['target']) ? (string) $link['target'] : '_self',
        );
    }
}

if (!function_exists('reacon_group_industry_single_image_url')) {
    /**
     * Normalize ACF image field value to a URL.
     *
     * @param mixed $image ACF image field value.
     * @return string
     */
    function reacon_group_industry_single_image_url($image)
    {
        if (is_string($image)) {
            return $image;
        }

        if (is_array($image) && !empty($image['url'])) {
            return (string) $image['url'];
        }

        if (is_numeric($image)) {
            $url = wp_get_attachment_image_url((int) $image, 'full');
            return $url ? (string) $url : '';
        }

        return '';
    }
}

if (!function_exists('reacon_group_industry_single_phosphor_map')) {
    /**
     * Preset slug to Phosphor class map.
     *
     * @return array<string,string>
     */
    function reacon_group_industry_single_phosphor_map()
    {
        return array(
            'arrow-up-right' => 'ph-bold ph-arrow-up-right',
            'arrow-right' => 'ph-bold ph-arrow-right',
            'arrow-down-right' => 'ph-bold ph-arrow-down-right',
            'arrow-up' => 'ph-bold ph-arrow-up',
        );
    }
}

if (!function_exists('reacon_group_industry_single_lucide_map')) {
    /**
     * Preset slug to Lucide icon name map.
     *
     * @return array<string,string>
     */
    function reacon_group_industry_single_lucide_map()
    {
        return array(
            'arrow-up-right' => 'arrow-up-right',
            'arrow-right' => 'arrow-right',
            'arrow-down-right' => 'arrow-down-right',
            'arrow-up' => 'arrow-up',
        );
    }
}

if (!function_exists('reacon_group_industry_single_render_icon')) {
    /**
     * Render an icon from the configured ACF source.
     *
     * @param mixed  $icon_group Icon field group.
     * @param string $class      CSS classes for the rendered icon.
     */
    function reacon_group_industry_single_render_icon($icon_group, $class = '')
    {
        if (!is_array($icon_group)) {
            return;
        }

        $source = isset($icon_group['icon_source']) ? (string) $icon_group['icon_source'] : '';
        $class  = trim((string) $class);

        if ('phosphor' === $source) {
            $preset = isset($icon_group['phosphor_icon']) ? (string) $icon_group['phosphor_icon'] : '';
            $map    = reacon_group_industry_single_phosphor_map();

            if ('custom' === $preset) {
                $custom = isset($icon_group['phosphor_class']) ? trim((string) $icon_group['phosphor_class']) : '';
                if ($custom !== '') {
                    echo '<i class="' . esc_attr(trim($custom . ' ' . $class)) . '" aria-hidden="true"></i>';
                }
                return;
            }

            if (isset($map[$preset])) {
                echo '<i class="' . esc_attr(trim($map[$preset] . ' ' . $class)) . '" aria-hidden="true"></i>';
            }
            return;
        }

        if ('lucide' === $source) {
            $preset = isset($icon_group['lucide_icon']) ? (string) $icon_group['lucide_icon'] : '';
            $map    = reacon_group_industry_single_lucide_map();
            $name   = 'custom' === $preset ? (isset($icon_group['lucide_name']) ? (string) $icon_group['lucide_name'] : '') : (isset($map[$preset]) ? $map[$preset] : '');

            if ($name !== '') {
                echo '<i data-lucide="' . esc_attr($name) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
            }
            return;
        }

        if ('svg_asset' === $source) {
            $svg = isset($icon_group['svg_asset']) ? $icon_group['svg_asset'] : '';
            if ($svg !== '' && function_exists('reacon_group_inline_svg')) {
                $svg_markup = reacon_group_inline_svg($svg, $class);
                if ($svg_markup) {
                    echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
            return;
        }

        if ('image' === $source) {
            $image_url = reacon_group_industry_single_image_url(isset($icon_group['image']) ? $icon_group['image'] : '');
            if ($image_url !== '') {
                echo '<img src="' . esc_url($image_url) . '" alt="" aria-hidden="true" class="' . esc_attr($class) . '" loading="lazy" decoding="async" />';
            }
        }
    }
}

$hero_enabled = function_exists('get_field') ? (bool) get_field('custom_industry_enable_hero_section', $industry_id) : false;
$hero         = function_exists('get_field') ? get_field('custom_industry_hero', $industry_id) : array();
$hero         = is_array($hero) ? $hero : array();

$content_enabled = function_exists('get_field') ? (bool) get_field('custom_industry_enable_content_section', $industry_id) : false;
$custom_content  = function_exists('get_field') ? get_field('custom_industry_content', $industry_id) : array();
$custom_content  = is_array($custom_content) ? $custom_content : array();

$cta_enabled = function_exists('get_field') ? (bool) get_field('custom_industry_enable_cta_section', $industry_id) : false;
$cta         = function_exists('get_field') ? get_field('custom_industry_cta', $industry_id) : array();
$cta         = is_array($cta) ? $cta : array();

$faq_enabled = function_exists('get_field') ? (bool) get_field('custom_industry_enable_faq_section', $industry_id) : false;
$faq         = function_exists('get_field') ? get_field('custom_industry_faq', $industry_id) : array();
$faq         = is_array($faq) ? $faq : array();

$case_study_enabled = function_exists('get_field') ? (bool) get_field('custom_industry_enable_case_study_section', $industry_id) : false;
$case_study         = function_exists('get_field') ? get_field('custom_industry_case_study', $industry_id) : array();
$case_study         = is_array($case_study) ? $case_study : array();

$hero_image_url       = reacon_group_industry_single_image_url(isset($hero['background_image']) ? $hero['background_image'] : '');
$hero_kicker          = isset($hero['eyebrow']) ? trim((string) $hero['eyebrow']) : '';
$hero_title           = isset($hero['title']) ? trim((string) $hero['title']) : '';
$hero_summary         = isset($hero['description']) ? trim((string) $hero['description']) : '';
$hero_bg_color        = isset($hero['hero_card_bg_color']) ? (string) $hero['hero_card_bg_color'] : '';
$hero_overlay         = isset($hero['hero_overlay_gradient']) ? (string) $hero['hero_overlay_gradient'] : '';
$hero_is_ready        = $hero_image_url !== '' && $hero_kicker !== '' && $hero_title !== '' && $hero_summary !== '' && $hero_bg_color !== '' && $hero_overlay !== '';

$content_heading = isset($custom_content['heading']) ? trim((string) $custom_content['heading']) : '';
$content_items_raw = !empty($custom_content['items']) && is_array($custom_content['items']) ? array_values($custom_content['items']) : array();
$content_items = array();

foreach ($content_items_raw as $content_item) {
    if (!is_array($content_item)) {
        continue;
    }

    $nav_label = isset($content_item['nav_label']) ? trim((string) $content_item['nav_label']) : '';
    $title = isset($content_item['title']) ? trim((string) $content_item['title']) : '';

    // Updated variable structure to directly obtain field content string output by WYSIWYG
    $content_html = isset($content_item['content_block']) ? (string) $content_item['content_block'] : '';
    $has_content = trim(wp_strip_all_tags($content_html)) !== '' || preg_match('/<(img|figure|video|iframe|ul|ol|table|blockquote)\b/i', $content_html) === 1;

    if ($nav_label === '' && $title === '') {
        continue;
    }

    if (!$has_content) {
        continue;
    }

    $content_items[] = array(
        'nav_label' => $nav_label !== '' ? $nav_label : $title,
        'title' => $title !== '' ? $title : $nav_label,
        'content' => $content_html,
    );
}

$content_is_ready = !empty($content_items);

$cta_heading            = isset($cta['heading']) ? trim((string) $cta['heading']) : '';
$cta_description        = isset($cta['description']) ? trim((string) $cta['description']) : '';
$cta_primary_link       = reacon_group_industry_single_link_data(isset($cta['primary_link']) ? $cta['primary_link'] : null);
$cta_secondary_link     = reacon_group_industry_single_link_data(isset($cta['secondary_link']) ? $cta['secondary_link'] : null);
$cta_primary_icon       = isset($cta['primary_icon']) && is_array($cta['primary_icon']) ? $cta['primary_icon'] : array('icon_source' => 'phosphor', 'phosphor_icon' => 'arrow-up-right');
$cta_bg_base            = '#062b2d';
$cta_gradient_start     = '#0F3D47';
$cta_gradient_end       = '#062B2D';
$cta_primary_text_color = '#062b2d';
$cta_primary_icon_bg    = '#dbeef1';
$cta_is_ready           = $cta_heading !== '' && $cta_description !== '';

$faq_title           = isset($faq['title']) ? trim((string) $faq['title']) : '';
$faq_description     = isset($faq['description']) ? trim((string) $faq['description']) : '';
$faq_items_raw       = !empty($faq['items']) && is_array($faq['items']) ? array_values($faq['items']) : array();
$faq_items           = array();
$faq_cta_heading     = isset($faq['cta_heading']) ? trim((string) $faq['cta_heading']) : '';
$faq_cta_description = isset($faq['cta_description']) ? trim((string) $faq['cta_description']) : '';
$faq_cta_link        = reacon_group_industry_single_link_data(isset($faq['cta_link']) ? $faq['cta_link'] : null);
$faq_cta_card_bg     = isset($faq['cta_card_bg_color']) ? (string) $faq['cta_card_bg_color'] : '';
$faq_cta_link_color  = isset($faq['cta_link_color']) ? (string) $faq['cta_link_color'] : '';

foreach ($faq_items_raw as $faq_item) {
    if (!is_array($faq_item)) {
        continue;
    }

    $question = isset($faq_item['question']) ? trim((string) $faq_item['question']) : '';
    $answer   = isset($faq_item['answer']) ? trim((string) $faq_item['answer']) : '';

    if ($question === '' || $answer === '') {
        continue;
    }

    $faq_items[] = array(
        'question' => $question,
        'answer'   => $answer,
    );
}

$faq_is_ready = $faq_title !== '' && $faq_description !== '' && !empty($faq_items) && $faq_cta_heading !== '' && $faq_cta_description !== '' && null !== $faq_cta_link && $faq_cta_card_bg !== '' && $faq_cta_link_color !== '';

$case_study_heading            = isset($case_study['heading']) ? trim((string) $case_study['heading']) : 'What our customers say about us!';
$case_study_brochure_label     = isset($case_study['brochure_label']) ? trim((string) $case_study['brochure_label']) : 'Brochure';
$case_study_brochure_link      = reacon_group_industry_single_link_data(isset($case_study['brochure_link']) ? $case_study['brochure_link'] : null);
$case_study_title              = isset($case_study['title']) ? trim((string) $case_study['title']) : 'The Little National';
$case_study_quote              = isset($case_study['quote']) ? trim((string) $case_study['quote']) : 'A professional and seamlessly integrated service for packaging, print and marketing comms, all rolled up in a technology solution that enables us to track inventory, order to stores, understand pricing, receive competitive quotes, manage comms campaigns and fulfilment requests from a click of button';
$case_study_person_name        = isset($case_study['person_name']) ? trim((string) $case_study['person_name']) : 'Sandra Bellamy';
$case_study_person_role        = isset($case_study['person_role']) ? trim((string) $case_study['person_role']) : 'Operations Manager';
$case_study_person_company     = isset($case_study['person_company']) ? trim((string) $case_study['person_company']) : 'The Little National';
$case_study_person_image_url   = reacon_group_industry_single_image_url(isset($case_study['person_image']) ? $case_study['person_image'] : '');
$case_study_metric_value       = isset($case_study['metric_value']) ? (int) $case_study['metric_value'] : 19;
$case_study_metric_value       = max(0, min(100, $case_study_metric_value));
$case_study_metric_description = isset($case_study['metric_description']) ? trim((string) $case_study['metric_description']) : 'reduction in stock and delivery costs with Just-in-Time inventory management, automation and consolidation strategies.';
$case_study_left_bg            = isset($case_study['left_card_bg_color']) ? (string) $case_study['left_card_bg_color'] : '#14b8a6';
$case_study_right_bg           = isset($case_study['right_card_bg_color']) ? (string) $case_study['right_card_bg_color'] : '#111827';
$case_study_track_color        = isset($case_study['chart_track_color']) ? (string) $case_study['chart_track_color'] : '#374151';
$case_study_fill_color         = isset($case_study['chart_fill_color']) ? (string) $case_study['chart_fill_color'] : '#14b8a6';
$case_study_gauge_id           = 'industry-case-study-gauge-' . (string) $industry_id;

$case_study_is_ready =
    $case_study_heading !== '' &&
    $case_study_title !== '' &&
    $case_study_quote !== '' &&
    $case_study_person_name !== '' &&
    $case_study_metric_description !== '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ($hero_enabled && $hero_is_ready) : ?>
        <!-- Start: Industry Hero Section -->
        <section
            id="industry-hero"
            class="relative w-full p-0 md:p-2.5"
            aria-labelledby="industry-hero-title">

            <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]" style="background-color: <?php echo esc_attr($hero_bg_color); ?>;">
                <img
                    src="<?php echo esc_url($hero_image_url); ?>"
                    alt=""
                    aria-hidden="true"
                    class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                    fetchpriority="high"
                    loading="eager"
                    decoding="async" />

                <div class="pointer-events-none absolute inset-0" aria-hidden="true" style="background: <?php echo esc_attr($hero_overlay); ?>;"></div>

                <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                    <p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
                        <?php echo esc_html($hero_kicker); ?>
                    </p>

                    <h1 id="industry-hero-title" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                        <?php echo esc_html($hero_title); ?>
                    </h1>

                    <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                        <?php echo esc_html($hero_summary); ?>
                    </p>
                </div>
            </div>
        </section>
        <!-- End: Industry Hero Section -->
    <?php endif; ?>

    <?php if ($content_enabled && $content_is_ready) : ?>
        <!-- Start: Industry Vertical Accordion Section -->
        <section id="industry-main-content" class="w-full bg-[#F6F7F9] py-10 sm:py-12 lg:py-14" aria-label="<?php echo esc_attr__('Industry content', 'reacon-group'); ?>" x-data="{ activeIndex: 0 }">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-[260px_minmax(0,1fr)] lg:gap-14">
                    <aside class="lg:sticky lg:top-28 lg:self-start">
                        <div class="flex gap-3 overflow-x-auto pb-1 lg:flex-col lg:overflow-visible">
                            <?php foreach ($content_items as $index => $content_item) : ?>
                                <button
                                    type="button"
                                    class="shrink-0 rounded-full px-4 py-2 text-left font-sans text-[20px] font-normal leading-[25.2px] transition-colors lg:w-full"
                                    :class="activeIndex === <?php echo esc_attr((string) $index); ?> ? 'bg-[#E8EDF2] text-foreground' : 'bg-transparent text-[#667085] hover:bg-[#EEF1F5]'"
                                    @click="activeIndex = <?php echo esc_attr((string) $index); ?>"
                                    aria-controls="industry-content-panel-<?php echo esc_attr((string) $index); ?>"
                                    :aria-expanded="activeIndex === <?php echo esc_attr((string) $index); ?>">
                                    <?php echo esc_html($content_item['nav_label']); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </aside>

                    <div class="min-w-0">
                        <?php if ($content_heading !== '') : ?>
                            <h2 class="mb-4 font-display text-[36px] font-semibold leading-[1.16] text-foreground sm:text-[44px] lg:text-[56px] lg:leading-[1.1]">
                                <?php echo esc_html($content_heading); ?>
                            </h2>
                        <?php endif; ?>

                        <?php foreach ($content_items as $index => $content_item) : ?>
                            <article
                                id="industry-content-panel-<?php echo esc_attr((string) $index); ?>"
                                x-show="activeIndex === <?php echo esc_attr((string) $index); ?>"
                                x-transition:enter="transition ease-out duration-250"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-cloak
                                class="reacon-industry-accordion-content rounded-[20px] bg-transparent p-0">
                                <h3 class="reacon-type-h3 text-[#1ec9d2]">
                                    <?php echo esc_html($content_item['title']); ?>
                                </h3>
                                <div <?php reacon_group_content_class('entry-content mt-4 font-sans text-[16px] leading-[1.45] text-foreground/85'); ?>>
                                    <?php
                                    // ACF outputs the filtered wysiwyg directly 
                                    echo $content_item['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                    ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Industry Vertical Accordion Section -->
    <?php endif; ?>
    <?php if ($case_study_enabled && $case_study_is_ready) : ?>
        <!-- Case Study Section -->
        <section class="mx-auto w-full max-w-7xl px-4 py-12 md:py-20 lg:py-24 sm:px-6 lg:px-8" aria-label="<?php echo esc_attr__('Case study', 'reacon-group'); ?>">
            <header class="mb-12 flex items-center justify-between gap-5 md:mb-16">
                <h2 class="reacon-type-h2 font-extrabold tracking-tight text-[#030712]">
                    <?php echo esc_html($case_study_heading); ?>
                </h2>

                <?php if (null !== $case_study_brochure_link) : ?>
                    <a href="<?php echo esc_url($case_study_brochure_link['url']); ?>" target="<?php echo esc_attr($case_study_brochure_link['target']); ?>" class="group inline-flex flex-col items-center gap-2 no-underline" aria-label="<?php echo esc_attr($case_study_brochure_label); ?>">
                        <span class="inline-flex rounded-full border border-[#E5E7EB] bg-white p-3 shadow-sm transition-shadow group-hover:shadow-md" aria-hidden="true">
                            <svg class="h-6 w-6 text-[#14b8a6]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 0 1 2-2h6l2 2h6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                        </span>
                        <span class="text-xs font-semibold uppercase tracking-[0.14em] text-[#6B7280] transition-colors group-hover:text-[#14b8a6]">
                            <?php echo esc_html($case_study_brochure_label); ?>
                        </span>
                    </a>
                <?php endif; ?>
            </header>

            <div class="grid grid-cols-1 overflow-hidden rounded-3xl shadow-2xl md:grid-cols-[1fr_minmax(300px,auto)]">
                <article class="flex flex-col justify-between p-8 text-white md:p-12 lg:p-16" style="background-color: <?php echo esc_attr($case_study_left_bg); ?>;">
                    <div>
                        <h3 class="mb-8 reacon font-extrabold text-white md:mb-10 md:text-3xl lg:mb-12 lg:text-4xl">
                            <?php echo esc_html($case_study_title); ?>
                        </h3>

                        <blockquote class="mb-12 border-l-4 border-[#99F6E4] pl-6  italic  text-[#CCFBF1] reacon-type-body">
                            <?php echo esc_html('“' . $case_study_quote . '”'); ?>
                        </blockquote>
                    </div>

                    <div class="mt-auto flex items-center gap-5 sm:gap-6">
                        <?php if ($case_study_person_image_url !== '') : ?>
                            <img src="<?php echo esc_url($case_study_person_image_url); ?>" alt="<?php echo esc_attr($case_study_person_name); ?>" class="h-16 w-16 rounded-full border-4 border-white object-cover shadow-lg" loading="lazy" decoding="async" />
                        <?php endif; ?>
                        <div>
                            <p class="text-lg font-semibold text-white"><?php echo esc_html($case_study_person_name); ?></p>
                            <?php if ($case_study_person_role !== '') : ?>
                                <p class="text-sm font-medium text-[#CCFBF1]"><?php echo esc_html($case_study_person_role); ?></p>
                            <?php endif; ?>
                            <?php if ($case_study_person_company !== '') : ?>
                                <p class="text-sm font-medium text-[#CCFBF1]"><?php echo esc_html($case_study_person_company); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>

                <aside class="flex flex-col items-center justify-center gap-10 border-t border-[#1F2937] p-8 text-white md:gap-12 md:border-l md:border-t-0 md:p-12 lg:p-16" style="background-color: <?php echo esc_attr($case_study_right_bg); ?>;">
                    <div id="<?php echo esc_attr($case_study_gauge_id); ?>" class="w-full max-w-sm" data-case-study-gauge="true" data-value="<?php echo esc_attr((string) $case_study_metric_value); ?>" data-track-color="<?php echo esc_attr($case_study_track_color); ?>" data-fill-color="<?php echo esc_attr($case_study_fill_color); ?>"></div>

                    <div class="max-w-md text-center md:text-left">
                        <p class="text-lg leading-relaxed text-[#D1D5DB]">
                            <?php echo esc_html($case_study_metric_description); ?>
                        </p>
                    </div>
                </aside>
            </div>
        </section>
        <!-- End Case Study Section -->
    <?php endif; ?>
    <?php if ($cta_enabled && $cta_is_ready) : ?>
        <!-- Start: Industry CTA Section -->
        <section id="industry-cta" class="py-10" aria-labelledby="industry-cta-heading">
            <div class="mx-auto w-full px-5 sm:px-6 lg:px-10">
                <div class="relative overflow-hidden rounded-[22px] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]" style="background-color: <?php echo esc_attr($cta_bg_base); ?>;">
                    <!-- Start: CTA Background Decorations -->
                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(30,202,211,0.08)_0%,rgba(30,202,211,0)_58%)]" aria-hidden="true"></div>
                    <div class="pointer-events-none absolute inset-0 opacity-75" aria-hidden="true" style="background: linear-gradient(180deg, <?php echo esc_attr($cta_gradient_start); ?> 0%, <?php echo esc_attr($cta_gradient_end); ?> 100%);"></div>

                    <div class="pointer-events-none absolute left-16 top-0 h-[205px] w-[1566px]" aria-hidden="true">
                        <svg viewBox="0 0 1566 205" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
                            <path
                                d="M278.503 205L1566 -538.596L-556 -586L278.503 205Z"
                                fill="url(#industryCtaShardLeftGradient)"
                                fill-opacity="0.15" />
                            <defs>
                                <linearGradient id="industryCtaShardLeftGradient" x1="504.197" y1="170.056" x2="505.001" y2="-586" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#1ECAD3" />
                                    <stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <div class="pointer-events-none absolute right-[-955px] h-[791px] w-[2122px]" aria-hidden="true">
                        <svg width="2122" height="791" viewBox="0 0 2122 791" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
                            <path d="M1287.5 -60L0 683.596L2122 731L1287.5 -60Z" fill="url(#industryCtaShardGradient)" fill-opacity="0.15" />
                            <defs>
                                <linearGradient id="industryCtaShardGradient" x1="1061.8" y1="-25.0558" x2="1061" y2="731" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#1ECAD3" />
                                    <stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <!-- End: CTA Background Decorations -->

                    <div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
                        <h2 id="industry-cta-heading" class="reacon-type-h1 text-white">
                            <?php echo esc_html($cta_heading); ?>
                        </h2>

                        <p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
                            <?php echo esc_html($cta_description); ?>
                        </p>

                        <div class="mt-6 flex w-full max-w-[430px] flex-col items-center justify-center gap-3.5 sm:mt-7 sm:max-w-none sm:flex-row sm:flex-wrap sm:items-center">
                            <?php if (null !== $cta_primary_link) : ?>
                                <a
                                    href="<?php echo esc_url($cta_primary_link['url']); ?>"
                                    target="<?php echo esc_attr($cta_primary_link['target']); ?>"
                                    class="group inline-flex w-[240px] items-center justify-between gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 text-left font-sans text-[13px] font-medium no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2"
                                    style="color: <?php echo esc_attr($cta_primary_text_color); ?>;">
                                    <span><?php echo esc_html($cta_primary_link['title']); ?></span>
                                    <span class="relative flex h-7 w-7 shrink-0 items-center justify-center overflow-hidden rounded-full" style="background-color: <?php echo esc_attr($cta_primary_icon_bg); ?>;" aria-hidden="true">
                                        <i class="ph-bold ph-arrow-up-right absolute text-[12px] transition-all duration-300 group-hover:translate-x-2 group-hover:-translate-y-2 group-hover:opacity-0" aria-hidden="true"></i>
                                        <i class="ph-bold ph-arrow-up-right absolute translate-x-[-10px] translate-y-[10px] text-[12px] opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
                                    </span>
                                </a>
                            <?php endif; ?>

                            <?php if (null !== $cta_secondary_link) : ?>
                                <a
                                    href="<?php echo esc_url($cta_secondary_link['url']); ?>"
                                    target="<?php echo esc_attr($cta_secondary_link['target']); ?>"
                                    class="inline-flex w-[240px] items-center justify-start rounded-full border border-white/65 px-5 py-2.5 text-left font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10 sm:justify-center sm:text-center">
                                    <?php echo esc_html($cta_secondary_link['title']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Industry CTA Section -->
    <?php endif; ?>

    <?php if ($faq_enabled && $faq_is_ready) : ?>
        <section
            id="reacon-faq-section"
            class="w-full bg-white py-16"
            aria-labelledby="reacon-faq-heading"
            itemscope
            itemtype="https://schema.org/FAQPage"
            x-data="{ activeIndex: 0 }">

            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div class="flex flex-col gap-6">
                        <h2
                            id="reacon-faq-heading"
                            class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
                            <?php echo esc_html($faq_title); ?>
                        </h2>
                        <p class="max-w-4xl text-base leading-snug text-black">
                            <?php echo esc_html($faq_description); ?>
                        </p>
                    </div>
                </div>

                <div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>">
                    <?php foreach ($faq_items as $index => $faq_item) : ?>
                        <div
                            class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                            :class="activeIndex === <?php echo esc_attr((string) $index); ?> ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                            itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <button
                                type="button"
                                @click="activeIndex = activeIndex === <?php echo esc_attr((string) $index); ?> ? null : <?php echo esc_attr((string) $index); ?>"
                                :aria-expanded="activeIndex === <?php echo esc_attr((string) $index); ?>"
                                aria-controls="faq-answer-<?php echo esc_attr((string) $index); ?>"
                                class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                                <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                                    <?php echo esc_html($faq_item['question']); ?>
                                </span>
                                <span class="select-none text-xl leading-none text-[#0A969B]" aria-hidden="true" x-text="activeIndex === <?php echo esc_attr((string) $index); ?> ? '-' : '+'"></span>
                            </button>
                            <div
                                id="faq-answer-<?php echo esc_attr((string) $index); ?>"
                                x-show="activeIndex === <?php echo esc_attr((string) $index); ?>"
                                x-transition:enter="transition-all duration-300 ease-in-out"
                                x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                                x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                                x-transition:leave="transition-all duration-250 ease-in-out"
                                x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                                x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                                class="overflow-hidden"
                                itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                                    <?php echo esc_html($faq_item['answer']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="mt-1 rounded-2xl p-5 sm:p-6" style="background-color: <?php echo esc_attr($faq_cta_card_bg); ?>;">
                        <div class="flex flex-col gap-2">
                            <p class="text-base font-medium leading-snug text-[#383B43]">
                                <?php echo esc_html($faq_cta_heading); ?>
                            </p>
                            <p class="text-base leading-snug text-[#666666]">
                                <?php echo esc_html($faq_cta_description); ?>
                            </p>
                        </div>
                        <div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
                        <a
                            href="<?php echo esc_url($faq_cta_link['url']); ?>"
                            target="<?php echo esc_attr($faq_cta_link['target']); ?>"
                            class="group flex w-full items-center justify-between gap-4 rounded-md text-base font-medium leading-snug transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2"
                            style="color: <?php echo esc_attr($faq_cta_link_color); ?>;">
                            <span><?php echo esc_html($faq_cta_link['title']); ?></span>
                            <i class="ph ph-arrow-right text-base transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <footer class="entry-footer">
        <?php reacon_group_entry_footer(); ?>
    </footer><!-- .entry-footer -->

    <style>
        [x-cloak] {
            display: none !important;
        }

        .reacon-industry-accordion-content img {
            height: auto;
            max-width: 100%;
            border-radius: 16px;
        }

        .reacon-industry-accordion-content figure,
        .reacon-industry-accordion-content .wp-caption {
            margin: 1.25rem 0;
            max-width: 100%;
        }

        .reacon-industry-accordion-content iframe,
        .reacon-industry-accordion-content video {
            width: 100%;
            max-width: 100%;
            border-radius: 16px;
        }

        .reacon-industry-accordion-content ul,
        .reacon-industry-accordion-content ol {
            padding-left: 1.1rem;
        }

        .apexcharts-tooltip {
            background: #1f2937 !important;
            color: #ffffff !important;
            border: 1px solid #374151 !important;
        }

        .apexcharts-tooltip-title {
            background: #374151 !important;
            color: #ffffff !important;
        }

        /* Desktop-only notch so header sits recessed into the hero. */
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

            #industry-hero .reacon-about-hero-card {
                --hero-notch-width: clamp(560px, 48vw, 720px);
                --hero-notch-radius: 40px;
                --hero-notch-height: 86px;
                --hero-notch-swoop: 40px;
            }

            #industry-hero .reacon-about-hero-card::before {
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

            #industry-hero .reacon-about-hero-card::after {
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
            const caseStudyGauge = document.querySelector('[data-case-study-gauge="true"]');
            if (caseStudyGauge && window.ApexCharts) {
                const gaugeValue = Number(caseStudyGauge.getAttribute('data-value') || 0);
                const trackColor = caseStudyGauge.getAttribute('data-track-color') || '#374151';
                const fillColor = caseStudyGauge.getAttribute('data-fill-color') || '#14b8a6';

                const chart = new ApexCharts(caseStudyGauge, {
                    series: [Math.max(0, Math.min(100, gaugeValue))],
                    chart: {
                        type: 'radialBar',
                        offsetY: -20,
                        sparkline: {
                            enabled: true,
                        },
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90,
                            endAngle: 90,
                            track: {
                                background: trackColor,
                                strokeWidth: '97%',
                                margin: 5,
                            },
                            dataLabels: {
                                name: {
                                    show: false,
                                },
                                value: {
                                    offsetY: -2,
                                    fontSize: '64px',
                                    fontWeight: '900',
                                    color: '#ffffff',
                                    formatter(val) {
                                        return `${Math.round(val)}%`;
                                    },
                                },
                            },
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: 'horizontal',
                            shadeIntensity: 0.5,
                            gradientToColors: [fillColor],
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100],
                        },
                    },
                    labels: ['Reduction'],
                });

                chart.render();
            }

            const syncIndustryHeroNotchToDesktopMenu = () => {
                const heroCard = document.querySelector('#industry-hero .reacon-about-hero-card');
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

            let industryNotchSyncRaf = null;
            const scheduleIndustryNotchSync = () => {
                if (industryNotchSyncRaf) {
                    cancelAnimationFrame(industryNotchSyncRaf);
                }
                industryNotchSyncRaf = requestAnimationFrame(syncIndustryHeroNotchToDesktopMenu);
            };

            scheduleIndustryNotchSync();
            window.addEventListener('resize', scheduleIndustryNotchSync);
            window.addEventListener('load', scheduleIndustryNotchSync);
            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(scheduleIndustryNotchSync).catch(() => {});
            }

            if (window.lucide && typeof window.lucide.createIcons === 'function') {
                window.lucide.createIcons();
            }
        });
    </script>

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>