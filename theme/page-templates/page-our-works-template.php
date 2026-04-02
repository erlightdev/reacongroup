<?php

/**
 * Template Name: Our Works
 * Template Post Type: page
 *
 * Portfolio-style Our Works page (static placeholder content).
 *
 * @package reacon-group
 */

get_header();

$works_placeholder = 'https://placehold.co/';

$works_projects = array(
	array(
		'title'    => __('Retail campaign rollout', 'reacon-group'),
		'category' => __('Print & fulfilment', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/0E6D77/FFFFFF/png?text=Project+01',
		'excerpt'  => __('National in-store POS and collateral delivered on a coordinated timeline across regions.', 'reacon-group'),
	),
	array(
		'title'    => __('Packaging refresh', 'reacon-group'),
		'category' => __('Packaging', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/0A4E57/FFFFFF/png?text=Project+02',
		'excerpt'  => __('Structural design support, colour-managed production, and quality-controlled runs for retail shelves.', 'reacon-group'),
	),
	array(
		'title'    => __('Brand launch kit', 'reacon-group'),
		'category' => __('Commercial print', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/0A969B/FFFFFF/png?text=Project+03',
		'excerpt'  => __('Unified launch assets from prototypes through to scaled print and global distribution.', 'reacon-group'),
	),
	array(
		'title'    => __('Event & activation', 'reacon-group'),
		'category' => __('Activation', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/1E293B/CBD5E1/png?text=Project+04',
		'excerpt'  => __('High-impact graphics, modular builds, and rapid turnaround for multi-city activations.', 'reacon-group'),
	),
	array(
		'title'    => __('Direct mail programme', 'reacon-group'),
		'category' => __('Data-driven print', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/383B43/FFFFFF/png?text=Project+05',
		'excerpt'  => __('Personalised communications with workflow automation and proofing gates for brand compliance.', 'reacon-group'),
	),
	array(
		'title'    => __('Global kitting', 'reacon-group'),
		'category' => __('Warehousing', 'reacon-group'),
		'image'    => $works_placeholder . '800x560/4B5058/FFFFFF/png?text=Project+06',
		'excerpt'  => __('Pick-pack, custom kit assembly, and logistics orchestration to keep teams stocked and on-brand.', 'reacon-group'),
	),
);
?>

<main id="primary" class="overflow-x-hidden bg-[#f6f6f6]" role="main">
	<!-- Page Header Hero -->
	<section
		id="our-works-hero"
		class="relative w-full p-1.5 md:p-2.5"
		aria-labelledby="our-works-heading">
		<div class="reacon-about-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[linear-gradient(145deg,#0E6D77_0%,#062B53_42%,#0A4E57_100%)] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
			<div class="reacon-works-hero-pattern pointer-events-none absolute inset-0" aria-hidden="true"></div>
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_85%_60%_at_50%_-10%,rgba(30,202,211,0.22)_0%,transparent_55%)]" aria-hidden="true"></div>
			<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.22)_0%,rgba(0,10,33,0.12)_45%,rgba(0,10,33,0.26)_100%)]" aria-hidden="true"></div>
			<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
				<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
					<?php esc_html_e('Portfolio', 'reacon-group'); ?>
				</p>
				<h1 id="our-works-heading" class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
					<?php esc_html_e('Our Works', 'reacon-group'); ?>
				</h1>
				<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
					<?php esc_html_e('Selected campaigns and production programmes that showcase how we help brands scale print, packaging, and fulfilment with confidence.', 'reacon-group'); ?>
				</p>
			</div>
		</div>
	</section>

	<!-- Intro -->
	<section class="bg-white px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-intro-heading">
		<div class="mx-auto w-full max-w-7xl">
			<h2 id="our-works-intro-heading" class="max-w-3xl font-display text-[28px] font-semibold leading-[1.2] text-[#0F172A] sm:text-[34px] lg:text-[40px]">
				<?php esc_html_e('Production partners for brands that move fast', 'reacon-group'); ?>
			</h2>
			<p class="mt-4 max-w-3xl font-sans text-[15px] leading-[1.55] text-[#4B5058] sm:text-[16px] lg:text-[17px]">
				<?php esc_html_e('Every project below reflects a blend of craft, process, and coordination—from creative adaptation to final mile. Replace placeholder imagery with your own case photography when ready.', 'reacon-group'); ?>
			</p>
		</div>
	</section>

	<!-- Project grid -->
	<section class="bg-[#FAFAFA] px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-label="<?php esc_attr_e('Featured projects', 'reacon-group'); ?>">
		<div class="mx-auto grid w-full max-w-7xl grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3 lg:gap-8">
			<?php foreach ($works_projects as $project) : ?>
				<article class="group flex flex-col overflow-hidden rounded-2xl border border-[#ECEFF2] bg-white shadow-[0_8px_30px_rgba(15,23,42,0.06)] transition-shadow duration-300 hover:shadow-[0_12px_40px_rgba(15,23,42,0.09)]">
					<div class="relative aspect-[16/11] overflow-hidden bg-[#ECEFF2]">
						<img
							src="<?php echo esc_url($project['image']); ?>"
							alt=""
							class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-[1.03]"
							loading="lazy"
							decoding="async" />
					</div>
					<div class="flex flex-1 flex-col p-5 sm:p-6">
						<p class="font-sans text-[11px] font-semibold uppercase tracking-[0.14em] text-primary">
							<?php echo esc_html($project['category']); ?>
						</p>
						<h3 class="mt-2 font-display text-[20px] font-semibold leading-snug text-[#1E293B] sm:text-[22px]">
							<?php echo esc_html($project['title']); ?>
						</h3>
						<p class="mt-3 flex-1 font-sans text-[14px] leading-[1.5] text-[#4B5058] sm:text-[15px]">
							<?php echo esc_html($project['excerpt']); ?>
						</p>
						<a
							href="<?php echo esc_url(home_url('/contact/')); ?>"
							class="mt-4 inline-flex items-center gap-1 font-sans text-[14px] font-medium text-primary transition-colors hover:text-secondary">
							<?php esc_html_e('Discuss this type of project', 'reacon-group'); ?>
							<i class="ph ph-arrow-up-right text-base" aria-hidden="true"></i>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- Capabilities strip -->
	<section class="bg-white px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-capabilities-heading">
		<div class="mx-auto w-full max-w-7xl">
			<div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center lg:gap-12">
				<div>
					<h2 id="our-works-capabilities-heading" class="font-display text-[26px] font-semibold leading-[1.2] text-[#0F172A] sm:text-[30px] lg:text-[34px]">
						<?php esc_html_e('What we bring to every programme', 'reacon-group'); ?>
					</h2>
					<ul class="mt-6 space-y-4 font-sans text-[15px] leading-[1.5] text-[#4B5058] sm:text-[16px]">
						<li class="flex gap-3">
							<i class="ph-fill ph-check-circle mt-0.5 shrink-0 text-primary text-lg" aria-hidden="true"></i>
							<span><?php esc_html_e('Colour-managed production and consistent brand execution across regions.', 'reacon-group'); ?></span>
						</li>
						<li class="flex gap-3">
							<i class="ph-fill ph-check-circle mt-0.5 shrink-0 text-primary text-lg" aria-hidden="true"></i>
							<span><?php esc_html_e('Workflow transparency—from proof cycles to fulfilment and reporting.', 'reacon-group'); ?></span>
						</li>
						<li class="flex gap-3">
							<i class="ph-fill ph-check-circle mt-0.5 shrink-0 text-primary text-lg" aria-hidden="true"></i>
							<span><?php esc_html_e('Scale when you need it, without compromising quality or compliance.', 'reacon-group'); ?></span>
						</li>
					</ul>
				</div>
				<div class="overflow-hidden rounded-2xl border border-[#ECEFF2] bg-[#F9FAFB]">
					<img
						src="<?php echo esc_url($works_placeholder . '960x720/E9FBFC/0E6D77/png?text=Capabilities'); ?>"
						alt=""
						class="h-full w-full object-cover object-center"
						loading="lazy"
						decoding="async" />
				</div>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="bg-[#0E6D77] px-4 py-12 sm:px-6 sm:py-14 lg:px-8 lg:py-16" aria-labelledby="our-works-cta-heading">
		<div class="mx-auto flex w-full max-w-7xl flex-col items-start justify-between gap-8 lg:flex-row lg:items-center">
			<div class="max-w-2xl">
				<h2 id="our-works-cta-heading" class="font-display text-[26px] font-semibold leading-[1.2] text-white sm:text-[30px] lg:text-[34px]">
					<?php esc_html_e('Planning your next campaign or rollout?', 'reacon-group'); ?>
				</h2>
				<p class="mt-3 font-sans text-[15px] leading-[1.5] text-white/90 sm:text-[16px]">
					<?php esc_html_e('Tell us about delivery windows, geographies, and assets—we will map a production path that fits.', 'reacon-group'); ?>
				</p>
			</div>
			<div class="flex w-full flex-col gap-3 sm:flex-row sm:w-auto">
				<a
					href="<?php echo esc_url(home_url('/contact/')); ?>"
					class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 font-sans text-[15px] font-medium text-[#0E6D77] transition-colors hover:bg-[#E9FBFC]">
					<?php esc_html_e('Contact us', 'reacon-group'); ?>
					<i class="ph ph-arrow-up-right text-[16px]" aria-hidden="true"></i>
				</a>
				<a
					href="<?php echo esc_url(home_url('/')); ?>"
					class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 px-6 py-3 font-sans text-[15px] font-medium text-white transition-colors hover:bg-white/10">
					<?php esc_html_e('Back to home', 'reacon-group'); ?>
					<i class="ph ph-arrow-right text-[16px]" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</section>

	<style>
		/* Hero: registration-style grid + diagonal texture (print / production portfolio mood). */
		#our-works-hero .reacon-works-hero-pattern {
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

		/* Desktop-only top notch (matches About / Contact hero). */
		@media (min-width: 1024px) {
			#our-works-hero .reacon-about-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 40px;
				--hero-notch-height: 86px;
				--hero-notch-swoop: 40px;
			}

			#our-works-hero .reacon-about-hero-card::before {
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

			#our-works-hero .reacon-about-hero-card::after {
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
			const syncOurWorksHeroNotchToDesktopMenu = () => {
				const heroCard = document.querySelector('#our-works-hero .reacon-about-hero-card');
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

			let worksNotchRaf = null;
			const scheduleWorksNotchSync = () => {
				if (worksNotchRaf) cancelAnimationFrame(worksNotchRaf);
				worksNotchRaf = requestAnimationFrame(syncOurWorksHeroNotchToDesktopMenu);
			};

			scheduleWorksNotchSync();
			window.addEventListener('resize', scheduleWorksNotchSync);
			window.addEventListener('load', scheduleWorksNotchSync);
			if (document.fonts && document.fonts.ready) {
				document.fonts.ready.then(scheduleWorksNotchSync).catch(() => {});
			}
		});
	</script>
</main>

<?php
get_footer();
