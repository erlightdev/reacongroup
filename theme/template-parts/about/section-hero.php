<?php

/**
 * About page section: Hero header block.
 *
 * @package reacon-group
 */
$about_header_bg = get_template_directory_uri() . '/public/about/about-header.png';
?>

<section
	id="about-hero"
	class="w-full p-1.5 sm:p-2 lg:p-4"
	aria-label="<?php esc_attr_e('About page hero', 'reacon-group'); ?>">
	<div class="relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
		<img
			src="<?php echo esc_url($about_header_bg); ?>"
			alt=""
			aria-hidden="true"
			class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
			fetchpriority="high"
			loading="eager"
			decoding="async" />

		<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

		<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
			<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
				<?php esc_html_e('Reacon Group', 'reacon-group'); ?>
			</p>

			<h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
				<?php esc_html_e('Built to Create, Produce, and Deliver at Scale', 'reacon-group'); ?>
			</h1>

			<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
				<?php esc_html_e('Reacon Group is a multidisciplinary production and fulfillment ecosystem transforming how brands design, manufacture, and distribute physical and digital experiences.', 'reacon-group'); ?>
			</p>
		</div>
	</div>
</section>
