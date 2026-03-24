<?php

/**
 * Partner logos auto-loop section.
 *
 * Pulls from theme/public/partner-logo dynamically.
 * @package reacon-group
 */
$logo_dir   = get_template_directory() . '/public/partner-logo';
$logo_files = glob($logo_dir . '/partner-logo-*.png');

if (! $logo_files || count($logo_files) < 1) {
    // Avoid rendering if no logos present.
    return;
}

// Sort by name numeric part (1..17)
sort($logo_files, SORT_NATURAL | SORT_FLAG_CASE);

// map to URL version
$logo_urls = array_map(function ($path) {
    return esc_url(str_replace(get_template_directory(), get_template_directory_uri(), $path));
}, $logo_files);
?>

<section class="relative w-full overflow-hidden" aria-label="<?php esc_attr_e('Partners', 'reacon-group'); ?>">
    <div class="pointer-events-none absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white to-transparent lg:w-32" aria-hidden="true"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white to-transparent lg:w-32" aria-hidden="true"></div>

    <div class="mx-auto flex min-h-[74px] w-full max-w-[1320px] items-center overflow-hidden px-4 lg:px-0">
        <div class="flex w-fit animate-partner-marquee items-center gap-12">
            <?php for ($rep = 0; $rep < 2; $rep++) : ?>
                <?php foreach ($logo_urls as $logo_url) : ?>
                    <img
                        class="h-14 w-[90px] object-contain mix-blend-luminosity opacity-70 transition-opacity duration-200 hover:opacity-100"
                        src="<?php echo esc_attr($logo_url); ?>"
                        alt="<?php esc_attr_e('Partner logo', 'reacon-group'); ?>"
                        loading="lazy"
                        decoding="async" />
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <style>
        @keyframes partner-marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-partner-marquee {
            animation: partner-marquee 30s linear infinite;
        }

        .animate-partner-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</section>