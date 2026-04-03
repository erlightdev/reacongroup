<?php

/**
 * Template part for displaying industry single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

$industries_assets_uri  = get_template_directory_uri() . '/public/industries';
$industries_assets_path = get_template_directory() . '/public/industries';

$industry_hero_fallback_rel_paths = array(
    '/industry-hero-bg.png',
    '/banking-finance-hero-bg.png',
);

$industry_hero_image_uri = get_the_post_thumbnail_url(get_the_ID(), 'full');

if (!$industry_hero_image_uri) {
    foreach ($industry_hero_fallback_rel_paths as $hero_rel_path) {
        if (file_exists($industries_assets_path . $hero_rel_path)) {
            $industry_hero_image_uri = $industries_assets_uri . $hero_rel_path;
            break;
        }
    }
}

$industry_hero_kicker = __('Industries We Empower', 'reacon-group');
$industry_hero_title = get_the_title();
$industry_hero_summary = get_the_excerpt();

if (!$industry_hero_summary) {
    $industry_hero_summary = __('Discover how Reacon helps this industry with scalable production, logistics, and data-driven execution.', 'reacon-group');
}

$partner_logo_dir = get_template_directory() . '/public/partner-logo';
$partner_logo_uri = get_template_directory_uri() . '/public/partner-logo';
$partner_logo_files = glob($partner_logo_dir . '/partner-logo-*.{png,jpg,jpeg,webp,svg}', GLOB_BRACE);

if (is_array($partner_logo_files) && !empty($partner_logo_files)) {
    natsort($partner_logo_files);
    $partner_logo_files = array_values($partner_logo_files);
} else {
    $partner_logo_files = array();
}

$industry_cta = array(
    'heading' => __('Print Smarter. Move Faster. Deliver Everywhere.', 'reacon-group'),
    'description' => __('Reacon connects creativity, automation, and logistics to help brands operate at global speed.', 'reacon-group'),
    'primary' => array(
        'label' => __('Contact Us', 'reacon-group'),
        'url' => home_url('/contact/'),
    ),
    'secondary' => array(
        'label' => __('Talk to Our Team', 'reacon-group'),
        'url' => home_url('/contact/'),
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Start: Industry Hero Section -->
    <section
        id="industry-hero"
        class="relative w-full p-1.5 md:p-2.5"
        aria-labelledby="industry-hero-title">

        <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
            <?php if ($industry_hero_image_uri): ?>
                <img
                    src="<?php echo esc_url($industry_hero_image_uri); ?>"
                    alt=""
                    aria-hidden="true"
                    class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                    fetchpriority="high"
                    loading="eager"
                    decoding="async" />
            <?php endif; ?>

            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

            <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                <p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
                    <?php echo esc_html($industry_hero_kicker); ?>
                </p>

                <h1 id="industry-hero-title" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                    <?php echo esc_html($industry_hero_title); ?>
                </h1>

                <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                    <?php echo esc_html($industry_hero_summary); ?>
                </p>
            </div>
        </div>
    </section>
    <!-- End: Industry Hero Section -->

    <!-- Start: Main Content Section -->
    <div <?php reacon_group_content_class('entry-content mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 lg:px-8'); ?>>
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers. */
                    __('Continue reading<span class="sr-only"> "%s"</span>', 'reacon-group'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );

        wp_link_pages(
            array(
                'before' => '<div>' . __('Pages:', 'reacon-group'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
    <!-- End: Main Content Section -->

    <!-- Start: Partners Marquee Section -->
    <section id="industry-partners" class="relative w-full bg-white py-4 sm:py-5" aria-label="<?php esc_attr_e('Our partners', 'reacon-group'); ?>">
        <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-8 bg-gradient-to-r from-white to-transparent sm:w-10 lg:w-12" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-8 bg-gradient-to-l from-white to-transparent sm:w-10 lg:w-12" aria-hidden="true"></div>

        <div class="mx-auto w-full max-w-[1320px] px-4 sm:px-6 lg:px-8">
            <?php if (!empty($partner_logo_files)): ?>
                <div class="reacon-partner-track-wrap">
                    <div class="reacon-partner-track">
                        <?php for ($rep = 0; $rep < 2; $rep++): ?>
                            <?php foreach ($partner_logo_files as $partner_logo_file): ?>
                                <?php
                                $partner_logo_name = pathinfo($partner_logo_file, PATHINFO_FILENAME);
                                $partner_logo_alt = ucwords(str_replace(array('-', '_'), ' ', $partner_logo_name));
                                ?>
                                <div class="flex h-10 w-24 shrink-0 items-center justify-center sm:h-11 sm:w-28 lg:h-12 lg:w-32">
                                    <img
                                        src="<?php echo esc_url($partner_logo_uri . '/' . basename($partner_logo_file)); ?>"
                                        alt="<?php echo esc_attr($rep > 0 ? '' : $partner_logo_alt); ?>"
                                        <?php echo $rep > 0 ? 'aria-hidden="true"' : ''; ?>
                                        class="h-full w-full object-contain"
                                        loading="lazy"
                                        decoding="async" />
                                </div>
                            <?php endforeach; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="py-3 text-center font-sans text-sm text-muted-foreground">
                    <?php esc_html_e('Partner logos are not available yet.', 'reacon-group'); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
    <!-- End: Partners Marquee Section -->

    <!-- Start: Industry CTA Section -->
    <section id="industry-cta" class="py-10" aria-labelledby="industry-cta-heading">
        <div class="mx-auto w-full px-5 sm:px-6 lg:px-10">
            <div class="relative overflow-hidden rounded-[22px] bg-[#062b2d] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">
                <!-- Start: CTA Background Decorations -->
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(30,202,211,0.08)_0%,rgba(30,202,211,0)_58%)]" aria-hidden="true"></div>
                <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0F3D47_0%,#062B2D_100%)] opacity-75" aria-hidden="true"></div>

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
                    <h2 id="industry-cta-heading" class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
                        <?php echo esc_html($industry_cta['heading']); ?>
                    </h2>

                    <p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
                        <?php echo esc_html($industry_cta['description']); ?>
                    </p>

                    <div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
                        <a
                            href="<?php echo esc_url($industry_cta['primary']['url']); ?>"
                            class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#062b2d] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
                            <span><?php echo esc_html($industry_cta['primary']['label']); ?></span>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
                                <i class="ph-bold ph-arrow-up-right text-[12px] text-[#062b2d]"></i>
                            </span>
                        </a>

                        <a
                            href="<?php echo esc_url($industry_cta['secondary']['url']); ?>"
                            class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
                            <?php echo esc_html($industry_cta['secondary']['label']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Industry CTA Section -->

    <?php get_template_part('template-parts/components/component', 'faq'); ?>

    <footer class="entry-footer">
        <?php reacon_group_entry_footer(); ?>
    </footer><!-- .entry-footer -->

    <style>
        @keyframes reacon-partner-marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        #industry-partners .reacon-partner-track-wrap {
            overflow: hidden;
        }

        #industry-partners .reacon-partner-track {
            display: flex;
            width: max-content;
            align-items: center;
            gap: 2.5rem;
            will-change: transform;
            animation: reacon-partner-marquee 28s linear infinite;
        }

        #industry-partners .reacon-partner-track-wrap:hover .reacon-partner-track {
            animation-play-state: paused;
        }

        @media (max-width: 640px) {
            #industry-partners .reacon-partner-track {
                gap: 1.75rem;
                animation-duration: 22s;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            #industry-partners .reacon-partner-track {
                animation: none;
            }
        }

        /* Desktop-only notch so header sits recessed into the hero. */
        @media (min-width: 1024px) {
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

            #industry-hero .reacon-about-hero-card::after {
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
        });
    </script>

</article><!-- #post-${ID} -->