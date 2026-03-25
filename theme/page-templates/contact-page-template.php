<?php

/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * Contact page template.
 *
 * @package reacon-group
 */
get_header();

$contact_email = 'sales@reacongroup.com';
$contact_phone = '1300 377 377';
$page_header_bg = get_template_directory_uri() . '/public/about/about-header.png';

?>

<main id="primary" class="overflow-x-hidden bg-[#f6f6f6]" role="main">
	<section class="w-full p-1.5 sm:p-2 lg:p-4">
		<div class="relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
			<img
				src="<?php echo esc_url($page_header_bg); ?>"
				alt=""
				aria-hidden="true"
				class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
				fetchpriority="high"
				loading="eager"
				decoding="async" />
			<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>
			<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
				<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
					<?php esc_html_e('Contact', 'reacon-group'); ?>
				</p>
				<h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
					<?php esc_html_e("Let's Talk About Your Next Campaign", 'reacon-group'); ?>
				</h1>
			</div>
		</div>
	</section>

	<section class="relative pb-12 pt-10 sm:pt-12 md:pt-14 lg:pt-[120px]">
		<div class="mx-auto grid w-full max-w-[1370px] grid-cols-1 gap-8 px-4 sm:px-6 md:px-8 lg:grid-cols-[1fr_620px] lg:items-start lg:gap-6 xl:px-0">
			<div class="pt-2 md:pt-4 lg:pt-0">
				<h1 class="max-w-[760px] font-display text-[38px] font-semibold leading-[1.15] text-black sm:text-[44px] md:text-[50px] lg:text-[56px]">
					<?php esc_html_e('You Have Question, We have Answers', 'reacon-group'); ?>
				</h1>
				<p class="mt-4 max-w-[581px] font-display text-[18px] leading-[1.32] text-foreground sm:text-[20px]">
					<?php esc_html_e("Whether you're a brand looking to launch a new campaign or improve efficiencies across your campaign workflow. We would love to hear from you.", 'reacon-group'); ?>
				</p>

				<div class="mt-10 flex flex-col gap-5">
					<p class="flex items-center gap-1.5 font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl">
						<i class="ph ph-envelope-simple text-xl" aria-hidden="true"></i>
						<span><?php echo esc_html($contact_email); ?></span>
					</p>
					<p class="flex items-center gap-1.5 font-display text-lg font-semibold leading-[1.32] text-foreground sm:text-xl">
						<i class="ph ph-phone text-xl" aria-hidden="true"></i>
						<span><?php echo esc_html($contact_phone); ?></span>
					</p>
				</div>
			</div>

			<div class="w-full z-20 rounded-2xl rounded-br-[24px] bg-white p-5 sm:p-6 lg:rounded-bl-[32px] lg:rounded-br-[32px] lg:p-8">
				<h2 class="font-display text-[44px] font-semibold leading-[1.15] text-black sm:text-[48px] lg:text-[56px]">
					<?php esc_html_e('Lets Connect.', 'reacon-group'); ?>
				</h2>

				<div class="mt-4">
					<?php echo do_shortcode('[contact-form-7 id="350f144" title="Lets Connect Form" html_class="reacon-contact-cf7"]'); ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Talk to sales -->
	<section class="bg-[#e9fbfc] py-10 sm:py-12 lg:py-14 -mt-80 relative">
		<?php
		$contact_assets_uri = get_template_directory_uri() . '/public/contact';
		$apac_locations = array_fill(0, 8, __('Sydney, Australia', 'reacon-group'));
		?>
		<div class="relative mx-auto w-full max-w-[1370px] px-4 sm:px-6 md:px-8 xl:px-0">
			<div class="max-w-[581px]">
				<h3 class="font-display text-[32px] font-medium leading-[1.32] text-black">
					<?php esc_html_e('Talk to our sales & support teams across the Asia Pacific', 'reacon-group'); ?>
				</h3>

				<div class="mt-8 flex flex-col gap-6">
					<?php foreach ($apac_locations as $location): ?>
						<button type="button" class="group inline-flex w-full max-w-[311px] items-center justify-between text-left">
							<span class="font-display text-lg font-medium leading-[1.32] text-foreground sm:text-xl">
								<?php echo esc_html($location); ?>
							</span>
							<span class="text-xl leading-none text-primary transition-transform duration-200 group-hover:rotate-90" aria-hidden="true">+</span>
						</button>
					<?php endforeach; ?>
				</div>
			</div>

			<img
				src="<?php echo esc_url($contact_assets_uri . '/contact-talk-bg-vector.svg'); ?>"
				alt=""
				aria-hidden="true"
				class="absolute bottom-0 right-0 hidden h-auto w-[45%] max-w-[709px] opacity-95 md:block"
				loading="lazy"
				decoding="async" />
		</div>
	</section>
	<!-- End Talk to sales -->

	<!-- Faq Section -->
	<?php get_template_part('template-parts/components/component', 'faq'); ?>
	<!-- End Faq Section -->	
</main>

<style>
	.reacon-contact-cf7 {
		margin-top: 4px;
	}

	.reacon-contact-cf7 p {
		margin: 0 0 16px;
	}

	.reacon-contact-cf7 p:last-of-type {
		margin-bottom: 0;
	}

	.reacon-contact-cf7 label {
		display: block;
		margin-bottom: 3px;
		font-family: var(--font-sans);
		font-size: 15px;
		font-weight: 500;
		line-height: 1.42;
		color: var(--foreground);
	}

	.reacon-contact-cf7 input[type="text"],
	.reacon-contact-cf7 input[type="email"],
	.reacon-contact-cf7 input[type="tel"],
	.reacon-contact-cf7 input[type="url"],
	.reacon-contact-cf7 select,
	.reacon-contact-cf7 textarea {
		width: 100%;
		border: 1px solid #e7e7e7;
		border-radius: 999px;
		background: #fff;
		padding: 10px 14px;
		font-family: var(--font-sans);
		font-size: 15px;
		line-height: 1.42;
		color: #516278;
		outline: 0;
	}

	.reacon-contact-cf7 select {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding-right: 42px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'%3E%3Cpath d='M3.5 5.25L7 8.75L10.5 5.25' stroke='%23516278' stroke-width='1.7' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
		background-repeat: no-repeat;
		background-position: right 14px center;
		background-size: 14px 14px;
	}

	.reacon-contact-cf7 select::-ms-expand {
		display: none;
	}

	.reacon-contact-cf7 textarea {
		border-radius: 20px;
		min-height: 84px;
		resize: vertical;
	}

	.reacon-contact-cf7 input:focus,
	.reacon-contact-cf7 select:focus,
	.reacon-contact-cf7 textarea:focus {
		border-color: var(--primary);
		box-shadow: 0 0 0 2px rgba(30, 202, 211, 0.25);
	}

	.reacon-contact-cf7 .wpcf7-submit {
		border: 0;
		border-radius: 999px;
		background: var(--primary);
		color: #fff;
		font-family: var(--font-sans);
		font-size: 15px;
		font-weight: 500;
		line-height: 1.42;
		padding: 11px 20px;
		cursor: pointer;
		transition: filter 0.2s ease;
	}

	.reacon-contact-cf7 .wpcf7-form-control-wrap {
		display: block;
	}

	.reacon-contact-cf7 br {
		display: none;
	}

	.reacon-contact-cf7 .wpcf7-submit:hover {
		filter: brightness(1.05);
	}

	.reacon-contact-cf7 .wpcf7-spinner {
		margin-left: 8px;
	}

	.reacon-contact-cf7 .wpcf7-not-valid-tip {
		margin-top: 6px;
		font-size: 13px;
	}
</style>

<?php
get_footer();
