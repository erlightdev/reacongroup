<?php

/**
 * Template Name: Start an Order
 * Template Post Type: page
 *
 * Static design pass for Start an Order page.
 *
 * @package reacon-group
 */
get_header();
?>

<main id="primary" class="overflow-x-hidden" role="main">
	<!-- Page Header Hero -->
	<section id="start-order-hero" class="relative w-full p-1.5 md:p-2.5" aria-labelledby="start-order-heading">
		<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[linear-gradient(145deg,#0E6D77_0%,#062B53_42%,#0A4E57_100%)] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
			<div class="reacon-start-order-hero-pattern pointer-events-none absolute inset-0" aria-hidden="true"></div>
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_85%_60%_at_50%_-10%,rgba(30,202,211,0.22)_0%,transparent_55%)]" aria-hidden="true"></div>
			<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.22)_0%,rgba(0,10,33,0.12)_45%,rgba(0,10,33,0.26)_100%)]" aria-hidden="true"></div>

			<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
				<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">Order Workflow</p>
				<h1 id="start-order-heading" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
					Start Your Print Order in Minutes
				</h1>
				<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
					Share your requirements, upload artwork, and choose delivery timelines. Our production team reviews every brief and confirms next steps quickly.
				</p>
			</div>
		</div>
	</section>



	<!-- Form Layout -->
	<section class="bg-[#FAFAFA] px-4 py-12 sm:px-6 md:py-14 lg:px-8 lg:py-16" aria-labelledby="order-form-title">
		<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-8 lg:grid-cols-[minmax(0,1fr)_360px] lg:gap-10">
			<div class="rounded-3xl border border-[#ECEFF2] bg-white p-5 sm:p-6 md:p-8">
				<h2 id="order-form-title" class="font-display text-[26px] font-semibold leading-[1.2] text-[#1E293B] sm:text-[30px] md:text-[34px]">Order Details</h2>
				<p class="mt-3 font-sans text-[14px] leading-[1.5] text-[#4B5058] sm:text-[15px] md:text-[16px]">
					Complete this form and our team will contact you with pricing, timeline, and production recommendations.
				</p>

				<div class="start-order-cf7 mt-8">
					<?php echo do_shortcode('[contact-form-7 id="32f7643" title="Start an Order Form"]'); ?>
				</div>
			</div>

			<aside class="rounded-3xl border border-[#ECEFF2] bg-white p-6 sm:p-7 lg:sticky lg:top-28 lg:h-fit" aria-label="How it works">
				<h3 class="font-display text-[24px] font-semibold leading-[1.2] text-[#1E293B]">How It Works</h3>
				<ol class="mt-6 space-y-5">
					<li class="flex gap-3">
						<span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary font-sans text-[12px] font-semibold text-white">1</span>
						<p class="font-sans text-[14px] leading-[1.5] text-[#4B5058]">Submit your project details and files.</p>
					</li>
					<li class="flex gap-3">
						<span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary font-sans text-[12px] font-semibold text-white">2</span>
						<p class="font-sans text-[14px] leading-[1.5] text-[#4B5058]">We confirm scope, timeline, and quotation.</p>
					</li>
					<li class="flex gap-3">
						<span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary font-sans text-[12px] font-semibold text-white">3</span>
						<p class="font-sans text-[14px] leading-[1.5] text-[#4B5058]">Production starts after your approval.</p>
					</li>
					<li class="flex gap-3">
						<span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary font-sans text-[12px] font-semibold text-white">4</span>
						<p class="font-sans text-[14px] leading-[1.5] text-[#4B5058]">Delivery and fulfilment to your locations.</p>
					</li>
				</ol>
			</aside>
		</div>
	</section>
	<!-- Intro Stats -->
	<section class="bg-white px-4 py-10 sm:px-6 sm:py-12 md:py-14 lg:px-8 lg:py-16" aria-label="Order highlights">
		<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
			<div class="rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB] p-6">
				<p class="font-display text-[30px] font-bold leading-none text-primary sm:text-[34px]">24h</p>
				<p class="mt-2 font-sans text-[14px] leading-[1.45] text-[#383B43] sm:text-[15px]">Average response on working days</p>
			</div>
			<div class="rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB] p-6">
				<p class="font-display text-[30px] font-bold leading-none text-primary sm:text-[34px]">8+</p>
				<p class="mt-2 font-sans text-[14px] leading-[1.45] text-[#383B43] sm:text-[15px]">Countries in our print network</p>
			</div>
			<div class="rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB] p-6">
				<p class="font-display text-[30px] font-bold leading-none text-primary sm:text-[34px]">500k+</p>
				<p class="mt-2 font-sans text-[14px] leading-[1.45] text-[#383B43] sm:text-[15px]">Jobs delivered globally</p>
			</div>
			<div class="rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB] p-6">
				<p class="font-display text-[30px] font-bold leading-none text-primary sm:text-[34px]">ISO</p>
				<p class="mt-2 font-sans text-[14px] leading-[1.45] text-[#383B43] sm:text-[15px]">Quality-controlled production process</p>
			</div>
		</div>
	</section>
	<style>
		/* Hero pattern mirrors Our Works for cross-page consistency. */
		#start-order-hero .reacon-start-order-hero-pattern {
			background-image:
				url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23FFFFFF' stroke-opacity='0.1'%3E%3Cpath d='M36 10v52M10 36h52' stroke-width='1'/%3E%3Ccircle cx='36' cy='36' r='3' stroke-opacity='0.14' stroke-width='1'/%3E%3C/g%3E%3Cpath d='M0 72L72 0' stroke='%23FFFFFF' stroke-opacity='0.04' stroke-width='1'/%3E%3C/svg%3E"),
				repeating-linear-gradient(
					-18deg,
					transparent,
					transparent 14px,
					rgba(255, 255, 255, 0.025) 14px,
					rgba(255, 255, 255, 0.025) 15px
				);
			background-size: 72px 72px, auto;
		}

		/* Start an Order CF7 form styles */
		.start-order-cf7 .wpcf7 {
			margin: 0;
		}

		.start-order-cf7 .wpcf7 br {
			display: none;
		}

		.start-order-cf7 .wpcf7 p {
			margin: 0;
		}

		.start-order-cf7 .so-grid {
			display: grid;
			grid-template-columns: 1fr;
			gap: 20px;
		}

		@media (min-width: 640px) {
			.start-order-cf7 .so-grid {
				grid-template-columns: repeat(2, minmax(0, 1fr));
				column-gap: 24px;
			}

			.start-order-cf7 .so-col-2 {
				grid-column: span 2 / span 2;
			}
		}

		.start-order-cf7 .so-label {
			display: block;
			margin-bottom: 8px;
			padding: 2px;
			font-size: 13px;
			line-height: 1.35;
			font-weight: 500;
			color: #383b43;
		}

		.start-order-cf7 .wpcf7-form-control-wrap {
			display: block;
		}

		.start-order-cf7 .so-label .wpcf7-form-control-wrap {
			margin-top: 6px;
		}

		.start-order-cf7 .so-grid > div {
			margin: 2px 0;
		}

		.start-order-cf7 input[type="text"],
		.start-order-cf7 input[type="email"],
		.start-order-cf7 input[type="tel"],
		.start-order-cf7 select,
		.start-order-cf7 textarea {
			width: 100%;
			padding: 2px;
			border: 1px solid #e5e7eb;
			background: #fff;
			color: #1e293b;
			font-size: 14px;
			line-height: 1.35;
			font-family: inherit;
			transition: border-color 0.2s ease;
			outline: none;
		}

		.start-order-cf7 input[type="text"],
		.start-order-cf7 input[type="email"],
		.start-order-cf7 input[type="tel"],
		.start-order-cf7 select {
			height: 46px;
			padding: 0 16px;
			border-radius: 12px;
		}

		.start-order-cf7 select {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			padding-right: 44px;
			background-image:
				url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 256 256'%3E%3Cpath fill='%231E293B' d='M213.66 101.66a8 8 0 0 1 0 11.31l-80 80a8 8 0 0 1-11.32 0l-80-80a8 8 0 0 1 11.32-11.31L128 176l74.34-74.34a8 8 0 0 1 11.32 0Z'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-position: right 14px center;
			background-size: 18px 18px;
			cursor: pointer;
		}

		.start-order-cf7 select::-ms-expand {
			display: none;
		}

		.start-order-cf7 textarea {
			height: 90px;
			min-height: 90px;
			padding: 12px 16px;
			border-radius: 12px;
			resize: vertical;
		}

		.start-order-cf7 input:focus,
		.start-order-cf7 select:focus,
		.start-order-cf7 textarea:focus {
			border-color: var(--color-primary, #0a969b);
		}

		.start-order-cf7 .wpcf7-submit {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			border: 0;
			border-radius: 9999px;
			background: var(--color-primary, #0a969b);
			padding: 12px 24px;
			font-size: 15px;
			line-height: 1.2;
			font-weight: 500;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}

		.start-order-cf7 .wpcf7-submit:hover {
			background: var(--color-secondary, #0e6d77);
		}

		.start-order-cf7 .wpcf7 form .wpcf7-response-output {
			margin: 14px 0 0;
			padding: 10px 14px;
			border-radius: 12px;
			font-size: 13px;
			line-height: 1.45;
		}

		.start-order-cf7 .wpcf7-not-valid-tip {
			margin-top: 6px;
			font-size: 12px;
			line-height: 1.4;
		}

		.start-order-cf7 .wpcf7-spinner {
			margin: 8px 0 0 10px;
			vertical-align: middle;
		}

		.start-order-cf7 .wpcf7 form.sent .wpcf7-response-output {
			border-color: #0a969b;
			color: #0b5a60;
			background: rgba(10, 150, 155, 0.08);
		}

		.start-order-cf7 .wpcf7 form.invalid .wpcf7-response-output,
		.start-order-cf7 .wpcf7 form.unaccepted .wpcf7-response-output,
		.start-order-cf7 .wpcf7 form.payment-required .wpcf7-response-output {
			border-color: #f87171;
			color: #b91c1c;
			background: #fff1f2;
		}

		/* Desktop-only top notch to keep header/hero consistency with About page. */
		@media (min-width: 1024px) {
			#start-order-hero .reacon-about-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 40px;
				--hero-notch-height: 86px;
				--hero-notch-swoop: 40px;
			}

			#start-order-hero .reacon-about-hero-card::before {
				content: "";
				position: absolute;
				left: 50%;
				top: 0;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: var(--hero-notch-width);
				height: var(--hero-notch-height);
				background: #fff;
				border-bottom-left-radius: var(--hero-notch-radius);
				border-bottom-right-radius: var(--hero-notch-radius);
				z-index: 3;
				pointer-events: none;
			}

			#start-order-hero .reacon-about-hero-card::after {
				content: "";
				position: absolute;
				top: 0;
				left: 50%;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2));
				height: var(--hero-notch-swoop);
				background:
					radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
					radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
				z-index: 4;
				pointer-events: none;
			}
		}
	</style>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const syncStartOrderHeroNotchToDesktopMenu = () => {
				const heroCard = document.querySelector('#start-order-hero .reacon-about-hero-card');
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

			let startOrderNotchSyncRaf = null;
			const scheduleStartOrderNotchSync = () => {
				if (startOrderNotchSyncRaf) {
					cancelAnimationFrame(startOrderNotchSyncRaf);
				}
				startOrderNotchSyncRaf = requestAnimationFrame(syncStartOrderHeroNotchToDesktopMenu);
			};

			scheduleStartOrderNotchSync();
			window.addEventListener('resize', scheduleStartOrderNotchSync);
			window.addEventListener('load', scheduleStartOrderNotchSync);
			if (document.fonts && document.fonts.ready) {
				document.fonts.ready.then(scheduleStartOrderNotchSync).catch(() => {});
			}

			const startOrderThankYouUrl = '<?php echo esc_url(home_url('/thank-you/')); ?>';
			const handleStartOrderSuccess = (event) => {
				if (!event || !event.target) return;
				const formWrapper = event.target.closest('.start-order-cf7');
				if (!formWrapper) return;

				const submitButton = formWrapper.querySelector('.wpcf7-submit');
				if (submitButton) {
					submitButton.value = 'Submitted';
					submitButton.setAttribute('disabled', 'disabled');
				}

				window.setTimeout(() => {
					window.location.href = startOrderThankYouUrl;
				}, 700);
			};

			document.addEventListener('wpcf7mailsent', handleStartOrderSuccess);
			document.addEventListener('wpcf7submit', (event) => {
				if (event && event.detail && event.detail.status === 'mail_sent') {
					handleStartOrderSuccess(event);
				}
			});
		});
	</script>
</main>

<?php
get_footer();
