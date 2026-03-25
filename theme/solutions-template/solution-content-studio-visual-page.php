<?php

/**
 * Template Name: Solution — Content Studio Visual
 * Template Post Type: page, solution
 *
 * Placeholder layout for Content Studio Visual solution pages. Assign this template in
 * Page Attributes (or the template panel on your `solution` CPT). If the CPT slug
 * registered by your plugin is not `solution`, update `Template Post Type` below.
 *
 * @package reacon-group
 */
get_header();

$solution_hero_bg = get_template_directory_uri() . '/public/solutions/visual-hero-subtract.png';
$visual_pre_production_img = get_template_directory_uri() . '/public/solutions/visual-preproduction-base.png';
$visual_post_production_img = get_template_directory_uri() . '/public/solutions/visual-postproduction-base.png';
$visual_copy_img = get_template_directory_uri() . '/public/solutions/visual-copy-image.png';
?>

<main id="primary" class="overflow-x-hidden bg-background" role="main">
<!-- Page Header -->
	<!-- Visual Hero Section -->
	<section
		id="solution-visual-hero"
		class="relative w-full p-4 sm:p-5 lg:p-6"
		aria-label="<?php esc_attr_e('Visual hero', 'reacon-group'); ?>">
		<div
			class="relative flex  w-full flex-col overflow-hidden rounded-[31px] bg-foreground ">
			<img
				src="<?php echo esc_url($solution_hero_bg); ?>"
				alt=""
				aria-hidden="true"
				class="absolute inset-0 h-full w-full object-cover object-center"
				loading="eager"
				decoding="async" />

			<!-- Dark overlay to keep typography readable over the image -->
			<div
				class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,0,0,0.55)_0%,rgba(0,0,0,0.25)_55%,rgba(0,0,0,0.55)_100%)]"
				aria-hidden="true"></div>

			<div class="relative z-10 mx-auto flex w-full flex-1 flex-col items-center justify-center px-5 py-24 text-center sm:px-6 lg:px-10">
				<div class="flex max-w-[900px] flex-col items-center">
					<p class="w-full font-sans text-[14px] font-normal leading-[22.72px] text-white/80 sm:text-[16px]">
						<?php esc_html_e('Creative Capabilities', 'reacon-group'); ?>
					</p>

					<h1 class="mt-3 font-display text-[40px] font-semibold leading-tight text-white sm:text-[48px] lg:text-[56px]">
						<?php esc_html_e('Visual', 'reacon-group'); ?>
					</h1>

					<p class="mt-5 max-w-[820px] font-sans text-[16px] leading-[22.72px] text-white/80">
						<?php esc_html_e('We craft compelling visual content—from design and photography to artwork adaptation—ensuring brand consistency across every touchpoint.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Visual Hero Section -->

    <!-- Content Section -->
	<section id="solution-visual-content" class="bg-background py-8 sm:py-12 lg:py-16 xl:py-20 2xl:py-20" aria-label="<?php esc_attr_e('Visual studio service details', 'reacon-group'); ?>">
		<div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
			<!-- Major Section: Pre-Production and Photography -->
			<article class="py-8 sm:py-10 lg:py-16">
				<div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-[62px]">
					<div class="lg:col-span-5 xl:col-span-5">
						<header class="space-y-5 text-foreground">
							<h2 class="font-display text-[32px] font-bold leading-tight sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
								<?php esc_html_e('Pre-Production & Photography', 'reacon-group'); ?>
							</h2>
						</header>
						<div class="mt-5 space-y-3 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<p>
								<?php esc_html_e('Our pre-production and photography team ensures every shoot is strategically planned and flawlessly executed. From creative direction to on-site logistics, we manage each detail to align with your brand objectives and campaign goals. With expertise in location scouting, studio setup, styling, lighting design, and talent coordination, we create the foundation for high-quality, consistent visual storytelling.', 'reacon-group'); ?>
							</p>
							<p>
								<?php esc_html_e('We tailor each shoot to meet the unique demands of your content—be it lifestyle imagery, product showcases, or hero visuals. Every element is thoughtfully curated to enhance visual appeal while supporting multi-channel delivery. Our approach blends technical precision with creative intent, ensuring each capture is both beautiful and purposeful.', 'reacon-group'); ?>
							</p>
						</div>
					</div>
					<div class="lg:col-span-7 xl:col-span-7">
						<div class="relative overflow-hidden rounded-[24px] bg-muted">
							<img
								src="<?php echo esc_url($visual_pre_production_img); ?>"
								alt="<?php esc_attr_e('Pre-production and photography process', 'reacon-group'); ?>"
								class="h-auto w-full object-cover"
								loading="lazy"
								decoding="async" />
						</div>
					</div>
				</div>
			</article>
			<!-- End Major Section: Pre-Production and Photography -->

			<!-- Major Section: Post Production and Retouching -->
			<article class="py-8 sm:py-10 lg:py-16">
				<div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-[62px]">
					<div class="order-2 lg:order-1 lg:col-span-7 xl:col-span-7">
						<div class="relative overflow-hidden rounded-[24px] bg-muted">
							<img
								src="<?php echo esc_url($visual_post_production_img); ?>"
								alt="<?php esc_attr_e('Post production and retouching process', 'reacon-group'); ?>"
								class="h-auto w-full object-cover"
								loading="lazy"
								decoding="async" />
						</div>
					</div>
					<div class="order-1 lg:order-2 lg:col-span-5 xl:col-span-5">
						<header class="space-y-5 text-foreground">
							<h2 class="font-display text-[32px] font-bold leading-tight sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
								<?php esc_html_e('Post Production & Retouching', 'reacon-group'); ?>
							</h2>
						</header>
						<div class="mt-5 space-y-3 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<p>
								<?php esc_html_e('Our post-production team brings creative precision to every image, transforming raw visuals into polished, high-impact assets. With a deep understanding of brand aesthetics and channel requirements, we enhance imagery to meet the highest standards of visual quality. We apply advanced retouching techniques to refine product details, balance lighting, and ensure every element is sharp, clean, and brand-aligned. From subtle touch-ups to complex compositing, our team ensures consistency across every visual asset.', 'reacon-group'); ?>
							</p>
							<p>
								<?php esc_html_e('Color correction and grading are tailored to match brand tones and ensure a cohesive look across campaigns and formats. Whether for print, digital, or retail, we optimize each image for its final destination—maximizing clarity, vibrancy, and resolution. The result is production-ready content that elevates your brand presence across all channels. With an eye for detail and technical excellence, we deliver visuals that perform as beautifully as they look.', 'reacon-group'); ?>
							</p>
						</div>
					</div>
				</div>
			</article>
			<!-- End Major Section: Post Production and Retouching -->

			<!-- Major Section: Copy -->
			<article class="py-8 sm:py-10 lg:py-16">
				<div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-[62px]">
					<div class="lg:col-span-5 xl:col-span-5">
						<header class="space-y-5 text-foreground">
							<h2 class="font-display text-[32px] font-bold leading-tight sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
								<?php esc_html_e('Copy', 'reacon-group'); ?>
							</h2>
						</header>
						<div class="mt-5 space-y-3 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<p>
								<?php esc_html_e('Our copywriters craft clear, engaging content that aligns seamlessly with your brand voice and marketing objectives. From campaign headlines and product descriptions to technical copy and SEO-driven content, we adapt tone and format to suit every platform—digital, print, and beyond. Working closely with design and strategy teams, we ensure every message enhances the overall creative execution.', 'reacon-group'); ?>
							</p>
							<p>
								<?php esc_html_e('To support global reach, we partner with trusted localization experts to deliver accurate, culturally relevant translations in over 38 languages. Whether you are speaking to local markets or international audiences, our copy ensures consistency, clarity, and impact across all communication channels.', 'reacon-group'); ?>
							</p>
						</div>
					</div>
					<div class="lg:col-span-7 xl:col-span-7">
						<div class="relative overflow-hidden rounded-[24px] bg-muted">
							<img
								src="<?php echo esc_url($visual_copy_img); ?>"
								alt="<?php esc_attr_e('Creative copy and localization process', 'reacon-group'); ?>"
								class="h-auto w-full object-cover"
								loading="lazy"
								decoding="async" />
						</div>
					</div>
				</div>
			</article>
			<!-- End Major Section: Copy -->
		</div>
	</section>
    <!-- End Content Section -->
<!-- End Page Header -->


</main>
<?php get_footer(); ?>
