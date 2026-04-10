<?php

/**
 * The template for displaying industry archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

get_header();

$acf_scope = 'option';

if (!function_exists('reacon_group_industries_link_data')) {
    /**
     * Normalize ACF link arrays.
     *
     * @param mixed $link ACF link field.
     * @return array<string,string>
     */
    function reacon_group_industries_link_data($link)
    {
        if (!is_array($link)) {
            return array(
                'url' => '',
                'title' => '',
                'target' => '_self',
            );
        }

        return array(
            'url' => isset($link['url']) ? (string) $link['url'] : '',
            'title' => isset($link['title']) ? (string) $link['title'] : '',
            'target' => !empty($link['target']) ? (string) $link['target'] : '_self',
        );
    }
}

if (!function_exists('reacon_group_industries_render_icon')) {
    /**
     * Render icon from ACF icon source switch.
     *
     * @param mixed  $icon_group Icon group from ACF.
     * @param string $class      CSS class string.
     */
    function reacon_group_industries_render_icon($icon_group, $class = '')
    {
        if (!is_array($icon_group)) {
            return;
        }

        $source = isset($icon_group['icon_source']) ? (string) $icon_group['icon_source'] : '';
        $class = trim((string) $class);

        if ('phosphor' === $source) {
            $preset = isset($icon_group['phosphor_icon']) ? (string) $icon_group['phosphor_icon'] : '';
            if ('custom' === $preset) {
                $custom = isset($icon_group['phosphor_class']) ? trim((string) $icon_group['phosphor_class']) : '';
                if ($custom !== '') {
                    echo '<i class="' . esc_attr(trim($custom . ' ' . $class)) . '" aria-hidden="true"></i>';
                }
                return;
            }

            $map = array(
                'arrow-up-right' => 'ph-bold ph-arrow-up-right',
                'arrow-right' => 'ph-bold ph-arrow-right',
                'arrow-down-right' => 'ph-bold ph-arrow-down-right',
            );
            if (isset($map[$preset])) {
                echo '<i class="' . esc_attr(trim($map[$preset] . ' ' . $class)) . '" aria-hidden="true"></i>';
            }
            return;
        }

        if ('lucide' === $source) {
            $preset = isset($icon_group['lucide_icon']) ? (string) $icon_group['lucide_icon'] : '';
            $name = 'custom' === $preset ? (isset($icon_group['lucide_name']) ? (string) $icon_group['lucide_name'] : '') : $preset;
            if ($name !== '') {
                echo '<i data-lucide="' . esc_attr($name) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
            }
            return;
        }

        if ('svg_asset' === $source) {
            $svg = isset($icon_group['svg_asset']) ? (string) $icon_group['svg_asset'] : '';
            if ($svg !== '' && function_exists('reacon_group_inline_svg')) {
                $svg_markup = reacon_group_inline_svg($svg, $class);
                if ($svg_markup) {
                    echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
            return;
        }

        if ('image' === $source) {
            $image = isset($icon_group['image']) ? (string) $icon_group['image'] : '';
            if ($image !== '') {
                echo '<img src="' . esc_url($image) . '" alt="" aria-hidden="true" class="' . esc_attr($class) . '" loading="lazy" decoding="async" />';
            }
        }
    }
}

$hero_enabled = (bool) get_field('industries_landing_enable_hero_section', $acf_scope);
$hero = get_field('industries_landing_hero', $acf_scope);
$hero = is_array($hero) ? $hero : array();

$approach_enabled = (bool) get_field('industries_landing_enable_approach_section', $acf_scope);
$approach = get_field('industries_landing_approach', $acf_scope);
$approach = is_array($approach) ? $approach : array();

$challenges_enabled = (bool) get_field('industries_landing_enable_challenges_section', $acf_scope);
$challenges = get_field('industries_landing_challenges', $acf_scope);
$challenges = is_array($challenges) ? $challenges : array();

$work_enabled = (bool) get_field('industries_landing_enable_work_with_section', $acf_scope);
$work = get_field('industries_landing_work_with', $acf_scope);
$work = is_array($work) ? $work : array();
$work_cards = !empty($work['cards']) && is_array($work['cards']) ? array_values($work['cards']) : array();

$cta_enabled = (bool) get_field('industries_landing_enable_cta_section', $acf_scope);
$cta = get_field('industries_landing_cta', $acf_scope);
$cta = is_array($cta) ? $cta : array();

$hero_bg_color = isset($hero['hero_card_bg_color']) ? (string) $hero['hero_card_bg_color'] : '';
$hero_overlay_gradient = isset($hero['hero_overlay_gradient']) ? (string) $hero['hero_overlay_gradient'] : '';

$cta_bg_base = isset($cta['cta_bg_base']) ? (string) $cta['cta_bg_base'] : '';
$cta_gradient_start = isset($cta['cta_gradient_start']) ? (string) $cta['cta_gradient_start'] : '';
$cta_gradient_end = isset($cta['cta_gradient_end']) ? (string) $cta['cta_gradient_end'] : '';

$cta_primary_link = reacon_group_industries_link_data(isset($cta['primary_link']) ? $cta['primary_link'] : array());
$cta_secondary_link = reacon_group_industries_link_data(isset($cta['secondary_link']) ? $cta['secondary_link'] : array());

?>

<main id="primary" class="overflow-x-hidden" role="main">
    <?php if ($hero_enabled) : ?>
        <!-- Major Section: Industries Hero -->
        <section
            id="industries-hero"
            class="relative w-full p-0 md:p-2.5"
            aria-label="<?php esc_attr_e('Industries hero', 'reacon-group'); ?>">
            <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]" style="background-color: <?php echo esc_attr($hero_bg_color); ?>;">
                <img
                    src="<?php echo esc_url(isset($hero['background_image']) ? (string) $hero['background_image'] : ''); ?>"
                    alt=""
                    aria-hidden="true"
                    class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                    fetchpriority="high"
                    loading="eager"
                    decoding="async" />

                <div class="pointer-events-none absolute inset-0" aria-hidden="true" style="background: <?php echo esc_attr($hero_overlay_gradient); ?>;"></div>

                <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                    <p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
                        <?php echo esc_html(isset($hero['eyebrow']) ? (string) $hero['eyebrow'] : ''); ?>
                    </p>

                    <h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                        <?php echo esc_html(isset($hero['title']) ? (string) $hero['title'] : ''); ?>
                    </h1>

                    <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                        <?php echo esc_html(isset($hero['description']) ? (string) $hero['description'] : ''); ?>
                    </p>
                </div>
            </div>
        </section>
        <!-- End Major Section: Industries Hero -->
    <?php endif; ?>

    <?php if ($approach_enabled) : ?>
        <!-- Major Section: Industries Approach -->
        <section
            id="industries-approach"
            class="relative overflow-hidden py-16 sm:py-20 lg:py-16"
            aria-labelledby="industries-approach-title">
            <div class="mx-auto w-full  px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
                <div class="relative mx-auto flex w-full max-w-[1200px] flex-col gap-[60px] items-start justify-center text-left">
                    <div class="relative w-full">
                        <h2
                            id="industries-approach-title"
                            class="font-display text-[24px]  sm:text-[32px] md:text-[40px] lg:text-[48px] font-semibold  text-foreground max-w-[1200px]">
                            <?php echo esc_html(isset($approach['title']) ? (string) $approach['title'] : ''); ?>
                        </h2>

                        <div class="mt-[16px] max-w-[900px] font-sans text-[16px] leading-[22.72px] text-foreground">
                            <p>
                                <?php echo esc_html(isset($approach['paragraph_one']) ? (string) $approach['paragraph_one'] : ''); ?>
                            </p>
                            <p class="mt-4">
                                <?php echo esc_html(isset($approach['paragraph_two']) ? (string) $approach['paragraph_two'] : ''); ?>
                            </p>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="grid grid-cols-1 gap-[24px] lg:grid-cols-[1fr_320px_1fr]">
                            <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                                <img
                                    src="<?php echo esc_url(isset($approach['image_one']) ? (string) $approach['image_one'] : ''); ?>"
                                    alt=""
                                    aria-hidden="true"
                                    class="absolute inset-0 h-full w-full object-cover"
                                    loading="lazy"
                                    decoding="async" />
                            </figure>

                            <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                                <img
                                    src="<?php echo esc_url(isset($approach['image_two']) ? (string) $approach['image_two'] : ''); ?>"
                                    alt=""
                                    aria-hidden="true"
                                    class="absolute inset-0 h-full w-full object-cover"
                                    loading="lazy"
                                    decoding="async" />
                            </figure>

                            <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                                <img
                                    src="<?php echo esc_url(isset($approach['image_three']) ? (string) $approach['image_three'] : ''); ?>"
                                    alt=""
                                    aria-hidden="true"
                                    class="absolute inset-0 h-full w-full object-cover"
                                    loading="lazy"
                                    decoding="async" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Major Section: Industries Approach -->
    <?php endif; ?>

    <?php if ($challenges_enabled) : ?>
        <!-- Major Section: Industries Challenges -->
        <section
            id="industries-challenges"
            class="w-full py-[60px]"
            aria-labelledby="industries-challenges-title">
            <div class="mx-auto w-full  px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
                <div class="mx-auto w-full max-w-7xl text-center">
                    <h2
                        id="industries-challenges-title"
                        class="font-display text-[32px] font-medium leading-[42.24px] text-foreground sm:text-[36px] sm:leading-[48px] md:text-[44px] md:leading-[58.08px]">
                        <?php echo esc_html(isset($challenges['title']) ? (string) $challenges['title'] : ''); ?>
                    </h2>
                    <p class="mt-0 font-display text-[32px] font-medium leading-[42.24px] text-foreground sm:text-[36px] sm:leading-[48px] md:text-[44px] md:leading-[58.08px]">
                        <?php echo esc_html(isset($challenges['subtitle']) ? (string) $challenges['subtitle'] : ''); ?>
                    </p>
                </div>
            </div>
        </section>
        <!-- End Major Section: Industries Challenges -->
    <?php endif; ?>

    <?php if ($work_enabled) : ?>
        <!-- Major Section: Industries We Work With -->
        <section
            id="industries-work-with"
            class="bg-background py-12"
            aria-labelledby="industries-work-with-title">
            <div class="mx-auto w-full  px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
                <div class="flex flex-col gap-[42px] items-start lg:flex-row">
                    <!-- Left: Nav -->
                    <div class="flex flex-col gap-[23px] items-start w-full lg:w-[420px] lg:shrink-0">
                        <div class="w-full flex items-center justify-center">
                            <h2
                                id="industries-work-with-title"
                                class="font-display text-[24px] md:text-[44px]  font-medium text-foreground sm:text-[56px]  text-center sm:text-left">
                                <span class="block"><?php echo esc_html(isset($work['heading']) ? (string) $work['heading'] : ''); ?></span>
                            </h2>
                        </div>

                        <div data-industries-nav-scroller class="flex w-full flex-row gap-[8px] overflow-x-scroll overflow-y-hidden pb-1 lg:w-[295px] lg:flex-col lg:items-start lg:overflow-visible">
                            <?php foreach ($work_cards as $index => $card) : ?>
                                <button
                                    type="button"
                                    data-industries-slide="<?php echo esc_attr((string) $index); ?>"
                                    class="<?php echo esc_attr(0 === $index ? 'bg-primary text-white' : 'bg-transparent text-muted-foreground'); ?> shrink-0 cursor-pointer flex items-center px-[16px] py-[12px] rounded-full font-sans text-[16px] leading-[22.72px] whitespace-nowrap w-auto lg:w-full justify-start">
                                    <?php echo esc_html(isset($card['title']) ? (string) $card['title'] : ''); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Swiper -->
                    <div class="w-full min-w-0">
                        <div class="swiper js-industries-work-swiper w-full overflow-hidden">
                            <div class="swiper-wrapper">
                                <?php foreach ($work_cards as $card) : ?>
                                    <?php
                                    $card_link = reacon_group_industries_link_data(isset($card['link']) ? $card['link'] : array());
                                    $card_type = isset($card['image_type']) ? (string) $card['image_type'] : '';
                                    $card_link_text = '' !== trim($card_link['title']) ? $card_link['title'] : __('Open link', 'reacon-group');
                                    ?>
                                    <article class="swiper-slide bg-[var(--l-gray/50,#f6f6f6)] border border-gray-100 flex flex-col h-[555px] items-center overflow-hidden p-[8px] relative rounded-xl">
                                        <div class="flex flex-col gap-[12px] items-start p-[16px] relative shrink-0 text-[color:var(--text/text-primary,#383b43)] w-full">
                                            <p class="font-display text-[18px] font-semibold leading-[31.68px] text-foreground w-full">
                                                <?php echo esc_html(isset($card['title']) ? (string) $card['title'] : ''); ?>
                                            </p>
                                            <p class="font-sans text-[14px] leading-[19.88px] text-foreground overflow-hidden line-clamp-3">
                                                <?php echo esc_html(isset($card['excerpt']) ? (string) $card['excerpt'] : ''); ?>
                                            </p>
                                        </div>

                                        <div class="flex flex-1 flex-col items-start min-h-0 relative w-full">
                                            <div class="relative flex-1 w-full rounded-[20px] overflow-hidden min-h-0">
                                                <?php if ('overlay' === $card_type) : ?>
                                                    <img
                                                        src="<?php echo esc_url(isset($card['image']) ? (string) $card['image'] : ''); ?>"
                                                        alt=""
                                                        aria-hidden="true"
                                                        class="absolute inset-0 h-full w-full object-cover pointer-events-none" />
                                                    <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-[20px]">
                                                        <img
                                                            src="<?php echo esc_url(isset($card['overlay_image']) ? (string) $card['overlay_image'] : ''); ?>"
                                                            alt=""
                                                            aria-hidden="true"
                                                            class="absolute h-[125.79%] left-0 top-[-12.89%] w-full object-cover" />
                                                    </div>
                                                <?php else : ?>
                                                    <img
                                                        src="<?php echo esc_url(isset($card['image']) ? (string) $card['image'] : ''); ?>"
                                                        alt=""
                                                        aria-hidden="true"
                                                        class="h-full w-full object-cover pointer-events-none" />
                                                <?php endif; ?>
                                            </div>

                                            <a
                                                href="<?php echo esc_url($card_link['url']); ?>"
                                                target="<?php echo esc_attr($card_link['target']); ?>"
                                                aria-label="<?php echo esc_attr(sprintf(__('Open %s', 'reacon-group'), (string) (isset($card['title']) ? $card['title'] : ''))); ?>"
                                                class="mt-auto no-underline flex gap-[4px] items-center justify-end p-[12px] relative shrink-0 w-full">
                                                <span class="font-sans text-[14px] leading-[19.88px] text-foreground whitespace-nowrap">
                                                    <?php echo esc_html($card_link_text); ?>
                                                </span>
                                                <i class="ph-bold ph-arrow-up-right w-[12px] h-[12px] shrink-0 text-foreground" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Major Section: Industries We Work With -->
    <?php endif; ?>

    <?php if ($cta_enabled) : ?>
        <!-- Cta Section: strategic call-to-action banner. -->
        <section
            id="solution-cta"
            class="py-10 xs:py-10 sm:py-12 md:py-14 "
            aria-labelledby="solution-cta-heading">
            <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[22px] px-5 py-10 sm:px-8 sm:py-10 lg:rounded-[24px] lg:px-12" style="background-color: <?php echo esc_attr($cta_bg_base); ?>;">
                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
                    <div class="pointer-events-none absolute inset-0 opacity-75" aria-hidden="true" style="background: linear-gradient(180deg, <?php echo esc_attr($cta_gradient_start); ?> 0%, <?php echo esc_attr($cta_gradient_end); ?> 100%);"></div>
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

                    <div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center justify-center text-center">
                        <h2
                            id="solution-cta-heading"
                            class="font-display text-[24px] font-bold leading-[1.1] text-white xs:text-[2.125rem] sm:text-[2.5rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
                            <?php echo esc_html(isset($cta['heading']) ? (string) $cta['heading'] : ''); ?>
                        </h2>
                        <p class="mx-auto mt-4 max-w-3xl font-sans text-sm leading-relaxed text-white/90 xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem] lg:text-lg">
                            <?php echo esc_html(isset($cta['description']) ? (string) $cta['description'] : ''); ?>
                        </p>

                        <div class="mt-8 flex w-full flex-col items-center justify-center gap-3 sm:mt-9 sm:w-auto sm:flex-row sm:gap-2.5 md:mt-10">
                            <a
                                href="<?php echo esc_url($cta_primary_link['url']); ?>"
                                target="<?php echo esc_attr($cta_primary_link['target']); ?>"
                                class="group inline-flex w-full items-center justify-between gap-2.5 rounded-full bg-white py-1 pl-5 pr-1 font-sans text-base font-medium no-underline transition-all duration-300 hover:bg-white/90 sm:w-auto" style="color: <?php echo esc_attr(isset($cta['cta_primary_text_color']) ? (string) $cta['cta_primary_text_color'] : ''); ?>;">
                                <span><?php echo esc_html($cta_primary_link['title']); ?></span>
                                <span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full" style="background-color: <?php echo esc_attr(isset($cta['cta_primary_icon_circle_bg']) ? (string) $cta['cta_primary_icon_circle_bg'] : ''); ?>;" aria-hidden="true">
                                    <i class="ph-bold ph-arrow-up-right absolute text-base transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" aria-hidden="true"></i>
                                    <i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-base opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a
                                href="<?php echo esc_url($cta_secondary_link['url']); ?>"
                                target="<?php echo esc_attr($cta_secondary_link['target']); ?>"
                                class="inline-flex w-full items-center justify-start gap-2.5 rounded-full border border-solid border-white px-5 py-2.5 font-sans text-base font-normal text-white no-underline transition-all duration-300 hover:bg-white/10 sm:w-auto sm:justify-center sm:pr-4">
                                <?php echo esc_html($cta_secondary_link['title']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Cta Section -->
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiperEl = document.querySelector('.js-industries-work-swiper');
            if (!swiperEl) return;

            var navButtons = Array.prototype.slice.call(document.querySelectorAll('[data-industries-slide]'));
            var navScroller = document.querySelector('[data-industries-nav-scroller]');

            function centerActiveNavButton(realIndex) {
                if (!navScroller || window.innerWidth >= 1024) return;
                var activeBtn = navButtons[realIndex];
                if (!activeBtn) return;

                var targetLeft = activeBtn.offsetLeft - (navScroller.clientWidth / 2) + (activeBtn.offsetWidth / 2);
                navScroller.scrollTo({
                    left: Math.max(0, targetLeft),
                    behavior: 'smooth'
                });
            }

            function setActiveNavByRealIndex(realIndex) {
                navButtons.forEach(function(btn) {
                    var idx = parseInt(btn.getAttribute('data-industries-slide'), 10);
                    var isActive = idx === realIndex;
                    btn.classList.toggle('bg-primary', isActive);
                    btn.classList.toggle('text-white', isActive);
                    btn.classList.toggle('bg-transparent', !isActive);
                    btn.classList.toggle('text-muted-foreground', !isActive);
                    btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                });

                centerActiveNavButton(realIndex);
            }

            var attempts = 0;

            function initSwiper() {
                if (typeof Swiper === 'undefined') {
                    attempts++;
                    if (attempts < 25) {
                        setTimeout(initSwiper, 100);
                    }
                    return;
                }

                var swiper = new Swiper(swiperEl, {
                    loop: true,
                    spaceBetween: 24,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    speed: 650,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 2.5
                        }
                    }
                });

                setActiveNavByRealIndex(swiper.realIndex || 0);

                navButtons.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var idx = parseInt(btn.getAttribute('data-industries-slide'), 10);
                        swiper.slideToLoop(idx);
                    });
                });

                swiper.on('slideChange', function() {
                    setActiveNavByRealIndex(swiper.realIndex || 0);
                });

                if (window.lucide && typeof window.lucide.createIcons === 'function') {
                    window.lucide.createIcons();
                }
            }

            initSwiper();
        });
    </script>
</main>

<style>
    /* Desktop-only top notch — matches About / Contact hero header recess. */
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

        #industries-hero .reacon-about-hero-card {
            --hero-notch-width: clamp(560px, 48vw, 720px);
            --hero-notch-radius: 40px;
            --hero-notch-height: 86px;
            --hero-notch-swoop: 40px;
        }

        #industries-hero .reacon-about-hero-card::before {
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

        #industries-hero .reacon-about-hero-card::after {
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
        const syncIndustriesHeroNotchToDesktopMenu = () => {
            const heroCard = document.querySelector('#industries-hero .reacon-about-hero-card');
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

        let industriesNotchSyncRaf = null;
        const scheduleIndustriesNotchSync = () => {
            if (industriesNotchSyncRaf) {
                cancelAnimationFrame(industriesNotchSyncRaf);
            }
            industriesNotchSyncRaf = requestAnimationFrame(syncIndustriesHeroNotchToDesktopMenu);
        };

        scheduleIndustriesNotchSync();
        window.addEventListener('resize', scheduleIndustriesNotchSync);
        window.addEventListener('load', scheduleIndustriesNotchSync);
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(scheduleIndustriesNotchSync).catch(() => {});
        }
    });
</script>

<?php
get_footer();
