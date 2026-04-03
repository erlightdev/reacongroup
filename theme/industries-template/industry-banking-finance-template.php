<?php

/**
 * Template Name: Industry — Banking & Finance Template
 * Template Post Type: page, industry
 *
 * Placeholder layout for Industry banking and finance template pages. Assign this template in
 * Page Attributes (or the template panel on your `industry` CPT). If the CPT slug
 * registered by your plugin is not `industry`, update `Template Post Type` below.
 *
 * @package reacon-group
 */
get_header();
?>

<?php
$industries_assets_uri  = get_template_directory_uri() . '/public/industries';
$industries_assets_path = get_template_directory() . '/public/industries';

$banking_hero_image_uri  = $industries_assets_uri . '/banking-finance-hero-bg.png';
$banking_hero_image_path = $industries_assets_path . '/banking-finance-hero-bg.png';
$banking_logo_uri        = $industries_assets_uri . '/banking-finance-logo.svg';
$banking_logo_path       = $industries_assets_path . '/banking-finance-logo.svg';
$banking_arrow_uri       = $industries_assets_uri . '/banking-finance-arrow-up-right.svg';
$banking_arrow_path      = $industries_assets_path . '/banking-finance-arrow-up-right.svg';

$banking_hero_title   = __('Banking & Finance', 'reacon-group');
$banking_hero_kicker  = __('Industries We Empower', 'reacon-group');
$banking_hero_summary = __('The financial services landscape is highly competitive and regulated. Denoted by increasing costs per acquisition, digital savvy audiences and new challenger banks, neo banks and aggregator services encourage customers to seek better deals.', 'reacon-group');

$has_banking_hero_image = file_exists($banking_hero_image_path);
$has_banking_logo       = file_exists($banking_logo_path);
$has_banking_arrow      = file_exists($banking_arrow_path);

$banking_nav_items = array(
    __('Home', 'reacon-group'),
    __('About Us', 'reacon-group'),
    __('Solutions', 'reacon-group'),
    __('Our Industry', 'reacon-group'),
    __('Our Works', 'reacon-group'),
    __('Blogs', 'reacon-group'),
);
?>

<main id="primary" class="overflow-x-hidden" role="main">
    <!-- Start: Banking & Finance Hero Section -->
    <section
        id="banking-finance-hero"
        class="relative w-full p-1.5 md:p-2.5"
        aria-labelledby="banking-finance-title">

        <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
            <?php if ($has_banking_hero_image): ?>
                <img
                    src="<?php echo esc_url($banking_hero_image_uri); ?>"
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
                    <?php echo esc_html($banking_hero_kicker); ?>
                </p>

                <h1 id="banking-finance-title" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                    <?php echo esc_html($banking_hero_title); ?>
                </h1>

                <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                    <?php echo esc_html($banking_hero_summary); ?>
                </p>
            </div>

        </div>
    </section>
    <!-- End: Banking & Finance Hero Section -->

    <!-- Start: Banking & Finance CTA Section -->
    <?php
    $banking_cta = array(
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
    <section
        id="banking-finance-cta"
        class="py-10 sm:py-12 lg:py-14"
        aria-labelledby="banking-finance-cta-heading">
        <div class="mx-auto w-full  px-5 sm:px-6 lg:px-10">
            <div class="relative overflow-hidden rounded-[22px] bg-[#062b2d] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">
                <!-- Start: CTA Background Decorations -->
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(30,202,211,0.08)_0%,rgba(30,202,211,0)_58%)]" aria-hidden="true"></div>
                <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0F3D47_0%,#062B2D_100%)] opacity-75" aria-hidden="true"></div>

                <div class="pointer-events-none absolute left-16 top-0 h-[205px] w-[1566px]" aria-hidden="true">
                    <svg viewBox="0 0 1566 205" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
                        <path
                            d="M278.503 205L1566 -538.596L-556 -586L278.503 205Z"
                            fill="url(#bankingCtaShardLeftGradient)"
                            fill-opacity="0.15" />
                        <defs>
                            <linearGradient id="bankingCtaShardLeftGradient" x1="504.197" y1="170.056" x2="505.001" y2="-586" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1ECAD3" />
                                <stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <div class="pointer-events-none absolute right-[-955px] h-[791px] w-[2122px]" aria-hidden="true">
                    <svg width="2122" height="791" viewBox="0 0 2122 791" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
                        <path d="M1287.5 -60L0 683.596L2122 731L1287.5 -60Z" fill="url(#bankingCtaShardGradient)" fill-opacity="0.15" />
                        <defs>
                            <linearGradient id="bankingCtaShardGradient" x1="1061.8" y1="-25.0558" x2="1061" y2="731" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1ECAD3" />
                                <stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <!-- End: CTA Background Decorations -->

                <!-- Start: CTA Content -->
                <div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
                    <h2
                        id="banking-finance-cta-heading"
                        class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
                        <?php echo esc_html($banking_cta['heading']); ?>
                    </h2>

                    <p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
                        <?php echo esc_html($banking_cta['description']); ?>
                    </p>

                    <div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
                        <a
                            href="<?php echo esc_url($banking_cta['primary']['url']); ?>"
                            class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#062b2d] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
                            <span><?php echo esc_html($banking_cta['primary']['label']); ?></span>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
                                <i class="ph-bold ph-arrow-up-right text-[12px] text-[#062b2d]"></i>
                            </span>
                        </a>

                        <a
                            href="<?php echo esc_url($banking_cta['secondary']['url']); ?>"
                            class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
                            <?php echo esc_html($banking_cta['secondary']['label']); ?>
                        </a>
                    </div>
                </div>
                <!-- End: CTA Content -->

            </div>
        </div>
    </section>
    <!-- End: Banking & Finance CTA Section -->

    <!-- Faq Section -->
    <?php get_template_part('template-parts/components/component', 'faq'); ?>
    <!-- End Faq Section -->


</main>

<style>
    /* Desktop-only top notch that lets the fixed header recess into the hero. */
    @media (min-width: 1024px) {
        #banking-finance-hero .reacon-about-hero-card {
            --hero-notch-width: clamp(560px, 48vw, 720px);
            --hero-notch-radius: 40px;
            --hero-notch-height: 86px;
            --hero-notch-swoop: 40px;
        }

        #banking-finance-hero .reacon-about-hero-card::before {
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

        #banking-finance-hero .reacon-about-hero-card::after {
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
        const syncBankingHeroNotchToDesktopMenu = () => {
            const heroCard = document.querySelector('#banking-finance-hero .reacon-about-hero-card');
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

        let bankingNotchSyncRaf = null;
        const scheduleBankingNotchSync = () => {
            if (bankingNotchSyncRaf) {
                cancelAnimationFrame(bankingNotchSyncRaf);
            }
            bankingNotchSyncRaf = requestAnimationFrame(syncBankingHeroNotchToDesktopMenu);
        };

        scheduleBankingNotchSync();
        window.addEventListener('resize', scheduleBankingNotchSync);
        window.addEventListener('load', scheduleBankingNotchSync);
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(scheduleBankingNotchSync).catch(() => {});
        }
    });
</script>

<?php get_footer();
