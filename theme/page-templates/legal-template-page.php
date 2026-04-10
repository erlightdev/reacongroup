<?php

/**
 * Template Name: Legal Page
 * Template Post Type: page
 * Author: Prakash Nayak
 * Author URI: https://prakashnayak.com.np/
 * Development Company: The Development Agency
 * Company: Reacon Group
 * The legal page template for the Reacon Group website.
 * Each visual section is loaded from a dedicated partial inside
 *
 * @package reacon-group
 */
get_header();

$legal_header_bg = get_template_directory_uri() . '/public/about/about-header.png';
$terms_pdf_url = 'https://cdn.prod.website-files.com/625da6eb132e42accdf80a23/6476f2ed7c28c52e94223f1b_Terms%20of%20use%20(1).pdf';
$acf_enabled = function_exists('get_field');

$terms_sections = array(
    array(
        'id' => 'warranties-and-disclaimers',
        'title' => 'Warranties and disclaimers',
        'paragraphs' => array(
            'The Content and this Website are provided "as is" and "as available".',
            'To the fullest extent permissible pursuant to applicable law, we disclaim all warranties, express or implied, including implied warranties of merchantability and fitness for a particular purpose, or non-infringement. We do not warrant that this Website or the server that operates it is free from viruses or other corrupted materials or occasional outages or disruption to service which prevent you from accessing this Website or that use of this Website will be compatible with the hardware and software you are using to access it.',
            'You assume the entire cost of all necessary servicing, repair, or correction. We do not warrant or make any representations regarding the use or the results of the use of the Content or this Website in terms of their correctness, accuracy, reliability, or otherwise.',
            'We reserve the right to make any change to the Content without notice. We may also make improvements or changes in the products or programs described in the Content at any time without notice. For example, changes in circumstances after the date of publication may impact upon the accuracy of the Content.',
            'The Content may contain general information about our products and services. Unless expressly stated otherwise, the Content does not:',
            'This Website may include information about stocks and their prices. Information made available on stock prices on this Website does not reflect the current or real-time price of the stock. Images and diagrams on this Website are intended to be a visual aid only and do not necessarily accurately depict the object described.',
            'Your use of this Website including all Content, data or software distributed by, downloaded or accessed from or through this Website is at your own risk. Before taking or refraining from any action in reliance on the Content or this Website, you must make and rely on your own enquiries in relation to, and in evaluation of, the Content including any information, predictions, opinions and statements contained in this Website.',
        ),
        'bullets' => array(
            'Constitute an offer or inducement to enter into a legally binding contract.',
            'Form part of the terms and conditions for our products and services.',
            'Purport to provide you with personal financial or investment advice of any kind.',
            'Take account of your particular financial position or requirements.',
        ),
    ),
    array(
        'id' => 'link',
        'title' => 'Link',
        'paragraphs' => array(
            'This Website may contain links and other pointers to external websites operated by third parties. Any such website is not under our control and we do not take any responsibility for the contents of any such site.',
            'We cannot guarantee, represent or warrant that the content contained in any third party website is accurate, legal or inoffensive. Any link to an external website is provided merely as a convenience to you.',
            'You take sole responsibility for the use of any external website.',
            'You may not create a link to this Website from another website or document without our prior written consent.',
        ),
    ),
    array(
        'id' => 'copyright-and-submitted-material',
        'title' => 'Copyright and submitted material',
        'paragraphs' => array(
            'All materials and information on this Website including without limitation any logo, design, text, graphic and their arrangement ("Content") are licensed to or owned by us.',
            'Unless we indicate otherwise you must not copy, distribute, republish, download, display, post or transmit the Content in any form or by any means without our prior permission or the written permission of the copyright owner. You may access and use the Content and this Website for your own personal use only. Unless expressly permitted otherwise, you must not do anything to alter, modify or add to the Content.',
            'You acknowledge and agree that if you contribute content to the Website, such content is either owned by you or by a third party which has given you permission to contribute such content to the Website, and it will not contain third party material unless you have permission from the rightful owner.',
            'Any contributed content will become our property and you assign, or will procure the assignment of, all rights, title and interests in and to such contributions to us.',
            'We reserve the right to remove any content from this Website at any time, for any reason, including upon receipt of claims or allegations from third parties or authorities, or if we are concerned that these Terms may have been breached.',
            'Any comments or materials sent to us through this Website, including feedback data, questions, comments and suggestions, will be deemed non-confidential. We have no obligation with respect to such feedback and may use it for any purpose, including product and service development.',
        ),
    ),
    array(
        'id' => 'indemnity',
        'title' => 'Indemnity',
        'paragraphs' => array(
            'You agree to indemnify and hold us, including our related bodies corporate, directors, officers, employees, agents and contractors, harmless from any claim, action, demand, loss or damages made or incurred by any third party arising out of or relating to your conduct, your use of the Website, your breach of these Terms of Use, or your breach of any rights of third parties.',
        ),
    ),
    array(
        'id' => 'limitation-of-liability',
        'title' => 'Limitation of liability',
        'paragraphs' => array(
            'Subject to any condition, warranty or right implied by any statutory consumer guarantee contained in any law which cannot by law be excluded by agreement, we give no warranties and you have no other rights apart from those expressly set out in these Terms of Use.',
            'All implied conditions, warranties and rights are excluded to the fullest extent permitted by law. Where any condition, warranty or right is implied by law and cannot be excluded, our liability is limited to the fullest extent permitted by law.',
            'Subject to the preceding paragraphs, we expressly disclaim all liability to you or any other persons for any losses, damages, liabilities, claims and expenses, whether direct, indirect or consequential, arising out of or referable to the Content or this Website, or to access of this Website by you, whether in contract, tort including negligence, statute or otherwise.',
            'Nothing in these Terms of Use is intended to exclude, restrict or modify rights you may have under the Competition and Consumer Act 2010 or any other legislation which may not be excluded, restricted or modified by agreement.',
        ),
    ),
    array(
        'id' => 'termination-and-suspension',
        'title' => 'Termination and suspension',
        'paragraphs' => array(
            'We reserve the right, without notice and in our sole and absolute discretion, to change, discontinue, suspend or terminate any service or feature offered by or through this Website, in whole or in part, at any time.',
            'For example, if your server is involved in any attack on any computer system, either with or without your knowledge or complicity, that server may be blocked or its access to this Website may be shut down or restricted while the problem is being investigated or fixed.',
        ),
    ),
    array(
        'id' => 'severability',
        'title' => 'Severability',
        'paragraphs' => array(
            'If any parts of these Terms of Use are deemed unlawful, void, or for any reason unenforceable then that provision may be severed from these Terms of Use and it will not affect the validity and enforceability of the remaining provisions.',
        ),
    ),
    array(
        'id' => 'waiver',
        'title' => 'Waiver',
        'paragraphs' => array(
            'No waiver by us of our rights under these Terms of Use shall be deemed a waiver of any other term or provision and shall be limited to a single waiver limited to the specific circumstances under which such waiver was granted.',
        ),
    ),
    array(
        'id' => 'currency',
        'title' => 'Currency',
        'paragraphs' => array(
            'A reference to "$" or "dollars" throughout this Website is a reference to Australian currency, unless stated otherwise.',
        ),
    ),
    array(
        'id' => 'applicable-law',
        'title' => 'Applicable law',
        'paragraphs' => array(
            'These Terms of Use are governed by and construed in accordance with the laws of New South Wales, Australia. You irrevocably and unconditionally consent and submit to the exclusive jurisdiction of the courts of New South Wales, Australia.',
        ),
    ),
    array(
        'id' => 'contact-reacon-group',
        'title' => 'Contact Reacon Group',
        'paragraphs' => array(
            'Like to get in touch? Call or email us now.',
            'Phone: +61 2 9122 6803',
            'Email: info@reacongroup.com',
        ),
    ),
);

$legal_hero_bg = $legal_header_bg;
$legal_hero_eyebrow = 'Legal';
$legal_hero_title = 'Terms of Use';
$legal_hero_description = 'These Website Terms of Use apply to your use of this website.';
$legal_terms_heading = 'Terms of Use';
$legal_intro_left_html = '<p>These Website Terms of Use apply to your use of this website with URL address www.reacongroup.com (the Website). This Website is operated by Reacon Group Limited ACN 625 934 974 on behalf of Connekta Holdings (referred to as we, us, our).</p><p>By using this Website you agree to accept these Terms of Use and we agree to grant you a non-exclusive, non-transferable licence to use the Website in accordance with the terms and conditions set out below.</p><p>If you do not accept these Terms of Use, you must not use this Website.</p>';
$legal_intro_right_html = '<p>We may revise these Terms of Use from time to time without notice and such revision will take effect when it is posted on this Website.</p><p>Your continued use of this Website will be regarded as your acceptance of these Terms of Use as amended.</p><p>In addition to the provisions of these Terms of Use, there may be specific and additional terms that apply to certain sections of this Website. In the event of any inconsistency between these Terms and those other provisions, the specific and additional provisions will prevail.</p>';

if ($acf_enabled) {
    $hero_bg_field = get_field('legal_hero_background');
    if (is_array($hero_bg_field) && !empty($hero_bg_field['url'])) {
        $legal_hero_bg = (string) $hero_bg_field['url'];
    } elseif (is_string($hero_bg_field) && $hero_bg_field !== '') {
        $legal_hero_bg = $hero_bg_field;
    }

    $legal_hero_eyebrow_field = trim((string) get_field('legal_hero_eyebrow'));
    $legal_hero_title_field = trim((string) get_field('legal_hero_title'));
    $legal_hero_description_field = trim((string) get_field('legal_hero_description'));
    $legal_terms_heading_field = trim((string) get_field('legal_terms_heading'));

    if ($legal_hero_eyebrow_field !== '') {
        $legal_hero_eyebrow = $legal_hero_eyebrow_field;
    }
    if ($legal_hero_title_field !== '') {
        $legal_hero_title = $legal_hero_title_field;
    }
    if ($legal_hero_description_field !== '') {
        $legal_hero_description = $legal_hero_description_field;
    }
    if ($legal_terms_heading_field !== '') {
        $legal_terms_heading = $legal_terms_heading_field;
    }

    $terms_pdf_url_field = trim((string) get_field('legal_terms_download_url'));
    if ($terms_pdf_url_field !== '') {
        $terms_pdf_url = $terms_pdf_url_field;
    }

    $legal_intro_left_field = (string) get_field('legal_intro_left');
    $legal_intro_right_field = (string) get_field('legal_intro_right');
    if (trim(wp_strip_all_tags($legal_intro_left_field)) !== '') {
        $legal_intro_left_html = $legal_intro_left_field;
    }
    if (trim(wp_strip_all_tags($legal_intro_right_field)) !== '') {
        $legal_intro_right_html = $legal_intro_right_field;
    }

    $legal_sections_field = get_field('legal_sections');
    if (is_array($legal_sections_field) && !empty($legal_sections_field)) {
        $dynamic_sections = array();

        foreach ($legal_sections_field as $row) {
            $section_id = isset($row['section_id']) ? sanitize_title((string) $row['section_id']) : '';
            $section_title = isset($row['section_title']) ? trim((string) $row['section_title']) : '';
            $section_nav_label = isset($row['nav_label']) ? trim((string) $row['nav_label']) : '';
            $section_content = isset($row['content']) ? (string) $row['content'] : '';

            if ($section_id === '') {
                $section_id = sanitize_title($section_nav_label !== '' ? $section_nav_label : $section_title);
            }
            if ($section_id === '') {
                continue;
            }
            if ($section_title === '') {
                $section_title = ucwords(str_replace('-', ' ', $section_id));
            }

            $dynamic_sections[] = array(
                'id' => $section_id,
                'title' => $section_title,
                'nav_label' => $section_nav_label !== '' ? $section_nav_label : $section_title,
                'content_html' => $section_content,
            );
        }

        if (!empty($dynamic_sections)) {
            $terms_sections = $dynamic_sections;
        }
    }
}
?>
<main id="primary" role="main">
    <section
        id="legal-hero"
        class="relative w-full p-0 md:p-2.5"
        aria-label="<?php esc_attr_e('Legal page hero', 'reacon-group'); ?>">

        <div class="reacon-legal-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
            <img
                src="<?php echo esc_url($legal_hero_bg); ?>"
                alt=""
                aria-hidden="true"
                class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
                fetchpriority="high"
                loading="eager"
                decoding="async" />

            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.35)_0%,rgba(0,10,33,0.24)_45%,rgba(0,10,33,0.35)_100%)]" aria-hidden="true"></div>

            <div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
                <p class="reacon-type-overline mb-4 text-white/85 lg:mb-5">
                    <?php echo esc_html($legal_hero_eyebrow); ?>
                </p>

                <h1 class="reacon-type-h1 max-w-[860px] text-white">
                    <?php echo esc_html($legal_hero_title); ?>
                </h1>

                <p class="reacon-type-lead mt-4 max-w-[780px] text-white/90 lg:mt-5">
                    <?php echo esc_html($legal_hero_description); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#f5f5f5] py-10 sm:py-12 lg:py-14" aria-labelledby="terms-of-use-heading">
        <div class="mx-auto w-full max-w-[1320px] px-5 sm:px-6 lg:px-10">
            <div class="flex flex-col gap-8 lg:gap-10">
                <div class="flex flex-col gap-5 border-b border-black/8 pb-8 sm:flex-row sm:items-start sm:justify-between sm:gap-8 lg:pb-10">
                    <div class="max-w-[820px]">
                        <h2 id="terms-of-use-heading" class="reacon-type-h2 text-foreground">
                            <?php echo esc_html($legal_terms_heading); ?>
                        </h2>
                    </div>
                    <a
                        href="<?php echo esc_url($terms_pdf_url); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group inline-flex w-fit shrink-0 items-center gap-2 self-start rounded-xl border border-black/10 bg-white px-4 py-2.5 transition-colors hover:border-primary/60 hover:text-primary">
                        <span aria-hidden="true" class="text-[#383B43] transition-colors group-hover:text-primary">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3V14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                <path d="M8.5 10.5L12 14L15.5 10.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 16.5V18.5C5 19.3284 5.67157 20 6.5 20H17.5C18.3284 20 19 19.3284 19 18.5V16.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="reacon-type-caption text-muted-foreground transition-colors group-hover:text-primary">
                            <?php echo esc_html__('Download', 'reacon-group'); ?>
                        </span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">
                    <div class="reacon-legal-wysiwyg">
                        <?php echo wp_kses_post($legal_intro_left_html); ?>
                    </div>
                    <div class="reacon-legal-wysiwyg">
                        <?php echo wp_kses_post($legal_intro_right_html); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f5f5f5] pb-14 sm:pb-16 lg:pb-20" aria-label="<?php esc_attr_e('Terms details', 'reacon-group'); ?>">
        <div class="mx-auto w-full max-w-[1320px] px-5 sm:px-6 lg:px-10">
            <div id="legal-terms-layout" class="grid grid-cols-1 gap-7 lg:grid-cols-[340px_minmax(0,1fr)] lg:items-start lg:gap-12">
                <aside id="legal-terms-sidebar" class="lg:self-start" aria-label="<?php esc_attr_e('Terms navigation', 'reacon-group'); ?>">
                    <nav class="overflow-x-auto rounded-2xl border border-black/6 bg-[#efefef] p-4 sm:p-5" aria-label="<?php esc_attr_e('Legal tabs', 'reacon-group'); ?>">
                        <ul class="flex min-w-max flex-row gap-2 pr-2 lg:min-w-0 lg:flex-col lg:gap-1.5 lg:pr-0">
                            <?php foreach ($terms_sections as $index => $section): ?>
                                <li class="shrink-0 lg:shrink">
                                    <a
                                        href="#<?php echo esc_attr($section['id']); ?>"
                                        class="reacon-legal-tab reacon-type-body block rounded-xl px-4 py-3 text-[#262626] transition-colors hover:bg-white hover:text-primary <?php echo 0 === $index ? 'is-active bg-white text-primary shadow-sm' : ''; ?>">
                                        <?php echo esc_html(isset($section['nav_label']) ? $section['nav_label'] : $section['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </aside>

                <div class="space-y-10 sm:space-y-12">
                    <?php foreach ($terms_sections as $section): ?>
                        <article id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-28 rounded-2xl border border-black/6 bg-white p-6 shadow-[0_1px_4px_rgba(0,0,0,0.04)] sm:p-8 lg:p-10">
                            <h3 class="reacon-type-h2 text-foreground">
                                <?php echo esc_html($section['title']); ?>
                            </h3>
                            <div class="reacon-legal-wysiwyg mt-4">
                                <?php if (isset($section['content_html'])): ?>
                                    <?php echo wp_kses_post((string) $section['content_html']); ?>
                                <?php else: ?>
                                    <?php foreach ($section['paragraphs'] as $paragraph): ?>
                                        <p class="reacon-type-body text-foreground">
                                            <?php echo esc_html($paragraph); ?>
                                        </p>
                                    <?php endforeach; ?>

                                    <?php if (!empty($section['bullets']) && is_array($section['bullets'])): ?>
                                        <ul class="space-y-2 border-l-2 border-primary/20 pl-4">
                                            <?php foreach ($section['bullets'] as $bullet): ?>
                                                <li class="reacon-type-body text-foreground">
                                                    <?php echo esc_html($bullet); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    :root {
        --legal-sticky-top: 112px;
    }

    .reacon-legal-wysiwyg>*+* {
        margin-top: 1.25rem;
    }

    .reacon-legal-wysiwyg p,
    .reacon-legal-wysiwyg li {
        font-family: var(--font-sans);
        font-size: var(--reacon-text-body-size);
        font-weight: 400;
        line-height: var(--reacon-text-body-line-height);
        color: var(--foreground);
    }

    .reacon-legal-wysiwyg ul,
    .reacon-legal-wysiwyg ol {
        margin: 1.25rem 0 0;
        padding-left: 1.25rem;
    }

    .reacon-legal-wysiwyg ul {
        list-style: disc;
    }

    .reacon-legal-wysiwyg ol {
        list-style: decimal;
    }

    .reacon-legal-wysiwyg a {
        color: var(--primary);
        text-decoration: underline;
    }

    @media (min-width: 1024px) {
        #legal-terms-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: var(--legal-sticky-top);
        }
    }

    @media (min-width: 1024px) {
        #masthead #site-navigation>ul {
            position: relative;
            box-shadow: 0 0 0 2px #fff;
            outline: 2px solid #fff;
            outline-offset: 0;
        }

        #masthead.top-0 #site-navigation>ul {
            box-shadow: 0 0 0 2px #fff, 0 10px 22px rgba(0, 0, 0, 0.16);
        }

        #legal-hero .reacon-legal-hero-card {
            --hero-notch-width: clamp(560px, 48vw, 720px);
            --hero-notch-radius: 40px;
            --hero-notch-height: 86px;
            --hero-notch-swoop: 40px;
        }

        #legal-hero .reacon-legal-hero-card::before {
            content: "";
            position: absolute;
            left: 50%;
            top: -1px;
            transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
            width: calc(var(--hero-notch-width) + 2px);
            height: calc(var(--hero-notch-height) + 1px);
            background: #fff;
            border-bottom-left-radius: var(--hero-notch-radius);
            border-bottom-right-radius: var(--hero-notch-radius);
            margin-left: -1px;
            box-shadow: 0 0 0 2px #fff;
            z-index: 3;
            pointer-events: none;
        }

        #legal-hero .reacon-legal-hero-card::after {
            content: "";
            position: absolute;
            top: -1px;
            left: 50%;
            transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
            width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2) + 2px);
            height: calc(var(--hero-notch-swoop) + 1px);
            background:
                radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
                radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
            margin-left: -1px;
            filter: drop-shadow(0 0 1px #fff) drop-shadow(0 0 1px #fff);
            z-index: 4;
            pointer-events: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const syncLegalStickyTopOffset = () => {
            const root = document.documentElement;
            const masthead = document.getElementById('masthead');
            const adminBar = document.getElementById('wpadminbar');

            const mastheadHeight = masthead ? Math.round(masthead.getBoundingClientRect().height) : 88;
            const adminBarHeight = adminBar ? Math.round(adminBar.getBoundingClientRect().height) : 0;
            const stickyTop = adminBarHeight + mastheadHeight + 20;

            root.style.setProperty('--legal-sticky-top', `${stickyTop}px`);
        };

        const syncLegalHeroNotchToDesktopMenu = () => {
            const heroCard = document.querySelector('#legal-hero .reacon-legal-hero-card');
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

        let legalNotchSyncRaf = null;
        const scheduleLegalNotchSync = () => {
            if (legalNotchSyncRaf) {
                cancelAnimationFrame(legalNotchSyncRaf);
            }
            syncLegalStickyTopOffset();
            legalNotchSyncRaf = requestAnimationFrame(syncLegalHeroNotchToDesktopMenu);
        };

        scheduleLegalNotchSync();
        window.addEventListener('resize', scheduleLegalNotchSync);
        window.addEventListener('load', scheduleLegalNotchSync);
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(scheduleLegalNotchSync).catch(() => {});
        }

        const tabLinks = Array.from(document.querySelectorAll('.reacon-legal-tab'));
        const sections = tabLinks
            .map((tab) => document.querySelector(tab.getAttribute('href')))
            .filter(Boolean);

        if (!tabLinks.length || !sections.length) return;

        const setActiveTab = (activeId) => {
            tabLinks.forEach((tab) => {
                const isActive = tab.getAttribute('href') === `#${activeId}`;
                tab.classList.toggle('is-active', isActive);
                tab.classList.toggle('bg-white', isActive);
                tab.classList.toggle('text-primary', isActive);
                tab.classList.toggle('shadow-sm', isActive);
            });
        };

        tabLinks.forEach((tab) => {
            tab.addEventListener('click', (event) => {
                event.preventDefault();
                const id = tab.getAttribute('href').replace('#', '');
                const target = document.getElementById(id);
                if (!target) return;

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                history.replaceState(null, '', `#${id}`);
                setActiveTab(id);
            });
        });

        const observer = new IntersectionObserver(
            (entries) => {
                const visible = entries
                    .filter((entry) => entry.isIntersecting)
                    .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

                if (visible.length) {
                    setActiveTab(visible[0].target.id);
                }
            }, {
                rootMargin: '-25% 0px -60% 0px',
                threshold: [0.2, 0.45, 0.65],
            }
        );

        sections.forEach((section) => observer.observe(section));

        if (window.location.hash) {
            const hashTarget = document.querySelector(window.location.hash);
            if (hashTarget) {
                setTimeout(() => {
                    hashTarget.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 80);
            }
        }
    });
</script>

<?php get_footer(); ?>