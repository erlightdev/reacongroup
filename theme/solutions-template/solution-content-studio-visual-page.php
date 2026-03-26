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
$visual_capability_video_img = get_template_directory_uri() . '/public/solutions/capability-video.png';
$visual_capability_digital_img = get_template_directory_uri() . '/public/solutions/capability-digital.png';
$visual_capability_structure_img = get_template_directory_uri() . '/public/solutions/capability-visual.png';
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
<!-- End Page Header -->
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
	<!-- Major Section: Core Capabilities -->
	<section id="solution-visual-core-capabilities" class="bg-background pb-12 pt-8 sm:pb-16 sm:pt-10 lg:pb-24 lg:pt-14 xl:pb-28 xl:pt-16 2xl:pb-16 2xl:pt-10" aria-label="<?php esc_attr_e('Our core creative capabilities', 'reacon-group'); ?>">
		<div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
			<header class="mx-auto max-w-[1020px] text-center">
				<h2 class="font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[36px] md:text-[40px] lg:text-[44px] lg:leading-[58.08px]">
					<?php esc_html_e('Our Core Creative Capabilities', 'reacon-group'); ?>
				</h2>
				<p class="mx-auto mt-4 max-w-[980px] font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
					<?php esc_html_e('Expert content creation across visual, video, digital, and structural formats.', 'reacon-group'); ?>
				</p>
			</header>

			<div class="mt-8 grid grid-cols-1 gap-6 sm:mt-10 md:grid-cols-2 lg:mt-14 lg:grid-cols-3">
				<article class="overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card p-1">
					<div class="relative overflow-hidden rounded-t-[32px] rounded-b-[16px] bg-muted">
						<img
							src="<?php echo esc_url($visual_capability_video_img); ?>"
							alt="<?php esc_attr_e('Video production capability', 'reacon-group'); ?>"
							class="h-[220px] w-full object-cover sm:h-[240px] lg:h-[260px]"
							loading="lazy"
							decoding="async" />
					</div>
					<div class="px-5 pb-5 pt-3">
						<h3 class="font-display text-[22px] font-semibold leading-[1.32] text-foreground sm:text-[24px] sm:leading-[31.68px]">
							<?php esc_html_e('Video', 'reacon-group'); ?>
						</h3>
						<p class="mt-2 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<?php esc_html_e('Purpose-built video content created for scale optimized for speed, clarity, and multi-channel delivery.', 'reacon-group'); ?>
						</p>
					</div>
				</article>

				<article class="overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card p-1">
					<div class="relative overflow-hidden rounded-t-[32px] rounded-b-[16px] bg-muted">
						<img
							src="<?php echo esc_url($visual_capability_digital_img); ?>"
							alt="<?php esc_attr_e('Digital creative capability', 'reacon-group'); ?>"
							class="h-[220px] w-full object-cover sm:h-[240px] lg:h-[260px]"
							loading="lazy"
							decoding="async" />
					</div>
					<div class="px-5 pb-5 pt-3">
						<h3 class="font-display text-[22px] font-semibold leading-[1.32] text-foreground sm:text-[24px] sm:leading-[31.68px]">
							<?php esc_html_e('Digital', 'reacon-group'); ?>
						</h3>
						<p class="mt-2 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<?php esc_html_e('Digital-first creative built for performance across platforms, devices, and user journeys.', 'reacon-group'); ?>
						</p>
					</div>
				</article>

				<article class="overflow-hidden rounded-[32px] border border-[#ECEFF2] bg-card p-1 md:col-span-2 lg:col-span-1">
					<div class="relative overflow-hidden rounded-t-[32px] rounded-b-[16px] bg-muted">
						<img
							src="<?php echo esc_url($visual_capability_structure_img); ?>"
							alt="<?php esc_attr_e('Structure 3D capability', 'reacon-group'); ?>"
							class="h-[220px] w-full object-cover sm:h-[240px] lg:h-[260px]"
							loading="lazy"
							decoding="async" />
					</div>
					<div class="px-5 pb-5 pt-3">
						<h3 class="font-display text-[22px] font-semibold leading-[1.32] text-foreground sm:text-[24px] sm:leading-[31.68px]">
							<?php esc_html_e('Structure (3D)', 'reacon-group'); ?>
						</h3>
						<p class="mt-2 font-sans text-[16px] font-normal leading-[22.72px] text-foreground">
							<?php esc_html_e('Three-dimensional creative that brings brands to life in physical and experiential environments.', 'reacon-group'); ?>
						</p>
					</div>
				</article>
			</div>
		</div>
	</section>
	<!-- End Major Section: Core Capabilities -->

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
			<div class="mx-auto w-full max-w-[1370px] px-5 sm:px-6 lg:px-10">
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

        <!-- Faq Section -->
        <?php get_template_part('template-parts/components/component', 'faq'); ?>
        <!-- End Faq Section -->

</main>
<?php get_footer(); ?>
