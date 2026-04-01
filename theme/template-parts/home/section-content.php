<?php

$figma = get_template_directory_uri() . '/public/figma-assets';
?>

<section class="py-16 lg:pt-[60px] lg:pb-[120px]">
	<div class="max-w-[1370px] mx-auto px-4 sm:px-6">

		<!-- Section header -->
		<div class="text-center mb-16 lg:mb-[72px]">
			<h2 class="font-display font-semibold text-3xl md:text-4xl lg:text-[44px] leading-tight lg:leading-[1.32] text-foreground max-w-[996px] mx-auto mb-4">
				<?php esc_html_e('Connecting Design, Data, and Delivery to Simplify How Brands Communicate at Scale', 'reacon-group'); ?>
			</h2>
			<p class="font-sans text-sm md:text-base text-foreground leading-relaxed lg:leading-[1.42] max-w-[658px] mx-auto">
				<?php esc_html_e('Reacon combines creativity, automation, and logistics to help brands move seamlessly from concept to execution.', 'reacon-group'); ?>
			</p>
		</div>

		<!-- ── Row 1: Content Studio (text left, image right) ── -->
		<div class="flex flex-col lg:flex-row items-center justify-between gap-12 lg:gap-16 xl:gap-20 mb-24 lg:mb-[120px]">

			<!-- Text -->
			<div class="flex-1 w-full max-w-full lg:max-w-[500px] xl:max-w-[620px] flex flex-col justify-center">
				<div class="flex flex-col gap-5">
					<div class="flex flex-col gap-2 lg:gap-1">
						<div class="flex items-center gap-2">
							<span class="w-2 h-2 rounded-full bg-primary shrink-0"></span>
							<span class="font-sans text-primary text-sm md:text-base font-medium"><?php esc_html_e('Content Studio', 'reacon-group'); ?></span>
						</div>
						<h3 class="font-display text-2xl md:text-3xl lg:text-[32px] leading-tight lg:leading-[1.32] text-foreground">
							<?php esc_html_e('Where', 'reacon-group'); ?>
							<span class="font-semibold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent"><?php esc_html_e('Creative Ideas Become Brand Experiences', 'reacon-group'); ?></span>
						</h3>
					</div>
					<div class="font-sans text-sm md:text-base text-foreground leading-relaxed lg:leading-[1.42]">
						<p class="mb-4"><?php esc_html_e("Reacon's Content Studio is the creative heart of the group. We design everything your audience sees – visuals, campaigns, videos, and immersive brand stories.", 'reacon-group'); ?></p>
						<p><?php esc_html_e('By blending design, storytelling, and technology, our studio ensures that every piece of content not only looks right but feels consistent across platforms, screens, and experiences.', 'reacon-group'); ?></p>
					</div>
					<div class="flex flex-col gap-3 mt-2">
						<?php
						$cs_items = array(
							__('Brand design, campaign visuals, and video production', 'reacon-group'),
							__('Digital, print, and in-store content creation', 'reacon-group'),
							__('3D and experiential storytelling for activations', 'reacon-group'),
							__('Consistent brand expression across every channel', 'reacon-group'),
						);
						foreach ($cs_items as $item):
							?>
							<div class="flex items-start lg:items-center gap-2.5">
								<img src="<?php echo esc_url($figma . '/tick-circle-teal.svg'); ?>" alt="" class="w-4 h-4 shrink-0 mt-0.5 lg:mt-0" aria-hidden="true" />
								<span class="font-sans text-sm md:text-base text-foreground"><?php echo esc_html($item); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<a
					href="<?php echo esc_url(home_url('/solutions/')); ?>"
					class="inline-flex items-center gap-2 w-fit mt-8 rounded-full bg-primary py-2.5 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
					<?php esc_html_e('Explore Content Studio', 'reacon-group'); ?>
					<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20" aria-hidden="true">
						<i class="ph-bold ph-arrow-up-right text-[11px]"></i>
					</span>
				</a>
			</div>

			<!-- Image -->
			<div class="relative w-[85%] sm:w-[75%] lg:w-[450px] xl:w-[529px] ml-auto lg:ml-0 shrink-0">
				<div class="rounded-2xl lg:rounded-3xl overflow-hidden aspect-[529/474] w-full">
					<img src="<?php echo esc_url($figma . '/content-studio-bg.png'); ?>" alt="<?php esc_attr_e('Content Studio', 'reacon-group'); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
				<div class="absolute -left-6 sm:-left-12 lg:-left-[80px] xl:-left-[136px] -bottom-8 lg:bottom-auto lg:top-[220px] xl:top-[280px] w-[55%] lg:w-[240px] xl:w-[295px] aspect-[295/227] rounded-xl lg:rounded-3xl border-4 lg:border-[8px] border-white overflow-hidden shadow-xl">
					<img src="<?php echo esc_url($figma . '/content-studio-fg.png'); ?>" alt="" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
			</div>
		</div>

		<!-- ── Row 2: Data-Driven Innovation (image left, text right) ── -->
		<div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 lg:gap-16 xl:gap-20 mb-24 lg:mb-[120px]">

			<!-- Image -->
			<div class="relative w-[85%] sm:w-[75%] lg:w-[450px] xl:w-[529px] mr-auto lg:mr-0 shrink-0">
				<div class="rounded-2xl lg:rounded-3xl overflow-hidden aspect-[529/474] w-full">
					<img src="<?php echo esc_url($figma . '/data-driven-bg.png'); ?>" alt="<?php esc_attr_e('Data-Driven Innovation', 'reacon-group'); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
				<div class="absolute -right-6 sm:-right-12 lg:-right-[80px] xl:-right-[136px] -bottom-8 lg:bottom-auto lg:top-[220px] xl:top-[280px] w-[55%] lg:w-[240px] xl:w-[295px] aspect-[295/227] rounded-xl lg:rounded-3xl border-4 lg:border-[8px] border-white overflow-hidden shadow-xl">
					<img src="<?php echo esc_url($figma . '/data-driven-fg.png'); ?>" alt="" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
			</div>

			<!-- Text -->
			<div class="flex-1 w-full max-w-full lg:max-w-[500px] xl:max-w-[620px] flex flex-col justify-center">
				<div class="flex flex-col gap-4">
					<div class="flex flex-col gap-2 lg:gap-1">
						<div class="flex items-center gap-2">
							<span class="w-2 h-2 rounded-full bg-primary shrink-0"></span>
							<span class="font-sans text-primary text-sm md:text-base font-medium"><?php esc_html_e('Data-Driven Innovation', 'reacon-group'); ?></span>
						</div>
						<h3 class="font-display text-2xl md:text-3xl lg:text-[32px] leading-tight lg:leading-[1.32] text-foreground">
							<?php esc_html_e('Turning Information into', 'reacon-group'); ?>
							<span class="font-semibold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent"><?php esc_html_e('Intelligent Action', 'reacon-group'); ?></span>
						</h3>
					</div>
					<div class="font-sans text-sm md:text-base text-foreground leading-relaxed lg:leading-[1.42]">
						<p class="mb-4"><?php esc_html_e("Reacon's Data-Driven Innovation division helps organisations digitise workflows, unify data, and automate personalised communication.", 'reacon-group'); ?></p>
						<p><?php esc_html_e('We transform paper-based and fragmented systems into connected digital pipelines that give businesses a single view of their customers — enabling faster decisions, better compliance, and more meaningful engagement.', 'reacon-group'); ?></p>
					</div>
					<div class="flex flex-col gap-3 mt-2">
						<?php
						$dd_items = array(
							__('Digitisation of manual workflows and data sources', 'reacon-group'),
							__('Secure data collection and standardisation', 'reacon-group'),
							__('Automated, regulation-compliant communication systems', 'reacon-group'),
							__('Real-time visibility and analytics for business growth', 'reacon-group'),
						);
						foreach ($dd_items as $item):
							?>
							<div class="flex items-start lg:items-center gap-2.5">
								<img src="<?php echo esc_url($figma . '/tick-circle-teal.svg'); ?>" alt="" class="w-4 h-4 shrink-0 mt-0.5 lg:mt-0" aria-hidden="true" />
								<span class="font-sans text-sm md:text-base text-foreground"><?php echo esc_html($item); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<a
					href="<?php echo esc_url(home_url('/solutions/')); ?>"
					class="inline-flex items-center gap-2 w-fit mt-8 rounded-full bg-primary py-2.5 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
					<?php esc_html_e('Learn About Data-Driven Innovation', 'reacon-group'); ?>
					<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20" aria-hidden="true">
						<i class="ph-bold ph-arrow-up-right text-[11px]"></i>
					</span>
				</a>
			</div>
		</div>

		<!-- ── Row 3: Production & Fulfilment (text left, image right) ── -->
		<div class="flex flex-col lg:flex-row items-center justify-between gap-12 lg:gap-16 xl:gap-20">

			<!-- Text -->
			<div class="flex-1 w-full max-w-full lg:max-w-[500px] xl:max-w-[620px] flex flex-col justify-center">
				<div class="flex flex-col gap-4">
					<div class="flex flex-col gap-2 lg:gap-1">
						<div class="flex items-center gap-2">
							<span class="w-2 h-2 rounded-full bg-primary shrink-0"></span>
							<span class="font-sans text-primary text-sm md:text-base font-medium"><?php esc_html_e('Production & Fulfilment', 'reacon-group'); ?></span>
						</div>
						<h3 class="font-display text-2xl md:text-3xl lg:text-[32px] leading-tight lg:leading-[1.32] text-foreground">
							<?php esc_html_e('Turning Vision into', 'reacon-group'); ?>
							<span class="font-semibold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent"><?php esc_html_e('Tangible Impact', 'reacon-group'); ?></span>
						</h3>
					</div>
					<div class="font-sans text-sm md:text-base text-foreground leading-relaxed lg:leading-[1.42]">
						<p class="mb-4"><?php esc_html_e('From packaging to retail activations, Reacon delivers all things print at scale. Our production and fulfilment network spans 8 countries, enabling consistent, high-quality execution on time, every time.', 'reacon-group'); ?></p>
						<p><?php esc_html_e('With 30+ years of experience, advanced print technologies, and national warehousing in NSW and QLD, we help brands produce, store, and deliver faster — without compromising on quality.', 'reacon-group'); ?></p>
					</div>
					<div class="flex flex-col gap-3 mt-2">
						<?php
						$pf_items = array(
							__('Marketing, packaging, and merchandise printing', 'reacon-group'),
							__('National warehousing and inventory management', 'reacon-group'),
							__('Global print network across Asia and the Middle East', 'reacon-group'),
							__('Integrated logistics for speed and precision', 'reacon-group'),
						);
						foreach ($pf_items as $item):
							?>
							<div class="flex items-start lg:items-center gap-2.5">
								<img src="<?php echo esc_url($figma . '/tick-circle-teal.svg'); ?>" alt="" class="w-4 h-4 shrink-0 mt-0.5 lg:mt-0" aria-hidden="true" />
								<span class="font-sans text-sm md:text-base text-foreground"><?php echo esc_html($item); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<a
					href="<?php echo esc_url(home_url('/solutions/')); ?>"
					class="inline-flex items-center gap-2 w-fit mt-8 rounded-full bg-primary py-2.5 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
					<?php esc_html_e('Discover Production & Fulfilment', 'reacon-group'); ?>
					<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20" aria-hidden="true">
						<i class="ph-bold ph-arrow-up-right text-[11px]"></i>
					</span>
				</a>
			</div>

			<!-- Image -->
			<div class="relative w-[85%] sm:w-[75%] lg:w-[450px] xl:w-[529px] ml-auto lg:ml-0 shrink-0">
				<div class="rounded-2xl lg:rounded-3xl overflow-hidden aspect-[529/474] w-full">
					<img src="<?php echo esc_url($figma . '/production-bg.png'); ?>" alt="<?php esc_attr_e('Production & Fulfilment', 'reacon-group'); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
				<div class="absolute -left-6 sm:-left-12 lg:-left-[80px] xl:-left-[136px] -bottom-8 lg:bottom-auto lg:top-[230px] xl:top-[290px] w-[55%] lg:w-[240px] xl:w-[295px] aspect-[295/227] rounded-xl lg:rounded-3xl border-4 lg:border-[8px] border-white overflow-hidden shadow-xl">
					<img src="<?php echo esc_url($figma . '/production-fg.png'); ?>" alt="" class="w-full h-full object-cover" loading="lazy" decoding="async" />
				</div>
			</div>
		</div>

	</div>
</section>
