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

$partner_logo_dir = get_template_directory() . '/public/partner-logo';
$partner_logo_uri = get_template_directory_uri() . '/public/partner-logo';
$partner_logo_files = glob($partner_logo_dir . '/partner-logo-*.{png,jpg,jpeg,webp,svg}', GLOB_BRACE);

if (is_array($partner_logo_files) && !empty($partner_logo_files)) {
    natsort($partner_logo_files);
    $partner_logo_files = array_values($partner_logo_files);
} else {
    $partner_logo_files = array();
}
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
    <!-- Main Post Content Here -->
    <section></section>
    <!-- End Main Post Content Here -->
    <!-- Start: Partners Marquee Section -->
    <section id="banking-finance-partners" class="relative w-full bg-white py-4 sm:py-5" aria-label="Our partners">
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
                                        alt="<?php echo esc_attr($partner_logo_alt); ?>"
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
        class="py-10"
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
    <section
        id="reacon-faq-section"
        class="w-full bg-white py-16"
        aria-labelledby="reacon-faq-heading"
        itemscope
        itemtype="https://schema.org/FAQPage"
        x-data="{ activeIndex: 0 }">

        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="flex flex-col gap-6">
                    <h2
                        id="reacon-faq-heading"
                        class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
                        Frequently Asked Questions
                    </h2>
                    <p class="max-w-4xl text-base leading-snug text-black">
                        Find quick answers to how Reacon works, what we deliver, and how we
                        support brands across print, production, and data-driven automation.
                    </p>
                </div>
            </div>

            <!-- FAQ Items -->
            <div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="Frequently asked questions list">

                <!-- Item 1 -->
                <div
                    class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                    :class="activeIndex === 0 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                        type="button"
                        @click="activeIndex = activeIndex === 0 ? null : 0"
                        :aria-expanded="activeIndex === 0"
                        aria-controls="faq-answer-0"
                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                        <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                            What services does Reacon provide?
                        </span>
                        <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 0 ? '−' : '+'"></span>
                    </button>
                    <div
                        id="faq-answer-0"
                        x-show="activeIndex === 0"
                        x-transition:enter="transition-all duration-300 ease-in-out"
                        x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                        x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-250 ease-in-out"
                        x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                        class="overflow-hidden"
                        itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                            Reacon delivers end-to-end brand execution including content design,
                            printing, packaging, warehousing, fulfilment, logistics, and
                            data-driven communication systems.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div
                    class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                    :class="activeIndex === 1 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                        type="button"
                        @click="activeIndex = activeIndex === 1 ? null : 1"
                        :aria-expanded="activeIndex === 1"
                        aria-controls="faq-answer-1"
                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                        <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                            Does Reacon offer project management solutions?
                        </span>
                        <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 1 ? '−' : '+'"></span>
                    </button>
                    <div
                        id="faq-answer-1"
                        x-show="activeIndex === 1"
                        x-transition:enter="transition-all duration-300 ease-in-out"
                        x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                        x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-250 ease-in-out"
                        x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                        class="overflow-hidden"
                        itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                            Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.
                        </p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div
                    class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                    :class="activeIndex === 2 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                        type="button"
                        @click="activeIndex = activeIndex === 2 ? null : 2"
                        :aria-expanded="activeIndex === 2"
                        aria-controls="faq-answer-2"
                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                        <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                            What digital marketing strategies do you specialize in?
                        </span>
                        <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 2 ? '−' : '+'"></span>
                    </button>
                    <div
                        id="faq-answer-2"
                        x-show="activeIndex === 2"
                        x-transition:enter="transition-all duration-300 ease-in-out"
                        x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                        x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-250 ease-in-out"
                        x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                        class="overflow-hidden"
                        itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                            Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand's reach and return on investment.
                        </p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div
                    class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                    :class="activeIndex === 3 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                        type="button"
                        @click="activeIndex = activeIndex === 3 ? null : 3"
                        :aria-expanded="activeIndex === 3"
                        aria-controls="faq-answer-3"
                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                        <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                            Do you offer innovative solutions in software development?
                        </span>
                        <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 3 ? '−' : '+'"></span>
                    </button>
                    <div
                        id="faq-answer-3"
                        x-show="activeIndex === 3"
                        x-transition:enter="transition-all duration-300 ease-in-out"
                        x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                        x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-250 ease-in-out"
                        x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                        class="overflow-hidden"
                        itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                            Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.
                        </p>
                    </div>
                </div>

                <!-- Item 5 -->
                <div
                    class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
                    :class="activeIndex === 4 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
                    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                        type="button"
                        @click="activeIndex = activeIndex === 4 ? null : 4"
                        :aria-expanded="activeIndex === 4"
                        aria-controls="faq-answer-4"
                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                        <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                            How does Reacon approach sustainable product design?
                        </span>
                        <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 4 ? '−' : '+'"></span>
                    </button>
                    <div
                        id="faq-answer-4"
                        x-show="activeIndex === 4"
                        x-transition:enter="transition-all duration-300 ease-in-out"
                        x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                        x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-250 ease-in-out"
                        x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                        x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                        class="overflow-hidden"
                        itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                            We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.
                        </p>
                    </div>
                </div>

                <!-- CTA card -->
                <div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
                    <div class="flex flex-col gap-2">
                        <p class="text-base font-medium leading-snug text-[#383B43]">
                            Have additional questions about Reacon Group?
                        </p>
                        <p class="text-base leading-snug text-[#666666]">
                            Our Australian-based customer experience team has licensed
                            specialists standing by to help.
                        </p>
                    </div>
                    <div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
                    <a
                        href="#"
                        class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
                        <span>Contact our Lead Team</span>
                        <!-- Added group-hover to animate the arrow dynamically on hover -->
                        <i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- End Faq Section -->


</main>

<style>
    @keyframes reacon-partner-marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    #banking-finance-partners .reacon-partner-track-wrap {
        overflow: hidden;
    }

    #banking-finance-partners .reacon-partner-track {
        display: flex;
        width: max-content;
        align-items: center;
        gap: 2.5rem;
        will-change: transform;
        animation: reacon-partner-marquee 28s linear infinite;
    }

    #banking-finance-partners .reacon-partner-track-wrap:hover .reacon-partner-track {
        animation-play-state: paused;
    }

    @media (max-width: 640px) {
        #banking-finance-partners .reacon-partner-track {
            gap: 1.75rem;
            animation-duration: 22s;
        }
    }

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
