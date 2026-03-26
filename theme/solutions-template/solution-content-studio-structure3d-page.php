<?php

/**
 * Template Name: Solution — Content Studio Structure 3D
 * Template Post Type: page, solution
 *
 * Placeholder layout for Content Studio Structure 3D solution pages. Assign this template in
 * Page Attributes (or the template panel on your `solution` CPT). If the CPT slug
 * registered by your plugin is not `solution`, update `Template Post Type` below.
 *
 * @package reacon-group
 */
get_header();

$solution_structure_hero_bg = get_template_directory_uri() . '/public/solutions/structure3d-hero-subtract.png';
$visual_capability_video_img = get_template_directory_uri() . '/public/solutions/capability-video.png';
$visual_capability_digital_img = get_template_directory_uri() . '/public/solutions/capability-digital.png';
$visual_capability_structure_img = get_template_directory_uri() . '/public/solutions/capability-visual.png';
?>
<main id="primary" class="overflow-x-hidden bg-background" role="main">
	<!-- Structure (3D) Hero Section -->
	<section
		id="solution-structure-hero"
		class="relative w-full p-4 sm:p-5 lg:p-6"
		aria-label="<?php esc_attr_e('Structure (3D) hero', 'reacon-group'); ?>">
		<div
			class="relative flex min-h-[360px] w-full flex-col overflow-hidden rounded-[31px] bg-foreground sm:min-h-[430px] lg:min-h-[560px]">
			<img
				src="<?php echo esc_url($solution_structure_hero_bg); ?>"
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
						<?php esc_html_e('Structure (3D)', 'reacon-group'); ?>
					</h1>

					<p class="mt-5 max-w-[760px] font-sans text-[16px] leading-[22.72px] text-white/80">
						<?php esc_html_e('We create immersive physical experiences—from retail displays and window concepts to pop-ups and fit-outs—designed to elevate brand presence and captivate customers in real-world spaces.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Structure (3D) Hero Section -->
	<!-- Structure (3D) Design Services Section: 6-block service layout (Figma 570:5576). -->
	<?php
    $structure3d_services = array(
        array(
            'title' => __('Structural (3D) Design Services', 'reacon-group'),
            'para1' => __('We design immersive physical experiences that bring your brand to life—from point-of-sale displays and pop-up stores to window installations and full retail fit-outs. Our multidisciplinary team blends spatial creativity with retail strategy to deliver environments that engage, inspire, and convert.', 'reacon-group'),
            'para2' => __('Whether you’re launching a new space or elevating an existing one, we ensure every touchpoint reflects your brand and captivates customers in real-world settings.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-5.png',
            'img_alt' => __('Structural (3D) design services visual', 'reacon-group'),
            'swap' => false,  // image on the right on desktop.
        ),
        array(
            'title' => __('3D Structural Design', 'reacon-group'),
            'para1' => __('Our team creates innovative 3D point-of-sale and in-store display designs that seamlessly integrate form and function. Each structure is engineered to draw attention, showcase product value, and enhance the shopping experience.', 'reacon-group'),
            'para2' => __('From concept to production, we craft both permanent and semi-permanent fixtures that reflect your brand identity and deliver lasting visual impact.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-6.png',
            'img_alt' => __('3D structural design visual', 'reacon-group'),
            'swap' => true,  // image on the left on desktop.
        ),
        array(
            'title' => __('Window Displays', 'reacon-group'),
            'para1' => __('We develop visually arresting window displays that transform retail exteriors into storytelling canvases. By combining strong creative concepts with spatial awareness, we capture the attention of passersby and invite them into your space.', 'reacon-group'),
            'para2' => __('Working closely with your brand, our designers bring seasonal, campaign, and thematic stories to life—creating unforgettable first impressions.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-7.png',
            'img_alt' => __('Window displays visual', 'reacon-group'),
            'swap' => false,  // image on the right on desktop.
        ),
        array(
            'title' => __('Branded Merchandise Ideas', 'reacon-group'),
            'para1' => __('Our team conceptualizes and develops branded merchandise that extends your identity beyond the store. From functional products to collector-worthy items, we ensure each piece is purposeful, memorable, and brand-consistent.', 'reacon-group'),
            'para2' => __('Whether used for giveaways, retail, or experiential campaigns, our creative ideas help turn customers into advocates.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-8.png',
            'img_alt' => __('Branded merchandise ideas visual', 'reacon-group'),
            'swap' => true,  // image on the left on desktop.
        ),
        array(
            'title' => __('Pop-Up Stores', 'reacon-group'),
            'para1' => __('We design temporary retail spaces that deliver high-impact brand experiences in a short timeframe. From modular structures to fully customized activations, our pop-up concepts are built to drive buzz, trial, and engagement.', 'reacon-group'),
            'para2' => __('Every pop-up is tailored to your campaign goals—merging creativity, agility, and spatial storytelling to create immersive customer interactions.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-9.png',
            'img_alt' => __('Pop-up stores visual', 'reacon-group'),
            'swap' => false,  // image on the right on desktop.
        ),
        array(
            'title' => __('Retail Fit-Outs', 'reacon-group'),
            'para1' => __('We offer full-service retail fit-out solutions—from layout planning and material selection to custom fixture design and finishes. Our approach ensures each space is optimized for flow, brand consistency, and customer satisfaction.', 'reacon-group'),
            'para2' => __('Whether it’s a flagship store or a franchise rollout, we build retail environments that are both functional and emotionally engaging.', 'reacon-group'),
            'image' => get_template_directory_uri() . '/public/solutions/structure3d-rect-10.png',
            'img_alt' => __('Retail fit-outs visual', 'reacon-group'),
            'swap' => true,  // image on the left on desktop.
        ),
    );
    ?>

	<section
		id="solution-structure-services"
		class="bg-white py-12 sm:py-16 lg:py-24"
		aria-label="<?php esc_attr_e('Structure services', 'reacon-group'); ?>">
		<?php foreach ($structure3d_services as $i => $service): ?>
			<?php $is_first = 0 === $i; ?>
			<article
				class="mx-auto flex w-full max-w-[1370px] flex-col items-center gap-[24px] px-5 py-[60px] sm:px-6 lg:flex-row lg:gap-[62px] lg:px-10 lg:py-16 <?php echo !empty($service['swap']) ? 'lg:flex-row-reverse' : 'lg:flex-row'; ?>">
				<div class="flex w-full flex-col gap-[20px] lg:max-w-[620px] lg:flex-1">
					<?php if ($is_first): ?>
						<h2 class="font-display text-[44px] font-bold leading-tight text-foreground sm:text-[44px]">
							<?php echo esc_html($service['title']); ?>
						</h2>
					<?php else: ?>
						<h3 class="font-display text-[44px] font-bold leading-tight text-foreground sm:text-[44px]">
							<?php echo esc_html($service['title']); ?>
						</h3>
					<?php endif; ?>

					<p class="mt-2 font-sans text-[16px] leading-[22.72px] text-foreground/80">
						<?php echo esc_html($service['para1']); ?>
					</p>
					<p class="font-sans text-[16px] leading-[22.72px] text-foreground/80">
						<?php echo esc_html($service['para2']); ?>
					</p>
				</div>

				<div class="relative h-[260px] w-full overflow-hidden rounded-[24px] bg-muted sm:h-[320px] lg:h-[420px] lg:w-[688px] shrink-0">
					<img
						src="<?php echo esc_url($service['image']); ?>"
						alt="<?php echo esc_attr($service['img_alt']); ?>"
						class="absolute inset-0 h-full w-full object-cover"
						loading="lazy"
						decoding="async" />
				</div>
			</article>
		<?php endforeach; ?>
	</section>
	<!-- End Structure (3D) Design Services Section -->

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