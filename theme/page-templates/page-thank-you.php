<?php

/**
 * Template Name: Thank You
 * Template Post Type: page
 *
 * Clean and minimal thank-you page template.
 *
 * @package reacon-group
 */
get_header();
?>

<main id="primary" class="overflow-x-hidden bg-[#F8FAFC]" role="main">
	<section class="w-full px-4 pb-14 pt-24 sm:px-6 sm:pb-16 sm:pt-28 lg:px-8 lg:pb-20 lg:pt-32" aria-labelledby="thank-you-heading">
		<div class="mx-auto w-full max-w-7xl">
			<div class="mx-auto max-w-4xl rounded-[28px] border border-[#E6EBF2] bg-white p-6 text-center shadow-[0_18px_48px_rgba(15,23,42,0.06)] sm:p-8 lg:p-10">
				<span class="mx-auto inline-flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary" aria-hidden="true">
					<i class="ph-fill ph-check-circle text-[30px]"></i>
				</span>

				<p class="mt-5 font-sans text-[11px] font-medium uppercase tracking-[0.16em] text-primary/80 sm:text-[12px]">
					Request Received
				</p>

				<h1 id="thank-you-heading" class="mt-3 font-display text-[30px] font-bold leading-[1.15] text-[#0F172A] sm:text-[38px] lg:text-[48px]">
					Thank You
				</h1>

				<p class="mx-auto mt-4 max-w-2xl font-sans text-[14px] leading-[1.55] text-[#475569] sm:text-[16px]">
					Our production team has received your submission and will review your requirements shortly. You can expect a response with next steps, pricing, and timelines within one working day.
				</p>

				<div class="mt-8 grid grid-cols-1 gap-3 rounded-2xl border border-[#E9EEF5] bg-[#F8FAFC] p-4 text-left sm:grid-cols-3 sm:gap-4 sm:p-5">
					<div>
						<p class="font-display text-[22px] font-semibold leading-none text-[#0F172A]">24h</p>
						<p class="mt-1 font-sans text-[13px] leading-[1.45] text-[#475569]">Average first response</p>
					</div>
					<div>
						<p class="font-display text-[22px] font-semibold leading-none text-[#0F172A]">Dedicated</p>
						<p class="mt-1 font-sans text-[13px] leading-[1.45] text-[#475569]">Account support on every project</p>
					</div>
					<div>
						<p class="font-display text-[22px] font-semibold leading-none text-[#0F172A]">Global</p>
						<p class="mt-1 font-sans text-[13px] leading-[1.45] text-[#475569]">Print and fulfilment network</p>
					</div>
				</div>

				<div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-3 font-sans text-[15px] font-medium text-white transition-all duration-300 hover:translate-y-[-1px] hover:bg-secondary sm:w-auto">
						Back to Home
						<i class="ph ph-arrow-up-right text-[15px]" aria-hidden="true"></i>
					</a>
					<a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex min-h-[46px] w-full items-center justify-center gap-2 rounded-full border border-[#D3DBE7] bg-white px-6 py-3 font-sans text-[15px] font-medium text-[#0F172A] transition-colors duration-300 hover:border-primary hover:text-primary sm:w-auto">
						Contact Team
						<i class="ph ph-arrow-right text-[15px]" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
