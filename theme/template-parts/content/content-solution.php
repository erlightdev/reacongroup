<?php

/**
 * Template part for displaying single solution posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

$solution_id = get_the_ID();
$acf_enabled = function_exists('get_field');

if (!function_exists('reacon_group_solution_link_data')) {
    function reacon_group_solution_link_data($link)
    {
        if (!is_array($link) || empty($link['url']) || empty($link['title'])) {
            return null;
        }

        return array(
            'url' => (string) $link['url'],
            'title' => (string) $link['title'],
            'target' => !empty($link['target']) ? (string) $link['target'] : '_self',
        );
    }
}

if (!function_exists('reacon_group_solution_image_url')) {
    function reacon_group_solution_image_url($image)
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

if (!function_exists('reacon_group_solution_render_icon')) {
    function reacon_group_solution_render_icon($icon_group, $class = '')
    {
        if (!is_array($icon_group)) {
            return;
        }

        $source = isset($icon_group['icon_source']) ? (string) $icon_group['icon_source'] : '';
        $class = trim((string) $class);

        $phosphor_map = array(
            'arrow-up-right' => 'ph-bold ph-arrow-up-right',
            'arrow-right' => 'ph-bold ph-arrow-right',
            'check' => 'ph-bold ph-check',
            'check-circle' => 'ph-bold ph-check-circle',
            'plus' => 'ph-bold ph-plus',
            'minus' => 'ph-bold ph-minus',
        );

        $lucide_map = array(
            'arrow-up-right' => 'arrow-up-right',
            'arrow-right' => 'arrow-right',
            'check' => 'check',
            'check-circle' => 'circle-check',
            'plus' => 'plus',
            'minus' => 'minus',
        );

        if ('phosphor' === $source) {
            $preset = isset($icon_group['phosphor_icon']) ? (string) $icon_group['phosphor_icon'] : '';
            if (isset($phosphor_map[$preset])) {
                echo '<i class="' . esc_attr(trim($phosphor_map[$preset] . ' ' . $class)) . '" aria-hidden="true"></i>';
            }
            return;
        }

        if ('lucide' === $source) {
            $preset = isset($icon_group['lucide_icon']) ? (string) $icon_group['lucide_icon'] : '';
            if (isset($lucide_map[$preset])) {
                echo '<i data-lucide="' . esc_attr($lucide_map[$preset]) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
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
            $image = isset($icon_group['image_asset']) ? $icon_group['image_asset'] : '';
            $image_url = reacon_group_solution_image_url($image);
            if ($image_url !== '') {
                echo '<img src="' . esc_url($image_url) . '" alt="" aria-hidden="true" class="' . esc_attr($class) . '" loading="lazy" decoding="async" />';
            }
        }
    }
}

$hero_enabled = $acf_enabled ? (bool) get_field('solution_content_enable_hero', $solution_id) : false;
$hero = $acf_enabled ? get_field('solution_content_hero', $solution_id) : array();
$hero = is_array($hero) ? $hero : array();

$details_enabled = $acf_enabled ? (bool) get_field('solution_content_enable_sections', $solution_id) : false;
$detail_sections = $acf_enabled ? get_field('solution_content_sections', $solution_id) : array();
$detail_sections = is_array($detail_sections) ? $detail_sections : array();

$capabilities_enabled = $acf_enabled ? (bool) get_field('solution_content_enable_capabilities', $solution_id) : false;
$capabilities = $acf_enabled ? get_field('solution_content_capabilities', $solution_id) : array();
$capabilities = is_array($capabilities) ? $capabilities : array();

$cta_enabled = $acf_enabled ? (bool) get_field('solution_content_enable_cta', $solution_id) : false;
$cta = $acf_enabled ? get_field('solution_content_cta', $solution_id) : array();
$cta = is_array($cta) ? $cta : array();

$faq_enabled = $acf_enabled ? (bool) get_field('solution_content_enable_faq', $solution_id) : false;
$faq = $acf_enabled ? get_field('solution_content_faq', $solution_id) : array();
$faq = is_array($faq) ? $faq : array();

$hero_background_url = reacon_group_solution_image_url(isset($hero['background_image']) ? $hero['background_image'] : '');
$hero_eyebrow = isset($hero['eyebrow']) ? trim((string) $hero['eyebrow']) : '';
$hero_title = isset($hero['title']) ? trim((string) $hero['title']) : '';
$hero_description = isset($hero['description']) ? trim((string) $hero['description']) : '';

$solution_sections = array();
if ($details_enabled && !empty($detail_sections)) {
    foreach ($detail_sections as $section) {
        if (!is_array($section) || (isset($section['enabled']) && empty($section['enabled']))) {
            continue;
        }

        $paragraphs = array();
        if (!empty($section['paragraphs']) && is_array($section['paragraphs'])) {
            foreach ($section['paragraphs'] as $paragraph) {
                if (is_array($paragraph) && isset($paragraph['text'])) {
                    $paragraph_text = trim((string) $paragraph['text']);
                } else {
                    $paragraph_text = trim((string) $paragraph);
                }

                if ($paragraph_text !== '') {
                    $paragraphs[] = $paragraph_text;
                }
            }
        }

        $section_title = isset($section['title']) ? trim((string) $section['title']) : '';
        $section_image_url = reacon_group_solution_image_url(isset($section['image']) ? $section['image'] : '');

        if ($section_title === '' || $section_image_url === '' || empty($paragraphs)) {
            continue;
        }

        $solution_sections[] = array(
            'title' => $section_title,
            'paragraphs' => $paragraphs,
            'image_url' => $section_image_url,
        );
    }
}

$capability_heading = isset($capabilities['heading']) ? trim((string) $capabilities['heading']) : '';
$capability_description = isset($capabilities['description']) ? trim((string) $capabilities['description']) : '';
$capability_cards = array();
if ($capabilities_enabled && !empty($capabilities['cards']) && is_array($capabilities['cards'])) {
    foreach ($capabilities['cards'] as $card) {
        if (!is_array($card)) {
            continue;
        }

        $card_title = isset($card['title']) ? trim((string) $card['title']) : '';
        $card_description = isset($card['description']) ? trim((string) $card['description']) : '';
        $card_image_url = reacon_group_solution_image_url(isset($card['image']) ? $card['image'] : '');

        if ($card_title === '' || $card_description === '' || $card_image_url === '') {
            continue;
        }

        $capability_cards[] = array(
            'title' => $card_title,
            'description' => $card_description,
            'image_url' => $card_image_url,
            'link' => reacon_group_solution_link_data(isset($card['link']) ? $card['link'] : null),
        );
    }
}

$cta_heading = isset($cta['heading']) ? trim((string) $cta['heading']) : '';
$cta_description = isset($cta['description']) ? trim((string) $cta['description']) : '';
$cta_primary_link = reacon_group_solution_link_data(isset($cta['primary_link']) ? $cta['primary_link'] : null);
$cta_secondary_link = reacon_group_solution_link_data(isset($cta['secondary_link']) ? $cta['secondary_link'] : null);
$cta_primary_icon = isset($cta['primary_icon']) && is_array($cta['primary_icon']) ? $cta['primary_icon'] : array();
$cta_secondary_icon = isset($cta['secondary_icon']) && is_array($cta['secondary_icon']) ? $cta['secondary_icon'] : array();

$faq_heading = isset($faq['heading']) ? trim((string) $faq['heading']) : '';
$faq_description = isset($faq['description']) ? trim((string) $faq['description']) : '';
$faq_items = array();
if ($faq_enabled && !empty($faq['items']) && is_array($faq['items'])) {
    foreach ($faq['items'] as $item) {
        if (!is_array($item)) {
            continue;
        }

        $question = isset($item['question']) ? trim((string) $item['question']) : '';
        $answer = isset($item['answer']) ? trim((string) $item['answer']) : '';

        if ($question === '' || $answer === '') {
            continue;
        }

        $faq_items[] = array(
            'question' => $question,
            'answer' => $answer,
        );
    }
}

$faq_support_heading = isset($faq['support_card_heading']) ? trim((string) $faq['support_card_heading']) : '';
$faq_support_description = isset($faq['support_card_description']) ? trim((string) $faq['support_card_description']) : '';
$faq_support_link = reacon_group_solution_link_data(isset($faq['support_card_link']) ? $faq['support_card_link'] : null);
$faq_support_icon = isset($faq['support_card_icon']) && is_array($faq['support_card_icon']) ? $faq['support_card_icon'] : array();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ($hero_enabled && $hero_background_url !== '' && $hero_eyebrow !== '' && $hero_title !== '' && $hero_description !== '') : ?>
        <section
            id="solution-visual-hero"
            class="relative w-full p-0 md:p-2.5"
            aria-label="<?php esc_attr_e('Solution page hero', 'reacon-group'); ?>">
            <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
                <img
                    src="<?php echo esc_url($hero_background_url); ?>"
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
                        <?php echo esc_html($hero_description); ?>
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($details_enabled && !empty($solution_sections)) : ?>
        <section id="solution-visual-content" class="bg-background py-8 sm:py-12 lg:py-16" aria-label="<?php esc_attr_e('Visual studio service details', 'reacon-group'); ?>" data-stack-enabled="true">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
                <?php foreach ($solution_sections as $section_index => $section): ?>
                    <?php $is_even_row = 1 === ($section_index % 2); ?>
                    <article class="solution-stack-card bg-background py-8 sm:py-10 lg:py-14" data-stack-card>
                        <div class="grid grid-cols-1 items-center gap-6 <?php echo esc_attr($is_even_row ? 'lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)]' : 'lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)]'); ?> lg:gap-16 xl:gap-20">
                            <div class="order-2 max-w-[560px] <?php echo esc_attr($is_even_row ? 'lg:order-2 lg:pl-2' : 'lg:order-1 lg:pr-2'); ?>">
                                <header class="space-y-5 text-foreground">
                                    <h2 class="font-display text-[32px] font-bold leading-[1.15] text-foreground sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[1.15]">
                                        <?php echo esc_html($section['title']); ?>
                                    </h2>
                                </header>
                                <div class="mt-5 space-y-3 font-sans text-[16px] font-normal leading-[1.42] text-foreground/85">
                                    <?php foreach ($section['paragraphs'] as $paragraph): ?>
                                        <p><?php echo esc_html($paragraph); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="order-1 lg:w-full lg:max-w-[620px] <?php echo esc_attr($is_even_row ? 'lg:order-1 lg:justify-self-start' : 'lg:order-2 lg:justify-self-end'); ?>">
                                <div class="relative overflow-hidden rounded-[28px] bg-muted ">
                                    <img
                                        src="<?php echo esc_url($section['image_url']); ?>"
                                        alt=""
                                        class="aspect-4/3 h-full w-full object-cover"
                                        loading="lazy"
                                        decoding="async" />
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($capabilities_enabled && $capability_heading !== '' && $capability_description !== '' && !empty($capability_cards)) : ?>
        <section id="solution-visual-core-capabilities" class="bg-background pb-12 pt-6 sm:pb-16 sm:pt-8 lg:pb-24 lg:pt-12 xl:pb-16 xl:pt-14 2xl:pb-16 2xl:pt-10" aria-label="<?php esc_attr_e('Our core creative capabilities', 'reacon-group'); ?>">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
                <header class="mx-auto max-w-[780px] text-center">
                    <h2 class="font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
                        <?php echo esc_html($capability_heading); ?>
                    </h2>
                    <p class="mx-auto mt-4 max-w-[680px] font-sans text-[16px] font-normal leading-[22.72px] text-foreground/80">
                        <?php echo esc_html($capability_description); ?>
                    </p>
                </header>

                <div class="mt-8 grid grid-cols-1 gap-5 sm:mt-10 md:grid-cols-2 lg:mt-14 lg:grid-cols-3 lg:gap-8">
                    <?php foreach ($capability_cards as $card_index => $card): ?>
                        <?php $card_link = isset($card['link']) && is_array($card['link']) ? $card['link'] : null; ?>
                        <article class="overflow-hidden rounded-4xl border border-[#ECEFF2] bg-card p-1 shadow-[0_14px_45px_rgba(14,28,46,0.06)] <?php echo 2 === $card_index ? 'md:col-span-2 lg:col-span-1' : ''; ?>">
                            <?php if ($card_link) : ?>
                                <a
                                    href="<?php echo esc_url($card_link['url']); ?>"
                                    target="<?php echo esc_attr($card_link['target']); ?>"
                                    <?php echo '_blank' === $card_link['target'] ? 'rel="noopener noreferrer"' : ''; ?>
                                    aria-label="<?php echo esc_attr($card['title']); ?>"
                                    class="block no-underline">
                                <?php endif; ?>
                                <div class="relative overflow-hidden rounded-t-4xl rounded-b-2xl bg-muted">
                                    <img
                                        src="<?php echo esc_url($card['image_url']); ?>"
                                        alt=""
                                        class="aspect-4/3 w-full object-cover"
                                        loading="lazy"
                                        decoding="async" />
                                </div>
                                <div class="px-5 pb-5 pt-3">
                                    <h3 class="font-display text-[22px] font-semibold leading-[1.32] text-foreground sm:text-[24px] sm:leading-[31.68px]">
                                        <?php echo esc_html($card['title']); ?>
                                    </h3>
                                    <p class="mt-2 font-sans text-[16px] font-normal leading-[22.72px] text-foreground/80">
                                        <?php echo esc_html($card['description']); ?>
                                    </p>
                                </div>
                                <?php if ($card_link) : ?>
                                </a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($cta_enabled && $cta_heading !== '' && $cta_description !== '' && $cta_primary_link && $cta_secondary_link) : ?>
        <section id="solution-cta" class="py-10 xs:py-10 sm:py-12 md:py-14 " aria-labelledby="solution-cta-heading">
            <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-10 sm:px-8 sm:py-10 lg:rounded-[24px] lg:px-12">
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

                    <div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center justify-center text-center">
                        <h2 id="solution-cta-heading" class="font-display text-[24px] font-bold leading-[1.1] text-white xs:text-[2.125rem] sm:text-[2.5rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
                            <?php echo esc_html($cta_heading); ?>
                        </h2>
                        <p class="mx-auto mt-4 max-w-3xl font-sans text-sm leading-relaxed text-white/90 xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem] lg:text-lg">
                            <?php echo esc_html($cta_description); ?>
                        </p>

                        <div class="mt-8 flex w-full flex-col items-center justify-center gap-3 sm:mt-9 sm:w-auto sm:flex-row sm:gap-2.5 md:mt-10">
                            <a href="<?php echo esc_url($cta_primary_link['url']); ?>" <?php echo '_blank' === $cta_primary_link['target'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?> class="group inline-flex w-full items-center justify-between gap-2.5 rounded-full bg-white py-1 pl-5 pr-1 font-sans text-base font-medium text-[#0B6A74] no-underline transition-all duration-300 hover:bg-white/90 sm:w-auto">
                                <span><?php echo esc_html($cta_primary_link['title']); ?></span>
                                <span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full bg-[#dbeef1]" aria-hidden="true">
                                    <i class="ph-bold ph-arrow-up-right absolute text-base transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" aria-hidden="true"></i>
                                    <i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-base opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a href="<?php echo esc_url($cta_secondary_link['url']); ?>" <?php echo '_blank' === $cta_secondary_link['target'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?> class="inline-flex w-full items-center justify-start gap-2.5 rounded-full border border-solid border-white px-5 py-2.5 font-sans text-base font-normal text-white no-underline transition-all duration-300 hover:bg-white/10 sm:w-auto sm:justify-center sm:pr-4">
                                <?php echo esc_html($cta_secondary_link['title']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($faq_enabled && $faq_heading !== '' && $faq_description !== '' && !empty($faq_items) && $faq_support_link) : ?>
        <section id="reacon-faq-section" class="w-full bg-white py-16" aria-labelledby="reacon-faq-heading" itemscope itemtype="https://schema.org/FAQPage" x-data="{ activeIndex: 0 }">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div class="flex flex-col gap-6">
                        <h2 id="reacon-faq-heading" class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
                            <?php echo esc_html($faq_heading); ?>
                        </h2>
                        <p class="max-w-4xl text-base leading-snug text-black">
                            <?php echo esc_html($faq_description); ?>
                        </p>
                    </div>
                </div>

                <div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>">
                    <?php foreach ($faq_items as $faq_index => $faq_item): ?>
                        <div class="transition-colors duration-300 rounded-2xl p-5 sm:p-6" :class="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <button type="button" @click="activeIndex = activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? null : <?php echo esc_attr((string) $faq_index); ?>" :aria-expanded="activeIndex === <?php echo esc_attr((string) $faq_index); ?>" aria-controls="faq-answer-<?php echo esc_attr((string) $faq_index); ?>" class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                                <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                                    <?php echo esc_html($faq_item['question']); ?>
                                </span>
                                <span class="text-xl leading-none text-[#0A969B] select-none" aria-hidden="true" x-text="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? '−' : '+'"></span>
                            </button>
                            <div id="faq-answer-<?php echo esc_attr((string) $faq_index); ?>" x-show="activeIndex === <?php echo esc_attr((string) $faq_index); ?>" x-transition:enter="transition-all duration-300 ease-in-out" x-transition:enter-start="max-h-0 opacity-0 -translate-y-1" x-transition:enter-end="max-h-96 opacity-100 translate-y-0" x-transition:leave="transition-all duration-250 ease-in-out" x-transition:leave-start="max-h-96 opacity-100 translate-y-0" x-transition:leave-end="max-h-0 opacity-0 -translate-y-1" class="overflow-hidden" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                                    <?php echo esc_html($faq_item['answer']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if ($faq_support_heading !== '' && $faq_support_description !== '' && $faq_support_link) : ?>
                        <div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
                            <div class="flex flex-col gap-2">
                                <p class="text-base font-medium leading-snug text-[#383B43]">
                                    <?php echo esc_html($faq_support_heading); ?>
                                </p>
                                <p class="text-base leading-snug text-[#666666]">
                                    <?php echo esc_html($faq_support_description); ?>
                                </p>
                            </div>
                            <div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
                            <a href="<?php echo esc_url($faq_support_link['url']); ?>" <?php echo '_blank' === $faq_support_link['target'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?> class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
                                <span><?php echo esc_html($faq_support_link['title']); ?></span>
                                <span class="transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true">
                                    <i class="ph ph-arrow-right text-base" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

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

            #solution-visual-hero .reacon-about-hero-card {
                --hero-notch-width: clamp(560px, 48vw, 720px);
                --hero-notch-radius: 40px;
                --hero-notch-height: 86px;
                --hero-notch-swoop: 40px;
            }

            #solution-visual-hero .reacon-about-hero-card::before {
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

            #solution-visual-hero .reacon-about-hero-card::after {
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

            #solution-visual-content[data-stack-enabled="true"] {
                overflow: visible;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card] {
                position: sticky;
                top: 112px;
                z-index: 1;
                opacity: 1;
                will-change: transform, opacity;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(1) {
                z-index: 10;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(2) {
                z-index: 20;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(3) {
                z-index: 30;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(4) {
                z-index: 40;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(5) {
                z-index: 50;
            }

            #solution-visual-content[data-stack-enabled="true"] [data-stack-card]:nth-child(6) {
                z-index: 60;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const syncSolutionHeroNotchToDesktopMenu = () => {
                const heroCard = document.querySelector('#solution-visual-hero .reacon-about-hero-card');
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

            const initDesktopSolutionStack = () => {
                if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
                    return;
                }

                const stackRoot = document.querySelector('#solution-visual-content[data-stack-enabled="true"]');
                if (!stackRoot) {
                    return;
                }

                const stackCards = gsap.utils.toArray('#solution-visual-content [data-stack-card]');
                if (!stackCards.length) {
                    return;
                }

                gsap.registerPlugin(ScrollTrigger);

                ScrollTrigger.matchMedia({
                    '(min-width: 1024px)': function() {
                        stackCards.forEach((card, index) => {
                            gsap.set(card, {
                                clearProps: 'all'
                            });

                            if (index > 0) {
                                gsap.fromTo(
                                    card, {
                                        y: 90,
                                        scale: 0.97,
                                    }, {
                                        y: 0,
                                        scale: 1,
                                        ease: 'none',
                                        scrollTrigger: {
                                            trigger: card,
                                            start: 'top 86%',
                                            end: 'top 38%',
                                            scrub: true,
                                            invalidateOnRefresh: true,
                                        },
                                    }
                                );

                                const previousCard = stackCards[index - 1];
                                if (previousCard) {
                                    gsap.to(previousCard, {
                                        scale: 0.965,
                                        ease: 'none',
                                        scrollTrigger: {
                                            trigger: card,
                                            start: 'top 86%',
                                            end: 'top 38%',
                                            scrub: true,
                                            invalidateOnRefresh: true,
                                        },
                                    });
                                }
                            }
                        });
                    },
                    '(max-width: 1023px)': function() {
                        stackCards.forEach((card) => {
                            gsap.set(card, {
                                clearProps: 'transform,opacity,visibility',
                            });
                        });
                    },
                });
            };

            initDesktopSolutionStack();
        });
    </script>

</article><!-- #post-${ID} -->