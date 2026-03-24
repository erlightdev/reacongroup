<?php

/**
 * Partner logos auto-loop section.
 *
 * Uses a static list of partner logos (URL + alt) for predictable output
 * and to avoid filesystem scanning on every request.
 * @package reacon-group
 */
$partner_logo_dir_uri = untrailingslashit(get_template_directory_uri()) . '/public/partner-logo';

// Static list: keep in sync with files inside `theme/public/partner-logo/`.
// SEO note: `alt` is descriptive but generic (no brand names provided).
$partner_logos = array(
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-1.png',
        'alt' => 'Partner logo 1',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-2.png',
        'alt' => 'Partner logo 2',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-3.png',
        'alt' => 'Partner logo 3',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-4.png',
        'alt' => 'Partner logo 4',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-5.png',
        'alt' => 'Partner logo 5',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-6.png',
        'alt' => 'Partner logo 6',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-7.png',
        'alt' => 'Partner logo 7',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-8.png',
        'alt' => 'Partner logo 8',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-9.png',
        'alt' => 'Partner logo 9',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-10.png',
        'alt' => 'Partner logo 10',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-11.png',
        'alt' => 'Partner logo 11',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-12.png',
        'alt' => 'Partner logo 12',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-13.png',
        'alt' => 'Partner logo 13',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-14.png',
        'alt' => 'Partner logo 14',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-15.png',
        'alt' => 'Partner logo 15',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-16.png',
        'alt' => 'Partner logo 16',
    ),
    array(
        'url' => $partner_logo_dir_uri . '/partner-logo-17.png',
        'alt' => 'Partner logo 17',
    ),
);

// Map/normalize once for safe output (esc_url + ensure strings).
$partner_logos = array_map(function ($item) {
    return array(
        'url' => esc_url($item['url']),
        'alt' => sanitize_text_field($item['alt']),
    );
}, $partner_logos);

if (empty($partner_logos)) {
    return;
}
?>

<section class="relative w-full overflow-hidden" aria-label="<?php esc_attr_e('Partners', 'reacon-group'); ?>">
    <div class="pointer-events-none absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white to-transparent lg:w-32" aria-hidden="true"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white to-transparent lg:w-32" aria-hidden="true"></div>

    <div class="mx-auto flex min-h-[74px] w-full max-w-[1320px] items-center overflow-hidden px-4 lg:px-0">
		<div class="flex w-fit animate-partner-marquee items-center gap-12">
			<?php for ($rep = 0; $rep < 2; $rep++): ?>
				<?php foreach ($partner_logos as $logo): ?>
					<img
						class="h-14 w-[90px] object-contain mix-blend-luminosity opacity-70 transition-opacity duration-200 hover:opacity-100"
						src="<?php echo esc_attr($logo['url']); ?>"
						alt="<?php echo esc_attr($logo['alt']); ?>"
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