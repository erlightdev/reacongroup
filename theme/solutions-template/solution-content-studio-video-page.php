<?php

/**
 * Template Name: Solution — Content Studio Video
 * Template Post Type: page, solution
 *
 * Placeholder layout for Content Studio Video solution pages. Assign this template in
 * Page Attributes (or the template panel on your `solution` CPT). If the CPT slug
 * registered by your plugin is not `solution`, update `Template Post Type` below.
 *
 * @package reacon-group
 */
get_header();

$solution_video_hero_bg = get_template_directory_uri() . '/public/solutions/video-hero-subtract.png';
$visual_capability_video_img = get_template_directory_uri() . '/public/solutions/capability-video.png';
$visual_capability_digital_img = get_template_directory_uri() . '/public/solutions/capability-digital.png';
$visual_capability_structure_img = get_template_directory_uri() . '/public/solutions/capability-visual.png';
?>

<main id="primary" class="overflow-x-hidden bg-background" role="main">
	<!-- Video Hero Section -->
	<section
		id="solution-video-hero"
		class="relative w-full p-4 sm:p-5 lg:p-6"
		aria-label="<?php esc_attr_e('Video hero', 'reacon-group'); ?>">
		<div
			class="relative flex min-h-[360px] w-full flex-col overflow-hidden rounded-[31px] bg-foreground bg-cover bg-center">
			<img
				src="<?php echo esc_url($solution_video_hero_bg); ?>"
				alt=""
				aria-hidden="true"
				class="absolute inset-0 h-full w-full object-cover object-center"
				loading="eager"
				decoding="async"
				fetchpriority="high" />

			<!-- Dark overlay to keep typography readable over the image -->
			<div
				class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,0,0,0.55)_0%,rgba(0,0,0,0.25)_55%,rgba(0,0,0,0.55)_100%)]"
				aria-hidden="true"></div>

			<div
				class="relative z-10 mx-auto flex w-full flex-1 flex-col items-center justify-center px-5 py-14 text-center sm:px-6 lg:px-10">
				<div class="flex max-w-[900px] flex-col items-center">
					<p class="w-full font-sans text-[14px] font-normal leading-[22.72px] text-white/80 sm:text-[16px]">
						<?php esc_html_e('Creative Capabilitie', 'reacon-group'); ?>
					</p>
					<h1 class="mt-3 font-display text-[40px] font-semibold leading-tight text-white sm:text-[48px] lg:text-[56px]">
						<?php esc_html_e('Video', 'reacon-group'); ?>
					</h1>
					<p class="mt-5 max-w-[638px] font-sans text-[16px] leading-[22.72px] text-white/80">
						<?php esc_html_e('We create impactful video content—from live-action and animation to motion graphics—bringing brand stories to life across every channel and format.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Video Hero Section -->

	<!-- Video Content Section: Video & CGI / Production / Dynamic Content / Rendering / Animation / VFX (Figma 570:5265). -->
	<?php
	$solution_video_content_blocks = array(
		array(
			'title' => __('Video & CGI', 'reacon-group'),
			'paragraphs' => array(
				__('We specialize in crafting immersive, visually striking content using a seamless blend of live-action video and cutting-edge CGI. Our team of expert creatives transforms brand ideas into captivating visual stories, leveraging advanced software and cinematic techniques to engage and inspire.', 'reacon-group'),
				__('Whether for a promotional campaign, product showcase, or high-impact explainer, we ensure every visual element aligns with your brand’s message. With full-service production support and CGI integration, we bring complexity and imagination to life in a way that feels both polished and purposeful.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/video-cgi-rect-1.png',
			'swap' => false,
		),
		array(
			'title' => __('Video Production', 'reacon-group'),
			'paragraphs' => array(
				__('Every video we produce begins with a deep understanding of your brand, story, and audience. From scripting and storyboarding to filming and direction, we manage the entire production process to ensure authenticity, precision, and creative integrity.', 'reacon-group'),
				__('During post-production, we refine every detail—editing footage, designing soundscapes, applying motion graphics, and enhancing with color grading. The result is a cohesive, high-quality video that communicates your message with clarity and emotional impact.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/video-production-rect-2.png',
			'swap' => true,
		),
		array(
			'title' => __('Dynamic Video Content', 'reacon-group'),
			'paragraphs' => array(
				__('We help brands deliver personalized video experiences using dynamic, data-driven content. By layering CRM data into your creative assets, we tailor each message to individual recipients—boosting relevance, engagement, and conversion.', 'reacon-group'),
				__('Our rules-based personalization approach ensures accuracy and scale, allowing you to deliver targeted content for specific moments, audiences, or campaigns. The result is smarter storytelling that resonates personally across email, web, and social platforms.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/dynamic-video-rect-3.png',
			'swap' => false,
		),
		array(
			'title' => __('2D/3D Rendering', 'reacon-group'),
			'paragraphs' => array(
				__('Our rendering services transform concepts into photo-realistic 2D and 3D visuals that bring your designs to life. Whether you’re showcasing a product, space, or architectural idea, we deliver refined visuals that reflect accuracy, detail, and creative excellence.', 'reacon-group'),
				__('From packaging and retail displays to interior layouts and industrial designs, our renderings help clients visualize outcomes clearly before production. These assets are ideal for approvals, promotions, and immersive customer presentations.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/rendering-rect-4.png',
			'swap' => true,
		),
		array(
			'title' => __('Animation', 'reacon-group'),
			'paragraphs' => array(
				__('We create captivating 2D and 3D animations that simplify complex ideas and strengthen audience connection. With a focus on storytelling and visual clarity, our animations are designed to educate, engage, and drive action.', 'reacon-group'),
				__('Perfect for explainer videos, product demos, or brand storytelling, our animation team works closely with you to ensure each movement supports the message—resulting in content that’s not only eye-catching, but strategically effective.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/animation-rect-5.png',
			'swap' => false,
		),
		array(
			'title' => __('VFX', 'reacon-group'),
			'paragraphs' => array(
				__('Our visual effects capabilities allow you to push creative boundaries while staying efficient. Using CGI and compositing, we enhance live-action footage with cinematic realism, dynamic environments, and striking visual enhancements.', 'reacon-group'),
				__('Ideal for reducing shoot complexity and elevating production value, our VFX services bring your concepts to life with detail and precision—ensuring your final video looks stunning without compromising budget or quality.', 'reacon-group'),
			),
			'image' => get_template_directory_uri() . '/public/solutions/vfx-rect-6.png',
			'swap' => true,
		),
	);
	?>

	<section
		id="solution-video-content"
		class="bg-white"
		aria-labelledby="solution-video-content-heading">
		<h2
			id="solution-video-content-heading"
			class="sr-only">
			<?php esc_html_e('Video capabilities', 'reacon-group'); ?>
		</h2>

		<?php foreach ($solution_video_content_blocks as $block): ?>
			<?php
			$swap = !empty($block['swap']);
			?>
			<article
				class="mx-auto flex w-full max-w-[1370px] flex-col gap-[24px] px-5 py-10 sm:px-6 lg:flex-row lg:gap-[62px] lg:px-10 lg:py-16">
				<?php if ($swap): ?>
					<div
						class="relative h-[260px] w-full overflow-hidden rounded-[24px] sm:h-[320px] lg:h-[420px] lg:w-[688px] shrink-0">
						<img
							src="<?php echo esc_url($block['image']); ?>"
							alt=""
							aria-hidden="true"
							class="absolute inset-0 h-full w-full object-cover pointer-events-none"
							loading="lazy"
							decoding="async" />
					</div>
				<?php endif; ?>

				<div class="flex w-full flex-col gap-[20px] lg:max-w-[620px]">
					<h3 class="font-display text-[36px] font-bold leading-tight text-foreground sm:text-[44px] sm:leading-[58.08px]">
						<?php echo esc_html($block['title']); ?>
					</h3>
					<div class="flex flex-col gap-[12px]">
						<?php foreach ($block['paragraphs'] as $p): ?>
							<p class="font-sans text-[16px] leading-[22.72px] text-foreground/80">
								<?php echo esc_html($p); ?>
							</p>
						<?php endforeach; ?>
					</div>
				</div>

				<?php if (!$swap): ?>
					<div
						class="relative h-[260px] w-full overflow-hidden rounded-[24px] sm:h-[320px] lg:h-[420px] lg:w-[688px] shrink-0">
						<img
							src="<?php echo esc_url($block['image']); ?>"
							alt=""
							aria-hidden="true"
							class="absolute inset-0 h-full w-full object-cover pointer-events-none"
							loading="lazy"
							decoding="async" />
					</div>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</section>
	<!-- End Video Content Section -->

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

<!-- Cta Section: strategic call-to-action banner (Figma 577:12234). -->
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
