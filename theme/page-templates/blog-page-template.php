<?php

/**
 * Template Name: Blog Page
 * Template Post Type: page
 *
 * Blog page template with the mirrored top hero/header area.
 *
 * @package reacon-group
 */
get_header();

$blog_hero_bg = get_template_directory_uri() . '/public/blog/blog-hero-subtract.png';
$blog_card_image = get_template_directory_uri() . '/public/blog/blog-card-image.png';
$divider_line_src = get_template_directory_uri() . '/public/blog/blog-divider-line.svg';
$pagination_prev = get_template_directory_uri() . '/public/blog/blog-pagination-prev.svg';
$pagination_next = get_template_directory_uri() . '/public/blog/blog-pagination-next.svg';
?>
<main id="primary" class="overflow-x-hidden" role="main">
	<!-- Major Section: Blog Hero -->
	<section
		id="blog-hero"
		class="relative w-full p-4 sm:p-5 lg:p-6"
		aria-label="<?php esc_attr_e('Blog hero', 'reacon-group'); ?>">
		<div
			class="relative flex min-h-[360px] w-full flex-col overflow-hidden rounded-[31px] bg-foreground ">
			<img
				src="<?php echo esc_url($blog_hero_bg); ?>"
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
						<?php esc_html_e('Blogs', 'reacon-group'); ?>
					</p>

					<h1 class="mt-3 font-display text-[40px] font-semibold leading-tight text-white sm:text-[48px] lg:text-[56px]">
						<?php esc_html_e('Insights, Ideas & Industry Thinking', 'reacon-group'); ?>
					</h1>

					<p class="mt-5 max-w-[840px] font-sans text-[16px] leading-[22.72px] text-white/80">
						<?php esc_html_e('Expert perspectives, trends, and practical insights on creative, production, and fulfilment—helping brands deliver better outcomes across every physical and digital touchpoint.', 'reacon-group'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End Major Section: Blog Hero -->

	<!-- Major Section: Latest Blogs -->
	<?php
	$blog_feature = array(
		'image' => $blog_card_image,
		'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
		'title' => __('Why Integrated Production Saves Time, Cost, and Operational Complexity', 'reacon-group'),
		'content' => __('In today’s multi-channel marketing environment, speed, consistency, and efficiency are no longer optional. Brands are expected to launch campaigns quickly, adapt creative across formats, and deliver physical assets to multiple locations—often under tight budgets and timelines. This is where integrated production makes a measurable difference. The problem with fragmented workflows when creative, print, and fulfilment are handled by separate vendors, inefficiencies multiply. Files are reworked, timelines slip, approvals become fragmented, and accountability is diluted. Each handover introduces friction—miscommunication, duplicated effort, and unexpected costs that slow down speed to market.', 'reacon-group'),
		'button' => __('Read More', 'reacon-group'),
	);

	$blog_cards = array(
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
		array(
			'meta' => __('Alec Whitten • 17 Jan 2026', 'reacon-group'),
			'title' => __('Why Integrated Production Saves Time and Cost', 'reacon-group'),
			'content' => __('Exploring how unified creative, print, and fulfilment workflows reduce friction and improve speed to market.', 'reacon-group'),
		),
	);

	$blog_post_url = home_url('/blogs/');
	$blog_feature['url'] = $blog_post_url;
	foreach ($blog_cards as &$card) {
		$card['url'] = $blog_post_url;
	}
	unset($card);
	?>
	<section
		id="blog-latest"
		class="bg-background py-12"
		aria-labelledby="blog-latest-heading">
		<div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
			<div class="flex flex-col gap-[32px] items-start">
				<h2
					id="blog-latest-heading"
					class="font-display text-[32px] font-semibold leading-[42.24px] text-foreground">
					<?php esc_html_e('Latest Blogs', 'reacon-group'); ?>
				</h2>

				<a
					href="<?php echo esc_url($blog_feature['url']); ?>"
					aria-label="<?php echo esc_attr($blog_feature['title']); ?>"
					class="group bg-card w-full border border-border rounded-[32px] overflow-hidden p-[10px] flex flex-col gap-[16px] transition-colors hover:border-primary">
					<div class="h-[420px] relative rounded-[24px] w-full overflow-hidden">
						<img
							src="<?php echo esc_url($blog_feature['image']); ?>"
							alt="<?php esc_attr_e('Featured blog cover', 'reacon-group'); ?>"
							class="absolute inset-0 h-full w-full object-cover pointer-events-none"
							loading="eager"
							decoding="async" />
					</div>

					<div class="flex flex-col items-start gap-[8px] pt-[8px] px-[8px]">
						<p class="font-sans text-[14px] font-medium leading-[19.6px] text-muted-foreground">
							<?php echo esc_html($blog_feature['meta']); ?>
						</p>
						<p class="font-display text-[32px] font-semibold leading-[42.24px] text-foreground">
							<?php echo esc_html($blog_feature['title']); ?>
						</p>
						<p class="font-sans text-[16px] leading-[22.72px] text-muted-foreground">
							<?php echo esc_html($blog_feature['content']); ?>
						</p>
					</div>

				</a>

			

				<div class="flex flex-col gap-[24px] w-full">
					<div class="grid grid-cols-1 gap-[24px] sm:grid-cols-2 lg:grid-cols-3">
						<?php foreach ($blog_cards as $index => $card): ?>
							<article class="bg-card border border-border rounded-[32px] p-[10px] flex flex-col gap-[24px] overflow-hidden transition-colors hover:border-primary">
								<div class="h-[240px] relative rounded-[24px] overflow-hidden">
									<img
										src="<?php echo esc_url($blog_feature['image']); ?>"
										alt="<?php echo esc_attr(sprintf(__('Blog cover %d', 'reacon-group'), (int) $index + 1)); ?>"
										class="absolute inset-0 h-full w-full object-cover pointer-events-none"
										loading="lazy"
										decoding="async" />
								</div>
								<div class="flex flex-col items-start gap-[12px] pt-[8px] px-[8px]">
									<p class="font-sans text-[14px] font-medium leading-[19.6px] text-muted-foreground">
										<?php echo esc_html($card['meta']); ?>
									</p>
									<p class="font-display text-[24px] font-semibold leading-[31.68px] text-foreground">
										<?php echo esc_html($card['title']); ?>
									</p>
									<p class="font-sans text-[16px] leading-[22.72px] text-muted-foreground line-clamp-3">
										<?php echo esc_html($card['content']); ?>
									</p>
								</div>
								<a
									href="<?php echo esc_url($card['url']); ?>"
									class="mt-auto self-end w-fit border border-border rounded-[24px] px-[16px] py-[8px] flex items-center justify-end font-sans text-[16px] leading-[22.72px] text-muted-foreground transition-colors hover:text-foreground hover:border-primary no-underline">
									<?php echo esc_html($blog_feature['button']); ?>
								</a>
							</article>
						<?php endforeach; ?>
					</div>
				</div>

				<nav
					class="w-full flex items-center justify-center mt-[8px]"
					aria-label="<?php esc_attr_e('Blog pagination', 'reacon-group'); ?>">
					<div class="flex items-center justify-center gap-[10px] px-[12px] py-[10px] border border-border rounded-[18px] bg-card">
						<button
							type="button"
							class="flex items-center gap-[10px] text-muted-foreground hover:text-foreground transition-colors px-[8px] py-[6px]">
							<i class="ph-bold ph-arrow-left text-muted-foreground" aria-hidden="true"></i>
							<span class="font-sans text-[14px] leading-[19.88px]">
								<?php esc_html_e('Previous', 'reacon-group'); ?>
							</span>
						</button>

						<div class="flex items-center gap-[8px] px-[6px]">
							<?php
							// Dummy pagination for the design mockup.
							$pages = array(1, 2, 3, 4, 'ellipsis', 5, 6, 7, 8);
							foreach ($pages as $p):
								$is_active = 1 === $p;
								if ('ellipsis' === $p):
									?>
									<span class="font-sans text-[14px] leading-[19.88px] text-muted-foreground px-[6px] select-none">...</span>
									<?php
									continue;
								endif;
								?>
								<a
									href="#"
									aria-current="<?php echo $is_active ? 'page' : 'false'; ?>"
									class="<?php echo $is_active
									? 'bg-primary border-primary text-white'
									: 'bg-transparent border border-border text-foreground hover:border-primary hover:text-foreground'; ?> flex items-center justify-center rounded-[10px] size-[32px] transition-colors">
									<span class="font-sans text-[14px] leading-[19.88px]"><?php echo esc_html((string) $p); ?></span>
								</a>
							<?php endforeach; ?>
						</div>

						<button
							type="button"
							class="flex items-center gap-[10px] text-muted-foreground hover:text-foreground transition-colors px-[8px] py-[6px]">
							<span class="font-sans text-[14px] leading-[19.88px]">
								<?php esc_html_e('Next', 'reacon-group'); ?>
							</span>
							<i class="ph-bold ph-arrow-right text-muted-foreground" aria-hidden="true"></i>
						</button>
					</div>
				</nav>
			</div>
		</div>
	</section>
	<!-- End Major Section: Latest Blogs -->

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
			class="py-10 "
			aria-labelledby="solution-cta-heading">
			<div class="mx-auto w-full px-10">
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
</main>
<?php get_footer(); ?>
