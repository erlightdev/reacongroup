<?php

/**
 * Testimonials section — two auto-scrolling marquee rows (forward + reverse).
 *
 * @package reacon-group
 */

$row1 = [
    [
        'quote'    => 'Reacon has been a game-changer for our branding strategy. Their creative solutions have not only elevated our product presentation but also enhanced customer engagement at every touchpoint.',
        'name'     => 'Maria Gomez',
        'role'     => 'Brand Manager, Lifestyle Products Co.',
        'initials' => 'MG',
    ],
    [
        'quote'    => 'Since partnering with Reacon, we have seen a significant increase in our market reach. Their innovative approaches to design and marketing have truly set us apart from competitors.',
        'name'     => 'James Chen',
        'role'     => 'Marketing Director, Tech Innovations Ltd.',
        'initials' => 'JC',
    ],
    [
        'quote'    => "Reacon's expertise in digital marketing has transformed our online presence. Their strategies have led to increased traffic and conversion rates across all platforms.",
        'name'     => 'Linda Patel',
        'role'     => 'E-commerce Lead, Fashion Forward.',
        'initials' => 'LP',
    ],
    [
        'quote'    => 'Collaborating with Reacon has been an enlightening experience. Their ability to understand our vision and turn it into reality has exceeded our expectations.',
        'name'     => 'Carlos Martinez',
        'role'     => 'Creative Director, Artistry Agency.',
        'initials' => 'CM',
    ],
];

$row2 = [
    [
        'quote'    => 'The team at Reacon delivered beyond what we thought possible. Their attention to detail and commitment to our brand identity was evident in every deliverable.',
        'name'     => 'Sarah Thompson',
        'role'     => 'Head of Operations, NovaTech Solutions.',
        'initials' => 'ST',
    ],
    [
        'quote'    => 'Working with Reacon completely reshaped how we approach our campaigns. Their data-driven insights combined with stunning creative work have driven real results.',
        'name'     => 'David Kim',
        'role'     => 'CMO, Elevate Retail Group.',
        'initials' => 'DK',
    ],
    [
        'quote'    => 'Reacon understands the nuances of our industry like no other agency. They translate complex ideas into compelling narratives that resonate with our target audience.',
        'name'     => 'Priya Nair',
        'role'     => 'Communications Director, HealthFirst.',
        'initials' => 'PN',
    ],
    [
        'quote'    => "From strategy to execution, Reacon's process is seamless. They brought fresh perspectives and delivered a brand refresh that exceeded every stakeholder's expectations.",
        'name'     => 'Tom Waverly',
        'role'     => 'Founder, Pinnacle Ventures.',
        'initials' => 'TW',
    ],
];
?>

<section
    class="relative overflow-hidden py-20"
    style="background-image: radial-gradient(circle at center, rgba(255,255,255,0) 0%, rgba(255,255,255,0.7) 60%, rgba(255,255,255,1) 100%), radial-gradient(circle at center, #e9fbfc 0%, #ffffff 100%);"
    aria-label="<?php esc_attr_e('Client Testimonials', 'reacon-group'); ?>">

    <!-- Fading edges -->
    <div class="pointer-events-none absolute left-0 top-0 h-full w-[100px] lg:w-[200px] bg-gradient-to-r from-white to-transparent z-10" aria-hidden="true"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-full w-[100px] lg:w-[200px] bg-gradient-to-l from-white to-transparent z-10" aria-hidden="true"></div>

    <!-- Section header -->
    <div class="relative z-10 mx-auto max-w-[1200px] px-5 text-center mb-10 lg:mb-[60px]">
        <h2 class="font-display font-medium text-[32px] lg:text-[42px] leading-tight text-foreground mb-3">
            <?php esc_html_e('What Our Partners Say About Us', 'reacon-group'); ?>
        </h2>
        <p class="font-sans text-base text-muted-foreground max-w-[700px] mx-auto">
            <?php esc_html_e('Our clients trust us to deliver precision, creativity, and scale — every time. Here\'s what they say about working with Reacon.', 'reacon-group'); ?>
        </p>
    </div>

    <!-- Marquee rows -->
    <div class="flex flex-col gap-6 lg:gap-8">

        <!-- Row 1: scroll left -->
        <div class="overflow-hidden group">
            <div class="flex w-fit gap-6 lg:gap-8 animate-testimonials-marquee group-hover:[animation-play-state:paused]">
                <?php for ($rep = 0; $rep < 2; $rep++) : ?>
                    <?php foreach ($row1 as $t) : ?>
                        <blockquote class="w-[300px] sm:w-[380px] lg:w-[472px] min-h-[200px] lg:min-h-[260px] bg-background border border-border rounded-3xl p-5 lg:p-6 flex flex-col justify-between text-left flex-shrink-0 transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <p class="font-sans text-sm lg:text-[15px] text-foreground leading-relaxed"><?php echo esc_html($t['quote']); ?></p>
                            <footer class="flex items-center gap-4 lg:gap-6 mt-4">
                                <div class="flex-1 min-w-0">
                                    <cite class="not-italic font-medium text-primary text-sm lg:text-[15px] block font-sans"><?php echo esc_html($t['name']); ?></cite>
                                    <div class="text-xs lg:text-sm text-muted-foreground font-sans truncate"><?php echo esc_html($t['role']); ?></div>
                                </div>
                                <img
                                    src="<?php echo esc_url('https://placehold.co/100x100/1ecad3/ffffff.png?text=' . $t['initials']); ?>"
                                    alt="<?php echo esc_attr(sprintf(__('Photo of %s', 'reacon-group'), $t['name'])); ?>"
                                    class="w-10 h-10 lg:w-[52px] lg:h-[52px] rounded-full object-cover flex-shrink-0"
                                    loading="lazy"
                                    decoding="async">
                            </footer>
                        </blockquote>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Row 2: scroll right (reverse direction) -->
        <div class="overflow-hidden group">
            <div class="flex w-fit gap-6 lg:gap-8 animate-testimonials-marquee-reverse group-hover:[animation-play-state:paused]">
                <?php for ($rep = 0; $rep < 2; $rep++) : ?>
                    <?php foreach ($row2 as $t) : ?>
                        <blockquote class="w-[300px] sm:w-[380px] lg:w-[472px] min-h-[200px] lg:min-h-[260px] bg-background border border-border rounded-3xl p-5 lg:p-6 flex flex-col justify-between text-left flex-shrink-0 transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <p class="font-sans text-sm lg:text-[15px] text-foreground leading-relaxed"><?php echo esc_html($t['quote']); ?></p>
                            <footer class="flex items-center gap-4 lg:gap-6 mt-4">
                                <div class="flex-1 min-w-0">
                                    <cite class="not-italic font-medium text-primary text-sm lg:text-[15px] block font-sans"><?php echo esc_html($t['name']); ?></cite>
                                    <div class="text-xs lg:text-sm text-muted-foreground font-sans truncate"><?php echo esc_html($t['role']); ?></div>
                                </div>
                                <img
                                    src="<?php echo esc_url('https://placehold.co/100x100/1ecad3/ffffff.png?text=' . $t['initials']); ?>"
                                    alt="<?php echo esc_attr(sprintf(__('Photo of %s', 'reacon-group'), $t['name'])); ?>"
                                    class="w-10 h-10 lg:w-[52px] lg:h-[52px] rounded-full object-cover flex-shrink-0"
                                    loading="lazy"
                                    decoding="async">
                            </footer>
                        </blockquote>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
        </div>

    </div>
</section>

<style>
    @keyframes testimonials-marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-testimonials-marquee {
        animation: testimonials-marquee 80s linear infinite;
    }

    .animate-testimonials-marquee-reverse {
        animation: testimonials-marquee 80s linear infinite reverse;
    }
</style>