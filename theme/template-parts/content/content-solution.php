<?php

/**
 * Template part for displaying single solution posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

$solution_hero_bg = get_template_directory_uri() . '/public/solutions/visual-hero-subtract.png';
$visual_pre_production_img = get_template_directory_uri() . '/public/solutions/visual-preproduction-base.png';
$visual_post_production_img = get_template_directory_uri() . '/public/solutions/visual-postproduction-base.png';
$visual_copy_img = get_template_directory_uri() . '/public/solutions/visual-copy-image.png';

$visual_capability_video_img = get_template_directory_uri() . '/public/solutions/capability-video.png';
$visual_capability_digital_img = get_template_directory_uri() . '/public/solutions/capability-digital.png';
$visual_capability_structure_img = get_template_directory_uri() . '/public/solutions/capability-visual.png';

$hero_eyebrow = __('Creative Capabilities', 'reacon-group');
$hero_title = get_the_title();
$hero_lead = __('We craft compelling visual content-from design and photography to artwork adaptation-ensuring brand consistency across every touchpoint.', 'reacon-group');
if (has_excerpt()) {
    $hero_lead = wp_strip_all_tags(get_the_excerpt());
}

$detail_sections = array(
    array(
        'title' => __('Pre-Production & Photography', 'reacon-group'),
        'paragraphs' => array(
            __('Our pre-production and photography team ensures every shoot is strategically planned and flawlessly executed. From creative direction to on-site logistics, we manage each detail to align with your brand objectives and campaign goals. With expertise in location scouting, studio setup, styling, lighting design, and talent coordination, we create the foundation for high-quality, consistent visual storytelling.', 'reacon-group'),
            __('We tailor each shoot to meet the unique demands of your content-be it lifestyle imagery, product showcases, or hero visuals. Every element is thoughtfully curated to enhance visual appeal while supporting multi-channel delivery. Our approach blends technical precision with creative intent, ensuring each capture is both beautiful and purposeful.', 'reacon-group'),
        ),
        'image' => $visual_pre_production_img,
        'image_alt' => __('Pre-production and photography process', 'reacon-group'),
        'image_first_mobile' => true,
    ),
    array(
        'title' => __('Post Production & Retouching', 'reacon-group'),
        'paragraphs' => array(
            __('Our post-production team brings creative precision to every image, transforming raw visuals into polished, high-impact assets. With a deep understanding of brand aesthetics and channel requirements, we enhance imagery to meet the highest standards of visual quality. We apply advanced retouching techniques to refine product details, balance lighting, and ensure every element is sharp, clean, and brand-aligned. From subtle touch-ups to complex compositing, our team ensures consistency across every visual asset.', 'reacon-group'),
            __('Color correction and grading are tailored to match brand tones and ensure a cohesive look across campaigns and formats. Whether for print, digital, or retail, we optimize each image for its final destination-maximizing clarity, vibrancy, and resolution. The result is production-ready content that elevates your brand presence across all channels. With an eye for detail and technical excellence, we deliver visuals that perform as beautifully as they look.', 'reacon-group'),
        ),
        'image' => $visual_post_production_img,
        'image_alt' => __('Post production and retouching process', 'reacon-group'),
        'image_first_mobile' => true,
    ),
    array(
        'title' => __('Copy', 'reacon-group'),
        'paragraphs' => array(
            __('Our copywriters craft clear, engaging content that aligns seamlessly with your brand voice and marketing objectives. From campaign headlines and product descriptions to technical copy and SEO-driven content, we adapt tone and format to suit every platform-digital, print, and beyond. Working closely with design and strategy teams, we ensure every message enhances the overall creative execution.', 'reacon-group'),
            __('To support global reach, we partner with trusted localization experts to deliver accurate, culturally relevant translations in over 38 languages. Whether you are speaking to local markets or international audiences, our copy ensures consistency, clarity, and impact across all communication channels.', 'reacon-group'),
        ),
        'image' => $visual_copy_img,
        'image_alt' => __('Creative copy and localization process', 'reacon-group'),
        'image_first_mobile' => true,
    ),
);

$capability_cards = array(
    array(
        'title' => __('Video', 'reacon-group'),
        'description' => __('Purpose-built video content created for scale optimized for speed, clarity, and multi-channel delivery.', 'reacon-group'),
        'image' => $visual_capability_video_img,
        'alt' => __('Video production capability', 'reacon-group'),
    ),
    array(
        'title' => __('Digital', 'reacon-group'),
        'description' => __('Digital-first creative built for performance across platforms, devices, and user journeys.', 'reacon-group'),
        'image' => $visual_capability_digital_img,
        'alt' => __('Digital creative capability', 'reacon-group'),
    ),
    array(
        'title' => __('Structure (3D)', 'reacon-group'),
        'description' => __('Three-dimensional creative that brings brands to life in physical and experiential environments.', 'reacon-group'),
        'image' => $visual_capability_structure_img,
        'alt' => __('Structure 3D capability', 'reacon-group'),
    ),
);

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

$faq_items = array(
    array(
        'question' => __('What services does Reacon provide?', 'reacon-group'),
        'answer' => __('Reacon delivers end-to-end brand execution including content design, printing, packaging, warehousing, fulfilment, logistics, and data-driven communication systems.', 'reacon-group'),
    ),
    array(
        'question' => __('Does Reacon offer project management solutions?', 'reacon-group'),
        'answer' => __('Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.', 'reacon-group'),
    ),
    array(
        'question' => __('What digital marketing strategies do you specialize in?', 'reacon-group'),
        'answer' => __('Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand\'s reach and return on investment.', 'reacon-group'),
    ),
    array(
        'question' => __('Do you offer innovative solutions in software development?', 'reacon-group'),
        'answer' => __('Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.', 'reacon-group'),
    ),
    array(
        'question' => __('How does Reacon approach sustainable product design?', 'reacon-group'),
        'answer' => __('We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.', 'reacon-group'),
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section
        id="solution-visual-hero"
        class="relative w-full p-1.5 md:p-2.5"
        aria-label="<?php esc_attr_e('Solution page hero', 'reacon-group'); ?>">
        <div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
            <img
                src="<?php echo esc_url($solution_hero_bg); ?>"
                alt=""
                aria-hidden="true"
                class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                fetchpriority="high"
                loading="eager"
                decoding="async" />

            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

            <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                <p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
                    <?php echo esc_html($hero_eyebrow); ?>
                </p>

                <h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
                    <?php echo esc_html($hero_title); ?>
                </h1>

                <p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
                    <?php echo esc_html($hero_lead); ?>
                </p>
            </div>
        </div>
    </section>

    <section id="solution-visual-content" class="bg-background py-8 sm:py-12 lg:py-16" aria-label="<?php esc_attr_e('Visual studio service details', 'reacon-group'); ?>">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <?php foreach ($detail_sections as $section_index => $section): ?>
                <?php
                $is_even_row = 1 === ($section_index % 2);
                $grid_classes = $is_even_row
                    ? 'lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)]'
                    : 'lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)]';
                $text_classes = $is_even_row
                    ? 'order-2 max-w-[560px] lg:order-2 lg:justify-self-end lg:pl-2'
                    : 'order-2 max-w-[560px] lg:order-1 lg:pr-2';
                $image_classes = $is_even_row
                    ? 'order-1 lg:order-1 lg:max-w-[620px]'
                    : 'order-1 lg:order-2 lg:justify-self-end lg:w-full lg:max-w-[620px]';
                ?>
                <article class="py-8 sm:py-10 lg:py-14">
                    <div class="grid grid-cols-1 items-center gap-6 <?php echo esc_attr($grid_classes); ?> lg:gap-16 xl:gap-20">
                        <div class="<?php echo esc_attr($text_classes); ?>">
                            <header class="space-y-5 text-foreground">
                                <h2 class="font-display text-[32px] font-bold leading-[1.15] text-foreground sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[1.15]">
                                    <?php echo esc_html($section['title']); ?>
                                </h2>
                            </header>
                            <div class="mt-5 space-y-3 font-sans text-[16px] font-normal leading-[1.42] text-foreground/85">
                                <?php foreach ($section['paragraphs'] as $paragraph): ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="<?php echo esc_attr($image_classes); ?>">
                            <div class="relative overflow-hidden rounded-[28px] bg-muted shadow-[0_18px_55px_rgba(14,28,46,0.08)]">
                                <img
                                    src="<?php echo esc_url($section['image']); ?>"
                                    alt="<?php echo esc_attr($section['image_alt']); ?>"
                                    class="aspect-4/3 h-full w-full object-cover"
                                    loading="lazy"
                                    decoding="async" />
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="solution-visual-core-capabilities" class="bg-background pb-12 pt-6 sm:pb-16 sm:pt-8 lg:pb-24 lg:pt-12 xl:pb-28 xl:pt-14 2xl:pb-16 2xl:pt-10" aria-label="<?php esc_attr_e('Our core creative capabilities', 'reacon-group'); ?>">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <header class="mx-auto max-w-[780px] text-center">
                <h2 class="font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
                    <?php esc_html_e('Our Core Creative Capabilities', 'reacon-group'); ?>
                </h2>
                <p class="mx-auto mt-4 max-w-[680px] font-sans text-[16px] font-normal leading-[22.72px] text-foreground/80">
                    <?php esc_html_e('Expert content creation across visual, video, digital, and structural formats.', 'reacon-group'); ?>
                </p>
            </header>

            <div class="mt-8 grid grid-cols-1 gap-5 sm:mt-10 md:grid-cols-2 lg:mt-14 lg:grid-cols-3 lg:gap-8">
                <?php foreach ($capability_cards as $index => $card): ?>
                    <article class="overflow-hidden rounded-4xl border border-[#ECEFF2] bg-card p-1 shadow-[0_14px_45px_rgba(14,28,46,0.06)] <?php echo 2 === $index ? 'md:col-span-2 lg:col-span-1' : ''; ?>">
                        <div class="relative overflow-hidden rounded-t-4xl rounded-b-2xl bg-muted">
                            <img
                                src="<?php echo esc_url($card['image']); ?>"
                                alt="<?php echo esc_attr($card['alt']); ?>"
                                class="aspect-4/3 w-full object-cover"
                                loading="lazy"
                                decoding="async" />
                        </div>
                        <div class="px-5 pb-5 pt-3">
                            <h3 class="font-display text-[22px] font-semibold leading-[1.32] text-foreground sm:text-[24px] sm:leading-[31.68px]">
                                <?php echo esc_html($card['title']); ?>
                            </h3>
                            <p class="mt-2 font-sans text-[16px] font-normal leading-[22.72px] text-foreground/80">
                                <?php echo esc_html($card['description']); ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="solution-cta" class="py-10 sm:py-12 lg:py-14" aria-labelledby="solution-cta-heading">
        <div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
            <div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
                <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0E6D77_0%,#0A4E57_100%)] opacity-75" aria-hidden="true"></div>

                <div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
                    <h2 id="solution-cta-heading" class="font-display text-[34px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
                        <?php echo esc_html($solution_cta['heading']); ?>
                    </h2>
                    <p class="mt-4 max-w-[560px] font-sans text-[14px] leading-[1.42] text-white/85 sm:text-[16px] sm:leading-[22.72px]">
                        <?php echo esc_html($solution_cta['description']); ?>
                    </p>

                    <div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-7">
                        <a href="<?php echo esc_url($solution_cta['primary']['url']); ?>" class="inline-flex items-center gap-2 rounded-full bg-white py-1.5 pl-4 pr-1.5 font-sans text-[13px] font-medium text-[#0B6A74] no-underline transition hover:bg-white/90 sm:pl-5 sm:pr-2">
                            <span><?php echo esc_html($solution_cta['primary']['label']); ?></span>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#dbeef1]" aria-hidden="true">
                                <i class="ph-bold ph-arrow-up-right text-[12px] text-[#0B6A74]"></i>
                            </span>
                        </a>
                        <a href="<?php echo esc_url($solution_cta['secondary']['url']); ?>" class="inline-flex items-center rounded-full border border-white/65 px-5 py-2.5 font-sans text-[13px] font-normal text-white no-underline transition hover:bg-white/10">
                            <?php echo esc_html($solution_cta['secondary']['label']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reacon-faq-section" class="w-full bg-white py-16" aria-labelledby="reacon-faq-heading" itemscope itemtype="https://schema.org/FAQPage" x-data="{ activeIndex: 0 }">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="flex flex-col gap-6">
                    <h2 id="reacon-faq-heading" class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
                        <?php esc_html_e('Frequently Asked Questions', 'reacon-group'); ?>
                    </h2>
                    <p class="max-w-4xl text-base leading-snug text-black">
                        <?php esc_html_e('Find quick answers to how Reacon works, what we deliver, and how we support brands across print, production, and data-driven automation.', 'reacon-group'); ?>
                    </p>
                </div>
            </div>

            <div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="<?php esc_attr_e('Frequently asked questions list', 'reacon-group'); ?>">
                <?php foreach ($faq_items as $faq_index => $faq_item): ?>
                    <div class="transition-colors duration-300 rounded-2xl p-5 sm:p-6" :class="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button type="button" @click="activeIndex = activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? null : <?php echo esc_attr((string) $faq_index); ?>" :aria-expanded="activeIndex === <?php echo esc_attr((string) $faq_index); ?>" aria-controls="faq-answer-<?php echo esc_attr((string) $faq_index); ?>" class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
                            <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
                                <?php echo esc_html($faq_item['question']); ?>
                            </span>
                            <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === <?php echo esc_attr((string) $faq_index); ?> ? '−' : '+'"></span>
                        </button>
                        <div id="faq-answer-<?php echo esc_attr((string) $faq_index); ?>" x-show="activeIndex === <?php echo esc_attr((string) $faq_index); ?>" x-transition:enter="transition-all duration-300 ease-in-out" x-transition:enter-start="max-h-0 opacity-0 -translate-y-1" x-transition:enter-end="max-h-96 opacity-100 translate-y-0" x-transition:leave="transition-all duration-250 ease-in-out" x-transition:leave-start="max-h-96 opacity-100 translate-y-0" x-transition:leave-end="max-h-0 opacity-0 -translate-y-1" class="overflow-hidden" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
                                <?php echo esc_html($faq_item['answer']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
                    <div class="flex flex-col gap-2">
                        <p class="text-base font-medium leading-snug text-[#383B43]"><?php esc_html_e('Have additional questions about Reacon Group?', 'reacon-group'); ?></p>
                        <p class="text-base leading-snug text-[#666666]"><?php esc_html_e('Our Australian-based customer experience team has licensed specialists standing by to help.', 'reacon-group'); ?></p>
                    </div>
                    <div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
                    <a href="#" class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
                        <span><?php esc_html_e('Contact our Lead Team', 'reacon-group'); ?></span>
                        <i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        @media (min-width: 1024px) {
            #solution-visual-hero .reacon-about-hero-card {
                --hero-notch-width: clamp(560px, 48vw, 720px);
                --hero-notch-radius: 40px;
                --hero-notch-height: 86px;
                --hero-notch-swoop: 40px;
            }

            #solution-visual-hero .reacon-about-hero-card::before {
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

            #solution-visual-hero .reacon-about-hero-card::after {
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
            const syncSolutionHeroNotchToDesktopMenu = () => {
                const heroCard = document.querySelector('#solution-visual-hero .reacon-about-hero-card');
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

            let solutionNotchSyncRaf = null;
            const scheduleSolutionNotchSync = () => {
                if (solutionNotchSyncRaf) {
                    cancelAnimationFrame(solutionNotchSyncRaf);
                }
                solutionNotchSyncRaf = requestAnimationFrame(syncSolutionHeroNotchToDesktopMenu);
            };

            scheduleSolutionNotchSync();
            window.addEventListener('resize', scheduleSolutionNotchSync);
            window.addEventListener('load', scheduleSolutionNotchSync);
            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(scheduleSolutionNotchSync).catch(() => {});
            }
        });
    </script>

</article><!-- #post-${ID} -->