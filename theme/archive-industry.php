<?php

/**
 * The template for displaying industry archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

get_header();

$industries_assets_uri = get_template_directory_uri() . '/public/industries';
$industries_hero_bg = $industries_assets_uri . '/industries-hero-subtract.png';
$industries_approach_vector_src = $industries_assets_uri . '/industries-approach-vector.svg';
$industries_approach_img1 = $industries_assets_uri . '/industries-approach-image-1.png';
$industries_approach_img2 = $industries_assets_uri . '/industries-approach-image-2.png';
$industries_approach_img3 = $industries_assets_uri . '/industries-approach-image-3.png';
$industries_arrow_right = $industries_assets_uri . '/industries-card-arrow-right.svg';

$industries_work_cards = array(
    array(
        'title' => __('Banking & Finance', 'reacon-group'),
        'excerpt' => __('The financial services landscape is highly competitive and regulated. Denoted by increasing costs per acquisition, digital savvy audiences and new challenger banks, neo banks and aggregator services encourage customers to seek better deals.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-banking.png',
        'type' => 'single',
        'url' => home_url('/industries/banking-finance/'),
    ),
    array(
        'title' => __('Charities & Not-For-Profits', 'reacon-group'),
        'excerpt' => __('Early in 2022, the Charities Aid Foundation ranks Australia as the eighth highest of more than 140 countries over 10 years (2009 to 2018) of the World Giving Index, with 60% of all Australians making a financial donation to a charity.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-charities.png',
        'type' => 'single',
        'url' => home_url('/industries/charities-not-for-profit/'),
    ),
    array(
        'title' => __('Health & Pharmaceuticals', 'reacon-group'),
        'excerpt' => __('We understand that marketing approaches in heavily regulated sectors must be cognisant of the risks and have expertise of the rules, processes and systems that underpin them.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-health.png',
        'type' => 'single',
        'url' => home_url('/industries/health-pharmaceuticals/'),
    ),
    array(
        'title' => __('E-Commerce', 'reacon-group'),
        'excerpt' => __('We understand that marketing approaches in heavily regulated sectors must be cognisant of the risks and have expertise of the rules, processes and systems that underpin them.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-ecommerce.png',
        'type' => 'single',
        'url' => home_url('/industries/e-commerce/'),
    ),
    array(
        'title' => __('Government', 'reacon-group'),
        'excerpt' => __('We understand that marketing approaches in heavily regulated sectors must be cognisant of the risks and have expertise of the rules, processes and systems that underpin them.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-government.png',
        'overlay_src' => $industries_assets_uri . '/industries-card-government-overlay.png',
        'type' => 'overlay',
        'url' => home_url('/industries/government/'),
    ),
    array(
        'title' => __('Hospitality', 'reacon-group'),
        'excerpt' => __('Early in 2022, the Charities Aid Foundation ranks Australia as the eighth highest of more than 140 countries over 10 years (2009 to 2018) of the World Giving Index, with 60% of all Australians making a financial donation to a charity.', 'reacon-group'),
        'image_src' => $industries_assets_uri . '/industries-card-hospitality.png',
        'type' => 'single',
        'url' => home_url('/industries/hospitality/'),
    ),
);
?>

<main id="primary" class="overflow-x-hidden" role="main">
    <!-- Major Section: Industries Hero -->
    <section
        id="industries-hero"
        class="relative w-full p-1.5 md:p-2.5"
        aria-label="<?php esc_attr_e('Industries hero', 'reacon-group'); ?>">
        <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
            <img
                src="<?php echo esc_url($industries_hero_bg); ?>"
                alt=""
                aria-hidden="true"
                class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                fetchpriority="high"
                loading="eager"
                decoding="async" />

            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

            <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                <p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
                    <?php esc_html_e('Industries', 'reacon-group'); ?>
                </p>

                <h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                    <?php esc_html_e('Industries We Empower', 'reacon-group'); ?>
                </h1>

                <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                    <?php esc_html_e('Expert execution tailored to the needs of every sector we serve.', 'reacon-group'); ?>
                </p>
            </div>
        </div>
    </section>
    <!-- End Major Section: Industries Hero -->

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
                        <?php esc_html_e('Our nimble industry agnostic approach is helping brands the world over.', 'reacon-group'); ?>
                    </h2>

                    <div class="mt-[16px] max-w-[900px] font-sans text-[16px] leading-[22.72px] text-foreground">
                        <p>
                            <?php esc_html_e(
                                "We do not underestimate the value of providing social proof, we don't like blowing our own trumpet, but hey if we've done something good for our brand partners, no harm in making everyone aware of it, right? Brands have discovered and unlocked great value from our outcomes based approach as we've journeyed with them from one campaign to the next. ",
                                'reacon-group'
                            ); ?>
                        </p>
                        <p class="mt-4">
                            <?php esc_html_e(
                                "Below are a few brand journey's that have validated our approach, people and technologies with the ultimate goal of getting brands in front of the customers they want, harnessing our marketing execution strengths and extending this with access to regional markets, cutting technology and most importantly measurable results.",
                                'reacon-group'
                            ); ?>
                        </p>
                    </div>

                    <img
                        src="<?php echo esc_url($industries_approach_vector_src); ?>"
                        alt=""
                        aria-hidden="true"
                        class="pointer-events-none absolute -right-[240px] -top-[70px] w-[520px] max-w-none opacity-30" />
                </div>

                <div class="w-full">
                    <div class="grid grid-cols-1 gap-[24px] lg:grid-cols-[1fr_320px_1fr]">
                        <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                            <img
                                src="<?php echo esc_url($industries_approach_img1); ?>"
                                alt=""
                                aria-hidden="true"
                                class="absolute inset-0 h-full w-full object-cover"
                                loading="lazy"
                                decoding="async" />
                        </figure>

                        <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                            <img
                                src="<?php echo esc_url($industries_approach_img2); ?>"
                                alt=""
                                aria-hidden="true"
                                class="absolute inset-0 h-full w-full object-cover"
                                loading="lazy"
                                decoding="async" />
                        </figure>

                        <figure class="relative overflow-hidden rounded-[24px] bg-muted h-[320px] sm:h-[420px] lg:h-[620px] min-w-0">
                            <img
                                src="<?php echo esc_url($industries_approach_img3); ?>"
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
                    <?php esc_html_e('Every industry has its own challenges.', 'reacon-group'); ?>
                </h2>
                <p class="mt-0 font-display text-[32px] font-medium leading-[42.24px] text-foreground sm:text-[36px] sm:leading-[48px] md:text-[44px] md:leading-[58.08px]">
                    <?php esc_html_e('We solve them with precision, scale, and relentless execution.', 'reacon-group'); ?>
                </p>
            </div>
        </div>
    </section>
    <!-- End Major Section: Industries Challenges -->

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
                            <span class="block">Industries We Work With</span>
                        </h2>
                    </div>

                    <div data-industries-nav-scroller class="flex w-full flex-row gap-[8px] overflow-x-scroll overflow-y-hidden pb-1 lg:w-[295px] lg:flex-col lg:items-start lg:overflow-visible">
                        <?php foreach ($industries_work_cards as $index => $card) : ?>
                            <button
                                type="button"
                                data-industries-slide="<?php echo esc_attr((string) $index); ?>"
                                class="<?php echo esc_attr(0 === $index ? 'bg-primary text-white' : 'bg-transparent text-muted-foreground'); ?> shrink-0 cursor-pointer flex items-center px-[16px] py-[12px] rounded-full font-sans text-[16px] leading-[22.72px] whitespace-nowrap w-auto lg:w-full justify-start">
                                <?php echo esc_html($card['title']); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right: Swiper -->
                <div class="w-full min-w-0">
                    <div class="swiper js-industries-work-swiper w-full overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php foreach ($industries_work_cards as $card) : ?>
                                <article class="swiper-slide bg-[var(--l-gray/50,#f6f6f6)] border border-gray-100 flex flex-col h-[555px] items-center overflow-hidden p-[8px] relative rounded-xl">
                                    <div class="flex flex-col gap-[12px] items-start p-[16px] relative shrink-0 text-[color:var(--text/text-primary,#383b43)] w-full">
                                        <p class="font-display text-[18px] font-semibold leading-[31.68px] text-foreground w-full">
                                            <?php echo esc_html($card['title']); ?>
                                        </p>
                                        <p class="font-sans text-[14px] leading-[19.88px] text-foreground overflow-hidden line-clamp-3">
                                            <?php echo esc_html($card['excerpt']); ?>
                                        </p>
                                    </div>

                                    <div class="flex flex-1 flex-col items-start min-h-0 relative w-full">
                                        <div class="relative flex-1 w-full rounded-[20px] overflow-hidden min-h-0">
                                            <?php if ('overlay' === $card['type']): ?>
                                                <img
                                                    src="<?php echo esc_url($card['image_src']); ?>"
                                                    alt=""
                                                    aria-hidden="true"
                                                    class="absolute inset-0 h-full w-full object-cover pointer-events-none" />
                                                <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-[20px]">
                                                    <img
                                                        src="<?php echo esc_url($card['overlay_src']); ?>"
                                                        alt=""
                                                        aria-hidden="true"
                                                        class="absolute h-[125.79%] left-0 top-[-12.89%] w-full object-cover" />
                                                </div>
                                            <?php else: ?>
                                                <img
                                                    src="<?php echo esc_url($card['image_src']); ?>"
                                                    alt=""
                                                    aria-hidden="true"
                                                    class="h-full w-full object-cover pointer-events-none" />
                                            <?php endif; ?>
                                        </div>

                                        <a
                                            href="<?php echo esc_url($card['url']); ?>"
                                            aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'reacon-group'), (string) $card['title'])); ?>"
                                            class="mt-auto no-underline flex gap-[4px] items-center justify-end p-[12px] relative shrink-0 w-full">
                                            <span class="font-sans text-[14px] leading-[19.88px] text-foreground whitespace-nowrap">
                                                <?php esc_html_e('Read More', 'reacon-group'); ?>
                                            </span>
                                            <img
                                                src="<?php echo esc_url($industries_arrow_right); ?>"
                                                alt=""
                                                aria-hidden="true"
                                                class="w-[12px] h-[12px] shrink-0"
                                                loading="lazy"
                                                decoding="async" />
                                        </a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Major Section: Industries We Work With -->

    <!-- Cta Section: strategic call-to-action banner. -->
    <?php
    $solution_cta = array(
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
        id="solution-cta"
        class="py-10 sm:py-12 lg:py-14"
        aria-labelledby="solution-cta-heading">
        <div class="mx-auto w-full  px-5 sm:px-6 lg:px-10">
            <div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">
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

                <div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
                    <h2
                        id="solution-cta-heading"
                        class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
                        <?php echo esc_html($solution_cta['heading']); ?>
                    </h2>
                    <p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
                        <?php echo esc_html($solution_cta['description']); ?>
                    </p>

                    <div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
                        <a
                            href="<?php echo esc_url($solution_cta['primary']['url']); ?>"
                            class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#0B6A74] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
                            <span><?php echo esc_html($solution_cta['primary']['label']); ?></span>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
                                <i class="ph-bold ph-arrow-up-right text-[12px] text-[#0B6A74]"></i>
                            </span>
                        </a>
                        <a
                            href="<?php echo esc_url($solution_cta['secondary']['url']); ?>"
                            class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
                            <?php echo esc_html($solution_cta['secondary']['label']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cta Section -->

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
            }

            initSwiper();
        });
    </script>
</main>

<style>
    /* Desktop-only top notch — matches About / Contact hero header recess. */
    @media (min-width: 1024px) {
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

        #industries-hero .reacon-about-hero-card::after {
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
