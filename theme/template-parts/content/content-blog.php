<?php

/**
 * Template part for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

// Global Blog Variables
$blog_back_icon = get_template_directory_uri() . '/public/solutions/blog-single-back-icon.svg';
$blog_fallback_image = get_template_directory_uri() . '/public/solutions/blog-single-hero.png';
$blog_index_url = home_url('/blogs/');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-background'); ?> itemscope itemtype="https://schema.org/BlogPosting">

	<!-- Major Section: Blog Single Content -->
	<section
		id="blog-single-content"
		class="py-10 sm:py-14 lg:py-20 xl:py-20"
		aria-labelledby="blog-single-title">

		<div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
			<div class="mx-auto flex w-full max-w-7xl flex-col items-start gap-6 sm:gap-8 lg:gap-10  pt-14 md:pt-12 ">

				<!-- Blog Single: Back Link -->
				<header class="w-full">
					<a
						href="<?php echo esc_url($blog_index_url); ?>"
						class="inline-flex items-center gap-2 text-muted-foreground no-underline transition-colors hover:text-foreground"
						aria-label="<?php esc_attr_e('Back to blogs', 'reacon-group'); ?>">
						<span class="inline-flex items-center gap-1.5 font-sans text-[14px] leading-[22.72px] sm:text-[16px]">
							<i class="ph-bold ph-caret-left text-[16px] leading-none text-current sm:text-[18px]" aria-hidden="true"></i>
							<?php esc_html_e('Blogs', 'reacon-group'); ?>
						</span>

					</a>
				</header>
				<!-- End Blog Single: Back Link -->

				<!-- Blog Single: Heading -->
				<div class="w-full">
					<h1
						id="blog-single-title"
						itemprop="headline"
						class="font-display text-[24px] font-semibold leading-tight text-foreground sm:text-[40px] lg:text-[48px] xl:text-[56px] xl:leading-[73.92px]">
						<?php the_title(); ?>
					</h1>
				</div>
				<!-- End Blog Single: Heading -->

				<!-- Blog Single: Featured Media -->
				<figure class="w-full overflow-hidden rounded-[24px] sm:rounded-[28px] lg:rounded-[32px]" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<?php if (has_post_thumbnail()): ?>
						<?php
						the_post_thumbnail(
							'full',
							array(
								'class' => 'block h-[220px] w-full object-cover sm:h-[300px] md:h-[380px] lg:h-[420px]',
								'loading' => 'eager',
								'decoding' => 'async',
								'fetchpriority' => 'high',
							)
						);
						?>
					<?php else: ?>
						<img
							src="<?php echo esc_url($blog_fallback_image); ?>"
							alt="<?php echo esc_attr(get_the_title()); ?>"
							class="block h-[220px] w-full object-cover sm:h-[300px] md:h-[380px] lg:h-[420px]"
							loading="eager"
							decoding="async"
							fetchpriority="high" />
					<?php endif; ?>
				</figure>
				<!-- End Blog Single: Featured Media -->

				<!-- Blog Single: Meta and Body -->
				<div class="w-full space-y-5 sm:space-y-6">

					<!-- Semantic Author & Date Meta -->
					<div class="font-sans text-[14px] font-medium leading-[22.72px] text-muted-foreground sm:text-[16px]">
						<span itemprop="author" itemscope itemtype="https://schema.org/Person">
							<span itemprop="name"><?php echo esc_html(get_the_author()); ?></span>
						</span>
						<span class="mx-1" aria-hidden="true">&bull;</span>
						<time datetime="<?php echo esc_attr(get_the_date('c')); ?>" itemprop="datePublished">
							<?php echo esc_html(get_the_date('j M Y')); ?>
						</time>
					</div>

					<!-- Post Content -->
					<div
						itemprop="articleBody"
						<?php reacon_group_content_class(' blog-single-content font-sans text-[15px] leading-[22.72px] text-muted-foreground sm:text-[16px] [&_p]:mb-4 [&_p]:leading-[22.72px] [&_strong]:font-medium [&_h2]:mt-7 [&_h2]:mb-3 [&_h2]:font-sans [&_h2]:text-[20px][&_h2]:font-medium [&_h2]:leading-[28px] [&_h3]:mt-6 [&_h3]:mb-3 [&_h3]:font-sans [&_h3]:text-[18px] [&_h3]:font-medium [&_h3]:leading-[26px]'); ?>>
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="mt-6 font-medium">' . esc_html__('Pages:', 'reacon-group'),
								'after' => '</div>',
							)
						);
						?>
					</div>
				</div>
				<!-- End Blog Single: Meta and Body -->

				<!-- Major Section: Explore More Blogs -->
				<section
					id="explore-more-blogs"
					class="w-full pt-10 sm:pt-14 lg:pt-16 xl:pt-16">

					<div class="w-full">
						<h2 class="font-display text-[32px] font-semibold leading-[42.24px] text-foreground">
							<?php esc_html_e('Explore More Blogs', 'reacon-group'); ?>
						</h2>
					</div>

					<?php
					$explore_query = new WP_Query(
						array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 6,
							'post__not_in' => array((int) get_the_ID()),
							'ignore_sticky_posts' => true,
							'no_found_rows' => true,
						)
					);
					?>

					<div class="mt-[16px] w-full">
						<div class="swiper js-explore-more-swiper w-full overflow-hidden">
							<div class="swiper-wrapper">
								<?php if ($explore_query->have_posts()): ?>
									<?php foreach ($explore_query->posts as $explore_post): ?>
										<?php
										$explore_post_id = $explore_post instanceof WP_Post ? (int) $explore_post->ID : 0;
										$explore_title = $explore_post_id ? get_the_title($explore_post_id) : '';
										$explore_url = $explore_post_id ? get_permalink($explore_post_id) : $blog_index_url;
										$explore_excerpt = $explore_post_id ? wp_trim_words(wp_strip_all_tags((string) get_the_excerpt($explore_post_id)), 12, '...') : '';
										$explore_thumb = $explore_post_id ? get_the_post_thumbnail_url($explore_post_id, 'large') : '';
										$explore_author = $explore_post instanceof WP_Post ? get_the_author_meta('display_name', (int) $explore_post->post_author) : '';
										$explore_date = $explore_post_id ? get_the_date('d M Y', $explore_post_id) : '';
										$explore_meta = trim($explore_author . ' • ' . $explore_date);
										?>
										<article class="swiper-slide flex min-h-[430px] flex-col overflow-hidden rounded-[28px] border border-[#DCE3EC] bg-white p-[10px] shadow-[0_1px_0_rgba(15,23,42,0.04)] transition-shadow duration-200 hover:shadow-[0_8px_24px_rgba(15,23,42,0.06)]">
											<div class="relative h-[220px] overflow-hidden rounded-[22px] sm:h-[230px]">
												<img
													src="<?php echo esc_url($explore_thumb ? $explore_thumb : $blog_fallback_image); ?>"
													alt="<?php echo esc_attr($explore_title); ?>"
													class="pointer-events-none absolute inset-0 h-full w-full object-cover"
													loading="lazy" />
											</div>

											<div class="flex flex-1 flex-col items-start gap-3 px-2 pb-2 pt-5 sm:px-3 sm:pt-6">
												<p class="text-sm font-medium text-[#6B7280]">
													<?php echo esc_html($explore_meta); ?>
												</p>
												<h3 class="text-[20px] leading-[1.22] text-foreground sm:text-[20px]">
													<a href="<?php echo esc_url($explore_url); ?>" class="transition-colors no-underline hover:text-primary">
														<?php echo esc_html($explore_title); ?>
													</a>
												</h3>
												<p class="text-md line-clamp-3 text-[#667085]">
													<?php echo esc_html($explore_excerpt); ?>
												</p>
												<div class="mt-auto flex w-full justify-end pt-3">
													<a
														href="<?php echo esc_url($explore_url); ?>"
														aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'reacon-group'), $explore_title)); ?>"
														class="inline-flex items-center justify-center rounded-full border border-[#D1D9E6] px-5 py-2 text-[15px] leading-none text-[#667085] no-underline transition-colors hover:border-primary hover:text-primary">
														<?php esc_html_e('Read More', 'reacon-group'); ?>
													</a>
												</div>
											</div>
										</article>
									<?php endforeach; ?>
								<?php else: ?>
									<article class="swiper-slide flex min-h-[430px] flex-col overflow-hidden rounded-[28px] border border-[#DCE3EC] bg-white p-[10px] shadow-[0_1px_0_rgba(15,23,42,0.04)]">
										<div class="flex min-h-[240px] items-center justify-center rounded-[22px] bg-background px-6 text-center font-sans text-[16px] text-muted-foreground">
											<?php esc_html_e('No more blog posts found.', 'reacon-group'); ?>
										</div>
									</article>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php wp_reset_postdata(); ?>
				</section>
				<!-- End Major Section: Explore More Blogs -->

				<!-- Swiper Initialization -->
				<script>
					document.addEventListener('DOMContentLoaded', function() {
						var swiperEl = document.querySelector('.js-explore-more-swiper');
						if (!swiperEl || typeof Swiper === 'undefined') {
							return;
						}

						new Swiper(swiperEl, {
							loop: true,
							spaceBetween: 16,
							slidesPerView: 1,
							slidesPerGroup: 1,
							autoplay: {
								delay: 3500,
								disableOnInteraction: false
							},
							breakpoints: {
								1024: {
									slidesPerView: 3.5,
									slidesPerGroup: 1
								}
							}
						});
					});
				</script>

			</div><!-- /.mx-auto.max-w-[1280px] -->
		</div><!-- /.mx-auto.max-w-[1440px] -->
	</section>
	<!-- End Major Section: Blog Single Content -->

</article><!-- #post-<?php the_ID(); ?> -->


<!-- Cta Section: Strategic call-to-action banner. -->
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
	class="py-10"
	aria-labelledby="solution-cta-heading">
	<div class="mx-auto w-full px-4 md:px-10">
		<div class="relative overflow-hidden rounded-[22px] bg-[#0D6B75] px-5 py-14 sm:px-8 sm:py-16 lg:rounded-[24px] lg:px-12 lg:py-[70px]">

			<!-- Background Overlays & Gradients -->
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
			<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0E6D77_0%,#0A4E57_100%)] opacity-75" aria-hidden="true"></div>

			<div class="pointer-events-none absolute left-16 top-0 h-[205px] w-[1566px]" aria-hidden="true">
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

			<div class="pointer-events-none absolute right-[-955px] h-[791px] w-[2122px]" aria-hidden="true">
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

			<!-- CTA Content -->
			<div class="relative z-10 mx-auto flex max-w-[760px] flex-col items-center text-center">
				<h2
					id="solution-cta-heading"
					class="font-display text-[24px] font-semibold leading-[1.16] text-white sm:text-[46px] lg:text-[56px] lg:leading-[1.12]">
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