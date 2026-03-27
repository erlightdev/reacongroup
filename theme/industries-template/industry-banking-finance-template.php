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
        class="px-3 pb-6 pt-3 sm:px-4 sm:pb-8 md:px-6 md:pb-10 xl:px-8"
        aria-labelledby="banking-finance-title">

        <div class="relative overflow-hidden rounded-[24px] bg-foreground sm:rounded-[28px] xl:rounded-[32px]">

            <!-- Start: Hero Background Media -->
            <?php if ($has_banking_hero_image): ?>
                <picture class="pointer-events-none absolute inset-0" aria-hidden="true">
                    <img
                        src="<?php echo esc_url($banking_hero_image_uri); ?>"
                        alt=""
                        class="h-full w-full object-cover object-center"
                        fetchpriority="high"
                        loading="eager"
                        decoding="async" />
                </picture>
            <?php endif; ?>

            <div class="pointer-events-none absolute inset-0 bg-black/45 sm:bg-black/50" aria-hidden="true"></div>
            <!-- End: Hero Background Media -->

            <!-- Start: Hero Content -->
            <div class="relative z-10 flex  flex-col items-center justify-center px-4 pb-16 pt-28 text-center text-primary-foreground  sm:px-8 sm:pb-20 sm:pt-36 md:px-12 md:pb-24 md:pt-40  lg:px-16 lg:pb-20 lg:pt-44  xl:px-20 xl:pt-48  2xl:px-24 2xl:pt-52 min-h-[320px]">
                <header class="mx-auto flex w-full max-w-[980px] flex-col items-center gap-3 sm:gap-4 md:gap-5">
                    <p class="font-sans text-sm leading-relaxed sm:text-base">
                        <?php echo esc_html($banking_hero_kicker); ?>
                    </p>

                    <h1
                        id="banking-finance-title"
                        class="font-display text-[34px] font-semibold leading-tight tracking-tight sm:text-5xl md:text-[56px] md:leading-[1.12]">
                        <?php echo esc_html($banking_hero_title); ?>
                    </h1>
                </header>

                <p class="mx-auto mt-4 max-w-[920px] font-sans text-sm leading-relaxed text-primary-foreground/95 sm:mt-5 sm:text-base md:mt-6 lg:text-[17px] xl:text-lg">
                    <?php echo esc_html($banking_hero_summary); ?>
                </p>
            </div>
            <!-- End: Hero Content -->

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

<?php get_footer();
