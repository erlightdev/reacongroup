<?php
/**
 * Home page section: Brand intro — heading + partner cards.
 *
 * @package reacon-group
 */

$brandintro_dir = get_template_directory_uri() . '/public/brandintro';
?>

<div class="max-w-[1370px] mx-auto px-4 sm:px-6 flex flex-col items-center gap-10 md:gap-12 xl:gap-[52px] py-10">

	<!-- Heading Section -->
	<div class="text-center max-w-5xl flex flex-col gap-4 sm:gap-5">
		<h2 class="font-display font-medium text-3xl sm:text-4xl lg:text-[44px] leading-tight lg:leading-[1.32] text-foreground">
			<?php esc_html_e('From design studios to data platforms and', 'reacon-group'); ?>
			<span class="font-semibold text-primary"><?php esc_html_e('global print networks, Reacon', 'reacon-group'); ?></span>
			<?php esc_html_e('turns creative concepts into physical, measurable results.', 'reacon-group'); ?>
		</h2>
		<p class="font-sans text-sm sm:text-base text-foreground leading-relaxed max-w-[658px] mx-auto">
			<?php esc_html_e('Our teams manage everything — print, fulfilment, and digital automation — so you can focus on growth while we handle the execution.', 'reacon-group'); ?>
		</p>
	</div>

	<!-- Partner Cards Row -->
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 xl:gap-8 w-full max-w-[1400px]">

		<!-- Cups Galore -->
		<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:border-primary hover:shadow-sm">
			<div class="flex flex-col gap-4 mb-6">
				<div class="h-8 flex items-center">
					<img
						src="<?php echo esc_url($brandintro_dir . '/cups-galore-logo.png'); ?>"
						alt="<?php esc_attr_e('Cups Galore', 'reacon-group'); ?>"
						class="h-full w-auto object-contain"
						loading="lazy" decoding="async" />
				</div>
				<div class="w-full">
					<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Cups Galore', 'reacon-group'); ?></h3>
					<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
						<?php esc_html_e('Cups Galore is an Australian manufacturer that creates high-quality, custom-printed paper cups for businesses, cafes, and events.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
			<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
				<?php esc_html_e('Explore Site', 'reacon-group'); ?>
				<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
			</a>
		</div>

		<!-- Digital Press -->
		<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:border-primary hover:shadow-sm">
			<div class="flex flex-col gap-4 mb-6">
				<div class="h-8 flex items-center">
					<img
						src="<?php echo esc_url($brandintro_dir . '/digital-press-logo.png'); ?>"
						alt="<?php esc_attr_e('Digital Press', 'reacon-group'); ?>"
						class="h-[22px] w-auto object-contain"
						loading="lazy" decoding="async" />
				</div>
				<div class="w-full">
					<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Digital Press', 'reacon-group'); ?></h3>
					<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
						<?php esc_html_e('Provides various printing services, including marketing materials, stationery, books, catalogues, signage, and design services.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
			<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
				<?php esc_html_e('Explore Site', 'reacon-group'); ?>
				<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
			</a>
		</div>

		<!-- Westman Printing -->
		<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:border-primary hover:shadow-sm">
			<div class="flex flex-col gap-4 mb-6">
				<div class="h-8 flex items-center">
					<img
						src="<?php echo esc_url($brandintro_dir . '/westman.svg'); ?>"
						alt="<?php esc_attr_e('Westman Printing', 'reacon-group'); ?>"
						class="h-full w-auto object-contain"
						loading="lazy" decoding="async" />
				</div>
				<div class="w-full">
					<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Westman Printing', 'reacon-group'); ?></h3>
					<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
						<?php esc_html_e('Westman Printing offers experienced in-house design team services equipped with the latest design technology to turn any idea into a masterpiece.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
			<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
				<?php esc_html_e('Explore Site', 'reacon-group'); ?>
				<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
			</a>
		</div>

		<!-- Horizon Print Management -->
		<div class="group bg-muted border border-border rounded-[20px] p-5 sm:p-6 min-h-[240px] h-full flex flex-col transition-all duration-300 hover:border-primary hover:shadow-sm">
			<div class="flex flex-col gap-4 mb-6">
				<div class="h-8 flex items-center">
					<img
						src="<?php echo esc_url($brandintro_dir . '/hirizon.png'); ?>"
						alt="<?php esc_attr_e('Horizon Print Management', 'reacon-group'); ?>"
						class="h-5 w-auto object-contain"
						loading="lazy" decoding="async" />
				</div>
				<div class="w-full">
					<h3 class="font-display font-semibold text-xl text-foreground mb-1.5"><?php esc_html_e('Horizon Print Management', 'reacon-group'); ?></h3>
					<p class="font-sans text-sm text-muted-foreground leading-relaxed line-clamp-3">
						<?php esc_html_e('Printing business and marketing materials, alongside managing integrated marketing campaigns across various platforms.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
			<a href="#" class="mt-auto inline-flex items-center gap-1.5 font-sans text-sm font-medium text-foreground group-hover:text-primary transition-colors w-max no-underline">
				<?php esc_html_e('Explore Site', 'reacon-group'); ?>
				<i class="ph ph-arrow-right text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
			</a>
		</div>

	</div>
</div>
