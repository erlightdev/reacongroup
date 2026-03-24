<?php

/**
 * Home page section: Hero.
 *
 * Responsive hero with design-system tokens and an optimized
 * background media strategy: use video when available, otherwise
 * fall back to a high-priority image.
 *
 * @package reacon-group
 */
$hero_image_webp = get_template_directory_uri() . '/public/image/hero-bg.webp';
$hero_image_png  = get_template_directory_uri() . '/public/image/hero-bg.png';
$hero_video_mp4  = get_template_directory_uri() . '/public/home/hero-home.mp4';
$stats_icon      = get_template_directory_uri() . '/public/figma-assets/stats-icon.png';

$hero_video_mp4_path = get_template_directory() . '/public/home/hero-home.mp4';

$has_hero_mp4   = file_exists($hero_video_mp4_path);
$has_hero_video = $has_hero_mp4;
?>

<section
    id="hero"
    class="relative w-full p-4"
    aria-label="<?php esc_attr_e('Hero', 'reacon-group'); ?>">
    <div class="relative flex min-h-[60vh] w-full flex-col overflow-hidden rounded-[31px] bg-foreground lg:min-h-[640px] xl:min-h-[720px]">

        <!-- Always render image placeholder under video for reliable fallback -->
        <picture class="pointer-events-none absolute inset-0" aria-hidden="true">
            <source srcset="<?php echo esc_url($hero_image_webp); ?>" type="image/webp" />
            <img
                src="<?php echo esc_url($hero_image_png); ?>"
                alt=""
                class="h-full w-full object-cover object-center"
                fetchpriority="high"
                loading="eager"
                decoding="async" />
        </picture>

        <?php if ($has_hero_video): ?>
            <video
                class="pointer-events-none absolute inset-0 z-[1] h-full w-full object-cover object-center"
                autoplay
                muted
                loop
                playsinline
                preload="metadata"
                poster="<?php echo esc_url($hero_image_png); ?>"
                onerror="this.style.display='none';"
                aria-hidden="true">
                <source src="<?php echo esc_url($hero_video_mp4); ?>" type="video/mp4" />
            </video>
        <?php endif; ?>

        <div class="pointer-events-none absolute inset-0 bg-black/40 lg:bg-gradient-to-t lg:from-black/55 lg:via-black/20 lg:to-transparent" aria-hidden="true"></div>

        <div
            class="pointer-events-none absolute left-0 top-0 h-[60%] w-[42%] min-w-[280px]"
            style="background-image:linear-gradient(130deg, rgba(30, 202, 211, 0.34) 12%, rgba(30, 202, 211, 0) 58%);"
            aria-hidden="true"></div>

        <div class="relative z-10 mx-auto flex h-full w-full flex-1 flex-col justify-end px-6 pb-0 pt-28 lg:px-[42px] lg:pt-24">

            <div class="mb-10 flex w-full max-w-[860px] flex-col items-start gap-6 lg:mb-[42px]">
                <div class="flex flex-col gap-3 text-white">
                    <p class="font-sans text-base leading-[1.42]">
                        <?php esc_html_e('Powering how brands print, automate, and deliver worldwide.', 'reacon-group'); ?>
                    </p>

                    <h1 class="font-display text-4xl font-bold leading-[1.15] tracking-tight lg:text-[64px] lg:leading-[1.14]">
                        <?php esc_html_e('We Are Your Global Printing & Production Partner', 'reacon-group'); ?>
                    </h1>
                </div>

                <p class="max-w-[847px] font-sans text-base leading-[1.42] text-white/95">
                    <?php esc_html_e('From packaging to retail activations, we produce print at scale, on time, every time. With 30+ years of experience, Reacon delivers precision, consistency, and speed across 8 countries.', 'reacon-group'); ?>
                </p>

                <a
                    href="<?php echo esc_url(home_url('/about-us/')); ?>"
                    class="group inline-flex items-center gap-2.5 rounded-full bg-primary py-1 pl-5 pr-1 font-sans transition-all duration-300 hover:bg-secondary">
                    <span class="text-base font-medium text-primary-foreground">
                        <?php esc_html_e('Learn More About Us', 'reacon-group'); ?>
                    </span>
                    <span class="flex h-[42px] w-[42px] shrink-0 items-center justify-center rounded-full bg-white/30 transition-transform duration-300 group-hover:rotate-45" aria-hidden="true">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.16699 12.8333L12.8337 1.16666M12.8337 1.16666H3.49965M12.8337 1.16666V10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </a>
            </div>

            <div class="relative flex w-full flex-col gap-3 rounded-t-[32px] bg-white p-6 sm:max-w-[320px] lg:absolute lg:bottom-0 lg:right-[42px] lg:min-h-[287px]">
                <div class="pointer-events-none absolute right-4 top-4 h-[34px] w-[76px] overflow-hidden">
                    <img
                        src="<?php echo esc_url($stats_icon); ?>"
                        alt=""
                        class="h-full w-full object-cover object-top"
                        loading="lazy"
                        decoding="async" />
                </div>

                <div class="relative z-10 flex w-full flex-col gap-1">
                    <p class="font-display text-[44px] font-bold leading-[1.2] text-primary">
                        <?php esc_html_e('490,000+', 'reacon-group'); ?>
                    </p>
                    <p class="font-sans text-base font-semibold leading-[1.42] text-foreground">
                        <?php esc_html_e('projects delivered globally', 'reacon-group'); ?>
                    </p>
                </div>

                <div class="relative z-10 w-full">
                    <p class="font-sans text-sm leading-[1.42] text-muted-foreground">
                        <?php esc_html_e('Across 8 countries and counting powering consistent, high-quality brand execution for enterprises, institutions, and agencies worldwide.', 'reacon-group'); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>